<?php

namespace Cs278\BankModulus\Exception;

use Cs278\BankModulus\BankAccountInterface;
use Cs278\BankModulus\BankAccountNormalized;

final class CannotValidateException extends \RuntimeException implements Exception
{
    public static function createFromBankAccount(BankAccountInterface $bankAccount, \Exception $e = null)
    {
        if ($bankAccount instanceof BankAccountNormalized) {
            $bankAccount = $bankAccount->getOriginalBankAccount();
        }

        $details = sprintf(
            '%s %s',
            Util::maskSortCode($bankAccount->getSortCode()),
            Util::maskAccountNumber($bankAccount->getAccountNumber())
        );

        return new self(
            sprintf('Unable to determine if the bank details `%s` are valid or invalid', $details),
            0,
            $e
        );
    }
}
