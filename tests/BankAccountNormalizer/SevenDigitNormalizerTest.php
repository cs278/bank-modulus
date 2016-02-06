<?php

namespace Cs278\BankModulus\Tests;

use Cs278\BankModulus\BankAccount;
use Cs278\BankModulus\BankAccountNormalizer\SevenDigitNormalizer;

final class SevenDigitNormalizerTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider dataSupports */
    public function testSupports($expected, $accountNumber)
    {
        $normalizer = new SevenDigitNormalizer();
        $bankAccount = new BankAccount('012345', $accountNumber);

        $this->assertSame($expected, $normalizer->supports($bankAccount), $accountNumber);
    }

    /** @dataProvider dataNormalize */
    public function testNormalize($expectedAccountNumber, $accountNumber)
    {
        $normalizer = new SevenDigitNormalizer();
        $sortCode = '129921';
        $bankAccount = new BankAccount($sortCode, $accountNumber);

        // Resuls are undefined if not a support bank account.
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
            ['01234567', '1234567'],
            ['00000000', '0000000'],
            ['09999999', '9999999'],
        ];
    }

    public function dataSupports()
    {
        return [
            // Check only allows 6 digit account numbers.
            [false, '1'],
            [false, '12'],
            [false, '123'],
            [false, '1234'],
            [false, '12345'],
            [false, '123456'],
            [true,  '1234567'],
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
