<?php

namespace Cs278\BankModulus;

/**
 * @internal This class is not part of the public API of this package
 */
final class StringUtil
{
    /**
     * Test if string contains only numeric digits.
     *
     * @phpstan-assert-if-true DigitString $input
     */
    public static function onlyDigits(string $input): bool
    {
        return \strlen($input) === strspn($input, '1234567890');
    }

    /**
     * @phpstan-assert-if-true Digit $input
     */
    public static function isDigit(string $input): bool
    {
        return \strlen($input) === 1
            && self::onlyDigits($input);
    }

    /**
     * Removes all characters that are not 0 through 9.
     *
     * @param string $input
     *
     * @return string
     */
    public static function removeNonDigits($input)
    {
        $result = preg_replace('{[^0-9]}', '', $input);

        \assert($result !== null);

        return $result;
    }

    /**
     * Convenience wrapper around `preg_replace_callback()` to ensure string results.
     *
     * @param string   $input
     * @param string   $regex
     * @param \Closure(array<string>): string $callback
     *
     * @return string
     */
    public static function regexReplaceCallback($input, $regex, \Closure $callback)
    {
        $result = preg_replace_callback($regex, $callback, $input);

        \assert(\is_string($result));

        return $result;
    }
}
