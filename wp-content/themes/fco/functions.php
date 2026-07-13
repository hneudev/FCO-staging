<?php
/**
 * Full Circle Ortho functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FCO
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.3' );
}

if ( ! function_exists( 'fco_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fco_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Full Circle Ortho, use a find and replace
		 * to change 'fco' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fco', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'fco' ),
				'footer' => esc_html__( 'Footer', 'fco' ),
				'social' => esc_html__( 'Social', 'fco' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'fco_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'fco_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fco_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fco_content_width', 640 );
}
add_action( 'after_setup_theme', 'fco_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fco_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Hero Text Homepage', 'fco' ),
			'id'            => 'hero-overlay-text',
			'description'   => esc_html__( 'Add text here which will go in the Hero Section on homepage.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Video Intro Block', 'fco' ),
			'id'            => 'video-intro-block',
			'description'   => esc_html__( 'Introduction, Approach about FCO on homepage goes here.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Intro & Approach', 'fco' ),
			'id'            => 'homepage-first-intro',
			'description'   => esc_html__( 'Introduction, Approach about FCO on homepage goes here.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Clients\' Logos Section', 'fco' ),
			'id'            => 'clients-logos',
			'description'   => esc_html__( 'Add clients logos here which would appear under the hero section.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s client-logo">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	// Pre-testimonials image widget area (shown above Google Reviews on homepage)
	register_sidebar(
		array(
			'name'          => esc_html__( 'Homepage: Pre-Testimonials Image', 'fco' ),
			'id'            => 'homepage-pre-testimonials-image',
			'description'   => esc_html__( 'Add an Image widget (or content) that appears above the Google Reviews on the homepage.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Featured Section: Homepage', 'fco' ),
			'id'            => 'featured-section-one',
			'description'   => esc_html__( 'Intro to FCO features, full width images or one column content on homepage goes here.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Featured Services: Blocks', 'fco' ),
			'id'            => 'featured-services-blocks',
			'description'   => esc_html__( 'Characteristics Blocks for Characteristics section on homepage goes here.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	// Characteristics section (intro and blocks)
	register_sidebar(
		array(
			'name'          => esc_html__( 'Homepage: Characteristics Intro', 'fco' ),
			'id'            => 'homepage-characteristics-intro',
			'description'   => esc_html__( 'Intro content for the Characteristics section on the homepage.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Homepage: Characteristics Blocks', 'fco' ),
			'id'            => 'homepage-characteristics-blocks',
			'description'   => esc_html__( 'Blocks/content for the Characteristics section on the homepage.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	// About section on homepage
	register_sidebar(
		array(
			'name'          => esc_html__( 'Homepage: About', 'fco' ),
			'id'            => 'homepage-about',
			'description'   => esc_html__( 'Content for the About section on the homepage.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Request Consultation Section', 'fco' ),
			'id'            => 'request-consultation',
			'description'   => esc_html__( 'Content for signup section on homepage goes here.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Hero Section', 'fco' ),
			'id'            => 'blog-hero-text',
			'description'   => esc_html__( 'Add custom content for blog pages hero section.', 'fco' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Our Commitment', 'fco' ),
			'id'            => 'homepage-second-intro',
			'description'   => esc_html__( 'Image and content related to our promises & commitment on homepage goes here.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer - One', 'fco' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer - Two', 'fco' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer - Three', 'fco' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'fco' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'fco_widgets_init' );

/**
 * Register Business Information Settings for Schema Markup
 */
function fco_register_business_settings() {
	// Register settings for business information
	register_setting( 'general', 'fco_phone_number', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => ''
	));
	register_setting( 'general', 'fco_street_address', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => ''
	));
	register_setting( 'general', 'fco_city', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => ''
	));
	register_setting( 'general', 'fco_state', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => ''
	));
	register_setting( 'general', 'fco_postal_code', array(
		'type' => 'string',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => ''
	));

	// Add settings fields to General Settings page
	add_settings_section(
		'fco_business_info_section',
		'Business Information (for SEO Schema)',
		'fco_business_info_section_callback',
		'general'
	);

	add_settings_field(
		'fco_phone_number',
		'Phone Number',
		'fco_phone_number_callback',
		'general',
		'fco_business_info_section'
	);

	add_settings_field(
		'fco_street_address',
		'Street Address',
		'fco_street_address_callback',
		'general',
		'fco_business_info_section'
	);

	add_settings_field(
		'fco_city',
		'City',
		'fco_city_callback',
		'general',
		'fco_business_info_section'
	);

	add_settings_field(
		'fco_state',
		'State',
		'fco_state_callback',
		'general',
		'fco_business_info_section'
	);

	add_settings_field(
		'fco_postal_code',
		'Postal Code',
		'fco_postal_code_callback',
		'general',
		'fco_business_info_section'
	);
}
add_action( 'admin_init', 'fco_register_business_settings' );

// Section callback
function fco_business_info_section_callback() {
	echo '<p>Enter your business information below. This will be used for Schema.org structured data to improve SEO and local search visibility.</p>';
}

// Field callbacks
function fco_phone_number_callback() {
	$value = get_option( 'fco_phone_number', '' );
	echo '<input type="tel" name="fco_phone_number" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="(123) 456-7890" />';
	echo '<p class="description">Format: (123) 456-7890</p>';
}

function fco_street_address_callback() {
	$value = get_option( 'fco_street_address', '' );
	echo '<input type="text" name="fco_street_address" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="123 Main Street" />';
}

function fco_city_callback() {
	$value = get_option( 'fco_city', '' );
	echo '<input type="text" name="fco_city" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="City Name" />';
}

function fco_state_callback() {
	$value = get_option( 'fco_state', '' );
	echo '<input type="text" name="fco_state" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="CA" maxlength="2" />';
	echo '<p class="description">Two-letter state code (e.g., CA, NY, TX)</p>';
}

function fco_postal_code_callback() {
	$value = get_option( 'fco_postal_code', '' );
	echo '<input type="text" name="fco_postal_code" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="12345" />';
}

/**
 * Enqueue scripts and styles.
 */
function fco_scripts() {
	wp_enqueue_style( 'fco-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_script( 'fco-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	// Enqueue diagnostics and debug scripts only in development
	if ( defined('WP_DEBUG') && WP_DEBUG ) {
		wp_enqueue_script( 'fco-diagnostics', get_template_directory_uri() . '/js/diagnostics.js', array('fco-navigation'), _S_VERSION, true );
		wp_enqueue_script( 'fco-accordion-debug', get_template_directory_uri() . '/js/accordion-debug.js', array('fco-navigation'), _S_VERSION, true );
	}

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
	if (!is_admin()) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_deregister_style( 'wpforms-smart-phone-field' );
		wp_deregister_style( 'wpforms-smart-phone-field-css' );
		wp_dequeue_style( 'wpforms-smart-phone-field' );
		wp_dequeue_style( 'wpforms-smart-phone-field-css' );
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), null, true);
		// Load YouTube API and video script for 'videos' page
		if (is_page('videos')) {
			wp_enqueue_script('video-popovers', get_template_directory_uri() . '/js/video-popovers.js', array(), '1.0', true);
			wp_enqueue_script('youtube-subscribe-api', 'https://apis.google.com/js/platform.js', array(), null, true);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'fco_scripts' );

/**
 * Restore the Classic Widgets view.
 */

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );


/**
 * Remove Widget Titles using '~' as their prefix.
**/
add_filter( 'widget_title', 'remove_widget_title' );
function remove_widget_title( $widget_title ) {
	if ( substr ( $widget_title, 0, 1 ) == '~' )
		return;
	else
		return ( $widget_title );
}

/**
 * Span/Break in Widget Title.
**/

add_filter ( 'widget_title', 'hh_add_span_widgets' );
function hh_add_span_widgets( $widget_title ) {
//   echo gettype($widget_title);
	if(strpos($widget_title, '[br]')):
		$title = explode( '[br]', $widget_title);
		
		$titleNew = '';
		for ($i=0; $i < sizeof($title); $i++) { 
			$titleNew .= '<span>'.$title[$i].'</span>';
		}
		
		return $titleNew;
	else:
		return $widget_title;
	endif;
}


/**
* Excerpt Length
**/
function hh_custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'hh_custom_excerpt_length', 999 );

/**
 * Additional Custom Links to the Primary Menu
 */
function add_custom_menu_links($menuItems, $args) {
    if ('primary' !== $args->theme_location) {
        return $menuItems;
    }

    $home_icon = sprintf(
        '<li class="menu-icon"><span class="fco-menu-icon"><a href="%s" rel="home"><img src="%s" alt="Home"></a></span></li>',
        esc_url(home_url('/')),
        esc_url(get_theme_file_uri('/images/fco-icon.png'))
    );

    $custom_menu_link = '';
    if (has_nav_menu('social-primary')) {
        $menu_locations = get_nav_menu_locations();
        $social_menu_id = !empty($menu_locations['social-primary']) ? $menu_locations['social-primary'] : 0;
        $social_links = $social_menu_id ? wp_get_nav_menu_items($social_menu_id) : false;

        if ($social_links) {
            $custom_menu_link .= '<li class="social-profiles"><ul class="main-nav-social">';
            $custom_menu_link .= $args->before;
            foreach ($social_links as $social_link) {
        
                $icon = function_exists('fco_get_social_link_svg') 
                    ? wp_kses_post(fco_get_social_link_svg($social_link->url)) 
                    : esc_html($social_link->title);
                $custom_menu_link .= sprintf(
                    '<li class="social %s"><a href="%s">%s</a></li>',
                    esc_attr(strtolower($social_link->title)),
                    esc_url($social_link->url),
                    $icon
                );
            }
            $custom_menu_link .= $args->after;
            $custom_menu_link .= '</ul></li>';
        }
    }

    // Contact link
    if (wp_is_mobile()):
        $contact_link = '<li id="menu-item-contact" class="contact menu-item menu-item-type-custom menu-item-object-custom"><a href="tel:+16024669703">Contact Us</a></li>';
    else:
        $contact_link = '<li id="menu-item-contact" class="contact menu-item menu-item-type-custom menu-item-object-custom"><a href="#request-consultation">Contact Us</a></li>';
    endif;

    return $home_icon . $menuItems . $custom_menu_link . $contact_link;
}
add_filter('wp_nav_menu_items', 'add_custom_menu_links', 10, 2);

/**
 * Add Team Members as submenu items to About Us menu
 */
function add_team_members_to_about_menu($items, $args) {
    // Only apply to primary menu
    if ($args->theme_location !== 'primary') {
        return $items;
    }
    
    // Get all published team members with proper ordering
    // First by menu_order DESC (higher display order numbers first)
    // Then by post_date DESC (newer posts first if menu_order is the same)
    $team_members = new WP_Query(array(
        'post_type' => 'team',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => array(
            'menu_order' => 'DESC',
            'date' => 'DESC'
        )
    ));
    $team_members = $team_members->posts;
    
    // If no team members found, return original items
    if (empty($team_members)) {
        return $items;
    }
    
    // Look for About Us menu item and add submenu
    // Try multiple patterns to catch different About Us configurations
    $patterns = [
        '/(<li[^>]*class="[^"]*menu-item[^"]*"[^>]*><a[^>]*href="[^"]*about[^"]*"[^>]*>[^<]*<\/a>)(<\/li>)/i',
        '/(<li[^>]*class="[^"]*menu-item[^"]*"[^>]*><a[^>]*>[^<]*about[^<]*<\/a>)(<\/li>)/i',
        '/(<li[^>]*class="[^"]*menu-item[^"]*"[^>]*><a[^>]*>about us<\/a>)(<\/li>)/i'
    ];
    
    $match_found = false;
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $items, $matches)) {
            // Get About Us page URL
            $about_page = get_page_by_path('about');
            if (!$about_page) {
                // Try to find About Us page by title
                $about_page = get_page_by_title('About Us');
            }
            $about_url = $about_page ? get_permalink($about_page->ID) : home_url('/about/');
            
            // Build team members submenu with anchor links
            $submenu = '<ul class="sub-menu">';
            foreach ($team_members as $member) {
                $anchor = sanitize_title($member->post_title);
                $submenu .= '<li class="menu-item menu-item-type-post_type menu-item-object-team">';
                $submenu .= '<a href="' . $about_url . '#team-' . $anchor . '">' . esc_html($member->post_title) . '</a>';
                $submenu .= '</li>';
            }
            $submenu .= '</ul>';
            
            // Add menu-item-has-children class to the About Us item
            $about_item_with_class = str_replace('class="', 'class="menu-item-has-children ', $matches[1]);
            
            // Replace the About Us menu item with the new version including submenu
            $new_about_item = $about_item_with_class . $submenu . $matches[2];
            $items = str_replace($matches[0], $new_about_item, $items);
            $match_found = true;
            break;
        }
    }
    
    return $items;
}
add_filter('wp_nav_menu_items', 'add_team_members_to_about_menu', 20, 2);

/**
 * Add FAQ link to primary navigation menu
 */
function add_faq_to_menu($items, $args) {
    // Only apply to primary menu
    if ($args->theme_location !== 'primary') {
        return $items;
    }
    
    // Get FAQ page URL
    $faq_url = get_faq_page_url();
    
    // Create FAQ menu item HTML
    $faq_menu_item = '<li id="menu-item-faq" class="faq menu-item menu-item-type-custom menu-item-object-custom">';
    $faq_menu_item .= '<a href="' . esc_url($faq_url) . '">FAQ</a>';
    $faq_menu_item .= '</li>';
    
    // Find the contact menu item and insert FAQ before it
    $contact_pattern = '/(<li[^>]*id="menu-item-contact"[^>]*>.*?<\/li>)/s';
    if (preg_match($contact_pattern, $items, $matches)) {
        // Insert FAQ before Contact Us
        $items = str_replace($matches[1], $faq_menu_item . $matches[1], $items);
    } else {
        // If no contact item found, add at the end
        $items .= $faq_menu_item;
    }
    
    return $items;
}
add_filter('wp_nav_menu_items', 'add_faq_to_menu', 15, 2);

/**
 * Display team members on About Us page with alternating layout
 */
function display_team_members_on_about_page() {
    // Get all published team members ordered by display_order, then by title
    $team_members = get_posts(array(
        'post_type' => 'team',
        'post_status' => 'publish',
        'numberposts' => -1,
        'meta_key' => '_team_display_order',
        'orderby' => 'meta_value_num title',
        'order' => 'ASC'
    ));
    
    // Debug: Check if we have team members
    if (empty($team_members)) {
        // If no team members exist, check if there are any team posts at all
        $all_team_posts = get_posts(array(
            'post_type' => 'team',
            'post_status' => 'publish',
            'numberposts' => -1
        ));
        
        if (empty($all_team_posts)) {
            echo '<!-- No team members found in custom post type -->';
            return;
        } else {
            // Use all team posts if none have display order
            $team_members = $all_team_posts;
        }
    }
    
    echo '<div class="fco-team-section" id="our-team">';
    
    foreach ($team_members as $index => $member) {
        $anchor = sanitize_title($member->post_title);
        
        // Add separator before each team member (except the first one)
        if ($index > 0) {
            echo '<div class="team-member-separator"></div>';
        }
        
        // Determine layout class - odd index gets image-left, even gets image-right
        $layout_class = ($index % 2 === 0) ? 'image-left' : 'image-right';
        
        echo '<div class="fco-team-block team-member-card ' . $layout_class . '" id="team-' . $anchor . '">';
        echo '<div class="team-member">';
        
        // Image block
        echo '<div class="image-block">';
        if (has_post_thumbnail($member->ID)) {
            echo get_the_post_thumbnail($member->ID, 'large');
        } else {
            echo '<div class="placeholder-image">No Photo Available</div>';
        }
        echo '</div>';
        
        // Content block
        echo '<div class="content-block">';
        echo '<div class="content">';
        echo '<h4 class="member-name">' . esc_html($member->post_title) . '</h4>';
        
        // Display position below the name (using member-title class to match CSS)
        $position = get_post_meta($member->ID, '_team_position', true);
        if ($position) {
            echo '<div class="member-title">' . esc_html($position) . '</div>';
        }
        
        // Display bio content
        if ($member->post_content) {
            echo '<div class="member-bio">' . wp_kses_post($member->post_content) . '</div>';
        }
        
        echo '</div>'; // content
        echo '</div>'; // content-block
        echo '</div>'; // team-member
        echo '</div>'; // fco-team-block
    }
    
    echo '</div>'; // fco-team-section
}

/**
 * Helper function to create team members programmatically
 * This can be called once to migrate existing team member data
 */
