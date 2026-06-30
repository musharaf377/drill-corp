<?php

/**
 * Theme Default Header
 * @package drillcorp
 * @since 1.0.0
 */
?>

<nav class="navbar navbar-area navbar-expand-lg">
    <div class="container custom-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <?php
                $header_one_logo = cs_get_option('header_one_logo');
                if (has_custom_logo() && (empty($header_one_logo) || empty($header_one_logo['id']))) {
                    the_custom_logo();
                } elseif (! empty($header_one_logo) && ! empty($header_one_logo['id'])) {
                    printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_one_logo['url'], (!empty($header_one_logo['alt']) ? $header_one_logo['alt'] : get_bloginfo('name')));
                } else {
                    printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                }
                ?>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#drillcorp_main_menu"
                aria-expanded="false" aria-label="<?php  //esc_attr__('Toggle navigation', 'drillcorp') ?>">
                <span class="navbar-toggler-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6H20M4 12H20M4 18H20" stroke="#0E0E0F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>       
                </span>
            </button>
        </div>

        <div id="drillcorp_main_menu" class="collapse navbar-collapse">
            <?php
            // Custom walker to add dropdown icons
            class Drillcorp_Nav_Walker extends Walker_Nav_Menu {
                function start_lvl(&$output, $depth = 0, $args = null) {
                    $output .= '<ul class="sub-menu">';
                }
                
                function end_lvl(&$output, $depth = 0, $args = null) {
                    $output .= '</ul>';
                }
                
                function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                    $classes = empty($item->classes) ? array() : (array) $item->classes;
                    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
                    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
                    
                    $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
                    $id = $id ? ' id="' . esc_attr($id) . '"' : '';
                    
                    $output .= '<li' . $id . $class_names .'>';
                    
                    $attributes = ! empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) .'"' : '';
                    $attributes .= ! empty($item->target) ? ' target="' . esc_attr($item->target) .'"' : '';
                    $attributes .= ! empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) .'"' : '';
                    $attributes .= ! empty($item->url) ? ' href="' . esc_attr($item->url) .'"' : '';
                    
                    $item_output = (isset($args->before) && is_scalar($args->before)) ? $args->before : '';
                    $item_output .= '<a'. $attributes .'>';
                    $item_output .= (isset($args->link_before) && is_scalar($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) && is_scalar($args->link_after) ? $args->link_after : '');
                    
                    // Add dropdown icon for items with children
                    if (in_array('menu-item-has-children', $classes)) {
                        $item_output .= '<svg class="dropdown-icon" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>';
                    }
                    
                    $item_output .= '</a>';
                    $item_output .= (isset($args->after) && is_scalar($args->after)) ? $args->after : '';
                    
                    $output .= $item_output;
                }
                
                function end_el(&$output, $item, $depth = 0, $args = null) {
                    $output .= '</li>';
                }
            }
            
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'menu_class'     => 'navbar-nav',
                'container'      => false,
                'walker'         => new Drillcorp_Nav_Walker(),
            ));
            ?>
        </div>

        <!-- Language Toggle -->
        <?php
        $en_url      = cs_get_option('en_site_url');
        $ar_url      = cs_get_option('ar_site_url');
        $en_url      = !empty($en_url) ? $en_url : 'https://drillcorpsaudi.com/';
        $ar_url      = !empty($ar_url) ? $ar_url : 'https://drillcorpsaudi.com/ar/';
        $current_url = home_url('/');
        $is_arabic   = (rtrim($current_url, '/') === rtrim($ar_url, '/'));

        $en_flag_icon = cs_get_option('en_flag_icon');
        $ar_flag_icon = cs_get_option('ar_flag_icon');
        $en_flag_url  = !empty($en_flag_icon['url']) ? $en_flag_icon['url'] : '';
        $ar_flag_url  = !empty($ar_flag_icon['url']) ? $ar_flag_icon['url'] : '';

        $active_label   = $is_arabic ? 'AR' : 'EN';
        $active_flag_url = $is_arabic ? $ar_flag_url : $en_flag_url;
        $active_flag_alt = $is_arabic ? 'Arabic' : 'English';
        ?>
        <div class="lang-toggle-wrapper">
            <button class="lang-toggle-btn" id="langToggleBtn" aria-haspopup="true" aria-expanded="false">
                <svg class="lang-chevron" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="lang-label"><?php echo esc_html($active_label); ?></span>
                <?php if ($active_flag_url) : ?>
                    <span class="lang-flag"><img src="<?php echo esc_url($active_flag_url); ?>" alt="<?php echo esc_attr($active_flag_alt); ?>" width="28" height="28" /></span>
                <?php endif; ?>
            </button>
            <ul class="lang-dropdown" id="langDropdown" role="menu">
                <li role="menuitem">
                    <a href="<?php echo esc_url($en_url); ?>">
                        <?php if ($en_flag_url) : ?>
                            <img src="<?php echo esc_url($en_flag_url); ?>" alt="English" width="20" height="20" />
                        <?php endif; ?>
                        EN
                    </a>
                </li>
                <li role="menuitem">
                    <a href="<?php echo esc_url($ar_url); ?>">
                        <?php if ($ar_flag_url) : ?>
                            <img src="<?php echo esc_url($ar_flag_url); ?>" alt="Arabic" width="20" height="20" />
                        <?php endif; ?>
                        AR
                    </a>
                </li>
            </ul>
        </div>

        <div class="header-btn">
            <a href="<?php echo cs_get_option('header_btn_url'); ?>" target="_blank"><?php echo cs_get_option('header_btn_text'); ?></a>
        </div>
        
    </div>
</nav>
