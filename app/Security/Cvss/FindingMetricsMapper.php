<?php

namespace App\Security\Cvss;

use App\Security\Findings\Finding;

class FindingMetricsMapper
{
    /**
     * Map finding attributes to standard CVSS v3.1 metrics.
     *
     * @param Finding $finding
     * @return array
     */
    public function map(Finding $finding): array
    {
        $cwe = $finding->cwe ? strtoupper($finding->cwe) : '';
        $title = strtolower($finding->title);
        $desc = strtolower($finding->description);

        if ($cwe) {
            if (str_contains($cwe, 'CWE-89')) {
                return ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'C', 'C' => 'H', 'I' => 'H', 'A' => 'H'];
            }
            if (str_contains($cwe, 'CWE-79')) {
                return ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'R', 'S' => 'C', 'C' => 'L', 'I' => 'L', 'A' => 'N'];
            }
            if (str_contains($cwe, 'CWE-352')) {
                return ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'R', 'S' => 'U', 'C' => 'L', 'I' => 'L', 'A' => 'L'];
            }
            if (str_contains($cwe, 'CWE-94') || str_contains($cwe, 'CWE-78') || str_contains($cwe, 'CWE-506')) {
                return ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'C', 'C' => 'H', 'I' => 'H', 'A' => 'H'];
            }
            if (str_contains($cwe, 'CWE-22') || str_contains($cwe, 'CWE-23') || str_contains($cwe, 'CWE-36')) {
                return ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'N', 'A' => 'N'];
            }
            if (str_contains($cwe, 'CWE-476')) {
                return ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'N', 'I' => 'N', 'A' => 'H'];
            }
            if (str_contains($cwe, 'CWE-1104')) {
                return ['AV' => 'N', 'AC' => 'H', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'L', 'A' => 'L'];
            }
            if (str_contains($cwe, 'CWE-937')) {
                return $this->getMetricsBySeverity($finding->severity);
            }
        }

        if (str_contains($title, 'sql') || str_contains($desc, 'sql injection')) {
            return ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'C', 'C' => 'H', 'I' => 'H', 'A' => 'H'];
        }
        if (str_contains($title, 'xss') || str_contains($desc, 'cross-site scripting')) {
            return ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'R', 'S' => 'C', 'C' => 'L', 'I' => 'L', 'A' => 'N'];
        }
        if (str_contains($title, 'csrf') || str_contains($desc, 'request forgery')) {
            return ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'R', 'S' => 'U', 'C' => 'L', 'I' => 'L', 'A' => 'L'];
        }
        if (str_contains($title, 'rce') || str_contains($title, 'execute') || str_contains($desc, 'remote code')) {
            return ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'C', 'C' => 'H', 'I' => 'H', 'A' => 'H'];
        }

        return $this->getMetricsBySeverity($finding->severity);
    }

    /**
     * Map standard severity string to general CVSS v3.1 metrics.
     *
     * @param string $severity
     * @return array
     */
    private function getMetricsBySeverity(string $severity): array
    {
        return match (strtolower($severity)) {
            'critical' => ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'H'],
            'high' =>     ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'H', 'I' => 'H', 'A' => 'N'],
            'medium' =>   ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'L', 'A' => 'N'],
            'low' =>      ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'N', 'A' => 'N'],
            'info' =>     ['AV' => 'N', 'AC' => 'H', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'N', 'I' => 'N', 'A' => 'N'],
            default =>    ['AV' => 'N', 'AC' => 'L', 'PR' => 'N', 'UI' => 'N', 'S' => 'U', 'C' => 'L', 'I' => 'L', 'A' => 'N'],
        };
    }
}
