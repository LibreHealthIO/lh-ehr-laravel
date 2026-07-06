<?php

namespace App\Security\Phi;

class PhiClassifier
{
    private array $criticalPatterns = [
        'patient',
        'prescription',
        'medicalhistory',
        'medical-history',
        'diagnosis',
        'encounter',
        'clinical',
        'facesheet',
        'face-sheet',
        'billing',
    ];

    private array $moderatePatterns = [
        'user',
        'address',
        'facility',
        'facilities',
        'calendar',
        'appointment',
    ];

    /**
     * Classify a file path into a PHI Tier.
     *
     * @param string|null $filePath
     * @return string
     */
    public function classifyPath(?string $filePath): string
    {
        if (empty($filePath)) {
            return 'Non-PHI';
        }

        $normalizedPath = strtolower($filePath);

        foreach ($this->criticalPatterns as $pattern) {
            if (str_contains($normalizedPath, $pattern)) {
                return 'Critical';
            }
        }

        foreach ($this->moderatePatterns as $pattern) {
            if (str_contains($normalizedPath, $pattern)) {
                return 'Moderate';
            }
        }

        return 'Non-PHI';
    }

    /**
     * Classify a URL path into a PHI Tier.
     *
     * @param string|null $url
     * @return string
     */
    public function classifyUrl(?string $url): string
    {
        if (empty($url)) {
            return 'Non-PHI';
        }

        $normalizedUrl = strtolower($url);

        foreach ($this->criticalPatterns as $pattern) {
            if (str_contains($normalizedUrl, $pattern)) {
                return 'Critical';
            }
        }

        foreach ($this->moderatePatterns as $pattern) {
            if (str_contains($normalizedUrl, $pattern)) {
                return 'Moderate';
            }
        }

        return 'Non-PHI';
    }
}
