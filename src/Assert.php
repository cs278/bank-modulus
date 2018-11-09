<?php

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\InvalidArgumentException;
use Webmozart\Assert\Assert as BaseAssert;

/**
 * @internal This class is not part of the public API of this package
 */
final class Assert extends BaseAssert
{
    /**
     * @param string $message
     */
    protected static function reportInvalidArgument($message)
    {
        throw new InvalidArgumentException($message);
    }
}
