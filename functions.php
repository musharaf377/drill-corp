<?php

/**
 * Theme functions & definitations
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package drilllcorp
 */

/**
 * Define Theme Folder Path & URL Constant
 * @package drilllcorp
 * @since 2.0.1
 */

define('DRILLLCORP_THEME_ROOT', get_template_directory());
define('DRILLLCORP_THEME_ROOT_URL', get_template_directory_uri());
define('DRILLLCORP_INC', DRILLLCORP_THEME_ROOT . '/inc');
define('DRILLLCORP_THEME_SETTINGS', DRILLLCORP_INC . '/theme-settings');
define('DRILLLCORP_THEME_SETTINGS_IMAGES', DRILLLCORP_THEME_ROOT_URL . '/inc/theme-settings/images');
define('DRILLLCORP_TGMA', DRILLLCORP_INC . '/plugins/tgma');
define('DRILLLCORP_DYNAMIC_STYLESHEETS', DRILLLCORP_INC . '/theme-stylesheets');
define('DRILLLCORP_CSS', DRILLLCORP_THEME_ROOT_URL . '/assets/css');
define('DRILLLCORP_JS', DRILLLCORP_THEME_ROOT_URL . '/assets/js');
define('DRILLLCORP_ASSETS', DRILLLCORP_THEME_ROOT_URL . '/assets');
define('DRILLLCORP_DEV', true);


/**
 * Theme Initial File
 * @package drilllcorp
 * @since 1.0.0
 */
if (file_exists(DRILLLCORP_INC . '/theme-init.php')) {
	require_once DRILLLCORP_INC . '/theme-init.php';
}


/**
 * Codester Framework Functions
 * @package drilllcorp
 * @since 1.0.0
 */
if (file_exists(DRILLLCORP_INC . '/theme-cs-function.php')) {
	require_once DRILLLCORP_INC . '/theme-cs-function.php';
}


/**
 * Theme Helpers Functions
 * @package drilllcorp
 * @since 1.0.0
 */
if (file_exists(DRILLLCORP_INC . '/theme-helper-functions.php')) {
	require_once DRILLLCORP_INC . '/theme-helper-functions.php';

	if (!function_exists('drilllcorp')) {
		function drilllcorp()
		{
			return class_exists('DrilllCorp_Helper_Functions') ? DrilllCorp_Helper_Functions::getInstance() : false;
		}
	}
}
/**
 * Nav menu fallback function
 * @since 1.0.0
 */
if (is_user_logged_in()) {
	function drilllcorp_theme_fallback_menu()
	{
		get_template_part('template-parts/default', 'menu');
	}
}