<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package FCO
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function fco_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'fco_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function fco_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'fco_pingback_header' );


// /**
//  * Gets the SVG code for a given icon.
//  *
//  *
//  * @param string $group The icon group.
//  * @param string $icon  The icon.
//  * @param int    $size  The icon size in pixels.
//  * @return string
//  */
// function fco_get_icon_svg( $group, $icon, $size = 24 ) {
// 	return FCO_SVG_Icons::get_svg( $group, $icon, $size );
// }

/**
 * SVG icons related functions
 *
 * @package WordPress
 * @subpackage FCO
 * @since 1.0.0
 */

/**
 * Gets the SVG code for a given icon.
 */
function fco_get_icon_svg( $icon, $size = 24 ) {
	return FCO_SVG_Icons::get_svg( 'ui', $icon, $size );
}

/**
 * Gets the SVG code for a given social icon.
 */
function fco_get_social_icon_svg( $icon, $size = 24 ) {
	return FCO_SVG_Icons::get_svg( 'social', $icon, $size );
}

/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 */
function fco_get_social_link_svg( $uri, $size = 24 ) {
	return FCO_SVG_Icons::get_social_link_svg( $uri, $size );
}

/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function fco_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' === $args->theme_location ) {
		$svg = fco_get_social_link_svg( $item->url, 40 );
		if ( empty( $svg ) ) {
			$svg = fco_get_icon_svg( 'link' );
		}
		$item_output = str_replace( $args->link_after, '</span>' . $svg, $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'fco_nav_menu_social_icons', 10, 4 );
