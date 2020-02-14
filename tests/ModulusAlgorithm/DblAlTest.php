<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

/**
 * @covers \Cs278\BankModulus\ModulusAlgorithm\DblAl
 * @covers \Cs278\BankModulus\ModulusAlgorithm\BaseAlgorithm
 */
final class DblAlTest extends \PHPUnit\Framework\TestCase
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
            [true, 0, 7, function () {
                return new DblAl('49927312345678', [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1]);
            }],
            [false, 1, 7, function () {
                return new DblAl('49927312345679', [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1]);
            }],
        ];
    }
}
