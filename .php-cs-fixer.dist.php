<?php

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        '@PHP54Migration' => true,
        '@PHP56Migration:risky' => true,
        '@PHP70Migration' => true,
        '@PHP70Migration:risky' => true,
        '@PHP71Migration' => true,
        '@PHP71Migration:risky' => true,
        '@PHP73Migration' => true,
        '@PHP74Migration' => true,
        '@PHP74Migration:risky' => true,
        '@PHP80Migration' => true,
        '@PHP80Migration:risky' => true,
        'list_syntax' => ['syntax' => 'short'],
        'native_constant_invocation' => true,
        'native_function_casing' => true,
        'native_function_invocation' => [
            'include' => ['@compiler_optimized'],
        ],
        'no_alias_functions' => true,
        'no_extra_blank_lines' => true,
        'ordered_imports' => true,
        'declare_strict_types' => false,
        'use_arrow_functions' => false,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__)
            // Ignore generated code.
            ->notContains('@generated')
    )
;
