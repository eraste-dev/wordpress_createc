<?php

namespace TekprofToolkit\ElementorAddon\Widgets;


use Elementor\Widget_Base;

class Contact extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-contact';
	}

	public function get_title()
	{
		return esc_html__('Contact', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-form-horizontal webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'contact'];
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

		include rt_get_elementor_option('contact-one-option.php');
		include rt_get_elementor_option('contact-two-option.php');
		include rt_get_elementor_option('contact-three-option.php');
		include rt_get_elementor_option('contact-four-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2,{{WRAPPER}} section-title h3', ['layout_one', 'layout_three', 'layout_four']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_three', 'layout_four']);

		tekprof_elementor_style_options($this, 'Contact Form Title', '{{WRAPPER}} .contact-form-two h3,{{WRAPPER}} .contact-form h3,{{WRAPPER}} .get-consultations-form-area h4,{{WRAPPER}} .contact-page-form h4', ['layout_one', 'layout_two', 'layout_three', 'layout_four']);
		tekprof_elementor_style_options($this, 'Contact Form Sub Title', '{{WRAPPER}} .contact-form.style-two p', ['layout_two']);

		tekprof_elementor_style_options($this, 'Contact Label', '{{WRAPPER}} .content span,{{WRAPPER}} .service-get-consultations-wrap .left-content h5,{{WRAPPER}} .contact-info-item .title', ['layout_one', 'layout_three', 'layout_four']);
		tekprof_elementor_style_options($this, 'Contact Content', '{{WRAPPER}} .contact-info-item-two h5, {{WRAPPER}} .left-content p, {{WRAPPER}} .contact-content a,{{WRAPPER}} .contact-info-item p,{{WRAPPER}} .contact-info-item a', ['layout_one', 'layout_three', 'layout_four']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include rt_get_elementor_template('contact-one.php');
		include rt_get_elementor_template('contact-two.php');
		include rt_get_elementor_template('contact-three.php');
		include rt_get_elementor_template('contact-four.php');
	}
}
