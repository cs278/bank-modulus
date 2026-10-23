<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

use Cs278\BankModulus\Internal\Assert;

final class DblAl extends BaseAlgorithm
{
    /**
     * @param string $input
     * @param int[]  $weights
     */
    public function __construct($input, array $weights)
    {
        Assert::digitString($input);
        Assert::allGreaterThanEq($weights, 0, 'Expected all weights to be greater than or equal to zero. Got: %s');

        \assert(array_is_list($weights)); // Weights should be a list.
        \assert(\strlen($input) === \count($weights));

        $result = $this->applyWeights($input, $weights);

        // Everything should be positive because weights were all positive.
        \assert(array_all($result, fn (int $x) => $x >= 0), print_r($result, true));

        // Sum individual digits.
        $result = array_reduce($result, function ($carry, $value) {
            \assert(\is_int($carry));
            \assert(\is_int($value) && $value >= 0);

            return $carry + $this->sumDigits($value);
        }, 0);

        parent::__construct($result, 10);
    }

    /**
     * Sum the individual digits that make up an integer.
     *
     * 123 results in 6.
     *
     * @param int<0,max> $input
     *
     * @return int<0,162>
     */
    private function sumDigits(int $input): int
    {
        $max = 162;
        $result = array_sum($this->toChars((string) $input));

        // Prove that the largest result is 162.
        \assert(
            (function (): int {
                $max = 0;

                // @phpstan-ignore function.alreadyNarrowedType (Float can overflow)
                for ($i = 1; \is_int(10 ** $i - 1); $i++) {
                    $max = array_sum($this->toChars(str_repeat('9', $i)));
                }

                // @phpstan-ignore deadCode.unreachable (Perfectly reachable)
                return $max;
            })() === $max
        );

        \assert($result <= $max);

        return $result;
    }
}
