<?php

namespace Cs278\BankModulus;

if (function_exists('intdiv')) {
    /**
     * @internal
     */
    function intdiv($dividend, $divisor)
    {
        return \intdiv($dividend, $divisor);
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

        $dividend = ($dividend - $dividend % $divisor);

        return (int) ($dividend / $divisor);
    }
}
