<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vast
 * @since 1.0.0
 */

get_header(); ?>

<div class="container">
	<div id="not-found" class="d-flex flex-column justify-content-center align-items-center text-center">
		<h1><?php echo esc_html__( '404', 'vast' ); ?></h1>
		<h2><?php echo esc_html__( 'Sorry, the page you were looking for was not found.', 'vast' ); ?></h2>
		<p>
		<?php
			echo esc_html__( 'Would you like to go to ', 'vast' );
			echo wp_kses(
				'<a href="' . esc_url( site_url() ) . '" title="' . esc_attr__( 'Homepage', 'vast' ) . '">' . esc_html__( 'Homepage', 'vast' ) . '</a>',
				array(
					'a' => array(
						'href' => array(),
						'title' => array(),
					),
				)
			);
			echo esc_html__( ' or try searching instead?', 'vast' );
		?>
		</p>

		<div class="search-form-wrapper">
			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
