<?php

namespace TekprofToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Testimonial extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-testimonial';
	}

	public function get_title()
	{
		return esc_html__('Testimonial', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-testimonial webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'testimonial', 'feedback', 'slider'];
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
					'layout_five' => __('Layout Five', 'tekprof-toolkit'),
					'layout_six' => __('Layout Six', 'tekprof-toolkit'),
					'layout_seven' => __('Layout Seven', 'tekprof-toolkit'),
				]
			]
		);

		$this->end_controls_section();

		include rt_get_elementor_option('testimonial-one-option.php');
		include rt_get_elementor_option('testimonial-two-option.php');
		include rt_get_elementor_option('testimonial-three-option.php');
		include rt_get_elementor_option('testimonial-four-option.php');
		include rt_get_elementor_option('testimonial-five-option.php');
		include rt_get_elementor_option('testimonial-six-option.php');
		include rt_get_elementor_option('testimonial-seven-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title,{{WRAPPER}} .subtitle.color-primary', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven']);

		tekprof_elementor_style_options($this, 'Client Title', '{{WRAPPER}} .trusted-clients-wrap h5, {{WRAPPER}} .trusted-client-part h4', ['layout_two', 'layout_five', 'layout_six']);

		tekprof_elementor_style_options($this, 'Name', '{{WRAPPER}} .testimonial-item .testi-author b,{{WRAPPER}} .testi-author b,{{WRAPPER}} .testi-footer .title h4,{{WRAPPER}} .quote-title h6,{{WRAPPER}} .testimonial-item-six .testi-author span', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven']);
		tekprof_elementor_style_options($this, 'Designation', '{{WRAPPER}} .testi-author, {{WRAPPER}} .testi-author span, {{WRAPPER}} .title span, {{WRAPPER}} .quote-title span', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven']);
		tekprof_elementor_style_options($this, 'Testimonial', '{{WRAPPER}} .testimonial-item .testi-text,{{WRAPPER}} .testi-text,{{WRAPPER}} .testimonial-item.style-two .text', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven']);


		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include rt_get_elementor_template('testimonial-one.php');
		include rt_get_elementor_template('testimonial-two.php');
		include rt_get_elementor_template('testimonial-three.php');
		include rt_get_elementor_template('testimonial-four.php');
		include rt_get_elementor_template('testimonial-five.php');
		include rt_get_elementor_template('testimonial-six.php');
		include rt_get_elementor_template('testimonial-seven.php');
	}
}
