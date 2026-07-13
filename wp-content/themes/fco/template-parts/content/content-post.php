<?php
/**
 * Template part for displaying single blog post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FCO
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		<div class="post-meta">
			<?php $up_img = get_field('wp_user_profile_image', 'user_'.get_the_author_meta('ID'));
			if(!empty($up_img)): ?>
			<img src="<?php echo esc_url($up_img['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($up_img['alt']); ?>">
			<?php endif ?>
			<span>By <?php echo get_the_author().' | '.get_the_date("m.d.Y"); ?></span>
		</div>
	</header><!-- .entry-header -->
	<?php fco_post_thumbnail(); ?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-${ID} -->
