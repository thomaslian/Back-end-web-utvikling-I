<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package getaway
 */

get_header(); ?>

<div class="top-header">
	<div class="orangeheader animated fadeIn go"></div>
  <div class="headerimage" style="background-image:url(<?php header_image(); ?>);"> </div>

  <div class="pagetop">
      <h1 class="entry-title">
          <?php esc_html_e( 'Oops! That page can&rsquo;t be found', 'getaway-lite' ); ?>
      </h1>
  </div>
</div>
<div id="wrapper" class="animatedParent animateOnce">
    <div id="contentwrapper" class="animated fadeIn">
    <div id="contentfull">
      <svg viewBox="0 0 960 400">
	       <symbol id="s-text">
		         <text text-anchor="middle" x="50%" y="50%">404</text>
	       </symbol>

	      <g class = "g-ants">
		        <use xlink:href="#s-text" class="text"></use>
		        <use xlink:href="#s-text" class="text"></use>
		        <use xlink:href="#s-text" class="text"></use>
		        <use xlink:href="#s-text" class="text"></use>
		        <use xlink:href="#s-text" class="text"></use>
	     </g>
     </svg>

      <?php get_search_form(); ?>
  </div>
</div>
<?php get_footer(); ?>
