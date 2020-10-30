<?php
/**
 * Themes functions and definitions
 *
 * @package getaway
 */
function getaway_setup() {
	global $content_width;
		if ( ! isset( $content_width ) ){
      		$content_width = 1200;
		}
	load_theme_textdomain( 'getaway-lite', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo');

	add_theme_support( 'responsive-embeds' );

	add_post_type_support( 'page', 'excerpt');

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'align-wide' );

	add_theme_support( 'editor-font-sizes', array(
    	array(
        	'name' => esc_html__( 'Small', 'getaway-lite' ),
        	'size' => 13,
        	'slug' => 'small'
    	),
    	array(
        	'name' => esc_html__( 'Regular', 'getaway-lite' ),
        	'size' => 16,
        	'slug' => 'regular'
    	),
    	array(
        	'name' => esc_html__( 'Large', 'getaway-lite' ),
        	'size' => 36,
        	'slug' => 'large'
    	),
    	array(
        	'name' => esc_html__( 'Huge', 'getaway-lite' ),
        	'size' => 50,
        	'slug' => 'huge'
    	)
	) );

	add_theme_support( 'editor-styles' );

	add_editor_style( 'style-editor.css' );
	add_editor_style( getaway_lato_font_url() );

	register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary Menu', 'getaway-lite' ),
			'social' 	=> esc_html__( 'Social', 'getaway-lite' )
		) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );

	add_theme_support( 'post-thumbnails' );
	add_image_size('getaway-blogthumb', 500, 300, true);
	add_image_size('getaway-featuredheader', 2000, 600, true);
}
add_action( 'after_setup_theme', 'getaway_setup' );

/**
 * Register widget areas.
 *
 */
function getaway_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'getaway-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'getaway-lite' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Contact Widget', 'getaway-lite' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'getaway_widgets_init' );

/**
 * Register Open Sans Google fonts for getaway
 *
 * @return string
 */
function getaway_lato_font_url() {
	$open_sans_font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'getaway-lite' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Lato font: add new subset (greek, cyrillic, vietnamese)', 'getaway-lite' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		$query_args = array(
			'family' => urlencode( 'Lato:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' ),
			'subset' => urlencode( $subsets ),
		);

		$lato_font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $lato_font_url;
}

/**
 * Including theme scripts and styles.
 */
function getaway_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	if (!is_admin()) {
		wp_enqueue_script( 'getaway-menu', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'getaway-mobile-menu', get_template_directory_uri() . '/js/reaktion.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'getaway-responsive-videos', get_template_directory_uri() . '/js/responsive-videos.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'getaway-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'getaway-animate', get_template_directory_uri() . '/js/css3-animate.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'getaway-playfair', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700;900&display=swap' );
		wp_enqueue_style( 'getaway-lato', getaway_lato_font_url(), array(), null );
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );
		wp_enqueue_style('animate-style', get_template_directory_uri().'/animate.css', array(), '1', 'screen');
		wp_enqueue_style( 'getaway-style', get_stylesheet_uri());
	}
}
add_action( 'wp_enqueue_scripts', 'getaway_scripts_styles' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
