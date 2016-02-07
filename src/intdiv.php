<?php

namespace Cs278\BankModulus;

if (function_exists('intdiv')) {
    /**
     * @internal
     */
    function intdiv($dividend, $divisor)
    {
        try {
            return \intdiv($dividend, $divisor);
        } catch (\Error $e) {
            throw new \InvalidArgumentException($e->getMessage(), 0, $e);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException($e->getMessage(), 0, $e);
        }
    }
} else {
    /**
     * Rubbish polyfill of PHP7's intdiv() function.
     *
     * Namespaced because it should not be reused.
     *
     * @internal
     */
    function intdiv($dividend, $divisor)
    {
        $dividend = (int) $dividend;
        $divisor = (int) $divisor;

        if (0 === $divisor) {
            throw new \InvalidArgumentException('Division by zero');
        }

        if (~PHP_INT_MAX === $dividend && -1 === $divisor) {
            throw new \InvalidArgumentException('Division of PHP_INT_MIN by -1 is not an integer');
        }

        $dividend = ($dividend - $dividend % $divisor);

        return (int) ($dividend / $divisor);
    }
}
