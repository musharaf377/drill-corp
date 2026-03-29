<?php

/**
 * Theme Shortcodes Generator
 * @package drilllcorp
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit(); //exit if access it directly
}

// Control core classes for avoid errors
if (class_exists('CSF')) {
	$prefix = 'drilllcorp';
	CSF::createShortcoder($prefix . '_shortcodes', array(
		'button_title'   => esc_html__('Add Shortcode', 'drilllcorp'),
		'select_title'   => esc_html__('Select a shortcode', 'drilllcorp'),
		'insert_title'   => esc_html__('Insert Shortcode', 'drilllcorp')
	));

	/*------------------------------------
		Social Icon Options
	-------------------------------------*/
	CSF::createSection($prefix . '_shortcodes', array(
		'title'     => esc_html__('Social Icons', 'drilllcorp'),
		'view'      => 'group',
		'shortcode' => 'drilllcorp_social_icon_wrap',
		'fields' => [
			array(
				'id'      => 'custom_class',
				'type'    => 'text',
				'title'   => esc_html__('Custom Class', 'drilllcorp'),
			)
		],
		'group_shortcode' => 'drilllcorp_social_icon',
		'group_fields'    => array(
			array(
				'id'    => 'social_icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon', 'drilllcorp'),
			),
			array(
				'id'      => 'social_link',
				'type'    => 'text',
				'title'   => esc_html__('URL', 'drilllcorp'),
			)
		)
	));

	/*------------------------------------
		Top Menu Options
	-------------------------------------*/
	CSF::createSection($prefix . '_shortcodes', array(
		'title'     => esc_html__('Top Menu', 'drilllcorp'),
		'view'      => 'group',
		'shortcode' => 'drilllcorp_top_menu_wrap',
		'group_shortcode' => 'drilllcorp_top_menu',
		'group_fields'    => array(
			array(
				'id'    => 'top_menu_text',
				'type'  => 'text',
				'title' => esc_html__('Text', 'drilllcorp'),
			),
			array(
				'id'      => 'top_menu_link',
				'type'    => 'text',
				'title'   => esc_html__('URL', 'drilllcorp'),
			)
		)
	));

	/*------------------------------------
      Info Menu Options
    -------------------------------------*/
	CSF::createSection($prefix . '_shortcodes', array(
		'title'     => esc_html__('Info Menu', 'drilllcorp'),
		'view'      => 'group',
		'shortcode' => 'drilllcorp_top_menu_wrap_02',
		'group_shortcode' => 'drilllcorp_top_menu_02',
		'group_fields'    => array(
			array(
				'id'    => 'top_menu_title_text',
				'type'  => 'text',
				'title' => esc_html__('Text', 'drilllcorp'),
			),
			array(
				'id'    => 'top_menu_text',
				'type'  => 'text',
				'title' => esc_html__('Text', 'drilllcorp'),
			),
			array(
				'id'      => 'top_menu_link',
				'type'    => 'text',
				'title'   => esc_html__('URL', 'drilllcorp'),
			)
		)
	));

	/*------------------------------------
		Inline info link options
	-------------------------------------*/
	CSF::createSection($prefix . '_shortcodes', array(
		'title'     => esc_html__('Inline Info Link', 'drilllcorp'),
		'view'      => 'group',
		'shortcode' => 'drilllcorp_info_item_wrap',
		'group_shortcode' => 'drilllcorp_info_link',
		'group_fields'    => array(
			array(
				'id'    => 'icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon', 'drilllcorp'),
			),
			array(
				'id'      => 'text',
				'type'    => 'text',
				'title'   => esc_html__('Text', 'drilllcorp'),
			),
			array(
				'id'      => 'url',
				'type'    => 'text',
				'title'   => esc_html__('URL', 'drilllcorp'),
			)
		)
	));
}
