<?php

namespace Cs278\BankModulus;

/**
 * @covers \Cs278\BankModulus\Result
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

        $result = new Result($account, true, true, new \DateTimeImmutable());

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

        $result = new Result($account, true, true, new \DateTimeImmutable());

        $this->assertSame($accountNumber, $result->getAccountNumber());
    }

    public function testIsValidated()
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');

        $result = new Result($account, true, true, new \DateTimeImmutable());
        $this->assertTrue($result->isValidated());

        $result = new Result($account, false, null, new \DateTimeImmutable());
        $this->assertFalse($result->isValidated());
    }

    public function testIsValid()
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');

        $result = new Result($account, true, true, new \DateTimeImmutable());
        $this->assertTrue($result->isValid());

        $result = new Result($account, true, false, new \DateTimeImmutable());
        $this->assertFalse($result->isValid());

        // Test unvalidated.
        $result = new Result($account, false, null, new \DateTimeImmutable());
        $this->assertTrue($result->isValid());
        $this->assertTrue($result->isValid(true));
        $this->assertFalse($result->isValid(false));
    }

    /** @dataProvider dataNonBooleans */
    public function testIsValidArgumentValidation($value)
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');

        $result = new Result($account, false, null, new \DateTimeImmutable());

        try {
            $result->isValid($value);
        } catch (\Exception $e) {
            if ($e instanceof \PHPUnit_Exception) {
                throw $e;
            }

            $this->assertInvalidArgumentException('assume should be a boolean, got: `%s`', $e);

            return;
        }

        $this->fail('Failed to catch exception');
    }

    public function testGetValidated()
    {
        $expected = new \DateTimeImmutable();
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');
        $result = new Result($account, true, false, $expected);

        $this->assertSame($expected, $result->getValidatedAt());
    }

    /**
     * @requires function error_clear_last
     * @group legacy
     */
    public function testConstructorWithoutValidatedAt()
    {
        error_clear_last();

        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');
        $result = new Result($account, true, false, null);
        $error = error_get_last();

        $this->assertInstanceOf('Cs278\\BankModulus\\Result', $result);
        $this->assertArraySubset([
            'message' => '$validatedAt will become a required argument of Cs278\\BankModulus\\Result::__construct() in version 2.0.0.',
            'type' => E_USER_DEPRECATED,
        ], $error);

        $this->assertInstanceOf('DateTimeImmutable', $result->getValidatedAt());
    }

    /** @dataProvider dataNonBooleans */
    public function testConstructorSpecKnownValidation($value)
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');

        try {
            new Result($account, $value, true, new \DateTimeImmutable());
        } catch (\Exception $e) {
            if ($e instanceof \PHPUnit_Exception) {
                throw $e;
            }

            $this->assertInvalidArgumentException('specKnown should be a boolean, got: `%s`', $e);

            return;
        }

        $this->fail('Failed to catch exception');
    }

    /** @dataProvider dataNonBooleans */
    public function testConstructorSpecResultValidationWithSpecKnown($value)
    {
        $account = $this->getMockForAbstractClass('Cs278\BankModulus\BankAccountInterface');

        try {
            new Result($account, true, $value, new \DateTimeImmutable());
        } catch (\Exception $e) {
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
            new Result($account, false, $value, new \DateTimeImmutable());
        } catch (\Exception $e) {
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
            ['1'],
            [1],
            [0],
            [null],
            [new \stdClass()],
            [[1]],
            [1.0],
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
