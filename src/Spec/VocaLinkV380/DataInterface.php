<?php

namespace Cs278\BankModulus\Spec\VocaLinkV380;

/**
 * @internal This class is not part of the public API of this package
 */
interface DataInterface
{
    /**
     * @param string $sortCode
     * @param int    $pass
     *
     * @return array{string,int[],int}|null
     */
    public function fetchRecord($sortCode, $pass);
}
