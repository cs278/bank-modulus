<?php

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;

final class CoOperativeBankNormalizer implements NormalizerInterface
{
    public function normalize(BankAccountInterface $bankAccount)
    {
        return new BankAccountNormalized(
            $bankAccount->getSortCode(),
            substr($bankAccount->getAccountNumber(), 0, 8)
        );
    }

    public function supports(BankAccountInterface $bankAccount)
    {
        $accountNumber = $bankAccount->getAccountNumber();
        $sortCode = $bankAccount->getSortCode();

        return 10 === strlen($accountNumber)
            && $sortCode->isBetween(new SortCode('080000'), new SortCode('090000'))
            && !$sortCode->isBetween(new SortCode('083000'), new SortCode('084000')); // Exclude Citibank
    }
}
