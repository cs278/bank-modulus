<?php

declare(strict_types=1);

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\Util as E;
use Webmozart\Assert\Assert;

/**
 * Represents the result of a modulus check operation.
 */
final class Result implements BankAccountInterface
{
    /** @var BankAccountInterface */
    private $bankAccount;

    /** @var bool */
    private $specKnown;

    /** @var bool|null */
    private $specResult;

    /**
     * @param BankAccountInterface $bankAccount
     * @param bool                 $specKnown
     * @param bool|null            $specResult
     */
    public function __construct(BankAccountInterface $bankAccount, bool $specKnown, $specResult)
    {
        try {
            if (true === $specKnown) {
                Assert::boolean($specResult, 'specResult should be a boolean, got: `%s`');
            } else {
                Assert::null($specResult, 'specResult should be null, got: `%s`');
            }
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        $this->bankAccount = $bankAccount;
        $this->specKnown = $specKnown;
        $this->specResult = $specResult;
    }

    /**
     * Return the normalized sort code.
     *
     * @return SortCode
     */
    public function getSortCode(): SortCode
    {
        return $this->bankAccount->getSortCode();
    }

    /**
     * Return the normalized account number.
     *
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->bankAccount->getAccountNumber();
    }

    /**
     * Check if the bank account has had a modulus check performed.
     *
     * @return bool True iff the account has been validated
     */
    public function isValidated(): bool
    {
        return $this->specKnown;
    }

    /**
     * Fetch the result of the modulus check on the account.
     *
     * @param bool $assume Result to use if the account could not be validated
     *
     * @return bool True if details are usable
     */
    public function isValid(bool $assume = true): bool
    {
        if ($this->specKnown) {
            assert($this->specResult !== null);

            return $this->specResult;
        }

        return $assume;
    }
}
