<?php
/**
 * The template for displaying posts on index view
 *
 * @package getaway
 */
?>

<div <?php post_class(); ?>>
  <div class="entry">
    <a class="bloglink" href="<?php the_permalink(); ?>">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('getaway-blogthumb'); ?>
      <?php else : ?>
        <img src="<?php echo esc_url(get_template_directory_uri() .'/images/blogbg.jpg'); ?>" />
      <?php endif ?>
    </a>
    <h2 class="entry-title" id="post-<?php the_ID(); ?>"> <a href="<?php the_permalink(); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a> </h2>
    <div class="postcat">
      <?php echo get_the_date(); ?>
    </div>
  </div>
</div>
