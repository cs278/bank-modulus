<?php

namespace Cs278\BankModulus\Tests;

use Cs278\BankModulus\BankAccount;
use Cs278\BankModulus\BankAccountNormalizer\NatWestNormalizer;

final class NatWestNormalizerTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider dataSupports */
    public function testSupports($expected, $bankAccount)
    {
        $normalizer = new NatWestNormalizer();

        $this->assertSame($expected, $normalizer->supports($bankAccount), $bankAccount->getSortCode()->format('%s-%s-%s'));
    }

    /** @dataProvider dataNormalize */
    public function testNormalize($expectedSortCode, $expectedAccountNumber, $bankAccount)
    {
        $normalizer = new NatWestNormalizer();

        // Results are undefined if not a supported bank account.
        $this->assertTrue($normalizer->supports($bankAccount));

        $result = $normalizer->normalize($bankAccount);

        $this->assertInstanceOf('Cs278\BankModulus\BankAccountInterface', $result);
        $this->assertSame($expectedSortCode, $result->getSortCode()->format('%s%s%s'));
        $this->assertSame($expectedAccountNumber, $result->getAccountNumber());
        $this->assertSame($bankAccount, $result->getOriginalBankAccount());
    }

    public function dataNormalize()
    {
        return [
            ['600000', '23456789', new BankAccount('600000', '01-23456789')],
            ['600000', '23456789', new BankAccount('600000', '0123456789')],
        ];
    }

    public function dataSupports()
    {
        return [
            // 01-**-** ex. District Bank
            [false, new BankAccount('009999', '1234567890')],
            [true,  new BankAccount('010000', '1234567890')],
            [true,  new BankAccount('010001', '1234567890')],
            [true,  new BankAccount('019999', '1234567890')],
            [false, new BankAccount('020000', '1234567890')],
            [false, new BankAccount('020001', '1234567890')],
            // 50-**-** ex. National Provincial Bank
            [false, new BankAccount('499999', '1234567890')],
            [true,  new BankAccount('500000', '1234567890')],
            [true,  new BankAccount('500001', '1234567890')],
            [true,  new BankAccount('599999', '1234567890')],
            // 6[0123456]-**-** ex. Westminster Bank
            [true,  new BankAccount('600000', '1234567890')],
            [true,  new BankAccount('600001', '1234567890')],
            [true,  new BankAccount('610000', '1234567890')],
            [true,  new BankAccount('620000', '1234567890')],
            [true,  new BankAccount('630000', '1234567890')],
            [true,  new BankAccount('640000', '1234567890')],
            [true,  new BankAccount('650000', '1234567890')],
            [true,  new BankAccount('660000', '1234567890')],
            [true,  new BankAccount('669999', '1234567890')],
            [false, new BankAccount('670000', '1234567890')],
            [false, new BankAccount('670001', '1234567890')],

            // Check only allows 10 digit account numbers.
            [false, new BankAccount('600000', '1')],
            [false, new BankAccount('600000', '12')],
            [false, new BankAccount('600000', '123')],
            [false, new BankAccount('600000', '1234')],
            [false, new BankAccount('600000', '12345')],
            [false, new BankAccount('600000', '123456')],
            [false, new BankAccount('600000', '1234567')],
            [false, new BankAccount('600000', '12345678')],
            [false, new BankAccount('600000', '123456789')],
            [true,  new BankAccount('600000', '1234567890')],
            [false, new BankAccount('600000', '12345678901')],
            [false, new BankAccount('600000', '123456789012')],
            [false, new BankAccount('600000', '1234567890123')],
            [false, new BankAccount('600000', '12345678901234')],
            [false, new BankAccount('600000', '123456789012345')],
            [false, new BankAccount('600000', '1234567890123456')],
            [false, new BankAccount('600000', '12345678901234567')],
            [false, new BankAccount('600000', '123456789012345678')],
            [false, new BankAccount('600000', '1234567890123456789')],
            [false, new BankAccount('600000', '12345678901234567890')],
        ];
    }
}
