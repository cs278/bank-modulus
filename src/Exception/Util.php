<?php

namespace Cs278\BankModulus\Exception;

use Cs278\BankModulus\SortCode;
use Cs278\BankModulus\StringUtil;

final class Util
{
    /**
     * @param string $accountNumber
     *
     * @return string
     */
    public static function maskAccountNumber($accountNumber)
    {
        return self::maskString($accountNumber, 8);
    }

    /**
     * @param string $string
     * @param int    $minLength
     *
     * @return string
     */
    public static function maskString($string, $minLength)
    {
        if (\strlen($string) >= max($minLength, 3)) {
            return StringUtil::regexReplaceCallback($string, '{^(.)(.+)(.)$}', function ($m) {
                return $m[1].str_repeat('*', \strlen($m[2])).$m[3];
            });
        }

        return str_repeat('*', \strlen($string));
    }

    /** @return string */
    public static function maskSortCode(SortCode $sortCode)
    {
        return $sortCode->format('%1$s-**-%3$s');
    }

    /** @return InvalidArgumentException */
    public static function wrap(\InvalidArgumentException $e)
    {
        if ($e instanceof InvalidArgumentException) {
            return $e;
        }

        return new InvalidArgumentException($e->getMessage(), $e->getCode(), $e);
    }
}
