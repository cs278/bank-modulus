<?php

namespace Cs278\BankModulus;

/**
 * @covers \Cs278\BankModulus\BankAccount
 */
final class BankAccountTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider dataWithInvalidAccountNumber */
    public function testWithInvalidAccountNumber($accountNumber)
    {
        try {
            new BankAccount('112233', $accountNumber);
        } catch (\Exception $e) {
            $this->assertInstanceOf('InvalidArgumentException', $e);
            $this->assertInstanceOf('Cs278\BankModulus\Exception\InvalidArgumentException', $e);
            $this->assertInstanceOf('Cs278\BankModulus\Exception\Exception', $e);
            $this->assertNotInstanceOf('Cs278\BankModulus\Exception\AccountNumberInvalidException', $e);

            return;
        }

        $this->fail('Failed to catch exception');
    }

    public function testGetSortCodeWithObject()
    {
        $sortCode = new SortCode('112233');
        $account = new BankAccount($sortCode, '12345678');

        $this->assertSame($sortCode, $account->getSortCode());
    }

    public function testGetSortCodeWithString()
    {
        $account = new BankAccount('11-22 33', '12345678');

        $this->assertSame('112233', $account->getSortCode()->format('%s%s%s'));
    }

    public function testGetAccountNumber()
    {
        $account = new BankAccount('112233', 'AC1-2345678');

        $this->assertSame('12345678', $account->getAccountNumber());
    }

    public function dataWithInvalidAccountNumber()
    {
        return [
            [true],
            [12345678],
            [new \stdClass()],
            [[]],
            [''],
            ['ABCDEFGH'],
            ['12345ABC'],
            ['1ABCDEF6'],
        ];
    }
}
