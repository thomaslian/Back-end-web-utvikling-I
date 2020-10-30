<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package getaway
 */
?>

<?php if ( is_active_sidebar( 'sidebar-4' )  ) : ?>
  <div class="abovefooter">

    <div class="frontwidget">
        <?php dynamic_sidebar( 'sidebar-4' ); ?>
    </div>
	<?php if('' == get_theme_mod( 'disable_scooter' )) : ?>
    	<?php get_template_part( 'bike' ); ?>
	<?php endif ?>
</div>
<?php endif ?>

<svg id="footerwave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#00CCFF" fill-opacity="1" d="M0,128L24,160C48,192,96,256,144,245.3C192,235,240,149,288,144C336,139,384,213,432,224C480,235,528,181,576,176C624,171,672,213,720,213.3C768,213,816,171,864,133.3C912,96,960,64,1008,58.7C1056,53,1104,75,1152,101.3C1200,128,1248,160,1296,149.3C1344,139,1392,85,1416,58.7L1440,32L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"></path>
</svg>
<div id="footer">
  <div id="footerlogo">
    <?php the_custom_logo(); ?>
  </div>
  <div class="footerinner">
    <div id="footerwidgets">
      <?php dynamic_sidebar( 'sidebar-3' ); ?>
    </div>
    <?php if ( has_nav_menu( 'social' ) ) {
					wp_nav_menu(
						array(
							'theme_location'  => 'social',
							'container'       => 'div',
							'container_id'    => 'menu-social',
							'container_class' => 'menu',
							'menu_id'         => 'menu-social-items',
							'menu_class'      => 'menu-items',
							'depth'           => 1,
							'link_before'     => '<span class="screen-reader-text">',
							'link_after'      => '</span>',
							'fallback_cb'     => '',
						)
					);
	} ?>

  <div id="copyinfo">
  <?php if( get_theme_mod( 'copyright_text') == '' ) : ?>
      &copy; <?php echo date_i18n(__('Y','getaway-lite')); ?> <?php bloginfo('name'); ?>. <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'getaway-lite' ) ); ?>"> <?php printf( esc_html__( 'Powered by %s.', 'getaway-lite' ), 'WordPress' ); ?> </a> <?php printf( esc_html__( 'Theme by %1$s.', 'getaway-lite' ), '<a href="https://vivathemes.com/" rel="designer">Viva Themes</a>' ); ?>
    <?php else : ?>
      <?php echo wp_kses_post(get_theme_mod( 'copyright_text', '')); ?>
    <?php endif ?>
  </div>
</div>

  </div>

</div>
<?php wp_footer(); ?>
</body></html>
