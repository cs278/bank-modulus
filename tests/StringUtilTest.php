<?php

namespace Cs278\BankModulus;

/**
 * @covers \Cs278\BankModulus\StringUtil
 */
final class StringUtilTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataRemoveNonDigits
     */
    public function testRemoveNonDigits($expected, $input)
    {
        self::assertSame($expected, StringUtil::removeNonDigits($input));
    }

    public function dataRemoveNonDigits()
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
    public function testRegexReplaceCallback($expected, $input, $regex, \Closure $callback)
    {
        self::assertSame($expected, StringUtil::regexReplaceCallback($input, $regex, $callback));
    }

    public function dataRegexReplaceCallback()
    {
        return [
            ['fOO', 'foo', '{o}', function ($input) {
                return strtoupper($input[0]);
            }],
        ];
    }
}
