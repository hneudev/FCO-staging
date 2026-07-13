<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FCO
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="featured-image">
		<?php if(has_post_thumbnail()): ?>
			<figure class="post-thumbnail">
				<?php fco_post_thumbnail('full'); ?>
			</figure><!-- .post-thumbnail -->
		<?php else: ?>
			<figure class="fco-circles-thumbnail ">
				<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1"><img src="<?php echo get_template_directory_uri(); ?>/images/fco-accent-circles.png" alt=""></a>
			</figure><!-- .post-thumbnail -->
		<?php endif;?>
	</div>
	<div class="post-header">
		<h4 class="post-title"><a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1"><?php echo get_the_title(); ?></a></h4>
		<div class="post-meta">
			<?php $up_img = get_field('wp_user_profile_image', 'user_'.get_the_author_meta('ID'));
			if(!empty($up_img)): ?>
			<img src="<?php echo esc_url($up_img['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($up_img['alt']); ?>">
			<?php endif ?>
			<span>By <?php echo get_the_author().' | '.get_the_date("m.d.Y"); ?></span>
		</div>
	</div>
	<div class="post-content">
		<?php the_excerpt(); ?>
		<p class="more"><a href="<?php echo get_the_permalink(); ?>" class="learn-more">Read More</a></p>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
