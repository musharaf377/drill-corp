<?php

$php_files = array(
    array(
        'file-name' => 'activation',
        'file-path' => DRILLLCORP_TGMA
    ),
    array(
        'file-name' => 'singletone',
        'file-path' => DRILLLCORP_INC .  '/traits/'
    ),
    array(
        'file-name' => 'functions',
        'file-path' => DRILLLCORP_INC .  '/traits/'
    ),
    array(
        'file-name' => 'theme-breadcrumb',
        'file-path' => DRILLLCORP_INC
    ),
    array(
        'file-name' => 'theme-excerpt',
        'file-path' => DRILLLCORP_INC
    ),
    array(
        'file-name' => 'theme-hook-customize',
        'file-path' => DRILLLCORP_INC
    ),
    array(
        'file-name' => 'theme-comments-modifications',
        'file-path' => DRILLLCORP_INC
    ),
    array(
        'file-name' => 'customizer',
        'file-path' => DRILLLCORP_INC
    ),
    array(
        'file-name' => 'svg-icon',
        'file-path' => DRILLLCORP_INC . '/svg-icon/',
    ),

    array(
        'file-name' => 'theme-group-fields-cs',
        'file-path' => DRILLLCORP_THEME_SETTINGS
    ),
    array(
        'file-name' => 'theme-group-fields-value-cs',
        'file-path' => DRILLLCORP_THEME_SETTINGS
    ),
    array(
        'file-name' => 'theme-metabox-cs',
        'file-path' => DRILLLCORP_THEME_SETTINGS
    ),
    array(
        'file-name' => 'theme-userprofile-cs',
        'file-path' => DRILLLCORP_THEME_SETTINGS
    ),
    array(
        'file-name' => 'theme-shortcode-option-cs',
        'file-path' => DRILLLCORP_THEME_SETTINGS
    ),
    array(
        'file-name' => 'theme-customizer-cs',
        'file-path' => DRILLLCORP_THEME_SETTINGS
    ),
    array(
        'file-name' => 'theme-option-cs',
        'file-path' => DRILLLCORP_THEME_SETTINGS
    ),
);

if (class_exists('WooCommerce')) {
    $php_files[] = array(
        'file-name' => 'theme-woocommerce-customize',
        'file-path' => DRILLLCORP_INC
    );
}

return $php_files;
