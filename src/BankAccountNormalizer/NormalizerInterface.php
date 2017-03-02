<?php

declare(strict_types=1);

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccountInterface;

interface NormalizerInterface
{
    /** @return BankAccountInterface */
    public function normalize(BankAccountInterface $bankAccount): BankAccountInterface;

    /** @return bool */
    public function supports(BankAccountInterface $bankAccount): bool;
}
