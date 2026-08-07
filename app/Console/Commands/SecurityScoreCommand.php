<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Security\Findings\FindingNormalizer;
use App\Security\Cvss\CvssScorer;
use App\Security\Findings\Finding;
use App\Security\Gate\SecurityGate;
use App\Security\Reporting\HtmlReportGenerator;

class SecurityScoreCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'security:score
                            {--composer-audit=composer-audit-report.json : Path to the Composer Audit report}
                            {--phpstan=phpstan-report.json : Path to the PHPStan report}
                            {--zap=zap_report.json : Path to the OWASP ZAP report}
                            {--output-findings=findings.json : Path to save compiled raw findings (Layer 1)}
                            {--output-scored=scored_findings.json : Path to save scored findings (Layer 3)}
                            {--output-html=security-report.html : Path to save interactive HTML report}
                            {--history=security_trends.json : Path to the vulnerability trend history file}
                            {--fail-on-gate=true : Fail job if gate is violated (exit code 1)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aggregate security reports, apply CVSS scoring and PHI classification (Layers 2 & 3)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Starting Layer 2,3 Security Scoring, PHI Classification & Gate Assessment...');

        $composerPath = $this->option('composer-audit');
        $phpstanPath = $this->option('phpstan');
        $zapPath = $this->option('zap');
        $findingsPath = $this->option('output-findings');
        $scoredPath = $this->option('output-scored');
        $htmlPath = $this->option('output-html');
        $historyPath = $this->option('history');
        $failOnGate = filter_var($this->option('fail-on-gate'), FILTER_VALIDATE_BOOLEAN);


        $normalizer = new FindingNormalizer(base_path());
        $scorer = new CvssScorer();

        
        $this->comment('Parsing Composer Audit report...');
        if (file_exists(base_path($composerPath))) {
            $composerFindings = $normalizer->parseComposerAudit(base_path($composerPath));
            $this->info('Found ' . count($composerFindings) . ' findings in Composer Audit.');
        } else {
            $this->warn('Composer Audit report not found at ' . $composerPath);
            $composerFindings = [];
        }

        $this->comment('Parsing PHPStan report...');
        if (file_exists(base_path($phpstanPath))) {
            $phpstanFindings = $normalizer->parsePhpStan(base_path($phpstanPath));
            $this->info('Found ' . count($phpstanFindings) . ' findings in PHPStan.');
        } else {
            $this->warn('PHPStan report not found at ' . $phpstanPath);
            $phpstanFindings = [];
        }

        $staticFindings = array_merge($composerFindings, $phpstanFindings);

        $this->comment('Parsing OWASP ZAP report...');
        if (file_exists(base_path($zapPath))) {
            $zapFindings = $normalizer->parseZap(base_path($zapPath));
            $this->info('Found ' . count($zapFindings) . ' findings in OWASP ZAP.');
        } else {
            $this->warn('OWASP ZAP report not found at ' . $zapPath);
            $zapFindings = [];
        }

        $allFindings = array_merge($staticFindings, $zapFindings);

        if (empty($allFindings)) {
            $this->warn('No security findings found from any input source.');
            
            file_put_contents(base_path($findingsPath), json_encode([], JSON_PRETTY_PRINT));
            
            $emptyScored = [
                'summary' => [
                    'total_findings' => 0,
                    'critical_count' => 0,
                    'high_count' => 0,
                    'medium_count' => 0,
                    'low_count' => 0,
                    'info_count' => 0,
                    'max_score' => 0.0,
                    'phi_classification' => [
                        'Critical' => 0,
                        'Moderate' => 0,
                        'Non-PHI' => 0,
                    ]
                ],
                'findings' => []
            ];
            file_put_contents(base_path($scoredPath), json_encode($emptyScored, JSON_PRETTY_PRINT));

            $history = $this->updateHistory($historyPath, $emptyScored['summary']);
            (new HtmlReportGenerator())->generate($emptyScored, $history, base_path($htmlPath));
            $this->info('HTML security report saved to ' . $htmlPath);

            return self::SUCCESS;
        }

        $rawFindingsArray = array_map(fn(Finding $f) => $f->toArray(), $allFindings);
        file_put_contents(base_path($findingsPath), json_encode($rawFindingsArray, JSON_PRETTY_PRINT));
        $this->info('Layer 1 compiled findings saved to ' . $findingsPath);

        $this->comment('Executing CVSS Scoring & PHI Classification...');
        $scoredFindings = [];
        $phiCounts = ['Critical' => 0, 'Moderate' => 0, 'Non-PHI' => 0];
        $severityCounts = ['critical' => 0, 'high' => 0, 'medium' => 0, 'low' => 0, 'info' => 0];
        $maxScore = 0.0;

        foreach ($allFindings as $finding) {
            $scored = $scorer->score($finding);
            $scoredFindings[] = $scored->toArray();

            $phiCounts[$scored->phi_tier]++;
            $maxScore = max($maxScore, $scored->cvss_adjusted);

            $score = $scored->cvss_adjusted;
            if ($score >= 9.0) {
                $severityCounts['critical']++;
            } elseif ($score >= 7.0) {
                $severityCounts['high']++;
            } elseif ($score >= 4.0) {
                $severityCounts['medium']++;
            } elseif ($score >= 0.1) {
                $severityCounts['low']++;
            } else {
                $severityCounts['info']++;
            }
        }

        $outputData = [
            'summary' => [
                'total_findings' => count($allFindings),
                'critical_count' => $severityCounts['critical'],
                'high_count' => $severityCounts['high'],
                'medium_count' => $severityCounts['medium'],
                'low_count' => $severityCounts['low'],
                'info_count' => $severityCounts['info'],
                'max_score' => $maxScore,
                'phi_classification' => $phiCounts,
            ],
            'findings' => $scoredFindings,
        ];

        file_put_contents(base_path($scoredPath), json_encode($outputData, JSON_PRETTY_PRINT));
        $this->info('Layer 3 scored findings saved to ' . $scoredPath);

        $history = $this->updateHistory($historyPath, $outputData['summary']);
        (new HtmlReportGenerator())->generate($outputData, $history, base_path($htmlPath));
        $this->info('HTML security report saved to ' . $htmlPath);

        $gate = new SecurityGate();
        $gateResult = $gate->evaluate($scoredFindings);
        $gateViolated = $gateResult->isViolated;
        $violatingFindings = $gateResult->violatingFindings;

        $this->newLine();
        $this->info('--- Security Assessment Summary (Layer 3) ---');
        $this->table(
            ['Metric', 'Value'],
            [
                ['Total Findings', count($allFindings)],
                ['Max Risk Score (Adjusted)', $maxScore],
                ['Critical Severity (>= 9.0)', $severityCounts['critical']],
                ['High Severity (7.0 - 8.9)', $severityCounts['high']],
                ['Medium Severity (4.0 - 6.9)', $severityCounts['medium']],
                ['Low Severity (0.1 - 3.9)', $severityCounts['low']],
                ['Informational (0.0)', $severityCounts['info']],
                ['Critical PHI Affected', $phiCounts['Critical']],
                ['Moderate PHI Affected', $phiCounts['Moderate']],
                ['Non-PHI Affected', $phiCounts['Non-PHI']],
                ['Gate Status', $gateViolated ? 'FAILED (Vulnerabilities affecting PHI >= 7.0)' : 'PASSED'],
            ]
        );

        if ($gateViolated) {
            $this->error('====================================================');
            $this->error('      SECURITY ASSESSMENT GATE VIOLATED (Layer 4)   ');
            $this->error('====================================================');
            foreach ($violatingFindings as $vf) {
                $this->warn(sprintf(
                    "- %s (Adjusted Score: %.1f, PHI Tier: %s, Source: %s)",
                    $vf['title'],
                    $vf['cvss_adjusted'],
                    $vf['phi_tier'],
                    $vf['source']
                ));
            }
            if ($failOnGate) {
                $this->error('Exiting with code 1 to block the pipeline / Merge Request.');
                return 1;
            } else {
                $this->warn('Gate failure ignored due to --fail-on-gate=false.');
            }
        }

        return self::SUCCESS;
    }

    /**
     * Read existing history JSON file, append current metrics summary, and write it back.
     */
    private function updateHistory(string $historyPath, array $summary): array
    {
        $history = [];
        $fullPath = base_path($historyPath);
        
        if (file_exists($fullPath)) {
            $history = json_decode(file_get_contents($fullPath), true) ?: [];
        }

        $commitSha = env('CI_COMMIT_SHORT_SHA') ?: exec('git rev-parse --short HEAD 2>/dev/null');
        $branch = env('CI_COMMIT_REF_NAME') ?: exec('git rev-parse --abbrev-ref HEAD 2>/dev/null');

        $entry = [
            'timestamp'    => date('c'),
            'pipeline_id'  => env('CI_PIPELINE_ID', 'local'),
            'pipeline_url' => env('CI_PIPELINE_URL', ''),
            'commit_sha'   => $commitSha ?: 'local',
            'branch'       => $branch ?: 'local',
            'summary'      => $summary,
        ];

        $history[] = $entry;

        file_put_contents($fullPath, json_encode($history, JSON_PRETTY_PRINT));
        $this->info('Vulnerability trend history updated in ' . $historyPath);

        return $history;
    }
}

