<?php

namespace Cs278\BankModulus\Internal;

use Cs278\BankModulus\Exception\InvalidArgumentException;
use Webmozart\Assert\Assert as BaseAssert;

final class Assert extends BaseAssert
{
    /**
     * @param string $message
     *
     * @return void
     */
    protected static function reportInvalidArgument($message)
    {
        throw new InvalidArgumentException($message);
    }
}
