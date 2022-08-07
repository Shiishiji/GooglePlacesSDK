<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('var')
    ->exclude('vendor')
    ->in(__DIR__)
;

return (new PhpCsFixer\Config())
    ->setRules([
        // Reference https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/rules/index.rst
        '@Symfony' => true,
        'no_alias_language_construct_call' => true,
        'no_mixed_echo_print' => ['use' => 'echo'],
        'array_syntax' => ['syntax' => 'short'],
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'no_whitespace_before_comma_in_array' => true,
        'normalize_index_brace' => true,
        'trim_array_spaces' => true,
        'whitespace_after_comma_in_array' => true,
        'braces' => [
            'position_after_functions_and_oop_constructs' => 'next',
            'position_after_control_structures' => 'same',
        ],
        'encoding' => true,
        'octal_notation' => true,
        'class_reference_name_casing' => true,
        'constant_case' => ['case' => 'lower'],
        'integer_literal_case' => true,
        'lowercase_keywords' => true,
        'lowercase_static_reference' => true,
        'magic_constant_casing' => true,
        'magic_method_casing' => true,
        'native_function_casing' => true,
        'native_function_type_declaration_casing' => true,
        'cast_spaces' => ['space' => 'single'],
        'lowercase_cast' => true,
        'no_short_bool_cast' => true,
        'no_unset_cast' => true,
        'short_scalar_cast' => true,
        'class_attributes_separation' => ['elements' => ['const' => 'none', 'method' => 'one', 'property' => 'none', 'trait_import' => 'none']],
        'class_definition' => [
            'single_line' => true,
            'inline_constructor_arguments' => false,
        ],
        'no_blank_lines_after_class_opening' => true,
        'ordered_class_elements' => [],
        'protected_to_private' => true,
        'self_static_accessor' => true,
        'single_class_element_per_statement' => ['elements' => ['const', 'property']],
        'single_trait_insert_per_statement' => true,
        'visibility_required' => ['elements' => ['property', 'method', 'const']],
        'control_structure_continuation_position' => ['position' => 'same_line'],
        'elseif' => true,
        'no_alternative_syntax' => true,
        'simplified_if_return' => true,
        'switch_case_semicolon_to_colon' => true,
        'no_useless_else' => true,
        'switch_continue_to_break' => true,
        'trailing_comma_in_multiline' => [
            'after_heredoc' => true,
            'elements' => ['arrays'],
        ],
        'yoda_style' => [
            'equal' => true,
            'identical' => true,
            'less_and_greater' => true,
            'always_move_variable' => true,
        ],
        'doctrine_annotation_braces' => ['syntax' => 'without_braces'],
        'doctrine_annotation_indentation' => [
            'indent_mixed_lines' => true,
        ],
        'function_declaration' => [
            'closure_function_spacing' => 'one',
            'trailing_comma_single_line' => false,
        ],
        'function_typehint_space' => true,
        'lambda_not_used_import' => true,
        'nullable_type_declaration_for_default_null_value' => ['use_nullable_type_declaration' => true],
        'no_spaces_after_function_name' => true,
        'return_type_declaration' => ['space_before' => 'none'],
        'single_line_after_imports' => true,
        'no_leading_import_slash' => true,
        'single_blank_line_before_namespace' => true,
        'no_blank_lines_after_phpdoc' => true,
    ])
    ->setFinder($finder)
    ;
