<?php

/**
 * Theme Footer Widget Template
 * @package drillcorp
 * @since 1.0.0
 */
$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text') : esc_html__('© 2025 drillcorp | All right reserved ', 'drillcorp') . '<a href="' . esc_url('https://drillcorp.agency') . '">' . esc_html__('Drillcorp', 'drillcorp') . '</a>';

$copyright_text = str_replace('{copy}', '&copy;', $copyright_text);
$copyright_text = str_replace('{year}', date('Y'), $copyright_text);
$socialIcon = cs_get_option('footer_social_repeater');
$footer_quick_links_menu_repeater = cs_get_option('footer_quick_links_menu_repeater');
$footer_company_menu = cs_get_option('footer_company_menu_repeater');
$footer_first_column_menu = cs_get_option('footer_first_column_menu');
$footer_second_column_menu = cs_get_option('footer_second_column_menu');
$footer_location = cs_get_option('footer_location');
$footer_award_logo = cs_get_option('footer_award_repeater');
$footer_bottom_menu = cs_get_option('footer_bottom_menu');

// Footer Top Section Options
$footer_top_image = cs_get_option('footer_top_section_image');
$footer_top_subtitle_logo = cs_get_option('footer_top_section_subtitle_logo');
$footer_top_subtitle = cs_get_option('footer_top_section_subtitle');
$footer_top_title = cs_get_option('footer_top_section_title');
$footer_top_desc = cs_get_option('footer_top_section_desc');
$footer_top_button_text = cs_get_option('footer_top_section_button_text');
$footer_top_button_url = cs_get_option('footer_top_section_button_url');


