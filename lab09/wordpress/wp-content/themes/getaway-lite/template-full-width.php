<?php
/**
 * Template Name: Full Width
 *
 * @package distance lite
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
    <div id="contentfull">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="post" id="post-<?php the_ID(); ?>">
        <div class="entry">
          <?php the_content(); ?>
          <?php edit_post_link(); ?>
          <?php wp_link_pages(array('before' => '<p><strong>'. esc_html__( 'Pages:', 'getaway-lite' ) .'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          <?php comments_template(); ?>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
