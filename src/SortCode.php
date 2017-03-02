<?php

declare(strict_types=1);

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\SortCodeInvalidException;
use Cs278\BankModulus\Exception\Util as E;
use Webmozart\Assert\Assert;

final class SortCode
{
    const LENGTH = 6;

    private $parts;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (self::LENGTH !== strlen($value) || self::LENGTH !== strspn($value, '1234567890')) {
            throw SortCodeInvalidException::create($value);
        }

        $this->parts = str_split($value, 2);
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public static function create(string $value): self
    {
        try {
            Assert::regex($value, '{^(?:.*\d.*){6}$}', 'Value must contain 6 digits');
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        return new self(StringUtil::removeNonDigits($value));
    }

    /**
     * Compare to another sort code.
     *
     * @param SortCode $b
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
     *
     * @return bool
     */
    public function isBetween(SortCode $start, SortCode $end): bool
    {
        return 0 <= $this->compareTo($start) && -1 === $this->compareTo($end);
    }

    /**
     * Return the sort code as one concatenated string.
     *
     * @return string
     */
    public function getString(): string
    {
        return $this->format('%s%s%s');
    }

    /**
     * Return the sort code as one concatenated string.
     *
     * @return string
     */
    public function getDashSeparated(): string
    {
        return $this->format('%s-%s-%s');
    }

    /**
     * Return the sort code as one concatenated string.
     *
     * @return string
     */
    public function getSpaceSeparated(): string
    {
        return $this->format('%s %s %s');
    }

    /**
     * @param string $format
     *
     * @return string
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
