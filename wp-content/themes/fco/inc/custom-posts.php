<?php
/**
 * Custom Posts for this theme
 *
 * 
 *
 * @package FCO
 */



 
 /*


/*
**************************
>>> Testimonial Post Type
**************************
*/


/**
 * Registering Testimonial post type.
 */
function testimonial_post_init() {
	$labels = array(
		'name'               => __( 'Testimonial', 'post type general name', 'hearthook-delta' ),
		'singular_name'      => __( 'Testimonial', 'post type singular name', 'hearthook-delta' ),
		'menu_name'          => __( 'Testimonials', 'admin menu', 'hearthook-delta' ),
		'name_admin_bar'     => __( 'Testimonial', 'add new on admin bar', 'hearthook-delta' ),
		'add_new'            => __( 'Add New', 'Testimonial', 'hearthook-delta' ),
		'add_new_item'       => __( 'Add New Testimonial', 'hearthook-delta' ),
		'new_item'           => __( 'New Testimonial', 'hearthook-delta' ),
		'edit_item'          => __( 'Edit Testimonial', 'hearthook-delta' ),
		'view_item'          => __( 'View Testimonial', 'hearthook-delta' ),
		'all_items'          => __( 'All Testimonials', 'hearthook-delta' ),
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'hearthook-delta' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' 		 => 'dashicons-thumbs-up',
		'show_in_rest' 		 => true,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail'),
	);

	register_post_type( 'testimonial', $args );
}

add_action( 'init', 'testimonial_post_init' );


/**
 * Registering Services post type.
 */
function services_post_init() {
	$labels = array(
		'name'               => __( 'Service', 'post type general name', 'fco' ),
		'singular_name'      => __( 'Service', 'post type singular name', 'fco' ),
		'menu_name'          => __( 'Services', 'admin menu', 'fco' ),
		'name_admin_bar'     => __( 'Service', 'add new on admin bar', 'fco' ),
		'add_new'            => __( 'Add New', 'Service', 'fco' ),
		'add_new_item'       => __( 'Add New Service', 'fco' ),
		'new_item'           => __( 'New Service', 'fco' ),
		'edit_item'          => __( 'Edit Service', 'fco' ),
		'view_item'          => __( 'View Service', 'fco' ),
		'all_items'          => __( 'All Services', 'fco' ),
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __('Services provided by or under FCO, like injections, consultations.', 'fco' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'taxonomies' 		 => array ('service-category',),
		'rewrite'     		 => array( 'slug' => 'services', 'with_front' => false),
		'menu_icon' 		 => 'dashicons-plus',
		'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail'),
        'show_in_rest' 		 => true,
	);

	register_post_type( 'services', $args );
}

add_action( 'init', 'services_post_init' );


