<?php
/**
 * Template for About Us page
 *
 * This template automatically displays team members after the page content.
 * Template Name: About Us Page
 *
 * @package FCO
 */

get_header(); ?>
	<main id="primary" class="site-main">
		<div class="wrap">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content/content', 'page' );

		endwhile; // End of the loop.
		
		// Automatically display team members after the page content
		if (function_exists('display_team_members_on_about_page')) {
			echo display_team_members_on_about_page();
		}
		?>
		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();