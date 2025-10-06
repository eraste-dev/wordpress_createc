<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tekprof
 */
?>

<div class="not-found-wrapper">
	<h3 class="not-found-title"><?php esc_html_e('Nothing Found', 'tekprof'); ?></h3>

	<?php if (is_home() && current_user_can('publish_posts')) : ?>
		<p>
			<?php esc_html_e('Ready to publish your first post?.', 'tekprof'); ?>
			<a href="<?php echo esc_url(admin_url('post-new.php')) ?>">
				<?php esc_html_e('Get started here', 'tekprof'); ?>
			</a>
		</p>
	<?php elseif (is_search()) : ?>
		<p>
			<?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tekprof'); ?>
		</p>
		<?php get_search_form(); ?>
	<?php else : ?>
		<p>
			<?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'tekprof'); ?>
		</p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>