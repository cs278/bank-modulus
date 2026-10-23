<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

use Cs278\BankModulus\Internal\Assert;

final class DblAl extends BaseAlgorithm
{
    /**
     * @param string $input
     * @param int[]  $weights
     */
    public function __construct($input, array $weights)
    {
        Assert::allGreaterThanEq($weights, 0, 'Expected all weights to be greater than or equal to zero. Got: %s');

        \assert(\strlen($input) === \count($weights));

        $result = $this->applyWeights($input, $weights);

        // Sum individual digits.
        $result = array_reduce($result, function ($carry, $value) {
            return $carry + array_sum($this->toChars((string) $value));
        }, 0);

        parent::__construct($result, 10);
    }
}
