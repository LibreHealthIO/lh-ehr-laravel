<?php

namespace App\Security\Findings;

class FindingNormalizer
{
    private string $basePath;

    public function __construct(string $basePath = '/data/lh-ehr-laravel')
    {
        $this->basePath = rtrim($basePath, '/');
    }

    /**
     * Helper to load and validate a JSON report.
     *
     * @param string $path
     * @return array|null
     */
    private function loadJson(string $path): ?array
    {
        if (!file_exists($path)) {
            return null;
        }

        $content = @file_get_contents($path);
        if (!$content) {
            return null;
        }

        $data = json_decode($content, true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)) {
            return null;
        }

        return $data;
    }

    /**
     * Parse and normalize Composer Audit JSON report.
     *
     * @param string $path
     * @return Finding[]
     */
    public function parseComposerAudit(string $path): array
    {
        $data = $this->loadJson($path);
        if ($data === null) {
            return [];
        }

        $findings = [];

        if (isset($data['advisories']) && is_array($data['advisories'])) {
            foreach ($data['advisories'] as $packageName => $advisories) {
                if (!is_array($advisories)) {
                    continue;
                }
                foreach ($advisories as $advisory) {
                    $severity = strtolower($advisory['severity'] ?? 'medium');
                    if (!in_array($severity, ['low', 'medium', 'high', 'critical', 'info'])) {
                        $severity = 'medium';
                    }

                    $title = ($advisory['cve'] ?? $advisory['advisoryId'] ?? 'Vulnerability') . ': ' . ($advisory['title'] ?? 'Dependency Issue');
                    $description = sprintf(
                        "Package %s (affected versions: %s) has a known vulnerability: %s. Link: %s",
                        $packageName,
                        $advisory['affectedVersions'] ?? 'unknown',
                        $advisory['title'] ?? '',
                        $advisory['link'] ?? 'N/A'
                    );

                    $findings[] = new Finding(
                        source: 'composer-audit',
                        title: $title,
                        description: $description,
                        severity: $severity,
                        file: 'composer.lock',
                        line: null,
                        url: $advisory['link'] ?? null,
                        cwe: 'CWE-937',
                        cvss_base: null,
                        phi_tier: null,
                        cvss_adjusted: null,
                        metadata: [
                            'packageName' => $packageName,
                            'advisoryId' => $advisory['advisoryId'] ?? null,
                            'cve' => $advisory['cve'] ?? null,
                            'affectedVersions' => $advisory['affectedVersions'] ?? null,
                            'reportedAt' => $advisory['reportedAt'] ?? null,
                        ]
                    );
                }
            }
        }

        if (isset($data['abandoned']) && is_array($data['abandoned'])) {
            foreach ($data['abandoned'] as $packageName => $replacement) {
                $description = "Package {$packageName} is abandoned and no longer maintained.";
                if ($replacement) {
                    $description .= " Suggested replacement: {$replacement}.";
                }

                $findings[] = new Finding(
                    source: 'composer-audit',
                    title: "Abandoned Package: {$packageName}",
                    description: $description,
                    severity: 'low',
                    file: 'composer.json',
                    line: null,
                    url: null,
                    cwe: 'CWE-1104',
                    cvss_base: null,
                    phi_tier: null,
                    cvss_adjusted: null,
                    metadata: [
                        'packageName' => $packageName,
                        'replacement' => $replacement,
                        'isAbandoned' => true,
                    ]
                );
            }
        }

        return $findings;
    }

    /**
     * Parse and normalize PHPStan JSON report.
     *
     * @param string $path
     * @return Finding[]
     */
    public function parsePhpStan(string $path): array
    {
        $data = $this->loadJson($path);
        if ($data === null) {
            return [];
        }

        $findings = [];

        if (isset($data['files']) && is_array($data['files'])) {
            foreach ($data['files'] as $absolutePath => $fileData) {
                if (!isset($fileData['messages']) || !is_array($fileData['messages'])) {
                    continue;
                }

                $relativePath = str_replace($this->basePath . '/', '', $absolutePath);

                foreach ($fileData['messages'] as $msg) {
                    $message = $msg['message'] ?? '';
                    $line = $msg['line'] ?? null;

                    $severity = 'medium';
                    if (stripos($message, 'deprecated') !== false) {
                        $severity = 'low';
                    } elseif (preg_match('/(sql|inject|bypass|csrf|xss|query)/i', $message)) {
                        $severity = 'high';
                    }

                    $title = 'Static Analysis: ' . (strlen($message) > 60 ? substr($message, 0, 57) . '...' : $message);

                    $findings[] = new Finding(
                        source: 'phpstan',
                        title: $title,
                        description: $message,
                        severity: $severity,
                        file: $relativePath,
                        line: $line,
                        url: null,
                        cwe: null,
                        cvss_base: null,
                        phi_tier: null,
                        cvss_adjusted: null,
                        metadata: [
                            'ignorable' => $msg['ignorable'] ?? false,
                        ]
                    );
                }
            }
        }

        if (isset($data['errors']) && is_array($data['errors'])) {
            foreach ($data['errors'] as $error) {
                if (!is_string($error)) {
                    continue;
                }

                $findings[] = new Finding(
                    source: 'phpstan',
                    title: 'Static Analysis Error',
                    description: $error,
                    severity: 'high',
                    file: null,
                    line: null,
                    url: null,
                    cwe: null,
                    cvss_base: null,
                    phi_tier: null,
                    cvss_adjusted: null,
                    metadata: []
                );
            }
        }

        return $findings;
    }

    /**
     * Parse and normalize OWASP ZAP JSON report.
     *
     * @param string $path
     * @return Finding[]
     */
    public function parseZap(string $path): array
    {
        $data = $this->loadJson($path);
        if ($data === null) {
            return [];
        }

        $findings = [];

        $sites = $data['site'] ?? [];
        if (is_array($sites) && (isset($sites['alerts']) || isset($sites['@name']))) {
            $sites = [$sites];
        } elseif (!is_array($sites)) {
            $sites = [$sites];
        }

        foreach ($sites as $site) {
            $alerts = $site['alerts'] ?? [];
            if (!is_array($alerts)) {
                continue;
            }

            foreach ($alerts as $alert) {
                $alertName = $alert['alert'] ?? $alert['name'] ?? 'Dynamic Scan Alert';
                $riskcode = (string)($alert['riskcode'] ?? '0');
                
                $severity = match ($riskcode) {
                    '3' => 'high',
                    '2' => 'medium',
                    '1' => 'low',
                    default => 'info',
                };

                $description = strip_tags($alert['desc'] ?? '');
                $cweId = isset($alert['cweid']) && (int)$alert['cweid'] > 0 ? 'CWE-' . $alert['cweid'] : null;

                $urlPath = null;
                $instances = $alert['instances'] ?? [];
                if (is_array($instances) && count($instances) > 0) {
                    $firstUri = $instances[0]['uri'] ?? '';
                    if ($firstUri) {
                        $urlPath = parse_url($firstUri, PHP_URL_PATH);
                    }
                }

                $findings[] = new Finding(
                    source: 'zap',
                    title: $alertName,
                    description: $description,
                    severity: $severity,
                    file: null,
                    line: null,
                    url: $urlPath,
                    cwe: $cweId,
                    cvss_base: null,
                    phi_tier: null,
                    cvss_adjusted: null,
                    metadata: [
                        'solution' => strip_tags($alert['solution'] ?? ''),
                        'reference' => strip_tags($alert['reference'] ?? ''),
                        'confidence' => $alert['confidence'] ?? null,
                        'instancesCount' => count($instances),
                        'instances' => array_map(function ($inst) {
                            return [
                                'uri' => $inst['uri'] ?? '',
                                'method' => $inst['method'] ?? '',
                                'param' => $inst['param'] ?? '',
                                'attack' => $inst['attack'] ?? '',
                            ];
                        }, $instances),
                    ]
                );
            }
        }

        return $findings;
    }
}
