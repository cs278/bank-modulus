<?php

namespace Cs278\BankModulus\Exception;

final class SortCodeInvalidException extends InvalidArgumentException
{
    /**
     * @param string $sortCode
     *
     * @return self
     */
    public static function create($sortCode, \Exception $e = null)
    {
        return new self(sprintf(
            '`%s` is not a valid sort code',
            Util::maskString($sortCode, 6)
        ), 0, $e);
    }
}
