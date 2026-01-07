<?php
/**
 * The template for displaying single posts
 *
 * @package WP_B2
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
	<div class="container">
		<?php
		while (have_posts()):
			the_post();

			the_title("<h1>", "</h1>");
			the_content();

		endwhile;
		?>
	</div><!-- .container -->
</main><!-- #main-content -->

<?php
get_footer();
