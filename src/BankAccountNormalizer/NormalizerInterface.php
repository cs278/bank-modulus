<?php

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;

interface NormalizerInterface
{
    public function normalize(BankAccountInterface $bankAccount);
    public function supports(BankAccountInterface $bankAccount);
}
