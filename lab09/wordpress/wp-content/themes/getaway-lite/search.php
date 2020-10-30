<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package getaway
 */

get_header(); ?>

<div class="top-header">
	<div class="orangeheader animated fadeIn go"></div>
  <div class="headerimage" style="background-image:url(
    <?php if (has_post_thumbnail()) {
        $featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'getaway-featureheader' );
            echo esc_url($featuredImage);
  } else {
        header_image();
  }
  ?>
    );"> </div>
  <div class="pagetop">
    <h1 class="entry-title">
  		<?php printf( esc_html__( 'Search Results for: %s', 'getaway-lite' ), '<span>' . get_search_query() . '</span>' ); ?>
    </h1>
  </div>
</div>

<div id="wrapper" class="animatedParent animateOnce">
    <div id="contentwrapper" class="animated fadeIn">


  <div id="contentfull">
    	<?php if (have_posts()) : ?>

          <?php
              while ( have_posts() ) : the_post();
                  get_template_part( 'content', get_post_format() );
              endwhile;
          ?>
          <?php the_posts_pagination(); ?>
    	<?php else : ?>
    		<p class="center">
      			<?php esc_html_e( 'No results.', 'getaway-lite' ); ?>
    		</p>
    	<?php endif; ?>
  	</div>
</div>
</div>
<?php get_footer(); ?>
