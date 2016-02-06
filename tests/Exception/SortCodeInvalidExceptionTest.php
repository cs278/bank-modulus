<?php

namespace Cs278\BankModulus\Exception;

/**
 * @covers Cs278\BankModulus\Exception\SortCodeInvalidException
 */
final class SortCodeInvalidExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $e = SortCodeInvalidException::create('123456', $e2 = new \Exception);

        $this->assertInstanceOf('Cs278\BankModulus\Exception\SortCodeInvalidException', $e);
        $this->assertInstanceOf('Cs278\BankModulus\Exception\InvalidArgumentException', $e);
        $this->assertInstanceOf('Cs278\BankModulus\Exception\Exception', $e);
        $this->assertInstanceOf('InvalidArgumentException', $e);

        $this->assertSame($e2, $e->getPrevious());
        $this->assertEquals('`1****6` is not a valid sort code', $e->getMessage());
    }
}
