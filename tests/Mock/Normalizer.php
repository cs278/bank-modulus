<?php

namespace Cs278\BankModulus\Mock;

use Cs278\BankModulus\BankAccountInterface;
use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\BankAccountNormalizer\NormalizerInterface;

final class Normalizer implements NormalizerInterface
{
    public function normalize(BankAccountInterface $bankAccount)
    {
        return BankAccountNormalized::createFromBankAccount($bankAccount);
    }

    public function supports(BankAccountInterface $bankAccount)
    {
        return true;
    }
}
