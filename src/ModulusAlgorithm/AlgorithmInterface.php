<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

interface AlgorithmInterface
{
    /** @return int */
    public function quotient();

    /** @return int */
    public function remainder();

    /** @return bool */
    public function check();
}
