<?php

namespace TekprofToolkit\ElementorAddon\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Widget_Base;

class Footer_About extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-footer-about';
	}

	public function get_title()
	{
		return esc_html__('Footer About', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-footer webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'section', 'contact'];
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
				]
			]
		);

		$this->end_controls_section();

		include rt_get_elementor_option('footer-about-one-option.php');
		include rt_get_elementor_option('footer-about-two-option.php');
		include rt_get_elementor_option('footer-about-three-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Title', '{{WRAPPER}} .footer-title', ['layout_two']);
		tekprof_elementor_style_options($this, 'Summary Text', '{{WRAPPER}} .text p, {{WRAPPER}} .widget-about p, {{WRAPPER}} .footer-widget  p', ['layout_one', 'layout_two', 'layout_three']);
		tekprof_elementor_style_options($this, 'Call Title', '{{WRAPPER}} .info-item .content', ['layout_one']);
		tekprof_elementor_style_options($this, 'Call Number ', '{{WRAPPER}} .info-item .content a', ['layout_one']);
		tekprof_elementor_style_options($this, 'Button Text', '{{WRAPPER}} .read-more', ['layout_three']);

		tekprof_elementor_style_options($this, 'Social Icon', '{{WRAPPER}} .social-style-two a i ', ['layout_two']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		include rt_get_elementor_template('footer-about-one.php');
		include rt_get_elementor_template('footer-about-two.php');
		include rt_get_elementor_template('footer-about-three.php');
	}
}
