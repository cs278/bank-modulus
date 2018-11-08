<?php

declare(strict_types=1);

namespace Cs278\BankModulus\ModulusAlgorithm;

final class DblAl extends BaseAlgorithm
{
    public function __construct(string $input, array $weights)
    {
        $result = array_map(function ($a, $b) {
            return (string) ($a * $b);
        }, self::toChars($input), $weights);

        // Sum individual digits.
        $result = array_reduce($result, function ($carry, $value) {
            return $carry + array_sum(self::toChars($value));
        }, 0);

        parent::__construct($result, 10);
    }
}
