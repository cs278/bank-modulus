<?php

declare(strict_types=1);

namespace Cs278\BankModulus\ModulusAlgorithm;

interface AlgorithmInterface
{
    /** @return int */
    public function quotient(): int;

    /** @return int */
    public function remainder(): int;

    /** @return bool */
    public function check(): bool;
}
