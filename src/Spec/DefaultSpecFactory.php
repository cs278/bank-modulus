<?php

namespace Cs278\BankModulus\Spec;

use Cs278\BankModulus\Exception\InvalidArgumentException;
use Cs278\BankModulus\Exception\Util as E;
use Cs278\BankModulus\Internal\Assert;

/**
 * Default factory implementation.
 *
 * Uses the correct specification based on the current date.
 */
final class DefaultSpecFactory implements SpecFactoryInterface
{
    /** @var \DateTimeZone */
    private $tz;

    /** @var \DateTime|null */
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
        if (\is_string($date)) {
            Assert::regex($date, '{^[0-9]{4}-[0-9]{2}-[0-9]{2}$}', 'Expecting valid ISO8601 date (YYYY-MM-DD). Got: %s');

            $now = \DateTime::createFromFormat('!Y-m-d', $date, $this->tz);

            if (!$now instanceof \DateTime || $now->format('Y-m-d') !== $date) {
                throw new InvalidArgumentException(sprintf(
                    'Expecting valid ISO8601 date (YYYY-MM-DD). Got: "%s"',
                    $date
                ));
            }
        } else {
            self::assertDateTimeObject($date);

            // Internally this library has to support PHP 5.4 so ensure using DateTime
            // this also has the benefit of removing any time component which is not
            // required.
            $now = \DateTime::createFromFormat('!Y-m-d', $date->format('Y-m-d'), $date->getTimezone());
            \assert($now instanceof \DateTime && $now->format('Y-m-d') === $date->format('Y-m-d'));
            $now->setTimezone($this->tz);
        }

        \assert($now instanceof \DateTime);

        $factory = new self();
        $factory->now = $now;
        $factory->updateNow = false;

        return $factory;
    }

    /**
     * @internal Used for testing
     *
     * @deprecated Replaced by withDate()
     *
     * @param \DateTime $now
     *
     * @return self
     */
    public static function withNow(\DateTime $now)
    {
        @trigger_error(sprintf(
            '%s() is deprecated use withDate() instead. Note this method was marked @internal maybe removed in a minor release.',
            __METHOD__
        ), \E_USER_DEPRECATED);

        $factory = new self();

        return $factory->withDate($now);
    }

    /** {@inheritdoc} */
    public function create()
    {
        if ($this->updateNow) {
            $this->now = new \DateTime('today', $this->tz);
        }

        if ($this->dateOnOrAfter('2023-06-05')) {
            return new VocaLinkV740();
        }

        if ($this->dateOnOrAfter('2022-07-25')) {
            return new VocaLinkV730();
        }

        if ($this->dateOnOrAfter('2021-10-05')) {
            return new VocaLinkV680();
        }

        if ($this->dateOnOrAfter('2020-10-12')) {
            return new VocaLinkV640();
        }

        if ($this->dateOnOrAfter('2020-02-03')) {
            return new VocaLinkV590();
        }

        if ($this->dateOnOrAfter('2019-09-30')) {
            return new VocaLinkV580();
        }

        if ($this->dateOnOrAfter('2019-05-27')) {
            return new VocaLinkV570();
        }

        if ($this->dateOnOrAfter('2019-03-18')) {
            return new VocaLinkV550();
        }

        if ($this->dateOnOrAfter('2019-01-28')) {
            return new VocaLinkV540();
        }

        if ($this->dateOnOrAfter('2018-11-26')) {
            return new VocaLinkV530();
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

    /**
     * @param string $when
     *
     * @return bool
     */
    private function dateOnOrAfter($when)
    {
        \assert(\is_string($when));
        \assert(preg_match('{^[0-9]{4}-[0-9]{2}-[0-9]{2}$}', $when) === 1);

        $when = \DateTime::createFromFormat('!Y-m-d', $when);

        \assert($when instanceof \DateTime);

        return $this->now >= $when;
    }

    /**
     * @codeCoverageIgnore
     *
     * @todo Remove when PHP < 5.5 is not supported
     *
     * @internal
     *
     * @param mixed $input
     *
     * @return void
     */
    private static function assertDateTimeObject($input)
    {
        if (interface_exists('DateTimeInterface')) {
            Assert::isInstanceOf($input, 'DateTimeInterface');

            return;
        }

        Assert::isInstanceOf($input, 'DateTime');
    }
}
