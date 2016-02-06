<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

final class DblAl extends BaseAlgorithm
{
    public function __construct($input, $weights)
    {
        $result = array_map(function ($a, $b) {
            return $a * $b;
        }, str_split($input), $weights);

        // Sum individual digits.
        $result = array_reduce($result, function ($carry, $value) {
            return $carry + array_sum(str_split($value));
        }, 0);

        parent::__construct($result, 10);
    }
}
