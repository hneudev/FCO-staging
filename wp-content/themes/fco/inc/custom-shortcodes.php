<?php
/**
 * Custom Shortcodes for this theme
 *
 * 
 * @package FCO
 * 
 * 
 */


//  Copyright Shortcode

function copyright_shortcode($atts, $content = null){

	$html = '<p>Copyright © '.date("Y"). $content.'. All Rights Reserved.</p>';
	return $html;

}
add_shortcode( 'copyright', 'copyright_shortcode' );



//  Services Archive Shortcode

function services_block_shortcode($atts){
	if ( ! is_array( $atts ) ) {
		$atts = [];
	}
	$atts = array_change_key_case( (array) $atts, CASE_LOWER );
	extract( shortcode_atts( array (
        'total' => 4,
        'skip' => 0,
    ), $atts ) );

	$html = '';

	$query = new WP_Query(
		array(
			'post_type' => 'services',
			'posts_per_page' => $total,
			'offset' 	=> $skip,
			'orderby'   => 'post__in',
        	'post__in'  => array(116, 459, 791, 146, 44, 41, 45, 152, 46, 959),
		)
	);
	if ( $query->have_posts() ) :
		$html .= '<div class="services-archive-block">';
			//$html .= '<hr class="sticky-post-seperator">';
		while( $query->have_posts() ) : $query->the_post();
            $html .= '<div class="fco-service">';
            $html .= '<div class="image-block">';
			if(get_field('secondary_service_post_image')):
				$service_sec_img = get_field('secondary_service_post_image');
				$html .= '<img src="'.esc_url($service_sec_img['sizes']['medium_large']).'" alt="'.esc_attr($service_sec_img['alt']).'">';
			else:
				$html .= get_the_post_thumbnail($query->post->ID,'medium_large');
			endif;
			$html .= '</div>';
			$html .= '<div class="content-block"><div class="content">';
			if(is_front_page()):
			//$html .= '<h2 class="block-title">The Latest:</h2>';
			endif;
			if(get_field('post_external_source_url')):
                $post_url = esc_url(get_field('post_external_source_url'));
            else:
                $post_url = get_permalink();
            endif;
			$html .= '<h4 class="service-title">'.get_the_title().'</h4>';
            $html .= '<div class="short-intro"><p>'.get_the_excerpt().'</p></div>';
            $html .= '<div class="meta"><p><a href="'. $post_url .'" class="link-button">Learn More</a></p></div>';
			$html .= '</div></div></div>';
			endwhile;
		$html .= '</div>';
	endif; wp_reset_query();
	

	return $html;

}
add_shortcode( 'services', 'services_block_shortcode' );


//  FCO Team Shortcode

function team_block_shortcode($atts, $content = null){

	$html = '';

	$query = new WP_Query(
		array(
			'post_type' => 'team,',
			'posts_per_page' => -1,
			'orderby'  => 'menu_order',
		)
	);
	if ( $query->have_posts() ) :
		$html .= '<div class="fco-team-block">';
			//$html .= '<hr class="sticky-post-seperator">';
		while( $query->have_posts() ) : $query->the_post();
            $html .= '<div class="team-member">';
            $html .= '<div class="image-block">';
			if(get_field('secondary_service_post_image')):
				$service_sec_img = get_field('secondary_service_post_image');
				$html .= '<img src="'.esc_url($service_sec_img['url']).'" alt="'.esc_attr($service_sec_img['alt']).'">';
			else:
				$html .= get_the_post_thumbnail();
			endif;
			$html .= '</div>';
			$html .= '<div class="content-block"><div class="content">';
			$html .= '<h4 class="member-name">'.get_the_title().'</h4>';
            $html .= '<div class="member-bio">';
			ob_start();
			$html .= the_content();
			$html .= ob_get_clean();
			$html .='</div>';
			$html .= '</div></div></div>';
			endwhile;
		$html .= '</div>';
	endif; wp_reset_query();
	

	return $html;

}
add_shortcode( 'fco-team', 'team_block_shortcode' );


