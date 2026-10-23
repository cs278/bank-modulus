<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

abstract class BaseAlgorithm implements AlgorithmInterface
{
    /** @var int */
    private $result;

    /** @var int */
    private $divisor;

    /**
     * @param int $result
     * @param int $divisor
     */
    public function __construct($result, $divisor)
    {
        $this->result = $result;
        $this->divisor = $divisor;
    }

    /** @return int */
    final public function quotient()
    {
        return intdiv($this->result, $this->divisor);
    }

    /** @return int */
    final public function remainder()
    {
        return $this->result % $this->divisor;
    }

    /** @return bool */
    final public function check()
    {
        return 0 === $this->remainder();
    }

    /**
     * @param string $input
     *
     * @return string[]
     */
    final protected function toChars($input)
    {
        $chars = str_split($input, 1);

        \assert($chars !== false); // @phpstan-ignore function.alreadyNarrowedType, notIdentical.alwaysTrue (Belt/braces)

        return $chars;
    }

    /**
     * Apply weights to the input.
     *
     * @param string $input
     * @param int[] $weights
     *
     * @return int[]
     */
    final protected function applyWeights($input, array $weights)
    {
        \assert(\strlen($input) === \count($weights));

        $chars = $this->toChars($input);

        \assert(\count($chars) === \count($weights));

        $result = array_map(function ($a, $b) {
            // Ensure cast to integer is lossless
            \assert(\is_string($a) && $a === (string) (int) $a);
            \assert(\is_int($b));

            return (int) $a * $b;
        }, $chars, $weights);

        return $result;
    }
}
