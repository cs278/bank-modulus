<?php

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;

final class SevenDigitNormalizer implements NormalizerInterface
{
    public function normalize(BankAccountInterface $bankAccount)
    {
        return new BankAccountNormalized(
            $bankAccount,
            $sortCode,
            '0'.$bankAccount->getAccountNumber()
        );
    }

    public function supports(BankAccountInterface $bankAccount)
    {
        return 7 === strlen($bankAccount->getAccountNumber());
    }
}
