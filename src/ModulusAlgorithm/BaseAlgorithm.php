<?php

declare(strict_types=1);

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
    public function __construct(int $result, int $divisor)
    {
        $this->result = $result;
        $this->divisor = $divisor;
    }

    /** @return int */
    final public function quotient(): int
    {
        if (!function_exists('intdiv')) {
            // This method isn't actually used internally by the library
            // currently so no hard dependency on these polyfills.

            // @codeCoverageIgnoreStart
            throw new \LogicException(sprintf(
                '%s() requires the intdiv() function which was added in PHP 7'
                .' you could use a polyfill such as michaelc/intdiv-compat or'
                .' symfony/polyfill-php70 to provide this function',
                __METHOD__
            ));
            // @codeCoverageIgnoreEnd
        }

        return intdiv($this->result, $this->divisor);
    }

    /** @return int */
    final public function remainder(): int
    {
        return $this->result % $this->divisor;
    }

    /** @return bool */
    final public function check(): bool
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

        assert($chars !== false);

        return $chars;
    }
}
