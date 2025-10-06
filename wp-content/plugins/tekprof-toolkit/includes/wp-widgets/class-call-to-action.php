<?php

namespace TekprofToolkit\WpWidgets;

use WP_Widget;

defined('ABSPATH') || exit;

class Tekprof_CTA extends WP_Widget
{

	public function __construct()
	{
		$widget_ops = array(
			'classname'   => 'tekprof-wp-cta widget-cta',
			'description' => __('A custom call-to-action widget with background image and button', 'tekprof-toolkit')
		);

		parent::__construct('tekprof_cta_widget', __('Tekprof Call to Action', 'tekprof-toolkit'), $widget_ops);

		// Enqueue media scripts for widget admin
		add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
	}

	public function enqueue_admin_scripts($hook)
	{
		if ($hook == 'widgets.php' || $hook == 'customize.php') {
			wp_enqueue_media();
			wp_enqueue_script('jquery');
		}
	}

	public function widget($args, $instance)
	{
		$heading = ! empty($instance['heading']) ? $instance['heading'] : __('Need Professional IT Services?', 'tekprof-toolkit');
		$button_text = ! empty($instance['button_text']) ? $instance['button_text'] : __('Get In Touch', 'tekprof-toolkit');
		$button_url = ! empty($instance['button_url']) ? $instance['button_url'] : '#';
		$background_image = ! empty($instance['background_image']) ? $instance['background_image'] : '';

		// Don't output the default widget wrapper for this widget
		// echo $args['before_widget'];

		$style_attr = '';
		if ($background_image) {
			$style_attr = 'style="background-image: url(' . esc_url($background_image) . ');"';
		}

		echo '<div class="widget widget-cta" ' . $style_attr . ' data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">';
		echo '<h3>' . esc_html($heading) . '</h3>';
		echo '<a href="' . esc_url($button_url) . '" class="theme-btn btn-small">' . esc_html($button_text) . '</a>';
		echo '</div>';

		// echo $args['after_widget'];
	}

	public function form($instance)
	{
		$heading = ! empty($instance['heading']) ? $instance['heading'] : __('Need Professional IT Services?', 'tekprof-toolkit');
		$button_text = ! empty($instance['button_text']) ? $instance['button_text'] : __('Get In Touch', 'tekprof-toolkit');
		$button_url = ! empty($instance['button_url']) ? $instance['button_url'] : '';
		$background_image = ! empty($instance['background_image']) ? $instance['background_image'] : '';
?>
		<p>
			<label for="<?php echo $this->get_field_id('heading'); ?>"><?php _e('Heading:', 'tekprof-toolkit'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('heading'); ?>" name="<?php echo $this->get_field_name('heading'); ?>" rows="3"><?php echo esc_textarea($heading); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('button_text'); ?>"><?php _e('Button Text:', 'tekprof-toolkit'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo esc_attr($button_text); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('button_url'); ?>"><?php _e('Button URL:', 'tekprof-toolkit'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('button_url'); ?>" name="<?php echo $this->get_field_name('button_url'); ?>" type="url" value="<?php echo esc_attr($button_url); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('background_image'); ?>"><?php _e('Background Image URL:', 'tekprof-toolkit'); ?></label>
			<input class="widefat background-image-url" id="<?php echo $this->get_field_id('background_image'); ?>" name="<?php echo $this->get_field_name('background_image'); ?>" type="url" value="<?php echo esc_attr($background_image); ?>">
			<input type="button" class="button upload-image-button" value="<?php _e('Upload Image', 'tekprof-toolkit'); ?>" />
			<br><small><?php _e('Enter the full URL to your background image or click "Upload Image"', 'tekprof-toolkit'); ?></small>
		</p>

		<script type="text/javascript">
			jQuery(document).ready(function($) {
				function initImageUploader() {
					$('.upload-image-button').off('click').on('click', function(e) {
						e.preventDefault();
						var button = $(this);
						var input = button.prev('.background-image-url');

						var custom_uploader = wp.media({
							title: '<?php _e('Select Background Image', 'tekprof-toolkit'); ?>',
							button: {
								text: '<?php _e('Use this image', 'tekprof-toolkit'); ?>'
							},
							multiple: false,
							library: {
								type: 'image'
							}
						});

						custom_uploader.on('select', function() {
							var attachment = custom_uploader.state().get('selection').first().toJSON();
							input.val(attachment.url);
							input.trigger('change');
						});

						custom_uploader.open();
					});
				}

				// Initialize on page load
				initImageUploader();

				// Re-initialize when widget is saved (for widget customizer)
				$(document).on('widget-updated widget-added', function() {
					setTimeout(initImageUploader, 100);
				});
			});
		</script>
<?php
	}
}
