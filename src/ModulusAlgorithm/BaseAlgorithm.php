<?php

declare(strict_types=1);

namespace Cs278\BankModulus\ModulusAlgorithm;

abstract class BaseAlgorithm implements AlgorithmInterface
{
    /** @var int */
    private $result;

    /** @var int */
    private $divisor;

    public function __construct(int $result, int $divisor)
    {
        $this->result = $result;
        $this->divisor = $divisor;
    }

    final public function quotient(): int
    {
        return intdiv($this->result, $this->divisor);
    }

    final public function remainder(): int
    {
        return $this->result % $this->divisor;
    }

    final public function check(): bool
    {
        return 0 === $this->remainder();
    }

    /**
     * @return array<string>
     */
    final protected function toChars(string $input): array
    {
        if ($input === '') {
            return [];
        }

        /** @var array<string>|false */
        $chars = str_split($input, 1);

        assert($chars !== false);

        return $chars;
    }
}
