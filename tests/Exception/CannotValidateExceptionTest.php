<?php

namespace Cs278\BankModulus\Exception;

use Cs278\BankModulus\BankAccount;
use Cs278\BankModulus\BankAccountNormalized;

/**
 * @covers Cs278\BankModulus\Exception\CannotValidateException
 */
final class CannotValidateExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $e = CannotValidateException::createFromBankAccount(new BankAccount('123456', '12345678'), $e2 = new \Exception());

        $this->assertInstanceOf('Cs278\BankModulus\Exception\CannotValidateException', $e);
        $this->assertInstanceOf('Cs278\BankModulus\Exception\Exception', $e);
        $this->assertInstanceOf('RuntimeException', $e);

        $this->assertSame($e2, $e->getPrevious());
        $this->assertEquals('Unable to determine if the bank details `12-**-56 1******8` are valid or invalid', $e->getMessage());
    }

    public function testCreateWithNormalized()
    {
        $e = CannotValidateException::createFromBankAccount(
            BankAccountNormalized::createFromBankAccount(new BankAccount('123456', '12345678')),
            $e2 = new \Exception()
        );

        $this->assertInstanceOf('Cs278\BankModulus\Exception\CannotValidateException', $e);
        $this->assertInstanceOf('Cs278\BankModulus\Exception\Exception', $e);
        $this->assertInstanceOf('RuntimeException', $e);

        $this->assertSame($e2, $e->getPrevious());
        $this->assertEquals('Unable to determine if the bank details `12-**-56 1******8` are valid or invalid', $e->getMessage());
    }
}
