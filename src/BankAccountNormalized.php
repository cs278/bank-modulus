<?php

namespace Cs278\BankModulus;

final class BankAccountNormalized implements BankAccountInterface
{
    private $bankAccount;
    private $sortCode;
    private $accountNumber;

    public function __construct(BankAccountInterface $bankAccount, $sortCode, $accountNumber)
    {
        $this->bankAccount = $bankAccount;
        $this->sortCode = $sortCode instanceof SortCode ? $sortCode : new SortCode(preg_replace('{[^0-9]}', '', $sortCode));
        $this->accountNumber = preg_replace('{[^0-9]}', '', $accountNumber);

        if (8 !== strlen($this->accountNumber)) {
            throw Exception\AccountNumberInvalidException::create($accountNumber);
        }
    }

    public static function createFromBankAccount(BankAccountInterface $bankAccount)
    {
        return new self(
            $bankAccount,
            $bankAccount->getSortCode(),
            $bankAccount->getAccountNumber()
        );
    }

    public function getOriginalBankAccount()
    {
        return $this->bankAccount;
    }

    public function getSortCode()
    {
        return $this->sortCode;
    }

    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    public function __toString()
    {
        return $this->sortCode->format('%s%s%s').$this->accountNumber;
    }
}
