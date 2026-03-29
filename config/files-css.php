<?php

$css_files = array(
    array(
        'handle' => 'bootstrap',
        'src' => DRILLLCORP_CSS . '/bootstrap.min.css',
        'deps' => array(),
    ),
    array(
        'handle' => 'jquery-ui',
        'src' => '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css',
        'deps' => array('bootstrap'),
    ),
    array(
        'handle' => 'drilllcorp-main-style',
        'src' => DRILLLCORP_CSS . '/main-style' . $css_ext,
        'deps' => array(),
    ),
    array(
        'handle' => 'drilllcorp-responsive',
        'src' => DRILLLCORP_CSS . '/responsive' . $css_ext,
        'deps' => array(),
    ),
);

return $css_files;
