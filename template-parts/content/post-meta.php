<?php

/**
 * Post Meta Functions
 * @package drilllcorp
 * @since 1.0.0
 */

$drilllcorp = drilllcorp();
$post_meta = DrilllCorp_Group_Fields_Value::post_meta('blog_post');
?>
<div class="post-meta-wrap">
    <ul class="post-meta">
        <?php if ($post_meta['posted_by']): ?>
            <li><?php $drilllcorp->posted_by(); ?></li>
        <?php endif; ?>
        <li>
            <?php
            $drilllcorp->posted_on();
            ?>
        </li>
        <li>
            <?php
            $drilllcorp->comment_count();
            ?>
        </li>
    </ul>
    <?php

    if (shortcode_exists('drilllcorp_post_share') && $post_meta['posted_share']) {
        echo do_shortcode('[drilllcorp_post_share]');
    }
    ?>
</div>