<?php

/**
 *Theme Group Fields
 * @package drillcorp
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}


if (!class_exists('Drillcorp_Group_Fields')) {

    class Drillcorp_Group_Fields
    {

        /**
         * $instance
         * @since 1.0.0
         */
        private static $instance;


        /**
         * construct()
         * @since 1.0.0
         */
        public function __construct() {}

        /**
         * getInstance()
         * @since 1.0.0
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Page layout options
         * @since 1.0.0
         */
        public static function page_layout()
        {
            $fields = array(
                array(
                    'type' => 'subheading',
                    'content' => esc_html__('Page Layouts & Colors Options', 'drillcorp'),
                ),
                array(
                    'id' => 'page_layout',
                    'type' => 'image_select',
                    'title' => esc_html__('Select Page Layout', 'drillcorp'),
                    'options' => array(
                        'default' => DRILLCORP_THEME_SETTINGS_IMAGES . '/page/default.png',
                        'left-sidebar' => DRILLCORP_THEME_SETTINGS_IMAGES . '/page/left-sidebar.png',
                        'right-sidebar' => DRILLCORP_THEME_SETTINGS_IMAGES . '/page/right-sidebar.png',
                        'blank' => DRILLCORP_THEME_SETTINGS_IMAGES . '/page/blank.png',
                    ),
                    'default' => 'default'
                ),
                array(
                    'id' => 'page_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Background Color', 'drillcorp'),
                    'default' => '#ffffff'
                ),
                array(
                    'id' => 'page_content_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Content Background Color', 'drillcorp'),
                    'default' => '#ffffff'
                ),
                array(
                    'id' => 'page_content_text_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Content Text Color', 'drillcorp'),
                    'default' => '#5f5f5f'
                )

            );

            return $fields;
        }

        /**
         * Page container options
         * @since 1.0.0
         */
        public static function Page_Container_Options($type)
        {
            $fields = array();
            $allowed_html = drillcorp()->kses_allowed_html(array('mark'));
            if ('header_options' == $type) {
                $fields = array(
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Header, Footer & Breadcrumb Options', 'drillcorp'),
                    ),
                    array(
                        'id' => 'page_title',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Title', 'drillcorp'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show/hide page title.', 'drillcorp'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'drillcorp'),
                        'text_off' => esc_html__('No', 'drillcorp'),
                        'default' => true
                    ),
                    array(
                        'id' => 'page_breadcrumb',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Breadcrumb', 'drillcorp'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show/hide page breadcrumb.', 'drillcorp'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'drillcorp'),
                        'text_off' => esc_html__('No', 'drillcorp'),
                        'default' => true
                    ),
                    array(
                        'id' => 'navbar_type',
                        'title' => esc_html__('Navbar Type', 'drillcorp'),
                        'type' => 'image_select',
                        'options' => array(
                            '' => DRILLCORP_THEME_SETTINGS_IMAGES . '/header/01.png'
                        ),
                        'default' => '',
                        'desc' => wp_kses(__('you can set <mark>navbar type</mark> transparent type or solid background.', 'drillcorp'), $allowed_html),
                    ),
                    array(
                        'id' => 'footer_type',
                        'title' => esc_html__('Footer Type', 'drillcorp'),
                        'type' => 'image_select',
                        'options' => array(
                            '' => DRILLCORP_THEME_SETTINGS_IMAGES . '/footer/01.png'
                        ),
                        'default' => '',
                        'desc' => wp_kses(__('you can set <mark>footer type</mark> transparent type or solid background.', 'drillcorp'), $allowed_html),
                    ),

                );
            } elseif ('container_options' == $type) {
                $fields = array(
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Width & Padding Options', 'drillcorp'),
                    ),
                    array(
                        'id' => 'page_container',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Full Width', 'drillcorp'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to set page container full width.', 'drillcorp'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'drillcorp'),
                        'text_off' => esc_html__('No', 'drillcorp'),
                        'default' => false
                    ),
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Spacing Options', 'drillcorp'),
                    ),
                    array(
                        'id' => 'page_spacing_top',
                        'title' => esc_html__('Page Spacing Top', 'drillcorp'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page container.', 'drillcorp'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 120,
                    ),
                    array(
                        'id' => 'page_spacing_bottom',
                        'title' => esc_html__('Page Spacing Bottom', 'drillcorp'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page container.', 'drillcorp'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 120,
                    ),
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Content Spacing Options', 'drillcorp'),
                    ),
                    array(
                        'id' => 'page_content_spacing',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Content Spacing', 'drillcorp'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to set page content spacing.', 'drillcorp'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'drillcorp'),
                        'text_off' => esc_html__('No', 'drillcorp'),
                        'default' => false
                    ),
                    array(
                        'id' => 'page_content_spacing_top',
                        'title' => esc_html__('Page Spacing Bottom', 'drillcorp'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'drillcorp'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                    array(
                        'id' => 'page_content_spacing_bottom',
                        'title' => esc_html__('Page Spacing Bottom', 'drillcorp'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'drillcorp'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                    array(
                        'id' => 'page_content_spacing_left',
                        'title' => esc_html__('Page Spacing Left', 'drillcorp'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Left</mark> for page content area.', 'drillcorp'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                    array(
                        'id' => 'page_content_spacing_right',
                        'title' => esc_html__('Page Spacing Right', 'drillcorp'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Right</mark> for page content area.', 'drillcorp'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                );
            }

            return $fields;
        }


        /**
         * Page layout options
         * @since 1.0.0
         */
        public static function page_layout_options($title, $prefix)
        {
            $allowed_html = drillcorp()->kses_allowed_html(array('mark'));
            $fields = array(
                array(
                    'type' => 'subheading',
                    'content' => '<h3>' . $title . esc_html__(' Page Options', 'drillcorp') . '</h3>',
                ),
                array(
                    'id' => $prefix . '_layout',
                    'type' => 'image_select',
                    'title' => esc_html__('Select Page Layout', 'drillcorp'),
                    'options' => array(
                        'right-sidebar' => DRILLCORP_THEME_SETTINGS_IMAGES . '/page/right-sidebar.png',
                        'left-sidebar' => DRILLCORP_THEME_SETTINGS_IMAGES . '/page/left-sidebar.png',
                        'no-sidebar' => DRILLCORP_THEME_SETTINGS_IMAGES . '/page/no-sidebar.png',
                    ),
                    'default' => 'right-sidebar'
                ),
                array(
                    'id' => $prefix . '_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Background Color', 'drillcorp'),
                    'default' => '#fff'
                ),
                array(
                    'id' => $prefix . '_spacing_top',
                    'title' => esc_html__('Page Spacing Top', 'drillcorp'),
                    'type' => 'slider',
                    'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'drillcorp'), $allowed_html),
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                    'unit' => 'px',
                    'default' => 120,
                ),
                array(
                    'id' => $prefix . '_spacing_bottom',
                    'title' => esc_html__('Page Spacing Bottom', 'drillcorp'),
                    'type' => 'slider',
                    'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'drillcorp'), $allowed_html),
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                    'unit' => 'px',
                    'default' => 120,
                ),
            );

            return $fields;
        }

        /**
         * Post meta
         * @since 1.0.0
         */
        public static function post_meta($prefix, $title)
        {
            $allowed_html = drillcorp()->kses_allowed_html(array('mark'));
            $fields = array(
                array(
                    'type' => 'subheading',
                    'content' => '<h3>' . $title . esc_html__(' Post Options', 'drillcorp') . '</h3>',
                ),
                array(
                    'id' => $prefix . '_posted_by',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted By', 'drillcorp'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted by.', 'drillcorp'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'drillcorp'),
                    'text_off' => esc_html__('No', 'drillcorp'),
                    'default' => true
                )
            );

            if ('blog_post' == $prefix) {
                $fields[] = array(
                    'id' => $prefix . '_posted_cat',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted Category', 'drillcorp'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted category.', 'drillcorp'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'drillcorp'),
                    'text_off' => esc_html__('No', 'drillcorp'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_readmore_btn',
                    'type' => 'switcher',
                    'title' => esc_html__('Read More Button', 'drillcorp'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide read more button.', 'drillcorp'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'drillcorp'),
                    'text_off' => esc_html__('No', 'drillcorp'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_readmore_btn_text',
                    'type' => 'text',
                    'title' => esc_html__('Read More Text', 'drillcorp'),
                    'desc' => wp_kses(__('you can set read more <mark>button text</mark> to button text.', 'drillcorp'), $allowed_html),
                    'default' => esc_html__('Read More', 'drillcorp'),
                    'dependency' => array($prefix . '_readmore_btn', '==', 'true')
                );
                $fields[] = array(
                    'id' => $prefix . '_excerpt_more',
                    'type' => 'text',
                    'title' => esc_html__('Excerpt More', 'drillcorp'),
                    'desc' => wp_kses(__('you can set read more <mark>button text</mark> to button text.', 'drillcorp'), $allowed_html),
                    'attributes' => array(
                        'placeholder' => esc_html__('....', 'drillcorp')
                    )
                );
                $fields[] = array(
                    'id' => $prefix . '_excerpt_length',
                    'type' => 'select',
                    'options' => array(
                        '25' => esc_html__('Short', 'drillcorp'),
                        '55' => esc_html__('Regular', 'drillcorp'),
                        '100' => esc_html__('Long', 'drillcorp'),
                    ),
                    'title' => esc_html__('Excerpt Length', 'drillcorp'),
                    'desc' => wp_kses(__('you can set <mark> excerpt length</mark> for post.', 'drillcorp'), $allowed_html),
                );
            } elseif ('blog_single_post' == $prefix) {

                $fields[] = array(
                    'id' => $prefix . '_posted_category',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted Category', 'drillcorp'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted category.', 'drillcorp'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'drillcorp'),
                    'text_off' => esc_html__('No', 'drillcorp'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_posted_tag',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted Tags', 'drillcorp'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post tags.', 'drillcorp'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'drillcorp'),
                    'text_off' => esc_html__('No', 'drillcorp'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_posted_share',
                    'type' => 'switcher',
                    'title' => esc_html__('Post Share', 'drillcorp'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post share.', 'drillcorp'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'drillcorp'),
                    'text_off' => esc_html__('No', 'drillcorp'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_post_navigation',
                    'type' => 'switcher',
                    'title' => esc_html__('Post Navigation', 'drillcorp'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post navigation.', 'drillcorp'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'drillcorp'),
                    'text_off' => esc_html__('No', 'drillcorp'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_next_post_nav_btn',
                    'type' => 'switcher',
                    'title' => esc_html__('Post Navigation With Image', 'drillcorp'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post navigation button.', 'drillcorp'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'drillcorp'),
                    'text_off' => esc_html__('No', 'drillcorp'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_get_related_post',
                    'type' => 'switcher',
                    'title' => esc_html__('Get Related Post', 'drillcorp'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide get related post button.', 'drillcorp'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'drillcorp'),
                    'text_off' => esc_html__('No', 'drillcorp'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_author_bio',
                    'type' => 'switcher',
                    'title' => esc_html__('Author Bio', 'drillcorp'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide author bio button.', 'drillcorp'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'drillcorp'),
                    'text_off' => esc_html__('No', 'drillcorp'),
                    'default' => true
                );
            }

            return $fields;
        }
    } //end class

}//end if
