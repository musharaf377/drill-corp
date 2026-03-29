<?php

/**
 * Post Thumbnail Video
 * @package drilllcorp
 * @since 1.0.0
 */

$drilllcorp = drilllcorp();
$post_meta = get_post_meta(get_the_ID(), 'drilllcorp_post_video_options', true);
$video_url = isset($post_meta['video_url']) && $post_meta['video_url'] ? $post_meta['video_url'] : '';
$blog_single_options = DrilllCorp_Group_Fields_Value::post_meta('blog_single_post');
if (!empty($video_url)):
?>
    <div class="thumbnail">
        <?php $drilllcorp->post_thumbnail('post-thumbnail'); ?>
        <?php if (!empty($video_url)): ?>
            <div class="hover">
                <a href="<?php echo esc_url($video_url); ?>" class="video-play-btn mfp-iframe"><i class="fas fa-play"></i></a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>