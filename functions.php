<?php

/**
 * Theme functions & definitations
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package drillcorp
 */

/**
 * Define Theme Folder Path & URL Constant
 * @package drillcorp
 * @since 2.0.1
 */

define('DRILLCORP_THEME_ROOT', get_template_directory());
define('DRILLCORP_THEME_ROOT_URL', get_template_directory_uri());
define('DRILLCORP_INC', DRILLCORP_THEME_ROOT . '/inc');
define('DRILLCORP_THEME_SETTINGS', DRILLCORP_INC . '/theme-settings');
define('DRILLCORP_THEME_SETTINGS_IMAGES', DRILLCORP_THEME_ROOT_URL . '/inc/theme-settings/images');
define('DRILLCORP_TGMA', DRILLCORP_INC . '/plugins/tgma');
define('DRILLCORP_DYNAMIC_STYLESHEETS', DRILLCORP_INC . '/theme-stylesheets');
define('DRILLCORP_CSS', DRILLCORP_THEME_ROOT_URL . '/assets/css');
define('DRILLCORP_JS', DRILLCORP_THEME_ROOT_URL . '/assets/js');
define('DRILLCORP_ASSETS', DRILLCORP_THEME_ROOT_URL . '/assets');
define('DRILLCORP_DEV', true);


/**
 * Theme Initial File
 * @package drillcorp
 * @since 1.0.0
 */
if (file_exists(DRILLCORP_INC . '/theme-init.php')) {
	require_once DRILLCORP_INC . '/theme-init.php';
}


/**
 * Codester Framework Functions
 * @package drillcorp
 * @since 1.0.0
 */
if (file_exists(DRILLCORP_INC . '/theme-cs-function.php')) {
	require_once DRILLCORP_INC . '/theme-cs-function.php';
}


/**
 * Theme Helpers Functions
 * @package drillcorp
 * @since 1.0.0
 */
if (file_exists(DRILLCORP_INC . '/theme-helper-functions.php')) {
	require_once DRILLCORP_INC . '/theme-helper-functions.php';

	if (!function_exists('drillcorp')) {
		function drillcorp()
		{
			return class_exists('Drillcorp_Helper_Functions') ? Drillcorp_Helper_Functions::getInstance() : false;
		}
	}
}
/**
 * Nav menu fallback function
 * @since 1.0.0
 */
if (is_user_logged_in()) {
	function drillcorp_theme_fallback_menu()
	{
		get_template_part('template-parts/default', 'menu');
	}
}