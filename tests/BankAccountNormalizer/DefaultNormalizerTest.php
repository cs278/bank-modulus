<?php

namespace Cs278\BankModulus\Tests;

use Cs278\BankModulus\BankAccount;
use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\BankAccountNormalizer\DefaultNormalizer;

final class DefaultNormalizerTest extends \PHPUnit_Framework_TestCase
{
    public function testPassingInNormalizers()
    {
        $bankAccount = new BankAccount('08-32-16', '12345678');
        $expectedSortCode = '166432';
        $expectedAccountNumber = '01234567';

        $mock = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountNormalizer\NormalizerInterface');

        $mock
            ->expects($this->any())
            ->method('supports')
            ->will($this->returnValue(true));

        $mock
            ->expects($this->any())
            ->method('normalize')
            ->will($this->returnValue(
                new BankAccountNormalized($bankAccount, $expectedSortCode, $expectedAccountNumber)
            ));

        $normalizer = new DefaultNormalizer([
            $mock,
        ]);

        $result = $normalizer->normalize($bankAccount);

        $this->assertInstanceOf('Cs278\BankModulus\BankAccountInterface', $result);
        $this->assertSame($expectedSortCode, $result->getSortCode()->format('%s%s%s'));
        $this->assertSame($expectedAccountNumber, $result->getAccountNumber());
        $this->assertSame($bankAccount, $result->getOriginalBankAccount());
    }

    public function testEmptyNormalizers()
    {
        $expectedSortCode = '122448';
        $expectedAccountNumber = '11223344';
        $bankAccount = new BankAccount($expectedSortCode, $expectedAccountNumber);

        $normalizer = new DefaultNormalizer([]);

        $result = $normalizer->normalize($bankAccount);

        $this->assertInstanceOf('Cs278\BankModulus\BankAccountInterface', $result);
        $this->assertSame($expectedSortCode, $result->getSortCode()->format('%s%s%s'));
        $this->assertSame($expectedAccountNumber, $result->getAccountNumber());
        $this->assertSame($bankAccount, $result->getOriginalBankAccount());
    }

    /** @dataProvider dataNormalize */
    public function testNormalize($expectedSortCode, $expectedAccountNumber, $bankAccount)
    {
        $normalizer = new DefaultNormalizer();

        $result = $normalizer->normalize($bankAccount);

        $this->assertInstanceOf('Cs278\BankModulus\BankAccountInterface', $result);
        $this->assertSame($expectedSortCode, $result->getSortCode()->format('%s%s%s'));
        $this->assertSame($expectedAccountNumber, $result->getAccountNumber());
        $this->assertSame($bankAccount, $result->getOriginalBankAccount());
    }

    /** @dataProvider dataNormalize */
    public function testNormalizeMixup($expectedSortCode, $expectedAccountNumber, $bankAccount)
    {
        $normalizer = new DefaultNormalizer();
        $prop = new \ReflectionProperty($normalizer, 'normalizers');
        $prop->setAccessible(true);

        $normalizers = $prop->getValue($normalizer);

        // Attempt to find if changing the order influcences the results.
        for ($i = 0; $i < 5; ++$i) {
            shuffle($normalizers); // Give them a quick shake around.
            $prop->setValue($normalizer, $normalizers); // Set back in to object.

            $result = $normalizer->normalize($bankAccount);

            $this->assertInstanceOf('Cs278\BankModulus\BankAccountInterface', $result);
            $this->assertSame($expectedSortCode, $result->getSortCode()->format('%s%s%s'));
            $this->assertSame($expectedAccountNumber, $result->getAccountNumber());
            $this->assertSame($bankAccount, $result->getOriginalBankAccount());
        }
    }

    /** @dataProvider dataNormalize */
    public function testSupports($expectedSortCode, $expectedAccountNumber, $bankAccount)
    {
        $normalizer = new DefaultNormalizer();

        $this->assertTrue($normalizer->supports($bankAccount));
    }

    public function dataNormalize()
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
