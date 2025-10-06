<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tekprof
 */

use TekprofTheme\Classes\Tekprof_Comment_Walker;

if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if (have_comments()): ?>
		<h3 class="comments-title">
			<?php
			comments_number(
				esc_html__('Comments (0)', 'tekprof'),
				esc_html__('Comments (1)', 'tekprof'),
				esc_html__('Comments (%)', 'tekprof')
			);
			?>
		</h3>

		<ul class="comment-list mb-55 my-55">
			<?php
			wp_list_comments([
				'walker'      => new Tekprof_Comment_Walker(),
				'avatar_size' => 100,
				'short_ping'  => true,
			]);
			?>
		</ul>

		<?php
		the_comments_navigation();

		if (! comments_open()) : ?>
			<p class="no-comments"><?php esc_html_e('Comments are closed.', 'tekprof'); ?></p>
	<?php endif;

	endif;

	$tekprof_commenter = wp_get_current_commenter();
	$tekprof_comment_fields = array(
		'author' => ' <div class="col-sm-6"><div class="form-group"><input type="text" id="name" name="author" class="form-control" placeholder="' . esc_attr__('Your Name', 'tekprof') . '" value="' . esc_attr($tekprof_commenter['comment_author']) . '" required></div></div>',
		'email' => ' <div class="col-sm-6"><div class="form-group"><input type="text" id="email" name="email" class="form-control" placeholder="' . esc_attr__('Your Email', 'tekprof') . '" value="' . esc_attr($tekprof_commenter['comment_author_email']) . '" required ></div></div>',
	);
	$tekprof_comments_args = array(
		'fields' => apply_filters('comment_form_default_fields', $tekprof_comment_fields),
		'class_form' => 'row  comment-form',
		'title_reply_before' => '<h3 class="comment-title mb-25">',
		'title_reply' => esc_html__('Leave a Comment', 'tekprof'),
		'title_reply_after' => '</h3>',
		'comment_notes_before' => '',
		'comment_field' => ' <div class="col-sm-12"><div class="form-group"><textarea name="comment" id="comment" class="form-control" rows="4" placeholder="' . esc_attr__('Write Comment', 'tekprof') . '" required></textarea></div></div>',
		'comment_notes_after' => '',
		'submit_button' => '<button type="submit" class="theme-btn hover-primary" data-hover="' . esc_attr__(' Submit Comment', 'tekprof') . '"><span>' . esc_html__(' Submit Comment', 'tekprof') . '</span></button>',
	);
	comment_form($tekprof_comments_args);

	?>
</div>