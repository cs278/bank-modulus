<?php

namespace Cs278\BankModulus\Spec\VocaLinkV380;

/**
 * @internal This class is not part of the public API of this package
 */
interface DataInterface
{
    public function fetchRecord($sortCode, $pass);
}
