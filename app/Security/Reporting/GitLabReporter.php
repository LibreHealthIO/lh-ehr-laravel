<?php

namespace App\Security\Reporting;

use RuntimeException;

class GitLabReporter
{
    private const SAST_VERSION = '15.0.7';
    private const DAST_VERSION = '15.0.7';
    private const DEP_VERSION = '15.0.7';

    public function __construct()
    {
    }

    /**
     * Make reports compatible with GitLab CI/CD.
     *
     * @param array $scoredFindings
     * @param string $sastPath
     * @param string $dastPath
     * @param string $dependencyPath
     * @return void
     * @throws RuntimeException if file writing fails
     */
    public function generateAndSave(
        array $scoredFindings,
        string $sastPath,
        string $dastPath,
        string $dependencyPath
    ): void {
        $startTime = gmdate('Y-m-d\TH:i:s');
        
        $sastVulnerabilities = [];
        $dastVulnerabilities = [];
        $depVulnerabilities = [];

        foreach ($scoredFindings as $sf) {
            $score = $sf['cvss_adjusted'] ?? 0.0;
            $severity = $this->mapScoreToSeverity($score);

            if ($sf['source'] === 'phpstan') {
                $sastVulnerabilities[] = $this->buildSastVulnerability($sf, $severity);
            } elseif ($sf['source'] === 'composer-audit') {
                $depVulnerabilities[] = $this->buildDependencyVulnerability($sf, $severity);
            } elseif ($sf['source'] === 'zap') {
                $dastVulnerabilities[] = $this->buildDastVulnerability($sf, $severity);
            }
        }

        $endTime = gmdate('Y-m-d\TH:i:s');

        $this->writeReport($sastPath, $this->buildReportStructure(self::SAST_VERSION, 'sast', $sastVulnerabilities, $startTime, $endTime));
        $this->writeReport($dastPath, $this->buildReportStructure(self::DAST_VERSION, 'dast', $dastVulnerabilities, $startTime, $endTime));
        $this->writeReport($dependencyPath, $this->buildReportStructure(self::DEP_VERSION, 'dependency_scanning', $depVulnerabilities, $startTime, $endTime));
    }

    /**
     * Build the top-level report structure with the mandatory GitLab 'scan' object.
     */
    private function buildReportStructure(
        string $version,
        string $type,
        array $vulnerabilities,
        string $startTime,
        string $endTime
    ): array {
        return [
            'version' => $version,
            'vulnerabilities' => $vulnerabilities,
            'scan' => [
                'analyzer' => [
                    'id' => 'lh_ehr_security_analyzer',
                    'name' => 'LibreHealth EHR Security Analyzer',
                    'vendor' => ['name' => 'LibreHealth'],
                    'version' => '1.0.0'
                ],
                'scanner' => [
                    'id' => 'lh_ehr_security_scanner',
                    'name' => 'LibreHealth EHR Security Scanner',
                    'vendor' => ['name' => 'LibreHealth'],
                    'version' => '1.0.0'
                ],
                'type' => $type,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'status' => 'success'
            ]
        ];
    }

    /**
     * Base Vulnerability structure builder.
     */
    private function buildBaseVulnerability(array $sf, string $category, string $severity, array $location, array $identifiers): array
    {
        $desc = $sf['description']
            . "\n\nPHI Exposure Tier: " . ($sf['phi_tier'] ?? 'Non-PHI')
            . "\nAdjusted CVSS Score: " . ($sf['cvss_adjusted'] ?? 0.0);

        if (!empty($sf['metadata']['cvss_vector'])) {
            $desc .= "\nCVSS v3.1 Vector: " . $sf['metadata']['cvss_vector'];
        }

        return [
            'id' => $sf['id'],
            'category' => $category,
            'name' => $sf['title'],
            'message' => $sf['title'],
            'description' => $desc,
            'severity' => $severity,
            'scanner' => [
                'id' => $sf['source'],
                'name' => ucfirst(str_replace('-', ' ', $sf['source']))
            ],
            'location' => $location,
            'identifiers' => $identifiers
        ];
    }

