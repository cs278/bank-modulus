<?php

namespace Cs278\BankModulus\Mock;

use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\Exception\CannotValidateException;
use Cs278\BankModulus\Spec\SpecInterface;

final class SpecUnknown implements SpecInterface
{
    public function check(BankAccountNormalized $bankAccount)
    {
        throw CannotValidateException::createFromBankAccount($bankAccount);
    }
}
