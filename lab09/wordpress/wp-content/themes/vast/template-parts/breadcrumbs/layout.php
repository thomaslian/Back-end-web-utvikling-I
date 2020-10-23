<?php
/**
 * Breadcrumbs Layout
 *
 * @package Vast
 */

?>

<?php
$hide_breadcrumbs = ( 'breadcrumbs-hidden' === vast_theme_setting( 'breadcrumbs-option' ) ) ? true : false;

$hide_breadcrumbs = apply_filters( 'hide_breadcrumbs', $hide_breadcrumbs );

if ( $hide_breadcrumbs ) {
	return;
}

if ( function_exists( 'woocommerce_breadcrumb' ) ) {
	$wc_breadcrumb_args = array(
		'delimiter' => '',
		'wrap_before' => '<div class="breadcrumbs"><div class="container"><div class="uf-breadcrumbs">',
		'wrap_after' => '</div></div></div>',
		'before' => '<span>',
		'beforecurrent' => '<span class="current">',
		'after' => '</span>',
		'home' => esc_html__( 'Home', 'vast' ),
	);

	woocommerce_breadcrumb( $wc_breadcrumb_args );
} else {
?>
	<div class="breadcrumbs">
		<div class="container">
			<?php vast_breadcrumbs(); ?>
		</div>
	</div>
<?php
}
?>
