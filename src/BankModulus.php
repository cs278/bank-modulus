<?php

namespace Cs278\BankModulus;

use Cs278\BankModulus\BankAccountNormalizer\DefaultNormalizer;
use Cs278\BankModulus\BankAccountNormalizer\NormalizerInterface;
use Cs278\BankModulus\Exception\CannotValidateException;
use Cs278\BankModulus\Exception\Util as E;
use Cs278\BankModulus\Spec\DefaultSpecFactory;
use Cs278\BankModulus\Spec\SimpleSpecFactory;
use Cs278\BankModulus\Spec\SpecFactoryInterface;
use Cs278\BankModulus\Spec\SpecInterface;
use Webmozart\Assert\Assert;

/**
 * Simple class to validate UK bank account details.
 *
 * This wraps around the low level API to provide a simple interface for third-party
 * integrations.
 */
final class BankModulus
{
    /** @var SpecFactoryInterface */
    private $specFactory;

    /** @var NormalizerInterface */
    private $normalizer;

    /**
     * Constructor.
     *
     * @param SpecInterface|SpecFactoryInterface|null $specFactory Factory to create banking specification
     * @param NormalizerInterface|null                $normalizer  Strategy to normalize account numbers/sort codes
     */
    public function __construct($specFactory = null, NormalizerInterface $normalizer = null)
    {
        if ($specFactory instanceof SpecInterface) {
            @trigger_error(sprintf(
                'Passing an instance of SpecInterface to %s() is deprecated and will be removed in version 2.0.0.',
                __METHOD__
            ), \E_USER_DEPRECATED);

            $specFactory = new SimpleSpecFactory($specFactory);
        }

        try {
            Assert::nullOrIsInstanceOf($specFactory, 'Cs278\\BankModulus\\Spec\\SpecFactoryInterface', sprintf(
                'Expected an instance of %1$s\\SpecFactoryInterface, %1$s\\SpecInterface or NULL. Got: %%s',
                'Cs278\\BankModulus\\Spec'
            ));
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        $this->specFactory = $specFactory ?: new DefaultSpecFactory();
        $this->normalizer = $normalizer ?: new DefaultNormalizer();
    }

    /**
     * Normalize the supplied sort code and account number.
     *
     * The result is returned by reference.
     *
     * @param string $sortCode
     * @param string $accountNumber
     */
    public function normalize(&$sortCode, &$accountNumber)
    {
        try {
            Assert::string($sortCode, 'Sort code must be a string');
            Assert::string($accountNumber, 'Account number must be a string');
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        $account = new BankAccount($sortCode, $accountNumber);
        $account = $this->normalizeBankAccount($account);

        $sortCode = $account->getSortCode()->format('%s%s%s');
        $accountNumber = $account->getAccountNumber();
    }

    /**
     * Check if account number / sort code are not invalid.
     *
     * If the specification cannot validate the bank account they are assumed
     * to be valid.
     *
     * @param string $sortCode
     * @param string $accountNumber
     *
     * @return bool True if the details are valid or not known to be invalid
     */
    public function check($sortCode, $accountNumber)
    {
        try {
            Assert::string($sortCode, 'Sort code must be a string');
            Assert::string($accountNumber, 'Account number must be a string');
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        $result = $this->lookup($sortCode, $accountNumber);

        if ($result->isValidated()) {
            return $result->isValid();
        }

        return true;
    }

    /**
     * Perform evaluation of the supplied sort code and account number.
     *
     * This will normalize the supplied input and then perform modulus check.
     *
     * @param string $sortCode
     * @param string $accountNumber
     *
     * @return Result
     */
    public function lookup($sortCode, $accountNumber)
    {
        try {
            Assert::string($sortCode, 'Sort code must be a string');
            Assert::string($accountNumber, 'Account number must be a string');
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        $account = new BankAccount($sortCode, $accountNumber);
        $account = $this->normalizeBankAccount($account);

        try {
            $valid = $this->specFactory->create()->check($account);
            $validated = true;
        } catch (CannotValidateException $e) {
            $validated = false;
            $valid = null;
        }

        $now = class_exists('DateTimeImmutable')
            ? new \DateTimeImmutable()
            : new \DateTime();

        return new Result($account, $validated, $valid, $now);
    }

    /**
     * @param BankAccountInterface $account
     *
     * @return BankAccountNormalized
     */
    private function normalizeBankAccount(BankAccountInterface $account)
    {
        if ($this->normalizer->supports($account)) {
            $account = $this->normalizer->normalize($account);

            if ($account instanceof BankAccountNormalized) {
                return $account;
            }
        }

        return BankAccountNormalized::createFromBankAccount($account);
    }
}
