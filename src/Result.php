<?php

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\InvalidArgumentException;
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
     * @todo Change this to \DateTimeImmutable in v2
     *
     * @var \DateTime|\DateTimeImmutable
     */
    private $validatedAt;

    /**
     * @param BankAccountInterface              $bankAccount
     * @param bool                              $specKnown
     * @param bool|null                         $specResult
     * @param \DateTimeImmutable|\DateTime|null $validatedAt
     */
    public function __construct(BankAccountInterface $bankAccount, $specKnown, $specResult, $validatedAt = null)
    {
        // Trigger warning about mutable DateTime's for minimum supported PHP version
        // of the v2 library.
        if (PHP_VERSION_ID >= 70100 && $validatedAt instanceof \DateTime) {
            @trigger_error(sprintf(
                '$validatedAt argument of %s() will require a DateTimeImmutable instance in version 2.0.0.',
                __METHOD__
            ), E_USER_DEPRECATED);
        }

        if ($validatedAt === null) {
            @trigger_error(sprintf(
                '$validatedAt will become a required argument of %s() in version 2.0.0.',
                __METHOD__
            ), E_USER_DEPRECATED);

            if (class_exists('DateTimeImmutable')) {
                $realValidatedAt = new \DateTimeImmutable();
            } else {
                // @codeCoverageIgnoreStart
                $realValidatedAt = new \DateTime();
                // @codeCoverageIgnoreEnd
            }
        } else {
            /** @var object|null PHPStan type overload */
            $realValidatedAt = $validatedAt;
        }

        try {
            Assert::boolean($specKnown, 'specKnown should be a boolean, got: `%s`');

            if (true === $specKnown) {
                Assert::boolean($specResult, 'specResult should be a boolean, got: `%s`');
            } else {
                Assert::null($specResult, 'specResult should be null, got: `%s`');
            }

            if (!$realValidatedAt instanceof \DateTimeImmutable && !$realValidatedAt instanceof \DateTime) {
                throw new InvalidArgumentException(sprintf(
                    'validatedAt should be an instance of DateTimeImmutable, DateTime or null, got: `%s`',
                    is_object($validatedAt) ? get_class($validatedAt) : gettype($validatedAt)
                ));
            }
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        $this->bankAccount = $bankAccount;
        $this->specKnown = $specKnown;
        $this->specResult = $specResult;
        $this->validatedAt = $realValidatedAt;
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

        if ($this->specKnown) {
            assert($this->specResult !== null);

            return $this->specResult;
        }

        return $assume;
    }

    /**
     * Return time validation was performed.
     *
     * @return \DateTimeImmutable|\DateTime Immutable instance is returned when available
     */
    public function getValidatedAt()
    {
        return $this->validatedAt;
    }
}
