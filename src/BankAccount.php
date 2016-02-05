<?php

namespace Cs278\BankModulus;

final class BankAccount implements BankAccountInterface
{
    private $sortCode;
    private $accountNumber;

    public function __construct($sortCode, $accountNumber)
    {
        $this->sortCode = new SortCode(preg_replace('{[^0-9]}', '', $sortCode));
        $this->accountNumber = preg_replace('{[^0-9]}', '', $accountNumber);
    }

    public function getSortCode()
    {
        return $this->sortCode;
    }

    public function getAccountNumber()
    {
        return $this->accountNumber;
    }
}
