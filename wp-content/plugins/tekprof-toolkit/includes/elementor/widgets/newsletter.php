<?php

namespace TekprofToolkit\ElementorAddon\Widgets;


use Elementor\Widget_Base;

class Newsletter extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-newsletter';
	}

	public function get_title()
	{
		return esc_html__('Newsletter', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-mailchimp webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'section', 'newsletter'];
	}

	protected function register_controls()
	{

		$this->start_controls_section(
			'layout_section',
			[
				'label' => __('Layout', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_type',
			[
				'label' => __('Select Layout', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'default' => 'layout_one',
				'options' => [
					'layout_one' => __('Layout One', 'tekprof-toolkit'),
					'layout_two' => __('Layout Two', 'tekprof-toolkit'),
					'layout_three' => __('Layout Three', 'tekprof-toolkit'),
					'layout_four' => __('Layout Four', 'tekprof-toolkit'),
				]
			]
		);

		$this->end_controls_section();

		include rt_get_elementor_option('newsletter-one-option.php');
		include rt_get_elementor_option('newsletter-two-option.php');
		include rt_get_elementor_option('newsletter-three-option.php');
		include rt_get_elementor_option('newsletter-four-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .sec-title', ['layout_one']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .subtitle', ['layout_one']);
		tekprof_elementor_style_options($this, 'Input Label', '{{WRAPPER}} .section-title p', ['layout_one']);

		tekprof_elementor_style_options($this, 'Summary Text', '{{WRAPPER}} .footer-newsletter p', ['layout_two']);


		tekprof_elementor_style_options($this, 'Caption Text One', '{{WRAPPER}} .cta-two-image-part .shape.five', ['layout_one']);
		tekprof_elementor_style_options($this, 'Caption Text One Bg', '{{WRAPPER}} .cta-two-image-part .shape.five', ['layout_one'], 'background-color');
		tekprof_elementor_style_options($this, 'Caption Text Two', '{{WRAPPER}} .cta-two-image-part .shape.six', ['layout_one']);
		tekprof_elementor_style_options($this, 'Caption Text Two Bg', '{{WRAPPER}} .cta-two-image-part .shape.six', ['layout_one'], 'background-color');

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		include rt_get_elementor_template('newsletter-one.php');
		include rt_get_elementor_template('newsletter-two.php');
		include rt_get_elementor_template('newsletter-three.php');
		include rt_get_elementor_template('newsletter-four.php');
	}
}
