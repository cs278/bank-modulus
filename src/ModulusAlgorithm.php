<?php

namespace Cs278\BankModulus;

final class ModulusAlgorithm
{
    public static function mod10($input, array $weights)
    {
        // var_dump($input, $weights);
        return self::calculateMod($input, $weights) % 10;
    }

    public static function mod11($input, array $weights)
    {
        return self::calculateMod($input, $weights) % 11;
    }

    public static function dblAl($input, array $weights)
    {
        return self::calculateDblAl($input, $weights) % 10;
    }

    public static function calculateMod($input, array $weights)
    {
        $checksum = self::applyWeights($input, $weights);

        return array_sum($checksum);
    }

    public static function calculateDblAl($input, array $weights)
    {
        $checksum = self::applyWeights($input, $weights);

        // Sum individual digits.
        $checksum = array_reduce($checksum, function ($carry, $value) {
            return $carry + array_sum(str_split($value));
        }, 0);

        return $checksum % 10;
    }

    private static function applyWeights($input, array $weights)
    {
        return array_map(function ($a, $b) {
            return $a * $b;
        }, str_split($input), $weights);
    }
}