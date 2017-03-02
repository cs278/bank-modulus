<?php

declare(strict_types=1);

namespace Cs278\BankModulus\ModulusAlgorithm;

final class Mod11 extends BaseAlgorithm
{
    /**
     * @param string $input
     * @param array  $weights
     */
    public function __construct(string $input, array $weights)
    {
        parent::__construct(
            array_sum(array_map(function ($a, $b) {
                return $a * $b;
            }, str_split($input), $weights)),
            11
        );
    }
}
