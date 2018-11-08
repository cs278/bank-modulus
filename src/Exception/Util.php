<?php

namespace Cs278\BankModulus\Exception;

use Cs278\BankModulus\SortCode;
use Cs278\BankModulus\StringUtil;

final class Util
{
    public static function maskAccountNumber(string $accountNumber): string
    {
        return self::maskString($accountNumber, 8);
    }

    public static function maskString(string $string, int $minLength): string
    {
        if (strlen($string) >= max($minLength, 3)) {
            return StringUtil::regexReplaceCallback($string, '{^(.)(.+)(.)$}', function ($m) {
                return $m[1].str_repeat('*', strlen($m[2])).$m[3];
            });
        }

        return str_repeat('*', strlen($string));
    }

    public static function maskSortCode(SortCode $sortCode): string
    {
        return $sortCode->format('%1$s-**-%3$s');
    }
}
