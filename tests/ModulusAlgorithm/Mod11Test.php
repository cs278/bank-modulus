<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

/**
 * @covers \Cs278\BankModulus\ModulusAlgorithm\Mod11
 * @covers \Cs278\BankModulus\ModulusAlgorithm\BaseAlgorithm
 */
final class Mod11Test extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider data */
    public function testCheck($isValid, $remainder, $quotient, $modulus)
    {
        $modulus = $modulus();

        $this->assertSame($isValid, $modulus->check());
    }

    /** @dataProvider data */
    public function testRemainder($isValid, $remainder, $quotient, $modulus)
    {
        $modulus = $modulus();

        $this->assertSame($remainder, $modulus->remainder());
    }

    /** @dataProvider data */
    public function testQuotient($isValid, $remainder, $quotient, $modulus)
    {
        $modulus = $modulus();

        $this->assertSame($quotient, $modulus->quotient());
    }

    public function data()
    {
        return [
            [true, 0, 16, function () {
                return new Mod11('00000058177632', [0, 0, 0, 0, 0, 0, 7, 5, 8, 3, 4, 6, 2, 1]);
            }],
            [false, 4, 16, function () {
                return new Mod11('00000058177636', [0, 0, 0, 0, 0, 0, 7, 5, 8, 3, 4, 6, 2, 1]);
            }],
        ];
    }
}
