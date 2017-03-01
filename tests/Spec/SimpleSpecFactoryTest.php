<?php

namespace Cs278\BankModulus\Spec;

/**
 * @covers Cs278\BankModulus\Spec\SimpleSpecFactory
 */
final class SimpleSpecFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $spec = new VocaLinkV390();
        $factory = new SimpleSpecFactory($spec);

        // Both calls should return the same object.
        $this->assertSame($spec, $factory->create());
        $this->assertSame($spec, $factory->create());
    }
}
