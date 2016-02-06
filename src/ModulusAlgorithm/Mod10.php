<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

final class Mod10 implements AlgorithmInterface
{
    private $result;

    public function __construct($input, $weights)
    {
        $this->result = array_sum(array_map(function ($a, $b) {
            return $a * $b;
        }, str_split($input), $weights));
    }

    public function quotient()
    {
        return intdiv($this->result, 10);
    }

    public function remainder()
    {
        return $this->result % 10;
    }

    public function check()
    {
        return 0 === $this->remainder();
    }
}