function create_team_members_from_existing_data() {
    // Team member data based on the hardcoded content
    $team_members_data = array(
        array(
            'name' => 'Courtney Kelm PA-C',
            'position' => 'Founder & Physician Associate',
            'bio' => 'Courtney Kelm founded Full Circle in 2019 with a strong desire to go back "full circle" to the days of comprehensively helping people through kindness, listening, and collaborating. She will not treat you like a number or give you "cookie cutter" treatment options. She wants to empower you with knowledge and options. She brings you the most up to date orthopedic data from all around the world. She is a member of multiple international orthopedic societies and attends their conferences regularly.

Courtney has been practicing medicine for over 25 years. She has seen over 80,000 patient visits leading to accurate diagnostics skills. She has performed 50,000+ joint, tendon, and muscle injections leading to safe, effective outcomes.

In addition to clinical experience, Courtney served as Adjunct Professor at AT Still University and as research coordinator for cancer, neurologic, and rheumatologic research. She was invited to perform as guest speaker for Barrow Neurological Institute as well as multiple pharmaceutical companies.

Courtney was nominated for The Brown Foundation-Earl Rudder Memorial Outstanding Student Award which is the highest honor bestowed upon a graduating senior at Texas A&M University. No more than two Brown-Rudder awardees are selected at Texas A&M each year since 1970. She received a Bachelor of Science as a Physician Associate at the University of Texas and a Bachelor of Science in Biomedical Science at Texas A&M University where she also earned several highly esteemed academic honors.',
            'image_url' => 'courtney-kelm-headshot.jpg',
            'order' => 1
        ),
        array(
            'name' => 'Rebekah (Becky) Forbes',
            'position' => 'Medical Assistant',
            'bio' => 'Becky brings joy and softness to Full Circle. Being a sister to many younger siblings, she is naturally a carer, and will be sure to treat you as considerately as possible. Becky assists with medical treatments including PRP, shockwave, and other modalities. She helps us stay connected with the patient\'s care to ensure continuity of care.

Becky\'s interest in healthcare has always been prevalent, and she began to witness the importance of having knowledgeable and compassionate carers when her own family members became ill. She began her journey studying nursing at Grand Canyon University, but as her interests evolved, she discovered a passion for understanding human behavior and supporting mental wellness. This led her to pursue a degree in Behavioral Science at South Mountain Community College, with the goal of becoming an Occupational Therapist. Becky has had substantial experience, participating in clinical rotations around the valley, working at a naturopath clinic, and now dedicated her time to Full Circle for almost two years.

In her free time, Becky enjoys nature, participating in hiking, camping, kayaking, and backpacking. In quieter moments, Becky enjoys the art of watercolor painting. She also cherishes quality time spent with friends and family.',
            'image_url' => 'IMG_4016-scaled.jpeg',
            'order' => 2
        ),
        array(
            'name' => 'Tuyet (Maya) Vuu',
            'position' => 'Licensed Massage Therapist',
            'bio' => 'Maya brings over 12 years of experience and a deep understanding of human anatomy to the practice, and is able to address injury through her techniques. She trained at the Cosmetology School in Garden Grove, CA, and later at the Massage Therapy Academy in Peoria, AZ. She is educated in a variety of techniques, including Swedish, deep tissue, hot stone, shiatsu, therapeutic, and foot reflexology, addressing injuries and promoting holistic well‑being.

Originally from Vietnam, Maya visits family there every two to three years. Outside the studio, she enjoys gardening and cooking and is a devoted cat owner of three, as well as a proud mother to her daughter attending Arizona State University.

Maya\'s is dedicated to helping people feel relieved and revived, hoping to encourage better wellness and mobility in day to day life of her patients.',
            'image_url' => 'IMG_3887-scaled.jpeg',
            'order' => 3
        ),
        array(
            'name' => 'Michelle Wadlow',
            'position' => 'Patient Coordinator',
            'bio' => 'Michelle is the first friendly voice you\'ll hear when you call Full Circle. She works hard to find appointment times that fit your schedule. Michelle is passionate about helping people and building lasting relationships, making her a vital part of our team. Although not practicing at the moment, 

Michelle is a licensed esthetician of 25 years, and has worked at a high end boutique spa in Kirkland, Washington for 10 years, where she is from originally. She attended Penrose Academy in Scottsdale to achieve her Laser Technician Certification in 2022.

Outside the office, Michelle is a proud mom of two daughters, both of whom are preparing to graduate from high school. In her free time, she enjoys cooking, reading, staying active, and spending time with friends. Like many Arizonans, she\'s recently discovered a love for pickleball. She also has a strong passion for traveling and experiencing new cultures, while also participating in an invigorating adventure, such as zip lining, horse back riding, or wave running.',
            'image_url' => 'unnamed.jpg',
            'order' => 4
        )
    );
    
    $created_count = 0;
    
    // Create each team member
    foreach ($team_members_data as $member_data) {
        // Check if this team member already exists
        $existing = get_page_by_title($member_data['name'], OBJECT, 'team');
        if ($existing) {
            continue; // Skip if already exists
        }
        
        // Create the team member post
        $post_id = wp_insert_post(array(
            'post_title' => $member_data['name'],
            'post_content' => $member_data['bio'],
            'post_status' => 'publish',
            'post_type' => 'team',
            'menu_order' => $member_data['order']
        ));
        
        if ($post_id) {
            // Add meta fields
            update_post_meta($post_id, '_team_position', $member_data['position']);
            update_post_meta($post_id, '_team_display_order', $member_data['order']);
            $created_count++;
            
            // Log creation for debugging
            error_log("Created team member: " . $member_data['name'] . " (ID: $post_id)");
        }
    }
    
    error_log("Team migration completed. Created $created_count team members.");
    return "Team members created successfully! Created: $created_count";
}

// Create team members migration - runs once
function run_team_migration_once() {
    if (!get_option('team_members_migrated')) {
        create_team_members_from_existing_data();
        update_option('team_members_migrated', true);
    }
}
add_action('init', 'run_team_migration_once');

// Debug function to check team members
function debug_team_members() {
    $team_members = get_posts(array(
        'post_type' => 'team',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));
    
    echo "<h3>Team Members Debug Info:</h3>";
    echo "<p>Found " . count($team_members) . " team members:</p>";
    
    foreach ($team_members as $member) {
        $position = get_post_meta($member->ID, '_team_position', true);
        echo "<p>- {$member->post_title} (Position: $position, Menu Order: {$member->menu_order})</p>";
    }
}

// Add admin page for debugging
function add_team_debug_admin_page() {
    add_submenu_page(
        'edit.php?post_type=team',
        'Team Debug',
        'Debug',
        'manage_options',
        'team-debug',
        'debug_team_members'
    );
}
add_action('admin_menu', 'add_team_debug_admin_page');
function team_members_shortcode($atts) {
    ob_start();
    display_team_members_on_about_page();
    return ob_get_clean();
}
add_shortcode('team_members', 'team_members_shortcode');

// Force team member creation and clear migration flag for testing
function force_recreate_team_members() {
    // Delete existing team members
    $existing_team = get_posts(array(
        'post_type' => 'team',
        'post_status' => 'any',
        'numberposts' => -1
    ));
    
    foreach ($existing_team as $member) {
        wp_delete_post($member->ID, true);
    }
    
    // Clear migration flag
    delete_option('team_members_migrated');
    
    // Create team members
    create_team_members_from_existing_data();
    
    echo "<p>Team members recreated successfully!</p>";
}

// Add admin function to recreate team members
function add_recreate_team_admin_page() {
    add_submenu_page(
        'edit.php?post_type=team',
        'Recreate Team',
        'Recreate',
        'manage_options',
        'recreate-team',
        'force_recreate_team_members'
    );
}
add_action('admin_menu', 'add_recreate_team_admin_page');

/**
 * Helper function to create sample team members (for testing)
 * Call this once in WordPress admin to create sample data
 * Remove this function after testing
 */
function create_sample_team_members() {
    // Only run once, and only for admins
    if (!current_user_can('manage_options') || get_option('fco_sample_team_created')) {
        return;
    }
    
    $sample_members = array(
        array(
            'title' => 'Dr. John Smith',
            'content' => 'Dr. Smith is a board-certified orthopedic surgeon specializing in sports medicine and joint replacement. He has helped countless athletes return to peak performance and assisted patients in regaining mobility through advanced surgical techniques.',
            'display_order' => 1
        ),
        array(
            'title' => 'Dr. Sarah Johnson',
            'content' => 'Dr. Johnson focuses on pediatric orthopedics and has over 15 years of experience treating young athletes. She is passionate about helping children overcome musculoskeletal challenges and return to active, healthy lifestyles.',
            'display_order' => 2
        ),
        array(
            'title' => 'Dr. Michael Brown',
            'content' => 'Dr. Brown specializes in spine surgery and minimally invasive procedures for back and neck conditions. His innovative approach combines cutting-edge technology with proven surgical techniques.',
            'display_order' => 3
        )
    );
    
    foreach ($sample_members as $member) {
        $post_data = array(
            'post_title' => $member['title'],
            'post_content' => $member['content'],
            'post_status' => 'publish',
            'post_type' => 'team',
            'meta_input' => array(
                '_team_display_order' => $member['display_order']
            )
        );
        
        wp_insert_post($post_data);
    }    // Mark as created so it doesn't run again
    update_option('fco_sample_team_created', true);
}

// Uncomment the line below to create sample team members on admin page load
add_action('admin_init', 'create_sample_team_members');

// Disable block editor for team post type - use classic editor only
add_filter('use_block_editor_for_post_type', 'disable_block_editor_for_team', 10, 2);
function disable_block_editor_for_team($current_status, $post_type) {
    if ($post_type === 'team') {
        return false;
    }
    return $current_status;
}

// Hide the main content editor since we're using the meta box
add_action('admin_head', 'hide_team_content_editor');
function hide_team_content_editor() {
    global $post_type;
    if ($post_type == 'team') {
        echo '<style>#postdivrich { display: none; }</style>';
    }
}

/**
 * FAQ Management System
 */

// Custom meta box for FAQ topic selection (required field)
add_action('add_meta_boxes', 'add_faq_topic_meta_box');
function add_faq_topic_meta_box() {
    // FAQ Question meta box
    add_meta_box(
        'faq_question',
        'FAQ Question (Required)',
        'faq_question_meta_box_callback',
        'faq_item',
        'normal',
        'high'
    );
    
    // FAQ Answer meta box
    add_meta_box(
        'faq_answer',
        'FAQ Answer (Required)',
        'faq_answer_meta_box_callback',
        'faq_item',
        'normal',
        'high'
    );
    
    add_meta_box(
        'faq_topic_selection',
        'FAQ Topic (Required)',
        'faq_topic_meta_box_callback',
        'faq_item',
        'side',
        'high'
    );
    
    // Add featured FAQ meta box
    add_meta_box(
        'faq_featured_selection',
        'Featured FAQ Settings',
        'faq_featured_meta_box_callback',
        'faq_item',
        'side',
        'default'
    );
}

// FAQ Question meta box callback
function faq_question_meta_box_callback($post) {
    wp_nonce_field('save_faq_question', 'faq_question_nonce');
    
    $question = get_post_meta($post->ID, '_faq_question', true);
    
    ?>
    <style>
        .faq-question-input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 3px; font-size: 16px; }
        .faq-question-required { color: #d63638; font-weight: bold; }
        .faq-question-help { color: #666; font-style: italic; margin-top: 5px; }
        .faq-question-container { margin: 10px 0; }
    </style>
    
    <div class="faq-question-container">
        <label for="faq_question"><strong>Question Text <span class="faq-question-required">*</span></strong></label>
        <input type="text" 
               id="faq_question" 
               name="faq_question" 
               value="<?php echo esc_attr($question); ?>"
               class="faq-question-input"
               placeholder="Enter your FAQ question..."
               required>
        <div class="faq-question-help">This will be the question text displayed to users. This field is required.</div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const questionInput = document.getElementById('faq_question');
            const titleInput = document.getElementById('title');
            
            if (questionInput && titleInput) {
                // Auto-sync question to post title
                questionInput.addEventListener('input', function() {
                    titleInput.value = this.value;
                });
                
                // If title is empty, populate from question
                if (!titleInput.value && questionInput.value) {
                    titleInput.value = questionInput.value;
                }
            }
        });
    </script>
    <?php
}

// FAQ Answer meta box callback
function faq_answer_meta_box_callback($post) {
    wp_nonce_field('save_faq_answer', 'faq_answer_nonce');
    
    $answer = get_post_meta($post->ID, '_faq_answer', true);
    
    ?>
    <style>
        .faq-answer-container { margin: 10px 0; }
        .faq-answer-required { color: #d63638; font-weight: bold; }
        .faq-answer-help { color: #666; font-style: italic; margin-top: 5px; }
        .faq-answer-textarea {
            width: 100%;
            min-height: 150px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            resize: vertical;
        }
        .faq-answer-formatting {
            margin-top: 8px;
            font-size: 12px;
            color: #666;
            background: #f9f9f9;
            padding: 8px;
            border-radius: 3px;
        }
    </style>
    
    <div class="faq-answer-container">
        <label for="faq_answer"><strong>Answer <span class="faq-answer-required">*</span></strong></label>
        <div class="faq-answer-help">Provide a clear, detailed answer to the question. Simple formatting will be applied automatically.</div>
        
        <textarea 
            id="faq_answer" 
            name="faq_answer" 
            class="faq-answer-textarea" 
            placeholder="Enter your FAQ answer here..."
            required><?php echo esc_textarea($answer); ?></textarea>
        
        <div class="faq-answer-formatting">
            <strong>Simple formatting tips:</strong><br>
            • Use line breaks for paragraphs<br>
            • **Bold text** will be formatted automatically<br>
            • *Italic text* will be formatted automatically<br>
            • Start lines with - or * for bullet points<br>
            • Links will be auto-detected and clickable
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('post');
            
            if (form) {
                form.addEventListener('submit', function(e) {
                    const answerTextarea = document.getElementById('faq_answer');
                    
                    if (answerTextarea && !answerTextarea.value.trim()) {
                        e.preventDefault();
                        alert('Please provide an answer to the FAQ question.');
                        answerTextarea.focus();
                        return false;
                    }
                });
            }
        });
    </script>
    <?php
}

function faq_topic_meta_box_callback($post) {
    wp_nonce_field('save_faq_topic', 'faq_topic_nonce');
    
    $current_topic = wp_get_post_terms($post->ID, 'faq_topic', array('fields' => 'ids'));
    $current_topic_id = !empty($current_topic) ? $current_topic[0] : '';
    
    $topics = get_terms(array(
        'taxonomy' => 'faq_topic',
        'hide_empty' => false,
    ));
    
    ?>
    <style>
        .faq-topic-select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 3px; }
        .faq-topic-required { color: #d63638; font-weight: bold; }
        .faq-topic-help { color: #666; font-style: italic; margin-top: 5px; }
        .faq-topic-actions { margin-top: 10px; padding-top: 10px; border-top: 1px solid #ddd; }
    </style>
    
    <div class="faq-topic-selection">
        <label for="faq_topic_select"><strong>Select Topic <span class="faq-topic-required">*</span></strong></label>
        <select id="faq_topic_select" name="faq_topic_id" class="faq-topic-select" required>
            <option value="">-- Select a Topic --</option>
            <?php foreach ($topics as $topic): ?>
                <option value="<?php echo esc_attr($topic->term_id); ?>" <?php selected($current_topic_id, $topic->term_id); ?>>
                    <?php echo esc_html($topic->name); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="faq-topic-help">This field is required. The topic determines which tab this FAQ will appear under.</div>
        
        <div class="faq-topic-actions">
            <p><strong>Need a new topic?</strong></p>
            <p><a href="<?php echo admin_url('edit-tags.php?taxonomy=faq_topic&post_type=faq_item'); ?>" target="_blank">Manage FAQ Topics →</a></p>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('post');
            const topicSelect = document.getElementById('faq_topic_select');
            
            if (form && topicSelect) {
                form.addEventListener('submit', function(e) {
                    if (!topicSelect.value) {
                        e.preventDefault();
                        alert('Please select an FAQ Topic before saving.');
                        topicSelect.focus();
                        return false;
                    }
                });
            }
        });
    </script>
    <?php
}

