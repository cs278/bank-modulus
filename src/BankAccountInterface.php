<?php

declare(strict_types=1);

namespace Cs278\BankModulus;

interface BankAccountInterface
{
    /** @return SortCode */
    public function getSortCode(): SortCode;

    /** @return string */
    public function getAccountNumber(): string;
}
