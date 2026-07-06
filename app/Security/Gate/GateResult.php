<?php

namespace App\Security\Gate;

class GateResult
{
    public bool $isViolated;
    public array $violatingFindings;

    public function __construct(bool $isViolated, array $violatingFindings)
    {
        $this->isViolated = $isViolated;
        $this->violatingFindings = $violatingFindings;
    }
}
