<?php

declare(strict_types=1);

namespace Cs278\BankModulus;

final class BankAccountNormalized implements BankAccountInterface
{
    /** @var BankAccountInterface */
    private $bankAccount;

    /** @var SortCode */
    private $sortCode;

    /** @var string */
    private $accountNumber;

    const LENGTH = 8;

    /**
     * @param SortCode|string $sortCode
     */
    public function __construct(BankAccountInterface $bankAccount, $sortCode, string $accountNumber)
    {
        if (!$sortCode instanceof SortCode) {
            Assert::string($sortCode, 'Sort code must be a string or instance of SortCode');

            $sortCode = SortCode::create($sortCode);
        }

        $this->bankAccount = $bankAccount;
        $this->sortCode = $sortCode;
        $this->accountNumber = StringUtil::removeNonDigits($accountNumber);

        if (self::LENGTH !== strlen($this->accountNumber)) {
            throw Exception\AccountNumberInvalidException::create($accountNumber);
        }
    }

    /**
     * Create new instance from bank account object.
     *
     * @param BankAccountInterface $bankAccount Must be already normalized for this to work
     */
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
