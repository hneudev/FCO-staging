<?php

/**
 * Template part for displaying video posts in the [video_list] shortcode
 */

$video_id = get_field('fco_yt_video_id');
$post_id = get_the_ID();
$unique_iframe_id = 'pop_' . esc_attr($post_id . '_' . $video_id);
?>
<article id="post-<?php echo $post_id; ?>" <?php post_class('yt-video-entry video-block'); ?> data-video-id="<?php echo esc_attr($video_id); ?>">
    <?php if ($video_id) : ?>
        <div class="yt-video">
            <div class="yt-trigger-layer" data-video-id="<?php echo esc_attr($video_id); ?>"></div>
            <div class="yt-video-popover" data-video-id="<?php echo esc_attr($video_id); ?>">
                <?php
                    $video_id = get_field('fco_yt_video_id');
                    $post_id = get_the_ID();
                    $unique_iframe_id = 'pop_' . esc_attr($post_id . '_' . $video_id);
                    $origin = rtrim(home_url(), '/');
                    $src = "https://www.youtube.com/embed/" . esc_attr($video_id) . "?enablejsapi=1&origin=" . urlencode($origin);
                ?>
                <iframe id="<?php echo $unique_iframe_id; ?>"
                    src="<?php echo $src; ?>"
                    title="YouTube Video Player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
                <svg class="close-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" stroke="#fff" stroke-width="1.5"></circle>
                    <path d="M14.5 9.5L9.5 14.5M9.5 9.5L14.5 14.5" stroke="#F70007" stroke-width="1.5" stroke-linecap="round"></path>
                    <title>Close</title>
                </svg>
            </div>
        </div>
        <div class="video-description">
            <p class="video-description-text"><?php echo get_the_excerpt();?></p>
        </div>
    <?php else : ?>
        <p>Video unavailable.</p>
    <?php endif; ?>
</article>