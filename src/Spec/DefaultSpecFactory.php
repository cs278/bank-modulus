<?php

namespace Cs278\BankModulus\Spec;

/**
 * Default factory implementation.
 *
 * Uses the correct specification based on the current date.
 */
final class DefaultSpecFactory implements SpecFactoryInterface
{
    /** @var \DateTime|null */
    private $now;

    /** {@inheritdoc} */
    public function create()
    {
        $this->now = new \DateTime('today');

        if ($this->dateOnOrAfter('2017-01-09')) {
            return new VocaLinkV400();
        }

        return new VocaLink390();
    }

    private function dateOnOrAfter($when)
    {
        Assert::string($when);
        Assert::regex($when, '{^[0-9]{4}-[0-9]{2}-[0-9]{2}$}');

        $when = \DateTime::createFromFormat('!Y-m-d', $when);

        assert($when instanceof \DateTime);

        return $this->now >= $when;
    }
}
