<?php
/**
 * Template for displaying team member archive
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">Our Team</h1>
			<?php if ( get_the_archive_description() ) : ?>
				<div class="archive-description"><?php echo wp_kses_post( get_the_archive_description() ); ?></div>
			<?php endif; ?>
		</header><!-- .page-header -->

		<div class="team-members-grid">
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('team-member'); ?>>
					
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="team-member-image">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium' ); ?>
							</a>
						</div>
					<?php endif; ?>

					<div class="team-member-content">
						<h2 class="team-member-name">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h2>
						
						<?php if ( has_excerpt() ) : ?>
							<div class="team-member-excerpt">
								<?php the_excerpt(); ?>
							</div>
						<?php endif; ?>
						
						<a href="<?php the_permalink(); ?>" class="read-more">
							Learn More About <?php the_title(); ?>
						</a>
					</div>

				</article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; ?>
		</div><!-- .team-members-grid -->

		<?php
		the_posts_navigation();

	else :
		?>

		<section class="no-results not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Nothing here', 'fco' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'No team members found.', 'fco' ); ?></p>
			</div><!-- .page-content -->
		</section><!-- .no-results -->

	<?php endif; ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();