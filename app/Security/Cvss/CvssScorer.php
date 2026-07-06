<?php

namespace App\Security\Cvss;

use App\Security\Findings\Finding;
use App\Security\Phi\PhiClassifier;

class CvssScorer
{
    private PhiClassifier $phiClassifier;
    private CweMapper $cweMapper;
    private FindingMetricsMapper $metricsMapper;
    private CvssCalculator $calculator;
    private HealthcareEscalator $escalator;

    public function __construct(
        ?PhiClassifier $phiClassifier = null,
        ?CweMapper $cweMapper = null,
        ?FindingMetricsMapper $metricsMapper = null,
        ?CvssCalculator $calculator = null,
        ?HealthcareEscalator $escalator = null
    ) {
        $this->phiClassifier = $phiClassifier ?? new PhiClassifier();
        $this->cweMapper = $cweMapper ?? new CweMapper();
        $this->metricsMapper = $metricsMapper ?? new FindingMetricsMapper();
        $this->calculator = $calculator ?? new CvssCalculator();
        $this->escalator = $escalator ?? new HealthcareEscalator();
    }

    /**
     * Score a finding: map to CWE, assign base score, determine PHI tier, and calculate adjusted score.
     *
     * @param Finding $finding
     * @return Finding The scored finding
     */
    public function score(Finding $finding): Finding
    {
        if (empty($finding->cwe)) {
            $finding->cwe = $this->cweMapper->resolve($finding);
        }

        $finding->phi_tier = $this->classifyPhi($finding);

        $baseMetrics = $this->metricsMapper->map($finding);

        $finding->cvss_base = $this->calculator->calculate($baseMetrics);

        $adjustedMetrics = $this->escalator->escalate($baseMetrics, $finding->phi_tier);
        $finding->cvss_adjusted = $this->calculator->calculate($adjustedMetrics);

        $finding->metadata['cvss_base_vector'] = $this->calculator->buildVectorString($baseMetrics);
        $finding->metadata['cvss_adjusted_vector'] = $this->calculator->buildVectorString($adjustedMetrics);
        $finding->metadata['cvss_vector'] = $finding->metadata['cvss_adjusted_vector'];

        return $finding;
    }

    /**
     * Classify PHI tier for a finding.
     *
     * @param Finding $finding
     * @return string
     */
    private function classifyPhi(Finding $finding): string
    {
        if (!empty($finding->file)) {
            return $this->phiClassifier->classifyPath($finding->file);
        }

        if (!empty($finding->url)) {
            return $this->phiClassifier->classifyUrl($finding->url);
        }

        return 'Non-PHI';
    }
}
