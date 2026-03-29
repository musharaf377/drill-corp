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
        </div>

        <div class="footer-menu-wrapper ">
            <div class="widget_nav_menu">
                <div class="footer-menu-wrap">
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
                <div class="footer-location-wrap">
                    <?php if(!empty($footer_location)){
                        foreach ($footer_location as $location) {
                            echo '<div class="footer-single-location">
                                        <h4>' . $location['footer_location_item_title'] . '</h4>
                                        <p>' . $location['footer_location_item_desc'] . '</p>
                                        <a href="tel:' . $location['footer_location_item_phone_number'] . '">' . $location['footer_location_item_phone_number'] . '</a>
                                    </div>';
                        }
                    } 
                    ?>
                    
                </div>
            </div>
        </div>

        <div class="footer-bottom-menu">
            <div class="menu-about-menu-container">
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

                <div class="copyright-text">
                    <?php echo wp_kses($copyright_text, drilllcorp()->kses_allowed_html(array('a'))); ?>
                </div>
            </div>
        </div>
        <div class="company-deck">
            <h4 class="company-deck-link"><?php echo drilllcorp_get_svg_icon('download_arrow') ?>Company Deck</h4>
            <div class="copyright-text for-mobile">
                <?php echo wp_kses($copyright_text, drilllcorp()->kses_allowed_html(array('a'))); ?>
            </div>
            <div class="footer-bottom-logo">
                <img src="<?php echo cs_get_option('footer_bottom_logo')['url'] ?>" alt="">
            </div>
        </div>
    </div>
</div>

</div>
</div>