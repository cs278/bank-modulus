
<?php

return (new Cs278\CsFixer\ConfigBuilder)
    ->finder(
        Symfony\CS\Finder\DefaultFinder::create()
            ->in(__DIR__)
    )
    ->build()
;