// Featured FAQ meta box callback
function faq_featured_meta_box_callback($post) {
    wp_nonce_field('save_faq_featured', 'faq_featured_nonce');
    
    $is_featured = get_post_meta($post->ID, '_faq_is_featured', true);
    $featured_count = get_posts(array(
        'post_type' => 'faq_item',
        'post_status' => 'publish',
        'numberposts' => -1,
        'meta_query' => array(
            array(
                'key' => '_faq_is_featured',
                'value' => '1',
                'compare' => '='
            )
        ),
        'fields' => 'ids'
    ));
    
    $current_featured_count = count($featured_count);
    
    // Remove current post from count if it's already featured
    if ($is_featured && in_array($post->ID, $featured_count)) {
        $current_featured_count--;
    }
    
    ?>
    <style>
        .faq-featured-container { padding: 10px 0; }
        .faq-featured-checkbox { margin-right: 8px; }
        .faq-featured-warning { color: #d63638; font-weight: bold; margin-top: 10px; }
        .faq-featured-info { color: #135e96; margin-top: 10px; font-style: italic; }
        .faq-featured-count { background: #f0f7ff; padding: 10px; border-left: 4px solid #0073aa; margin: 10px 0; }
        .faq-featured-limit { background: #fff2f2; padding: 10px; border-left: 4px solid #d63638; margin: 10px 0; }
    </style>
    
    <div class="faq-featured-container">
        <label for="faq_is_featured">
            <input type="checkbox" 
                   id="faq_is_featured" 
                   name="faq_is_featured" 
                   value="1" 
                   class="faq-featured-checkbox"
                   <?php checked($is_featured, '1'); ?>
                   <?php echo ($current_featured_count >= 5 && !$is_featured) ? 'disabled' : ''; ?>>
            <strong>Feature on Homepage</strong>
        </label>
        
        <?php if ($current_featured_count >= 5 && !$is_featured): ?>
            <div class="faq-featured-limit">
                <strong>Maximum Reached!</strong><br>
                You already have 5 featured FAQs. To feature this question, you must first unfeature another one.
                <br><br>
                <a href="<?php echo admin_url('edit.php?post_type=faq_item&is_featured=1'); ?>">View Featured FAQs →</a>
            </div>
        <?php else: ?>
            <div class="faq-featured-count">
                <strong>Featured FAQs:</strong> <?php echo $current_featured_count; ?>/5
                <?php if ($is_featured): ?>
                    <br><em>This FAQ is currently featured on the homepage.</em>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <div class="faq-featured-info">
            Featured FAQs appear in a special section on the homepage and are optimized for search engine rich results.
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('faq_is_featured');
            const form = document.getElementById('post');
            
            if (form && checkbox && !checkbox.disabled) {
                form.addEventListener('submit', function(e) {
                    if (checkbox.checked) {
                        const currentCount = <?php echo $current_featured_count; ?>;
                        if (currentCount >= 5) {
                            e.preventDefault();
                            alert('Maximum of 5 featured FAQs allowed. Please unfeature another FAQ first.');
                            checkbox.checked = false;
                            return false;
                        }
                    }
                });
            }
        });
    </script>
    <?php
}

// Save FAQ question and answer
add_action('save_post', 'save_faq_question_answer');
function save_faq_question_answer($post_id) {
    // Verify nonces
    $question_nonce_verified = isset($_POST['faq_question_nonce']) && wp_verify_nonce($_POST['faq_question_nonce'], 'save_faq_question');
    $answer_nonce_verified = isset($_POST['faq_answer_nonce']) && wp_verify_nonce($_POST['faq_answer_nonce'], 'save_faq_answer');
    
    if (!$question_nonce_verified && !$answer_nonce_verified) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (get_post_type($post_id) !== 'faq_item') {
        return;
    }
    
    // Save question
    if ($question_nonce_verified && isset($_POST['faq_question'])) {
        $question = sanitize_text_field($_POST['faq_question']);
        update_post_meta($post_id, '_faq_question', $question);
        
        // Also update post title for admin management
        remove_action('save_post', 'save_faq_question_answer');
        wp_update_post(array(
            'ID' => $post_id,
            'post_title' => $question
        ));
        add_action('save_post', 'save_faq_question_answer');
    }
    
    // Save answer
    if ($answer_nonce_verified && isset($_POST['faq_answer'])) {
        $answer = wp_kses_post($_POST['faq_answer']);
        update_post_meta($post_id, '_faq_answer', $answer);
        
        // Also update post content for fallback
        remove_action('save_post', 'save_faq_question_answer');
        wp_update_post(array(
            'ID' => $post_id,
            'post_content' => $answer
        ));
        add_action('save_post', 'save_faq_question_answer');
    }
}

/**
 * Admin notice about FAQ answer field change
 */
function faq_field_change_admin_notice() {
    $screen = get_current_screen();
    if ($screen && $screen->post_type === 'faq_item') {
        echo '<div class="notice notice-info is-dismissible">';
        echo '<p><strong>FAQ Answer Field Updated:</strong> The answer field now uses simple text formatting instead of the full rich editor. This should improve accordion functionality. Use **bold** and *italic* for basic formatting.</p>';
        echo '</div>';
    }
}
add_action('admin_notices', 'faq_field_change_admin_notice');

// Save FAQ topic selection
add_action('save_post', 'save_faq_topic_selection');
function save_faq_topic_selection($post_id) {
    if (!isset($_POST['faq_topic_nonce']) || !wp_verify_nonce($_POST['faq_topic_nonce'], 'save_faq_topic')) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (get_post_type($post_id) !== 'faq_item') {
        return;
    }
    
    if (isset($_POST['faq_topic_id']) && !empty($_POST['faq_topic_id'])) {
        wp_set_post_terms($post_id, array(intval($_POST['faq_topic_id'])), 'faq_topic');
    }
}

// Save featured FAQ selection
add_action('save_post', 'save_faq_featured_selection');
function save_faq_featured_selection($post_id) {
    if (!isset($_POST['faq_featured_nonce']) || !wp_verify_nonce($_POST['faq_featured_nonce'], 'save_faq_featured')) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (get_post_type($post_id) !== 'faq_item') {
        return;
    }
    
    // Check current featured count before saving
    $current_featured = get_posts(array(
        'post_type' => 'faq_item',
        'post_status' => 'publish',
        'numberposts' => -1,
        'meta_query' => array(
            array(
                'key' => '_faq_is_featured',
                'value' => '1',
                'compare' => '='
            )
        ),
        'fields' => 'ids',
        'exclude' => array($post_id) // Exclude current post from count
    ));
    
    $is_currently_featured = get_post_meta($post_id, '_faq_is_featured', true);
    $wants_to_be_featured = isset($_POST['faq_is_featured']) && $_POST['faq_is_featured'] === '1';
    
    // If trying to feature and already have 5 featured (and this isn't already featured)
    if ($wants_to_be_featured && count($current_featured) >= 5 && !$is_currently_featured) {
        // Don't save the featured status
        add_action('admin_notices', function() {
            echo '<div class="notice notice-error is-dismissible">';
            echo '<p><strong>Error:</strong> Maximum of 5 featured FAQs allowed. Please unfeature another FAQ first.</p>';
            echo '</div>';
        });
        return;
    }
    
    // Save the featured status
    if ($wants_to_be_featured) {
        update_post_meta($post_id, '_faq_is_featured', '1');
    } else {
        delete_post_meta($post_id, '_faq_is_featured');
    }
}

// Add custom columns to FAQ list
add_filter('manage_faq_item_posts_columns', 'add_faq_custom_columns');
function add_faq_custom_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['title'] = 'Question';
    $new_columns['faq_featured'] = 'Featured';
    $new_columns['faq_topic'] = 'Topic';
    $new_columns['answer_preview'] = 'Answer Preview';
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}

// Populate custom columns
add_action('manage_faq_item_posts_custom_column', 'populate_faq_custom_columns', 10, 2);
function populate_faq_custom_columns($column, $post_id) {
    switch ($column) {
        case 'faq_featured':
            $is_featured = get_post_meta($post_id, '_faq_is_featured', true);
            if ($is_featured) {
                echo '<span style="color: #d63638; font-weight: bold;">★ Featured</span>';
            } else {
                echo '<span style="color: #999;">—</span>';
            }
            break;
            
        case 'faq_topic':
            $topics = wp_get_post_terms($post_id, 'faq_topic');
            if (!empty($topics)) {
                $topic_links = array();
                foreach ($topics as $topic) {
                    $topic_links[] = '<a href="' . admin_url('edit.php?post_type=faq_item&faq_topic=' . $topic->slug) . '">' . esc_html($topic->name) . '</a>';
                }
                echo implode(', ', $topic_links);
            } else {
                echo '<span style="color: #d63638;">No Topic Assigned</span>';
            }
            break;
            
        case 'answer_preview':
            // Get custom field answer first, fallback to post content
            $answer = get_post_meta($post_id, '_faq_answer', true);
            if (empty($answer)) {
                $answer = get_post_field('post_content', $post_id);
            }
            
            if ($answer) {
                $preview = wp_trim_words(strip_tags($answer), 15, '...');
                echo esc_html($preview);
            } else {
                echo '<span style="color: #999;">No answer</span>';
            }
            break;
    }
}

// Make columns sortable
add_filter('manage_edit-faq_item_sortable_columns', 'make_faq_columns_sortable');
function make_faq_columns_sortable($columns) {
    $columns['faq_topic'] = 'faq_topic';
    return $columns;
}

// Add Quick Edit functionality for featured FAQ
add_action('quick_edit_custom_box', 'add_faq_quick_edit_fields', 10, 2);
function add_faq_quick_edit_fields($column_name, $post_type) {
    if ($post_type !== 'faq_item' || $column_name !== 'faq_featured') {
        return;
    }
    
    ?>
    <fieldset class="inline-edit-col-right">
        <div class="inline-edit-col">
            <label>
                <span class="title">Featured FAQ</span>
                <span class="input-text-wrap">
                    <input type="checkbox" name="faq_is_featured" value="1">
                    <span class="description">Feature on homepage (max 5)</span>
                </span>
            </label>
        </div>
    </fieldset>
    
    <script>
    jQuery(document).ready(function($) {
        // Populate quick edit form with current values
        var $wp_inline_edit = inlineEditPost.edit;
        inlineEditPost.edit = function(id) {
            $wp_inline_edit.apply(this, arguments);
            
            var $post_id = 0;
            if (typeof(id) == 'object') {
                $post_id = parseInt(this.getId(id));
            }
            
            if ($post_id > 0) {
                var $edit_row = $('#edit-' + $post_id);
                var $post_row = $('#post-' + $post_id);
                
                // Get current featured status from the row
                var $featured_text = $('.column-faq_featured', $post_row).text().trim();
                var $is_featured = $featured_text.includes('Featured');
                
                $('input[name=\"faq_is_featured\"]', $edit_row).prop('checked', $is_featured);
            }
        };
    });
    </script>
    <?php
}

// Save Quick Edit data
add_action('save_post', 'save_faq_quick_edit_data');
function save_faq_quick_edit_data($post_id) {
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (get_post_type($post_id) !== 'faq_item') {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check if this is a quick edit
    if (!isset($_POST['_inline_edit']) || !wp_verify_nonce($_POST['_inline_edit'], 'inlineeditnonce')) {
        return;
    }
    
    // Handle featured FAQ status from quick edit
    if (isset($_POST['faq_is_featured'])) {
        // Check current featured count
        $current_featured = get_posts(array(
            'post_type' => 'faq_item',
            'post_status' => 'publish',
            'numberposts' => -1,
            'meta_query' => array(
                array(
                    'key' => '_faq_is_featured',
                    'value' => '1',
                    'compare' => '='
                )
            ),
            'fields' => 'ids',
            'exclude' => array($post_id)
        ));
        
        $is_currently_featured = get_post_meta($post_id, '_faq_is_featured', true);
        
        if (count($current_featured) >= 5 && !$is_currently_featured) {
            // Don't allow featuring if already at limit
            add_action('admin_notices', function() {
                echo '<div class=\"notice notice-error is-dismissible\">';
                echo '<p><strong>Error:</strong> Maximum of 5 featured FAQs allowed. Please unfeature another FAQ first.</p>';
                echo '</div>';
            });
            return;
        }
        
        update_post_meta($post_id, '_faq_is_featured', '1');
    } else {
        delete_post_meta($post_id, '_faq_is_featured');
    }
}

// FAQ display function with Schema markup
function display_faq_page_content() {
    // Get all FAQ topics
    $topics = get_terms(array(
        'taxonomy' => 'faq_topic',
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC'
    ));
    
    if (empty($topics)) {
        echo '<p>No FAQ items found. Please add some FAQ topics and questions in the WordPress admin.</p>';
        return;
    }
    
    // Collect all FAQ data for Schema markup
    $faq_schema_data = array();
    
    echo '<div class="faq-page-container">';
    

    
    // Add separator between navigation and content
    echo '<div class="faq-navigation-separator"></div>';
    
    // FAQ sections by topic
    echo '<div class="faq-sections">';
    
    foreach ($topics as $topic) {
        $topic_id = 'topic-' . sanitize_title($topic->slug);
        $topic_content_id = $topic_id . '-content';
        
        // Get FAQ items for this topic
        $faq_items = get_posts(array(
            'post_type' => 'faq_item',
            'post_status' => 'publish',
            'numberposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'faq_topic',
                    'field' => 'term_id',
                    'terms' => $topic->term_id,
                ),
            ),
            'orderby' => 'title',
            'order' => 'ASC'
        ));
        
        echo '<section id="' . $topic_id . '" class="faq-topic-section">';
        echo '<h3 class="topic-title" role="button" tabindex="0" aria-controls="' . $topic_content_id . '" aria-expanded="false">' . esc_html($topic->name) . '</h3>';

        if (!empty($faq_items)) {
            echo '<div class="faq-accordion" id="' . $topic_content_id . '" aria-hidden="true" hidden>';
            
            foreach ($faq_items as $faq) {
                $accordion_id = 'faq-' . $faq->ID;
                
                // Get custom field data
                $question = get_post_meta($faq->ID, '_faq_question', true);
                $answer = get_post_meta($faq->ID, '_faq_answer', true);
                
                // Fallback to post title/content if custom fields are empty
                if (empty($question)) {
                    $question = $faq->post_title;
                }
                if (empty($answer)) {
                    $answer = $faq->post_content;
                }
                
                // Add to schema data - Enhanced for AI search engines
                $schema_answer = array(
                    '@type' => 'Answer',
                    'text' => wp_strip_all_tags($answer), // Plain text for basic compatibility
                    'encodingFormat' => 'text/html',
                    'url' => get_permalink($faq->ID) ?: get_faq_page_url() . '#' . $accordion_id,
                    'inLanguage' => 'en-US',
                    'datePublished' => get_the_date('c', $faq->ID),
                    'dateModified' => get_the_modified_date('c', $faq->ID),
                    'author' => array(
                        '@type' => 'Organization',
                        'name' => 'Full Circle Orthopedics and Sports Medicine',
                        'url' => home_url('/')
                    )
                );
                
                // Add formatted HTML answer for better AI understanding
                $formatted_answer = format_faq_answer_text($answer);
                if ($formatted_answer !== wp_strip_all_tags($answer)) {
                    // If formatting exists, include it as additional context
                    $schema_answer['description'] = wp_kses_post($formatted_answer);
                }
                
                $faq_schema_data[] = array(
                    '@type' => 'Question',
                    'name' => $question,
                    'text' => $question, // Duplicate for AI context
                    'answerCount' => 1,
                    'dateCreated' => get_the_date('c', $faq->ID),
                    'acceptedAnswer' => $schema_answer,
                    'inLanguage' => 'en-US',
                    'about' => array(
                        '@type' => 'Thing',
                        'name' => 'Orthopedics',
                        'sameAs' => 'https://en.wikipedia.org/wiki/Orthopedic_surgery'
                    )
                );
                
                echo '<div class="faq-accordion-item">';
                echo '<button class="faq-accordion-trigger" id="' . $accordion_id . '-trigger" aria-controls="' . $accordion_id . '" aria-expanded="false">';
                echo '<span class="faq-question">' . esc_html($question) . '</span>';
                echo '<span class="faq-accordion-icon" aria-hidden="true">+</span>';
                echo '</button>';
                echo '<div class="faq-accordion-content" id="' . $accordion_id . '" aria-labelledby="' . $accordion_id . '-trigger">';
                echo '<div class="faq-answer">' . format_faq_answer_text($answer) . '</div>';
                echo '</div>';
                echo '</div>';
            }
            
            echo '</div>'; // faq-accordion
        } else {
            echo '<p>No FAQ items found for this topic.</p>';
        }
        
        echo '</section>'; // faq-topic-section
    }
    
    echo '</div>'; // faq-sections
    echo '</div>'; // faq-page-container
    
    // Output Enhanced Schema markup for AI search engines
    if (!empty($faq_schema_data)) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'name' => 'Orthopedics Frequently Asked Questions',
            'description' => 'Comprehensive answers to common questions about orthopedic treatments, sports medicine, and non-surgical solutions for joint pain and injuries.',
            'url' => get_faq_page_url(),
            'inLanguage' => 'en-US',
            'datePublished' => get_the_date('c'),
            'dateModified' => get_the_modified_date('c'),
            'author' => array(
                '@type' => 'MedicalOrganization',
                'name' => 'Full Circle Orthopedics and Sports Medicine',
                'url' => home_url('/'),
                'logo' => array(
                    '@type' => 'ImageObject',
                    'url' => home_url('/wp-content/uploads/2022/10/fco-logo.png')
                ),
                'medicalSpecialty' => 'Orthopedics'
            ),
            'about' => array(
                '@type' => 'MedicalCondition',
                'name' => 'Orthopedic Conditions',
                'possibleTreatment' => array(
                    '@type' => 'MedicalTherapy',
                    'name' => 'Non-Surgical Orthopedic Treatment'
                )
            ),
            'mainEntity' => $faq_schema_data,
            'speakable' => array(
                '@type' => 'SpeakableSpecification',
                'cssSelector' => array('.faq-question', '.faq-answer')
            ),
            'audience' => array(
                '@type' => 'MedicalAudience',
                'audienceType' => 'Patient'
            )
        );
        
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>';
    }
}

// Shortcode for FAQ display
function faq_page_shortcode($atts) {
    ob_start();
    display_faq_page_content();
    return ob_get_clean();
}
add_shortcode('faq_page', 'faq_page_shortcode');

