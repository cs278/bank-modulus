<?php

declare(strict_types=1);

namespace Cs278\BankModulus\Spec;

use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\Exception\CannotValidateException;

interface SpecInterface
{
    /**
     * Check if bank account is valid.
     *
     * @throws CannotValidateException If the supplied sort code is unknown
     */
    public function check(BankAccountNormalized $bankAccount): bool;
}
