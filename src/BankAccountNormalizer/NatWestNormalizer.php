<?php

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;

final class NatWestNormalizer implements NormalizerInterface
{
    public function normalize(BankAccountInterface $bankAccount)
    {
        return new BankAccountNormalized(
            $bankAccount->getSortCode(),
            substr($bankAccount->getAccountNumber(), -8)
        );
    }

    public function supports(BankAccountInterface $bankAccount)
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
