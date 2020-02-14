<?php

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;
use Cs278\BankModulus\BankAccountNormalizedInterface;

interface NormalizerInterface
{
    /**
     * @todo In version 2.0 remove BankAccountInterface from return type.
     *
     * @return BankAccountInterface|BankAccountNormalizedInterface
     */
    public function normalize(BankAccountInterface $bankAccount);

    /** @return bool */
    public function supports(BankAccountInterface $bankAccount);
}
