<?php
/**
 * Template for displaying single team member posts
 */

get_header();
?>

<main id="primary" class="site-main single-team-page">

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('single-team-member'); ?>>
			
			<!-- Hero Section -->
			<div class="team-member-hero">
				<div class="team-hero-content">
					<div class="team-hero-image">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'large', array('class' => 'team-member-photo') ); ?>
						<?php else : ?>
							<div class="team-member-placeholder">
								<i class="dashicons dashicons-admin-users"></i>
								<span>No Photo Available</span>
							</div>
						<?php endif; ?>
					</div>
					
					<div class="team-hero-info">
						<header class="team-member-header">
							<?php the_title( '<h1 class="team-member-name">', '</h1>' ); ?>
							
							<?php 
							$position = get_post_meta( get_the_ID(), 'position', true );
							if ( $position ) : ?>
								<p class="team-member-position"><?php echo esc_html( $position ); ?></p>
							<?php endif; ?>
						</header>
						
						<div class="team-member-bio-summary">
							<?php 
							$bio = get_post_meta( get_the_ID(), 'bio', true );
							if ( $bio ) : ?>
								<div class="team-bio-excerpt">
									<?php echo wp_kses_post( wp_trim_words( $bio, 30, '...' ) ); ?>
								</div>
							<?php endif; ?>
						</div>
						
						<!-- Contact Info -->
						<?php 
						$email = get_post_meta( get_the_ID(), 'email', true );
						$phone = get_post_meta( get_the_ID(), 'phone', true );
						$linkedin = get_post_meta( get_the_ID(), 'linkedin', true );
						
						if ( $email || $phone || $linkedin ) : ?>
							<div class="team-contact-quick">
								<?php if ( $email ) : ?>
									<a href="mailto:<?php echo esc_attr( $email ); ?>" class="contact-email">
										<i class="dashicons dashicons-email"></i>
										<span><?php echo esc_html( $email ); ?></span>
									</a>
								<?php endif; ?>
								
								<?php if ( $phone ) : ?>
									<a href="tel:<?php echo esc_attr( $phone ); ?>" class="contact-phone">
										<i class="dashicons dashicons-phone"></i>
										<span><?php echo esc_html( $phone ); ?></span>
									</a>
								<?php endif; ?>
								
								<?php if ( $linkedin ) : ?>
									<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" class="contact-linkedin">
										<i class="dashicons dashicons-linkedin"></i>
										<span>LinkedIn Profile</span>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<!-- Main Content -->
			<div class="team-member-content">
				<div class="team-content-grid">
					
					<!-- Bio Section -->
					<?php if ( $bio ) : ?>
						<section class="team-detail-section team-bio-section">
							<h2 class="section-title">
								<i class="dashicons dashicons-admin-users"></i>
								About <?php echo get_the_title(); ?>
							</h2>
							<div class="team-bio-full">
								<?php echo wp_kses_post( wpautop( $bio ) ); ?>
							</div>
						</section>
					<?php endif; ?>

					<!-- WordPress Content (if any) -->
					<?php if ( get_the_content() ) : ?>
						<section class="team-detail-section team-additional-content">
							<h2 class="section-title">
								<i class="dashicons dashicons-admin-page"></i>
								Additional Information
							</h2>
							<div class="entry-content">
								<?php
								the_content();

								wp_link_pages(
									array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fco' ),
										'after'  => '</div>',
									)
								);
								?>
							</div>
						</section>
					<?php endif; ?>

					<!-- Custom Fields Section -->
					<?php 
					$specialties = get_post_meta( get_the_ID(), 'specialties', true );
					$education = get_post_meta( get_the_ID(), 'education', true );
					$experience = get_post_meta( get_the_ID(), 'experience', true );
					$certifications = get_post_meta( get_the_ID(), 'certifications', true );
					
					if ( $specialties || $education || $experience || $certifications ) : ?>
						<section class="team-detail-section team-professional-info">
							<h2 class="section-title">
								<i class="dashicons dashicons-awards"></i>
								Professional Information
							</h2>
							
							<div class="professional-info-grid">
								<?php if ( $specialties ) : ?>
									<div class="info-item">
										<h3>Specialties</h3>
										<p><?php echo esc_html( $specialties ); ?></p>
									</div>
								<?php endif; ?>
								
								<?php if ( $education ) : ?>
									<div class="info-item">
										<h3>Education</h3>
										<p><?php echo esc_html( $education ); ?></p>
									</div>
								<?php endif; ?>
								
								<?php if ( $experience ) : ?>
									<div class="info-item">
										<h3>Experience</h3>
										<p><?php echo esc_html( $experience ); ?></p>
									</div>
								<?php endif; ?>
								
								<?php if ( $certifications ) : ?>
									<div class="info-item">
										<h3>Certifications</h3>
										<p><?php echo esc_html( $certifications ); ?></p>
									</div>
								<?php endif; ?>
							</div>
						</section>
					<?php endif; ?>

				</div>
			</div>

			<!-- Back to Team Button -->
			<div class="team-navigation">
				<a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>" class="back-to-team-btn">
					<i class="dashicons dashicons-arrow-left-alt"></i>
					Back to Our Team
				</a>
			</div>

		</article><!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php
get_footer();