<?php

namespace App\Security\Gate;

class SecurityGate
{
    private float $scoreThreshold;
    private array $phiTiers;

    public function __construct(float $scoreThreshold = 7.0, array $phiTiers = ['Critical', 'Moderate'])
    {
        $this->scoreThreshold = $scoreThreshold;
        $this->phiTiers = $phiTiers;
    }

    /**
     * Evaluate scored findings against the security gate criteria.
     *
     * @param array $scoredFindings
     * @return GateResult
     */
    public function evaluate(array $scoredFindings): GateResult
    {
        $violatingFindings = [];
        $gateViolated = false;

        foreach ($scoredFindings as $sf) {
            $score = $sf['cvss_adjusted'] ?? 0.0;
            $phiTier = $sf['phi_tier'] ?? 'Non-PHI';    

            if ($score >= $this->scoreThreshold && in_array($phiTier, $this->phiTiers)) {
                $gateViolated = true;
                $violatingFindings[] = $sf;
            }
        }

        return new GateResult($gateViolated, $violatingFindings);
    }
}
