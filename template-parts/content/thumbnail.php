<?php

/**
 * Post Thumbnail 
 * @package drilllcorp
 * @since 1.0.0
 */
?>

<div class="thumbnail">
    <?php
    if (has_post_thumbnail() && get_post_type() == 'post') {
        drilllcorp()->post_thumbnail('post-thumbnail');
    }
    ?>
</div>