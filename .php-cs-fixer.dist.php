<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('src/app')
    ->exclude('src/data')
    ->exclude('node_modules')
    ->exclude('src/theme/vendor');

$config = new PhpCsFixer\Config();

return $config
    ->setRules([
        '@PSR2'                                 => true,
        'array_syntax'                          => ['syntax' => 'short'],
        'binary_operator_spaces'                => ['operators' => ['=>' => 'align_single_space']],
        'cast_spaces'                           => true,
        'combine_consecutive_unsets'            => true,
        'concat_space'                          => ['spacing' => 'one'],
        'linebreak_after_opening_tag'           => true,
        'no_blank_lines_after_class_opening'    => true,
        'no_blank_lines_after_phpdoc'           => true,
        'no_trailing_comma_in_singleline_array' => true,
        'no_whitespace_in_blank_line'           => true,
        'no_spaces_around_offset'               => true,
        'no_unused_imports'                     => true,
        'no_useless_else'                       => true,
        'no_useless_return'                     => true,
        'no_whitespace_before_comma_in_array'   => true,
        'normalize_index_brace'                 => true,
        'phpdoc_indent'                         => true,
        'phpdoc_to_comment'                     => true,
        'phpdoc_trim'                           => true,
        'single_quote'                          => false,
        'ternary_to_null_coalescing'            => true,
        'trim_array_spaces'                     => true,
        'no_break_comment'                      => false,
        'blank_line_before_statement'           => true,
    ])
    ->setFinder($finder);
