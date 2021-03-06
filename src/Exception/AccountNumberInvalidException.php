<?php

namespace Cs278\BankModulus\Exception;

final class AccountNumberInvalidException extends InvalidArgumentException
{
    /**
     * @param string $accountNumber
     *
     * @return self
     */
    public static function create($accountNumber, \Exception $e = null)
    {
        return new self(sprintf(
            '`%s` is not a valid account number',
            Util::maskAccountNumber($accountNumber)
        ), 0, $e);
    }
}