// Featured FAQ display function for homepage
function display_featured_faqs() {
    // Get featured FAQ items (maximum 5)
    $featured_faqs = get_posts(array(
        'post_type' => 'faq_item',
        'post_status' => 'publish',
        'numberposts' => 5,
        'meta_query' => array(
            array(
                'key' => '_faq_is_featured',
                'value' => '1',
                'compare' => '='
            )
        ),
        'orderby' => 'menu_order title',
        'order' => 'ASC'
    ));
    
    if (empty($featured_faqs)) {
        return;
    }
    
    // Get the FAQ page URL for the title link
    $faq_page_url = get_faq_page_url();
    
    // Collect FAQ data for Schema markup
    $faq_schema_data = array();
    
    echo '<section class="featured-faq-section" id="featured-faqs">';
    echo '<div class="featured-faq-container">';
    
    // Section title with link to full FAQ page
    echo '<div class="featured-faq-header">';
    echo '<h2 class="featured-faq-title">';
    echo '<a href="' . esc_url($faq_page_url) . '" class="featured-faq-title-link">Frequently Asked Questions</a>';
    echo '</h2>';
    echo '</div>';
    
    // FAQ accordion
    echo '<div class="featured-faq-accordion">';
    
    foreach ($featured_faqs as $index => $faq) {
        $accordion_id = 'featured-faq-' . $faq->ID;
        
        // Get custom field data
        $question = get_post_meta($faq->ID, '_faq_question', true);
        $answer = get_post_meta($faq->ID, '_faq_answer', true);
        
        // Fallback to post title/content if custom fields are empty
        if (empty($question)) {
            $question = $faq->post_title;
        }
        if (empty($answer)) {
            $answer = $faq->post_content;
        }
        
        // Add to schema data with enhanced metadata for AI search engines
        $faq_schema_data[] = array(
            '@type' => 'Question',
            'name' => $question,
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => wp_strip_all_tags($answer),
                'encodingFormat' => 'text/html',
                'url' => get_permalink($faq->ID),
                'inLanguage' => 'en-US',
                'datePublished' => get_the_date('c', $faq->ID),
                'dateModified' => get_the_modified_date('c', $faq->ID),
                'author' => array(
                    '@type' => 'Organization',
                    'name' => 'Full Circle Orthopedics',
                    'url' => home_url()
                ),
                'description' => format_faq_answer_text($answer)
            ),
            'answerCount' => 1,
            'about' => array(
                '@type' => 'Thing',
                'name' => 'Orthopedics',
                'sameAs' => 'https://en.wikipedia.org/wiki/Orthopedic_surgery'
            )
        );
        
        echo '<div class="featured-faq-item">';
        echo '<button class="featured-faq-trigger" id="' . $accordion_id . '-trigger" aria-controls="' . $accordion_id . '" aria-expanded="false">';
        echo '<span class="featured-faq-question">' . esc_html($question) . '</span>';
        echo '<span class="featured-faq-icon" aria-hidden="true">+</span>';
        echo '</button>';
        echo '<div class="featured-faq-content" id="' . $accordion_id . '" aria-labelledby="' . $accordion_id . '-trigger">';
        echo '<div class="featured-faq-answer">' . format_faq_answer_text($answer) . '</div>';
        echo '</div>';
        echo '</div>';
    }
    
    echo '</div>'; // featured-faq-accordion
    
    // Link to full FAQ page
    echo '<div class="featured-faq-footer">';
    echo '<a href="' . esc_url($faq_page_url) . '" class="featured-faq-more-link">View All Questions →</a>';
    echo '</div>';
    
    echo '</div>'; // featured-faq-container
    echo '</section>'; // featured-faq-section
    
    // Output Schema markup for featured FAQs with enhanced AI search engine metadata
    if (!empty($faq_schema_data)) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'name' => 'Frequently Asked Questions - Full Circle Orthopedics',
            'description' => 'Common questions about orthopedic services, treatments, and patient care at Full Circle Orthopedics',
            'author' => array(
                '@type' => 'MedicalOrganization',
                'name' => 'Full Circle Orthopedics',
                'url' => home_url(),
                'medicalSpecialty' => 'Orthopedic surgery'
            ),
            'about' => array(
                '@type' => 'MedicalCondition',
                'name' => 'Orthopedic Conditions',
                'possibleTreatment' => 'Orthopedic surgical and non-surgical treatments'
            ),
            'speakable' => array(
                '@type' => 'SpeakableSpecification',
                'cssSelector' => array('.featured-faq-question', '.featured-faq-answer')
            ),
            'audience' => array(
                '@type' => 'MedicalAudience',
                'audienceType' => 'Patient'
            ),
            'mainEntity' => $faq_schema_data
        );
        
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>';
    }
}

// Shortcode for featured FAQ display
function featured_faqs_shortcode($atts) {
    ob_start();
    display_featured_faqs();
    return ob_get_clean();
}
add_shortcode('featured_faqs', 'featured_faqs_shortcode');

// Create sample FAQ data
function create_sample_faq_data() {
    if (!current_user_can('manage_options') || get_option('fco_sample_faq_created')) {
        return;
    }
    
    // Create FAQ topics
    $topics = array(
        'General Information' => 'General questions about our practice and services',
        'Treatment Options' => 'Questions about available treatments and procedures',
        'Insurance & Billing' => 'Insurance coverage and billing inquiries',
        'Appointments' => 'Scheduling and appointment related questions'
    );
    
    $topic_ids = array();
    foreach ($topics as $topic_name => $topic_description) {
        $term = wp_insert_term($topic_name, 'faq_topic', array(
            'description' => $topic_description,
            'slug' => sanitize_title($topic_name)
        ));
        
        if (!is_wp_error($term)) {
            $topic_ids[$topic_name] = $term['term_id'];
        }
    }
    
    // Create sample FAQ items
    $sample_faqs = array(
        array(
            'topic' => 'General Information',
            'question' => 'What conditions do you treat?',
            'answer' => 'We specialize in treating a wide range of orthopedic conditions including sports injuries, joint pain, fractures, arthritis, spine disorders, and musculoskeletal problems. Our team provides comprehensive care from diagnosis through rehabilitation.'
        ),
        array(
            'topic' => 'General Information',
            'question' => 'Do you accept new patients?',
            'answer' => 'Yes, we are currently accepting new patients. We welcome referrals from physicians and also accept self-referred patients. Please call our office to schedule your initial consultation.'
        ),
        array(
            'topic' => 'Treatment Options',
            'question' => 'Do you offer minimally invasive procedures?',
            'answer' => 'Yes, we offer various minimally invasive procedures including arthroscopic surgery, minimally invasive spine surgery, and other advanced techniques that reduce recovery time and minimize scarring.'
        ),
        array(
            'topic' => 'Treatment Options',
            'question' => 'What is the recovery time for joint replacement?',
            'answer' => 'Recovery time varies depending on the specific procedure and individual factors. Generally, patients can expect 3-6 months for full recovery from joint replacement surgery, with most returning to normal activities within 6-12 weeks.'
        ),
        array(
            'topic' => 'Insurance & Billing',
            'question' => 'What insurance plans do you accept?',
            'answer' => 'We accept most major insurance plans including Medicare, Medicaid, and private insurance. Please contact our billing department to verify your specific coverage before your appointment.'
        ),
        array(
            'topic' => 'Insurance & Billing',
            'question' => 'Do you offer payment plans?',
            'answer' => 'Yes, we offer flexible payment plans for patients who need assistance with medical expenses. Our billing team can work with you to establish a payment plan that fits your budget.'
        ),
        array(
            'topic' => 'Appointments',
            'question' => 'How far in advance should I schedule my appointment?',
            'answer' => 'We recommend scheduling routine appointments 2-4 weeks in advance. For urgent concerns, we offer same-day appointments when available. Emergency cases are seen immediately.'
        ),
        array(
            'topic' => 'Appointments',
            'question' => 'What should I bring to my first appointment?',
            'answer' => 'Please bring a valid photo ID, insurance cards, a list of current medications, any relevant medical records or imaging studies, and a list of questions you may have for the doctor.'
        )
    );
    
    foreach ($sample_faqs as $faq) {
        if (isset($topic_ids[$faq['topic']])) {
            $post_id = wp_insert_post(array(
                'post_title' => $faq['question'],
                'post_content' => $faq['answer'],
                'post_status' => 'publish',
                'post_type' => 'faq_item'
            ));
            
            if ($post_id && !is_wp_error($post_id)) {
                wp_set_post_terms($post_id, array($topic_ids[$faq['topic']]), 'faq_topic');
            }
        }
    }
    
    update_option('fco_sample_faq_created', true);
}

// Disable Gutenberg editor for FAQ items
add_filter('use_block_editor_for_post_type', 'disable_gutenberg_for_faq_items', 10, 2);
function disable_gutenberg_for_faq_items($use_block_editor, $post_type) {
    if ($post_type === 'faq_item') {
        return false;
    }
    return $use_block_editor;
}

// Hide the default editor for FAQ items
add_action('admin_head', 'hide_editor_for_faq_items');
function hide_editor_for_faq_items() {
    global $post_type;
    if ($post_type === 'faq_item') {
        echo '<style>
            #postdivrich { display: none; }
            #titlediv { display: none; }
            .postbox-container #normal-sortables { margin-top: 0; }
            .postbox .inside { padding-top: 10px; }
        </style>';
    }
}

// Uncomment to create sample FAQ data
add_action('admin_init', 'create_sample_faq_data');

// Create FAQ page automatically if it doesn't exist
add_action('after_switch_theme', 'create_faq_page_if_not_exists');
add_action('init', 'ensure_faq_page_exists'); // Also check on every init

function create_faq_page_if_not_exists() {
    ensure_faq_page_exists();
}

function ensure_faq_page_exists() {
    // Check if FAQ page already exists
    $faq_page = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-faq.php'
    ));
    
    if (empty($faq_page)) {
        // Check if a page with slug 'faq' exists
        $faq_page = get_page_by_path('faq');
        
        if (!$faq_page) {
            // Create FAQ page
            $page_data = array(
                'post_title' => 'FAQ',
                'post_content' => 'Welcome to our FAQ page. Find answers to commonly asked questions about our orthopedic services below.',
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_name' => 'faq',
                'post_author' => 1
            );
            
            $page_id = wp_insert_post($page_data);
            
            if ($page_id && !is_wp_error($page_id)) {
                // Set the page template
                update_post_meta($page_id, '_wp_page_template', 'page-faq.php');
                
                // Store the page ID for reference
                update_option('fco_faq_page_id', $page_id);
                
                // Flush rewrite rules to ensure the new page is accessible
                flush_rewrite_rules();
            }
        } else {
            // Update existing page to use FAQ template if it doesn't
            $template = get_post_meta($faq_page->ID, '_wp_page_template', true);
            if ($template !== 'page-faq.php') {
                update_post_meta($faq_page->ID, '_wp_page_template', 'page-faq.php');
                update_option('fco_faq_page_id', $faq_page->ID);
            }
        }
    } else {
        // Store the existing FAQ page ID
        update_option('fco_faq_page_id', $faq_page[0]->ID);
    }
    
    // Ensure FAQ page has a featured image
    ensure_faq_page_featured_image();
}

// Function to ensure FAQ page has a featured image
function ensure_faq_page_featured_image() {
    $faq_page_id = get_option('fco_faq_page_id');
    
    if (!$faq_page_id) {
        return;
    }
    
    // Check if FAQ page already has a featured image
    if (has_post_thumbnail($faq_page_id)) {
        return;
    }
    
    // Look for a suitable medical/orthopedic image in the media library
    $attachment = get_posts(array(
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'post_status' => 'inherit',
        'numberposts' => 1,
        's' => 'SteroidKneeInj', // Look for the medical image we found
        'orderby' => 'date',
        'order' => 'DESC'
    ));
    
    if (!empty($attachment)) {
        // Set the first medical image as featured image
        set_post_thumbnail($faq_page_id, $attachment[0]->ID);
    } else {
        // Fallback: look for any suitable medical-related image
        $medical_keywords = array('doctor', 'medical', 'clinic', 'orthopedic', 'treatment');
        
        foreach ($medical_keywords as $keyword) {
            $attachment = get_posts(array(
                'post_type' => 'attachment',
                'post_mime_type' => 'image',
                'post_status' => 'inherit',
                'numberposts' => 1,
                's' => $keyword,
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            if (!empty($attachment)) {
                set_post_thumbnail($faq_page_id, $attachment[0]->ID);
                break;
            }
        }
    }
}

// Helper function to get FAQ page URL
function get_faq_page_url() {
    // First try to get from stored option
    $faq_page_id = get_option('fco_faq_page_id');
    if ($faq_page_id) {
        $url = get_permalink($faq_page_id);
        if ($url && $url !== get_home_url()) {
            return $url;
        }
    }
    
    // Try to find a page with FAQ page template
    $faq_page = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-faq.php',
        'post_status' => 'publish',
        'numberposts' => 1
    ));
    
    if (!empty($faq_page)) {
        return get_permalink($faq_page[0]->ID);
    }
    
    // Try to find a page with 'faq' in the slug
    $faq_page = get_page_by_path('faq');
    if ($faq_page && $faq_page->post_status === 'publish') {
        return get_permalink($faq_page->ID);
    }
    
    // Try to find any page with 'FAQ' in the title
    $faq_page = get_posts(array(
        'post_type' => 'page',
        'title' => 'FAQ',
        'post_status' => 'publish',
        'numberposts' => 1
    ));
    
    if (!empty($faq_page)) {
        return get_permalink($faq_page[0]->ID);
    }
    
    // If no FAQ page found, create one and return its URL
    ensure_faq_page_exists();
    $faq_page_id = get_option('fco_faq_page_id');
    if ($faq_page_id) {
        return get_permalink($faq_page_id);
    }
    
    // Fallback to home URL with /faq/
    return home_url('/faq/');
}

/**
 * Format simple FAQ answer text with basic formatting
 */
function format_faq_answer_text($text) {
    if (empty($text)) {
        return '';
    }
    
    // Escape HTML for security
    $text = esc_html($text);
    
    // Convert line breaks to paragraphs
    $text = wpautop($text);
    
    // Apply simple formatting
    // **Bold text** -> <strong>Bold text</strong>
    $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
    
    // *Italic text* -> <em>Italic text</em>
    $text = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $text);
    
    // Convert bullet points: lines starting with - or * become list items
    $text = preg_replace('/<p>[\s]*[-\*][\s]*(.*?)<\/p>/', '<li>$1</li>', $text);
    
    // Wrap consecutive list items in ul tags
    $text = preg_replace('/(<li>.*?<\/li>[\s]*)+/', '<ul>$0</ul>', $text);
    
    // Auto-link URLs
    $text = make_clickable($text);
    
    return $text;
}

// Add admin notices for FAQ management
add_action('admin_notices', 'faq_admin_notices');
function faq_admin_notices() {
    global $pagenow, $post_type;
    
    // Notice for FAQ item editing pages
    if ($post_type === 'faq_item' && in_array($pagenow, array('post.php', 'post-new.php'))) {
        echo '<div class="notice notice-info">';
        echo '<p><strong>FAQ Item Management:</strong> Use the custom fields below to manage your FAQ question and answer. The standard title and content editor are disabled for FAQ items.</p>';
        echo '</div>';
    }
    
    if ($pagenow === 'edit.php' && $post_type === 'faq_item') {
        // Check for FAQ items without topics
        $faq_without_topics = get_posts(array(
            'post_type' => 'faq_item',
            'post_status' => 'any',
            'numberposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'faq_topic',
                    'operator' => 'NOT EXISTS'
                )
            )
        ));
        
        if (!empty($faq_without_topics)) {
            echo '<div class="notice notice-warning is-dismissible">';
            echo '<p><strong>FAQ Warning:</strong> ' . count($faq_without_topics) . ' FAQ item(s) do not have topics assigned. ';
            echo 'FAQ items without topics will not appear on the FAQ page. ';
            echo '<a href="' . admin_url('edit-tags.php?taxonomy=faq_topic&post_type=faq_item') . '">Manage FAQ Topics</a></p>';
            echo '</div>';
        }
        
        // Check if any topics exist
        $topics_count = wp_count_terms(array('taxonomy' => 'faq_topic', 'hide_empty' => false));
        if ($topics_count === 0) {
            echo '<div class="notice notice-info is-dismissible">';
            echo '<p><strong>Getting Started:</strong> Create FAQ topics first, then add FAQ items. ';
            echo '<a href="' . admin_url('edit-tags.php?taxonomy=faq_topic&post_type=faq_item') . '" class="button button-primary">Create FAQ Topics</a></p>';
            echo '</div>';
        }
    }
}

// Customize FAQ post list filters
add_action('restrict_manage_posts', 'add_faq_topic_filter');
function add_faq_topic_filter() {
    global $typenow;
    
    if ($typenow === 'faq_item') {
        $selected = isset($_GET['faq_topic']) ? $_GET['faq_topic'] : '';
        $topics = get_terms(array(
            'taxonomy' => 'faq_topic',
            'hide_empty' => false,
        ));
        
        if (!empty($topics)) {
            echo '<select name="faq_topic" id="faq_topic">';
            echo '<option value="">All FAQ Topics</option>';
            foreach ($topics as $topic) {
                echo '<option value="' . $topic->slug . '"' . selected($selected, $topic->slug, false) . '>' . $topic->name . '</option>';
            }
            echo '</select>';
        }
    }
}

// Handle FAQ topic filter
add_filter('parse_query', 'filter_faqs_by_topic');
function filter_faqs_by_topic($query) {
    global $pagenow;
    
    if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'faq_item' && isset($_GET['faq_topic']) && $_GET['faq_topic'] !== '') {
        $query->query_vars['tax_query'] = array(
            array(
                'taxonomy' => 'faq_topic',
                'field' => 'slug',
                'terms' => $_GET['faq_topic']
            )
        );
    }
}

/**
 * Team Member Custom Fields
 */

// Add meta box for team member details
add_action('add_meta_boxes', 'add_team_member_meta_boxes');
function add_team_member_meta_boxes() {
    add_meta_box(
        'team_member_details',
        'Team Member Details',
        'team_member_details_callback',
        'team',
        'normal',
        'high'
    );
}

