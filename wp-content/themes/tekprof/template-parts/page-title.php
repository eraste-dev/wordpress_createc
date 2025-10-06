<?php

/**
 * Template part for displaying page Title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tekprof
 */

use TekprofTheme\Classes\Tekprof_Breadcrumb;
use TekprofTheme\Classes\Tekprof_Helper as Helper;
use TekprofTheme\Classes\Tekprof_Post_Helper;


$active_title = Helper::get_option('site_page_title', 'enabled');
$breadcrumb   = Helper::get_option('site_breadcrumb', 'enabled');
$title        = '';
$custom_title = '';
$title_output = [];

if (is_page() && ! is_home()) {
	$page_title        = Helper::get_meta('tekprof_page_meta', 'page_title', 'default');
	$page_breadcrumb   = Helper::get_meta('tekprof_page_meta', 'page_breadcrumb', 'default');
	$page_title_type   = Helper::get_meta('tekprof_page_meta', 'page_title_type', 'default');
	$page_custom_title = Helper::get_meta('tekprof_page_meta', 'page_custom_title', '');

	if ('default' !== $page_title) {
		$active_title = $page_title;
	}

	if ('custom' === $page_title_type && ! empty($page_custom_title)) {
		$custom_title = $page_custom_title;
	}

	if ('default' !== $page_breadcrumb) {
		$breadcrumb = $page_breadcrumb;
	}
} elseif (is_single() && 'post' === get_post_type()) {
	$post_page_title   = Helper::get_meta('tekprof_post_meta', 'post_page_title', 'default');
	$post_breadcrumb   = Helper::get_meta('tekprof_post_meta', 'post_breadcrumb', 'default');
	$post_title_type   = Helper::get_meta('tekprof_post_meta', 'post_title_type', 'default');
	$post_custom_title = Helper::get_meta('tekprof_post_meta', 'post_custom_title', __('News Details', 'tekprof'));

	if ('default' !== $post_page_title) {
		$active_title = $post_page_title;
	}

	if ('custom' === $post_title_type && ! empty($post_custom_title)) {
		$custom_title = $post_custom_title;
	}

	if ('default' !== $post_breadcrumb) {
		$breadcrumb = $post_breadcrumb;
	}
} elseif (is_single() && 'tekprof_portfolio' === get_post_type()) {

	$portfolio_page_title   = Helper::get_meta('tekprof_portfolio_meta', 'portfolio_page_title', 'default');
	$portfolio_breadcrumb   = Helper::get_meta('tekprof_portfolio_meta', 'portfolio_breadcrumb', 'default');
	$portfolio_title_type   = Helper::get_meta('tekprof_portfolio_meta', 'portfolio_page_title_type', 'default');
	$portfolio_custom_title = Helper::get_meta('tekprof_portfolio_meta', 'portfolio_custom_title', __('Project Details', 'tekprof'));

	if ('default' !== $portfolio_page_title) {
		$active_title = $portfolio_page_title;
	}

	if ('custom' === $portfolio_title_type && ! empty($portfolio_custom_title)) {
		$custom_title = $portfolio_custom_title;
	}

	if ('default' !== $portfolio_breadcrumb) {
		$breadcrumb = $portfolio_breadcrumb;
	}
} elseif (is_single() && 'product' === get_post_type()) {
	$product_page_title   = Helper::get_meta('tekprof_product_meta', 'product_page_title', 'default');
	$product_breadcrumb   = Helper::get_meta('tekprof_product_meta', 'product_breadcrumb', 'default');
	$product_title_type   = Helper::get_meta('tekprof_product_meta', 'product_page_title_type', 'default');
	$product_custom_title = Helper::get_meta('tekprof_product_meta', 'product_custom_title', '');

	if ('default' !== $product_page_title) {
		$active_title = $product_page_title;
	}

	if ('custom' === $product_title_type && ! empty($product_custom_title)) {
		$custom_title = $product_custom_title;
	}

	if ('default' !== $product_breadcrumb) {
		$breadcrumb = $product_breadcrumb;
	}
}

if (is_home()) {
	$title = Helper::get_option('blog_archive_title', __('Latest News', 'tekprof'));
} elseif (is_search()) {
	$title = esc_html__('Search Results for: ', 'tekprof') . get_search_query();
} elseif (is_archive()) {
	if (class_exists('WooCommerce') && is_shop()) {
		$shop_id = get_option('woocommerce_shop_page_id', '');
		$title   = get_the_title($shop_id);
	} elseif (is_post_type_archive('tekprof_portfolio')) {
		$portfolio_title = Helper::get_option('archive_page_title', __('Our Portfolio', 'tekprof'));

		if (! empty($portfolio_title)) {
			$title = $portfolio_title;
		}
	} else {
		$title = strip_tags(get_the_archive_title());
	}
} elseif (! empty($custom_title)) {
	$title = esc_html($custom_title);
} else {
	$title = wp_kses_post(get_the_title());
}

if (is_404()) {
	$title = esc_html__('404', 'tekprof');
}

if ($title) {
	$title_output[] = $title;
}

if ('enabled' !== $active_title) {
	return;
}

$show_post_meta = Helper::get_option('blog_details_meta', 'yes');

$breadcrumb_image      = Helper::get_option('breadcrumb_image');

if (is_404()) {
	return;
}

?>
<?php if (is_singular('post')): ?>
	<!-- Page Banner Start -->
	<section class="page-banner-area blog-banner rel z-1">
		<div class="container-fluid">
			<div class="banner-wrap bgs-cover py-80" <?php if (!empty($breadcrumb_image['url'])) : ?> style="background-image: url(<?php echo esc_url($breadcrumb_image['url']); ?>);" <?php endif; ?>>
				<div class="container">
					<div class="row">
						<div class="col-xl-9">
							<div class="banner-inner blog-style">
								<nav aria-label="breadcrumb">
									<?php Tekprof_Breadcrumb::breadcrumb_init(); ?>
								</nav>
								<h1 class="page-title mt-25 rmt-15" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50"><?php echo implode('', $title_output); ?></h1>
								<?php if ('yes' === $show_post_meta) : ?>
									<div class="blog-meta-two mt-35 rmt-25" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
										<?php Tekprof_Post_Helper::render_post_meta(); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page Banner End -->

<?php else: ?>
	<!-- Page Banner Start -->
	<section class="page-banner-area blog-banner pt-30 rel z-1">
		<div class="container-fluid">
			<div class="banner-wrap bgs-cover py-80" <?php if (!empty($breadcrumb_image['url'])) : ?> style="background-image: url(<?php echo esc_url($breadcrumb_image['url']); ?>);" <?php endif; ?>>
				<div class="container">
					<div class="banner-inner">
						<h1 class="page-title mb-20" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"><?php echo implode('', $title_output); ?></h1>
						<nav aria-label="breadcrumb">
							<?php
							if (is_singular('post') && 'yes' === $show_post_meta) {
								Tekprof_Post_Helper::render_post_meta();
							} elseif ('enabled' === $breadcrumb) {
								Tekprof_Breadcrumb::breadcrumb_init();
							}
							?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page Banner End -->
<?php endif;
