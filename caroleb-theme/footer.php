<?php
/**
 * The footer template file
 *
 * Contains the closing of the #page div and all content after.
 *
 * @package WP_B2
 * @since 1.0.0
 */

?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<?php if (is_active_sidebar('footer-1')): ?>
			<aside class="footer-widgets">
				<?php dynamic_sidebar('footer-1'); ?>
			</aside>
		<?php endif; ?>

		<div class="site-branding">
			<?php
			$wp_b2_description = get_bloginfo('description', 'display');
			if ($wp_b2_description || is_customize_preview()):
				?>
				<p class="site-description">
					<?php echo $wp_b2_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</p>
				<?php
			endif;

			?>
		</div><!-- .site-branding -->

		<div class="site-info">

			<div class="info">
				<div class="info-perso">
					<?php
					$query = new WP_Query(array(
						'post_type' => 'footer',
						'p' => 469
					));

					if ($query->have_posts()):
						while ($query->have_posts()):
							$query->the_post();
							the_content();

						endwhile;
					endif;

					wp_reset_postdata();
					?>
				</div>
				<div class="info-reseau">
					<?php
					$query = new WP_Query(array(
						'post_type' => 'footer',
						'p' => 470
					));

					if ($query->have_posts()):
						while ($query->have_posts()):
							$query->the_post();
							the_content();

						endwhile;
					endif;

					wp_reset_postdata();
					?>
				</div>
				<div class="info-news">
					<?php
					// $query = new WP_Query(array(
					// 'post_type' => 'footer',
					// 'p' => 288
					// ));
					
					// if ($query->have_posts()):
					// while ($query->have_posts()):
					// $query->the_post();
					// the_content();
					
					// endwhile;
					// endif;
					
					// wp_reset_postdata();
					?>
				</div>

			</div>

			<?php
			if (has_nav_menu('footer')):
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id' => 'footer-menu',
						'menu_class' => 'footer-menu',
						'container' => 'nav',
						'container_class' => 'footer-navigation',
						'depth' => 1,
					)
				);
			endif;
			?>
			<p class="copyright">
				<?php
				printf(
					/* translators: 1: Year, 2: Site name */
					esc_html__('&copy; %1$s %2$s. All rights reserved.', 'wp-b2'),
					esc_html(gmdate('Y')),
					esc_html(get_bloginfo('name'))
				);
				?>
			</p>
		</div><!-- .site-info -->
	</div><!-- .container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>