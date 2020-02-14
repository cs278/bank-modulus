<?php

namespace Cs278\BankModulus;

trait AssertArrayContainsTrait
{
    /**
     * @return void
     */
    public static function assertArrayContains(array $expected, array $actual)
    {
        foreach ($expected as $key => $value) {
            \PHPUnit_Framework_TestCase::assertArrayHasKey($key, $actual);
            \PHPUnit_Framework_TestCase::assertSame($value, $actual[$key]);
        }
    }
}
