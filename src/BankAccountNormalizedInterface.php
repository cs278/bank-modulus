<?php

namespace Cs278\BankModulus;

interface BankAccountNormalizedInterface extends BankAccountInterface
{
    /** @return BankAccountInterface */
    public function getOriginalBankAccount();
}
