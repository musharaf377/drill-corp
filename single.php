<?php

/**
 * Blog Single Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package drillcorp
 */

get_header();
$drillcorp = drillcorp();
$page_layout_meta = Drillcorp_Group_Fields_Value::page_layout_options('blog_single');
$full_width_class = $page_layout_meta['content_column_class'] === 'col-lg-12' ? ' full-width-content ' : '';
if ($drillcorp->is_drillcorp_core_active()) {
    drillcorp_core()->setPostViews(get_the_ID());
}

$contact_info_repeater = cs_get_option('contact_info_social');

?>
<div id="primary" class="content-area blog-content-page padding-bottom-120 padding-top-25 <?php echo esc_attr($full_width_class); ?>">
    <main id="main" class="site-main">
        <div class="blog-details-hero-area">
            <div class="blog-top-content">
                <div class="container">
                    <div class="blog-breadcurmb">
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Home', 'drillcorp'); ?></a>
                        <?php echo drillcorp_get_svg_icon('right_angle'); ?>
                        <p>Blog Details</p>
                    </div>
                    <h1 class="blog-main-title"><?php echo get_the_title(get_the_ID()); ?></h1>
                </div>
            </div>

            <div class="blog-details-hero-thumbnail">
                <div class="blog-hero-details-shape">
                    <img class="blog-hero-left" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog-hero-left.png" alt="">
                    <img class="blog-hero-right" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog-hero-right.png" alt="">
                </div>

                <?php
                if (has_post_thumbnail() || !empty($post_meta_gallery)):
                    $get_post_format = get_post_format();
                    if ('video' == $get_post_format || 'gallery' == $get_post_format) {
                        get_template_part('template-parts/content/thumbnail', $get_post_format);
                    } else {
                        get_template_part('template-parts/content/thumbnail');
                    }
                endif;
                ?>
            </div>


        </div>

        <div class="blog-content-wrapper">
            <div class="container custom-container">
                <div class="row">
                    <div class="<?php echo esc_attr($page_layout_meta['content_column_class']); ?>">
                        <div class="blog-left-content-wrap">
                            <?php
                            the_content();
                            ?>
                        </div>
                    </div>
                    <?php if ($page_layout_meta['sidebar_enable']): ?>

                        <div class="<?php echo esc_attr($page_layout_meta['sidebar_column_class']); ?>">
                            <div class="blog-sidebar-area fixed-contact-section">
                                <?php get_sidebar(); ?>
                                <div class="contact-information">
                                    <a href="javascript:void(0);" class="contact-us-link" onclick="return false;">Contact US <?php echo drillcorp_get_svg_icon('down_angle'); ?></a>
                                    <div class="contact-information-wrapper">
                                        <img class="contact-info-bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/contact-info-bg.png" alt="">
                                        <div class="contact-info-content">
                                            <?php
                                            $contact_thumb_raw = cs_get_option('contact_info_thumb_image');
                                            $contact_thumb = is_array($contact_thumb_raw) ? ($contact_thumb_raw['url'] ?? '') : $contact_thumb_raw;
                                            $contact_name = cs_get_option('contact_info_name');
                                            $contact_designation = cs_get_option('contact_info_designation');
                                            $contact_location = cs_get_option('contact_info_location');
                                            ?>
                                            <img src="<?php echo esc_url($contact_thumb); ?>" alt="" class="contact-person-thumb">
                                            <h3 class="contact-info-name"><?php echo esc_html($contact_name); ?></h3>
                                            <p class="contact-info-designation"><?php echo esc_html($contact_designation); ?></p>
                                            <p class="contact-info-location"><?php echo esc_html($contact_location); ?></p>
                                            <div class="contact-info-social">
                                                <?php
                                                if (!empty($contact_info_repeater) && is_array($contact_info_repeater)):
                                                    foreach ($contact_info_repeater as $repeater):
                                                        $social_icon_raw = $repeater['contact_info_social_icon'] ?? '';
                                                        $social_icon_url = is_array($social_icon_raw) ? ($social_icon_raw['url'] ?? '') : $social_icon_raw;
                                                        $social_url = $repeater['contact_info_social_url'] ?? '#';
                                                ?>
                                                        <a href="<?php echo esc_url($social_url); ?>">
                                                            <img src="<?php echo esc_url($social_icon_url); ?>" alt="Social Icon">
                                                        </a>
                                                <?php endforeach;
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-12" style="background: red; padding: 20px; color: white;">
                            SIDEBAR NOT ENABLE
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<section class="related-blog-area">
    <div class="container">
        <div class="section-heading">
            <h2>More Industry Insights</h2>
            <a class="primary-btn" href="/blog">View All Insights</a>
        </div>

        <?php

        $args = [
            'post_type'           => 'post',
            'posts_per_page'      => 3,
            'orderby'             => 'date',
            'order'               => 'DESC',
            'post_status'         => 'publish',
            'post__not_in'        => [get_the_ID()], // Exclude current post
        ];

        $query = new \WP_Query($args);

        if (! $query->have_posts()) {
            echo '<p>' . esc_html__('No blog posts found.', 'drillcorp-core') . '</p>';
            return;
        }

        ?>
        <div class="blog-list related-blog-list">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article class="blog-list-item">
                    <a class="blog-list-item-thumb" href="<?php echo esc_url(get_permalink()); ?>">
                        <?php the_post_thumbnail('large'); ?>
                    </a>
                    <div class="blog-list-item-content">
                        <div>
                            <div class="blog-list-item-cats">
                                <div class="blog-list-item-cat-dot"></div>
                                <?php echo wp_kses_post(get_the_category_list(', ')); ?>
                            </div>
                            <h3 class="blog-list-item-title">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                        </div>
                        <div class="blog-list-item-meta">
                            <div class="blog-list-item-date">
                                <?php echo get_the_date(); ?>
                            </div>
                            <div class="blog-list-meta-dot"></div>
                            <div class="blog-read-time"><?php echo drillcorp()->get_reading_time(get_the_ID()); ?> Min Read</div>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</section>


