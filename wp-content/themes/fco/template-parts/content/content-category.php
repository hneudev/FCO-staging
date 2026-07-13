<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FCO
 */

?>

<article id="post-<?php the_ID(); ?>" <?php (feat_in_cat() ? post_class('op-post sticky') : post_class('op-post')) ; ?>>
    <?php if(has_post_thumbnail()): ?>
        <div class="image-block">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>
    <div class="content-block">
        <?php
        if(get_field('post_external_source_url')):
            $post_url = esc_url(get_field('post_external_source_url'));
        else:
            $post_url = get_permalink();
        endif;
        ?>
        <?php if(feat_in_cat()): ?>
            <h2><a href="<?php echo $post_url; ?>"><?php echo get_the_title(); ?></a></h2>
        <?php else: ?>
            <h3><a href="<?php echo $post_url; ?>"><?php echo get_the_title(); ?></a></h3>
        <?php endif; ?>
        <div class="short-intro">
        <?php if(feat_in_cat()): ?>
            <h4><?php echo get_the_excerpt(); ?></h3>
        <?php else: ?>
            <p><?php echo get_the_excerpt(); ?></p>
        <?php endif; ?>
        </div>
    </div>
    <div class="meta-block">
        <div class="social-share">
            <?php echo social_share_buttons(); ?>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
