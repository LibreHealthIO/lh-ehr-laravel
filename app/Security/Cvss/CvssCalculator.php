<?php

namespace App\Security\Cvss;

class CvssCalculator
{
    /**
     * Run standard CVSS v3.1 mathematical calculations.
     *
     * @param array $metrics
     * @return float
     */
    public function calculate(array $metrics): float
    {
        $avMap = ['N' => 0.85, 'A' => 0.62, 'L' => 0.55, 'P' => 0.20];
        $acMap = ['L' => 0.77, 'H' => 0.44];
        $prMap = [
            'U' => ['N' => 0.85, 'L' => 0.62, 'H' => 0.27],
            'C' => ['N' => 0.85, 'L' => 0.68, 'H' => 0.50]
        ];
        $uiMap = ['N' => 0.85, 'R' => 0.62];
        $ciaMap = ['N' => 0.00, 'L' => 0.22, 'H' => 0.56];

        $av = $metrics['AV'] ?? 'N';
        $ac = $metrics['AC'] ?? 'L';
        $pr = $metrics['PR'] ?? 'N';
        $ui = $metrics['UI'] ?? 'N';
        $s = $metrics['S'] ?? 'U';
        $c = $metrics['C'] ?? 'N';
        $i = $metrics['I'] ?? 'N';
        $a = $metrics['A'] ?? 'N';

        $avVal = $avMap[$av] ?? 0.85;
        $acVal = $acMap[$ac] ?? 0.77;
        $prVal = $prMap[$s][$pr] ?? 0.85;
        $uiVal = $uiMap[$ui] ?? 0.85;
        $cVal = $ciaMap[$c] ?? 0.00;
        $iVal = $ciaMap[$i] ?? 0.00;
        $aVal = $ciaMap[$a] ?? 0.00;

        $iss = 1.0 - (1.0 - $cVal) * (1.0 - $iVal) * (1.0 - $aVal);
        
        if ($s === 'U') {
            $impact = 6.42 * $iss;
        } else {
            $impact = 7.52 * ($iss - 0.029) - 3.25 * pow($iss - 0.029, 15);
        }

        $exploitability = 8.22 * $avVal * $acVal * $prVal * $uiVal;

        if ($impact <= 0) {
            return 0.0;
        }

        if ($s === 'U') {
            $score = $impact + $exploitability;
        } else {
            $score = 1.08 * ($impact + $exploitability);
        }

        return min(10.0, ceil(round($score, 9) * 10) / 10);
    }

    /**
     * Build standard CVSS v3.1 vector string.
     *
     * @param array $metrics
     * @return string
     */
    public function buildVectorString(array $metrics): string
    {
        return sprintf(
            'CVSS:3.1/AV:%s/AC:%s/PR:%s/UI:%s/S:%s/C:%s/I:%s/A:%s',
            $metrics['AV'] ?? 'N',
            $metrics['AC'] ?? 'L',
            $metrics['PR'] ?? 'N',
            $metrics['UI'] ?? 'N',
            $metrics['S'] ?? 'U',
            $metrics['C'] ?? 'N',
            $metrics['I'] ?? 'N',
            $metrics['A'] ?? 'N'
        );
    }
}
