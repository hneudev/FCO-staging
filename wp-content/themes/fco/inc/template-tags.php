<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package FCO
 */

if ( ! function_exists( 'fco_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function fco_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Date: %s', 'post date', 'fco' ),
			'<a href="' . esc_url( get_year_link(get_the_date('Y')) ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'fco_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function fco_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'fco' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'fco_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function fco_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'fco' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'fco' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'fco' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'fco' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'fco' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'fco' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'fco_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function fco_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<figure class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;



if(! function_exists('social_share_buttons()')): 

function social_share_buttons(){
	$html = '<ul class="social-share-buttons">';
	$html .= '<li class=""><a href="">'.fco_get_icon_svg( 'social', 'linkedin', 24 ).'</a></li>';
	$html .= '<li class=""><a href="">'.fco_get_icon_svg( 'social', 'twitter', 24 ).'</a></li>';
	$html .= '<li class=""><a href="">'.fco_get_icon_svg( 'social', 'facebook', 24 ).'</a></li>';
	$html .= '</ul>';
	return $html;
}


endif;


if(! function_exists('pages_without_hero()')):
	function pages_without_hero(){
		if(is_page(array(3))) {
			return true;
		}
	}
endif;


if (!function_exists('cant_have_thumbnail')) :
    function cant_have_thumbnail() {
        if (is_home() || 'post' == get_post_type() || is_page(array('videos', 'news'))) {
            return true;  // Can't have thumbnail in these cases
        }
        return false; // Can have thumbnail everywhere else
    }
endif;

if (!function_exists('get_page_hero_title')) :
    function get_page_hero_title() {
        if (is_page('videos')) {
            return 'Our Videos';
        } elseif (is_home() || 'post' == get_post_type()) {
            return 'Our Blog';
        } else {
            return get_the_title(); // Fallback to the current page/post title
        }
    }
endif;

/* if(! function_exists('is_child_of_aftercare()')):
	function is_child_of_aftercare() {
		$parent = get_post( wp_get_post_parent_id( get_the_ID() ) );
		return ( $parent && $parent->post_name == 'aftercare' );
	}
endif; */

if (!function_exists('is_child_of_aftercare')) :

    function is_child_of_aftercare() {
        $current_post = get_post(get_the_ID());
        if ($current_post && $current_post->post_name !== 'aftercare') {
            $parent = get_post(wp_get_post_parent_id($current_post->ID));
            return ($parent && $parent->post_name === 'aftercare');
        }
        return false;
    }

endif;