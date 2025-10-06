<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Tekprof
 */

use TekprofTheme\Classes\Tekprof_Helper as Helper;
use TekprofTheme\Classes\Tekprof_Post_Helper;

get_header();
?>
<!-- Blog List Area start -->
<section class="blog-standard-page py-130 rpy-100 rel z-1">
	<div class="container">
		<div class="row">
			<div class="<?php Helper::col_size(); ?>">
				<?php
				if (have_posts()):
					/* Start the Loop */
					while (have_posts()): the_post();
						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part('template-parts/contents/content');

					endwhile;

					Tekprof_Post_Helper::pagination();
				else:
					get_template_part('template-parts/contents/content', 'none');
				endif;
				?>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<!-- Blog List Area end -->
<?php
get_footer();