// Meta box callback function
function team_member_details_callback($post) {
    // Add nonce for security
    wp_nonce_field('save_team_member_details', 'team_member_nonce');
    
    // Get current values
    $member_name = $post->post_title;
    $member_position = get_post_meta($post->ID, '_team_position', true);
    $member_bio = $post->post_content;
    $display_order = get_post_meta($post->ID, '_team_display_order', true);
    
    // Get additional fields
    $email = get_post_meta($post->ID, '_team_email', true);
    $phone = get_post_meta($post->ID, '_team_phone', true);
    $linkedin = get_post_meta($post->ID, '_team_linkedin', true);
    $specialties = get_post_meta($post->ID, '_team_specialties', true);
    $education = get_post_meta($post->ID, '_team_education', true);
    $experience = get_post_meta($post->ID, '_team_experience', true);
    $certifications = get_post_meta($post->ID, '_team_certifications', true);
    
    ?>
    <style>
        .team-simple-form { max-width: 100%; }
        .team-form-field { margin-bottom: 20px; padding: 15px; background: #f9f9f9; border-radius: 5px; }
        .team-form-field label { font-weight: bold; display: block; margin-bottom: 8px; font-size: 14px; }
        .team-form-field input[type="text"], 
        .team-form-field input[type="email"],
        .team-form-field input[type="url"],
        .team-form-field textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 3px; font-size: 14px; }
        .team-form-field textarea { height: 120px; resize: vertical; }
        .team-form-field input[type="number"] { width: 100px; }
        .team-form-field small { color: #666; font-style: italic; }
        .team-instructions { background: #e8f4f8; padding: 15px; border-left: 4px solid #0073aa; margin-top: 20px; }
        .team-form-tabs { margin-bottom: 20px; }
        .team-form-tabs button { background: #f1f1f1; border: 1px solid #ccc; padding: 10px 15px; margin-right: 5px; cursor: pointer; }
        .team-form-tabs button.active { background: #0073aa; color: white; }
        .team-tab-content { display: none; }
        .team-tab-content.active { display: block; }
        .team-form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        @media (max-width: 768px) { .team-form-grid { grid-template-columns: 1fr; } }
    </style>
    
    <div class="team-simple-form">
        <div class="team-form-tabs">
            <button type="button" onclick="showTab('basic')" class="team-tab-btn active" data-tab="basic">Basic Info</button>
            <button type="button" onclick="showTab('contact')" class="team-tab-btn" data-tab="contact">Contact Details</button>
            <button type="button" onclick="showTab('professional')" class="team-tab-btn" data-tab="professional">Professional Info</button>
        </div>
        
        <!-- Basic Information Tab -->
        <div id="basic-tab" class="team-tab-content active">
            <div class="team-form-field">
                <label for="team_member_name">Team Member Name</label>
                <input type="text" id="team_member_name" name="team_member_name" value="<?php echo esc_attr($member_name); ?>" placeholder="e.g., Tuyet (Maya) Vuu" />
                <small>This will be the title/name displayed everywhere</small>
            </div>
            
            <div class="team-form-field">
                <label for="team_member_position">Position</label>
                <input type="text" id="team_member_position" name="team_member_position" value="<?php echo esc_attr($member_position); ?>" placeholder="e.g., Licensed Massage Therapist" />
                <small>Job title or position (e.g., Doctor, Therapist, Administrator)</small>
            </div>
            
            <div class="team-form-field">
                <label for="team_member_bio">Mini Bio</label>
                <textarea id="team_member_bio" name="team_member_bio" placeholder="Write a brief bio about this team member..."><?php echo esc_textarea($member_bio); ?></textarea>
                <small>This bio will be displayed on team member cards and individual pages</small>
            </div>
            
            <div class="team-form-field">
                <label for="team_display_order">Display Order (Optional)</label>
                <input type="number" id="team_display_order" name="team_display_order" value="<?php echo esc_attr($display_order); ?>" placeholder="1" min="1" />
                <small>Lower numbers appear first (1, 2, 3...). Leave blank for alphabetical order.</small>
            </div>
        </div>
        
        <!-- Contact Details Tab -->
        <div id="contact-tab" class="team-tab-content">
            <div class="team-form-grid">
                <div class="team-form-field">
                    <label for="team_member_email">Email Address</label>
                    <input type="email" id="team_member_email" name="team_member_email" value="<?php echo esc_attr($email); ?>" placeholder="email@example.com" />
                    <small>Professional email address</small>
                </div>
                
                <div class="team-form-field">
                    <label for="team_member_phone">Phone Number</label>
                    <input type="text" id="team_member_phone" name="team_member_phone" value="<?php echo esc_attr($phone); ?>" placeholder="(555) 123-4567" />
                    <small>Direct phone number (optional)</small>
                </div>
            </div>
            
            <div class="team-form-field">
                <label for="team_member_linkedin">LinkedIn Profile</label>
                <input type="url" id="team_member_linkedin" name="team_member_linkedin" value="<?php echo esc_attr($linkedin); ?>" placeholder="https://linkedin.com/in/username" />
                <small>Full LinkedIn profile URL (optional)</small>
            </div>
        </div>
        
        <!-- Professional Information Tab -->
        <div id="professional-tab" class="team-tab-content">
            <div class="team-form-field">
                <label for="team_member_specialties">Specialties</label>
                <textarea id="team_member_specialties" name="team_member_specialties" placeholder="List areas of specialization..."><?php echo esc_textarea($specialties); ?></textarea>
                <small>Areas of expertise or specialization</small>
            </div>
            
            <div class="team-form-field">
                <label for="team_member_education">Education</label>
                <textarea id="team_member_education" name="team_member_education" placeholder="Educational background..."><?php echo esc_textarea($education); ?></textarea>
                <small>Educational qualifications and institutions</small>
            </div>
            
            <div class="team-form-field">
                <label for="team_member_experience">Professional Experience</label>
                <textarea id="team_member_experience" name="team_member_experience" placeholder="Years of experience, previous positions..."><?php echo esc_textarea($experience); ?></textarea>
                <small>Professional background and experience</small>
            </div>
            
            <div class="team-form-field">
                <label for="team_member_certifications">Certifications & Licenses</label>
                <textarea id="team_member_certifications" name="team_member_certifications" placeholder="Professional certifications and licenses..."><?php echo esc_textarea($certifications); ?></textarea>
                <small>Professional certifications, licenses, and credentials</small>
            </div>
        </div>
    </div>
    
    <script>
    function showTab(tabName) {
        // Hide all tabs
        document.querySelectorAll('.team-tab-content').forEach(function(tab) {
            tab.classList.remove('active');
        });
        
        // Remove active class from all buttons
        document.querySelectorAll('.team-tab-btn').forEach(function(btn) {
            btn.classList.remove('active');
        });
        
        // Show selected tab
        document.getElementById(tabName + '-tab').classList.add('active');
        
        // Add active class to clicked button
        document.querySelector('[data-tab="' + tabName + '"]').classList.add('active');
    }
    </script>
    
    <div class="team-instructions">
        <h3 style="margin-top: 0;">📸 How to Add a Photo</h3>
        <p><strong>Look for the "Featured Image" box</strong> on the right side of this page (or below on mobile).</p>
        <p>Click <strong>"Set featured image"</strong> → Upload or select the team member's photo → Click <strong>"Set featured image"</strong> button.</p>
        <p>The photo will automatically appear in the team member cards and individual pages.</p>
    </div>
    <?php
}

// Save meta box data
add_action('save_post', 'save_team_member_details');
function save_team_member_details($post_id) {
    // Check if nonce is valid
    if (!isset($_POST['team_member_nonce']) || !wp_verify_nonce($_POST['team_member_nonce'], 'save_team_member_details')) {
        return;
    }
    
    // Check if user has permission to edit the post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Check if not an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check if this is the team post type
    if (get_post_type($post_id) !== 'team') {
        return;
    }

    // Prevent infinite loops
    remove_action('save_post', 'save_team_member_details');
    
    // Prepare update data
    $update_data = array('ID' => $post_id);
    
    // Update post title and content in one call
    if (isset($_POST['team_member_name']) && !empty($_POST['team_member_name'])) {
        $update_data['post_title'] = sanitize_text_field($_POST['team_member_name']);
    }
    
    if (isset($_POST['team_member_bio'])) {
        $update_data['post_content'] = wp_kses_post($_POST['team_member_bio']);
    }
    
    // Update post if we have data to update
    if (count($update_data) > 1) {
        wp_update_post($update_data);
    }
    
    // Save basic info meta fields
    if (isset($_POST['team_member_position'])) {
        update_post_meta($post_id, '_team_position', sanitize_text_field($_POST['team_member_position']));
        // Also save as 'position' for backward compatibility
        update_post_meta($post_id, 'position', sanitize_text_field($_POST['team_member_position']));
    }
    
    if (isset($_POST['team_display_order'])) {
        update_post_meta($post_id, '_team_display_order', intval($_POST['team_display_order']));
    }
    
    // Save contact info meta fields
    if (isset($_POST['team_member_email'])) {
        update_post_meta($post_id, '_team_email', sanitize_email($_POST['team_member_email']));
        update_post_meta($post_id, 'email', sanitize_email($_POST['team_member_email']));
    }
    
    if (isset($_POST['team_member_phone'])) {
        update_post_meta($post_id, '_team_phone', sanitize_text_field($_POST['team_member_phone']));
        update_post_meta($post_id, 'phone', sanitize_text_field($_POST['team_member_phone']));
    }
    
    if (isset($_POST['team_member_linkedin'])) {
        update_post_meta($post_id, '_team_linkedin', esc_url_raw($_POST['team_member_linkedin']));
        update_post_meta($post_id, 'linkedin', esc_url_raw($_POST['team_member_linkedin']));
    }
    
    // Save professional info meta fields
    if (isset($_POST['team_member_specialties'])) {
        update_post_meta($post_id, '_team_specialties', wp_kses_post($_POST['team_member_specialties']));
        update_post_meta($post_id, 'specialties', wp_kses_post($_POST['team_member_specialties']));
    }
    
    if (isset($_POST['team_member_education'])) {
        update_post_meta($post_id, '_team_education', wp_kses_post($_POST['team_member_education']));
        update_post_meta($post_id, 'education', wp_kses_post($_POST['team_member_education']));
    }
    
    if (isset($_POST['team_member_experience'])) {
        update_post_meta($post_id, '_team_experience', wp_kses_post($_POST['team_member_experience']));
        update_post_meta($post_id, 'experience', wp_kses_post($_POST['team_member_experience']));
    }
    
    if (isset($_POST['team_member_certifications'])) {
        update_post_meta($post_id, '_team_certifications', wp_kses_post($_POST['team_member_certifications']));
        update_post_meta($post_id, 'certifications', wp_kses_post($_POST['team_member_certifications']));
    }
    
    // Also save bio as 'bio' for backward compatibility
    if (isset($_POST['team_member_bio'])) {
        update_post_meta($post_id, 'bio', wp_kses_post($_POST['team_member_bio']));
    }
    
    // Re-add the action
    add_action('save_post', 'save_team_member_details');
}

// Add custom columns to team post list
add_filter('manage_team_posts_columns', 'add_team_custom_columns');
function add_team_custom_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['featured_image'] = 'Photo';
    $new_columns['title'] = 'Name';
    $new_columns['position'] = 'Position';
    $new_columns['bio_preview'] = 'Bio Preview';
    $new_columns['display_order'] = 'Order';
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}

// Populate custom columns
add_action('manage_team_posts_custom_column', 'populate_team_custom_columns', 10, 2);
function populate_team_custom_columns($column, $post_id) {
    switch ($column) {
        case 'featured_image':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(50, 50));
            } else {
                echo '<span style="color: #999;">No photo</span>';
            }
            break;
            
        case 'position':
            $position = get_post_meta($post_id, '_team_position', true);
            if ($position) {
                echo esc_html($position);
            } else {
                echo '<span style="color: #999;">No position</span>';
            }
            break;
            
        case 'bio_preview':
            $content = get_post_field('post_content', $post_id);
            if ($content) {
                $preview = wp_trim_words(strip_tags($content), 12, '...');
                echo esc_html($preview);
            } else {
                echo '<span style="color: #999;">No bio</span>';
            }
            break;
            
        case 'display_order':
            $order = get_post_meta($post_id, '_team_display_order', true);
            echo $order ? esc_html($order) : '<span style="color: #999;">-</span>';
            break;
    }
}

// Make custom columns sortable
add_filter('manage_edit-team_sortable_columns', 'make_team_columns_sortable');
function make_team_columns_sortable($columns) {
    $columns['display_order'] = 'display_order';
    return $columns;
}

// Handle sorting
add_action('pre_get_posts', 'team_custom_orderby');
function team_custom_orderby($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }
    
    if ($query->get('post_type') !== 'team') {
        return;
    }
    
    $orderby = $query->get('orderby');
    
    if ('display_order' === $orderby) {
        $query->set('meta_key', '_team_display_order');
        $query->set('orderby', 'meta_value_num');
    }
}

/**
 * Body Class Filter Hook.
**/
add_filter( 'body_class', function( $classes ) {
    array_unshift($classes, 'fco');
	if(is_page('podcasts')){
		array_unshift($classes, 'podcasts');
	}

	if(is_page('resources')){
		array_unshift($classes, 'resources');
	}

	if (is_child_of_aftercare()) {
		array_push($classes, 'aftercare');
	}

    return $classes;
} );

/**
 * Post Class Filter Hook.
**/
add_filter( 'post_class', function( $classes ) {
	// if(feat_in_cat()) {
	// 	array_push($classes, 'featured-in-category');
	// }
    return $classes;
} );

/**
 * Force Sticky Post First.
**/
add_filter('the_posts', 'force_sticky_posts_up_top');
function force_sticky_posts_up_top($posts) {
    $stickies = array();
    foreach($posts as $i => $post) {
        if(is_sticky($post->ID)) {
            $stickies[] = $post;
            unset($posts[$i]);
        }
    }
    return array_merge($stickies, $posts);
}

// Simple function to check if hero section should be displayed
function should_display_hero_section() {
    // Don't show default hero on front page (using Smart Slider instead)
    if (is_front_page()) {
        return false;
    }
    return !pages_without_hero();
}

add_filter( 'get_the_archive_title', function ($title) {    
	if ( is_category() ) {    
		$title = '<span>'.single_cat_title( '', false ).'</span>';    
	}
	return $title;    
});


function excerpt_for_aftercare_pages() {
    $aftercare_page = get_page_by_path('aftercare'); 
    if ($aftercare_page) {
        $args = array(
            'post_type' => 'page',
            'post_parent' => $aftercare_page->ID,
            'posts_per_page' => -1,
        );
        $child_pages = get_posts($args);
        foreach ($child_pages as $child_page) {
            add_post_type_support('page', 'excerpt', array('post_id' => $child_page->ID));
        }
    }
}
add_action('init', 'excerpt_for_aftercare_pages');

/**
 * Defer the reCAPTCHA script until after the page loads
 *
 * @link https://wpforms.com/developers/how-to-defer-the-recaptcha-script/
 */
