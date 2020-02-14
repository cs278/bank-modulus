<?php

namespace Cs278\BankModulus;

use PHPUnit\Framework\TestCase;

trait AssertArrayContainsTrait
{
    /**
     * @return void
     */
    public static function assertArrayContains(array $expected, array $actual)
    {
        foreach ($expected as $key => $value) {
            TestCase::assertArrayHasKey($key, $actual);
            TestCase::assertSame($value, $actual[$key]);
        }
    }
}
