<?php

/**
 * Post Meta Functions
 * @package drillcorp
 * @since 1.0.0
 */

$drillcorp = drillcorp();
$post_meta = Drillcorp_Group_Fields_Value::post_meta('blog_post');
?>
<div class="post-meta-wrap">
    <ul class="post-meta">
        <?php if ($post_meta['posted_by']): ?>
            <li><?php $drillcorp->posted_by(); ?></li>
        <?php endif; ?>
        <li>
            <?php
            $drillcorp->posted_on();
            ?>
        </li>
        <li>
            <?php
            $drillcorp->comment_count();
            ?>
        </li>
    </ul>
    <?php

    if (shortcode_exists('drillcorp_post_share') && $post_meta['posted_share']) {
        echo do_shortcode('[drillcorp_post_share]');
    }
    ?>
</div>