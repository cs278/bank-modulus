<?php

namespace Cs278\BankModulus;

final class BankAccountTest extends \PHPUnit_Framework_TestCase
{
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
}
