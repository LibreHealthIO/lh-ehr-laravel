<?php

namespace App\Security\Gate;

class SecurityGate
{
    private float $generalThreshold;
    private float $phiThreshold;
    private array $phiTiers;

    public function __construct(
        float $generalThreshold = 8.5,
        float $phiThreshold = 7.0,
        array $phiTiers = ['Critical', 'Moderate']
    ) {
        $this->generalThreshold = $generalThreshold;
        $this->phiThreshold = $phiThreshold;
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

        foreach ($scoredFindings as $sf) {
            $score = $sf['cvss_adjusted'] ?? 0.0;
            $phiTier = $sf['phi_tier'] ?? 'Non-PHI';    

            $violatesGeneral = $score >= $this->generalThreshold;
            $violatesPhi = in_array($phiTier, $this->phiTiers, true) && $score >= $this->phiThreshold;

            if ($violatesGeneral || $violatesPhi) {
                $violatingFindings[] = $sf;
            }
        }

        $gateViolated = !empty($violatingFindings);

        return new GateResult($gateViolated, $violatingFindings);
    }
}
