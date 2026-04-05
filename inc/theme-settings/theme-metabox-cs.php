<?php

/**
 * Theme Metabox Options
 * @package drilllcorp
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {

    $allowed_html = drilllcorp()->kses_allowed_html(array('mark'));

    $prefix = 'drilllcorp';

    /*-------------------------------------
        Post Format Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_post_video_options', array(
        'title' => esc_html__('Video Post Format Options', 'drilllcorp'),
        'post_type' => 'post',
        'post_formats' => 'video'
    ));
    CSF::createSection($prefix . '_post_video_options', array(
        'fields' => array(
            array(
                'id' => 'video_url',
                'type' => 'text',
                'title' => esc_html__('Enter Video URL', 'drilllcorp'),
                'desc' => wp_kses(__('enter <mark>video url</mark> to show in frontend', 'drilllcorp'), $allowed_html)
            )
        )
    ));
    CSF::createMetabox($prefix . '_post_gallery_options', array(
        'title' => esc_html__('Gallery Post Format Options', 'drilllcorp'),
        'post_type' => 'post',
        'post_formats' => 'gallery'
    ));
    CSF::createSection($prefix . '_post_gallery_options', array(
        'fields' => array(
            array(
                'id' => 'gallery_images',
                'type' => 'gallery',
                'title' => esc_html__('Select Gallery Photos', 'drilllcorp'),
                'desc' => wp_kses(__('select <mark>gallery photos</mark> to show in frontend', 'drilllcorp'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
      Page Container Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_page_container_options', array(
        'title' => esc_html__('Page Options', 'drilllcorp'),
        'post_type' => array('page'),
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Layout & Colors', 'drilllcorp'),
        'icon' => 'fa fa-columns',
        'fields' => DrilllCorp_Group_Fields::page_layout()
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Header Footer & Breadcrumb', 'drilllcorp'),
        'icon' => 'fa fa-header',
        'fields' => DrilllCorp_Group_Fields::Page_Container_Options('header_options')
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Width & Padding', 'drilllcorp'),
        'icon' => 'fa fa-file-o',
        'fields' => DrilllCorp_Group_Fields::Page_Container_Options('container_options')
    ));
    
    //	Service Meta Box
    CSF::createMetabox($prefix . '_team_options', array(
        'title' => esc_html__('Team Options', 'drilllcorp'),
        'post_type' => 'team',
    ));
    CSF::createSection($prefix . '_team_options', array(
        'fields' => array(
            array(
                'id' => 'team_member_designation',
                'type' => 'text',
                'title' => esc_html__('Enter Team Member Designation', 'drilllcorp'),
                'desc' => wp_kses(__('use <mark>{br}</mark> for break your designation', 'drilllcorp'), $allowed_html),
                'default' => esc_html__('Managing Partner', 'drilllcorp'),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Team Member Social Link', 'drilllcorp') . '</h3>'
            ),
            array(
                'id' => 'team_member_social_repeater',
                'type' => 'repeater',
                'title' => esc_html__('Team Member Social Repeater', 'drilllcorp'),
                'fields' => array(
                    array(
                        'id' => 'team_member_social_image',
                        'type' => 'media',
                        'title' => esc_html__('Team Member Social Image', 'drilllcorp'),
                    ),
                    array(
                        'id' => 'team_member_social_url',
                        'type' => 'text',
                        'title' => esc_html__('Social Link URL', 'drilllcorp'),
                        'default' => '#'
                    ),
                )
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Team Member Contact List', 'drilllcorp') . '</h3>'
            ),
            array(
                'id' => 'team_member_contact_repeater',
                'type' => 'repeater',
                'title' => esc_html__('Team Member Contact Repeater', 'drilllcorp'),
                'fields' => array(
                    array(
                        'id' => 'team_member_contact_image',
                        'type' => 'media',
                        'title' => esc_html__('Team Member Contact Image', 'drilllcorp'),
                    ),
                    array(
                        'id' => 'team_member_contact_text',
                        'type' => 'text',
                        'title' => esc_html__('Contact Info Text', 'drilllcorp'),
                        'default' => '#'
                    ),
                )
            ),
        )
    ));
    
}//endif