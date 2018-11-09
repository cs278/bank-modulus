<?php

declare(strict_types=1);

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\SortCodeInvalidException;

final class SortCode
{
    public const LENGTH = 6;

    /** @var array<string> */
    private $parts;

    public function __construct(string $value)
    {
        if (self::LENGTH !== strlen($value) || self::LENGTH !== strspn($value, '1234567890')) {
            throw SortCodeInvalidException::create($value);
        }

        $this->parts = str_split($value, 2);
    }

    public static function create(string $value): self
    {
        Assert::regex($value, '{^(?:.*\d.*){6}$}', 'Value must contain 6 digits');

        return new self(StringUtil::removeNonDigits($value));
    }

    /**
     * Create new SortCode object or return supplied one.
     *
     * @param SortCode|string $value
     *
     * @return self If SortCode is supplied same object is returned
     */
    public static function createOrReturn($value): self
    {
        if ($value instanceof SortCode) {
            return $value;
        }

        Assert::string($sortCode, 'Sort code must be a string or an instance of SortCode');

        return SortCode::create($sortCode);
    }

    /**
     * Compare to another sort code.
     *
     * @return int Iff equal 0, 1 if greater than, -1 if less than
     */
    public function compareTo(SortCode $b): int
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
     */
    public function isBetween(SortCode $start, SortCode $end): bool
    {
        return 0 <= $this->compareTo($start) && -1 === $this->compareTo($end);
    }

    /**
     * Return the sort code as one concatenated string.
     */
    public function getString(): string
    {
        return $this->format('%s%s%s');
    }

    /**
     * Return the sort code as one concatenated string.
     */
    public function getDashSeparated(): string
    {
        return $this->format('%s-%s-%s');
    }

    /**
     * Return the sort code as one concatenated string.
     */
    public function getSpaceSeparated(): string
    {
        return $this->format('%s %s %s');
    }

    /**
     * Supply sprintf() pattern to format the 3 sort code components.
     */
    public function format(string $format): string
    {
        return sprintf(
            $format,
            $this->parts[0],
            $this->parts[1],
            $this->parts[2]
        );
    }
}
