<?php

namespace Cs278\BankModulus\Internal;

use Cs278\BankModulus\Exception\InvalidArgumentException;
use Cs278\BankModulus\StringUtil;
use Webmozart\Assert\Assert as BaseAssert;

/**
 * @internal This class is not part of the public API of this package
 */
final class Assert extends BaseAssert
{
    public static function digitString(string $value, ?string $message = null): void
    {
        if (!StringUtil::onlyDigits($value)) {
            static::reportInvalidArgument(\sprintf(
                $message ?: 'Expected string composed of digits [0-9]. Got: %s',
                static::valueToString($value)
            ));
        }
    }

    /**
     * @param string $message
     */
    protected static function reportInvalidArgument($message): never
    {
        throw new InvalidArgumentException($message);
    }
}
