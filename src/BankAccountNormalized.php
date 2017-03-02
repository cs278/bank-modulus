<?php

declare(strict_types=1);

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\Util as E;
use Webmozart\Assert\Assert;

final class BankAccountNormalized implements BankAccountInterface
{
    private $bankAccount;
    private $sortCode;
    private $accountNumber;

    const LENGTH = 8;

    /**
     * @param BankAccountInterface $bankAccount
     * @param string|SortCode      $sortCode
     * @param string               $accountNumber
     */
    public function __construct(BankAccountInterface $bankAccount, $sortCode, string $accountNumber)
    {
        try {
            if (!$sortCode instanceof SortCode) {
                Assert::string($sortCode, 'Sort code must be a string or instance of SortCode');

                $sortCode = SortCode::create($sortCode);
            }
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

    public static function createFromBankAccount(BankAccountInterface $bankAccount): self
    {
        return new self(
            $bankAccount,
            $bankAccount->getSortCode(),
            $bankAccount->getAccountNumber()
        );
    }

    /** @return BankAccountInterface */
    public function getOriginalBankAccount(): BankAccountInterface
    {
        return $this->bankAccount;
    }

    /** @return SortCode */
    public function getSortCode(): SortCode
    {
        return $this->sortCode;
    }

    /** @return string */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /** @return string */
    public function __toString(): string
    {
        return $this->sortCode->format('%s%s%s').$this->accountNumber;
    }
}
