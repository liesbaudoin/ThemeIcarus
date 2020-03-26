<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			the_content();
		}
	}

	?>


<?php get_footer(); ?>
