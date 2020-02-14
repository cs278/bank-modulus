<?php

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;
use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\BankAccountNormalizedInterface;

final class SixDigitNormalizer implements NormalizerInterface
{
    /** @return BankAccountInterface|BankAccountNormalizedInterface */
    public function normalize(BankAccountInterface $bankAccount)
    {
        return new BankAccountNormalized(
            $bankAccount,
            $bankAccount->getSortCode(),
            '00'.$bankAccount->getAccountNumber()
        );
    }

    /** @return bool */
    public function supports(BankAccountInterface $bankAccount)
    {
        return 6 === \strlen($bankAccount->getAccountNumber());
    }
}
