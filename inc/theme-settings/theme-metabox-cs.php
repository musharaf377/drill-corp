<?php

/**
 * Theme Metabox Options
 * @package drillcorp
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {

    $allowed_html = drillcorp()->kses_allowed_html(array('mark'));

    $prefix = 'drillcorp';

    /*-------------------------------------
        Post Format Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_post_video_options', array(
        'title' => esc_html__('Video Post Format Options', 'drillcorp'),
        'post_type' => 'post',
        'post_formats' => 'video'
    ));
    CSF::createSection($prefix . '_post_video_options', array(
        'fields' => array(
            array(
                'id' => 'video_url',
                'type' => 'text',
                'title' => esc_html__('Enter Video URL', 'drillcorp'),
                'desc' => wp_kses(__('enter <mark>video url</mark> to show in frontend', 'drillcorp'), $allowed_html)
            )
        )
    ));
    CSF::createMetabox($prefix . '_post_gallery_options', array(
        'title' => esc_html__('Gallery Post Format Options', 'drillcorp'),
        'post_type' => 'post',
        'post_formats' => 'gallery'
    ));
    CSF::createSection($prefix . '_post_gallery_options', array(
        'fields' => array(
            array(
                'id' => 'gallery_images',
                'type' => 'gallery',
                'title' => esc_html__('Select Gallery Photos', 'drillcorp'),
                'desc' => wp_kses(__('select <mark>gallery photos</mark> to show in frontend', 'drillcorp'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
      Page Container Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_page_container_options', array(
        'title' => esc_html__('Page Options', 'drillcorp'),
        'post_type' => array('page'),
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Layout & Colors', 'drillcorp'),
        'icon' => 'fa fa-columns',
        'fields' => Drillcorp_Group_Fields::page_layout()
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Header Footer & Breadcrumb', 'drillcorp'),
        'icon' => 'fa fa-header',
        'fields' => Drillcorp_Group_Fields::Page_Container_Options('header_options')
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Width & Padding', 'drillcorp'),
        'icon' => 'fa fa-file-o',
        'fields' => Drillcorp_Group_Fields::Page_Container_Options('container_options')
    ));
    
    //	blog Meta Box
    CSF::createMetabox($prefix . '_blog_options', array(
        'title' => esc_html__('Blog Options', 'drillcorp'),
        'post_type' => 'post',
    ));
    CSF::createSection($prefix . '_blog_options', array(
        'fields' => array(
            array(
                'id' => 'blog_feature',
                'type' => 'checkbox',
                'title' => esc_html__('Check your blog feature', 'drillcorp'),
                'options' => array(
                    'feature_blog' => esc_html__('feature', 'drillcorp'),
                )
            ),
            
        )
    ));

     //	Service List repeater
    CSF::createMetabox($prefix . '_services_options', array(
        'title' => esc_html__('Services Options', 'drillcorp'),
        'post_type' => 'services',
    ));
    CSF::createSection($prefix . '_services_options', array(
        'fields' => array(
            array(
                'id' => 'services_feature',
                'type' => 'repeater',
                'title' => esc_html__('Check your services feature', 'drillcorp'),
                'fields' => array(
                    array(
                        'id' => 'services_feature_title',
                        'type' => 'text',
                        'title' => esc_html__('Enter Services Feature Title', 'drillcorp'),
                    ),
                )
            ),

        )
    ));

    //	Career Meta Box
    CSF::createMetabox($prefix . '_career_options', array(
        'title' => esc_html__('Career Options', 'drillcorp'),
        'post_type' => 'career',
    ));
    CSF::createSection($prefix . '_career_options', array(
        'fields' => array(
            array(
                'id' => 'career_designation',
                'type' => 'text',
                'title' => esc_html__('Designation', 'drillcorp'),
                'desc' => esc_html__('Enter the job designation', 'drillcorp'),
            ),
            array(
                'id' => 'career_location',
                'type' => 'text',
                'title' => esc_html__('Location', 'drillcorp'),
                'desc' => esc_html__('Enter the job location', 'drillcorp'),
            ),
        )
    ));
    

    
}//endif