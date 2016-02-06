<?php

namespace Cs278\BankModulus\Tests;

use Cs278\BankModulus\BankAccount;
use Cs278\BankModulus\BankAccountNormalizer\SantanderNormalizer;

final class SantanderNormalizerTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider dataSupports */
    public function testSupports($expected, $bankAccount)
    {
        $normalizer = new SantanderNormalizer();

        $this->assertSame($expected, $normalizer->supports($bankAccount), $bankAccount->getSortCode()->format('%s-%s-%s'));
    }

    /** @dataProvider dataNormalize */
    public function testNormalize($expectedSortCode, $expectedAccountNumber, $bankAccount)
    {
        $normalizer = new SantanderNormalizer();

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
            ['091231', '23456789', new BankAccount('091234', '123456789')],
            ['091237', '55555555', new BankAccount('091234', '755555555')],
            ['724321', '23456789', new BankAccount('724321', '123456789')],
        ];
    }

    public function dataSupports()
    {
        return [
            // 09-[01]*-** (London clearing)
            [false, new BankAccount('089999', '123456789')],
            [true,  new BankAccount('090000', '123456789')],
            [true,  new BankAccount('090001', '123456789')],
            [true,  new BankAccount('091000', '123456789')],
            [true,  new BankAccount('091999', '123456789')],
            [false, new BankAccount('092000', '123456789')],
            [false, new BankAccount('092001', '123456789')],
            // 72-**-** (ex. Girobank)
            [false, new BankAccount('719999', '123456789')],
            [true,  new BankAccount('720000', '123456789')],
            [true,  new BankAccount('720001', '123456789')],
            [true,  new BankAccount('729999', '123456789')],
            [false, new BankAccount('730000', '123456789')],
            [false, new BankAccount('730001', '123456789')],
            // 89-[012]*-** (Scottish clearing)
            [false, new BankAccount('889999', '123456789')],
            [true,  new BankAccount('890000', '123456789')],
            [true,  new BankAccount('890001', '123456789')],
            [true,  new BankAccount('891000', '123456789')],
            [true,  new BankAccount('892000', '123456789')],
            [true,  new BankAccount('892999', '123456789')],
            [false, new BankAccount('893000', '123456789')],
            [false, new BankAccount('893001', '123456789')],

            // Check only allows 9 digit account numbers.
            [false, new BankAccount('890000', '1')],
            [false, new BankAccount('890000', '12')],
            [false, new BankAccount('890000', '123')],
            [false, new BankAccount('890000', '1234')],
            [false, new BankAccount('890000', '12345')],
            [false, new BankAccount('890000', '123456')],
            [false, new BankAccount('890000', '1234567')],
            [false, new BankAccount('890000', '12345678')],
            [true,  new BankAccount('890000', '123456789')],
            [false, new BankAccount('890000', '1234567890')],
            [false, new BankAccount('890000', '12345678901')],
            [false, new BankAccount('890000', '123456789012')],
            [false, new BankAccount('890000', '1234567890123')],
            [false, new BankAccount('890000', '12345678901234')],
            [false, new BankAccount('890000', '123456789012345')],
            [false, new BankAccount('890000', '1234567890123456')],
            [false, new BankAccount('890000', '12345678901234567')],
            [false, new BankAccount('890000', '123456789012345678')],
            [false, new BankAccount('890000', '1234567890123456789')],
            [false, new BankAccount('890000', '12345678901234567890')],
        ];
    }
}
