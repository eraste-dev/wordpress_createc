<?php

namespace TekprofToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Footer_Top extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-footer-top';
	}

	public function get_title()
	{
		return esc_html__('Footer Top', 'tekprof-toolkit');
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
		return ['tekprof', 'toolkit', 'webtend', 'section', 'top', 'footer'];
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
				]
			]
		);

		$this->end_controls_section();

		include rt_get_elementor_option('footer-top-one-option.php');
		include rt_get_elementor_option('footer-top-two-option.php');
		include rt_get_elementor_option('footer-top-three-option.php');
		include rt_get_elementor_option('footer-top-four-option.php');
		include rt_get_elementor_option('footer-top-five-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Title', '{{WRAPPER}} .section-title h2, {{WRAPPER}} .footer-text .h1', ['layout_one', 'layout_three', 'layout_four', 'layout_five']);
		tekprof_elementor_style_options($this, 'Sub Title', '{{WRAPPER}} .text-white .sub-title,{{WRAPPER}}  .section-title .sub-title', ['layout_one', 'layout_three', 'layout_five']);
		tekprof_elementor_style_options($this, 'Summary Text', '{{WRAPPER}} .get-consultation-content p', ['layout_three']);
		tekprof_elementor_style_options($this, 'Email Text', '{{WRAPPER}} .content, {{WRAPPER}} .footer-contact p,{{WRAPPER}} .hotline .content span', ['layout_one', 'layout_three', 'layout_four', 'layout_five']);
		tekprof_elementor_style_options($this, 'Email Address', '{{WRAPPER}} .content a, {{WRAPPER}} .section-title a', ['layout_one', 'layout_three', 'layout_four', 'layout_five']);

		tekprof_elementor_style_options($this, 'Social Icon', '{{WRAPPER}} .social-style-two a i', ['layout_four']);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__('Text Color', 'tekprof-toolkit'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label'     => esc_html__('Background Color', 'tekprof-toolkit'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'     => esc_html__('Hover Color', 'tekprof-toolkit'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover, a.theme-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'button_hover_bg',
			[
				'label'     => esc_html__('Hover Background Color', 'tekprof-toolkit'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover, a.theme-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'button_one_typography',
				'selector' => '{{WRAPPER}} .theme-btn',
				'label' => esc_html__(' Typography', 'tekprof-addon'),
			]
		);


		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		include rt_get_elementor_template('footer-top-one.php');
		include rt_get_elementor_template('footer-top-two.php');
		include rt_get_elementor_template('footer-top-three.php');
		include rt_get_elementor_template('footer-top-four.php');
		include rt_get_elementor_template('footer-top-five.php');
	}
}
