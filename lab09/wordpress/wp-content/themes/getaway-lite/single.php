<?php
/**
 * The Template for displaying all single posts.
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
          <?php the_title(); ?>
      </h1>
  </div>
</div>

<div id="wrapper" class="animatedParent animateOnce">
  <div id="contentwrapper" class="animated fadeIn">
    <div id="content">
      <?php while ( have_posts() ) : the_post(); ?>
      <div <?php post_class(); ?>>
        <div class="entry">
          <?php the_content(); ?>
          <?php wp_link_pages(array('before' => '<p><strong>'. esc_html__( 'Pages:', 'getaway-lite' ) .'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          <?php edit_post_link(); ?>
          <?php echo wp_kses_post(get_the_tag_list('<p class="singletags">',' ','</p>')); ?>
          <div class="post-navigation">
            <div class="nav-previous">
              <?php previous_post_link( '%link' ) ?>
            </div>
            <div class="nav-next">
              <?php next_post_link( '%link' ) ?>
            </div>
          </div>
          <?php comments_template(); ?>
        </div>
      </div>
      <?php endwhile; // end of the loop. ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
