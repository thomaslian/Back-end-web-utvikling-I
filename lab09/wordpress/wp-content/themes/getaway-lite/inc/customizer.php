<?php
/**
 * Theme Customizer
 *
 * @package getaway
 */
function getaway_customize_register($wp_customize){

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section('getaway_theme_options', array(
        'title'    => esc_html__('Theme Options', 'getaway-lite'),
        'priority' => 125,
	));

	$wp_customize->add_setting(
    	'featured_text',
    		array(
        		'default' => '',
				'sanitize_callback' => 'getaway_sanitize_text',
				'transport' => 'postMessage'
    		)
	);

	$wp_customize->add_control(
    	'featured_text',
    		array(
        		'label' => esc_html__('Add slider text, each line inside a span tag.', 'getaway-lite'),
        		'section' => 'getaway_theme_options',
        		'type' => 'textarea'
    		)
	);

	$wp_customize->add_setting(
    	'frontpage_link',
    		array(
        		'default' => '',
				'sanitize_callback' => 'esc_url_raw',
    			)
	);

	$wp_customize->add_control(
    	'frontpage_link',
   			array(
        		'label' => esc_html__('Add url for header call to action button.', 'getaway-lite'),
        		'section' => 'getaway_theme_options',
        		'type' => 'text',
    		)
	);

	$wp_customize->add_setting(
    	'link_title',
    		array(
        		'default' => esc_html__('View our tours', 'getaway-lite'),
				'sanitize_callback' => 'getaway_sanitize_text',
				'transport' => 'postMessage'
    		)
	);

	$wp_customize->add_control(
    	'link_title',
    		array(
        		'label' => esc_html__('Call to action link title', 'getaway-lite'),
        		'section' => 'getaway_theme_options',
        		'type' => 'text'
    		)
	);

	$wp_customize->add_setting(
    	'disable_scooter',
			array(
				'sanitize_callback' => 'getaway_sanitize_checkbox',
    		)
	);

	$wp_customize->add_control(
    'disable_scooter',
    	array(
        	'type' => 'checkbox',
        	'label' => esc_html__('Disable scooter in footer', 'getaway-lite'),
        	'section' => 'getaway_theme_options',
    	)
	);

	$wp_customize->add_setting(
    	'copyright_text',
    		array(
        'default' => '',
				'sanitize_callback' => 'getaway_sanitize_text',
				'transport' => 'postMessage'
    		)
	);

	$wp_customize->add_control(
    	'copyright_text',
    		array(
        		'label' => esc_html__('Add copyright text in the footer.', 'getaway-lite'),
        		'section' => 'getaway_theme_options',
        		'type' => 'textarea'
    		)
	);

}
add_action('customize_register', 'getaway_customize_register');
function getaway_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function getaway_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function getaway_customize_preview_js() {
	wp_enqueue_script( 'getaway_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'getaway_customize_preview_js' );
