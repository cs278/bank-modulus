<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

use Cs278\BankModulus\Internal\Assert;
use Cs278\BankModulus\StringUtil;

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
     * @return list<Digit>
     */
    final protected function toChars($input)
    {
        Assert::digitString($input);

        $chars = str_split($input, 1);

        foreach ($chars as $char) {
            \assert(StringUtil::isDigit($char));
        }

        // PHPStan does not understand this version?
        \assert(array_all($chars, StringUtil::isDigit(...)));

        return $chars;
    }

    /**
     * Apply weights to the input.
     *
     * @param string $input
     * @param int[] $weights
     *
     * @return list<int>
     */
    final protected function applyWeights($input, array $weights)
    {
        \assert(array_is_list($weights)); // Weights should be a list.
        \assert(\strlen($input) === \count($weights));

        $chars = $this->toChars($input);

        \assert(\count($chars) === \count($weights));

        $result = array_map(function ($a, $b) {
            // Ensure cast to integer is lossless
            \assert(\is_string($a) && $a === (string) (int) $a);
            \assert(\is_int($b));
            \assert($a >= 0); // @phpstan-ignore function.alreadyNarrowedType, greaterOrEqual.alwaysTrue (Belt/braces)

            return (int) $a * $b;
        }, $chars, $weights);

        return $result;
    }
}
