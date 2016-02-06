<?php

namespace Cs278\BankModulus\Tests;

use Cs278\BankModulus\BankAccount;
use Cs278\BankModulus\BankAccountNormalizer;

final class BankAccountNormalizerTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider dataApply */
    public function testApply($expectedSortCode, $expectedAccountNumber, $bankAccount)
    {
        $normalizer = new BankAccountNormalizer();

        $result = $normalizer->apply($bankAccount);

        $this->assertInstanceOf('Cs278\BankModulus\BankAccountInterface', $result);
        $this->assertSame($expectedSortCode, $result->getSortCode()->format('%s%s%s'));
        $this->assertSame($expectedAccountNumber, $result->getAccountNumber());
        $this->assertSame($bankAccount, $result->getOriginalBankAccount());
    }

    /** @dataProvider dataApply */
    public function testApplyMixup($expectedSortCode, $expectedAccountNumber, $bankAccount)
    {
        $normalizer = new BankAccountNormalizer();
        $prop = new \ReflectionProperty($normalizer, 'normalizers');
        $prop->setAccessible(true);

        $normalizers = $prop->getValue($normalizer);

        // Attempt to find if changing the order influcences the results.
        for ($i = 0; $i < 5; ++$i) {
            shuffle($normalizers); // Give them a quick shake around.
            $prop->setValue($normalizer, $normalizers); // Set back in to object.

            $result = $normalizer->apply($bankAccount);

            $this->assertInstanceOf('Cs278\BankModulus\BankAccountInterface', $result);
            $this->assertSame($expectedSortCode, $result->getSortCode()->format('%s%s%s'));
            $this->assertSame($expectedAccountNumber, $result->getAccountNumber());
            $this->assertSame($bankAccount, $result->getOriginalBankAccount());
        }
    }

    public function dataApply()
    {
        return [
            // Co-op Bank
            ['081245', '12345678', new BankAccount('081245', '1234567890')],
            ['081245', '00123456', new BankAccount('081245', '0012345678')],
            // NatWest
            ['600000', '23456789', new BankAccount('600000', '01-23456789')],
            ['600000', '23456789', new BankAccount('600000', '0123456789')],
            // Santander
            ['091231', '23456789', new BankAccount('091234', '123456789')],
            ['091237', '55555555', new BankAccount('091234', '755555555')],
            ['724321', '23456789', new BankAccount('724321', '123456789')],
            // Seven Digit
            ['123456', '01234567', new BankAccount('123456', '1234567')],
            ['123456', '00000000', new BankAccount('123456', '0000000')],
            ['123456', '09999999', new BankAccount('123456', '9999999')],
            // Six Digit
            ['123456', '00123456', new BankAccount('123456', '123456')],
            ['123456', '00000000', new BankAccount('123456', '000000')],
            ['123456', '00999999', new BankAccount('123456', '999999')],
        ];
    }
}
