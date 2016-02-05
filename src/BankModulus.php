<?php

namespace Cs278\BankModulus;

final class BankModulus
{
    public function check($sortCode, $accountNumber)
    {
        $spec = new Spec\VocaLinkV380();
        $account = new BankAccount($sortCode, $accountNumber);

        $account = (new BankAccountNormalizer())->apply($account);

        return $spec->check($account);
    }
}
