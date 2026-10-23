<?php

namespace Cs278\BankModulus;

use Cs278\BankModulus\Spec\SimpleSpecFactory;

/**
 * @covers \Cs278\BankModulus\BankModulus
 */
final class BankModulusTest extends \PHPUnit\Framework\TestCase
{
    use AssertArrayContainsTrait;

    public function testConstructorNoArgs(): void
    {
        $modulus = new BankModulus();

        $this->assertInstanceOf(\Cs278\BankModulus\BankModulus::class, $modulus);
    }

    public function testConstructorInvalidSpec(): void
    {
        $this->expectException(
            \Cs278\BankModulus\Exception\InvalidArgumentException::class
        );

        $this->expectExceptionMessage(
            \sprintf(
                'Expected an instance of %1$s\\SpecFactoryInterface, %1$s\\SpecInterface or NULL. Got: stdClass',
                'Cs278\\BankModulus\\Spec'
            )
        );

        $modulus = new BankModulus(new \stdClass());
    }

    /**
     * Tests the backwards compatability layer in the constructor.
     *
     * @group legacy
     */
    public function testConstructorConcreteSpec(): void
    {
        error_clear_last();

        $modulus = new BankModulus(new Mock\SpecPass());
        $error = error_get_last();

        $this->assertInstanceOf(\Cs278\BankModulus\BankModulus::class, $modulus);
        $this->assertArrayContains([
            'message' => 'Passing an instance of SpecInterface to Cs278\\BankModulus\\BankModulus::__construct() is deprecated and will be removed in version 2.0.0.',
            'type' => \E_USER_DEPRECATED,
        ], $error);

        error_clear_last();
    }

    public function testCheckValid(): void
    {
        $spec = new Mock\SpecPass();
        $normalizer = new Mock\Normalizer();

        $modulus = new BankModulus(new SimpleSpecFactory($spec), $normalizer);
        $this->assertTrue($modulus->check('089999', '66374958'));
    }

    public function testCheckInvalid(): void
    {
        $spec = new Mock\SpecFail();
        $normalizer = new Mock\Normalizer();

        $modulus = new BankModulus(new SimpleSpecFactory($spec), $normalizer);
        $this->assertFalse($modulus->check('089999', '66374959'));
    }

    public function testCheckUnknown(): void
    {
        $spec = new Mock\SpecUnknown();
        $normalizer = new Mock\Normalizer();

        $modulus = new BankModulus(new SimpleSpecFactory($spec), $normalizer);
        $this->assertTrue($modulus->check('000000', '12345678'));
    }

    public function testLookupValidatedAndValid(): void
    {
        $spec = new Mock\SpecPass();
        $normalizer = new Mock\NormalizerReverse();

        $modulus = new BankModulus(new SimpleSpecFactory($spec), $normalizer);

        $result = $modulus->lookup('12-34-56', '12345678');

        $this->assertInstanceOf(\Cs278\BankModulus\Result::class, $result);
        $this->assertInstanceOf(\Cs278\BankModulus\BankAccountInterface::class, $result);
        $this->assertInstanceOf(\Cs278\BankModulus\SortCode::class, $result->getSortCode());
        $this->assertSame('654321', $result->getSortCode()->getString());
        $this->assertSame('87654321', $result->getAccountNumber());
        $this->assertTrue($result->isValidated());
        $this->assertTrue($result->isValid());
    }

    public function testLookupValidatedAndInvalid(): void
    {
        $spec = new Mock\SpecFail();
        $normalizer = new Mock\NormalizerReverse();

        $modulus = new BankModulus(new SimpleSpecFactory($spec), $normalizer);

        $result = $modulus->lookup('12-34-56', '12345678');

        $this->assertInstanceOf(\Cs278\BankModulus\Result::class, $result);
        $this->assertInstanceOf(\Cs278\BankModulus\BankAccountInterface::class, $result);
        $this->assertInstanceOf(\Cs278\BankModulus\SortCode::class, $result->getSortCode());
        $this->assertSame('654321', $result->getSortCode()->getString());
        $this->assertSame('87654321', $result->getAccountNumber());
        $this->assertTrue($result->isValidated());
        $this->assertFalse($result->isValid());
    }

    public function testLookupNotValidated(): void
    {
        $spec = new Mock\SpecUnknown();
        $normalizer = new Mock\NormalizerReverse();

        $modulus = new BankModulus(new SimpleSpecFactory($spec), $normalizer);

        $result = $modulus->lookup('12-34-56', '12345678');

        $this->assertInstanceOf(\Cs278\BankModulus\Result::class, $result);
        $this->assertInstanceOf(\Cs278\BankModulus\BankAccountInterface::class, $result);
        $this->assertInstanceOf(\Cs278\BankModulus\SortCode::class, $result->getSortCode());
        $this->assertSame('654321', $result->getSortCode()->getString());
        $this->assertSame('87654321', $result->getAccountNumber());
        $this->assertFalse($result->isValidated());
        $this->assertTrue($result->isValid());
    }

