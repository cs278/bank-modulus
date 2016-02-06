<?php

namespace Cs278\BankModulus\Exception;

use Cs278\BankModulus\SortCode;

final class Util
{
    public static function maskAccountNumber($accountNumber)
    {
        if (strlen($accountNumber) >= 8) {
            return preg_replace_callback('{^(.)(.+)(.)$}', function ($m) {
                return $m[1].str_repeat('*', strlen($m[2])).$m[3];
            }, $accountNumber);
        }

        return str_repeat('*', strlen($accountNumber));
    }

    public static function maskSortCode(SortCode $sortCode)
    {
        return $sortCode->format('%1$s-**-%3$s');
    }
}
