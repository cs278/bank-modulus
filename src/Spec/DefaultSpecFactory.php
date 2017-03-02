<?php

declare(strict_types=1);

namespace Cs278\BankModulus\Spec;

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
     * @internal Used for testing
     *
     * @param \DateTimeInterface $now
     *
     * @return self
     */
    public static function withNow(\DateTimeInterface $now): self
    {
        // Uses an error so error suppression ignores it.
        trigger_error(sprintf('%s() is for testing only!', __METHOD__), E_USER_WARNING);

        $now = $now instanceof \DateTime ? \DateTimeImmutable::createFromMutable($now) : $now;

        $spec = new self();
        $spec->updateNow = false;
        $spec->now = $now
            ->setTime(0, 0, 0)
            ->setTimezone($spec->tz);

        return $spec;
    }

    /** {@inheritdoc} */
    public function create(): SpecInterface
    {
        if ($this->updateNow) {
            $this->now = new \DateTimeImmutable('today', $this->tz);
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
        assert(preg_match('{^[0-9]{4}-[0-9]{2}-[0-9]{2}$}', $when));

        $when = \DateTimeImmutable::createFromFormat('!Y-m-d', $when);

        assert($when instanceof \DateTimeImmutable);

        return $this->now >= $when;
    }
}
