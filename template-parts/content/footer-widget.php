<?php

/**
 * Theme Footer Widget Template
 * @package drilllcorp
 * @since 1.0.0
 */
$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text') : esc_html__('© 2025 drilllcorp | All right reserved ', 'drilllcorp') . '<a href="' . esc_url('https://drilllcorp.agency') . '">' . esc_html__('DrilllCorp', 'drilllcorp') . '</a>';

$copyright_text = str_replace('{copy}', '&copy;', $copyright_text);
$copyright_text = str_replace('{year}', date('Y'), $copyright_text);
$socialIcon = cs_get_option('footer_social_repeater');
$footer_quick_links_menu_repeater = cs_get_option('footer_quick_links_menu_repeater');
$footer_company_menu = cs_get_option('footer_company_menu_repeater');
$footer_first_column_menu = cs_get_option('footer_first_column_menu');
$footer_second_column_menu = cs_get_option('footer_second_column_menu');
$footer_copyright_bottom_menu = cs_get_option('footer_copyright_bottom_menu');
$footer_location = cs_get_option('footer_location');
?>
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
            </div>
            <div class="footer-top-right">
                <div class="footer-menu-wrap">
                    <div class="footer-single-menu-widget">
                        <h3>Our Company</h3>
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
                        <h3>Services</h3>
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
                    <h3>Contact Info</h3>
                    <div class="footer-location-wrap">
                        <div class="footer-single-location-wrap">
                            
                            <div class="footer-location-content">
                                <?php if (!empty($footer_location)) {
                                    foreach ($footer_location as $location) {
                                        echo ' <img src="' . get_template_directory_uri() . '/assets/img/office-home-image.png" alt="">
                                            <div class="footer-single-location">
                                                        <h4>' . $location['footer_location_item_title'] . '</h4>
                                                        <p>' . $location['footer_location_item_desc'] . '</p>
                                                    </div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer-contact-info-wrap">
                        <div class="footer-single-contact-wrap">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/office-home-image.png' ?>" alt="">
                            <div class="footer-contact-content">
                                <a href="<?php echo esc_url('mailto:' . get_option('footer_contact_mail')) ?>">
                                    <span>Email</span><?php echo esc_html(get_option('footer_contact_mail')) ?>
                                </a>
                            </div>
                        </div>
                        <div class="footer-single-contact-wrap">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/office-home-image.png' ?>" alt="">
                            <div class="footer-contact-content">
                                <a href="<?php echo esc_url('tel:' . get_option('footer_contact_phone')) ?>">
                                    <span>Phone</span><?php echo esc_html(get_option('footer_contact_phone')) ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-middle-area">
            <ul class="footer-social-share for-mobile">
                <?php
                if (!empty($socialIcon)) :
                    foreach ($socialIcon as $icon) :
                        echo '<li class="single-info-item"><a href=" ' . $icon['footer_social_icon_item_url'] . ' ">
                                                    <img src="' . $icon['footer_social_icon_item_icon']['url'] . '" alt="' . $icon['footer_social_icon_item_icon']['alt'] . '"/></a></li>';
                    endforeach;
                endif;
                ?>
            </ul>
        </div>


        <div class="footer-bottom-menu">
            <div class="menu-about-menu-container">
                <ul class="footer-social-share">
                    <?php
                    if (!empty($socialIcon)) :
                        foreach ($socialIcon as $icon) :
                            echo '<li class="single-info-item"><a href=" ' . $icon['footer_social_icon_item_url'] . ' ">
                                                <img src="' . $icon['footer_social_icon_item_icon']['url'] . '" alt="' . $icon['footer_social_icon_item_icon']['alt'] . '"/></a></li>';
                        endforeach;
                    endif;
                    ?>
                </ul>


                <div class="footer-middle-right">
                    <div class="footer-award-logo">

                    </div>
                    <div class="copyright-text">
                        <?php echo wp_kses($copyright_text, drilllcorp()->kses_allowed_html(array('a'))); ?>
                    </div>
                </div>


            </div>
        </div>

        <ul class="footer-bottom-menu-list">
            <?php
            if (!empty($footer_copyright_bottom_menu)) :
                foreach ($footer_copyright_bottom_menu as $menu) :
                    echo '<li><a href=" ' . $menu['footer_copyright_bottom_menu_item_url'] . ' ">
                                                ' . $menu['footer_copyright_bottom_menu_item_title'] . '</a></li>';
                endforeach;
            endif;
            ?>
        </ul>
        <div class="footer-bottom-logo">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/footer-bottom-logo.png' ?>" alt="">
        </div>
    </div>
</div>

</div>
</div>