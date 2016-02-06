<?php

namespace Cs278\BankModulus;

final class BankAccountNormalizedTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider dataWithInvalidAccountNumber */
    public function testWithInvalidAccountNumber($accountNumber)
    {
        try {
            BankAccountNormalized::createFromBankAccount(
                new BankAccount('112233', $accountNumber)
            );
        } catch (\Exception $e) {
            $this->assertInstanceOf('InvalidArgumentException', $e);
            $this->assertInstanceOf('Cs278\BankModulus\Exception\InvalidArgumentException', $e);
            $this->assertInstanceOf('Cs278\BankModulus\Exception\Exception', $e);
            return;
        }

        $this->fail('Failed to catch exception');
    }

    public function testGetOriginalBankAccount()
    {
        $account = BankAccountNormalized::createFromBankAccount(
            $original = new BankAccount('112233', '12345678')
        );

        $this->assertSame($original, $account->getOriginalBankAccount());
    }

    public function testGetSortCodeWithObject()
    {
        $sortCode = new SortCode('112233');
        $account = BankAccountNormalized::createFromBankAccount(
            new BankAccount($sortCode, '12345678')
        );

        $this->assertSame($sortCode, $account->getSortCode());
    }

    public function testGetSortCodeWithString()
    {
        $account = BankAccountNormalized::createFromBankAccount(
            new BankAccount('11-22 33', '12345678')
        );

        $this->assertSame('112233', $account->getSortCode()->format('%s%s%s'));
    }

    public function testGetAccountNumber()
    {
        $account = BankAccountNormalized::createFromBankAccount(
            new BankAccount('112233', 'AC1-2345678')
        );

        $this->assertSame('12345678', $account->getAccountNumber());
    }

    public function dataWithInvalidAccountNumber()
    {
        return [
            [true],
            [12345678],
            [new \stdClass],
            [''],
            ['X'],
            ['1234567A'],
            ['1234567'],
            ['123456789'],
            ['1234567890'],
        ];
    }
}
