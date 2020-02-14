<?php

namespace Cs278\BankModulus;

interface BankAccountNormalizedInterface extends BankAccountInterface
{
    const ACCOUNT_NUMBER_LENGTH = 8;

    /** @return BankAccountInterface */
    public function getOriginalBankAccount();
}
