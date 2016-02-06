<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

final class Mod10 extends BaseAlgorithm
{
    public function __construct($input, $weights)
    {
        parent::__construct(
            array_sum(array_map(function ($a, $b) {
                return $a * $b;
            }, str_split($input), $weights)),
            10
        );
    }
}
