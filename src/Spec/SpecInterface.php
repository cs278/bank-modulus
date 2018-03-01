<?php

namespace Cs278\BankModulus\Spec;

use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\Exception\CannotValidateException;

interface SpecInterface
{
    /**
     * Check if bank account is valid.
     *
     * @param BankAccountNormalized $bankAccount
     *
     * @throws CannotValidateException If the supplied sort code is unknown
     *
     * @return bool
     */
    public function check(BankAccountNormalized $bankAccount);
}