function fco_hcaptcha_add_async_defer( $tag, $handle ) {  
    if ( strpos( $tag, 'https://www.google.com/recaptcha/api.js?render=' ) !== false ) {
        $tag = str_replace( ' src', ' defer async="async" src', $tag ); 
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'fco_hcaptcha_add_async_defer', 99, 2 );


// Enable shortcodes in widget text
add_filter('widget_text', 'do_shortcode');


/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-fco-svg-icons.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Posts additions.
 */
require get_template_directory() . '/inc/custom-posts.php';

/**
 * SIMPLE TEST - This should work if WordPress is loading our functions
 */
add_action('admin_head', function() {
    echo '<script>console.log("FCO Theme functions.php is loading!");</script>';
});

// Enable meta boxes in Gutenberg editor
add_filter('use_block_editor_for_post_type', function($use_block_editor, $post_type) {
    if ($post_type === 'page') {
        // Force meta boxes to show in block editor
        add_filter('screen_options_show_screen', '__return_true');
    }
    return $use_block_editor;
}, 10, 2);



// Force classic editor for testing (temporary)
add_filter('use_block_editor_for_post_type', function($use_block_editor, $post_type) {
    if (isset($_GET['classic']) && $_GET['classic'] === '1') {
        return false; // Use classic editor
    }
    return $use_block_editor;
}, 10, 2);

/**
 * Custom Shortcodes additions.
 */
require get_template_directory() . '/inc/custom-shortcodes.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Create comprehensive FAQ items for Full Circle Orthopedics
 * This function creates FAQ topics and items with detailed medical answers
 */
function create_comprehensive_faq_items() {
    // Define all FAQ categories with their questions and detailed answers
    $faq_data = array(
        'Regenerative & Non-Surgical Treatment Options' => array(
            'Are there nonsurgical treatments available for my joint pain?' => 'Many joint conditions improve without surgery through conservative care. A combination of rest, targeted exercises, anti-inflammatory medications, and injections like corticosteroids or hyaluronic acid can relieve pain and delay more invasive procedures. Always discuss options with a qualified orthopedist.

- Rest, ice, compression, and elevation (RICE): foundational for reducing swelling and pain
- Physical therapy helps strengthen supporting muscles to improve stability and function
- Injections such as corticosteroids or PRP can temporarily ease inflammation and pain
- Healthy lifestyle changes, including weight management and diet adjustments, support joint health

For personalized guidance on non-surgical solutions, consult an orthopedic specialist or physiotherapist.',
            
            'How do I treat my knee pain without surgery?' => 'Knee pain often responds well to conservative treatment. Rest, exercise, braces, and targeted injections may reduce discomfort and restore mobility. Surgery is typically reserved for severe or persistent cases.

Start with RICE and NSAIDs to control inflammation.

Strengthening exercises for quadriceps and hamstrings improve knee support.

Consider knee braces or orthotics for additional stability during recovery.

Injections like corticosteroids or hyaluronic acid may provide medium-term relief.

If pain persists for more than a few weeks, schedule an evaluation with a knee specialist for a tailored treatment plan.',

            'How do I treat my shoulder pain without surgery?' => 'Non-surgical treatment for shoulder pain includes activity modification, anti-inflammatory therapy, and structured physical therapy focused on rotator cuff and scapular stability. These measures often restore comfort and function.

First-line treatment involves rest, ice, and over-the-counter anti-inflammatory medication.

Physical therapy targets specific weaknesses and improves range of motion.

Corticosteroid injections may help reduce pain during rehab.

Lifestyle adjustments, such as posture correction and ergonomic changes, can lessen strain.

For persistent pain or weakness, consult an orthopedist to explore targeted therapies or injections.',

            'How do I treat my elbow pain without surgery?' => 'Elbow pain, often caused by overuse injuries like tennis or golfer\'s elbow, usually improves with conservative care. Rest, braces, physical therapy, and anti-inflammatory treatments can relieve pain and restore strength.

Avoid activities that aggravate the pain while you heal.

Use a brace or strap to reduce strain on the elbow tendons.

Follow a physical therapy program focusing on stretching and strengthening the forearm.

Ice and NSAIDs reduce inflammation and pain.

Persistent elbow discomfort warrants a medical evaluation to rule out more serious injuries.',

            'Non-surgical treatments for joint pain and injuries' => 'Conservative management often succeeds in managing joint pain. Strategies include RICE, activity modification, physical therapy, weight management, and injections. Such steps can reduce pain and enhance mobility without surgical intervention.

RICE and anti-inflammatories for immediate pain relief.

Structured exercise restores strength and flexibility.

Joint injections provide targeted relief; PRP and hyaluronic acid are options.

Nutrition and weight control lessen stress on joints.

Seek professional guidance to tailor non-surgical therapies to your specific condition.',

            'How to relieve my joint pain?' => 'Pain relief starts with rest, careful exercise, and anti-inflammatory measures. Lifestyle modifications, including maintaining a healthy weight and diet, also support joint health.

Rest and ice reduce acute pain and swelling.

NSAIDs and topical creams relieve mild to moderate discomfort.

Strengthening and flexibility exercises improve joint stability and function.

Nutritional supplements like omega-3 and glucosamine may support joint health.

Consult with your healthcare provider before starting new treatments or supplements.',

            'Can knee pain go away without surgery?' => 'Yes, many knee issues resolve with non-surgical care. Minor meniscus tears, sprains, and early arthritis often improve with rest, physical therapy, braces, and injections.

Appropriate rest and gradual return to activity are key.

Targeted exercise strengthens knee-supporting muscles.

Braces and orthotics can offload stress during healing.

Anti-inflammatory medication or injections manage pain effectively.

Persistent or worsening pain requires evaluation by an orthopedic specialist.',

            'Are gel injections good for knees?' => 'Gel (hyaluronic acid) injections can provide lubricating relief for osteoarthritic knees, especially when other therapies fail. Many patients experience moderate pain relief lasting several months.

Viscosupplementation replenishes lost joint lubrication.

Treatment cycles typically span one to five injections.

Pain relief often begins several weeks after the series is completed.

Results vary, and repeat treatments may be necessary.

Discuss your candidacy with a knee specialist to decide if gel injections are suitable for you.',

            'What foods or supplements help with joint pain?' => 'Anti-inflammatory diets featuring fish, fruits, vegetables, and whole grains can mitigate joint discomfort. Supplements like glucosamine, chondroitin, and omega-3s may offer additional support.

Omega-3 fatty acids from fish oil reduce inflammatory markers.

Turmeric and curcumin have natural anti-inflammatory properties.

Glucosamine and chondroitin may help maintain cartilage health.

Maintain a balanced diet to support overall joint function.

Always consult a healthcare professional before introducing new supplements to your regimen.',

            'Should I get a cortisone shot?' => 'Cortisone injections can provide rapid relief from inflammation and pain, particularly for arthritis or tendonitis. However, they are typically short-term solutions and not curative.

Effective for acute flares when swelling and pain are severe.

Can last weeks to months, but repeated injections are limited.

May have side effects, including temporary elevated blood sugar or tissue weakening.

Best used in combination with physical therapy and lifestyle modifications.

Speak with your healthcare provider to evaluate the benefits versus risks for your specific situation.',

            'Are cortisone shots bad for you?' => 'When used judiciously, cortisone injections are generally safe. Overuse, however, can lead to complications like tissue thinning, increased blood sugar, or infection risk.

Follow medical guidance on injection frequency and volume.

Monitor for side effects like facial flushing or headache.

Combine with rehab for optimal long-term benefits.

Not a permanent solution; continued lifestyle and exercise changes remain essential.

Discuss your health history with your physician to ensure cortisone is a safe option.',

            'Can I regenerate my cartilage?' => 'Cartilage has limited natural healing capacity. While non-surgical treatments can relieve symptoms, true regeneration typically requires surgical or experimental procedures, such as microfracture or stem-cell therapies.

No proven diet or supplement will regrow cartilage.

Physical therapy can delay further degeneration by strengthening surrounding tissue.

Surgical options exist for focal defects but not for widespread arthritis.

Regenerative medicine like PRP or stem cells is still under study.

Consult an orthopedic surgeon to explore the best options for your condition.',

            'Can I regenerate my tendon tear?' => 'Small or partial tendon tears often heal with conservative care, but complete tears usually require surgical repair. Regenerative therapies like PRP may enhance healing, yet evidence varies.

Rest and immobilization allow partial tears to heal.

Physiotherapy restores function and prevents re-injury.

PRP and stem-cell injections may accelerate recovery.

Surgery is often necessary for complete ruptures.

Seek evaluation by a specialist to determine the best treatment for your injury.'
        ),

        'PRP, A2M & Biologic Therapies' => array(
            'What is PRP?' => 'Platelet-Rich Plasma (PRP) therapy uses a concentrated portion of your own blood to deliver growth factors to injured tissues. This approach aims to accelerate healing by stimulating your body\'s natural repair processes.

Blood drawn and centrifuged to isolate platelets.

Injection into the injury site delivers growth factors and proteins.

Typically used for tendon, ligament, and mild arthritis conditions.

Low risk of reaction, since it\'s autologous.

Discuss the benefits and limitations of PRP with a trained provider before proceeding.',

            'What are plasma injections?' => 'Plasma injections refer to PRP, using a patient\'s own plasma enriched with platelets. The goal is to reduce pain and accelerate recovery by stimulating tissue repair.

Same-day procedure with minimal downtime.

Autologous source reduces risk of complications.

Evidence supports use in some tendon and joint conditions.

Results vary, and multiple sessions may be needed.

Consult an orthopedic specialist experienced in biologic injections to determine if it\'s right for you.',

            'Can PRP help shoulder pain?' => 'PRP injections can aid healing in certain shoulder conditions like rotator cuff injuries or tendinopathy. Results vary, but many patients report decreased pain and improved function over time.

Targets the damaged tissue to promote healing.

May reduce reliance on medications or surgery.

Minimal recovery time, usually done outpatient.

Outcomes depend on injury severity and patient factors.

Speak with a sports medicine or orthopedic expert to see if PRP is appropriate for your shoulder issue.',

            'Can PRP help knee pain?' => 'PRP shows promise for mild to moderate osteoarthritis and some ligament or tendon injuries. It may lessen pain and improve joint function, particularly when conventional therapy plateaus.

Growth factors in PRP can modulate inflammation and aid tissue repair.

Best results often seen in early-stage arthritis.

Series of injections might be necessary.

Combination with exercise maximizes benefits.

A consultation with an experienced clinician will help determine if PRP suits your knee concerns.',

            'Can PRP help foot pain?' => 'For plantar fasciitis or Achilles tendinopathy, PRP may reduce pain and expedite recovery. Though results are mixed, some patients benefit when standard therapies fail.

Stimulates healing in chronic tendon injuries.

Reduces inflammation and promotes tissue regeneration.

Often used in conjunction with physical therapy.

Not first-line treatment; reserved for persistent cases.

Discuss potential benefits and expected outcomes with a foot and ankle specialist.',

            'Can PRP help hip pain?' => 'PRP is increasingly explored for conditions like gluteal tendinopathy and hip labral damage. While research is still evolving, some patients experience reduced pain and better function.

Concentrated growth factors can aid healing in soft tissues.

May delay or avoid surgery for certain injuries.

Used when conservative care hasn\'t relieved symptoms.

Variable results, depending on the condition.

Consult your orthopedic provider for personalized recommendations and realistic expectations.',

            'What is A2M?' => 'Alpha-2-Macroglobulin (A2M) is a blood protein that binds inflammatory molecules. Therapeutically, it is injected into joints to neutralize enzymes that contribute to cartilage breakdown.

Blocks inflammatory enzymes implicated in arthritis progression.

Derived from your blood, similar to PRP.

Emerging therapy, with limited long-term research.

Often combined with PRP for joint injections.

Discuss the role and evidence of A2M therapy with a specialist if you are considering biologic treatments.',

            'What is leukocyte-rich PRP?' => 'Leukocyte-rich PRP contains higher concentrations of white blood cells alongside platelets. It aims to harness immune cells\' healing potential but may also increase inflammation.

Higher white blood cells may stimulate early inflammatory processes.

Used for conditions requiring a stronger regenerative response.

Potentially more swelling or soreness post-injection.

Less commonly used for joints; more often for tendons.

Ask your provider if leukocyte-rich PRP is appropriate for your injury type.',

            'What is leukocyte-poor PRP?' => 'Leukocyte-poor PRP isolates platelets while minimizing white blood cells, aiming to reduce inflammation while maintaining growth factor concentration.

Lower inflammatory response than leukocyte-rich PRP.

Preferred for joint injections and osteoarthritis.

Typically better tolerated, with less post-injection pain.

Technique matters for consistent results.

Consult an expert to ensure the proper PRP formulation for your specific case.',

            'What is monocyte-rich PRP?' => 'Monocyte-rich PRP concentrates a subset of white blood cells known as monocytes, which release growth factors and aid tissue healing. This emerging formulation is under investigation for improved regenerative outcomes.

Monocytes support tissue repair and reduce inflammation.

Used in research for hair restoration and soft-tissue healing.

Limited clinical evidence at present.

Potentially enhances PRP\'s regenerative effects.

Speak with a specialist familiar with advanced PRP techniques before considering monocyte-rich formulations.'
        ),

        'Shockwave & Other Regenerative Modalities' => array(
            'What is shockwave?' => 'Shockwave therapy uses acoustic waves delivered to the affected area to stimulate healing. This non-invasive treatment is used for tendon injuries, plantar fasciitis, and calcific shoulder conditions.

Creates microtrauma to trigger the body\'s repair response.

Typically involves multiple sessions over weeks.

Minimal downtime with few side effects.

Effective for chronic injuries when other treatments fail.

Ask your sports medicine provider about whether shockwave therapy is appropriate for your condition.',

            'Is all of shockwave the same?' => 'No. There are high-energy and low-energy versions, often called focused shockwave and radial pressure wave therapy. Each delivers different intensities and penetration depths.

High-energy shockwave penetrates deeper and treats calcific deposits.

Radial or low-energy variants mainly address superficial soft tissue.

Treatment choice depends on the injury location and severity.

Consult an experienced provider to choose the right modality.

Understanding these differences helps ensure you receive the most suitable treatment.',

            'Is shockwave better than laser?' => 'Both shockwave and laser therapy offer non-invasive pain relief and tissue healing. Neither is universally superior; the best option depends on your condition and individual response.

Shockwave is more mechanical, stimulating tissue repair through pressure.

Laser therapy uses light to reduce inflammation and promote cell activity.

Clinical outcomes vary by condition and practitioner skill.

Personal preference and tolerability also play roles.

Discuss both modalities with a healthcare professional to determine which best suits your needs.',

            'Is shockwave better than cold plunge?' => 'Shockwave directly targets injured tissue, while cold plunges are systemic, easing muscle soreness via cold exposure. Each serves different purposes.

Shockwave is used for chronic tendon or ligament injuries.

Cold plunges reduce generalized post-exercise inflammation.

Different mechanisms, so they are not directly comparable.

Both can complement a rehabilitation program when used appropriately.

Your provider can advise whether shockwave, cold therapy, or a combination is suitable for your recovery.',

            'Is shockwave better than red light therapy?' => 'Shockwave promotes mechanical tissue healing, while red light therapy stimulates cells with light energy. Neither is universally superior; effectiveness depends on the condition being treated.

Shockwave is effective for calcific tendinitis and plantar fasciitis.

Red light therapy may help mild inflammation and promote collagen production.

Research levels differ, with more data supporting shockwave for specific injuries.

Combination therapy might offer synergies in some cases.

Consult a healthcare specialist to determine which therapy, or combination, is best for your condition.'
        ),

        'Avoiding Surgery & Surgical Alternatives' => array(
            'How do I avoid knee replacement surgery?' => 'Delaying or avoiding knee replacement involves consistent weight control, regular strengthening exercises, and non-surgical interventions like injections or orthotics.

Maintain a healthy weight to reduce joint pressure.

Strengthen supporting muscles—quads, hamstrings, and glutes.

Use assistive devices like braces or shoe inserts if recommended.

Consider injections (cortisone or hyaluronic acid) when conservative care fails.

Staying active and following a personalized rehab plan can help you postpone surgery; consult an orthopedic specialist to assess your options.',

            'How do I avoid knee surgery?' => 'Many knee conditions improve without surgery. Focus on rest, targeted exercise, braces, and joint injections. Surgery is typically reserved for severe ligament tears or advanced arthritis.

Seek early diagnosis to address issues promptly.

Follow a supervised physical therapy program for strength and flexibility.

Use bracing or taping to stabilize the knee during recovery.

Consider PRP or gel injections for additional support.

Consult with a knee specialist if pain persists despite these measures.',

            'How do I avoid shoulder surgery?' => 'Commit to a structured rehabilitation plan that includes rest, targeted strengthening, and careful activity modification. Most rotator cuff issues respond well to non-surgical care.

Early physiotherapy helps restore strength and range of motion.

Anti-inflammatory medications and injections reduce pain and swelling.

Modify activities to reduce repetitive stress on the shoulder.

Consistency and patience are key to successful non-surgical recovery.

If pain persists or motion remains severely limited, consider discussing surgical options with an orthopedist.',

            'Do I need surgery for my bone spur?' => 'Surgery is rarely needed for bone spurs. Treatment usually focuses on the underlying condition—often plantar fasciitis or arthritis—through rest, orthotics, and physical therapy.

Remove or modify triggers like high-impact activities.

Use supportive footwear or custom orthotics to alleviate pressure.

Ice and anti-inflammatory medications relieve pain.

Surgical removal is considered only if spurs cause persistent pain or nerve compression.

Discuss your specific case with a foot and ankle specialist before deciding on surgery.',

            'Do I need surgery for labrum tear?' => 'Not always. Many labral tears, especially in the hip or shoulder, can be managed with physiotherapy, anti-inflammatory care, and activity modification. Surgery is considered when conservative treatments fail.

Physical therapy strengthens surrounding muscles to compensate.

Pain management includes rest, NSAIDs, and occasional injections.

Activity modification reduces strain on the joint.

Surgery is generally reserved for tears causing mechanical locking or chronic instability.

Consult with an orthopedic surgeon to determine if surgical intervention is warranted in your situation.',

            'What are the signs I need knee surgery?' => 'Surgery may be needed if you experience severe or persistent pain, significant loss of function, or structural damage visible on imaging, especially after conservative treatments fail.

Persistent pain interferes with daily activities.

Limited range of motion prevents walking, climbing stairs, or bending.

Severe instability or locking indicates possible ligament or cartilage damage.

Progressive deformity (bowing or knock-knee) may necessitate surgical correction.

Early consultation with an orthopedic surgeon can help you plan the most appropriate intervention.',

            'Do I need surgery for my meniscus tear?' => 'Many meniscus tears heal with non-surgical care, particularly if they\'re small or on the outer edge. Surgery is considered for tears that cause persistent pain, locking, or functional impairment.

Partial tears often improve with rest and targeted exercises.

Meniscus repairs are typically performed arthroscopically.

Rehabilitation is crucial after both conservative and surgical approaches.

Age and tear location influence healing potential.

Work with an orthopedic specialist to determine the right treatment for your injury.',

            'How do I avoid hip surgery?' => 'Maintaining joint mobility and strength, managing weight, and using non-surgical treatments can delay or prevent hip surgery.

Low-impact exercises like swimming or cycling reduce joint stress.

Flexibility routines keep hip muscles and tendons supple.

Pain management includes NSAIDs, injections, and physical therapy.

Lifestyle adjustments, such as changing your activities and footwear, help protect the hip.

If pain persists or joint damage progresses, surgical options should be evaluated with your orthopedic surgeon.'
        ),

        'Knee Pain & Conditions' => array(
            'Why does my knee hurt?' => 'Knee pain can result from injuries, overuse, or degenerative changes. Common causes include ligament sprains, meniscus tears, tendonitis, bursitis, and arthritis.

Traumatic injuries from sports or accidents often cause acute pain.

Overuse conditions result from repetitive movements like running or squatting.

Age-related degeneration leads to osteoarthritis and cartilage thinning.

Systemic conditions such as rheumatoid arthritis may also affect the knee.

If pain persists or worsens, consult a healthcare provider for diagnosis and treatment.',

            'What causes my knee to hurt going downstairs?' => 'Pain while descending stairs often signals patellofemoral pain syndrome or a cartilage issue. These conditions cause the kneecap to track poorly, increasing pressure when the knee bends deeply.

Weak quadriceps fail to stabilize the kneecap.

Tight hamstrings or calves restrict smooth knee motion.

Excessive pronation or flat feet alter leg alignment.

Sudden increases in activity intensity can trigger symptoms.

A physical therapist can design exercises to correct imbalances and improve tracking.',

            'How do I find out what\'s wrong with my knee?' => 'Seek a professional evaluation. A clinician will take a history, perform a physical exam, and may order imaging such as an X-ray or MRI to identify the cause.

Describe symptoms and activities thoroughly.

Physical examination assesses range of motion, stability, and tenderness.

Diagnostic imaging clarifies ligament, meniscus, and cartilage issues.

Blood tests may be ordered if inflammatory conditions are suspected.

Early diagnosis leads to more effective treatment and faster recovery.',

            'Why does my knee crack and pop?' => 'Knee noises often result from gas bubbles in joint fluid or ligaments snapping over bone. However, persistent or painful popping may indicate arthritis, a meniscus tear, or loose cartilage.

Occasional painless clicking is generally harmless.

Frequent popping with pain suggests structural damage.

Swelling and instability may accompany more serious conditions.

Medical evaluation is advised if popping is painful or restricts activity.

Don\'t ignore new or worsening sounds, especially if accompanied by discomfort.',

            'Why is my knee stiff when I bend it?' => 'Stiffness can be caused by swelling, inflammation, or degenerative changes such as arthritis. Injury-related stiffness often signals a ligament or cartilage problem.

Fluid buildup (effusion) limits joint movement.

Scar tissue restricts motion after injury.

Arthritic changes cause joint gelling, especially after inactivity.

Meniscus tears may mechanically block movement.

Persistent stiffness warrants professional assessment to identify the underlying cause.',

            'What is a cyst in my knee?' => 'A knee cyst, often called a Baker\'s cyst, is a fluid-filled swelling behind the knee. It usually develops due to inflammation from arthritis or a cartilage tear.

Presents as a lump causing tightness or discomfort.

Often associated with joint issues like arthritis or meniscus tears.

Treatment targets the underlying cause rather than the cyst itself.

Rarely requires surgery unless it becomes painful or ruptures.

An orthopedic evaluation will confirm the diagnosis and recommend appropriate care.',

            'Is knee pain a sign of arthritis?' => 'Knee pain can signal arthritis, particularly if it\'s accompanied by swelling, stiffness, and reduced range of motion. However, not all knee pain is arthritic; injuries and overuse can produce similar symptoms.

Osteoarthritis develops slowly over time with cartilage wear.

Rheumatoid arthritis is an inflammatory disorder affecting multiple joints.

Activities and age influence the likelihood of arthritis.

Imaging and lab tests help distinguish arthritis from other causes.

Consult a healthcare provider for accurate diagnosis and management.',

            'Why does my knee crack, pop, grind?' => 'Grinding, also known as crepitus, often indicates rough cartilage surfaces from degeneration or injury. Occasional noise without pain is usually benign, but persistent grinding merits evaluation.

Arthritic changes contribute to cartilage roughening.

Meniscus tears can cause popping or catching.

Loose bodies (fragments of cartilage) may click or grind.

Seek medical advice if sounds are frequent or painful.

Early management can slow progression and improve joint function.',

            'How do I know if I have a meniscus tear?' => 'Symptoms include pain, swelling, catching, or locking of the knee, often after a twist or squat. You may also feel instability or hear a pop at the moment of injury.

Immediate swelling may occur within the first 24 hours.

Pain when bending or rotating the knee is common.

Locking or giving way suggests a torn piece is interfering with motion.

Diagnosis via MRI confirms tear type and location.

An orthopedic evaluation is recommended to determine if surgical repair is needed.',

            'Do meniscus tears heal?' => 'Healing depends on the tear\'s size and location. Tears in the outer "red zone" (better blood supply) may heal with conservative care, while inner "white zone" tears often require surgery.

Small tears may heal with rest and physiotherapy.

Larger or complex tears usually need arthroscopic intervention.

Rehabilitation is crucial regardless of treatment approach.

Persistent symptoms after non-surgical care warrant further evaluation.

Work closely with an orthopedic specialist to determine the best option.',

            'How to diagnose my knee pain?' => 'Diagnosis involves a combination of history, physical examination, and imaging studies. Clinicians will assess joint stability, range of motion, and tenderness, often supplemented by X-rays or MRI.

Be candid about the onset, nature, and triggers of pain.

Physical testing identifies ligament laxity or meniscus issues.

Imaging helps visualize bone and soft tissue structures.

Lab work may be required for inflammatory or infectious causes.

Accurate diagnosis guides effective treatment planning.',

            'Best exercises for knee pain' => 'Focus on strengthening the muscles around the knee, enhancing flexibility, and improving balance. A supervised program helps ensure proper technique and progression.

Quadriceps sets and straight leg raises build strength without stressing the joint.

Hamstring curls and bridges improve posterior chain support.

Step-ups and wall sits enhance functional stability.

Stretching routines for hamstrings and calves maintain flexibility.

Consult a physical therapist to design a program tailored to your needs.',

            'When should I see a doctor for my knee pain?' => 'Consult a healthcare provider if knee pain persists beyond a few days, worsens despite rest, or is accompanied by swelling, deformity, or inability to bear weight.

Severe trauma demands immediate attention.

Persistent or recurrent pain warrants evaluation.

Instability or locking suggests structural damage.

Previous knee injuries increase the risk of ongoing issues.

Early intervention improves outcomes and prevents further damage.'
        ),

        'Shoulder Pain & Conditions' => array(
            'Why does my shoulder hurt?' => 'Shoulder pain stems from injuries, overuse, or degenerative changes, including rotator cuff issues, impingement, bursitis, and arthritis.

Rotator cuff tears cause weakness and limited overhead movement.

Impingement syndrome results from pinched tendons or bursa.

Bursitis or tendinitis produce inflammation and pain.

Degenerative arthritis leads to stiffness and aching.

Seek a professional assessment to identify the root cause.',

            'How do I find out what\'s wrong with my shoulder?' => 'Schedule an exam with an orthopedic doctor or physiotherapist. They\'ll assess your shoulder\'s strength, flexibility, and range of motion, and may order imaging to confirm a diagnosis.

Describe symptoms clearly (location, severity, triggers).

Physical exam assesses muscle strength and joint stability.

Ultrasound or MRI evaluates soft tissues like tendons and labrum.

X-rays show bones and joint alignment.

Accurate diagnosis leads to the most effective treatment.',

            'What are my options for rotator cuff tear?' => 'Treatment options depend on tear size and symptom severity. Many partial tears heal with non-surgical care, while complete tears may require surgery.

Physiotherapy strengthens supporting muscles and improves function.

Anti-inflammatory medications control pain.

Steroid or PRP injections reduce inflammation and promote healing.

Surgical repair is indicated when pain persists or weakness is significant.

Consult your healthcare provider to determine the most appropriate approach.',

            'What is shoulder impingement?' => 'Shoulder impingement occurs when the rotator cuff tendons or bursa are compressed between the shoulder blade and humerus. This pinching causes pain during overhead activities.

Typical symptoms include pain when lifting the arm above shoulder height.

Common in athletes and individuals performing repetitive overhead tasks.

Early management includes rest and strengthening exercises.

Untreated impingement can lead to rotator cuff tears.

An orthopedic evaluation is key for a proper treatment plan.',

            'Why does my shoulder click and pop?' => 'Occasional clicking without pain is usually harmless. Painful or persistent clicking could indicate labral tears, tendon snapping, or joint instability.

Snapping tendons may rub over bone.

Labrum tears cause painful clicking or catching.

Joint instability creates a sense of slipping or popping.

Persistent symptoms warrant a medical evaluation.

Don\'t ignore clicking accompanied by pain or weakness.',

            'How do I get rid of my shoulder pain?' => 'Treating shoulder pain often involves rest, ice, gentle stretching, and gradual strengthening. Anti-inflammatory medications and injections may help relieve discomfort.

Adjust activities to avoid irritating movements.

Follow a physiotherapy program to restore mobility and strength.

Apply ice or heat as advised for symptom relief.

Injections offer temporary pain reduction for persistent cases.

Consistent adherence to your rehab program is essential for lasting relief.',

            'How do I know if I have a rotater cuff tear?' => 'You may have a rotator cuff tear if you experience pain when lifting or rotating your arm, weakness, and difficulty sleeping on that shoulder. A medical exam and imaging confirm the diagnosis.

Weakness when reaching overhead or behind your back.

Pain at night that disrupts sleep.

Limited range of motion compared to the other side.

Diagnostic imaging (MRI or ultrasound) confirms tear severity.

See a healthcare professional promptly if these symptoms appear.',

            'What are the symptoms for shoulder impingement?' => 'Symptoms include pain when lifting the arm overhead or sideways, weakness, and sometimes a feeling of catching or snapping. Pain may worsen at night or when lying on the affected side.

Sharp or aching pain during lifting or reaching movements.

Weakness in the affected shoulder.

Pain or stiffness progressing over time.

Occasional numbness or tingling if nerves are involved.

Early detection helps prevent progression to more serious conditions.',

            'What is frozen shoulder?' => 'Frozen shoulder, or adhesive capsulitis, is a condition where the shoulder capsule thickens and tightens, restricting movement. It progresses through three stages: freezing, frozen, and thawing.

Freezing stage: pain increases while motion decreases.

Frozen stage: pain lessens but stiffness remains.

Thawing stage: gradual return to normal movement.

Recovery can take months, but most people regain function with treatment.

Consult a physiotherapist early for the best management strategy.',

            'How do I treat my frozen shoulder?' => 'Treatment involves pain control, gentle stretching, and physical therapy. Corticosteroid injections may reduce pain during the freezing stage, while continuous movement aids long-term recovery.

Pain management includes NSAIDs or short-term injections.

Range-of-motion exercises maintain flexibility.

Heat therapy can ease stiffness before stretching.

Patience is key; recovery may take up to a year or longer.

A physical therapist can guide you through safe and effective exercises.',

            'How to diagnose my shoulder pain?' => 'Diagnosis requires a comprehensive evaluation that includes a patient history, physical examination, and often imaging. Assessments pinpoint the source of pain, allowing targeted treatment.

Explain your pain pattern and any triggering activities.

Physical tests help locate tenderness or weakness.

X-rays reveal bone abnormalities; MRI or ultrasound show soft-tissue injuries.

Additional tests may detect underlying inflammatory conditions.

Prompt diagnosis helps prevent further shoulder damage.',

            'Best exercises for shoulder pain' => 'Focus on gentle, controlled movements to improve flexibility and strength. Pendulum swings, wall slides, external rotation exercises with resistance bands, and shoulder blade squeezes are commonly recommended.

Pendulum exercises loosen the joint gently.

Wall slides enhance range of motion and posture.

Rotator cuff strengthening stabilizes the shoulder.

Scapular retraction improves shoulder blade positioning.

Consult a physical therapist to tailor exercises to your specific pain and limitations.',

            'When should I see a doctor for my shoulder pain?' => 'Seek medical attention if you experience severe pain, inability to lift your arm, persistent symptoms after home care, or if the pain follows a fall or injury.

Sudden onset of intense pain requires prompt assessment.

Loss of mobility or shoulder instability suggests serious injury.

Pain lasting longer than a few weeks despite rest and treatment.

Symptoms accompanied by numbness or tingling warrant evaluation.

Early intervention reduces the risk of chronic shoulder problems.'
        ),

        'Elbow Pain & Conditions' => array(
            'Why does my elbow hurt?' => 'Elbow pain often results from overuse injuries like tennis elbow or golfer\'s elbow, but bursitis, fractures, and arthritis can also be culprits.

Repetitive motions such as lifting, gripping, or twisting strain tendons.

Inflammation from bursitis causes swelling and tenderness.

Trauma or falls lead to fractures or dislocation.

Age-related degeneration may lead to arthritic elbow pain.

See a healthcare professional for a proper diagnosis and tailored care plan.',

            'Why does my elbow hurt when lifting or gripping?' => 'Pain during lifting or gripping typically points to tendinopathy in the elbow. Tennis elbow affects the outside, while golfer\'s elbow affects the inside.

Overuse strains microtears in tendon fibers.

Improper technique or repetitive activities compound damage.

Weak muscles and poor flexibility increase strain.

Rest and proper rehab are essential for healing.

An early professional assessment helps prevent long-term issues.',

            'What is golfers elbow?' => 'Golfer\'s elbow (medial epicondylitis) is a condition involving inflammation of the tendons that attach to the inside of the elbow, often triggered by repetitive wrist flexion or gripping.

Pain on the inner elbow worsens with gripping or lifting.

May radiate down the forearm or into the wrist.

Treatment involves rest, ice, strengthening, and stretching.

Shockwave or PRP therapy may help refractory cases.

Consult a physician or physiotherapist for proper diagnosis and treatment guidance.',

            'What is tennis elbow?' => 'Tennis elbow (lateral epicondylitis) occurs when repetitive wrist extension causes microscopic tears at the tendon insertion on the outside of the elbow.

Pain on the outer elbow when gripping or lifting.

Weak grip strength and difficulty holding objects.

Treatment includes rest, bracing, and targeted exercises.

Recovery may take weeks or months, depending on severity.

Seek medical advice if pain persists or worsens despite conservative care.',

            'How to diagnose my elbow pain?' => 'A healthcare professional will evaluate your symptoms, perform physical tests, and may order imaging to rule out fractures or degenerative changes.

Describe activities that aggravate your pain.

Physical exam assesses tenderness and movement limitations.

Ultrasound or MRI may visualize tendon or ligament damage.

X-rays detect fractures or arthritis.

Accurate diagnosis guides effective treatment and rehab.',

            'Best exercises for elbow pain' => 'Exercises focus on gently strengthening the forearm and improving flexibility. Wrist flexor and extensor stretches, isometric wrist exercises, and soft tissue rolling are commonly recommended.

Soft tissue rolling with a ball improves blood flow.

Isometric wrist flexion helps strengthen without overloading.

Wrist extension and flexion stretches maintain mobility.

Progressive strengthening should be guided by a therapist.

Always start slowly, and adjust based on pain levels and therapist feedback.',

            'When should I see a doctor for my elbow pain?' => 'Seek medical care if pain is severe, interferes with daily activities, or doesn\'t improve after several weeks of conservative treatment.

Sudden traumatic injuries should be evaluated immediately.

Persistent swelling or warmth may indicate inflammation or infection.

Numbness or tingling suggests nerve involvement.

Loss of strength or range of motion warrants prompt assessment.

Early intervention supports a more effective recovery and limits chronic problems.'
        ),

        'Foot & Ankle Pain' => array(
            'Where do I go for foot pain?' => 'For foot pain, consult a podiatrist or an orthopedic specialist specializing in foot and ankle disorders. They can diagnose your condition and guide treatment.

Podiatrists focus on foot and ankle structure and movement.

Orthopedic surgeons handle surgical and complex bone issues.

Physical therapists assist with rehab and gait training.

Primary care providers can offer initial assessments and referrals.

Seek prompt evaluation if foot pain persists or worsens.',

            'Why does my foot hurt when I first get out of bed?' => 'Morning foot pain often indicates plantar fasciitis, an inflammation of the plantar fascia. It may also result from Achilles tendinitis, flat feet, or arthritis.

Plantar fasciitis causes stabbing heel pain with first steps.

Achilles tendinitis produces stiffness at the back of the heel.

Flat feet or fallen arches strain foot tissues.

Arthritis can cause generalized stiffness and pain.

Stretching before rising and supportive footwear often provide relief.',

            'My foot hurts when I run' => 'Running-related foot pain may stem from overuse injuries like plantar fasciitis, stress fractures, shin splints, or tendonitis. Proper diagnosis is essential to prevent complications.

Sudden increases in mileage can strain foot structures.

Poor footwear contributes to improper mechanics and injury.

Rest, ice, and stretching help mild cases.

Persistent pain should prompt evaluation to rule out fractures.

Consult a sports medicine or foot specialist to identify the cause and prevent future injuries.',

            'How to diagnose my foot pain?' => 'Diagnosis starts with a clinical evaluation, including a physical exam, patient history, and possibly imaging tests to identify structural or inflammatory problems.

Describe when the pain occurs (morning, during activity, at rest).

Physical exam assesses foot alignment and motion.

X-rays or MRI detect fractures, inflammation, or structural issues.

Gait analysis identifies biomechanical abnormalities.

Proper diagnosis informs a targeted treatment plan.',

            'Best exercises for foot pain' => 'Stretching the calf and plantar fascia, strengthening foot muscles, and improving balance are key. Rolling a ball under your foot and toe curls can reduce pain and improve function.

Calf stretches relieve tension on the plantar fascia.

Towel scrunches strengthen intrinsic foot muscles.

Arch rolls on a ball or foam roller improve flexibility.

Balance exercises like single-leg stands enhance stability.

Work with a physical therapist to ensure exercises are appropriate for your condition.',

            'When should I see a doctor for my foot pain?' => 'If foot pain doesn\'t improve within a few days, is severe, or follows trauma, see a medical professional. Persistent symptoms may indicate an underlying issue.

Severe swelling or redness could signal infection or inflammation.

Inability to bear weight suggests a fracture or serious injury.

Numbness or tingling warrants immediate attention.

Diabetics should seek prompt care for any foot issues.

Early diagnosis and treatment prevent long-term problems and complications.'
        ),

        'Hip Pain' => array(
            'Why does my hip hurt?' => 'Hip pain can originate from many sources, including arthritis, bursitis, tendonitis, labral tears, and muscular strain. The pain may stem from the joint or surrounding tissues.

Osteoarthritis creates stiffness and groin pain.

Trochanteric bursitis causes lateral hip soreness.

Hip labral tears produce catching or clicking sensations.

Referred pain from the lower back may mimic hip issues.

A thorough evaluation will determine the cause and guide your treatment plan.',

            'What are the causes of hip pain?' => 'Hip pain can be caused by degenerative changes, inflammation, trauma, or referred pain. Common culprits include osteoarthritis, bursitis, fractures, and muscle or tendon injuries.

Aging-related changes degrade cartilage and cause arthritis.

Inflammatory conditions such as bursitis create localized swelling.

Trauma or overuse leads to strains or stress fractures.

Spinal issues may radiate pain into the hip region.

Consult a healthcare provider for accurate diagnosis and appropriate management.'
        ),

        'Other Musculoskeletal Conditions' => array(
            'What is bursitis?' => 'Bursitis is inflammation of the fluid-filled sacs (bursae) that cushion joints. It causes pain, swelling, and limited range of motion, often due to repetitive motion or prolonged pressure.

Most common sites are the shoulder, elbow, hip, and knee.

Symptoms include localized tenderness and swelling.

Treatment involves rest, ice, NSAIDs, and sometimes injections.

Physical therapy may help restore normal movement and strength.

Seek medical evaluation if symptoms persist or worsen despite initial care.',

            'What do I do for my muscle tear?' => 'For a muscle tear, rest the injured area, apply ice, compress with a bandage, and elevate the limb. Early physiotherapy and gradual strengthening help restore function.

Follow the RICE protocol to reduce pain and swelling.

Avoid excessive stretching or strengthening until healing progresses.

Use crutches or braces if the injury affects weight-bearing muscles.

Severe tears may require surgical evaluation.

If pain, swelling, or weakness persists, see a healthcare provider for further assessment.',

            'Do labral tears heal?' => 'Labral tears in the hip or shoulder generally do not heal on their own due to poor blood supply. Conservative management can relieve symptoms, but severe cases may need surgical intervention.

Physical therapy improves joint function and compensates for the tear.

NSAIDs and activity modification reduce pain.

Injections may offer temporary relief.

Surgery is considered for mechanical symptoms like locking or catching.

Consult an orthopedic specialist to determine if conservative care is sufficient.'
        ),

        'Finding & Choosing an Orthopedic Provider' => array(
            'What conditions do orthopedics treat?' => 'Orthopedic specialists diagnose, treat, and prevent disorders of the musculoskeletal system, including bones, joints, ligaments, tendons, muscles, and nerves.

Treat injuries like fractures, sprains, and dislocations.

Manage degenerative diseases such as osteoarthritis.

Address congenital or developmental issues like scoliosis.

Perform surgeries including joint replacements and arthroscopy.

Choose an orthopedic provider with experience relevant to your specific condition.',

            'What is the difference between an orthopedic surgeon and orthopedic doctor?' => 'An orthopedic surgeon is trained to perform operations on the musculoskeletal system. All orthopedic surgeons are orthopedic doctors, but not all orthopedic doctors perform surgery; some focus on non-surgical management.

Orthopedic surgeons are trained in operative procedures such as joint replacement or fracture fixation.

Non-surgical orthopedists may specialize in sports medicine or physical medicine.

Treatment plans often involve collaboration between surgical and non-surgical providers.

Both diagnose and manage musculoskeletal conditions comprehensively.

When seeking care, clarify whether your provider offers surgical or non-surgical solutions.',

            'What are patient reviews for this orthopedic provider?' => 'Patient reviews vary widely. Check reputable sites and seek referrals from trusted sources to gauge patient satisfaction. Consider factors like communication, bedside manner, and post-surgical outcomes.

Read multiple platforms (e.g., Google, Healthgrades, or physician review sites).

Pay attention to consistent themes—positive or negative.

Discuss concerns with your primary care physician or peers.

Prioritize experience and quality of care over sheer review numbers.

Ultimately, choose a provider whose expertise and approach align with your needs.',

            'What qualifications should I look for in an orthopedic?' => 'Look for board certification, specialized training, and experience with the specific condition you have. Fellowship training and active participation in professional societies indicate ongoing commitment to excellence.

Board certification confirms rigorous training and examinations.

Fellowship training in sub-specialties adds specialized expertise.

Hospital affiliations and research involvement demonstrate commitment to best practices.

Positive patient outcomes and testimonials support credibility.

Ask questions about your orthopedic\'s experience with procedures similar to yours.',

            'What should I expect at my first orthopedic appointment?' => 'Your first appointment will include a detailed history, physical exam, and possibly imaging studies. The orthopedic provider will diagnose your issue and outline a treatment plan tailored to your needs.

Bring a record of your medical history, medications, and prior imaging.

Discuss symptoms clearly and concisely.

Expect hands-on examination to assess function and pain triggers.

Ask about next steps, including further testing or referrals.

Being prepared helps you get the most out of your appointment.',

            'Do I see an orthopedic or a physical therapist for my pain?' => 'Begin with an orthopedic physician for diagnosis. They may refer you to a physical therapist once they determine the cause, ensuring safe and effective rehabilitation.

Orthopedic evaluation identifies underlying structural or degenerative issues.

Physical therapy addresses biomechanics, strength, and flexibility.

Collaboration between providers ensures optimal recovery.

Direct access to PT may be possible but can miss underlying diagnoses.

Always prioritize accurate diagnosis before starting any therapy program.',

            'Best Orthopedic near me?' => 'The best orthopedic surgeon or specialist varies based on your location and specific needs. Research board-certified providers, read reviews, and consult your primary care physician for recommendations.

Look for specialists experienced in your specific condition or injury.

Check hospital affiliations for quality ratings.

Verify board certification and licensure.

Schedule consultations to assess communication style and expertise.

Personal referrals from friends, family, or other healthcare providers can also guide your choice.',

            'Where do I find a concierge orthopedic or sports medicine doctor?' => 'Concierge services are typically offered through private practices. Search online for concierge orthopedic and sports medicine programs in your area or inquire with hospitals that offer premium access packages.

Membership-based practices provide personalized care and flexible scheduling.

Academic centers sometimes offer specialized concierge services.

Professional networks and sports clinics may have concierge arrangements.

Costs vary, so compare benefits and fees.

Consult with your insurance provider to understand coverage and out-of-pocket costs for concierge care.',

            'What is Regenerative Orthopedics?' => 'Regenerative orthopedics applies biologic therapies like PRP, stem cells, and orthobiologics to promote healing and reduce pain in musculoskeletal injuries and degenerative conditions. It aims to enhance your body\'s natural repair processes.

Uses autologous or donor tissue to stimulate regeneration.

Targets tendons, ligaments, cartilage, and bone.

Minimally invasive, often outpatient procedures.

Research is evolving, with emerging evidence supporting specific applications.

Consult an orthopedic provider versed in regenerative medicine to explore appropriate therapies.',

            'What is Orthopedic Medicine?' => 'Orthopedic medicine is the branch of medicine that diagnoses, treats, and prevents disorders of the musculoskeletal system. It encompasses surgical and non-surgical approaches to improve patient mobility and reduce pain.

Includes bones, joints, muscles, ligaments, tendons, and nerves.

Covers a wide spectrum from fractures and sports injuries to congenital deformities.

Integrates rehabilitation, pain management, and preventive strategies.

Aims to restore function and enhance quality of life.

Consider consulting an orthopedic specialist for any persistent musculoskeletal concerns.'
        )
    );

    // Create/get FAQ topics and add questions with answers
    foreach ($faq_data as $topic_name => $questions_answers) {
        // Create or get the topic term
        $topic_term = wp_insert_term(
            $topic_name,
            'faq_topic',
            array(
                'description' => 'FAQ category for ' . $topic_name,
                'slug' => sanitize_title($topic_name)
            )
        );

        if (is_wp_error($topic_term)) {
            // Topic might already exist, try to get it
            $existing_term = get_term_by('name', $topic_name, 'faq_topic');
            if ($existing_term) {
                $topic_id = $existing_term->term_id;
            } else {
                continue; // Skip if we can't create or find the topic
            }
        } else {
            $topic_id = $topic_term['term_id'];
        }

        // Create FAQ items for each question in this topic
        foreach ($questions_answers as $question => $answer) {
            // Check if FAQ item already exists
            $existing_faq = get_posts(array(
                'post_type' => 'faq_item',
                'meta_query' => array(
                    array(
                        'key' => '_faq_question',
                        'value' => $question,
                        'compare' => '='
                    )
                ),
                'posts_per_page' => 1
            ));

            if (!empty($existing_faq)) {
                continue; // Skip if FAQ already exists
            }

            // Create the FAQ item
            $faq_post = array(
                'post_title' => $question,
                'post_content' => $answer,
                'post_status' => 'publish',
                'post_type' => 'faq_item',
                'post_author' => 1
            );

            $faq_id = wp_insert_post($faq_post);

            if ($faq_id && !is_wp_error($faq_id)) {
                // Add custom meta fields
                update_post_meta($faq_id, '_faq_question', $question);
                update_post_meta($faq_id, '_faq_answer', $answer);
                
                // Assign to topic
                wp_set_post_terms($faq_id, array($topic_id), 'faq_topic');
            }
        }
    }

    return 'Comprehensive FAQ items with detailed answers created successfully!';
}

// Admin function to trigger FAQ creation (only for administrators)
function add_faq_admin_menu() {
    add_management_page(
        'Create FAQ Items',
        'Create FAQ Items',
        'manage_options',
        'create-faq-items',
        'faq_admin_page'
    );
}
add_action('admin_menu', 'add_faq_admin_menu');

function faq_admin_page() {
    if (isset($_POST['create_faqs']) && current_user_can('manage_options')) {
        check_admin_referer('create_faq_items');
        $result = create_comprehensive_faq_items();
        echo '<div class="notice notice-success"><p>' . esc_html($result) . '</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>Create Comprehensive FAQ Items</h1>
        <p>This will create all FAQ topics and questions for Full Circle Orthopedics.</p>
        <p><strong>Note:</strong> This will not duplicate existing FAQ items.</p>
        
        <form method="post" action="">
            <?php wp_nonce_field('create_faq_items'); ?>
            <p>
                <input type="submit" name="create_faqs" class="button button-primary" value="Create All FAQ Items">
            </p>
        </form>
        
        <h2>FAQ Categories to be Created:</h2>
        <ol>
            <li><strong>Regenerative & Non-Surgical Treatment Options</strong> (13 questions)</li>
            <li><strong>PRP, A2M & Biologic Therapies</strong> (10 questions)</li>
            <li><strong>Shockwave & Other Regenerative Modalities</strong> (5 questions)</li>
            <li><strong>Avoiding Surgery & Surgical Alternatives</strong> (8 questions)</li>
            <li><strong>Knee Pain & Conditions</strong> (13 questions)</li>
            <li><strong>Shoulder Pain & Conditions</strong> (13 questions)</li>
            <li><strong>Elbow Pain & Conditions</strong> (7 questions)</li>
            <li><strong>Foot & Ankle Pain</strong> (6 questions)</li>
            <li><strong>Hip Pain</strong> (2 questions)</li>
            <li><strong>Other Musculoskeletal Conditions</strong> (3 questions)</li>
            <li><strong>Finding & Choosing an Orthopedic Provider</strong> (10 questions)</li>
        </ol>
        
        <p><strong>Total:</strong> 90 FAQ questions across 11 categories</p>
        
        <p>After creating the FAQs, you can:</p>
        <ul>
            <li><a href="<?php echo admin_url('edit.php?post_type=faq_item'); ?>">Edit individual FAQ answers</a></li>
            <li><a href="<?php echo admin_url('edit-tags.php?taxonomy=faq_topic&post_type=faq_item'); ?>">Manage FAQ topics</a></li>
            <li><a href="<?php echo home_url('/faq/'); ?>">View the FAQ page</a></li>
        </ul>
    </div>
    <?php
}

// REST API timeout and debugging fixes
add_filter('http_request_timeout', 'increase_rest_api_timeout');
function increase_rest_api_timeout($timeout) {
    return 60; // Increase timeout to 60 seconds
}

// Fix REST API authentication issues
add_filter('rest_authentication_errors', 'fix_rest_auth_errors');
function fix_rest_auth_errors($result) {
    if (!empty($result)) {
        return $result;
    }
    if (!is_user_logged_in()) {
        return true;
    }
    return $result;
}

// Add CORS headers for REST API
add_action('rest_api_init', function () {
    remove_filter('rest_pre_serve_request', 'rest_send_cors_headers');
    add_filter('rest_pre_serve_request', function ($value) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Authorization, Content-Type, X-WP-Nonce');
        return $value;
    });
}, 15);

// Debug REST API issues
add_action('wp_ajax_test_rest_api', 'test_rest_api_endpoint');
add_action('wp_ajax_nopriv_test_rest_api', 'test_rest_api_endpoint');
function test_rest_api_endpoint() {
    $response = wp_remote_get(rest_url('wp/v2/types/post'), array(
        'timeout' => 30,
        'headers' => array(
            'Authorization' => 'Bearer ' . wp_create_nonce('wp_rest'),
        ),
    ));
    
    if (is_wp_error($response)) {
        wp_send_json_error(array(
            'message' => $response->get_error_message(),
            'code' => $response->get_error_code(),
        ));
    }
    
    wp_send_json_success(array(
        'status_code' => wp_remote_retrieve_response_code($response),
        'body' => wp_remote_retrieve_body($response),
    ));
}

// Function to get default hero background image for blog pages
function get_default_hero_background() {
    // Method 2 removed as it doesn't work reliably
    // Only widget images (Method 1) are supported
    return false;
}

// Function to check if we should show default hero background
function should_show_default_hero_bg() {
    return (is_home() || is_singular('post') || is_page('videos')) && !has_post_thumbnail();
}

// Add CSS and JavaScript for blog hero widget background images
function fco_blog_hero_assets() {
    if (is_home() || is_singular('post') || is_page('videos')) {
        // Add inline CSS for blog hero background functionality
        wp_add_inline_style('fco-style', '
            #hero .blog-hero-bg-image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                z-index: 1;
            }
            #hero .blog-hero-default-bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: var(--main-bg);
                z-index: 0;
            }
            /* Accent circles for default background */
            #hero .blog-hero-default-bg::after {
                content: "";
                position: absolute;
                bottom: 0;
                right: 0;
                width: 300px;
                height: 300px;
                background-image: url("' . esc_url(wp_get_upload_dir()['baseurl']) . '/2022/12/fco-accent-circles.png");
                background-size: contain;
                background-repeat: no-repeat;
                background-position: bottom right;
                transform: translate(10%, 20%);
                opacity: 0.8;
                z-index: 1;
            }
            /* Accent circles for widget images - added via JavaScript */
            #hero .blog-hero-accent-circles {
                position: absolute;
                bottom: 0;
                right: 0;
                width: 300px;
                height: 300px;
                background-image: url("' . esc_url(wp_get_upload_dir()['baseurl']) . '/2022/12/fco-accent-circles.png");
                background-size: contain;
                background-repeat: no-repeat;
                background-position: bottom right;
                transform: translate(20%, 20%);
                opacity: 0.8;
                z-index: 2;
                pointer-events: none;
            }
            /* Responsive design for accent circles */
            @media (max-width: 768px) {
                #hero .blog-hero-default-bg::after,
                #hero .blog-hero-accent-circles {
                    width: 200px;
                    height: 200px;
                    transform: translate(40%, 40%);
                }
            }
            @media (max-width: 480px) {
                #hero .blog-hero-default-bg::after,
                #hero .blog-hero-accent-circles {
                    width: 150px;
                    height: 150px;
                    transform: translate(30%, 30%);
                }
            }
            
            #hero .hero-text-container {
                position: relative;
                z-index: 3;
            }
            #blog-hero-text .widget img {
                display: none !important; /* Hide widget images from normal display */
            }
            /* Ensure text is readable over background images */
            #hero .hero-text {
                text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
                color: #fff;
            }
            #hero .hero-text h1 {
                color: #fff;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
            }
            /* Style additional widget content */
            #blog-hero-text .widget {
                color: #fff;
            }
            #blog-hero-text .widget * {
                color: inherit;
            }
        ');
        
        // Add inline JavaScript to move widget images to hero background
        wp_add_inline_script('jquery', '
            jQuery(document).ready(function($) {
                // Find images in the blog hero widget
                var heroWidget = $("#blog-hero-text");
                var heroSection = $("#hero");
                var heroImages = heroWidget.find("img");
                
                if (heroImages.length > 0) {
                    console.log("Found", heroImages.length, "images in blog hero widget");
                    
                    // Use the first image as background
                    var firstImage = heroImages.first();
                    var imageSrc = firstImage.attr("src");
                    var imageAlt = firstImage.attr("alt") || "Blog Hero Background";
                    
                    // Create background image element
                    var bgImage = $("<img>", {
                        src: imageSrc,
                        alt: imageAlt,
                        class: "blog-hero-bg-image"
                    });
                    
                    // Create accent circles element
                    var accentCircles = $("<div>", {
                        class: "blog-hero-accent-circles"
                    });
                    
                    // Remove default colored background and add widget image + accent circles
                    heroSection.find(".blog-hero-default-bg").remove();
                    heroSection.prepend(bgImage);
                    heroSection.append(accentCircles);
                    
                    console.log("Blog hero background image applied:", imageSrc);
                    console.log("Accent circles added to widget image background");
                } else {
                    console.log("No images found in blog hero widget - using default colored background with accent circles");
                }
            });
        ');
    }
}
add_action('wp_enqueue_scripts', 'fco_blog_hero_assets');
