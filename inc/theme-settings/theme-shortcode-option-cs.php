<?php

/**
 * Theme Shortcodes Generator
 * @package drillcorp
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit(); //exit if access it directly
}

// Control core classes for avoid errors
if (class_exists('CSF')) {
	$prefix = 'drillcorp';
	CSF::createShortcoder($prefix . '_shortcodes', array(
		'button_title'   => esc_html__('Add Shortcode', 'drillcorp'),
		'select_title'   => esc_html__('Select a shortcode', 'drillcorp'),
		'insert_title'   => esc_html__('Insert Shortcode', 'drillcorp')
	));

	/*------------------------------------
		Social Icon Options
	-------------------------------------*/
	CSF::createSection($prefix . '_shortcodes', array(
		'title'     => esc_html__('Social Icons', 'drillcorp'),
		'view'      => 'group',
		'shortcode' => 'drillcorp_social_icon_wrap',
		'fields' => [
			array(
				'id'      => 'custom_class',
				'type'    => 'text',
				'title'   => esc_html__('Custom Class', 'drillcorp'),
			)
		],
		'group_shortcode' => 'drillcorp_social_icon',
		'group_fields'    => array(
			array(
				'id'    => 'social_icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon', 'drillcorp'),
			),
			array(
				'id'      => 'social_link',
				'type'    => 'text',
				'title'   => esc_html__('URL', 'drillcorp'),
			)
		)
	));

	/*------------------------------------
		Top Menu Options
	-------------------------------------*/
	CSF::createSection($prefix . '_shortcodes', array(
		'title'     => esc_html__('Top Menu', 'drillcorp'),
		'view'      => 'group',
		'shortcode' => 'drillcorp_top_menu_wrap',
		'group_shortcode' => 'drillcorp_top_menu',
		'group_fields'    => array(
			array(
				'id'    => 'top_menu_text',
				'type'  => 'text',
				'title' => esc_html__('Text', 'drillcorp'),
			),
			array(
				'id'      => 'top_menu_link',
				'type'    => 'text',
				'title'   => esc_html__('URL', 'drillcorp'),
			)
		)
	));

	/*------------------------------------
      Info Menu Options
    -------------------------------------*/
	CSF::createSection($prefix . '_shortcodes', array(
		'title'     => esc_html__('Info Menu', 'drillcorp'),
		'view'      => 'group',
		'shortcode' => 'drillcorp_top_menu_wrap_02',
		'group_shortcode' => 'drillcorp_top_menu_02',
		'group_fields'    => array(
			array(
				'id'    => 'top_menu_title_text',
				'type'  => 'text',
				'title' => esc_html__('Text', 'drillcorp'),
			),
			array(
				'id'    => 'top_menu_text',
				'type'  => 'text',
				'title' => esc_html__('Text', 'drillcorp'),
			),
			array(
				'id'      => 'top_menu_link',
				'type'    => 'text',
				'title'   => esc_html__('URL', 'drillcorp'),
			)
		)
	));

	/*------------------------------------
		Inline info link options
	-------------------------------------*/
	CSF::createSection($prefix . '_shortcodes', array(
		'title'     => esc_html__('Inline Info Link', 'drillcorp'),
		'view'      => 'group',
		'shortcode' => 'drillcorp_info_item_wrap',
		'group_shortcode' => 'drillcorp_info_link',
		'group_fields'    => array(
			array(
				'id'    => 'icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon', 'drillcorp'),
			),
			array(
				'id'      => 'text',
				'type'    => 'text',
				'title'   => esc_html__('Text', 'drillcorp'),
			),
			array(
				'id'      => 'url',
				'type'    => 'text',
				'title'   => esc_html__('URL', 'drillcorp'),
			)
		)
	));
}
