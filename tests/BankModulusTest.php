<?php

namespace Cs278\BankModulus;

/**
 * @covers Cs278\BankModulus\BankModulus
 */
final class BankModulusTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckValid()
    {
        $modulus = new BankModulus();
        $this->assertTrue($modulus->check('089999', '66374958'));
    }

    public function testCheckInvalid()
    {
        $modulus = new BankModulus();
        $this->assertFalse($modulus->check('089999', '66374959'));
    }

    public function testIsValidValid()
    {
        $modulus = new BankModulus();
        $this->assertTrue($modulus->isValid('089999', '66374958'));
    }

    public function testIsValidInvalid()
    {
        $modulus = new BankModulus();
        $this->assertFalse($modulus->isValid('089999', '66374959'));
    }

    public function testUnknown()
    {
        $modulus = new BankModulus();

        $sortCode = '000000';
        $accountNumber = '12345678';

        // Test both methods in tandem to actually unsure it is unkown.
        $this->assertTrue($modulus->check($sortCode, $accountNumber));
        $this->assertFalse($modulus->isValid($sortCode, $accountNumber));
    }

    /** @dataProvider dataNormalize */
    public function testNormalize($expectedSortCode, $expectedAccountNumber, $sortCode, $accountNumber)
    {
        $modulus = new BankModulus();

        $this->assertNull($modulus->normalize($sortCode, $accountNumber));

        $this->assertSame($expectedSortCode, $sortCode);
        $this->assertSame($expectedAccountNumber, $accountNumber);
    }

    public function dataNormalize()
    {
        return [
            // Formatting
            ['123456', '12345678', '12-34-56', '1-2345678'],
            ['123456', '02345678', '12 34 56', '     2345678'],

            // Co-op Bank
            ['081245', '12345678', '081245', '1234567890'],
            ['081245', '00123456', '081245', '0012345678'],
            // NatWest
            ['600000', '23456789', '600000', '01-23456789'],
            ['600000', '23456789', '600000', '0123456789'],
            // Santander
            ['091231', '23456789', '091234', '123456789'],
            ['091237', '55555555', '091234', '755555555'],
            ['724321', '23456789', '724321', '123456789'],
            // Seven Digit
            ['123456', '01234567', '123456', '1234567'],
            ['123456', '00000000', '123456', '0000000'],
            ['123456', '09999999', '123456', '9999999'],
            // Six Digit
            ['123456', '00123456', '123456', '123456'],
            ['123456', '00000000', '123456', '000000'],
            ['123456', '00999999', '123456', '999999'],
        ];
    }
}
