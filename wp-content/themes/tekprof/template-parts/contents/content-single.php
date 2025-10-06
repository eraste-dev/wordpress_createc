<?php

/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tekprof
 */

use TekprofTheme\Classes\Tekprof_Helper as Helper;
use TekprofTheme\Classes\Tekprof_Post_Helper;

$show_post_share = Helper::get_option('blog_details_share', 'no');
$show_tag        = Helper::get_option('blog_details_tag', 'yes');
$show_nav        = Helper::get_option('blog_details_nav', 'yes');
$author_info     = Helper::get_option('blog_author_info', 'yes');
$show_category   = Helper::get_option('blog_details_category', 'yes');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('entry-post-details clearfix'); ?>>
	<div class="blog-details-content">
		<?php if (has_post_thumbnail()) : ?>
			<div class="image mb-40 rmb-30" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
				<?php Tekprof_Post_Helper::render_media(); ?>
			</div>
		<?php endif; ?>
		<?php if ('yes' === $show_category) { ?>
			<div class="project-tags tag-clouds mb-15">
				<?php the_category(' '); ?>
			</div>
		<?php } ?>
		<div class="entry-content clearfix">
			<?php
			the_content();

			wp_link_pages(array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'tekprof'),
				'after'  => '</div>',
			));
			?>
		</div>
		<hr class="mt-50 mb-60">
	</div>
	<?php if (('yes' === $show_tag && has_tag()) || ('yes' === $show_post_share && function_exists('tekprof_post_share_links'))) : ?>
		<div class="tag-share mb-30">
			<div class="item" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
				<h6><?php esc_html_e('Tags:', 'tekprof'); ?></h6>
				<div class="tag-clouds pb-15">
					<?php the_tags('', ''); ?>
				</div>
			</div>
			<?php if (function_exists('tekprof_post_share_links')) : ?>
				<div class="item pt-5" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
					<h6><?php echo esc_html__('Share:', 'tekprof'); ?></h6>
					<div class="social-style-five mb-10">
						<?php tekprof_post_share_links(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php
	if ('yes' === $author_info) {
		Tekprof_Post_Helper::post_author_info();
	}

	if ('yes' === $show_nav) {
		Tekprof_Post_Helper::post_navigation();
	}
	?>

	<hr class="mb-70">
</article>