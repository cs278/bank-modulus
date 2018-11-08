<?php

namespace Cs278\BankModulus\Spec;

use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\Spec\VocaLinkV380\DataV500;
use Cs278\BankModulus\Spec\VocaLinkV380\Driver;

final class VocaLinkV500 implements SpecInterface
{
    private $driver;

    public function __construct()
    {
        $this->driver = new Driver(new DataV500());
    }

    public function check(BankAccountNormalized $bankAccount): bool
    {
        return $this->driver->check($bankAccount);
    }
}
