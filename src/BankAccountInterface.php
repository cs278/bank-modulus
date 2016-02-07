<?php

namespace Cs278\BankModulus;

interface BankAccountInterface
{
    /** @return SortCode */
    public function getSortCode();

    /** @return string */
    public function getAccountNumber();
}
