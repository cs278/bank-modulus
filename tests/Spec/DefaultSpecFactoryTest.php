<?php

namespace Cs278\BankModulus\Spec;

/**
 * @covers \Cs278\BankModulus\Spec\DefaultSpecFactory
 */
final class DefaultSpecFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $factory = new DefaultSpecFactory();

        $spec = $factory->create();

        $this->assertInstanceOf('Cs278\\BankModulus\\Spec\\SpecInterface', $spec);
    }

    /**
     * @dataProvider dataCreateAtDate
     */
    public function testCreateAtDate($expectedSpec, \DateTime $now)
    {
        $factory = new DefaultSpecFactory();
        $factory = $factory->withDate($now);

        // Run tests 5 times to ensure consistent results.
        for ($i = 0; $i < 5; ++$i) {
            $spec = $factory->create();

            $this->assertInstanceOf('Cs278\\BankModulus\\Spec\\SpecInterface', $spec);
            $this->assertInstanceOf('Cs278\\BankModulus\\Spec\\'.$expectedSpec, $spec);
        }
    }

    public function dataCreateAtDate()
    {
        return [
            ['VocaLinkV390', new \DateTime('2010-04-12')],
            ['VocaLinkV390', new \DateTime('2014-12-25')],
            ['VocaLinkV390', new \DateTime('2017-01-08')],
            ['VocaLinkV400', new \DateTime('2017-01-09')],
            ['VocaLinkV400', new \DateTime('2017-01-10')],
            ['VocaLinkV400', new \DateTime('2017-03-05')],
            ['VocaLinkV410', new \DateTime('2017-03-06')],
            ['VocaLinkV410', new \DateTime('2017-03-07')],
            ['VocaLinkV410', new \DateTime('2017-06-11')],
            ['VocaLinkV420', new \DateTime('2017-06-12')],
            ['VocaLinkV420', new \DateTime('2017-07-02')],
            ['VocaLinkV430', new \DateTime('2017-07-03')],
            ['VocaLinkV430', new \DateTime('2017-08-20')],
            ['VocaLinkV440', new \DateTime('2017-08-21')],
            ['VocaLinkV440', new \DateTime('2017-10-08')],
            ['VocaLinkV460', new \DateTime('2017-10-09')],
            ['VocaLinkV460', new \DateTime('2018-03-25')],
            ['VocaLinkV470', new \DateTime('2018-03-26')],
            ['VocaLinkV470', new \DateTime('2018-04-15')],
            ['VocaLinkV480', new \DateTime('2018-04-16')],
            ['VocaLinkV480', new \DateTime('2018-07-01')],
            ['VocaLinkV490', new \DateTime('2018-07-02')],
            ['VocaLinkV490', new \DateTime('2018-08-05')],
            ['VocaLinkV500', new \DateTime('2018-08-06')],
            ['VocaLinkV500', new \DateTime('2018-09-16')],
            ['VocaLinkV510', new \DateTime('2018-09-17')],
            ['VocaLinkV510', new \DateTime('2018-10-21')],
            ['VocaLinkV520', new \DateTime('2018-10-22')],
            ['VocaLinkV520', new \DateTime('2030-01-01')],
        ];
    }

    public function testWithDateDateTime()
    {
        $factory = new DefaultSpecFactory();
        $newFactory = $factory->withDate(new \DateTime('2018-01-01'));

        $this->assertNotSame($factory, $newFactory);
        $this->assertInstanceOf('Cs278\\BankModulus\\Spec\\VocaLinkV460', $newFactory->create());
    }

    public function testWithDateDateTimeImmutable()
    {
        $factory = new DefaultSpecFactory();
        $newFactory = $factory->withDate(new \DateTimeImmutable('2018-01-01'));

        $this->assertNotSame($factory, $newFactory);
        $this->assertInstanceOf('Cs278\\BankModulus\\Spec\\VocaLinkV460', $newFactory->create());
    }

    /**
     * @expectedException \Cs278\BankModulus\Exception\InvalidArgumentException
     * @expectedExceptionMessage Expected an instance of DateTimeInterface. Got: stdClass
     */
    public function testWithDateObjectInvalid()
    {
        $factory = new DefaultSpecFactory();
        $factory->withDate(new \stdClass());
    }

    public function testWithDateString()
    {
        $factory = new DefaultSpecFactory();
        $newFactory = $factory->withDate('2018-01-01');

        $this->assertNotSame($factory, $newFactory);
        $this->assertInstanceOf('Cs278\\BankModulus\\Spec\\VocaLinkV460', $newFactory->create());
    }

    /**
     * @dataProvider dataWithDateStringInvalid
     * @expectedException \Cs278\BankModulus\Exception\InvalidArgumentException
     * @expectedExceptionMessage Expecting valid ISO8601 date (YYYY-MM-DD). Got:
     */
    public function testWithDateStringInvalid($input)
    {
        $factory = new DefaultSpecFactory();
        $factory->withDate($input);
    }

    public function dataWithDateStringInvalid()
    {
        return [
            [''],
            [' 2018-01-01'],
            ['2018-01-01 '],
            [' 2018-01-01 '],
            ['18-01-01'],
            ['ab18-01-01'],
            ['2018-02-30'],
        ];
    }
}
