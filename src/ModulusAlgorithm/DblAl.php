<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

final class DblAl extends BaseAlgorithm
{
    /**
     * @param string $input
     * @param int[]  $weights
     */
    public function __construct($input, array $weights)
    {
        \assert(\strlen($input) === \count($weights));

        $result = $this->applyWeights($input, $weights);

        // Sum individual digits.
        $result = array_reduce($result, function ($carry, $value) {
            return $carry + array_sum($this->toChars((string) $value));
        }, 0);

        parent::__construct($result, 10);
    }
}
