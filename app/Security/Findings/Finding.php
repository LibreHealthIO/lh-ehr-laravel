<?php

namespace App\Security\Findings;

class Finding
{
    public string $id;
    public string $source;
    public string $title;
    public string $description;
    public string $severity;
    public ?string $file;
    public ?int $line;
    public ?string $url;
    public ?string $cwe;
    public ?float $cvss_base;
    public ?string $phi_tier;
    public ?float $cvss_adjusted;
    public array $metadata;

    public function __construct(
        string $source,
        string $title,
        string $description,
        string $severity,
        ?string $file = null,
        ?int $line = null,
        ?string $url = null,
        ?string $cwe = null,
        ?float $cvss_base = null,
        ?string $phi_tier = null,
        ?float $cvss_adjusted = null,
        array $metadata = []
    ) {
        if ($cwe !== null) {
            $cwe = strtoupper($cwe);
            $cwe = str_starts_with($cwe, 'CWE-') ? $cwe : 'CWE-' . $cwe;
        }

        $this->source = $source;
        $this->title = $title;
        $this->description = $description;
        $this->severity = $severity;
        $this->file = $file;
        $this->line = $line;
        $this->url = $url;
        $this->cwe = $cwe;
        $this->cvss_base = $cvss_base;
        $this->phi_tier = $phi_tier;
        $this->cvss_adjusted = $cvss_adjusted;
        $this->metadata = $metadata;

        $this->id = md5(implode('_', [
            $source,
            $title,
            $file ?? '',
            $line ?? '',
            $url ?? '',
            $cwe ?? '',
            substr(md5($description), 0, 12),
        ]));
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'source' => $this->source,
            'title' => $this->title,
            'description' => $this->description,
            'severity' => $this->severity,
            'file' => $this->file,
            'line' => $this->line,
            'url' => $this->url,
            'cwe' => $this->cwe,
            'cvss_base' => $this->cvss_base,
            'phi_tier' => $this->phi_tier,
            'cvss_adjusted' => $this->cvss_adjusted,
            'metadata' => $this->metadata,
        ];
    }
}
