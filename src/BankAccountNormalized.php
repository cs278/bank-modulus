<?php

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\Util as E;
use Webmozart\Assert\Assert;

final class BankAccountNormalized implements BankAccountInterface
{
    private $bankAccount;
    private $sortCode;
    private $accountNumber;

    const LENGTH = 8;

    public function __construct(BankAccountInterface $bankAccount, $sortCode, $accountNumber)
    {
        try {
            if (!$sortCode instanceof SortCode) {
                Assert::string($sortCode, 'Sort code must be a string or instance of SortCode');

                $sortCode = SortCode::create($sortCode);
            }

            Assert::string($accountNumber, 'Account number must be a string');
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        $this->bankAccount = $bankAccount;
        $this->sortCode = $sortCode;
        $this->accountNumber = preg_replace('{[^0-9]}', '', $accountNumber);

        if (self::LENGTH !== strlen($this->accountNumber)) {
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
