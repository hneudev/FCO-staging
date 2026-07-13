<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FCO
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/lhz2aja.css" media="print" onload="this.media='all'">
	<noscript><link rel="stylesheet" href="https://use.typekit.net/lhz2aja.css"></noscript>
	<?php if (wp_is_mobile()): /* Load mobile-specific FCP styles */ ?>
		<style>
			#masthead {
				position: relative;
				overflow: hidden;
				height: auto;
				border-top: 10px solid var(--btn-color);
			}

			.site-branding {
				position: relative;
				z-index: 3;
			}

			.site-branding .wrap {
				display: grid;
				grid-template-columns: 260px auto;
				padding: 24px 0;
			}

			#site-logo img {
				width: 100%;
				max-width: initial;
			}

			#masthead .sticky-post-seperator {
				margin: 50px 0 0;
			}

			#hero {
				position: relative;
				overflow: hidden;
				width: 100%;
				height: 400px;
				color: #fff;
				z-index: 2;
			}
			
			/* Blog pages height reduction - 30% smaller */
			body.home #hero,
			body.single-post #hero,
			body.single-video #hero,
			body.page-id-1336 #hero,
			body[class*="page-"] #hero[data-page-slug="videos"] {
				height: 280px; /* 400px * 0.7 = 280px */
			}

			#hero .wrap {
				overflow: initial;
				position: absolute;
				color: #fff;
				top: 50%;
				transform: translateY(-50%);
				left: 5%;
				right: 5%;
				z-index: 2;
			}

			.home .hero-text-container {
				display: grid;
				grid-template-columns: repeat(2, 1fr);
				position: relative;
				top: initial;
				transform: none;
			}

			.home .hero-text {
				grid-column: span 2;
				padding: 0;
			}

			.home .hero-text p.signup a {
				display: block;
				max-width: 200px;
				padding: 10px 20px;
				height: 48px !important;
				border: 1px solid #fff;
				color: #fff;
				background-color: transparent;
				border-radius: 16px;
				text-decoration: none;
				text-align: center;
				font-family: lft-etica, sans-serif;
				font-weight: 700;
				font-size: 18px;
				line-height: 26px !important;
			}

			#masthead figure.post-thumbnail {
				position: fixed;
				width: 100%;
				height: 94vw;
				margin: 0;
				top: 0;
				z-index: 0;
			}

			#hero .site-featured-image {
				position: relative;
				width: 100%;
				height: 100%;
				margin: 0;
				z-index: 1;
			}
			#hero .site-featured-image .post-thumbnail{
				height: 100%;
			}
			#hero .site-featured-image .post-thumbnail img{
				width: 100%;
				height: 100%;
				object-fit: cover;
				object-position: center;
			}
			#hero .featured-walled-video {
				position: relative;
				height: 100%;
			}

			#hero video {
				width: 100%;
				height: 100%;
				object-fit: cover;
				vertical-align: middle;
			}
			.svg-marker{
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: end;
				align-items: end;
				background: var(--main-bg);
			}
			.svg-marker svg{
				width: 100px;
				height: 100px;
				position: absolute;
				top: initial;
				bottom: -10px;
				right: 0;
			}
			/* Tablet and above (min-width: 768px) */
			@media (min-width: 768px) {
				.home .hero-text-container {
					grid-template-columns: repeat(12, 1fr);
					top: 50%;
					transform: translateY(-50%);
				}
				
				.home .hero-text {
					grid-column: span 7;
					padding-right: 30px;
				}

				.site-branding .wrap {
					grid-template-columns: 220px auto;
					padding: 30px 0;
				}

				.home #hero {
					height: calc(100vh - 120px);
				}
				
				/* Blog pages tablet height reduction */
				body.home #hero,
				body.single-post #hero,
				body.single-video #hero,
				body.page-id-1336 #hero {
					height: calc((100vh - 120px) * 0.7); /* 30% reduction */
				}
			}

			/* Desktop and above (min-width: 1024px) */
			@media (min-width: 1024px) {
				#hero {
					height: auto;
					aspect-ratio: 16 / 9;
				}
				
				/* Blog pages desktop height reduction */
				body.home #hero,
				body.single-post #hero,
				body.single-video #hero,
				body.page-id-1336 #hero {
					height: auto;
					aspect-ratio: 16 / 12.85; /* Adjusted ratio for 30% height reduction */
				}
				
				.site-branding .wrap {
					grid-template-columns: 260px auto;
					padding: 30px 0;
				}

				.home .hero-text-container {
					grid-template-columns: repeat(12, 1fr);
					grid-column-gap: 30px;
				}
			}

			/* Special cases for smaller resolutions */
			@media (max-width: 480px) {
				#hero {
					height: 200px;
				}
				
				/* Blog pages mobile height reduction */
				body.home #hero,
				body.single-post #hero,
				body.single-video #hero,
				body.page-id-1336 #hero {
					height: 140px; /* 200px * 0.7 = 140px */
				}
				
				#hero.short-hero {
					height: 160px;
				}
				
				/* Blog pages mobile short-hero height reduction */
				body.home #hero.short-hero,
				body.single-post #hero.short-hero,
				body.single-video #hero.short-hero,
				body.page-id-1336 #hero.short-hero {
					height: 112px; /* 160px * 0.7 = 112px */
				}
			}
		</style>
		<?php else: /* Load desktop-specific FCP styles */ ?>
			<style>
				#masthead {
					position: relative;
					overflow: hidden;
					height: auto;
					border-top: 10px solid var(--btn-color);
				}

				.site-branding {
					position: relative;
					z-index: 3;
				}

				.site-branding .wrap {
					display: grid;
					grid-template-columns: 260px auto;
					padding: 24px 0;
				}

				#site-logo img {
					width: 100%;
					max-width: initial;
				}

				#masthead .sticky-post-seperator {
					margin: 50px 0 0;
				}

				#hero {
					position: relative;
					overflow: hidden;
					width: 100%;
					height: 400px;
					color: #fff;
					z-index: 2;
				}
				
				/* Blog pages height reduction - 30% smaller */
				body.home #hero,
				body.single-post #hero,
				body.single-video #hero,
				body.page-id-1336 #hero {
					height: 280px; /* 400px * 0.7 = 280px */
				}

				#hero.short-hero {
					height: 220px;
				}
				
				/* Blog pages short-hero height reduction */
				body.home #hero.short-hero,
				body.single-post #hero.short-hero,
				body.single-video #hero.short-hero,
				body.page-id-1336 #hero.short-hero {
					height: 154px; /* 220px * 0.7 = 154px */
				}
				
				#hero .wrap {
					overflow: initial;
					position: absolute;
					color: #fff;
					top: 50%;
					transform: translateY(-50%);
					left: 5%;
					right: 5%;
					z-index: 2;
				}

				.home .hero-text-container {
					display: grid;
					grid-template-columns: repeat(2, 1fr);
					position: relative;
					top: initial;
					transform: none;
				}

				.home .hero-text {
					grid-column: span 2;
					padding: 0;
				}

				.home .hero-text p.signup a {
					display: block;
					max-width: 200px;
					padding: 10px 20px;
					height: 48px !important;
					border: 1px solid #fff;
					color: #fff;
					background-color: transparent;
					border-radius: 16px;
					text-decoration: none;
					text-align: center;
					font-family: lft-etica, sans-serif;
					font-weight: 700;
					font-size: 18px;
					line-height: 26px !important;
				}

				#masthead figure.post-thumbnail {
					position: fixed;
					width: 100%;
					height: 94vw;
					margin: 0;
					top: 0;
					z-index: 0;
				}

				#hero .site-featured-image {
					position: relative;
					width: 100%;
					height: 100%;
					margin: 0;
					z-index: 1;
				}

				#hero .featured-walled-video {
					position: relative;
					height: 100%;
				}

				#hero video {
					width: 100%;
					height: 100%;
					object-fit: cover;
					vertical-align: middle;
				}
				.svg-marker{
					width: 100%;
					height: 100%;
					display: flex;
					justify-content: end;
					align-items: end;
					background: var(--main-bg);
				}
				.svg-marker svg{
					position: absolute;
					top: initial;
					bottom: -20px;
					right: 0;
				}

				/* Tablet and above (min-width: 768px) */
				@media (min-width: 768px) {
					.home .hero-text-container {
						grid-template-columns: repeat(12, 1fr);
						top: 50%;
						transform: translateY(-50%);
					}
					
					.home .hero-text {
						grid-column: span 7;
						padding-right: 30px;
					}

					.site-branding .wrap {
						grid-template-columns: 220px auto;
						padding: 30px 0;
					}

					.home #hero {
						height: calc(100vh - 120px);
					}
				}

				/* Desktop and above (min-width: 1024px) */
				@media (min-width: 1024px) {
					#hero {
						/* height: auto;
						aspect-ratio: 16 / 9; */
					}

					#hero .post-thumbnail img{
						position: absolute;
						width: 100%;
						height: auto;
						top: 50%;
						transform: translateY(-50%);
					}
					
					.site-branding .wrap {
						grid-template-columns: 260px auto;
						padding: 30px 0;
					}

					.home .hero-text-container {
						grid-template-columns: repeat(12, 1fr);
						grid-column-gap: 30px;
					}
				}

				/* Large desktops (min-width: 1200px) */
				@media (min-width: 1200px) {
					.home #hero {
						height: calc(100vh - 120px);
					}

					#hero .wrap {
						top: 50%;
						transform: translate(0, -50%);
					}
				}
			</style>
		<?php endif; ?>
	<?php wp_head(); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N2MTWZK');</script>
