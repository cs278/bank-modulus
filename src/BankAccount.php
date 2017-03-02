<?php

declare(strict_types=1);

namespace Cs278\BankModulus;

use Cs278\BankModulus\Exception\Util as E;
use Webmozart\Assert\Assert;

final class BankAccount implements BankAccountInterface
{
    private $sortCode;
    private $accountNumber;

    /**
     * @param string|SortCode $sortCode
     * @param string          $accountNumber
     */
    public function __construct($sortCode, string $accountNumber)
    {
        try {
            if (!$sortCode instanceof SortCode) {
                Assert::string($sortCode, 'Sort code must be a string or instance of SortCode');

                $sortCode = SortCode::create($sortCode);
            }

            Assert::regex($accountNumber, '{^(?:.*\d.*){6}$}', 'Account number must contain at least 6 digits');
        } catch (\InvalidArgumentException $e) {
            throw E::wrap($e);
        }

        $this->sortCode = $sortCode;
        $this->accountNumber = preg_replace('{[^0-9]}', '', $accountNumber);
    }

    /** @return SortCode */
    public function getSortCode(): SortCode
    {
        return $this->sortCode;
    }

    /** @return string */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }
}
