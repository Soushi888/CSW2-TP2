<?php
/**
 * The template for displaying all single posts n41_book
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package N41_Editions
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main-csw2-exhibition" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
