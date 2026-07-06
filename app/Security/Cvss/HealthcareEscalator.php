<?php

namespace App\Security\Cvss;

class HealthcareEscalator
{
    /**
     * Apply healthcare-specific risk escalation rules for PHI exposure.
     *
     * @param array $metrics
     * @param string $phiTier
     * @return array Escalated metrics
     */
    public function escalate(array $metrics, string $phiTier): array
    {
        $escalated = $metrics;

        if ($phiTier === 'Critical') {
            $escalated['S'] = 'C';
            $escalated['C'] = 'H';
            $escalated['I'] = 'H';
            if (($escalated['A'] ?? 'N') === 'N') {
                $escalated['A'] = 'L';
            }
        } elseif ($phiTier === 'Moderate') {
            if (($escalated['C'] ?? 'N') === 'N') {
                $escalated['C'] = 'L';
            }
            if (($escalated['I'] ?? 'N') === 'N') {
                $escalated['I'] = 'L';
            }
        }

        return $escalated;
    }
}
