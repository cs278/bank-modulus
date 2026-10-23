<?php

namespace Cs278\BankModulus;

/**
 * @covers \Cs278\BankModulus\Result
 */
final class ResultTest extends \PHPUnit\Framework\TestCase
{
    use AssertArrayContainsTrait;

    public function testGetSortCode(): void
    {
        $account = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountInterface::class);
        $sortCode = new SortCode('654321');

        $account
            ->expects($this->any())
            ->method('getSortCode')
            ->will($this->returnValue($sortCode));

        $result = new Result($account, true, true, self::now());

        $this->assertSame($sortCode, $result->getSortCode());
    }

    public function testGetAccountNumber(): void
    {
        $account = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountInterface::class);
        $accountNumber = '11223344';

        $account
            ->expects($this->any())
            ->method('getAccountNumber')
            ->will($this->returnValue($accountNumber));

        $result = new Result($account, true, true, self::now());

        $this->assertSame($accountNumber, $result->getAccountNumber());
    }

    public function testIsValidated(): void
    {
        $account = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountInterface::class);

        $result = new Result($account, true, true, self::now());
        $this->assertTrue($result->isValidated());

        $result = new Result($account, false, null, self::now());
        $this->assertFalse($result->isValidated());
    }

    public function testIsValid(): void
    {
        $account = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountInterface::class);

        $result = new Result($account, true, true, self::now());
        $this->assertTrue($result->isValid());

        $result = new Result($account, true, false, self::now());
        $this->assertFalse($result->isValid());

        // Test unvalidated.
        $result = new Result($account, false, null, self::now());
        $this->assertTrue($result->isValid());
        $this->assertTrue($result->isValid(true));
        $this->assertFalse($result->isValid(false));
    }

    /** @dataProvider dataNonBooleans */
    public function testIsValidArgumentValidation($value): void
    {
        $account = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountInterface::class);

        $result = new Result($account, false, null, self::now());

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

    public function testGetValidated(): void
    {
        $expected = self::now();
        $account = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountInterface::class);
        $result = new Result($account, true, false, $expected);

        $this->assertSame($expected, $result->getValidatedAt());
    }

    /**
     * @group legacy
     */
    public function testConstructorWithoutValidatedAt(): void
    {
        error_clear_last();

        $account = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountInterface::class);
        $result = new Result($account, true, false, null);
        $error = error_get_last();

        $this->assertInstanceOf(\Cs278\BankModulus\Result::class, $result);
        $this->assertArrayContains([
            'message' => '$validatedAt will become a required argument of Cs278\\BankModulus\\Result::__construct() in version 2.0.0.',
            'type' => \E_USER_DEPRECATED,
        ], $error);

        $this->assertInstanceOf(\get_class(self::now()), $result->getValidatedAt());
    }

    public function testConstructorWithInvalidValidatedAt(): void
    {
        $account = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountInterface::class);

        try {
            new Result($account, false, null, new \stdClass());
        } catch (\Exception $e) {
            if ($e instanceof \PHPUnit_Exception) {
                throw $e;
            }

            $this->assertInvalidArgumentException('validatedAt should be an instance of DateTimeImmutable, DateTime or null, got: `%s`', $e);

            return;
        }

        $this->fail('Failed to catch exception');
    }

    public function testConstructorWithDeprecatedValidatedAt(): void
    {
        error_clear_last();

        $account = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountInterface::class);
        $result = new Result($account, false, null, new \DateTime());

        $error = error_get_last();

        $this->assertInstanceOf(\Cs278\BankModulus\Result::class, $result);
        $this->assertArrayContains([
            'message' => '$validatedAt argument of Cs278\BankModulus\Result::__construct() will require a DateTimeImmutable instance in version 2.0.0.',
            'type' => \E_USER_DEPRECATED,
        ], $error);
    }

    /** @dataProvider dataNonBooleans */
    public function testConstructorSpecKnownValidation($value): void
    {
        $account = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountInterface::class);

        try {
            new Result($account, $value, true, self::now());
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
    public function testConstructorSpecResultValidationWithSpecKnown($value): void
    {
        $account = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountInterface::class);

        try {
            new Result($account, true, $value, self::now());
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
    public function testConstructorSpecResultValidationWithSpecUnnown($value): void
    {
        $account = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountInterface::class);

        try {
            new Result($account, false, $value, self::now());
        } catch (\Exception $e) {
            if ($e instanceof \PHPUnit_Exception) {
                throw $e;
            }

            $this->assertInvalidArgumentException('specResult should be null, got: `%s`', $e);

            return;
        }

        $this->fail('Failed to catch exception');
    }

    public static function dataNonBooleans(): iterable
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

    public static function dataNonNulls(): iterable
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

    private function assertInvalidArgumentException($expectedMessage, $e): void
    {
        $this->assertInstanceOf(\Cs278\BankModulus\Exception\Exception::class, $e);
        $this->assertInstanceOf(\Cs278\BankModulus\Exception\InvalidArgumentException::class, $e);
        $this->assertInstanceOf('InvalidArgumentException', $e);
        $this->assertStringMatchesFormat($expectedMessage, $e->getMessage());
    }

    private static function now(): \DateTimeInterface
    {
        return new \DateTimeImmutable();
    }
}