function aftercare_child_pages_shortcode($atts) {
    $atts = shortcode_atts(array(
        'total' => -1,
        'skip'  => 0
    ), $atts, 'aftercare_child_pages');

    $aftercare_page = get_page_by_path('aftercare'); 
    if (!$aftercare_page) {
        return '';
    }
    $aftercare_id = $aftercare_page->ID;

    // Query for child pages of "aftercare"
    $query = new WP_Query(array(
        'post_type'      => 'page',
        'posts_per_page' => $total,
        'offset'         => $skip,
        'post_parent'    => $aftercare_id,
        'orderby'        => 'menu_order',
        'order'          => 'ASC'
    ));

    $html = '';
    if ($query->have_posts()) :
        $html .= '<div class="aftercare-child-pages">';
        while ($query->have_posts()) : $query->the_post();
            $html .= '<div class="fco-aftercare">';
            $html .= '<div class="image-block">';
			if(get_field('aftercare_secondary_image')):
				$aftercare_sec_img = get_field('aftercare_secondary_image');
				$html .= '<img src="'.esc_url($aftercare_sec_img['url']).'" alt="'.esc_attr($aftercare_sec_img['alt']).'">';
			else:
				$html .= get_the_post_thumbnail(null, 'medium_large');
			endif;
            $html .= '</div>';

            $html .= '<div class="content-block"><div class="content">';
            $html .= '<h4 class="service-title">' . get_the_title() . '</h4>';
            $html .= '<div class="short-intro"><p>' . get_the_excerpt() . '</p></div>';
            $html .= '<div class="meta"><p><a href="' . get_permalink() . '" class="link-button">Review</a></p></div>';
            $html .= '</div></div></div>';
        endwhile;
        $html .= '</div>';
    endif; 
    wp_reset_postdata(); // Reset the query

    return $html;
}
add_shortcode('aftercare_child_pages', 'aftercare_child_pages_shortcode');


//  FCO Videos Shortcode

function fco_video_list_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'posts_per_page' => 10,
    ), $atts );

    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

    $video_query = new WP_Query( array(
        'post_type'      => 'video',
        'posts_per_page' => intval( $atts['posts_per_page'] ),
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'paged'          => $paged,
    ));

    $output = '<div class="videos-archive-block">';
    $popovers = '';
    if ( $video_query->have_posts() ) {
        $output .= '<div class="video-list">';
        while ( $video_query->have_posts() ) {
            $video_query->the_post();
            $video_id = get_field('fco_yt_video_id');
            ob_start();
            get_template_part( 'template-parts/content/content', 'video' );
            $output .= ob_get_clean();
        }
        $output .= '</div><!-- .video-list -->';

        $total_pages = $video_query->max_num_pages;
        if ( $total_pages > 1 ) {
            $output .= '<nav class="video-pagination">';
            $output .= paginate_links( array(
                'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'format'    => '?paged=%#%',
                'current'   => max( 1, $paged ),
                'total'     => $total_pages,
                'prev_text' => __( '« Prev' ),
                'next_text' => __( 'Next »' ),
                'type'      => 'plain',
            ));
            $output .= '</nav>';
        }

        wp_reset_postdata();
    } else {
        ob_start();
        get_template_part( 'template-parts/content', 'none' );
        $output .= ob_get_clean();
    }

    $output .= '</div><!-- .videos-archive-block -->';

    return $output;
}
add_shortcode( 'yt_video_list', 'fco_video_list_shortcode' );


function fco_contact_shortcode($atts) {
    $atts = shortcode_atts(array(
        'number' => '602-466-9703', // Default US number
        'content' => '',         // Optional display text
        'class'   => '',         // Custom class to append (empty by default)
    ), $atts);

    $phone_number = esc_attr($atts['number']); // Display number (e.g., 602-466-9703)
    $tel_number = '+1' . preg_replace('/[^0-9]/', '', $phone_number); // Tel link (e.g., +16024669703)
    $display_text = !empty($atts['content']) ? esc_html($atts['content']) : $phone_number; // Text to show
    $default_class = 'contact-number'; // Default class
    $custom_class = esc_attr($atts['class']); // Sanitized custom class
    $final_class = $default_class . ($custom_class ? ' ' . $custom_class : ''); // Combine with space if custom class exists

    ob_start();
    // Center the contact link without extra spacing (spacer will be added before the heading elsewhere)
    echo '<div style="text-align: center !important;"><a href="tel:' . $tel_number . '" class="' . $final_class . '" style="color: white !important; text-decoration: none !important;">' . $display_text . '</a></div>';
    return ob_get_clean();
}
add_shortcode('fco_contact_number', 'fco_contact_shortcode');


function yt_videos_cta_shortcode($atts) {
    $atts = shortcode_atts(array(
        'content' => 'UCU61TcTKAJpzEhHuMp6B_Ug', // FCO Channel ID
    ), $atts);

    $channel_id = esc_attr($atts['content']);

    ob_start();
    ?>
    <div class="fco-yt-cta-block">
        <div class="yt-block">
            <p class="cta-title"><strong>Explore More on YouTube Now!</strong></p>
            <div class="g-ytsubscribe" data-channelid="<?php echo $channel_id; ?>" data-layout="full" data-count="hidden"></div>
        </div>
        <div class="cta-block">
            <p class="cta-title"><strong>Questions? Reach Out!</strong></p>
            <p class="cta-text">We’re here to help! Call us at <?php echo do_shortcode('[fco_contact_number]'); ?> or fill out the <a href="#request-consultation">form</a> below.</p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('yt_videos_cta', 'yt_videos_cta_shortcode');