    private function buildSastVulnerability(array $sf, string $severity): array
    {
        $location = [
            'file' => $sf['file'] ?? 'unknown.php',
            'start_line' => isset($sf['line']) ? (int)$sf['line'] : 1
        ];

        $identifiers = [];
        if (!empty($sf['cwe'])) {
            $identifiers[] = $this->buildCweIdentifier($sf['cwe']);
        } else {
            $identifiers[] = [
                'type' => 'phpstan_error',
                'name' => 'PHPStan Static Analysis Issue',
                'value' => 'PHPStan'
            ];
        }

        return $this->buildBaseVulnerability($sf, 'sast', $severity, $location, $identifiers);
    }

    private function buildDependencyVulnerability(array $sf, string $severity): array
    {
        $packageName = $sf['metadata']['packageName'] ?? 'unknown-package';
        $location = [
            'file' => $sf['file'] ?? 'composer.lock',
            'dependency' => [
                'package' => [
                    'name' => $packageName
                ],
                'version' => $sf['metadata']['affectedVersions'] ?? 'unknown'
            ]
        ];

        $identifiers = [];
        if (!empty($sf['metadata']['cve'])) {
            $identifiers[] = [
                'type' => 'cve',
                'name' => $sf['metadata']['cve'],
                'value' => $sf['metadata']['cve'],
                'url' => 'https://cve.mitre.org/cgi-bin/cvename.cgi?name=' . $sf['metadata']['cve']
            ];
        }

        if (!empty($sf['cwe'])) {
            $identifiers[] = $this->buildCweIdentifier($sf['cwe']);
        }

        if (empty($identifiers)) {
            $identifiers[] = [
                'type' => 'composer_advisory',
                'name' => $sf['metadata']['advisoryId'] ?? 'Composer Advisory',
                'value' => $sf['metadata']['advisoryId'] ?? 'unknown'
            ];
        }

        return $this->buildBaseVulnerability($sf, 'dependency_scanning', $severity, $location, $identifiers);
    }

    private function buildDastVulnerability(array $sf, string $severity): array
    {
        $location = [
            'path' => $sf['url'] ?? '/',
            'method' => 'GET'
        ];

        $instances = $sf['metadata']['instances'] ?? [];
        if (is_array($instances) && count($instances) > 0) {
            $firstInst = $instances[0];
            $uri = $firstInst['uri'] ?? '';
            $path = $uri ? parse_url($uri, PHP_URL_PATH) : ($sf['url'] ?? '/');
            $location = [
                'path' => $path,
                'method' => $firstInst['method'] ?? 'GET'
            ];
        }

        $identifiers = [];
        if (!empty($sf['cwe'])) {
            $identifiers[] = $this->buildCweIdentifier($sf['cwe']);
        } else {
            $identifiers[] = [
                'type' => 'zap_alert',
                'name' => $sf['title'],
                'value' => $sf['title']
            ];
        }

        return $this->buildBaseVulnerability($sf, 'dast', $severity, $location, $identifiers);
    }

    private function buildCweIdentifier(string $cwe): array
    {
        $numericId = (int)preg_replace('/[^0-9]/', '', $cwe);
        return [
            'type' => 'cwe',
            'name' => 'CWE-' . $numericId,
            'value' => 'CWE-' . $numericId,
            'url' => 'https://cwe.mitre.org/data/definitions/' . $numericId . '.html'
        ];
    }

    private function mapScoreToSeverity(float $score): string
    {
        if ($score >= 9.0) {
            return 'Critical';
        }
        if ($score >= 7.0) {
            return 'High';
        }
        if ($score >= 4.0) {
            return 'Medium';
        }
        if ($score >= 0.1) {
            return 'Low';
        }
        return 'Info';
    }

    private function writeReport(string $path, array $data): void
    {
        $dir = dirname($path);
        if (!is_dir($dir) && !@mkdir($dir, 0755, true) && !is_dir($dir)) {
            throw new RuntimeException("Failed to create directory: {$dir}");
        }

        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        if (file_put_contents($path, $json) === false) {
            throw new RuntimeException("Failed to write GitLab report to: {$path}");
        }
    }
}
