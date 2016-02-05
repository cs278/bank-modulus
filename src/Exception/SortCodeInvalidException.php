<?php

namespace Cs278\BankModulus\Exception;

final class SortCodeInvalidException extends \LogicException implements Exception
{
    public static function create($sortCode, \Exception $e = null)
    {
        return new self(sprintf(
            '`%s` is not a valid sort code',
            $sortCode
        ), 0, null);
    }
}
