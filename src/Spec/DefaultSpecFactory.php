<?php

namespace Cs278\BankModulus\Spec;

use Cs278\BankModulus\Exception\Util as E;
use Webmozart\Assert\Assert;

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
     * @internal Used for testing
     *
     * @param \DateTime $now
     *
     * @return self
     */
    public static function withNow(\DateTime $now)
    {
        // Uses an error so error suppression ignores it.
        trigger_error(sprintf('%s() is for testing only!', __METHOD__), E_USER_WARNING);

        $spec = new self();
        $spec->now = clone $now;
        $spec->now->setTime(0, 0, 0);
        $spec->now->setTimezone($spec->tz);
        $spec->updateNow = false;

        return $spec;
    }

    /** {@inheritdoc} */
    public function create()
    {
        if ($this->updateNow) {
            $this->now = new \DateTime('today', $this->tz);
        }

        if ($this->dateOnOrAfter('2017-01-09')) {
            return new VocaLinkV400();
        }

        return new VocaLinkV390();
    }

    private function dateOnOrAfter($when)
    {
        try {
            Assert::string($when);
            Assert::regex($when, '{^[0-9]{4}-[0-9]{2}-[0-9]{2}$}');
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        $when = \DateTime::createFromFormat('!Y-m-d', $when);

        assert($when instanceof \DateTime);

        return $this->now >= $when;
    }
}
