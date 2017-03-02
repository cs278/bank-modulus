<?php

declare(strict_types=1);

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;
use Cs278\BankModulus\BankAccountNormalized;

final class SixDigitNormalizer implements NormalizerInterface
{
    /** @return BankAccountInterface */
    public function normalize(BankAccountInterface $bankAccount): BankAccountInterface
    {
        return new BankAccountNormalized(
            $bankAccount,
            $bankAccount->getSortCode(),
            '00'.$bankAccount->getAccountNumber()
        );
    }

    /** @return bool */
    public function supports(BankAccountInterface $bankAccount): bool
    {
        return 6 === strlen($bankAccount->getAccountNumber());
    }
}
