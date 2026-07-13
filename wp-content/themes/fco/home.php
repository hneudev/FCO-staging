<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FCO
 */

get_header();
?>
<div id="page" class="site">
  
	<main id="primary" class="site-main">
        <div class="wrap">
            <?php if ( have_posts() ) : ?>
                <div class="posts-archive-block">
                <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content/content', 'home' );
                    endwhile;
                ?>
                </div> <!-- .post-archive -->
            <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
            <?php endif; ?>
        </div>
	</main><!-- #main -->
</div><!-- #page -->

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
