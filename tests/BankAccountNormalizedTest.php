<?php

namespace Cs278\BankModulus;

/**
 * @covers \Cs278\BankModulus\BankAccountNormalized
 */
final class BankAccountNormalizedTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider dataWithInvalidAccountNumber */
    public function testWithInvalidAccountNumber($accountNumber)
    {
        try {
            new BankAccountNormalized(
                new BankAccount('112233', '123456'),
                '112233',
                $accountNumber
            );
        } catch (\Exception $e) {
            $this->assertInstanceOf('InvalidArgumentException', $e);
            $this->assertInstanceOf('Cs278\BankModulus\Exception\InvalidArgumentException', $e);
            $this->assertInstanceOf('Cs278\BankModulus\Exception\Exception', $e);

            if (\is_string($accountNumber)) {
                $this->assertInstanceOf('Cs278\BankModulus\Exception\AccountNumberInvalidException', $e);
            } else {
                $this->assertNotInstanceOf('Cs278\BankModulus\Exception\AccountNumberInvalidException', $e);
            }

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

    public function testToString()
    {
        $account = BankAccountNormalized::createFromBankAccount(
            new BankAccount('144441', '25555552')
        );

        $this->assertSame('14444125555552', $account->__toString());
    }

    public function dataWithInvalidAccountNumber()
    {
        return [
            [true],
            [12345678],
            [new \stdClass()],
            [[]],
            [''],
            ['X'],
            ['1234567A'],
            ['1234567'],
            ['123456789'],
            ['1234567890'],
        ];
    }
}