?>
<section class="footer-top-section">
    <div class="container">
        <div class="footer-top-section-wrap">
            <?php if (!empty($footer_top_image['url'])) : ?>
                <img class="footer-top-section-image" src="<?php echo esc_url($footer_top_image['url']); ?>" alt="<?php echo esc_attr($footer_top_image['alt']); ?>">
            <?php endif; ?>
            <div class="footer-top-section-content">
                <div class="subtitle">
                    <?php if (!empty($footer_top_subtitle_logo['url'])) : ?>
                        <img class="footer-top-section-subtitle-logo" src="<?php echo esc_url($footer_top_subtitle_logo['url']); ?>" alt="<?php echo esc_attr($footer_top_subtitle_logo['alt']); ?>">
                    <?php endif; ?>
                    <?php if (!empty($footer_top_subtitle)) : ?>
                        <span><?php echo esc_html($footer_top_subtitle); ?></span>
                    <?php endif; ?>
                </div>
                <?php if (!empty($footer_top_title)) : ?>
                    <h2><?php echo esc_html($footer_top_title); ?></h2>
                <?php endif; ?>
                <?php if (!empty($footer_top_desc)) : ?>
                    <p class="footer-top-section-desc"><?php echo esc_html($footer_top_desc); ?></p>
                <?php endif; ?>
                <?php if (!empty($footer_top_button_text) || !empty($footer_top_button_url)) : ?>
                    <a href="<?php echo esc_url(!empty($footer_top_button_url) ? $footer_top_button_url : '#'); ?>" class="primary-btn"><?php echo esc_html($footer_top_button_text); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<div class="footer-section">
    <div class="custom-container container">
        <div class="footer-top-area">
            <div class="footer-top-left">
                <div class="footer-logo">
                    <?php
                    $footer_one_logo = cs_get_option('footer_one_logo');
                    if (has_custom_logo() && empty($footer_one_logo['id'])) {
                        the_custom_logo();
                    } elseif (!empty($footer_one_logo['id'])) {
                        printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $footer_one_logo['url'], $footer_one_logo['alt']);
                    } else {
                        printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                    }
                    ?>
                </div>
                <div class="footer-top-left-content">
                    <h4><?php echo esc_html(cs_get_option('footer_content_sub_title')); ?></h4>
                    <p><?php echo esc_html(cs_get_option('footer_content_sub_desc')); ?></p>

                    <div class="footer-extra-meta-wrap">
                        <div class="footer-extra-single-meta">
                            <a href="<?php echo esc_url(cs_get_option('footer_content_download_link')['url']) ?>">
                                <img src="<?php echo cs_get_option('footer_content_download_icon')['url']  ?>" alt="">
                                <span><?php echo cs_get_option('footer_content_download_link')['text']; ?></span>
                            </a>
                        </div>
                        <div class="footer-extra-single-meta">
                            <a href="<?php echo esc_url(cs_get_option('footer_content_view_capabilities_link')['url']) ?>">
                                <img src="<?php echo cs_get_option('footer_content_view_capabilities_icon')['url']  ?>" alt="">
                                <span><?php echo cs_get_option('footer_content_view_capabilities_link')['text']; ?></span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="footer-top-right">
                <div class="footer-menu-wrap">
                    <div class="footer-single-menu-widget">
                        <h4>Our Company</h4>
                        <ul class="footer-list">
                            <?php

                            if (!empty($footer_first_column_menu)) :
                                foreach ($footer_first_column_menu as $menu) :
                                    echo '<li><a href=" ' . $menu['footer_first_column_menu_item_url'] . ' ">
                                                ' . $menu['footer_first_column_menu_item_title'] . '</a></li>';
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <div class="footer-single-menu-widget">
                        <h4>Services</h4>
                        <ul class="footer-list">
                            <?php
                            if (!empty($footer_second_column_menu)) :
                                foreach ($footer_second_column_menu as $menu) :
                                    echo '<li><a href=" ' . $menu['footer_second_column_menu_item_url'] . ' ">
                                                ' . $menu['footer_second_column_menu_item_title'] . '</a></li>';
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="footer-contact-info">
                    <h4>Contact Info</h4>
                    <div class="footer-location-wrap">
                        <div class="footer-location-content">
                            <?php if (!empty($footer_location)) {
                                foreach ($footer_location as $location) { ?>
                                    <div class="footer-single-location-wrap">
                                        <img src="<?php echo esc_url($location['footer_location_item_icon']['url']) ?>" alt="">
                                        <div class="footer-single-location">
                                            <h4><?php echo esc_html($location['footer_location_item_title']) ?></h4>
                                            <p><?php echo esc_html($location['footer_location_item_desc']) ?></p>
                                        </div>
                                    </div>
                            <?php }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="footer-contact-info-wrap">
                        <div class="footer-single-contact-wrap">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/mail.svg' ?>" alt="">
                            <div class="footer-contact-content">
                                <a href="<?php echo esc_url('mailto:' . cs_get_option('footer_contact_mail')) ?>">
                                    <span>Email:</span><?php echo esc_html(cs_get_option('footer_contact_mail')) ?>
                                </a>
                            </div>
                        </div>
                        <div class="footer-single-contact-wrap">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/phone.svg' ?>" alt="">
                            <div class="footer-contact-content">
                                <a href="<?php echo esc_url('tel:' . cs_get_option('footer_contact_phone')) ?>">
                                    <span>Phone:</span><?php echo esc_html(cs_get_option('footer_contact_phone')) ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-bottom-wrap">
                <ul class="footer-social-share">
                    <?php
                    if (!empty($socialIcon)) :
                        foreach ($socialIcon as $icon) :
                            echo '<li class="single-info-item"><a href=" ' . $icon['footer_social_icon_item_url'] . ' ">
                                <img src="' . $icon['footer_social_icon_item_icon']['url'] . '" target="_blank" alt="' . $icon['footer_social_icon_item_icon']['alt'] . '"/></a></li>';
                        endforeach;
                    endif;
                    ?>
                </ul>

                <div class="footer-middle-right">
                    <div class="footer-award-logo">
                        <?php
                        if (!empty($footer_award_logo)) :
                            foreach ($footer_award_logo as $award) :
                                echo '<img src="' . $award['footer_award_image']['url'] . '" alt="' . $award['footer_award_image']['alt'] . '"/>';
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <div class="copyright-text">
                        <?php echo wp_kses($copyright_text, drillcorp()->kses_allowed_html(array('a'))); ?>
                    </div>
                </div>
            </div>
        </div>

        <ul class="footer-bottom-menu-list">
            <?php
            if (!empty($footer_bottom_menu)) :
                foreach ($footer_bottom_menu as $menu) : ?>
                    <li>
                        <a href="<?php echo $menu['footer_bottom_menu_item_url']  ?>">
                            <?php echo $menu['footer_bottom_menu_item_title']; ?>
                        </a>
                    </li>
            <?php endforeach;
            endif;
            ?>
        </ul>

    </div>
    <div class="footer-bottom-logo">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/footer-shape-one.png' ?>" class="footer-shape-one" alt="">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/footer-shape-two.png' ?>" class="footer-shape-two" alt="">
        <div class="footer-bottom-main-logo-wrap">
            <img src="<?php echo esc_url(cs_get_option('footer_bottom_logo')['url']) ?>" class="footer-bottom-main-logo" alt="">
        </div>
        <img src="<?php echo get_template_directory_uri() . '/assets/img/footer-shape-three.png' ?>" class="footer-shape-three" alt="">

    </div>
</div>

</div>