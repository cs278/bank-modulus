<?php

namespace Cs278\BankModulus\Exception;

/**
 * @covers \Cs278\BankModulus\Exception\AccountNumberInvalidException
 */
final class AccountNumberInvalidExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $e = AccountNumberInvalidException::create('12345678', $e2 = new \Exception());

        $this->assertInstanceOf('Cs278\BankModulus\Exception\AccountNumberInvalidException', $e);
        $this->assertInstanceOf('Cs278\BankModulus\Exception\InvalidArgumentException', $e);
        $this->assertInstanceOf('Cs278\BankModulus\Exception\Exception', $e);
        $this->assertInstanceOf('InvalidArgumentException', $e);

        $this->assertSame($e2, $e->getPrevious());
        $this->assertEquals('`1******8` is not a valid account number', $e->getMessage());
    }
}
