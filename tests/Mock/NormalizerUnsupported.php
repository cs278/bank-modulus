<?php

namespace Cs278\BankModulus\Mock;

use Cs278\BankModulus\BankAccountInterface;
use Cs278\BankModulus\BankAccountNormalizer\NormalizerInterface;

final class NormalizerUnsupported implements NormalizerInterface
{
    public function normalize(BankAccountInterface $bankAccount): void
    {
        throw new \PHPUnit\Framework\AssertionFailedError('Test should not call normalize() because supports() returns false');
    }

    public function supports(BankAccountInterface $bankAccount)
    {
        return false;
    }
}
