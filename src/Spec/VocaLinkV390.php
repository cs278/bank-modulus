<?php

declare(strict_types=1);

namespace Cs278\BankModulus\Spec;

use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\Spec\VocaLinkV380\DataV390;
use Cs278\BankModulus\Spec\VocaLinkV380\Driver;

final class VocaLinkV390 implements SpecInterface
{
    private $driver;

    public function __construct()
    {
        $this->driver = new Driver(new DataV390());
    }

    public function check(BankAccountNormalized $bankAccount): bool
    {
        return $this->driver->check($bankAccount);
    }
}
