<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

final class Mod10 extends BaseAlgorithm
{
    /**
     * @param string $input
     * @param int[]  $weights
     */
    public function __construct($input, array $weights)
    {
        \assert(\strlen($input) === \count($weights));

        $result = array_sum(array_map(function ($a, $b) {
            return $a * $b;
        }, self::toChars($input), $weights));
        \assert(\is_int($result));

        parent::__construct(
            $result,
            10
        );
    }
}
