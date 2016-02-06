<?php

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\Util as E;
use Webmozart\Assert\Assert;

final class BankAccount implements BankAccountInterface
{
    private $sortCode;
    private $accountNumber;

    public function __construct($sortCode, $accountNumber)
    {
        try {
            if (!$sortCode instanceof SortCode) {
                Assert::string($sortCode, 'Sort code must be a string or instance of SortCode, got: `%s`', $sortCode);

                $sortCode = SortCode::create($sortCode);
            }

            Assert::string($accountNumber, 'Account number must be a string');
            Assert::regex($accountNumber, '{^(?:.*\d.*){6}$}', 'Account number must contain at least 6 digits');
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        $this->sortCode = $sortCode;
        $this->accountNumber = preg_replace('{[^0-9]}', '', $accountNumber);
    }

    public function getSortCode()
    {
        return $this->sortCode;
    }

    public function getAccountNumber()
    {
        return $this->accountNumber;
    }
}
