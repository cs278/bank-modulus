<?php

namespace Cs278\BankModulus;

/**
 * Snapshot of BankModulus tests that pass in SpecInterface directly.
 *
 * @covers \Cs278\BankModulus\BankModulus
 * @group legacy
 */
final class BankModulusLegacyTest extends \PHPUnit\Framework\TestCase
{
    public function testCheckValid(): void
    {
        $spec = new Mock\SpecPass();
        $normalizer = new Mock\Normalizer();

        $modulus = new BankModulus($spec, $normalizer);
        $this->assertTrue($modulus->check('089999', '66374958'));
    }

    public function testCheckInvalid(): void
    {
        $spec = new Mock\SpecFail();
        $normalizer = new Mock\Normalizer();

        $modulus = new BankModulus($spec, $normalizer);
        $this->assertFalse($modulus->check('089999', '66374959'));
    }

    public function testCheckUnknown(): void
    {
        $spec = new Mock\SpecUnknown();
        $normalizer = new Mock\Normalizer();

        $modulus = new BankModulus($spec, $normalizer);
        $this->assertTrue($modulus->check('000000', '12345678'));
    }

    public function testLookupValidatedAndValid(): void
    {
        $spec = new Mock\SpecPass();
        $normalizer = new Mock\NormalizerReverse();

        $modulus = new BankModulus($spec, $normalizer);

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

        $modulus = new BankModulus($spec, $normalizer);

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

        $modulus = new BankModulus($spec, $normalizer);

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

        $modulus = new BankModulus($spec, $normalizer);

        $result = $modulus->lookup('12-34-56', '12345678');

        $this->assertInstanceOf(\Cs278\BankModulus\Result::class, $result);
        $this->assertInstanceOf(\Cs278\BankModulus\BankAccountInterface::class, $result);
        $this->assertInstanceOf(\Cs278\BankModulus\SortCode::class, $result->getSortCode());
        $this->assertSame('123456', $result->getSortCode()->getString());
        $this->assertSame('12345678', $result->getAccountNumber());
        $this->assertTrue($result->isValidated());
        $this->assertTrue($result->isValid());
    }

    public function testNormalizeUnsupported(): void
    {
        $spec = new Mock\SpecPass();
        $normalizer = new Mock\NormalizerUnsupported();

        $modulus = new BankModulus($spec, $normalizer);

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

        $modulus = new BankModulus($spec, $normalizer);

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
