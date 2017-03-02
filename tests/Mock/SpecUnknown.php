<?php

declare(strict_types=1);

namespace Cs278\BankModulus\Mock;

use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\Exception\CannotValidateException;
use Cs278\BankModulus\Spec\SpecInterface;

final class SpecUnknown implements SpecInterface
{
    public function check(BankAccountNormalized $bankAccount): bool
    {
        throw CannotValidateException::createFromBankAccount($bankAccount);
    }
}
