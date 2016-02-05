<?php

namespace Cs278\BankModulus\Tests;

use Cs278\BankModulus\BankAccount;
use Cs278\BankModulus\BankAccountNormalizer;
use Cs278\BankModulus\Spec\VocaLinkV380;

final class VocaLinkV380Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataCheckValid
     */
    public function testCheckValid($sortCode, $accountNumber, $description)
    {
        $checker = new VocaLinkV380();
        $normalizer = new BankAccountNormalizer();
        $bankAccount = $normalizer->apply(
            new BankAccount($sortCode, $accountNumber)
        );

        $this->assertTrue($checker->check($bankAccount), $description);
    }

    public function dataCheckValid()
    {
        return array_map(function ($fixture) {
            return [
                $fixture[2],
                $fixture[3],
                $fixture[0],
            ];
        }, array_filter($this->parseFixtures(), function (array $fixture) {
            return $fixture[1];
        }));
    }

    /**
     * @dataProvider dataCheckInvalid
     */
    public function testCheckInvalid($sortCode, $accountNumber, $description)
    {
        $checker = new VocaLinkV380();
        $normalizer = new BankAccountNormalizer();
        $bankAccount = $normalizer->apply(
            new BankAccount($sortCode, $accountNumber)
        );

        $this->assertFalse($checker->check($bankAccount), $description);
    }

    public function dataCheckInvalid()
    {
        return array_map(function ($fixture) {
            return [
                $fixture[2],
                $fixture[3],
                $fixture[0],
            ];
        }, array_filter($this->parseFixtures(), function (array $fixture) {
            return !$fixture[1];
        }));
    }

    private function parseFixtures()
    {
        $contents = file(__DIR__.'/'.basename(__FILE__, 'Test.php').'.fixtures.txt');
        $fixtures = [];

        foreach ($contents as $line) {
            if ('#' === $line[0]) {
                continue;
            }

            $cols = explode(' ', trim($line));

            $number = array_shift($cols);
            $isValid = array_pop($cols) === 'Y';
            $accountNumber = array_pop($cols);
            $sortCode = array_pop($cols);
            $description = implode(' ', $cols);

            $fixtures[] = [
                sprintf('[%d] %s', $number, $description),
                $isValid,
                $sortCode,
                $accountNumber,
            ];
        }

        $fixtures[] = [
            'Exception 14 (Ex 1)',
            true,
            '180002',
            '98093517',
        ];

        $fixtures[] = [
            'Exception 14 (Ex 2)',
            true,
            '180002',
            '00000190',
        ];

        return $fixtures;
    }
}