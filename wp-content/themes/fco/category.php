<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FCO
 */

get_header();
?>

	<main id="primary" class="site-main">
	<div class="wrap">
        <header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title archive-title h2">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->
        <?php 
            $post_arguments = array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'ignore_sticky_posts' => 1,
                'cat' => get_queried_object()->term_id,                
                // 'meta_key'		=> 'featured_in_category',
                // 'meta_value'	=> 'Yes'
                'meta_key' => 'featured_in_category',
                );
            $displayed_posts = array();
            //echo var_dump($displayed_posts);
            $query = new WP_Query( $post_arguments );
            if ( $query->have_posts() ) :
		?>
            <div class="posts-set-archive archive-section featured-post-block">
                <?php while( $query->have_posts() ) : $query->the_post(); ?>
                    <?php get_template_part( 'template-parts/content', 'category'); ?>
                    <?php echo '<hr class="sticky-post-seperator">'; ?>
					<?php array_push($displayed_posts, get_the_ID()); ?>
                <?php endwhile; ?>
            </div>
		<?php endif; ?>

        <?php 
            $post_arguments = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'cat' => get_queried_object()->term_id,
                'post__not_in' => $displayed_posts,
                );
            $displayed_posts = array();
            //echo var_dump($displayed_posts);
            $query = new WP_Query( $post_arguments );
            if ( $query->have_posts() ) :
		?>
            <div class="posts-set-archive archive-section">
                <?php while( $query->have_posts() ) : $query->the_post(); ?>
                    <?php get_template_part( 'template-parts/content', 'category'); ?>
                <?php endwhile; ?>
            </div>
		<?php endif; ?>

	</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
