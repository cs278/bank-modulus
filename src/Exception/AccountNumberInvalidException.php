<?php

namespace Cs278\BankModulus\Exception;

final class AccountNumberInvalidException extends InvalidArgumentException
{
    public static function create(string $accountNumber, \Exception $e = null): self
    {
        return new self(sprintf(
            '`%s` is not a valid account number',
            Util::maskAccountNumber($accountNumber)
        ), 0, $e);
    }
}