<!-- Contact info button fixed -->
<div class="contact-information fixed-contact-button">
    <a href="javascript:void(0);" class="contact-us-link" onclick="return false;">Contact US <?php echo drillcorp_get_svg_icon('down_angle'); ?></a>
    <div class="contact-information-wrapper">
        <img class="contact-info-bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/contact-info-bg.png" alt="">
        <div class="contact-info-content">
            <?php
            $contact_thumb_raw = cs_get_option('contact_info_thumb_image');
            $contact_thumb = is_array($contact_thumb_raw) ? ($contact_thumb_raw['url'] ?? '') : $contact_thumb_raw;
            $contact_name = cs_get_option('contact_info_name');
            $contact_designation = cs_get_option('contact_info_designation');
            $contact_location = cs_get_option('contact_info_location');
            ?>
            <img src="<?php echo esc_url($contact_thumb); ?>" alt="" class="contact-person-thumb">
            <h3 class="contact-info-name"><?php echo esc_html($contact_name); ?></h3>
            <p class="contact-info-designation"><?php echo esc_html($contact_designation); ?></p>
            <p class="contact-info-location"><?php echo esc_html($contact_location); ?></p>
            <div class="contact-info-social">
                <?php
                if (!empty($contact_info_repeater) && is_array($contact_info_repeater)):
                    foreach ($contact_info_repeater as $repeater):
                        $social_icon_raw = $repeater['contact_info_social_icon'] ?? '';
                        $social_icon_url = is_array($social_icon_raw) ? ($social_icon_raw['url'] ?? '') : $social_icon_raw;
                        $social_url = $repeater['contact_info_social_url'] ?? '#';
                ?>
                        <a href="<?php echo esc_url($social_url); ?>">
                            <img src="<?php echo esc_url($social_icon_url); ?>" alt="Social Icon">
                        </a>
                <?php endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
