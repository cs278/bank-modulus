<?php

declare(strict_types=1);

namespace Cs278\BankModulus;

use Cs278\BankModulus\BankAccountNormalizer\DefaultNormalizer;
use Cs278\BankModulus\BankAccountNormalizer\NormalizerInterface;
use Cs278\BankModulus\Exception\CannotValidateException;
use Cs278\BankModulus\Spec\DefaultSpecFactory;
use Cs278\BankModulus\Spec\SimpleSpecFactory;
use Cs278\BankModulus\Spec\SpecFactoryInterface;
use Cs278\BankModulus\Spec\SpecInterface;

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
     * @param SpecFactoryInterface|null $specFactory Factory to create banking specification.
     * @param NormalizerInterface|null  $normalizer  Strategy to normalize account numbers/sort codes.
     */
    public function __construct(SpecFactoryInterface $specFactory = null, NormalizerInterface $normalizer = null)
    {
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
    public function normalize(string &$sortCode, string &$accountNumber)
    {
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
    public function check(string $sortCode, string $accountNumber): bool
    {
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
    public function lookup(string $sortCode, string $accountNumber): Result
    {
        $account = new BankAccount($sortCode, $accountNumber);
        $account = $this->normalizeBankAccount($account);

        try {
            $valid = $this->specFactory->create()->check($account);
            $validated = true;
        } catch (CannotValidateException $e) {
            $validated = false;
            $valid = null;
        }

        return new Result($account, $validated, $valid);
    }

    /**
     * @param BankAccountInterface $account
     *
     * @return BankAccountNormalized
     */
    private function normalizeBankAccount(BankAccountInterface $account): BankAccountNormalized
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
