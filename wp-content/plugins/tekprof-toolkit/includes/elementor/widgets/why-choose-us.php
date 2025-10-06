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

class Why_Choose_Us extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-why-choose-us';
	}

	public function get_title()
	{
		return esc_html__('Why Choose Us', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-info-box webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'section', 'why choose us'];
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

		include rt_get_elementor_option('why-choose-us-one-option.php');
		include rt_get_elementor_option('why-choose-us-two-option.php');


		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .sec-title,{{WRAPPER}} .section-title h2', ['layout_one', 'layout_two']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .subtitle,{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_two']);
		tekprof_elementor_style_options($this, 'Summary Text', '{{WRAPPER}} .summary-text', ['layout_one']);

		tekprof_elementor_style_options($this, 'Features Title', '{{WRAPPER}} .content h4', ['layout_two']);
		tekprof_elementor_style_options($this, 'Features Description', '{{WRAPPER}} .content p', ['layout_two']);
		tekprof_elementor_style_options($this, 'Features Icon', '{{WRAPPER}} .feature-item-three .icon i', ['layout_two']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include rt_get_elementor_template('why-choose-us-one.php');
		include rt_get_elementor_template('why-choose-us-two.php');
	}
}
