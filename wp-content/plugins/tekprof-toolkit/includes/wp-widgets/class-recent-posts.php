<?php

namespace TekprofToolkit\WpWidgets;

use WP_Query;
use WP_Widget;

defined('ABSPATH') || exit;

class Tekprof_Recent_Posts extends WP_Widget
{

	public function __construct()
	{
		$widget_ops = array(
			'classname'   => 'tekprof-wp-recent-posts widget-news',
			'description' => __('A custom widget to display recent posts with various options', 'tekprof-toolkit')
		);

		parent::__construct('tekprof_recent_posts_widget', __('Tekprof Recent Posts', 'tekprof-toolkit'), $widget_ops);
	}

	public function widget($args, $instance)
	{
		$title          = ! empty($instance['title']) ? $instance['title'] : __('Recent Posts', 'tekprof-toolkit');
		$num_posts      = ! empty($instance['num_posts']) ? $instance['num_posts'] : 5;
		$trim_words     = ! empty($instance['trim_words']) ? $instance['trim_words'] : 10;
		$show_date      = $instance['show_date'] ?? 'yes';
		$show_thumbnail = $instance['show_thumbnail'] ?? 'yes';

		echo $args['before_widget'];

		if ($title) {
			echo $args['before_title'] . apply_filters('widget_title', $title) . $args['after_title'];
		}

		$recent_posts = new WP_Query(array(
			'posts_per_page'      => $num_posts,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		));

		if ($recent_posts->have_posts()) {
			echo '<ul>';
			while ($recent_posts->have_posts()) {
				$recent_posts->the_post();
				echo '<li>';
				if ('yes' === $show_thumbnail && has_post_thumbnail()) {
					echo '<div class="image">' . get_the_post_thumbnail(get_the_ID(), 'tekprof_blog_100X80') . '</div>';
				}
				echo '<div class="content">';
				echo '<h5><a href="' . get_permalink() . '" >' . wp_trim_words(get_the_title(), $trim_words) . '</a></h5>';
				echo '<span class="date">' . get_the_date() . '</span>';
				echo '</div>';
				echo '</li>';
			}
			echo '</ul>';
			wp_reset_postdata();
		}

		echo $args['after_widget'];
	}

	public function form($instance)
	{
		$title          = ! empty($instance['title']) ? $instance['title'] : __('Recent Posts', 'tekprof-toolkit');
		$num_posts      = ! empty($instance['num_posts']) ? $instance['num_posts'] : 5;
		$trim_words     = ! empty($instance['trim_words']) ? $instance['trim_words'] : 10;
		$show_date      = $instance['show_date'] ?? 'yes';
		$show_thumbnail = $instance['show_thumbnail'] ?? 'yes';
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tekprof-toolkit'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('num_posts'); ?>"><?php _e('Number of Posts:', 'tekprof-toolkit'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('num_posts'); ?>" name="<?php echo $this->get_field_name('num_posts'); ?>" type="number" min="1" value="<?php echo esc_attr($num_posts); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('trim_words'); ?>"><?php _e('Trim Title Words:', 'tekprof-toolkit'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('trim_words'); ?>" name="<?php echo $this->get_field_name('trim_words'); ?>" type="number" min="1" value="<?php echo esc_attr($trim_words); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Show Date:', 'tekprof-toolkit'); ?></label>
			<select id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" class="widefat">
				<option value="yes" <?php selected($show_date, 'yes'); ?>><?php _e('Yes', 'tekprof-toolkit'); ?></option>
				<option value="no" <?php selected($show_date, 'no'); ?>><?php _e('No', 'tekprof-toolkit'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('show_thumbnail'); ?>"><?php _e('Show Thumbnail:', 'tekprof-toolkit'); ?></label>
			<select id="<?php echo $this->get_field_id('show_thumbnail'); ?>" name="<?php echo $this->get_field_name('show_thumbnail'); ?>" class="widefat">
				<option value="yes" <?php selected($show_thumbnail, 'yes'); ?>><?php _e('Yes', 'tekprof-toolkit'); ?></option>
				<option value="no" <?php selected($show_thumbnail, 'no'); ?>><?php _e('No', 'tekprof-toolkit'); ?></option>
			</select>
		</p>
<?php
	}

	public function update($new_instance, $old_instance)
	{
		$instance                     = [];
		$instance['title']          = (! empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
		$instance['num_posts']      = (! empty($new_instance['num_posts'])) ? intval($new_instance['num_posts']) : 5;
		$instance['trim_words']     = (! empty($new_instance['trim_words'])) ? intval($new_instance['trim_words']) : 10;
		$instance['show_date']      = $new_instance['show_date'] ?? 'yes';
		$instance['show_thumbnail'] = $new_instance['show_thumbnail'] ?? 'yes';

		return $instance;
	}
}
