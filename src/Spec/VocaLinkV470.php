<?php

namespace Cs278\BankModulus\Spec;

use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\Spec\VocaLinkV380\DataV470;
use Cs278\BankModulus\Spec\VocaLinkV380\Driver;

final class VocaLinkV470 implements SpecInterface
{
    private $driver;

    public function __construct()
    {
        $this->driver = new Driver(new DataV470());
    }

    public function check(BankAccountNormalized $bankAccount): bool
    {
        return $this->driver->check($bankAccount);
    }
}
