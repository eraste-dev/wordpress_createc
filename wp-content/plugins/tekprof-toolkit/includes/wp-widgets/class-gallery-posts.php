<?php

defined('ABSPATH') || exit;

// Control core classes for avoid errors
if (class_exists('CSF')) {

	//
	// gallery widget
	//
	\CSF::createWidget('tekprof_gallery_wp_widget', array(
		'title'       => esc_html__('Tekprof Gallery', 'tekprof-toolkit'),
		'classname'   => 'widget-gallery',
		'description' => esc_html__('A custom widget to display recent posts with various options', 'tekprof-toolkit'),
		'fields'      => array(

			array(
				'id'      => 'title',
				'type'    => 'text',
				'title'   => 'Title',
			),
			array(
				'id'    => 'gallery',
				'type'  => 'gallery',
				'title' => esc_html__('Add Image', 'tekprof-toolkit'),
			),

		)
	));

	//
	// Front-end display of widget example 1
	// Attention: This function named considering above widget base id.
	//
	if (! function_exists('tekprof_gallery_wp_widget')) {
		function tekprof_gallery_wp_widget($args, $instance)
		{

			echo $args['before_widget'];

			if (! empty($instance['title'])) {
				echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
			}

			$gallery_ids = explode(',', $instance['gallery']);

			if (! empty($gallery_ids)) {

?>
				<div class="gallery">
					<?php foreach ($gallery_ids as $gallery_item_id) {
						$image_alt = get_post_meta($gallery_item_id, '_wp_attachment_image_alt', TRUE);
					?>
						<a href="<?php echo wp_get_attachment_url($gallery_item_id); ?>">
							<i class="far fa-plus"></i>
							<img src="<?php echo wp_get_attachment_url($gallery_item_id); ?>" alt="<?php echo esc_attr($image_alt); ?>">
						</a>
					<?php } ?>
				</div>
<?php

			}

			echo $args['after_widget'];
		}
	}
}