<!-- End Google Tag Manager -->
<!-- Trustindex Certification Script -->
<script defer async src='https://cdn.trustindex.io/loader-cert.js?c14847655956574ac1662f54438'></script>
<meta name="msvalidate.01" content="2E054BE9A48134928AA4B47E4EADFD0E" />
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N2MTWZK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>
<header id="masthead" class="site-header">
	<div class="site-branding">
		<div class="wrap">
			<div id="site-logo">
				<?php the_custom_logo(); ?>
			</div>
			<div class="toggle-menu">
				<div class="hamburger">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			<?php endif; ?>
		</div>
	</div><!-- .site-branding -->
</header><!-- #masthead -->
<?php if(should_display_hero_section()): ?>
	<div id="hero" class="<?php echo is_404() ? 'short-hero' : ''; ?>">
			<?php if ((is_home() || is_singular('post')) && is_active_sidebar('blog-hero-text')): ?>
				<!-- Widget images will be moved here by JavaScript if they exist -->
				<!-- Default colored background when no widget images -->
				<div class="blog-hero-default-bg">
					<!-- This will be replaced by widget image if available -->
				</div>
			<?php elseif ((is_home() || is_singular('post'))): ?>
				<!-- No widget active - show colored background -->
				<div class="blog-hero-default-bg">
					<!-- Default colored background for blog pages -->
				</div>
			<?php elseif (is_page('videos')): ?>
				<!-- Videos page - show blue background with accent circles -->
				<div class="blog-hero-default-bg">
					<!-- Default colored background for videos page -->
				</div>
			<?php elseif (has_post_thumbnail() && !is_404()): ?>
				<div class="site-featured-image">
					<div class="post-thumbnail">
						<?php fco_responsive_post_thumbnail( get_the_ID(), 'full', array( 'loading' => 'eager', 'class' => 'post-thumbnail-img' ) ); ?>
					</div>
				</div>
			<?php elseif (function_exists('should_show_default_hero_bg') && should_show_default_hero_bg()): ?>
				<?php $default_bg = get_default_hero_background(); ?>
				<?php if ($default_bg): ?>
					<div class="site-featured-image">
						<div class="post-thumbnail">
							<img src="<?php echo esc_url($default_bg); ?>" alt="<?php echo esc_attr(get_page_hero_title()); ?>" />
						</div>
					</div>
				<?php else: ?>
					<div class="svg-marker">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
							<style type="text/css">
								.st0{fill:#CCCCCC;}
							</style>
							<polygon class="st0" points="100,0 100,100 0,100"/>
						</svg>
					</div>
				<?php endif; ?>
			<?php else: ?>
				<div class="svg-marker">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
						<style type="text/css">
							.st0{fill:#CCCCCC;}
						</style>
						<polygon class="st0" points="100,0 100,100 0,100"/>
					</svg>
				</div>
			<?php endif; ?>
			
			<div class="wrap">
				<div class="hero-text-container">
					<?php if (is_active_sidebar('hero-overlay-text') && is_front_page()) : ?>
						<div class="hero-text">
							<?php dynamic_sidebar('hero-overlay-text'); ?>
						</div>
					<?php elseif ((is_home() || is_singular('post'))) : ?>
						<div class="hero-text">
							<?php if ( ( is_front_page() && is_home() ) || is_singular('post') ) : ?>
								<h1 class="entry-title"><?php echo esc_html( get_page_hero_title() ?: get_the_title() ); ?></h1>
							<?php else : ?>
								<h2 class="entry-title"><?php echo esc_html( get_page_hero_title() ?: get_the_title() ); ?></h2>
							<?php endif; ?>
							<?php if (is_active_sidebar('blog-hero-text')) : ?>
								<div id="blog-hero-text">
									<?php dynamic_sidebar('blog-hero-text'); ?>
								</div>
							<?php endif; ?>
						</div>
					<?php elseif (is_page('videos')) : ?>
						<div class="hero-text">
							<?php if ( ( is_front_page() && is_home() ) || is_singular('post') ) : ?>
								<h1 class="entry-title"><?php the_title(); ?></h1>
							<?php else : ?>
								<h2 class="entry-title"><?php the_title(); ?></h2>
							<?php endif; ?>
						</div>
					<?php else : ?>
						<div class="hero-text">
							<?php if ( is_404() ) : ?>
								<h1 class="entry-title">404 Error</h1>
							<?php elseif ( function_exists( 'get_page_hero_title' ) ) : ?>
								<h2 class="entry-title"><?php echo esc_html( get_page_hero_title() ); ?></h2>
							<?php else : ?>
								<h2 class="entry-title"><?php the_title(); ?></h2>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
	</div>
<?php endif; ?>