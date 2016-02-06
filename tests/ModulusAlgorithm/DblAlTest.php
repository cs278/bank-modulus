<?php

namespace Cs278\BankModulus\Tests;

use Cs278\BankModulus\ModulusAlgorithm\DblAl;

final class DblAlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider data */
    public function testCheck($isValid, $remainder, $quotient, DblAl $modulus)
    {
        $this->assertSame($isValid, $modulus->check());
    }

    /** @dataProvider data */
    public function testRemainder($isValid, $remainder, $quotient, DblAl $modulus)
    {
        $this->assertSame($remainder, $modulus->remainder());
    }

    /** @dataProvider data */
    public function testQuotient($isValid, $remainder, $quotient, DblAl $modulus)
    {
        $this->assertSame($quotient, $modulus->quotient());
    }

    public function data()
    {
        return [
            [true, 0, 7, new DblAl('49927312345678', [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1])],
            [false, 1, 7, new DblAl('49927312345679', [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1])],
        ];
    }
}
