<?php

declare(strict_types=1);

namespace Cs278\BankModulus\ModulusAlgorithm;

final class Mod11 extends BaseAlgorithm
{
    public function __construct(string $input, array $weights)
    {
        $result = array_sum(array_map(function ($a, $b) {
            return $a * $b;
        }, self::toChars($input), $weights));
        assert(is_int($result));

        parent::__construct(
            $result,
            11
        );
    }
}
