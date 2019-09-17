
<?php

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        'list_syntax' => ['syntax' => 'long'],
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__)
            // Ignore generated code.
            ->notContains('@generated')
    )
;
