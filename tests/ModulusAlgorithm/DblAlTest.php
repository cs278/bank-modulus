<?php

namespace Cs278\BankModulus\ModulusAlgorithm;

/**
 * @covers \Cs278\BankModulus\ModulusAlgorithm\DblAl
 * @covers \Cs278\BankModulus\ModulusAlgorithm\BaseAlgorithm
 */
final class DblAlTest extends \PHPUnit\Framework\TestCase
{
    public function testNegativeWeightsAreNotPermitted(): void
    {
        $this->expectException(\Cs278\BankModulus\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessage('Expected all weights to be greater than or equal to zero. Got: -1');

        new DblAl('11223312345678', [2, 1, -1, 3, 9, -9, 1, 8, 2, 4, 1, -5, -6, -2]);
    }

    /** @dataProvider data */
    public function testCheck($isValid, $remainder, $quotient, $modulus): void
    {
        $modulus = $modulus();

        $this->assertSame($isValid, $modulus->check());
    }

    /** @dataProvider data */
    public function testRemainder($isValid, $remainder, $quotient, $modulus): void
    {
        $modulus = $modulus();

        $this->assertSame($remainder, $modulus->remainder());
    }

    /** @dataProvider data */
    public function testQuotient($isValid, $remainder, $quotient, $modulus): void
    {
        $modulus = $modulus();

        $this->assertSame($quotient, $modulus->quotient());
    }

    public static function data(): iterable
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
