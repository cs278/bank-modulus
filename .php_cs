
<?php

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        'list_syntax' => ['syntax' => 'long'],
        'native_constant_invocation' => true,
        'native_function_casing' => true,
        'native_function_invocation' => [
            'include' => ['@compiler_optimized'],
        ],
        'no_alias_functions' => true,
        'no_extra_blank_lines' => true,
        'ordered_imports' => true,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__)
            // Ignore generated code.
            ->notContains('@generated')
    )
;
