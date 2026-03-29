<?php

/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package drilllcorp
 */

$drilllcorp = drilllcorp();
$post_meta = get_post_meta(get_the_ID(), 'drilllcorp_post_gallery_options', true);
$post_meta_gallery = isset($post_meta['gallery_images']) && !empty($post_meta['gallery_images']) ? $post_meta['gallery_images'] : '';
$post_single_meta = DrilllCorp_Group_Fields_Value::post_meta('blog_single_post');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-single-content-wrap'); ?>>

    <div class="entry-content">
        <?php
        echo '<h1 class="title">' . get_the_title(get_the_ID()) . '</h1>';
        the_content();
        $drilllcorp->link_pages();
        ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->