<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

abstract class BaseAlgorithm implements AlgorithmInterface
{
    private $result;
    private $divisor;
    private static $ourIntdiv;

    public function __construct($result, $divisor)
    {
        $this->result = $result;
        $this->divisor = $divisor;
    }

    final public function quotient()
    {
        if (null === self::$ourIntdiv) {
            self::$ourIntdiv = !function_exists('intdiv');

            if (self::$ourIntdiv && !function_exists('Cs278\BankModulus\intdiv')) {
                require __DIR__.'/../intdiv.php';
            }
        }

        if (self::$ourIntdiv) {
            return \Cs278\BankModulus\intdiv($this->result, $this->divisor);
        } else {
            return intdiv($this->result, $this->divisor);
        }
    }

    final public function remainder()
    {
        return $this->result % $this->divisor;
    }

    final public function check()
    {
        return 0 === $this->remainder();
    }
}
