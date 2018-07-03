<?php

namespace Cs278\BankModulus\Spec;

/**
 * @covers \Cs278\BankModulus\Spec\DefaultSpecFactory
 */
final class DefaultSpecFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $factory = new DefaultSpecFactory();

        $spec = $factory->create();

        $this->assertInstanceOf('Cs278\\BankModulus\\Spec\\SpecInterface', $spec);
    }

    /**
     * @dataProvider dataCreateAtDate
     * @require function error_clear_last
     */
    public function testCreateAtDate($expectedSpec, \DateTime $now)
    {
        error_clear_last();

        $factory = @DefaultSpecFactory::withNow($now);
        $error = error_get_last();

        $this->assertArraySubset([
            'message' => 'Cs278\\BankModulus\\Spec\\DefaultSpecFactory::withNow() is for testing only!',
            'type' => E_USER_WARNING,
        ], $error);

        error_clear_last();

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
            ['VocaLinkV490', new \DateTime('2030-01-01')],
        ];
    }
}
