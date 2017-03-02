<?php

declare(strict_types=1);

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;
use Cs278\BankModulus\BankAccountNormalized;

final class SevenDigitNormalizer implements NormalizerInterface
{
    /** @return BankAccountInterface */
    public function normalize(BankAccountInterface $bankAccount): BankAccountInterface
    {
        return new BankAccountNormalized(
            $bankAccount,
            $bankAccount->getSortCode(),
            '0'.$bankAccount->getAccountNumber()
        );
    }

    /** @return bool */
    public function supports(BankAccountInterface $bankAccount): bool
    {
        return 7 === strlen($bankAccount->getAccountNumber());
    }
}
