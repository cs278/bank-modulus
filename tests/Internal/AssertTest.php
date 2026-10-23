<?php

namespace Cs278\BankModulus\Internal;

use Cs278\BankModulus\StringUtilTest;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Assert::class)]
final class AssertTest extends \PHPUnit\Framework\TestCase
{
    #[DataProvider('dataDigitString')]
    public function testDigitString(bool $expectException, string $input): void
    {
        if ($expectException) {
            $this->expectException(\Cs278\BankModulus\Exception\InvalidArgumentException::class);
            $this->expectExceptionMessageMatches('{^Expected string composed of digits \[0-9\]\. Got: ".+?"$}');
        } else {
            $this->expectNotToPerformAssertions();
        }

        Assert::digitString($input);
    }

    public static function dataDigitString(): iterable
    {
        foreach (StringUtilTest::dataOnlyDigits() as $label => list($expected, $input)) {
            yield $label => [!$expected, $input];
        }
    }
}
