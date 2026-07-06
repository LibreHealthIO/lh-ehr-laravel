<?php

namespace App\Security\Cvss;

use App\Security\Findings\Finding;

class CweMapper
{
    /**
     * Resolve CWE ID for a finding.
     *
     * @param Finding $finding
     * @return string
     */
    public function resolve(Finding $finding): string
    {
        if ($finding->source === 'composer-audit') {
            if ($finding->metadata['isAbandoned'] ?? false) {
                return 'CWE-1104'; 
            }
            return 'CWE-937'; 
        }

        if ($finding->source === 'phpstan') {
            $desc = strtolower($finding->description);
            if (str_contains($desc, 'null')) {
                return 'CWE-476';
            }
            if (str_contains($desc, 'undefined')) {
                return 'CWE-398';
            }
            if (str_contains($desc, 'deprecated')) {
                return 'CWE-477'; 
            }
            return 'CWE-703'; 
        }

        return 'CWE-398';
    }
}
