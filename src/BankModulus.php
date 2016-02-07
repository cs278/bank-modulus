<?php

namespace Cs278\BankModulus;

use Cs278\BankModulus\BankAccountNormalizer\DefaultNormalizer;
use Cs278\BankModulus\BankAccountNormalizer\NormalizerInterface;
use Cs278\BankModulus\Exception\CannotValidateException;
use Cs278\BankModulus\Spec\SpecInterface;
use Cs278\BankModulus\Spec\VocaLinkV380;

/**
 * Simple class to validate UK bank account details.
 *
 * This wraps around the low level API to provide a simple interface for third-party
 * integrations.
 */
final class BankModulus
{
    private $spec;
    private $normalizer;

    /**
     * Constructor.
     *
     * @param SpecInterface       $spec       Banking specification to check against.
     * @param NormalizerInterface $normalizer Strategy to normalize account numbers/sort codes.
     */
    public function __construct(SpecInterface $spec = null, NormalizerInterface $normalizer = null)
    {
        $this->spec = $spec ?: new VocaLinkV380();
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
        $account = new BankAccount($sortCode, $accountNumber);
        $account = $this->normalizer->normalize($account);

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
        $account = new BankAccount($sortCode, $accountNumber);
        $account = $this->normalizer->normalize($account);

        try {
            return $this->spec->check($account);
        } catch (CannotValidateException $e) {
            return true;
        }
    }

    /**
     * Check if account number / sort code are valid.
     *
     * If the specification cannot validate the bank account they are assumed
     * to be invalid.
     *
     * @param string $sortCode
     * @param string $accountNumber
     *
     * @return bool True if the details are valid
     */
    public function isValid($sortCode, $accountNumber)
    {
        $account = new BankAccount($sortCode, $accountNumber);
        $account = $this->normalizer->normalize($account);

        try {
            return $this->spec->check($account);
        } catch (CannotValidateException $e) {
            return false;
        }
    }
}
