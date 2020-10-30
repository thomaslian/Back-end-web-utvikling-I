<?php
/**
 *
 * @package getaway
 */

/**
 * Setup the WordPress core custom header feature.
 */
function getaway_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'getaway_custom_header_args', array(
		'width'         => 2000,
		'height'        => 1000,
		'uploads'       => true,
		'default-text-color'     => 'ffffff',
		'wp-head-callback'       => 'getaway_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'getaway_custom_header_setup' );

if ( ! function_exists( 'getaway_header_style' ) ) :
        function getaway_header_style() {
                wp_enqueue_style( 'getaway-style', get_stylesheet_uri() );
                $header_text_color = get_header_textcolor();
                $position = "absolute";
                $clip ="rect(1px, 1px, 1px, 1px)";
                if ( ! display_header_text() ) {
                        $custom_css = '.site-title, .site-description {
                                position: '.$position.';
                                clip: '.$clip.';
                        }';
                } else{

                        $custom_css = 'h1.site-title, h2.site-description  {
                                color: #' . esc_attr($header_text_color) . ';
                        }';
                }
                wp_add_inline_style( 'getaway-style', $custom_css );
        }
        add_action( 'wp_enqueue_scripts', 'getaway_header_style' );

endif;
