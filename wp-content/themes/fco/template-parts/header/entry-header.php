<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage K2Foundation_HeartHook
 * @since 1.0.0
 */

$discussion = ! is_page() && k2foundation_hearthook_can_show_post_thumbnail() ? k2foundation_hearthook_get_discussion_data() : null; ?>

<?php
	if(!is_page(array(339, 91, 100, 103, 576, 640, 435))):
		if(is_page(array(263, 283, 269, 279, 275, 497, 520, 526, 506, 533))):
			echo '<h1 class="entry-title">Donate</h1>';
		else:
			the_title( '<h1 class="entry-title">', '</h1>' );
		endif;
	endif;
?>
