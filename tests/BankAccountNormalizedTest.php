<?php

namespace Cs278\BankModulus;

/**
 * @covers \Cs278\BankModulus\BankAccountNormalized
 */
final class BankAccountNormalizedTest extends \PHPUnit\Framework\TestCase
{
    /** @dataProvider dataWithInvalidAccountNumber */
    public function testWithInvalidAccountNumber($accountNumber, $isString)
    {
        try {
            new BankAccountNormalized(
                new BankAccount('112233', '123456'),
                '112233',
                $accountNumber
            );
        } catch (\Throwable $e) {
            if ($isString) {
                $this->assertInstanceOf('Cs278\BankModulus\Exception\AccountNumberInvalidException', $e);
            } else {
                $this->assertInstanceOf(\Throwable::class, $e);
                $this->assertInstanceOf(\Error::class, $e);
                $this->assertInstanceOf(\TypeError::class, $e);
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
            [true, true],
            [new \stdClass(), false],
            [[], false],
            ['', true],
            ['X', true],
            ['1234567A', true],
            ['1234567', true],
            ['123456789', true],
            ['1234567890', true],
        ];
    }
}
