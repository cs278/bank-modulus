<?php

namespace Cs278\BankModulus\Tests;

use Cs278\BankModulus\ModulusAlgorithm;

final class ModulusAlgorithmTest extends \PHPUnit_Framework_TestCase
{
    public function testDblAl($input = '49927312345678', $weights = [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1])
    {
        $this->assertSame(0, ModulusAlgorithm::dblAl($input, $weights));
    }

    public function testCalculateMod($input = '00000058177632', $weights = [0, 0, 0, 0, 0, 0, 7, 5, 8, 3, 4, 6, 2, 1])
    {
        $this->assertSame(176, ModulusAlgorithm::calculateMod($input, $weights));
    }
}
