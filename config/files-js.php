<?php

$js_files = array(
    array(
        'handle' => 'bootstrap',
        'src' => DRILLLCORP_JS . '/bootstrap.min.js',
        'deps' => array('jquery'),
        'in_footer' => true // This ensures the script is loaded in the footer
    ),
    array(
        'handle' => 'preloader',
        'src' => DRILLLCORP_JS . '/preloader.js',
        'deps' => array('jquery'),
        'in_footer' => true
    ),
    array(
        'handle' => 'drilllcorp-jquery-ui',
        'src' => '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js',
        'deps' => array('jquery'),
        'in_footer' => true
    ),
    array(
        'handle' => 'drilllcorp-main-script',
        'src' => DRILLLCORP_JS . '/main' . $js_ext,
        'deps' => array('jquery'),
        'in_footer' => true
    ),
);

if (class_exists('WooCommerce')) {
    $js_files[] = array(
        'handle' => 'drilllcorp-woocommerce',
        'src' => DRILLLCORP_JS . '/woocommerce' . $js_ext,
        'deps' => array('jquery'),
        'in_footer' => true
    );
    $js_files[] = array(
        'handle' => 'drilllcorp-product-filter',
        'src' => DRILLLCORP_JS . '/product-filter' . $js_ext,
        'deps' => array('jquery'),
        'in_footer' => true
    );
}

return $js_files;
