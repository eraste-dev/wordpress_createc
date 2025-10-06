<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tekprof
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('page-inner clearfix'); ?>>
	<div class="blog-details-content">
		<?php
		the_content();

		wp_link_pages([
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'tekprof'),
			'after'  => '</div>',
		]);
		?>
	</div>
</div>