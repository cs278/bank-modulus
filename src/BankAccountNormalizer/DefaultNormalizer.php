<?php

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;
use Cs278\BankModulus\BankAccountNormalized;

final class DefaultNormalizer implements NormalizerInterface
{
    /** @var NormalizerInterface[] */
    private $normalizers = [];

    /**
     * @param NormalizerInterface[]|null $normalizers
     */
    public function __construct(array $normalizers = null)
    {
        if (null === $normalizers) {
            $normalizers = [
                new SixDigitNormalizer(),
                new SevenDigitNormalizer(),
                new SantanderNormalizer(),
                new NatWestNormalizer(),
                new CoOperativeBankNormalizer(),
            ];
        }

        $this->normalizers = $normalizers;
    }

    /** @return BankAccountInterface */
    public function normalize(BankAccountInterface $bankAccount)
    {
        foreach ($this->normalizers as $normalizer) {
            if ($normalizer->supports($bankAccount)) {
                return $normalizer->normalize($bankAccount);
            }
        }

        return BankAccountNormalized::createFromBankAccount($bankAccount);
    }

    /** @return bool */
    public function supports(BankAccountInterface $bankAccount)
    {
        // Supports anything because it checks before normalizing.
        return true;
    }
}
