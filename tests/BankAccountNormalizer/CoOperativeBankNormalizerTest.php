<?php

namespace Cs278\BankModulus\Tests;

use Cs278\BankModulus\BankAccount;
use Cs278\BankModulus\BankAccountNormalizer\CoOperativeBankNormalizer;

final class CoOperativeBankNormalizerTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider dataSupports */
    public function testSupports($expected, $bankAccount)
    {
        $normalizer = new CoOperativeBankNormalizer();

        $this->assertSame($expected, $normalizer->supports($bankAccount));
    }

    /** @dataProvider dataNormalize */
    public function testNormalize($expectedSortCode, $expectedAccountNumber, $bankAccount)
    {
        $normalizer = new CoOperativeBankNormalizer();

        // Resuls are undefined if not a support bank account.
        $this->assertTrue($normalizer->supports($bankAccount));

        $result = $normalizer->normalize($bankAccount);

        $this->assertInstanceOf('Cs278\BankModulus\BankAccountInterface', $result);
        $this->assertSame($expectedSortCode, $result->getSortCode()->format('%s%s%s'));
        $this->assertSame($expectedAccountNumber, $result->getAccountNumber());
        $this->assertSame($bankAccount, $result->getOriginalBankAccount());
    }

    public function dataNormalize()
    {
        return [
            ['081245', '12345678', new BankAccount('081245', '1234567890')],
            ['081245', '00123456', new BankAccount('081245', '0012345678')],
        ];
    }

    public function dataSupports()
    {
        return [
            // Test limits of range (ex. 08-3*-**)
            [false, new BankAccount('079999', '1234567890')],
            [true,  new BankAccount('080000', '1234567890')],
            [true,  new BankAccount('080001', '1234567890')],
            [true,  new BankAccount('082998', '1234567890')],
            [true,  new BankAccount('082999', '1234567890')],
            [false, new BankAccount('083000', '1234567890')],
            [false, new BankAccount('083001', '1234567890')],
            [false, new BankAccount('083999', '1234567890')],
            [true,  new BankAccount('084000', '1234567890')],
            [true,  new BankAccount('084001', '1234567890')],
            [true,  new BankAccount('089998', '1234567890')],
            [true,  new BankAccount('089999', '1234567890')],
            [false, new BankAccount('090000', '1234567890')],
            // Check only allows 10 digit account numbers.
            [false, new BankAccount('080000', '1')],
            [false, new BankAccount('080000', '12')],
            [false, new BankAccount('080000', '123')],
            [false, new BankAccount('080000', '1234')],
            [false, new BankAccount('080000', '12345')],
            [false, new BankAccount('080000', '123456')],
            [false, new BankAccount('080000', '1234567')],
            [false, new BankAccount('080000', '12345678')],
            [false, new BankAccount('080000', '123456789')],
            [true,  new BankAccount('080000', '1234567890')],
            [false, new BankAccount('080000', '12345678901')],
            [false, new BankAccount('080000', '123456789012')],
            [false, new BankAccount('080000', '1234567890123')],
            [false, new BankAccount('080000', '12345678901234')],
            [false, new BankAccount('080000', '123456789012345')],
            [false, new BankAccount('080000', '1234567890123456')],
            [false, new BankAccount('080000', '12345678901234567')],
            [false, new BankAccount('080000', '123456789012345678')],
            [false, new BankAccount('080000', '1234567890123456789')],
            [false, new BankAccount('080000', '12345678901234567890')],
        ];
    }
}
