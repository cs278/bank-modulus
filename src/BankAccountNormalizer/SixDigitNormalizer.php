<?php

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;

final class SixDigitNormalizer implements NormalizerInterface
{
    public function normalize(BankAccountInterface $bankAccount)
    {
        return new BankAccountNormalized(
            $bankAccount,
            $sortCode,
            '00'.$bankAccount->getAccountNumber()
        );
    }

    public function supports(BankAccountInterface $bankAccount)
    {
        return 6 === strlen($bankAccount->getAccountNumber());
    }
}
