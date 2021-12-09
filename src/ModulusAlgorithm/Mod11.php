<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

final class Mod11 extends BaseAlgorithm
{
    /**
     * @param string $input
     * @param int[]  $weights
     */
    public function __construct($input, array $weights)
    {
        $result = array_sum($this->applyWeights($input, $weights));
        \assert(\is_int($result));

        parent::__construct(
            $result,
            11
        );
    }
}
