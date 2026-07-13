<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package FCO
 */

get_header();
?>

	<main id="primary" class="site-main <?php echo get_post_type(); ?>">
		<div class="wrap">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', get_post_type());

			endwhile; // End of the loop.
			?>
		</div>
	</main><!-- #main -->

<!-- Trustindex Google Reviews Section -->
<div id="home-testimonials" class="homepage-section trustindex-section">
	<div class="wrap">
		<div class="trustindex-container">
			<?php echo do_shortcode('[trustindex data-widget-id=401c9e955710574b9c46ad26026]'); ?>
		</div>
	</div>
</div>

<?php
get_sidebar();
get_footer();
