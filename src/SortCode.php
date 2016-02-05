<?php

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\SortCodeInvalidException;

final class SortCode
{
    private $parts;

    public function __construct($value)
    {
        if (6 !== strlen($value)) {
            throw SortCodeInvalidException::create($value);
        }

        $this->parts = str_split($value, 2);
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
        var_dump($this->compareTo($start));
        var_dump($this->compareTo($end));
    }

    public function format($format)
    {
        return sprintf(
            $format,
            $this->parts[0],
            $this->parts[1],
            $this->parts[2]
        );
    }
}
