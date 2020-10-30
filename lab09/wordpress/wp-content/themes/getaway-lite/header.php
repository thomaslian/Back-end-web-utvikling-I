<?php
/**
 * The Header for our theme.
 *
 *
 * @package getaway
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=2.0, user-scalable=yes" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url(get_bloginfo( 'pingback_url' )); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
} ?>

	<div id="container">

		<div id="header">

              <div id="logo">
        				<?php the_custom_logo(); ?>
        				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        					<h1 class="site-title">
          						<?php bloginfo( 'name' ); ?>
        					</h1>
        				</a>
      				</div>

							<?php if ( has_nav_menu( 'main-menu' ) ) {
	    				wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container_id'   => 'mainmenu',
								'menu_class' 	 => 'superfish sf-menu',
								'fallback_cb'	 => false
							)
						);
	  					} ?>

							<?php if ( has_nav_menu( 'main-menu' ) ) {

						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container_class'   => 'mmenu',
								'menu_class' 	 => 'navmenu',
								'fallback_cb'	 => false
						)
						);
							} ?>

	</div>


	<?php if (is_front_page()): ?>
		<div class="headerbg animated fadeIn go">
			<div class="orangeheader animated fadeIn go"></div>
			<div class="headerimage animated fadeIn go" style="background-image: url('<?php header_image(); ?>')"></div>

			<div class="topcontent animated fadeInUpShort go">
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<div class="hellotext animated fadeIn go">
			    	<?php echo wp_kses_post(get_theme_mod('featured_text')); ?>
				</div>
				<?php if ( get_theme_mod( 'frontpage_link' ) ) : ?>
					<a class="btn" href="<?php echo esc_url(get_theme_mod( 'frontpage_link')); ?>"> <span> <span> <span><?php echo esc_html(get_theme_mod( 'link_title')); ?></span> </span> </span> </a>
				<?php endif ?>
			</div>

	</div>
	<?php endif ?>
