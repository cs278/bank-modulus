<?php

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
    public function __construct(BankAccountInterface $bankAccount, $specKnown, $specResult)
    {
        try {
            Assert::boolean($specKnown, 'specKnown should be a boolean, got: `%s`');

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
    public function getSortCode()
    {
        return $this->bankAccount->getSortCode();
    }

    /**
     * Return the normalized account number.
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->bankAccount->getAccountNumber();
    }

    /**
     * Check if the bank account has had a modulus check performed.
     *
     * @return bool True iff the account has been validated
     */
    public function isValidated()
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
    public function isValid($assume = true)
    {
        try {
            Assert::boolean($assume, 'assume should be a boolean, got: `%s`');
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        return $this->specKnown
            ? $this->specResult
            : $assume;
    }
}
