<?php

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\SortCodeInvalidException;
use Cs278\BankModulus\Exception\Util as E;
use Webmozart\Assert\Assert;

final class SortCode
{
    const LENGTH = 6;

    private $parts;

    public function __construct($value)
    {
        try {
            Assert::string($value, 'Value must be a string');
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        if (self::LENGTH !== strlen($value) || self::LENGTH !== strspn($value, '1234567890')) {
            throw SortCodeInvalidException::create($value);
        }

        $this->parts = str_split($value, 2);
    }

    public static function create($value)
    {
        try {
            Assert::string($value, 'Value must be a string');
            Assert::regex($value, '{^(?:.*\d.*){6}$}', 'Value must contain 6 digits');
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        return new self(preg_replace('{[^0-9]}', '', $value));
    }

    public function compareTo(SortCode $b)
    {
        if ($this == $b) {
            return 0;
        }

        if ($this < $b) {
            return -1;
        }

        return 1;
    }

    public function isBetween(SortCode $start, SortCode $end)
    {
        return 0 <= $this->compareTo($start) && -1 === $this->compareTo($end);
    }

    public function format($format)
    {
        try {
            Assert::string($format, 'Format must be a string, got: %s');
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        return sprintf(
            $format,
            $this->parts[0],
            $this->parts[1],
            $this->parts[2]
        );
    }
}
