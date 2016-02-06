<?php

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;
use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\SortCode;

final class SantanderNormalizer implements NormalizerInterface
{
    public function normalize(BankAccountInterface $bankAccount)
    {
        $accountNumber = $bankAccount->getAccountNumber();

        $sortCode = $bankAccount->getSortCode()->format('%s%s%s');
        $sortCode[5] = $accountNumber[0];

        return new BankAccountNormalized(
            $bankAccount,
            $sortCode,
            substr($accountNumber, -8)
        );
    }

    public function supports(BankAccountInterface $bankAccount)
    {
        $accountNumber = $bankAccount->getAccountNumber();
        $sortCode = $bankAccount->getSortCode();

        return 9 === strlen($accountNumber)
            && (
                $sortCode->isBetween(new SortCode('090000'), new SortCode('092000')) // London clearing
                || $sortCode->isBetween(new SortCode('720000'), new SortCode('730000')) // ex. Girobank
                || $sortCode->isBetween(new SortCode('890000'), new SortCode('893000')) // Scottish clearing
            );
    }
}
