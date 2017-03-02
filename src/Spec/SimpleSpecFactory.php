<?php

declare(strict_types=1);

namespace Cs278\BankModulus\Spec;

/**
 * Simply returns the supplied specification.
 */
final class SimpleSpecFactory implements SpecFactoryInterface
{
    /** @var SpecInterface */
    private $spec;

    public function __construct(SpecInterface $spec)
    {
        $this->spec = $spec;
    }

    /** {@inheritdoc} */
    public function create(): SpecInterface
    {
        return $this->spec;
    }
}
