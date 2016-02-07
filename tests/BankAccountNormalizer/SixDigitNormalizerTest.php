<?php

namespace Cs278\BankModulus\BankAccountNormalizer;

use Cs278\BankModulus\BankAccount;

/**
 * @covers Cs278\BankModulus\BankAccountNormalizer\SixDigitNormalizer
 */
final class SixDigitNormalizerTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider dataSupports */
    public function testSupports($expected, $accountNumber)
    {
        $normalizer = new SixDigitNormalizer();
        $bankAccount = new BankAccount('012345', $accountNumber);

        $this->assertSame($expected, $normalizer->supports($bankAccount), $accountNumber);
    }

    /** @dataProvider dataNormalize */
    public function testNormalize($expectedAccountNumber, $accountNumber)
    {
        $normalizer = new SixDigitNormalizer();
        $sortCode = '129921';
        $bankAccount = new BankAccount($sortCode, $accountNumber);

        // Results are undefined if not a supported bank account.
        $this->assertTrue($normalizer->supports($bankAccount));

        $result = $normalizer->normalize($bankAccount);

        $this->assertInstanceOf('Cs278\BankModulus\BankAccountInterface', $result);
        $this->assertSame($sortCode, $result->getSortCode()->format('%s%s%s'));
        $this->assertSame($expectedAccountNumber, $result->getAccountNumber());
        $this->assertSame($bankAccount, $result->getOriginalBankAccount());
    }

    public function dataNormalize()
    {
        return [
            ['00123456', '123456'],
            ['00000000', '000000'],
            ['00999999', '999999'],
        ];
    }

    public function dataSupports()
    {
        return [
            // Check only allows 6 digit account numbers.
            [true,  '123456'],
            [false, '1234567'],
            [false, '12345678'],
            [false, '123456789'],
            [false, '1234567890'],
            [false, '12345678901'],
            [false, '123456789012'],
            [false, '1234567890123'],
            [false, '12345678901234'],
            [false, '123456789012345'],
            [false, '1234567890123456'],
            [false, '12345678901234567'],
            [false, '123456789012345678'],
            [false, '1234567890123456789'],
            [false, '12345678901234567890'],
        ];
    }
}
