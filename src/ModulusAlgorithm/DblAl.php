<?php

declare(strict_types=1);

namespace Cs278\BankModulus\ModulusAlgorithm;

final class DblAl extends BaseAlgorithm
{
    /**
     * @param string $input
     * @param array  $weights
     */
    public function __construct(string $input, array $weights)
    {
        $result = array_map(function ($a, $b) {
            return $a * $b;
        }, str_split($input), $weights);

        // Sum individual digits.
        $result = array_reduce($result, function ($carry, $value) {
            return $carry + array_sum(str_split((string) $value));
        }, 0);

        parent::__construct($result, 10);
    }
}
