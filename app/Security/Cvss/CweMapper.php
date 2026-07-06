<?php

namespace App\Security\Cvss;

use App\Security\Findings\Finding;

class CweMapper
{
    
    private const ZAP_ALERT_CWE = [
        'sql injection'                     => 'CWE-89',
        'cross site scripting'              => 'CWE-79',
        'cross-site scripting'              => 'CWE-79',
        'path traversal'                    => 'CWE-22',
        'remote file inclusion'             => 'CWE-98',
        'remote code execution'             => 'CWE-94',
        'external redirect'                 => 'CWE-601',
        'open redirect'                     => 'CWE-601',
        'server side request forgery'       => 'CWE-918',
        'csrf'                              => 'CWE-352',
        'cross-site request forgery'        => 'CWE-352',
        'clickjacking'                      => 'CWE-1021',
        'missing anti-clickjacking'         => 'CWE-1021',
        'x-frame-options'                   => 'CWE-1021',
        'content security policy'           => 'CWE-693',
        'csp'                               => 'CWE-693',
        'strict-transport-security'         => 'CWE-311',
        'cookie without httponly'           => 'CWE-1004',
        'cookie no httponly'                => 'CWE-1004',
        'cookie without secure'             => 'CWE-614',
        'cookie without samesite'           => 'CWE-1275',
        'directory browsing'                => 'CWE-548',
        'directory listing'                 => 'CWE-548',
        'information disclosure'            => 'CWE-200',
        'server leaks'                      => 'CWE-200',
        'x-content-type-options'            => 'CWE-693',
        'application error'                 => 'CWE-209',
        'stack trace'                       => 'CWE-209',
        'private ip'                        => 'CWE-200',
        'insecure authentication'           => 'CWE-287',
        'session fixation'                  => 'CWE-384',
        'xxe'                               => 'CWE-611',
        'xml external entity'               => 'CWE-611',
    ];

    public function resolve(Finding $finding): string
    {
        if ($finding->source === 'composer-audit') {
            return ($finding->metadata['isAbandoned'] ?? false) ? 'CWE-1104' : 'CWE-937';
        }

        if ($finding->source === 'phpstan') {
            return $this->resolveFromPhpStan($finding->description);
        }

        if ($finding->source === 'zap') {
            return $this->resolveFromZapAlert($finding->title, $finding->description);
        }

        return 'CWE-693'; 
    }

    private function resolveFromPhpStan(string $description): string
    {
        $desc = strtolower($description);

        if (str_contains($desc, 'null')) {
            return 'CWE-476';
        }
        if (str_contains($desc, 'undefined') || str_contains($desc, 'does not exist')) {
            return 'CWE-398';
        }
        if (str_contains($desc, 'deprecated')) {
            return 'CWE-477';
        }

        return 'CWE-703';
    }

    private function resolveFromZapAlert(string $title, string $description): string
    {
        $text = strtolower($title . ' ' . $description);

        foreach (self::ZAP_ALERT_CWE as $keyword => $cwe) {
            if (str_contains($text, $keyword)) {
                return $cwe;
            }
        }

        return 'CWE-693';
    }
}
