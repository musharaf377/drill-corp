<?php

/**
 * Theme Options
 * @package drillcorp
 * @since 1.0.0
 */

if (! defined('ABSPATH')) {
	exit(); // exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {

	$allowed_html = drillcorp()->kses_allowed_html(array('mark'));
	$prefix       = 'drillcorp';
	// Create options
	CSF::createOptions($prefix . '_theme_options', array(
		'menu_title'         => esc_html__('Theme Options', 'drillcorp'),
		'menu_slug'          => 'drillcorp_theme_options',
		'menu_parent'        => 'drillcorp_theme_options',
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
		'framework_title'    => drillcorp()->get_theme_info('name')
	));

	/*-------------------------------------------------------
		** General  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'title' => esc_html__('General', 'drillcorp'),
		'id'    => 'general_options',
		'icon'  => 'fas fa-cogs',
	));
	/* Preloader */
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Preloader & SVG Enable', 'drillcorp'),
		'id'     => 'theme_general_preloader_options',
		'icon'   => 'fa fa-spinner',
		'parent' => 'general_options',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Preloader ON / OFF', 'drillcorp'),
			),
			array(
				'id'      => 'enable_preloader',
				'type'    => 'switcher',
				'title'   => esc_html__('Enable Preloader', 'drillcorp'),
				'desc'    => esc_html__('If you want to enable or disable preloader you can set ( YES / NO )', 'drillcorp'),
				'default' => true,
			),
			array(
				'id'         => 'enable_custom_preloader',
				'type'       => 'switcher',
				'title'      => esc_html__('Add Custom Preloader ?', 'drillcorp'),
				'desc'       => esc_html__('If you want to add custom image for preloader you can set ( YES / NO )', 'drillcorp'),
				'default'    => false,
				'dependency' => array('enable_preloader', '==', 'true'),
			),
			array(
				'id'         => 'add_preloader_image',
				'type'       => 'media',
				'title'      => esc_html__('Add Custom Image', 'drillcorp'),
				'desc'       => esc_html__('Add the custom image for preloader.', 'drillcorp'),
				'library'    => 'image',
				'dependency' => array('enable_preloader|enable_custom_preloader', '==|', 'true|true'),
			),
			array(
				'id'         => 'preloader_style',
				'type'       => 'image_select',
				'class'      => 'preloader_section',
				'title'      => esc_html__('Select Preloader Style', 'drillcorp'),
				'desc'       => esc_html__('You can set specific preloader style in every page form here.', 'drillcorp'),
				'options'    => array(
					'style_3'  => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/loader_3.png',
					'style_4'  => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/loader_horizontal.gif',
					'style_5'  => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/loader_spinner.gif',
					'style_6'  => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/loader_spinner.svg',
					'style_7'  => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/loader_square_circle.gif',
					'style_8'  => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/loader_wave.gif',
					'style_9'  => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/loeader_square.gif',
					'style_10' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/wave_preloader.svg',
					'style_11' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/ajax_loader.svg',
					'style_12' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/audio.svg',
					'style_13' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/ball_triangle.svg',
					'style_14' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/bars.svg',
					'style_15' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/circle_pulse_rings.svg',
					'style_16' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/circle_tail_spin.svg',
					'style_17' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/circles.svg',
					'style_18' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/flip_circle.svg',
					'style_19' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/grid.svg',
					'style_20' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/heart.svg',
					'style_21' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/hearts_group.svg',
					'style_22' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/drillcorp.svg',
					'style_23' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/road_cross.svg',
					'style_24' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/round_circle.svg',
					'style_25' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/round_pulse.svg',
					'style_26' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/simple_spainer.svg',
					'style_27' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/spinner.svg',
					'style_28' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/spinning_circles.svg',
					'style_29' => DRILLCORP_THEME_SETTINGS_IMAGES . '/loader/three_dots.svg',
				),
				'default'    => 'style_22',
				'dependency' => array('enable_preloader|enable_custom_preloader', '==|==', 'true|false'),
			),
			array(
				'type'       => 'subheading',
				'content'    => esc_html__('Preloader Background & Color', 'drillcorp'),
				'dependency' => array('enable_preloader', '==', 'true'),
			),
			array(
				'id'                    => 'preloader_bg',
				'type'                  => 'background',
				'title'                 => esc_html__('Preloader Background', 'drillcorp'),
				'subtitle'              => esc_html__('Set the preloader background.', 'drillcorp'),
				'desc'                  => esc_html__('Set the preloader background color, image, transparent image and gradient color. If you set only first color field it will be a simple solid color for background and if set 2nd color field too it will be set a gradient color and if you set a image it will be set a background image.', 'drillcorp'),
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
				'title'      => esc_html__('Preloader Text Color', 'drillcorp'),
				'desc'       => esc_html__('Set the preloader text color', 'drillcorp'),
				'default'    => '#438FF9',
				'output'     => array('.drillcorp-preeloader', '.preloader-spinner'),
				'dependency' => array('enable_preloader', '==', 'true'),
			),
			array(
				'id'      => 'enable_svg_upload',
				'type'    => 'switcher',
				'title'   => esc_html__('Enable Svg Upload ?', 'drillcorp'),
				'desc'    => esc_html__('If you want to enable or disable svg upload you can set ( YES / NO )', 'drillcorp'),
				'default' => false,
			),
		)
	));

	/*-------------------------------------------------------
		   ** Typography  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'typography',
		'title'  => esc_html__('Typography', 'drillcorp'),
		'icon'   => 'fas fa-text-height',
		'parent' => 'general_options',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Body Font Options', 'drillcorp') . '</h3>',
			),
			array(
				'type'           => 'typography',
				'title'          => esc_html__('Typography', 'drillcorp'),
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
				'desc'           => wp_kses(__('you can set <mark>font</mark> for all html tags (if not use different heading font)', 'drillcorp'), $allowed_html),
			),
			array(
				'id'       => 'body_font_variant',
				'type'     => 'select',
				'title'    => esc_html__('Load Font Variant', 'drillcorp'),
				'multiple' => true,
				'chosen'   => true,
				'options'  => array(
					'300' => esc_html__('Light 300', 'drillcorp'),
					'400' => esc_html__('Regular 400', 'drillcorp'),
					'500' => esc_html__('Medium 500', 'drillcorp'),
					'600' => esc_html__('Semi Bold 600', 'drillcorp'),
					'700' => esc_html__('Bold 700', 'drillcorp'),
					'800' => esc_html__('Extra Bold 800', 'drillcorp'),
				),
				'default'  => array('400', '500', '700')
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Heading Font Options', 'drillcorp') . '</h3>',
			),
			array(
				'type'    => 'switcher',
				'id'      => 'heading_font_enable',
				'title'   => esc_html__('Heading Font', 'drillcorp'),
				'desc'    => wp_kses(__('you can set <mark>yes</mark> to select different heading font', 'drillcorp'), $allowed_html),
				'default' => true
			),
			array(
				'type'           => 'typography',
				'title'          => esc_html__('Typography', 'drillcorp'),
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
				'desc'           => wp_kses(__('you can set <mark>font</mark> for  for heading tag .eg: h1,h2mh3,h4,h5,h6', 'drillcorp'), $allowed_html),
				'dependency'     => array('heading_font_enable', '==', 'true')
			),
			array(
				'id'         => 'heading_font_variant',
				'type'       => 'select',
				'title'      => esc_html__('Load Font Variant', 'drillcorp'),
				'multiple'   => true,
				'chosen'     => true,
				'options'    => array(
					'300' => esc_html__('Light 300', 'drillcorp'),
					'400' => esc_html__('Regular 400', 'drillcorp'),
					'500' => esc_html__('Medium 500', 'drillcorp'),
					'600' => esc_html__('Semi Bold 600', 'drillcorp'),
					'700' => esc_html__('Bold 700', 'drillcorp'),
					'800' => esc_html__('Extra Bold 800', 'drillcorp'),
				),
				'default'    => array('400', '500', '600', '700', '800'),
				'dependency' => array('heading_font_enable', '==', 'true')
			),
		)
	));

	/* Preloader */
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Back To Top', 'drillcorp'),
		'id'     => 'theme_general_back_top_options',
		'icon'   => 'fa fa-arrow-up',
		'parent' => 'general_options',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Back Top Options', 'drillcorp') . '</h3>'
			),
			array(
				'id'      => 'back_top_enable',
				'title'   => esc_html__('Back Top', 'drillcorp'),
				'type'    => 'switcher',
				'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top', 'drillcorp'), $allowed_html),
				'default' => true,
			),
			array(
				'id'         => 'back_top_icon',
				'title'      => esc_html__('Back Top Icon', 'drillcorp'),
				'type'       => 'icon',
				'default'    => 'fa fa-angle-up',
				'desc'       => wp_kses(__('you can set <mark>icon</mark> for back to top.', 'drillcorp'), $allowed_html),
				'dependency' => array('back_top_enable', '==', 'true')
			),
		)
	));

	/*----------------------------------
		Header & Footer Style
	-----------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Set Header & Footer Type', 'drillcorp'),
		'id'     => 'header_footer_style_options',
		'icon'   => 'eicon-banner',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Global Header Style', 'drillcorp'),
			),
			array(
				'id'      => 'navbar_type',
				'title'   => esc_html__('Navbar Type', 'drillcorp'),
				'type'    => 'image_select',
				'options' => array(
					'' => DRILLCORP_THEME_SETTINGS_IMAGES . '/header/01.png'
				),
				'default' => '',
				'desc'    => wp_kses(__('you can set <mark>navbar type</mark> it will show in every page except you select specific navbar type form page settings.', 'drillcorp'), $allowed_html),
			),
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Global Footer Style', 'drillcorp'),
			),
			array(
				'id'      => 'footer_type',
				'title'   => esc_html__('Footer Type', 'drillcorp'),
				'type'    => 'image_select',
				'options' => array(
					'' => DRILLCORP_THEME_SETTINGS_IMAGES . '/footer/01.png'
				),
				'default' => '',
				'desc'    => wp_kses(__('you can set <mark>footer type</mark> it will show in every page except you select specific navbar type form page settings.', 'drillcorp'), $allowed_html),
			),
		)
	));

	/*-------------------------------------------------------
	   ** Entire Site Header  Options
   --------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'    => 'headers_settings',
		'title' => esc_html__('Headers', 'drillcorp'),
		'icon'  => 'fa fa-home'
	));
	/* Header Style 01 */
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Header One', 'drillcorp'),
		'id'     => 'theme_header_one_options',
		'icon'   => 'fa fa-image',
		'parent' => 'headers_settings',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Logo Options', 'drillcorp') . '</h3>'
			),
			array(
				'id'      => 'header_one_logo',
				'type'    => 'media',
				'title'   => esc_html__('Logo', 'drillcorp'),
				'library' => 'image',
				'desc'    => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'drillcorp'), $allowed_html),
			)
		)
	));

	/* Breadcrumb */
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Breadcrumb', 'drillcorp'),
		'id'     => 'breadcrumb_options',
		'icon'   => ' eicon-product-breadcrumbs',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Breadcrumb Stock Title Options', 'drillcorp') . '</h3>'
			),
			array(
				'id'      => 'breadcrumb_stock_title',
				'type'    => 'text',
				'title'   => esc_html__('Chang Breadcrumb Stock Title', 'drillcorp'),
				'default' => esc_html__('DRILLCORP', 'drillcorp'),
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Breadcrumb Options', 'drillcorp') . '</h3>'
			),
			array(
				'id'      => 'breadcrumb_enable',
				'title'   => esc_html__('Breadcrumb', 'drillcorp'),
				'type'    => 'switcher',
				'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'drillcorp'), $allowed_html),
				'default' => true,
			),
			array(
				'id'               => 'breadcrumb_bg',
				'title'            => esc_html__('Background Image', 'drillcorp'),
				'type'             => 'background',
				'desc'             => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'drillcorp'), $allowed_html),
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
				'title'      => esc_html__('Breadcrumb Background Color', 'drillcorp'),
				'type'       => 'color',
				'default'    => 'rgba(232,0,0, 0.6);',
				'desc'       => wp_kses(__('you can set <mark>overlay color</mark> for Breadcrumb background image', 'drillcorp'), $allowed_html),
				'dependency' => array('breadcrumb_enable', '==', 'true')
			),
		)
	));


	/*-------------------------------------------------------
		   ** Footer  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'title' => esc_html__('Footer', 'drillcorp'),
		'id'    => 'footer_options',
		'icon'  => ' eicon-footer',

	));

	CSF::createSection($prefix . '_theme_options', array(
		'parent' => 'footer_options',
		'id'     => 'footer_one_options',
		'title'  => esc_html__('Footer One', 'drillcorp'),
		'icon'   => 'fa fa-list-ul',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Settings', 'drillcorp') . '</h3>'
			),
			array(
				'id'      => 'footer_one_logo',
				'type'    => 'media',
				'title'   => esc_html__('Logo', 'drillcorp'),
				'library' => 'image',
				'desc'    => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'drillcorp'), $allowed_html),
			),

			// Footer Content
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Conetent Settings', 'drillcorp') . '</h3>'
			),

			array(
				'id'      => 'footer_content_sub_title',
				'type'    => 'text',
				'title'   => esc_html__('Footer Content Sub Title', 'drillcorp'),
				'default' => esc_html__('Capability Download Center', 'drillcorp')
			),

			array(
				'id'      => 'footer_content_sub_desc',
				'type'    => 'textarea',
				'title'   => esc_html__('Footer Content Sub Description', 'drillcorp'),
				'default' => esc_html__('Create a structured PDF including performance records, fleet resources, and HSE metrics — ready for evaluation.', 'drillcorp')
			),

			array(
				'id'      => 'footer_content_download_icon',
				'type'    => 'media',
				'title'   => esc_html__('Footer Content Download Image', 'drillcorp'),
				'library' => 'image',
			),

			array(
				'id'      => 'footer_content_download_link',
				'type'    => 'link',
				'title'   => esc_html__('Footer Content Download Link', 'drillcorp'),
				'default' => '#'
			),


			array(
				'id'      => 'footer_content_view_capabilities_icon',
				'type'    => 'media',
				'title'   => esc_html__('Footer Content View Capabilities Image', 'drillcorp'),
				'library' => 'image',
			),

			array(
				'id'      => 'footer_content_view_capabilities_link',
				'type'    => 'link',
				'title'   => esc_html__('Footer Content Download Link', 'drillcorp'),
				'default' => '#'
			),

			// Footer First Column Menu
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Menu Settings', 'drillcorp') . '</h3>'
			),

			array(
				'id'     => 'footer_first_column_menu',
				'type'   => 'repeater',
				'title'  => esc_html__('Footer First Column Menu', 'drillcorp'),
				'fields' => array(
					array(
						'id'      => 'footer_first_column_menu_item_title',
						'type'    => 'text',
						'title'   => esc_html__('Footer First Column Menu Title', 'drillcorp'),
						'default' => esc_html__('Home', 'drillcorp'),
					),
					array(
						'id'      => 'footer_first_column_menu_item_url',
						'type'    => 'text',
						'title'   => esc_html__('Menu URL', 'drillcorp'),
						'default' => '#'
					),
				)
			),

			// Footer Second Column Menu
			array(
				'id'     => 'footer_second_column_menu',
				'type'   => 'repeater',
				'title'  => esc_html__('Footer second Column Menu', 'drillcorp'),
				'fields' => array(
					array(
						'id'      => 'footer_second_column_menu_item_title',
						'type'    => 'text',
						'title'   => esc_html__('Footer second Column Menu Title', 'drillcorp'),
						'default' => esc_html__('Home', 'drillcorp'),
					),
					array(
						'id'      => 'footer_second_column_menu_item_url',
						'type'    => 'text',
						'title'   => esc_html__('Menu URL', 'drillcorp'),
						'default' => '#'
					),
				)
			),

			// Footer Location
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Location Settings', 'drillcorp') . '</h3>'
			),

			array(
				'id'     => 'footer_location',
				'type'   => 'repeater',
				'title'  => esc_html__('Footer Location', 'drillcorp'),
				'fields' => array(
					array(
						'id'      => 'footer_location_item_icon',
						'type'    => 'media',
						'library' => 'image',
						'title'   => esc_html__('Footer Location Item Icon', 'drillcorp'),
						'default' => esc_html__('fas fa-map-marker-alt', 'drillcorp'),
					),

					array(
						'id'      => 'footer_location_item_title',
						'type'    => 'text',
						'title'   => esc_html__('Footer Location Item Title', 'drillcorp'),
						'default' => esc_html__('Berlin', 'drillcorp'),
					),
					array(
						'id'      => 'footer_location_item_desc',
						'type'    => 'text',
						'title'   => esc_html__('Footer Location Item Description', 'drillcorp'),
						'default' => esc_html__('Reuterstr. 23, 12043 Berlin, Germany', 'drillcorp'),
					),
					
				)
			),

			// Footer contact info
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Contact Info', 'drillcorp') . '</h3>'
			),

			array(
				'id'      => 'footer_contact_mail',
				'type'    => 'text',
				'title'   => esc_html__('Footer Mail', 'drillcorp'),
				'default' => esc_html__('info@drillcorp.com', 'drillcorp'),
			),
			array(
				'id'      => 'footer_contact_phone',
				'type'    => 'text',
				'title'   => esc_html__('Footer Phone Number', 'drillcorp'),
				'default' => esc_html__('854 05456 0145', 'drillcorp'),
			),

			// Footer Social Item
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Social Item Settings', 'drillcorp') . '</h3>'
			),

			array(
				'id'         => 'footer_social_repeater',
				'type'       => 'repeater',
				'title'      => esc_html__('Social Item Repeater', 'drillcorp'),
				'fields'     => array(
					array(
						'id'      => 'footer_social_icon_item_icon',
						'type'    => 'media',
						'title'   => esc_html__('Logo', 'drillcorp'),
						'library' => 'image',
						'desc'    => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'drillcorp'), $allowed_html),
					),
					array(
						'id'      => 'footer_social_icon_item_url',
						'type'    => 'text',
						'title'   => esc_html__('Social URL', 'drillcorp'),
						'default' => '#'
					),
				)
			),
			
			// footer Award Logo
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Award Logo Settings', 'drillcorp') . '</h3>'
			),

			array(
				'id'         => 'footer_award_repeater',
				'type'       => 'repeater',
				'title'      => esc_html__('Award Logo Item Repeater', 'drillcorp'),
				'fields'     => array(
					array(
						'id'      => 'footer_award_image',
						'type'    => 'media',
						'library' => 'image',
						'title'   => esc_html__('Award Logo', 'drillcorp'),
					),
				)
			),

			// Footer Copyright Area
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Bottom Menu', 'drillcorp') . '</h3>'
			),

			array(
				'id'     => 'footer_bottom_menu',
				'type'   => 'repeater',
				'title'  => esc_html__('Footer Bottom Menu', 'drillcorp'),
				'fields' => array(
					array(
						'id'      => 'footer_bottom_menu_item_title',
						'type'    => 'text',
						'title'   => esc_html__('Footer Bottom Menu Title', 'drillcorp'),
						'default' => esc_html__('Home', 'drillcorp'),
					),
					array(
						'id'      => 'footer_bottom_menu_item_url',
						'type'    => 'text',
						'title'   => esc_html__('Menu URL', 'drillcorp'),
						'default' => '#'
					),
				)
			),

			// Footer Copyright Area
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'drillcorp') . '</h3>'
			),

			array(
				'id'    => 'copyright_text',
				'title' => esc_html__('Copyright Area Text', 'drillcorp'),
				'type'  => 'textarea',
				'desc'  => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'drillcorp'), $allowed_html)
			),
			array(
				'id'    => 'footer_bottom_logo',
				'title' => esc_html__('Footer Bottom Logo', 'drillcorp'),
				'type'  => 'media',
				'desc'  => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'drillcorp'), $allowed_html)
			),
		)
	));


	/*-------------------------------------------------------
		  ** Blog  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'    => 'blog_settings',
		'title' => esc_html__('Blog Settings', 'drillcorp'),
		'icon'  => 'fa fa-book'
	));
	CSF::createSection($prefix . '_theme_options', array(
		'parent' => 'blog_settings',
		'id'     => 'blog_post_options',
		'title'  => esc_html__('Blog Post', 'drillcorp'),
		'icon'   => 'fa fa-list-ul',
		'fields' => Drillcorp_Group_Fields::post_meta('blog_post', esc_html__('Blog Page', 'drillcorp'))
	));
	CSF::createSection($prefix . '_theme_options', array(
		'parent' => 'blog_settings',
		'id'     => 'blog_single_post_options',
		'title'  => esc_html__('Single Post', 'drillcorp'),
		'icon'   => 'fa fa-list-alt',
		'fields' => Drillcorp_Group_Fields::post_meta('blog_single_post', esc_html__('Blog Single Page', 'drillcorp'))
	));


	/*-------------------------------------------------------
		  ** Pages & templates Options
   --------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'    => 'pages_and_template',
		'title' => esc_html__('Pages Settings', 'drillcorp'),
		'icon'  => 'fa fa-files-o'
	));
	/*  404 page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => '404_page',
		'title'  => esc_html__('404 Page', 'drillcorp'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-exclamation-triangle',
		'fields' => array(
			array(
				'id'      => 'error_bg_switch',
				'title'   => esc_html__('404 Image Enable', 'drillcorp'),
				'type'    => 'switcher',
				'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'drillcorp'), $allowed_html),
				'default' => true,
			),
			array(
				'id'         => 'error_bg',
				'title'      => esc_html__('404 Image', 'drillcorp'),
				'type'       => 'media',
				'desc'       => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'drillcorp'), $allowed_html),
				'dependency' => array('error_bg_switch', '==', 'true')
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('404 Page Options', 'drillcorp') . '</h3>',
			),
			array(
				'id'      => '404_bg_color',
				'type'    => 'color',
				'title'   => esc_html__('Page Background Color', 'drillcorp'),
				'default' => '#ffffff'
			),
			array(
				'id'         => '404_title',
				'title'      => esc_html__('Title', 'drillcorp'),
				'type'       => 'text',
				'info'       => wp_kses(__('you can change <mark>title</mark> of 404 page', 'drillcorp'), $allowed_html),
				'attributes' => array('placeholder' => esc_html__('Sorry! The Page Not Found', 'drillcorp'))
			),
			array(
				'id'         => '404_paragraph',
				'title'      => esc_html__('Paragraph', 'drillcorp'),
				'type'       => 'textarea',
				'info'       => wp_kses(__('you can change <mark>paragraph</mark> of 404 page', 'drillcorp'), $allowed_html),
				'attributes' => array('placeholder' => esc_html__('Oops! The page you are looking for does not exit. it might been moved or deleted.', 'drillcorp'))
			),
			array(
				'id'         => '404_button_text',
				'title'      => esc_html__('Button Text', 'drillcorp'),
				'type'       => 'text',
				'info'       => wp_kses(__('you can change <mark>button text</mark> of 404 page', 'drillcorp'), $allowed_html),
				'attributes' => array('placeholder' => esc_html__('back to home', 'drillcorp'))
			),
			array(
				'id'      => '404_spacing_top',
				'title'   => esc_html__('Page Spacing Top', 'drillcorp'),
				'type'    => 'slider',
				'desc'    => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'drillcorp'), $allowed_html),
				'min'     => 0,
				'max'     => 500,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 120,
			),
			array(
				'id'      => '404_spacing_bottom',
				'title'   => esc_html__('Page Spacing Bottom', 'drillcorp'),
				'type'    => 'slider',
				'desc'    => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'drillcorp'), $allowed_html),
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
		'title'  => esc_html__('Blog Page', 'drillcorp'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-indent',
		'fields' => Drillcorp_Group_Fields::page_layout_options(esc_html__('Blog', 'drillcorp'), 'blog')
	));
	/*  blog single page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'blog_single_page',
		'title'  => esc_html__('Blog Single Page', 'drillcorp'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-indent',
		'fields' => Drillcorp_Group_Fields::page_layout_options(esc_html__('Blog Single', 'drillcorp'), 'blog_single')
	));
	/*  archive page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'archive_page',
		'title'  => esc_html__('Archive Page', 'drillcorp'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-archive',
		'fields' => Drillcorp_Group_Fields::page_layout_options(esc_html__('Archive', 'drillcorp'), 'archive')
	));
	/*  search page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'search_page',
		'title'  => esc_html__('Search Page', 'drillcorp'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-search',
		'fields' => Drillcorp_Group_Fields::page_layout_options(esc_html__('Search', 'drillcorp'), 'search')
	));

	/*-------------------------------------------------------
		   ** Backup  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'backup',
		'title'  => esc_html__('Import / Export', 'drillcorp'),
		'icon'   => 'eicon-export-kit',
		'fields' => array(
			array(
				'type'    => 'notice',
				'style'   => 'warning',
				'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'drillcorp'),
			),
			array(
				'type'  => 'backup',
				'title' => esc_html__('Backup & Import', 'drillcorp')
			)
		)
	));
}
