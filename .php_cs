
<?php

return (new Cs278\CsFixer\ConfigBuilder)
    ->useFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__)
            ->notPath('src/Spec/VocaLinkV380Data.php')
    )
    ->build()
;
