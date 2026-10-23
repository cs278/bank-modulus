<?php

namespace Cs278\BankModulus;

use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @covers \Cs278\BankModulus\StringUtil
 */
final class StringUtilTest extends \PHPUnit\Framework\TestCase
{
    #[DataProvider('dataOnlyDigits')]
    public function testOnlyDigits(bool $expected, string $input): void
    {
        self::assertSame($expected, StringUtil::onlyDigits($input));
    }

    public static function dataOnlyDigits(): iterable
    {
        yield 'empty string' => [true, ''];

        foreach (range(0, 9) as $i) {
            yield \sprintf('%u', $i) => [true, (string) $i];
            yield \sprintf('%u decimal', $i) => [false, \sprintf('%u.0', $i)];
            yield \sprintf('%u negative', $i) => [false, \sprintf('-%u', $i)];
            yield \sprintf('%u leading space', $i) => [false, \sprintf(' %u', $i)];
            yield \sprintf('%u trailing space', $i) => [false, \sprintf('%u ', $i)];
            yield \sprintf('%u surrounding space', $i) => [false, \sprintf(' %u ', $i)];
        }

        yield '1234567890' => [true, '1234567890'];
        yield '-1234567890' => [false, '-1234567890'];
    }

    #[DataProvider('dataIsDigit')]
    public function testIsDigit(bool $expected, string $input): void
    {
        self::assertSame($expected, StringUtil::isDigit($input));
    }

    public static function dataIsDigit(): iterable
    {
        yield 'empty string' => [false, ''];

        foreach (range(0, 9) as $i) {
            yield \sprintf('%u', $i) => [true, (string) $i];
            yield \sprintf('%u two digits', $i) => [false, \sprintf('%u%1$u', $i)];
            yield \sprintf('%u decimal', $i) => [false, \sprintf('%u.0', $i)];
            yield \sprintf('%u negative', $i) => [false, \sprintf('-%u', $i)];
            yield \sprintf('%u leading space', $i) => [false, \sprintf(' %u', $i)];
            yield \sprintf('%u trailing space', $i) => [false, \sprintf('%u ', $i)];
            yield \sprintf('%u surrounding space', $i) => [false, \sprintf(' %u ', $i)];
        }

        yield '1234567890' => [false, '1234567890'];
        yield '-1234567890' => [false, '-1234567890'];
    }

    /**
     * @dataProvider dataRemoveNonDigits
     */
    public function testRemoveNonDigits($expected, $input): void
    {
        self::assertSame($expected, StringUtil::removeNonDigits($input));
    }

    public static function dataRemoveNonDigits(): iterable
    {
        return [
            ['', ''],
            ['', ' '],
            ['0', ' 0 '],
            ['0123456789', '0123456789'],
            ['0123456789', ' 0 1 2 3 4 5 6 7 8 9 '],
            ['', 'Hellø World‽'],
            ['1245', '12⅔²45'],
        ];
    }

    /**
     * @dataProvider dataRegexReplaceCallback
     */
    public function testRegexReplaceCallback($expected, $input, $regex, \Closure $callback): void
    {
        self::assertSame($expected, StringUtil::regexReplaceCallback($input, $regex, $callback));
    }

    public static function dataRegexReplaceCallback(): iterable
    {
        return [
            ['fOO', 'foo', '{o}', function ($input) {
                return strtoupper($input[0]);
            }],
        ];
    }
}