    public function testLookupNoNormalizer(): void
    {
        $spec = new Mock\SpecPass();
        $normalizer = new Mock\NormalizerUnsupported();

        $modulus = new BankModulus(new SimpleSpecFactory($spec), $normalizer);

        $result = $modulus->lookup('12-34-56', '12345678');

        $this->assertInstanceOf(\Cs278\BankModulus\Result::class, $result);
        $this->assertInstanceOf(\Cs278\BankModulus\BankAccountInterface::class, $result);
        $this->assertInstanceOf(\Cs278\BankModulus\SortCode::class, $result->getSortCode());
        $this->assertSame('123456', $result->getSortCode()->getString());
        $this->assertSame('12345678', $result->getAccountNumber());
        $this->assertTrue($result->isValidated());
        $this->assertTrue($result->isValid());
    }

    /** @dataProvider dataNormalize */
    public function testNormalize($expectedSortCode, $expectedAccountNumber, $sortCode, $accountNumber): void
    {
        $modulus = new BankModulus();

        $this->assertNull($modulus->normalize($sortCode, $accountNumber));

        $this->assertSame($expectedSortCode, $sortCode);
        $this->assertSame($expectedAccountNumber, $accountNumber);
    }

    public static function dataNormalize(): iterable
    {
        return [
            // Formatting
            ['123456', '12345678', '12-34-56', '1-2345678'],
            ['123456', '02345678', '12 34 56', '     2345678'],

            // Co-op Bank
            ['081245', '12345678', '081245', '1234567890'],
            ['081245', '00123456', '081245', '0012345678'],
            // NatWest
            ['600000', '23456789', '600000', '01-23456789'],
            ['600000', '23456789', '600000', '0123456789'],
            // Santander
            ['091231', '23456789', '091234', '123456789'],
            ['091237', '55555555', '091234', '755555555'],
            ['724321', '23456789', '724321', '123456789'],
            // Seven Digit
            ['123456', '01234567', '123456', '1234567'],
            ['123456', '00000000', '123456', '0000000'],
            ['123456', '09999999', '123456', '9999999'],
            // Six Digit
            ['123456', '00123456', '123456', '123456'],
            ['123456', '00000000', '123456', '000000'],
            ['123456', '00999999', '123456', '999999'],
        ];
    }

    public function testNormalizeUnsupported(): void
    {
        $spec = new Mock\SpecPass();
        $normalizer = new Mock\NormalizerUnsupported();

        $modulus = new BankModulus(new SimpleSpecFactory($spec), $normalizer);

        $sortCode = '0 00000';
        $accountNumber = '0 0000000';

        $modulus->normalize($sortCode, $accountNumber);

        $this->assertSame('000000', $sortCode);
        $this->assertSame('00000000', $accountNumber);
    }

    /**
     * Test lookup(), check(), and normalize() method argument validation.
     */
    public function testMethodInputValidation(): void
    {
        $spec = $this->getMockForAbstractClass(\Cs278\BankModulus\Spec\SpecInterface::class);
        $normalizer = $this->getMockForAbstractClass(\Cs278\BankModulus\BankAccountNormalizer\NormalizerInterface::class);

        $modulus = new BankModulus(new SimpleSpecFactory($spec), $normalizer);

        foreach (['lookup', 'normalize', 'check'] as $method) {
            unset($sortCode, $accountNumber);

            foreach ([123456, null, false, true, [], new \stdClass()] as $sortCode) {
                $accountNumber = '12345678';

                try {
                    $modulus->$method($sortCode, $accountNumber);
                } catch (\Exception $e) {
                    if ($e instanceof \PHPUnit_Exception) {
                        throw $e;
                    }

                    $this->assertInstanceOf(\Cs278\BankModulus\Exception\Exception::class, $e);
                    $this->assertInstanceOf(\Cs278\BankModulus\Exception\InvalidArgumentException::class, $e);
                    $this->assertInstanceOf('InvalidArgumentException', $e);
                    $this->assertSame('Sort code must be a string', $e->getMessage());

                    continue;
                }

                $this->fail(\sprintf(
                    'Expected exception to be thrown on %s sort code',
                    \gettype($sortCode)
                ));
            }

            unset($sortCode, $accountNumber);

            foreach ([12345678, null, false, true, [], new \stdClass()] as $accountNumber) {
                $sortCode = '123456';

                try {
                    $modulus->$method($sortCode, $accountNumber);
                } catch (\Exception $e) {
                    if ($e instanceof \PHPUnit_Exception) {
                        throw $e;
                    }

                    $this->assertInstanceOf(\Cs278\BankModulus\Exception\Exception::class, $e);
                    $this->assertInstanceOf(\Cs278\BankModulus\Exception\InvalidArgumentException::class, $e);
                    $this->assertInstanceOf('InvalidArgumentException', $e);
                    $this->assertSame('Account number must be a string', $e->getMessage());

                    continue;
                }

                $this->fail(\sprintf(
                    'Expected exception to be thrown on %s sort code',
                    \gettype($sortCode)
                ));
            }
        }
    }
}
