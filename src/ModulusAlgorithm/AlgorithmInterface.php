<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

interface AlgorithmInterface
{
    public function quotient();
    public function remainder();
    public function check();
}

if (!function_exists('intdiv')) {
    /**
     * Rubbish polyfill of PHP7's intdiv() function.
     *
     * Namespaced because it should not be reused.
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
