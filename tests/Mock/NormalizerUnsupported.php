<?php

declare(strict_types=1);

namespace Cs278\BankModulus\Mock;

use Cs278\BankModulus\BankAccountInterface;
use Cs278\BankModulus\BankAccountNormalizer\NormalizerInterface;

final class NormalizerUnsupported implements NormalizerInterface
{
    public function normalize(BankAccountInterface $bankAccount): BankAccountInterface
    {
        if (class_exists('PHPUnit_Framework_AssertionFailedError')) {
            throw new \PHPUnit_Framework_AssertionFailedError('Test should not call normalize() because supports() returns false');
        }

        throw new \BadMethodCallException('Should not call normalize() becuase supports() returns false');
    }

    public function supports(BankAccountInterface $bankAccount): bool
    {
        return false;
    }
}
