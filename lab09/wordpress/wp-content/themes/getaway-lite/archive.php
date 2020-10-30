<?php
/**
 * The template for displaying Archive pages.
 *
 *
 * @package getaway
 */

get_header(); ?>

<div class="top-header">
  <div class="orangeheader animated fadeIn go"></div>
  <div class="headerimage" style="background-image:url(<?php header_image(); ?>);"> </div>
  <div class="pagetop">

    <?php
    the_archive_description( '<span class="addedsubtitle">', '</span>' );
    the_archive_title( '<h1 class="entry-title">', '</h1>' );
  ?>
  </div>
</div>

  <div id="wrapper" class="animatedParent animateOnce">
    <div id="contentwrapper" class="animated fadeIn">

      <?php if ( have_posts() ) : ?>
      <?php
        while ( have_posts() ) : the_post();
            get_template_part( 'content', get_post_format() );
        endwhile;
        ?>
      <?php the_posts_pagination(); ?>
      <?php else : ?>
      <h2 class="center">
        <?php esc_html_e( 'Not Found', 'getaway-lite' ); ?>
      </h2>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