// Register FCO Services Custom Taxonomy
function fco_services_custom_taxonomy(){

	$labels = array(
		'name'                       => __( 'Service Category', 'Taxonomy General Name', 'fco' ),
		'singular_name'              => __( 'Service Category', 'Taxonomy Singular Name', 'fco' ),
		'menu_name'                  => __( 'Service Categories', 'fco' ),
		'all_items'                  => __( 'All Service Categories', 'fco' ),
		'parent_item'                => __( 'Parent Service Category', 'fco' ),
		'parent_item_colon'          => __( 'Parent Service Category:', 'fco' ),
		'new_item_name'              => __( 'New Service Category Name', 'fco' ),
		'add_new_item'               => __( 'Add New Service Category', 'fco' ),
		'edit_item'                  => __( 'Edit Service Category', 'fco' ),
		'update_item'                => __( 'Update Service Category', 'fco' ),
		'view_item'                  => __( 'View Service Category', 'fco' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'fco' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'fco' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'fco' ),
		'popular_items'              => __( 'Popular Service Categories', 'fco' ),
		'search_items'               => __( 'Search Service Categories', 'fco' ),
		'not_found'                  => __( 'Not Found', 'fco' ),
		'no_terms'                   => __( 'No items', 'fco' ),
		'items_list'                 => __( 'Service Categories list', 'fco' ),
		'items_list_navigation'      => __( 'Service Categories list navigation', 'fco' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest' 		 => true,
	);
	register_taxonomy( 'service-category', array( 'services' ), $args );

}
add_action( 'init', 'fco_services_custom_taxonomy', 0 );


/*
**************************
>>> Team Post Type
**************************
*/


/**
 * Registering Team post type.
 */
function team_post_init() {
	$labels = array(
		'name'               => _x( 'Team', 'post type general name', 'fco' ),
		'singular_name'      => _x( 'Team Member', 'post type singular name', 'fco' ),
		'menu_name'          => _x( 'Team', 'admin menu', 'fco' ),
		'name_admin_bar'     => _x( 'Team Member', 'add new on admin bar', 'fco' ),
		'add_new'            => __( 'Add New', 'Team Member', 'fco' ),
		'add_new_item'       => __( 'Add New Team Member', 'fco' ),
		'new_item'           => __( 'New Team Member', 'fco' ),
		'edit_item'          => __( 'Edit Team Member', 'fco' ),
		'view_item'          => __( 'View Team Member', 'fco' ),
		'all_items'          => __( 'All Team Members', 'fco' ),
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'fco' ),
		'public'             => false,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'about', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'menu_icon' 		 => 'dashicons-groups',
		'show_in_rest' 		 => true,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail'),
		//'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'team', $args );
}

add_action( 'init', 'team_post_init' );



/*
**************************
>>> Frequently Asked Questions
**************************
*/


/**
 * Registering FAQ post type.
 */
function fco_faqs_post_init() {
	$labels = array(
		'name'               => __( 'Frequently Asked Questions', 'post type general name', 'fco' ),
		'singular_name'      => __( 'Frequently Asked Questions', 'post type singular name', 'fco' ),
		'menu_name'          => __( 'FAQs', 'admin menu', 'fco' ),
		'name_admin_bar'     => __( 'Frequently Asked Question', 'add new on admin bar', 'fco' ),
		'add_new'            => __( 'Add New', 'Question', 'fco' ),
		'add_new_item'       => __( 'Add New Question', 'fco' ),
		'new_item'           => __( 'New Question', 'fco' ),
		'edit_item'          => __( 'Edit Question', 'fco' ),
		'view_item'          => __( 'View Question', 'fco' ),
		'all_items'          => __( 'All Questions', 'fco' ),
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'fco' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' 		 => 'dashicons-admin-comments',
		'show_in_rest' 		 => true,
		'supports'           => array( 'title', 'editor',),
	);

	register_post_type( 'fco-faqs', $args );
}

add_action( 'init', 'fco_faqs_post_init' );



/*
**************************
>>> Videos Post Type
**************************
*/


/**
 * Registering Videos post type.
 */

 function video_post_init() {
    $labels = array(
        'name'               => __( 'Videos', 'post type general name', 'fco' ),
        'singular_name'      => __( 'Video', 'post type singular name', 'fco' ),
        'menu_name'          => __( 'Videos', 'admin menu', 'fco' ),
        'name_admin_bar'     => __( 'Video', 'add new on admin bar', 'fco' ),
        'add_new'            => __( 'Add New', 'Video', 'fco' ),
        'add_new_item'       => __( 'Add New Video', 'fco' ),
        'new_item'           => __( 'New Video', 'fco' ),
        'edit_item'          => __( 'Edit Video', 'fco' ),
        'view_item'          => __( 'View Video', 'fco' ),
        'all_items'          => __( 'All Videos', 'fco' ),
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'A custom post type for videos.', 'fco' ),
        'public'             => false,              
        'publicly_queryable' => false,              
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => false,              
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-video-alt3',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'excerpt', 'author'),
    );

    register_post_type( 'video', $args );
}
add_action( 'init', 'video_post_init' );


/*
**************************
>>> News Post Type
**************************
*/

/**
 * Registering News post type.
 */
