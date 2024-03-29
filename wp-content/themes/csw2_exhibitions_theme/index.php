<?php

/**
 * Template name: New exhibitions
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package csw2_exhibitions
 */

get_header();

$args = array(
	'post_type'      => 'csw2_exhibitions',
	'orderby'        => 'post_modified',
	'order'          => 'DESC',
	'posts_per_page' => '3'
);

$exhibitions = new WP_Query($args);

?>

<div id="primary" class="content-area">
	<main id="main-news" class="site-main">
		<header>
			<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		</header>
		<?php
		while ($exhibitions->have_posts()) :
			$exhibitions->the_post();

			get_template_part('template-parts/content', 'page-news');


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
