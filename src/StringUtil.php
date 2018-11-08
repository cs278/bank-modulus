<?php

namespace Cs278\BankModulus;

/**
 * @internal This class is not part of the public API of this package
 */
final class StringUtil
{
    /**
     * Removes all characters that are not 0 through 9.
     */
    public static function removeNonDigits(string $input): string
    {
        $result = preg_replace('{[^0-9]}', '', $input);

        assert($result !== null);

        return $result;
    }

    /**
     * Convenience wrapper around `preg_replace_callback()` to ensure string results.
     */
    public static function regexReplaceCallback(string $input, string $regex, \Closure $callback): string
    {
        $result = preg_replace_callback($regex, $callback, $input);

        assert(is_string($result));

        return $result;
    }
}
