<?php

declare(strict_types=1);

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;
use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\SortCode;

final class NatWestNormalizer implements NormalizerInterface
{
    /** @return BankAccountInterface */
    public function normalize(BankAccountInterface $bankAccount): BankAccountInterface
    {
        return new BankAccountNormalized(
            $bankAccount,
            $bankAccount->getSortCode(),
            substr($bankAccount->getAccountNumber(), -8)
        );
    }

    /** @return bool */
    public function supports(BankAccountInterface $bankAccount): bool
    {
        $accountNumber = $bankAccount->getAccountNumber();
        $sortCode = $bankAccount->getSortCode();

        return 10 === strlen($accountNumber)
            && (
                $sortCode->isBetween(new SortCode('010000'), new SortCode('020000'))    // ex. District Bank
                || $sortCode->isBetween(new SortCode('500000'), new SortCode('600000')) // ex. National Provincial Bank
                || $sortCode->isBetween(new SortCode('600000'), new SortCode('670000')) // ex. Westminster Bank
            );
    }
}