function news_post_init() {
    $labels = array(
        'name'               => __( 'News', 'post type general name', 'fco' ),
        'singular_name'      => __( 'News', 'post type singular name', 'fco' ),
        'menu_name'          => __( 'News', 'admin menu', 'fco' ),
        'name_admin_bar'     => __( 'News', 'add new on admin bar', 'fco' ),
        'add_new'            => __( 'Add New', 'News', 'fco' ),
        'add_new_item'       => __( 'Add New News', 'fco' ),
        'new_item'           => __( 'New News', 'fco' ),
        'edit_item'          => __( 'Edit News', 'fco' ),
        'view_item'          => __( 'View News', 'fco' ),
        'all_items'          => __( 'All News', 'fco' ),
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'A custom post type for news articles.', 'fco' ),
        'public'             => false,              
        'publicly_queryable' => false,              
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => false,              
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-megaphone',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' ),
    );

    register_post_type( 'news', $args );
}
add_action( 'init', 'news_post_init' );

/*
**************************
>>> FAQ Item Post Type
**************************
*/

/**
 * Registering FAQ Item post type.
 */
function faq_item_post_init() {
    $labels = array(
        'name'               => __( 'FAQ Items', 'post type general name', 'fco' ),
        'singular_name'      => __( 'FAQ Item', 'post type singular name', 'fco' ),
        'menu_name'          => __( 'FAQ Management', 'admin menu', 'fco' ),
        'name_admin_bar'     => __( 'FAQ Item', 'add new on admin bar', 'fco' ),
        'add_new'            => __( 'Add New', 'FAQ Item', 'fco' ),
        'add_new_item'       => __( 'Add New FAQ Item', 'fco' ),
        'new_item'           => __( 'New FAQ Item', 'fco' ),
        'edit_item'          => __( 'Edit FAQ Item', 'fco' ),
        'view_item'          => __( 'View FAQ Item', 'fco' ),
        'all_items'          => __( 'All FAQ Items', 'fco' ),
        'search_items'       => __( 'Search FAQ Items', 'fco' ),
        'parent_item_colon'  => __( 'Parent FAQ Items:', 'fco' ),
        'not_found'          => __( 'No FAQ items found.', 'fco' ),
        'not_found_in_trash' => __( 'No FAQ items found in Trash.', 'fco' ),
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Manage FAQ questions and answers with topics for organized display.', 'fco' ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 26,
        'menu_icon'          => 'dashicons-editor-help',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'author', 'revisions' ),
        'taxonomies'         => array( 'faq_topic' ),
    );

    register_post_type( 'faq_item', $args );
}
add_action( 'init', 'faq_item_post_init' );

/**
 * Registering FAQ Topic taxonomy.
 */
function faq_topic_taxonomy_init() {
    $labels = array(
        'name'                       => _x( 'FAQ Topics', 'taxonomy general name', 'fco' ),
        'singular_name'              => _x( 'FAQ Topic', 'taxonomy singular name', 'fco' ),
        'search_items'               => __( 'Search FAQ Topics', 'fco' ),
        'popular_items'              => __( 'Popular FAQ Topics', 'fco' ),
        'all_items'                  => __( 'All FAQ Topics', 'fco' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit FAQ Topic', 'fco' ),
        'update_item'                => __( 'Update FAQ Topic', 'fco' ),
        'add_new_item'               => __( 'Add New FAQ Topic', 'fco' ),
        'new_item_name'              => __( 'New FAQ Topic Name', 'fco' ),
        'separate_items_with_commas' => __( 'Separate FAQ topics with commas', 'fco' ),
        'add_or_remove_items'        => __( 'Add or remove FAQ topics', 'fco' ),
        'choose_from_most_used'      => __( 'Choose from the most used FAQ topics', 'fco' ),
        'not_found'                  => __( 'No FAQ topics found.', 'fco' ),
        'menu_name'                  => __( 'FAQ Topics', 'fco' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'faq-topic' ),
        'meta_box_cb'           => false, // We'll create custom meta box
    );

    register_taxonomy( 'faq_topic', array( 'faq_item' ), $args );
}
add_action( 'init', 'faq_topic_taxonomy_init' );