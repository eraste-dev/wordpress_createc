<?php

namespace TekprofToolkit\ElementorAddon\Widgets;


use Elementor\Widget_Base;

class Social_Icon extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-social-icon';
	}

	public function get_title()
	{
		return esc_html__('Social Icon', 'tekprof-toolkit');
	}


	public function get_icon()
	{
		return 'eicon-social-icons webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'section', 'social'];
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
				]
			]
		);

		$this->end_controls_section();

		include rt_get_elementor_option('social-icon-one-option.php');
		include rt_get_elementor_option('social-icon-two-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Title', '{{WRAPPER}} .footer-title h6', ['layout_one']);
		tekprof_elementor_style_options($this, 'Social Icon', '{{WRAPPER}} .social-icon i', ['layout_one']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		include rt_get_elementor_template('social-icon-one.php');
		include rt_get_elementor_template('social-icon-two.php');
	}
}
