<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FCO
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (!has_post_thumbnail() && !cant_have_thumbnail()) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<?php fco_post_thumbnail(); ?>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php if (is_child_of_aftercare()): ?>
			<button class="print-button" onclick="window.print()">
				<span>Print this page</span> 
				<img src="<?php echo get_template_directory_uri(); ?>/images/print.png" alt="Print Icon">
			</button>
		<?php endif; ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
