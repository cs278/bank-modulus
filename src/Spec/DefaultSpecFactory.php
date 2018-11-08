<?php

declare(strict_types=1);

namespace Cs278\BankModulus\Spec;

use Cs278\BankModulus\Assert;
use Cs278\BankModulus\Exception\InvalidArgumentException;

/**
 * Default factory implementation.
 *
 * Uses the correct specification based on the current date.
 */
final class DefaultSpecFactory implements SpecFactoryInterface
{
    /** @var \DateTimeZone */
    private $tz;

    /** @var \DateTimeImmutable|null */
    private $now;

    /** @var bool Flag used for testing */
    private $updateNow = true;

    public function __construct()
    {
        // This is hard coded, but modulus checking is intrinsically related
        // to banking in the UK which happens on London time.
        $this->tz = new \DateTimeZone('Europe/London');
    }

    /**
     * Override current date.
     *
     * This allows validation at a particular point in time.
     *
     * @param \DateTimeInterface|string $date Either object or ISO8601 date string
     *
     * @return self
     */
    public function withDate($date)
    {
        if (is_string($date)) {
            Assert::regex($date, '{^[0-9]{4}-[0-9]{2}-[0-9]{2}$}', 'Expecting valid ISO8601 date (YYYY-MM-DD). Got: %s');

            $now = \DateTimeImmutable::createFromFormat('!Y-m-d', $date, $this->tz);

            if (!$now instanceof \DateTimeImmutable || $now->format('Y-m-d') !== $date) {
                throw new InvalidArgumentException(sprintf(
                    'Expecting valid ISO8601 date (YYYY-MM-DD). Got: "%s"',
                    $date
                ));
            }
        } else {
            Assert::isInstanceOf($date, \DateTimeInterface::class);

            $now = \DateTimeImmutable::createFromFormat('!Y-m-d', $date->format('Y-m-d'), $date->getTimezone());
            assert($now instanceof \DateTimeImmutable && $now->format('Y-m-d') === $date->format('Y-m-d'));
            $now = $now->setTimezone($this->tz);
        }

        assert($now instanceof \DateTimeImmutable);

        $factory = new self();
        $factory->now = $now;
        $factory->updateNow = false;

        return $factory;
    }

    /** {@inheritdoc} */
    public function create(): SpecInterface
    {
        if ($this->updateNow) {
            $this->now = new \DateTimeImmutable('today', $this->tz);
        }

        if ($this->dateOnOrAfter('2018-10-22')) {
            return new VocaLinkV520();
        }

        if ($this->dateOnOrAfter('2018-09-17')) {
            return new VocaLinkV510();
        }

        if ($this->dateOnOrAfter('2018-08-06')) {
            return new VocaLinkV500();
        }

        if ($this->dateOnOrAfter('2018-07-02')) {
            return new VocaLinkV490();
        }

        if ($this->dateOnOrAfter('2018-04-16')) {
            return new VocaLinkV480();
        }

        if ($this->dateOnOrAfter('2018-03-26')) {
            return new VocaLinkV470();
        }

        if ($this->dateOnOrAfter('2017-10-09')) {
            return new VocaLinkV460();
        }

        if ($this->dateOnOrAfter('2017-08-21')) {
            return new VocaLinkV440();
        }

        if ($this->dateOnOrAfter('2017-07-03')) {
            return new VocaLinkV430();
        }

        if ($this->dateOnOrAfter('2017-06-12')) {
            return new VocaLinkV420();
        }

        if ($this->dateOnOrAfter('2017-03-06')) {
            return new VocaLinkV410();
        }

        if ($this->dateOnOrAfter('2017-01-09')) {
            return new VocaLinkV400();
        }

        return new VocaLinkV390();
    }

    private function dateOnOrAfter($when)
    {
        assert(is_string($when));
        assert(preg_match('{^[0-9]{4}-[0-9]{2}-[0-9]{2}$}', $when) === 1);

        $when = \DateTimeImmutable::createFromFormat('!Y-m-d', $when);

        assert($when instanceof \DateTimeImmutable);

        return $this->now >= $when;
    }
}
