<?php

namespace Cs278\BankModulus;

if (!function_exists('Cs278\BankModulus\intdiv')) {
    require __DIR__.'/../src/intdiv.php';
}

/**
 * Tests sourced from:
 *
 * https://github.com/php/php-src/blob/abc06b91cdc7bfee7cdd7822063fbb9d1465e809/ext/standard/tests/math/intdiv.phpt
 *
 * @covers Cs278\BankModulus\intdiv
 */
final class IntdivTest extends \PHPUnit_Framework_TestCase
{
    public function data()
    {
        return [
            [1, 3, 2],
            [-1, -3, 2],
            [-1, 3, -2],
            [1, -3, -2],
            [1, PHP_INT_MAX, PHP_INT_MAX],
            [1, ~PHP_INT_MAX, ~PHP_INT_MAX],
        ];
    }

    /** @dataProvider data */
    public function testSuccess($expected, $dividend, $divisor)
    {
        $result = \Cs278\BankModulus\intdiv($dividend, $divisor);

        $this->assertSame($expected, $result);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Division of PHP_INT_MIN by -1 is not an integer
     */
    public function testNotInteger()
    {
        \Cs278\BankModulus\intdiv(~PHP_INT_MAX, -1);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Division by zero
     */
    public function testDivisionByZero()
    {
        \Cs278\BankModulus\intdiv(1, 0);
    }
}
