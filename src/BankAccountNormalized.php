<?php

declare(strict_types=1);

namespace Cs278\BankModulus;

final class BankAccountNormalized implements BankAccountInterface
{
    /** Length of normalized account number */
    private const ACCOUNT_NUMBER_LENGTH = 8;

    /** @var BankAccountInterface */
    private $bankAccount;

    /** @var SortCode */
    private $sortCode;

    /** @var string */
    private $accountNumber;

    /**
     * @param SortCode|string $sortCode
     */
    public function __construct(BankAccountInterface $bankAccount, $sortCode, string $accountNumber)
    {
        $this->bankAccount = $bankAccount;
        $this->sortCode = SortCode::createOrReturn($sortCode);
        $this->accountNumber = StringUtil::removeNonDigits($accountNumber);

        if (self::ACCOUNT_NUMBER_LENGTH !== strlen($this->accountNumber)) {
            throw Exception\AccountNumberInvalidException::create($accountNumber);
        }
    }

    /** @return string */
    public function __toString(): string
    {
        return $this->sortCode->format('%s%s%s').$this->accountNumber;
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
}
