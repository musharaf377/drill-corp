<?php

/**
 * Theme Options
 * @package drilllcorp
 * @since 1.0.0
 */

if (! defined('ABSPATH')) {
	exit(); // exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {

	$allowed_html = drilllcorp()->kses_allowed_html(array('mark'));
	$prefix       = 'drilllcorp';
	// Create options
	CSF::createOptions($prefix . '_theme_options', array(
		'menu_title'         => esc_html__('Theme Options', 'drilllcorp'),
		'menu_slug'          => 'drilllcorp_theme_options',
		'menu_parent'        => 'drilllcorp_theme_options',
		'menu_type'          => 'submenu',
		'footer_credit'      => ' ',
		'menu_icon'          => 'fa fa-filter',
		'show_footer'        => false,
		'enqueue_webfont'    => false,
		'show_search'        => true,
		'show_reset_all'     => true,
		'show_reset_section' => true,
		'show_all_options'   => false,
		'theme'              => 'dark',
		'framework_title'    => drilllcorp()->get_theme_info('name')
	));

	/*-------------------------------------------------------
		** General  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'title' => esc_html__('General', 'drilllcorp'),
		'id'    => 'general_options',
		'icon'  => 'fas fa-cogs',
	));
	/* Preloader */
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Preloader & SVG Enable', 'drilllcorp'),
		'id'     => 'theme_general_preloader_options',
		'icon'   => 'fa fa-spinner',
		'parent' => 'general_options',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Preloader ON / OFF', 'drilllcorp'),
			),
			array(
				'id'      => 'enable_preloader',
				'type'    => 'switcher',
				'title'   => esc_html__('Enable Preloader', 'drilllcorp'),
				'desc'    => esc_html__('If you want to enable or disable preloader you can set ( YES / NO )', 'drilllcorp'),
				'default' => true,
			),
			array(
				'id'         => 'enable_custom_preloader',
				'type'       => 'switcher',
				'title'      => esc_html__('Add Custom Preloader ?', 'drilllcorp'),
				'desc'       => esc_html__('If you want to add custom image for preloader you can set ( YES / NO )', 'drilllcorp'),
				'default'    => false,
				'dependency' => array('enable_preloader', '==', 'true'),
			),
			array(
				'id'         => 'add_preloader_image',
				'type'       => 'media',
				'title'      => esc_html__('Add Custom Image', 'drilllcorp'),
				'desc'       => esc_html__('Add the custom image for preloader.', 'drilllcorp'),
				'library'    => 'image',
				'dependency' => array('enable_preloader|enable_custom_preloader', '==|', 'true|true'),
			),
			array(
				'id'         => 'preloader_style',
				'type'       => 'image_select',
				'class'      => 'preloader_section',
				'title'      => esc_html__('Select Preloader Style', 'drilllcorp'),
				'desc'       => esc_html__('You can set specific preloader style in every page form here.', 'drilllcorp'),
				'options'    => array(
					'style_3'  => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/loader_3.png',
					'style_4'  => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/loader_horizontal.gif',
					'style_5'  => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/loader_spinner.gif',
					'style_6'  => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/loader_spinner.svg',
					'style_7'  => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/loader_square_circle.gif',
					'style_8'  => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/loader_wave.gif',
					'style_9'  => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/loeader_square.gif',
					'style_10' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/wave_preloader.svg',
					'style_11' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/ajax_loader.svg',
					'style_12' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/audio.svg',
					'style_13' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/ball_triangle.svg',
					'style_14' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/bars.svg',
					'style_15' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/circle_pulse_rings.svg',
					'style_16' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/circle_tail_spin.svg',
					'style_17' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/circles.svg',
					'style_18' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/flip_circle.svg',
					'style_19' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/grid.svg',
					'style_20' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/heart.svg',
					'style_21' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/hearts_group.svg',
					'style_22' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/drilllcorp.svg',
					'style_23' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/road_cross.svg',
					'style_24' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/round_circle.svg',
					'style_25' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/round_pulse.svg',
					'style_26' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/simple_spainer.svg',
					'style_27' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/spinner.svg',
					'style_28' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/spinning_circles.svg',
					'style_29' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/loader/three_dots.svg',
				),
				'default'    => 'style_22',
				'dependency' => array('enable_preloader|enable_custom_preloader', '==|==', 'true|false'),
			),
			array(
				'type'       => 'subheading',
				'content'    => esc_html__('Preloader Background & Color', 'drilllcorp'),
				'dependency' => array('enable_preloader', '==', 'true'),
			),
			array(
				'id'                    => 'preloader_bg',
				'type'                  => 'background',
				'title'                 => esc_html__('Preloader Background', 'drilllcorp'),
				'subtitle'              => esc_html__('Set the preloader background.', 'drilllcorp'),
				'desc'                  => esc_html__('Set the preloader background color, image, transparent image and gradient color. If you set only first color field it will be a simple solid color for background and if set 2nd color field too it will be set a gradient color and if you set a image it will be set a background image.', 'drilllcorp'),
				'background_image'      => true,
				'background_position'   => true,
				'background_repeat'     => true,
				'background_attachment' => true,
				'background_size'       => true,
				'background_gradient'   => true,
				'background_origin'     => true,
				'background_clip'       => true,
				'background_blend_mode' => true,
				'output'                => '.preloader',
				'default'               => array(
					'background-color'    => '#ffffff',
					'background-size'     => 'cover',
					'background-position' => 'center center',
					'background-repeat'   => 'repeat',
				),
				'dependency'            => array('enable_preloader', '==', 'true'),
			),
			array(
				'id'         => 'preloader_text_color',
				'type'       => 'color',
				'title'      => esc_html__('Preloader Text Color', 'drilllcorp'),
				'desc'       => esc_html__('Set the preloader text color', 'drilllcorp'),
				'default'    => '#438FF9',
				'output'     => array('.drilllcorp-preeloader', '.preloader-spinner'),
				'dependency' => array('enable_preloader', '==', 'true'),
			),
			array(
				'id'      => 'enable_svg_upload',
				'type'    => 'switcher',
				'title'   => esc_html__('Enable Svg Upload ?', 'drilllcorp'),
				'desc'    => esc_html__('If you want to enable or disable svg upload you can set ( YES / NO )', 'drilllcorp'),
				'default' => false,
			),
		)
	));

	/*-------------------------------------------------------
		   ** Typography  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'typography',
		'title'  => esc_html__('Typography', 'drilllcorp'),
		'icon'   => 'fas fa-text-height',
		'parent' => 'general_options',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Body Font Options', 'drilllcorp') . '</h3>',
			),
			array(
				'type'           => 'typography',
				'title'          => esc_html__('Typography', 'drilllcorp'),
				'id'             => '_body_font',
				'default'        => array(
					'font-family' => 'inter',
					'font-size'   => '16',
					'line-height' => '26',
					'unit'        => 'px',
					'type'        => 'google',
				),
				'color'          => false,
				'subset'         => false,
				'text_align'     => false,
				'text_transform' => false,
				'letter_spacing' => false,
				'line_height'    => false,
				'desc'           => wp_kses(__('you can set <mark>font</mark> for all html tags (if not use different heading font)', 'drilllcorp'), $allowed_html),
			),
			array(
				'id'       => 'body_font_variant',
				'type'     => 'select',
				'title'    => esc_html__('Load Font Variant', 'drilllcorp'),
				'multiple' => true,
				'chosen'   => true,
				'options'  => array(
					'300' => esc_html__('Light 300', 'drilllcorp'),
					'400' => esc_html__('Regular 400', 'drilllcorp'),
					'500' => esc_html__('Medium 500', 'drilllcorp'),
					'600' => esc_html__('Semi Bold 600', 'drilllcorp'),
					'700' => esc_html__('Bold 700', 'drilllcorp'),
					'800' => esc_html__('Extra Bold 800', 'drilllcorp'),
				),
				'default'  => array('400', '500', '700')
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Heading Font Options', 'drilllcorp') . '</h3>',
			),
			array(
				'type'    => 'switcher',
				'id'      => 'heading_font_enable',
				'title'   => esc_html__('Heading Font', 'drilllcorp'),
				'desc'    => wp_kses(__('you can set <mark>yes</mark> to select different heading font', 'drilllcorp'), $allowed_html),
				'default' => true
			),
			array(
				'type'           => 'typography',
				'title'          => esc_html__('Typography', 'drilllcorp'),
				'id'             => 'heading_font',
				'default'        => array(
					'font-family' => 'inter',
					'type'        => 'google',
				),
				'color'          => false,
				'subset'         => false,
				'text_align'     => false,
				'text_transform' => false,
				'letter_spacing' => false,
				'font_size'      => false,
				'line_height'    => false,
				'desc'           => wp_kses(__('you can set <mark>font</mark> for  for heading tag .eg: h1,h2mh3,h4,h5,h6', 'drilllcorp'), $allowed_html),
				'dependency'     => array('heading_font_enable', '==', 'true')
			),
			array(
				'id'         => 'heading_font_variant',
				'type'       => 'select',
				'title'      => esc_html__('Load Font Variant', 'drilllcorp'),
				'multiple'   => true,
				'chosen'     => true,
				'options'    => array(
					'300' => esc_html__('Light 300', 'drilllcorp'),
					'400' => esc_html__('Regular 400', 'drilllcorp'),
					'500' => esc_html__('Medium 500', 'drilllcorp'),
					'600' => esc_html__('Semi Bold 600', 'drilllcorp'),
					'700' => esc_html__('Bold 700', 'drilllcorp'),
					'800' => esc_html__('Extra Bold 800', 'drilllcorp'),
				),
				'default'    => array('400', '500', '600', '700', '800'),
				'dependency' => array('heading_font_enable', '==', 'true')
			),
		)
	));

	/* Preloader */
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Back To Top', 'drilllcorp'),
		'id'     => 'theme_general_back_top_options',
		'icon'   => 'fa fa-arrow-up',
		'parent' => 'general_options',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Back Top Options', 'drilllcorp') . '</h3>'
			),
			array(
				'id'      => 'back_top_enable',
				'title'   => esc_html__('Back Top', 'drilllcorp'),
				'type'    => 'switcher',
				'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top', 'drilllcorp'), $allowed_html),
				'default' => true,
			),
			array(
				'id'         => 'back_top_icon',
				'title'      => esc_html__('Back Top Icon', 'drilllcorp'),
				'type'       => 'icon',
				'default'    => 'fa fa-angle-up',
				'desc'       => wp_kses(__('you can set <mark>icon</mark> for back to top.', 'drilllcorp'), $allowed_html),
				'dependency' => array('back_top_enable', '==', 'true')
			),
		)
	));

	/*----------------------------------
		Header & Footer Style
	-----------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Set Header & Footer Type', 'drilllcorp'),
		'id'     => 'header_footer_style_options',
		'icon'   => 'eicon-banner',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Global Header Style', 'drilllcorp'),
			),
			array(
				'id'      => 'navbar_type',
				'title'   => esc_html__('Navbar Type', 'drilllcorp'),
				'type'    => 'image_select',
				'options' => array(
					'' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/header/01.png'
				),
				'default' => '',
				'desc'    => wp_kses(__('you can set <mark>navbar type</mark> it will show in every page except you select specific navbar type form page settings.', 'drilllcorp'), $allowed_html),
			),
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Global Footer Style', 'drilllcorp'),
			),
			array(
				'id'      => 'footer_type',
				'title'   => esc_html__('Footer Type', 'drilllcorp'),
				'type'    => 'image_select',
				'options' => array(
					'' => DRILLLCORP_THEME_SETTINGS_IMAGES . '/footer/01.png'
				),
				'default' => '',
				'desc'    => wp_kses(__('you can set <mark>footer type</mark> it will show in every page except you select specific navbar type form page settings.', 'drilllcorp'), $allowed_html),
			),
		)
	));

	/*-------------------------------------------------------
	   ** Entire Site Header  Options
   --------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'    => 'headers_settings',
		'title' => esc_html__('Headers', 'drilllcorp'),
		'icon'  => 'fa fa-home'
	));
	/* Header Style 01 */
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Header One', 'drilllcorp'),
		'id'     => 'theme_header_one_options',
		'icon'   => 'fa fa-image',
		'parent' => 'headers_settings',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Logo Options', 'drilllcorp') . '</h3>'
			),
			array(
				'id'      => 'header_one_logo',
				'type'    => 'media',
				'title'   => esc_html__('Logo', 'drilllcorp'),
				'library' => 'image',
				'desc'    => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'drilllcorp'), $allowed_html),
			)
		)
	));

	/* Breadcrumb */
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Breadcrumb', 'drilllcorp'),
		'id'     => 'breadcrumb_options',
		'icon'   => ' eicon-product-breadcrumbs',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Breadcrumb Stock Title Options', 'drilllcorp') . '</h3>'
			),
			array(
				'id'      => 'breadcrumb_stock_title',
				'type'    => 'text',
				'title'   => esc_html__('Chang Breadcrumb Stock Title', 'drilllcorp'),
				'default' => esc_html__('DRILLLCORP', 'drilllcorp'),
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Breadcrumb Options', 'drilllcorp') . '</h3>'
			),
			array(
				'id'      => 'breadcrumb_enable',
				'title'   => esc_html__('Breadcrumb', 'drilllcorp'),
				'type'    => 'switcher',
				'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'drilllcorp'), $allowed_html),
				'default' => true,
			),
			array(
				'id'               => 'breadcrumb_bg',
				'title'            => esc_html__('Background Image', 'drilllcorp'),
				'type'             => 'background',
				'desc'             => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'drilllcorp'), $allowed_html),
				'default'          => array(
					'background-size'     => 'cover',
					'background-position' => 'center bottom',
					'background-repeat'   => 'no-repeat',
				),
				'background_color' => false,
				'dependency'       => array('breadcrumb_enable', '==', 'true')
			),
			array(
				'id'         => 'breadcrumb_bg_color',
				'title'      => esc_html__('Breadcrumb Background Color', 'drilllcorp'),
				'type'       => 'color',
				'default'    => 'rgba(232,0,0, 0.6);',
				'desc'       => wp_kses(__('you can set <mark>overlay color</mark> for Breadcrumb background image', 'drilllcorp'), $allowed_html),
				'dependency' => array('breadcrumb_enable', '==', 'true')
			),
		)
	));


	/*-------------------------------------------------------
		   ** Footer  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'title' => esc_html__('Footer', 'drilllcorp'),
		'id'    => 'footer_options',
		'icon'  => ' eicon-footer',

	));

	CSF::createSection($prefix . '_theme_options', array(
		'parent' => 'footer_options',
		'id'     => 'footer_one_options',
		'title'  => esc_html__('Footer One', 'drilllcorp'),
		'icon'   => 'fa fa-list-ul',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Settings', 'drilllcorp') . '</h3>'
			),
			array(
				'id'      => 'footer_one_logo',
				'type'    => 'media',
				'title'   => esc_html__('Logo', 'drilllcorp'),
				'library' => 'image',
				'desc'    => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'drilllcorp'), $allowed_html),
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Social Item Settings', 'drilllcorp') . '</h3>'
			),
			array(
				'id'      => 'footer_social_icon',
				'type'    => 'switcher',
				'title'   => esc_html__('FOLLOW US', 'drilllcorp'),
				'default' => true,
				'desc'    => wp_kses(__('you can <mark> show/hide</mark> navbar button of header two', 'drilllcorp'), $allowed_html),
			),

			array(
				'id'         => 'footer_social_repeater',
				'type'       => 'repeater',
				'title'      => esc_html__('Social Item Repeater', 'drilllcorp'),
				'dependency' => array('footer_social_icon', '==', 'true'),
				'fields'     => array(
					array(
						'id'      => 'footer_social_icon_item_icon',
						'type'    => 'media',
						'title'   => esc_html__('Logo', 'drilllcorp'),
						'library' => 'image',
						'desc'    => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'drilllcorp'), $allowed_html),
					),
					array(
						'id'      => 'footer_social_icon_item_url',
						'type'    => 'text',
						'title'   => esc_html__('Social URL', 'drilllcorp'),
						'default' => '#'
					),
				)
			),

			// Footer First Column Menu
			array(
				'id'     => 'footer_first_column_menu',
				'type'   => 'repeater',
				'title'  => esc_html__('Footer First Column Menu', 'drilllcorp'),
				'fields' => array(
					array(
						'id'      => 'footer_first_column_menu_item_title',
						'type'    => 'text',
						'title'   => esc_html__('Footer First Column Menu Title', 'drilllcorp'),
						'default' => esc_html__('Home', 'drilllcorp'),
					),
					array(
						'id'      => 'footer_first_column_menu_item_url',
						'type'    => 'text',
						'title'   => esc_html__('Menu URL', 'drilllcorp'),
						'default' => '#'
					),
				)
			),

			// Footer Second Column Menu
			array(
				'id'     => 'footer_second_column_menu',
				'type'   => 'repeater',
				'title'  => esc_html__('Footer second Column Menu', 'drilllcorp'),
				'fields' => array(
					array(
						'id'      => 'footer_second_column_menu_item_title',
						'type'    => 'text',
						'title'   => esc_html__('Footer second Column Menu Title', 'drilllcorp'),
						'default' => esc_html__('Home', 'drilllcorp'),
					),
					array(
						'id'      => 'footer_second_column_menu_item_url',
						'type'    => 'text',
						'title'   => esc_html__('Menu URL', 'drilllcorp'),
						'default' => '#'
					),
				)
			),

			// Footer Location
			array(
				'id'     => 'footer_location',
				'type'   => 'repeater',
				'title'  => esc_html__('Footer Location', 'drilllcorp'),
				'fields' => array(
					array(
						'id'      => 'footer_location_item_title',
						'type'    => 'text',
						'title'   => esc_html__('Footer Location Item Title', 'drilllcorp'),
						'default' => esc_html__('Berlin', 'drilllcorp'),
					),
					array(
						'id'      => 'footer_location_item_desc',
						'type'    => 'text',
						'title'   => esc_html__('Footer Location Item Description', 'drilllcorp'),
						'default' => esc_html__('Reuterstr. 23, 12043 Berlin, Germany', 'drilllcorp'),
					),
					
				)
			),

			// Footer contact info
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Contact Info Options', 'drilllcorp') . '</h3>'
			),
			array(
				'id'      => 'footer_contact_mail',
				'type'    => 'text',
				'title'   => esc_html__('Footer Mail', 'drilllcorp'),
				'default' => esc_html__('info@drilllcorp.com', 'drilllcorp'),
			),
			array(
				'id'      => 'footer_contact_phone',
				'type'    => 'text',
				'title'   => esc_html__('Footer Phone Number', 'drilllcorp'),
				'default' => esc_html__('854 05456 0145', 'drilllcorp'),
			),

			// Footer Copyright Area
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'drilllcorp') . '</h3>'
			),

			array(
				'id'     => 'footer_copyright_bottom_menu',
				'type'   => 'repeater',
				'title'  => esc_html__('Footer Copyright Bottom Menu', 'drilllcorp'),
				'fields' => array(
					array(
						'id'      => 'footer_copyright_bottom_menu_item_title',
						'type'    => 'text',
						'title'   => esc_html__('Footer Copyright Bottom Menu Title', 'drilllcorp'),
						'default' => esc_html__('Home', 'drilllcorp'),
					),
					array(
						'id'      => 'footer_copyright_bottom_menu_item_url',
						'type'    => 'text',
						'title'   => esc_html__('Menu URL', 'drilllcorp'),
						'default' => '#'
					),
				)
			),


			array(
				'id'    => 'copyright_text',
				'title' => esc_html__('Copyright Area Text', 'drilllcorp'),
				'type'  => 'textarea',
				'desc'  => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'drilllcorp'), $allowed_html)
			),
			array(
				'id'    => 'footer_bottom_logo',
				'title' => esc_html__('Footer Bottom Logo', 'drilllcorp'),
				'type'  => 'media',
				'desc'  => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'drilllcorp'), $allowed_html)
			),
		)
	));


	/*-------------------------------------------------------
		  ** Blog  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'    => 'blog_settings',
		'title' => esc_html__('Blog Settings', 'drilllcorp'),
		'icon'  => 'fa fa-book'
	));
	CSF::createSection($prefix . '_theme_options', array(
		'parent' => 'blog_settings',
		'id'     => 'blog_post_options',
		'title'  => esc_html__('Blog Post', 'drilllcorp'),
		'icon'   => 'fa fa-list-ul',
		'fields' => DrilllCorp_Group_Fields::post_meta('blog_post', esc_html__('Blog Page', 'drilllcorp'))
	));
	CSF::createSection($prefix . '_theme_options', array(
		'parent' => 'blog_settings',
		'id'     => 'blog_single_post_options',
		'title'  => esc_html__('Single Post', 'drilllcorp'),
		'icon'   => 'fa fa-list-alt',
		'fields' => DrilllCorp_Group_Fields::post_meta('blog_single_post', esc_html__('Blog Single Page', 'drilllcorp'))
	));


	/*-------------------------------------------------------
		  ** Pages & templates Options
   --------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'    => 'pages_and_template',
		'title' => esc_html__('Pages Settings', 'drilllcorp'),
		'icon'  => 'fa fa-files-o'
	));
	/*  404 page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => '404_page',
		'title'  => esc_html__('404 Page', 'drilllcorp'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-exclamation-triangle',
		'fields' => array(
			array(
				'id'      => 'error_bg_switch',
				'title'   => esc_html__('404 Image Enable', 'drilllcorp'),
				'type'    => 'switcher',
				'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'drilllcorp'), $allowed_html),
				'default' => true,
			),
			array(
				'id'         => 'error_bg',
				'title'      => esc_html__('404 Image', 'drilllcorp'),
				'type'       => 'media',
				'desc'       => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'drilllcorp'), $allowed_html),
				'dependency' => array('error_bg_switch', '==', 'true')
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('404 Page Options', 'drilllcorp') . '</h3>',
			),
			array(
				'id'      => '404_bg_color',
				'type'    => 'color',
				'title'   => esc_html__('Page Background Color', 'drilllcorp'),
				'default' => '#ffffff'
			),
			array(
				'id'         => '404_title',
				'title'      => esc_html__('Title', 'drilllcorp'),
				'type'       => 'text',
				'info'       => wp_kses(__('you can change <mark>title</mark> of 404 page', 'drilllcorp'), $allowed_html),
				'attributes' => array('placeholder' => esc_html__('Sorry! The Page Not Found', 'drilllcorp'))
			),
			array(
				'id'         => '404_paragraph',
				'title'      => esc_html__('Paragraph', 'drilllcorp'),
				'type'       => 'textarea',
				'info'       => wp_kses(__('you can change <mark>paragraph</mark> of 404 page', 'drilllcorp'), $allowed_html),
				'attributes' => array('placeholder' => esc_html__('Oops! The page you are looking for does not exit. it might been moved or deleted.', 'drilllcorp'))
			),
			array(
				'id'         => '404_button_text',
				'title'      => esc_html__('Button Text', 'drilllcorp'),
				'type'       => 'text',
				'info'       => wp_kses(__('you can change <mark>button text</mark> of 404 page', 'drilllcorp'), $allowed_html),
				'attributes' => array('placeholder' => esc_html__('back to home', 'drilllcorp'))
			),
			array(
				'id'      => '404_spacing_top',
				'title'   => esc_html__('Page Spacing Top', 'drilllcorp'),
				'type'    => 'slider',
				'desc'    => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'drilllcorp'), $allowed_html),
				'min'     => 0,
				'max'     => 500,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 120,
			),
			array(
				'id'      => '404_spacing_bottom',
				'title'   => esc_html__('Page Spacing Bottom', 'drilllcorp'),
				'type'    => 'slider',
				'desc'    => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'drilllcorp'), $allowed_html),
				'min'     => 0,
				'max'     => 500,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 120,
			),
		)
	));

	/*  blog page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'blog_page',
		'title'  => esc_html__('Blog Page', 'drilllcorp'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-indent',
		'fields' => DrilllCorp_Group_Fields::page_layout_options(esc_html__('Blog', 'drilllcorp'), 'blog')
	));
	/*  blog single page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'blog_single_page',
		'title'  => esc_html__('Blog Single Page', 'drilllcorp'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-indent',
		'fields' => DrilllCorp_Group_Fields::page_layout_options(esc_html__('Blog Single', 'drilllcorp'), 'blog_single')
	));
	/*  archive page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'archive_page',
		'title'  => esc_html__('Archive Page', 'drilllcorp'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-archive',
		'fields' => DrilllCorp_Group_Fields::page_layout_options(esc_html__('Archive', 'drilllcorp'), 'archive')
	));
	/*  search page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'search_page',
		'title'  => esc_html__('Search Page', 'drilllcorp'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-search',
		'fields' => DrilllCorp_Group_Fields::page_layout_options(esc_html__('Search', 'drilllcorp'), 'search')
	));

	/*-------------------------------------------------------
		   ** Backup  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'backup',
		'title'  => esc_html__('Import / Export', 'drilllcorp'),
		'icon'   => 'eicon-export-kit',
		'fields' => array(
			array(
				'type'    => 'notice',
				'style'   => 'warning',
				'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'drilllcorp'),
			),
			array(
				'type'  => 'backup',
				'title' => esc_html__('Backup & Import', 'drilllcorp')
			)
		)
	));
}
