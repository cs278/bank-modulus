<?php

namespace Cs278\BankModulus\Spec;

use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\Spec\VocaLinkV380\DataV740;
use Cs278\BankModulus\Spec\VocaLinkV380\Driver;

final class VocaLinkV740 implements SpecInterface
{
    /** @var Driver */
    private $driver;

    public function __construct()
    {
        $this->driver = new Driver(new DataV740());
    }

    public function check(BankAccountNormalized $bankAccount)
    {
        return $this->driver->check($bankAccount);
    }
}
