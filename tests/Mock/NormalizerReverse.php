<?php

namespace Cs278\BankModulus\Mock;

use Cs278\BankModulus\BankAccountInterface;
use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\BankAccountNormalizer\NormalizerInterface;
use Cs278\BankModulus\SortCode;

final class NormalizerReverse implements NormalizerInterface
{
    public function normalize(BankAccountInterface $bankAccount)
    {
        return new BankAccountNormalized(
            $bankAccount,
            new SortCode(strrev($bankAccount->getSortCode()->getString())),
            strrev($bankAccount->getAccountNumber())
        );
    }

    public function supports(BankAccountInterface $bankAccount)
    {
        return true;
    }
}
