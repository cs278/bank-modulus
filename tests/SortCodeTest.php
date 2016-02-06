<?php

namespace Cs278\BankModulus;

/**
 * @covers Cs278\BankModulus\SortCode
 */
final class SortCodeTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider dataConstructInvalid */
    public function testConstructInvalid($value)
    {
        try {
            new SortCode($value);
        } catch (\Exception $e) {
            $this->assertInstanceOf('InvalidArgumentException', $e);
            $this->assertInstanceOf('Cs278\BankModulus\Exception\InvalidArgumentException', $e);
            $this->assertInstanceOf('Cs278\BankModulus\Exception\Exception', $e);

            if (is_string($value)) {
                $this->assertInstanceOf('Cs278\BankModulus\Exception\SortCodeInvalidException', $e);
            } else {
                $this->assertNotInstanceOf('Cs278\BankModulus\Exception\SortCodeInvalidException', $e);
            }

            return;
        }

        $this->fail('Failed to catch exception');
    }

    public function testCreate()
    {
        $sortCode = SortCode::create('Sort code: 11-22-33. ');

        $this->assertSame('112233', $sortCode->format('%s%s%s'));
    }

    /** @dataProvider dataCreateInvalid */
    public function testCreateInvalid($value)
    {
        try {
            SortCode::create($value);
        } catch (\Exception $e) {
            $this->assertInstanceOf('InvalidArgumentException', $e);
            $this->assertInstanceOf('Cs278\BankModulus\Exception\InvalidArgumentException', $e);
            $this->assertInstanceOf('Cs278\BankModulus\Exception\Exception', $e);
            $this->assertNotInstanceOf('Cs278\BankModulus\Exception\SortCodeInvalidException', $e);

            return;
        }

        $this->fail('Failed to catch exception');
    }

    /** @dataProvider dataInBetween */
    public function testIsBetween($expected, $a, $b)
    {
        $sortCode = new SortCode('555555');

        $this->assertSame($expected, $sortCode->isBetween(new SortCode($a), new SortCode($b)));
    }

    public function testFormat()
    {
        $sortCode = new SortCode('112233');

        $this->assertSame('11_22_33', $sortCode->format('%s_%s_%s'));
    }

    /**
     * @expectedException Cs278\BankModulus\Exception\InvalidArgumentException
     */
    public function testFormatInvalud()
    {
        $sortCode = new SortCode('112233');

        $sortCode->format(null);
    }

    /** @dataProvider dataCompareTo */
    public function testCompareTo($expected, $a, $b)
    {
        $this->assertSame($expected, $a->compareTo($b));

        // Now validate using comparisons

        // Return 0 if values on either side are equal
        // Return 1 if value on the left is greater
        // Return -1 if the value on the right is greater

        $a = $a->format('%s%s%s');
        $b = $b->format('%s%s%s');

        if (0 === $expected) {
            $this->assertSame($b, $a);

            return;
        }

        if (1 === $expected) {
            $this->assertGreaterThan($b, $a);

            return;
        }

        if (-1 === $expected) {
            $this->assertLessThan($b, $a);

            return;
        }

        $this->fail('Expected value was nonsense');
    }

    public function dataInBetween()
    {
        return [
            [true, '555555', '555556'],
            [true, '555550', '555560'],
            [false, '555550', '555555'],
        ];
    }

    public function dataCompareTo()
    {
        return [
            [0,  new SortCode('123456'), new SortCode('123456')],
            [1,  new SortCode('123457'), new SortCode('123456')],
            [-1, new SortCode('123456'), new SortCode('123457')],
        ];
    }

    public function dataConstructInvalid()
    {
        return [
            ['12345'],
            ['1234567'],
            [' 12345'],
            ['123456 '],
            [123456],
            [null],
            [false],
            [new \stdClass()],
            [[]],
            ['12-34-56'],
        ];
    }

    public function dataCreateInvalid()
    {
        return [
            [null],
            [false],
            [true],
            [new \stdClass()],
            [[]],
            [''],
            ['XXXXXX'],
            ['12345'],
            [12345678],
        ];
    }
}
