<?php

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\SortCodeInvalidException;
use Cs278\BankModulus\Exception\Util as E;
use Cs278\BankModulus\Internal\Assert;

final class SortCode
{
    const LENGTH = 6;

    /** @var array{string,string,string} */
    private $parts;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        Assert::string($value, 'Value must be a string');

        if (self::LENGTH !== \strlen($value) || self::LENGTH !== strspn($value, '1234567890')) {
            throw SortCodeInvalidException::create($value);
        }

        // https://github.com/phpstan/phpstan/issues/2992
        $parts = str_split($value, 2);
        \assert(isset($parts[0]) && \is_string($parts[0]));
        \assert(isset($parts[1]) && \is_string($parts[1]));
        \assert(isset($parts[2]) && \is_string($parts[2]));
        $this->parts = $parts;
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public static function create($value)
    {
        Assert::string($value, 'Value must be a string');
        Assert::regex($value, '{^(?:.*\d.*){6}$}', 'Value must contain 6 digits');

        return new self(StringUtil::removeNonDigits($value));
    }

    /**
     * Compare to another sort code.
     *
     * @param SortCode $b
     *
     * @return int Iff equal 0, 1 if greater than, -1 if less than
     */
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

    /**
     * See if this sort code is between two others.
     *
     * @param SortCode $start Inclusive lower bound
     * @param SortCode $end   Exclusive upper bound
     *
     * @return bool
     */
    public function isBetween(SortCode $start, SortCode $end)
    {
        return 0 <= $this->compareTo($start) && -1 === $this->compareTo($end);
    }

    /**
     * Return the sort code as one concatenated string.
     *
     * @return string
     */
    public function getString()
    {
        return $this->format('%s%s%s');
    }

    /**
     * Return the sort code as one concatenated string.
     *
     * @return string
     */
    public function getDashSeparated()
    {
        return $this->format('%s-%s-%s');
    }

    /**
     * Return the sort code as one concatenated string.
     *
     * @return string
     */
    public function getSpaceSeparated()
    {
        return $this->format('%s %s %s');
    }

    /**
     * @param string $format
     *
     * @return string
     */
    public function format($format)
    {
        Assert::string($format, 'Format must be a string, got: %s');

        return sprintf(
            $format,
            $this->parts[0],
            $this->parts[1],
            $this->parts[2]
        );
    }
}
