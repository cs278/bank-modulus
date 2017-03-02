<?php

namespace Cs278\BankModulus;

/**
 * @covers Cs278\BankModulus\Result
 */
final class ResultTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSortCode()
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');
        $sortCode = new SortCode('654321');

        $account
            ->expects($this->any())
            ->method('getSortCode')
            ->will($this->returnValue($sortCode));

        $result = new Result($account, true, true);

        $this->assertSame($sortCode, $result->getSortCode());
    }

    public function testGetAccountNumber()
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');
        $accountNumber = '11223344';

        $account
            ->expects($this->any())
            ->method('getAccountNumber')
            ->will($this->returnValue($accountNumber));

        $result = new Result($account, true, true);

        $this->assertSame($accountNumber, $result->getAccountNumber());
    }

    public function testIsValidated()
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');

        $result = new Result($account, true, true);
        $this->assertTrue($result->isValidated());

        $result = new Result($account, false, null);
        $this->assertFalse($result->isValidated());
    }

    public function testIsValid()
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');

        $result = new Result($account, true, true);
        $this->assertTrue($result->isValid());

        $result = new Result($account, true, false);
        $this->assertFalse($result->isValid());

        // Test unvalidated.
        $result = new Result($account, false, null);
        $this->assertTrue($result->isValid());
        $this->assertTrue($result->isValid(true));
        $this->assertFalse($result->isValid(false));
    }

    /** @dataProvider dataNonBooleans */
    public function testIsValidArgumentValidation($value)
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');

        $result = new Result($account, false, null);

        try {
            $result->isValid($value);
        } catch (\Throwable $e) {
            if ($e instanceof \PHPUnit_Exception) {
                throw $e;
            }

            $this->assertInstanceOf(\TypeError::class, $e);

            return;
        }

        $this->fail('Failed to catch exception');
    }

    /** @dataProvider dataNonBooleans */
    public function testConstructorSpecKnownValidation($value)
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');

        try {
            new Result($account, $value, true);
        } catch (\Throwable $e) {
            if ($e instanceof \PHPUnit_Exception) {
                throw $e;
            }

            $this->assertInstanceOf(\TypeError::class, $e);

            return;
        }

        $this->fail('Failed to catch exception');
    }

    /** @dataProvider dataNonBooleans */
    public function testConstructorSpecResultValidationWithSpecKnown($value)
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');

        try {
            new Result($account, true, $value);
        } catch (\Throwable $e) {
            if ($e instanceof \PHPUnit_Exception) {
                throw $e;
            }

            $this->assertInvalidArgumentException('specResult should be a boolean, got: `%s`', $e);

            return;
        }

        $this->fail('Failed to catch exception');
    }

    /** @dataProvider dataNonNulls */
    public function testConstructorSpecResultValidationWithSpecUnnown($value)
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');

        try {
            new Result($account, false, $value);
        } catch (\Throwable $e) {
            if ($e instanceof \PHPUnit_Exception) {
                throw $e;
            }

            $this->assertInvalidArgumentException('specResult should be null, got: `%s`', $e);

            return;
        }

        $this->fail('Failed to catch exception');
    }

    public function dataNonBooleans()
    {
        return [
            [null],
            [new \stdClass()],
            [[1]],
        ];
    }

    public function dataNonNulls()
    {
        return [
            ['1'],
            [1],
            [0],
            [false],
            [true],
            [new \stdClass()],
            [[1]],
            [1.0],
        ];
    }

    private function assertInvalidArgumentException($expectedMessage, $e)
    {
        $this->assertInstanceOf('Cs278\BankModulus\Exception\Exception', $e);
        $this->assertInstanceOf('Cs278\BankModulus\Exception\InvalidArgumentException', $e);
        $this->assertInstanceOf('InvalidArgumentException', $e);
        $this->assertStringMatchesFormat($expectedMessage, $e->getMessage());
    }
}
