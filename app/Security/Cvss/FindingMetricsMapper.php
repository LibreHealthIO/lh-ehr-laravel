<?php

namespace App\Security\Cvss;

use App\Security\Findings\Finding;

class FindingMetricsMapper
{
    /**
     * Data-driven CWE-to-CVSS v3.1 vector mapping.
     */
    private const CWE_VECTORS = [
        // Injection
        'CWE-89' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'C', 'C' => 'H', 'I' => 'H', 'A' => 'H'], // SQL Injection
        'CWE-78' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'C', 'C' => 'H', 'I' => 'H', 'A' => 'H'], // OS Command Injection
        'CWE-94' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'C', 'C' => 'H', 'I' => 'H', 'A' => 'H'], // Code Injection
        'CWE-77' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'C', 'C' => 'H', 'I' => 'H', 'A' => 'H'], // Command Injection
        'CWE-917' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'C', 'C' => 'H', 'I' => 'H', 'A' => 'H'], // Expression Language Injection
        'CWE-74' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'N'], // Injection (generic)

        // XSS
        'CWE-79' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'R', 'S' => 'C', 'C' => 'L', 'I' => 'L', 'A' => 'N'], // XSS

        // Authentication & Authorization
        'CWE-287' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'N'], // Improper Authentication
        'CWE-306' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'N'], // Missing Authentication
        'CWE-862' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'L', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'N'], // Missing Authorization
        'CWE-863' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'L', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'N'], // Incorrect Authorization
        'CWE-798' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'H'], // Hardcoded Credentials
        'CWE-522' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // Insufficiently Protected Credentials
        'CWE-640' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'N'], // Weak Password Recovery

        // Session Management
        'CWE-384' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'R', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'N'], // Session Fixation
        'CWE-613' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // Insufficient Session Expiration

        // CSRF
        'CWE-352' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'R', 'S' => 'U', 'C' => 'N', 'I' => 'H', 'A' => 'N'], // CSRF

        // Path Traversal & File Inclusion
        'CWE-22' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // Path Traversal
        'CWE-23' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // Relative Path Traversal
        'CWE-36' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // Absolute Path Traversal
        'CWE-98' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'C', 'C' => 'H', 'I' => 'H', 'A' => 'H'], // PHP File Inclusion

        // Information Exposure
        'CWE-200' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // Information Exposure
        'CWE-209' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'N', 'A' => 'N'], // Error Message Info Leak
        'CWE-532' => ['AV' => 'L', 'AC' => 'L', 'PR' => 'L', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // Info Exposure Through Log
        'CWE-548' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'N', 'A' => 'N'], // Directory Listing

        // Cryptographic Issues
        'CWE-327' => ['AV' => 'N', 'AC' => 'H', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // Broken Crypto
        'CWE-328' => ['AV' => 'N', 'AC' => 'H', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // Weak Hash
        'CWE-326' => ['AV' => 'N', 'AC' => 'H', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // Inadequate Encryption Strength
        'CWE-295' => ['AV' => 'N', 'AC' => 'H', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'N'], // Improper Certificate Validation
        'CWE-311' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // Missing Encryption of Sensitive Data

        // Deserialization
        'CWE-502' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'H'], // Deserialization of Untrusted Data

        // XML
        'CWE-611' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // XXE
        'CWE-91' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'N'], // XML Injection

        // SSRF & Open Redirect
        'CWE-918' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'C', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // SSRF
        'CWE-601' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'R', 'S' => 'C', 'C' => 'L', 'I' => 'L', 'A' => 'N'], // Open Redirect

        // Security Misconfiguration
        'CWE-16' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'L', 'A' => 'N'], // Configuration
        'CWE-1004' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'N', 'A' => 'N'], // Cookie without HttpOnly
        'CWE-614' => ['AV' => 'N', 'AC' => 'H', 'PR' => 'N', 'UI' => 'R', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'], // Cookie without Secure
        'CWE-693' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'L', 'A' => 'N'], // Protection Mechanism Failure

        // Null/Code Quality (from static analysis)
        'CWE-476' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'N', 'I' => 'N', 'A' => 'H'], // NULL Pointer Deref
        'CWE-754' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'N', 'I' => 'N', 'A' => 'L'], // Improper Check for Unusual Conditions
        'CWE-703' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'N', 'I' => 'L', 'A' => 'L'], // Improper Check or Handling of Exceptional Conditions
        'CWE-398' => ['AV' => 'N', 'AC' => 'H', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'N', 'I' => 'L', 'A' => 'N'], // Code Quality (indicator)
        'CWE-477' => ['AV' => 'N', 'AC' => 'H', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'N', 'I' => 'L', 'A' => 'N'], // Use of Obsolete Function

        // Supply Chain
        'CWE-937' => null, // Severity-based fallback for known vulnerable components
        'CWE-1104' => ['AV' => 'N', 'AC' => 'H', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'L', 'A' => 'L'], // Unmaintained Third-Party Components
        'CWE-506' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'C', 'C' => 'H', 'I' => 'H', 'A' => 'H'], // Embedded Malicious Code

        // Upload / File
        'CWE-434' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'H'], // Unrestricted Upload

        // Headers / Clickjacking
        'CWE-1021' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'R', 'S' => 'C', 'C' => 'N', 'I' => 'L', 'A' => 'N'], // Improper Restriction of Rendered UI (Clickjacking)
    ];

    /**
     * Title/description keyword patterns as a last resort before severity fallback.
     */
    private const KEYWORD_VECTORS = [
        'sql injection' => 'CWE-89',
        'sql' => 'CWE-89',
        'cross-site scripting' => 'CWE-79',
        'xss' => 'CWE-79',
        'csrf' => 'CWE-352',
        'request forgery' => 'CWE-352',
        'remote code' => 'CWE-94',
        'rce' => 'CWE-94',
        'command injection' => 'CWE-78',
        'path traversal' => 'CWE-22',
        'directory traversal' => 'CWE-22',
        'file inclusion' => 'CWE-98',
        'open redirect' => 'CWE-601',
        'ssrf' => 'CWE-918',
        'deserialization' => 'CWE-502',
        'xxe' => 'CWE-611',
        'clickjacking' => 'CWE-1021',
        'missing anti-clickjacking' => 'CWE-1021',
    ];

    /**
     * Map a finding to CVSS v3.1 base metrics.
     *
     * Priority: CWE lookup → keyword matching → severity fallback.
     */
    public function map(Finding $finding): array
    {
        $cwe = $finding->cwe ? strtoupper($finding->cwe) : '';

        if ($cwe && array_key_exists($cwe, self::CWE_VECTORS)) {
            $vector = self::CWE_VECTORS[$cwe];
            if ($vector !== null) {
                return $vector;
            }
            return $this->getMetricsBySeverity($finding->severity);
        }

        $text = strtolower($finding->title . ' ' . $finding->description);
        foreach (self::KEYWORD_VECTORS as $keyword => $mappedCwe) {
            if (str_contains($text, $keyword) && array_key_exists($mappedCwe, self::CWE_VECTORS)) {
                return self::CWE_VECTORS[$mappedCwe];
            }
        }

        return $this->getMetricsBySeverity($finding->severity);
    }

    /**
     * Map standard severity string to general CVSS v3.1 metrics.
     */
    private function getMetricsBySeverity(string $severity): array
    {
        return match (strtolower($severity)) {
            'critical' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'H'],
            'high' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'N'],
            'medium' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'L', 'A' => 'N'],
            'low' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'N', 'A' => 'N'],
            'info' => ['AV' => 'N', 'AC' => 'H', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'N', 'I' => 'N', 'A' => 'N'],
            default => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'L', 'A' => 'N'],
        };
    }
}
