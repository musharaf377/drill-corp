<?php

/**
 * Post Thumbnail Functions
 * @package drillcorp
 * @since 1.0.0
 */

$drillcorp = drillcorp();
if (has_post_thumbnail()): ?>
    <div class="thumbnail">
        <?php $drillcorp->post_thumbnail('post-thumbnail'); ?>
    </div>
<?php endif; ?>