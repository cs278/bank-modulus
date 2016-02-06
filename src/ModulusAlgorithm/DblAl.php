<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

final class DblAl implements AlgorithmInterface
{
    private $result;

    public function __construct($input, $weights)
    {
        $result = array_map(function ($a, $b) {
            return $a * $b;
        }, str_split($input), $weights);

        // Sum individual digits.
        $this->result = array_reduce($result, function ($carry, $value) {
            return $carry + array_sum(str_split($value));
        }, 0);
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
