<?php

namespace App\Security\Gate;

class GateResult
{
    public function __construct(
        public readonly bool $isViolated,
        public readonly array $violatingFindings
    ) {}
}
