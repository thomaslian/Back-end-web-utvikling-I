<?php
/**
 * The main template file.
 *
 *
 * @package getaway
 */

get_header(); ?>

<?php if (!is_front_page()): ?>
  <div class="top-header">
    <div class="headerimage" style="background-image:url(
      <?php if (has_post_thumbnail(get_option('page_for_posts'))) {
          $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_option('page_for_posts') ), 'getaway-featureheader' );
          echo esc_url($image[0]);
        } else {
          header_image();
        }
        ?>
        );"> </div>
        <div class="pagetop">
          <?php if(get_post_meta($post->ID, 'add_subtitle', true)): ?>
            <span class="addedsubtitle"><?php echo esc_html (get_post_meta($post->ID, 'add_subtitle', true)); ?></span>
          <?php endif ?>
          <?php if( is_home() && get_option('page_for_posts') ) { $blog_page_id = get_option('page_for_posts'); echo '<h1 class="entry-title">'.esc_html(get_page($blog_page_id)->post_title).'</h1>'; } ?>
        </div>
    </div>
<?php endif ?>

<div id="wrapper" class="animatedParent animateOnce">
  <div id="contentwrapper" class="animated fadeIn">
    <div id="contentfull">
      <?php if (have_posts()) : ?>
      <?php while ( have_posts() ) : the_post();
  				get_template_part( 'content', get_post_format() );
  			endwhile; ?>
      <?php the_posts_pagination(); ?>
      <?php else : ?>
      <p class="center">
        <?php esc_html_e( 'You don&#39;t have any posts yet.', 'getaway-lite' ); ?>
      </p>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
