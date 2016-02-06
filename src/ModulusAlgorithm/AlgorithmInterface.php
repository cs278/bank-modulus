<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

if (!function_exists('Cs278\BankModulus\intdiv')) {
    require __DIR__.'/../intdiv.php';
}

interface AlgorithmInterface
{
    public function quotient();
    public function remainder();
    public function check();
}
