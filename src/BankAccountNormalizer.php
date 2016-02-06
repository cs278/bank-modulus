<?php

namespace Cs278\BankModulus;

use Cs278\BankModulus\BankAccountNormalizer\CoOperativeBankNormalizer;
use Cs278\BankModulus\BankAccountNormalizer\NatWestNormalizer;
use Cs278\BankModulus\BankAccountNormalizer\SantanderNormalizer;
use Cs278\BankModulus\BankAccountNormalizer\SevenDigitNormalizer;
use Cs278\BankModulus\BankAccountNormalizer\SixDigitNormalizer;

final class BankAccountNormalizer
{
    private $normalizers;

    public function __construct(array $normalizers = [])
    {
        $this->normalizers = $normalizers ?: [
            new SixDigitNormalizer(),
            new SevenDigitNormalizer(),
            new SantanderNormalizer(),
            new NatWestNormalizer(),
            new CoOperativeBankNormalizer(),
        ];
    }

    public function apply(BankAccountInterface $bankAccount)
    {
        foreach ($this->normalizers as $normalizer) {
            if ($normalizer->supports($bankAccount)) {
                return $normalizer->normalize($bankAccount);
            }
        }

        return BankAccountNormalized::createFromBankAccount($bankAccount);
    }
}
