<?php
/**
 * Template name: New exhibition
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package N41_Editions
 */

get_header();

$args = array(
    'post_type'      => 'csw_exhibition',
    'meta_key'       => 'date publication',
    'orderby'        => 'meta_value',
    'order'          => 'DESC',
    'posts_per_page' => '3'
);

$exhibition = new WP_Query($args);

?>

	<div id="primary" class="content-area">
		<main id="main-news" class="site-main">
			<header>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>
		<?php
		while ( $exhibition->have_posts() ) :
			$exhibition->the_post();

			get_template_part( 'template-parts/content', 'page-news' );


		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
