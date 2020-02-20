<?php

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\Util as E;
use Cs278\BankModulus\Internal\Assert;

final class BankAccount implements BankAccountInterface
{
    /** @var SortCode */
    private $sortCode;

    /** @var string */
    private $accountNumber;

    /**
     * @param string|SortCode $sortCode
     * @param string          $accountNumber
     */
    public function __construct($sortCode, $accountNumber)
    {
        if (!$sortCode instanceof SortCode) {
            Assert::string($sortCode, 'Sort code must be a string or instance of SortCode');

            $sortCode = SortCode::create($sortCode);
        }

        Assert::string($accountNumber, 'Account number must be a string');
        Assert::regex($accountNumber, '{^(?:.*\d.*){6}$}', 'Account number must contain at least 6 digits');

        $this->sortCode = $sortCode;
        $this->accountNumber = StringUtil::removeNonDigits($accountNumber);
    }

    /** @return SortCode */
    public function getSortCode()
    {
        return $this->sortCode;
    }

    /** @return string */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }
}
