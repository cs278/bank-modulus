<?php

namespace Cs278\BankModulus\Spec;

use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\Spec\VocaLinkV380\DataV580;
use Cs278\BankModulus\Spec\VocaLinkV380\Driver;

final class VocaLinkV580 implements SpecInterface
{
    private $driver;

    public function __construct()
    {
        $this->driver = new Driver(new DataV580());
    }

    public function check(BankAccountNormalized $bankAccount)
    {
        return $this->driver->check($bankAccount);
    }
}
