<?php

namespace Cs278\BankModulus\Spec;

interface SpecFactoryInterface
{
    /**
     * Create specification and return.
     *
     * Implementations may create and hold singletons rather than returning a
     * new object on each method call, however any state (e.g. current time)
     * should be checked for validity.
     *
     * @return SpecInterface
     */
    public function create();
}
