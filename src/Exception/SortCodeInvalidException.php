<?php

namespace Cs278\BankModulus\Exception;

final class SortCodeInvalidException extends InvalidArgumentException
{
    public static function create(string $sortCode, \Exception $e = null): self
    {
        return new self(sprintf(
            '`%s` is not a valid sort code',
            Util::maskString($sortCode, 6)
        ), 0, $e);
    }
}
