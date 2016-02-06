<?php

namespace Cs278\BankModulus\Tests;

use Cs278\BankModulus\ModulusAlgorithm\Mod10;

final class Mod10Test extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider data */
    public function testCheck($isValid, $remainder, $quotient, Mod10 $modulus)
    {
        $this->assertSame($isValid, $modulus->check());
    }

    /** @dataProvider data */
    public function testRemainder($isValid, $remainder, $quotient, Mod10 $modulus)
    {
        $this->assertSame($remainder, $modulus->remainder());
    }

    /** @dataProvider data */
    public function testQuotient($isValid, $remainder, $quotient, Mod10 $modulus)
    {
        $this->assertSame($quotient, $modulus->quotient());
    }

    public function data()
    {
        return [
            [false, 6, 17, new Mod10('00000058177632', [0, 0, 0, 0, 0, 0, 7, 5, 8, 3, 4, 6, 2, 1])],
            [true, 0, 18, new Mod10('00000058177636', [0, 0, 0, 0, 0, 0, 7, 5, 8, 3, 4, 6, 2, 1])],
        ];
    }
}
