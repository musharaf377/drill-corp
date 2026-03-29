<?php

/**
 * Post Thumbnail Functions
 * @package drilllcorp
 * @since 1.0.0
 */

$drilllcorp = drilllcorp();
if (has_post_thumbnail()): ?>
    <div class="thumbnail">
        <?php $drilllcorp->post_thumbnail('post-thumbnail'); ?>
    </div>
<?php endif; ?>