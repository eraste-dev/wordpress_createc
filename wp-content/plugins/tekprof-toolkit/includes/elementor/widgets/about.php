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

class About extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-about';
	}

	public function get_title()
	{
		return esc_html__('about', 'tekprof-toolkit');
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
		return ['tekprof', 'toolkit', 'webtend', 'section', 'About'];
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
					'layout_eight' => __('Layout Eight', 'tekprof-toolkit'),
					'layout_nine' => __('Layout Nine', 'tekprof-toolkit'),
					'layout_ten' => __('Layout Ten', 'tekprof-toolkit'),
					'layout_eleven' => __('Layout Eleven', 'tekprof-toolkit'),
				]
			]
		);

		$this->end_controls_section();

		include rt_get_elementor_option('about-one-option.php');
		include rt_get_elementor_option('about-two-option.php');
		include rt_get_elementor_option('about-three-option.php');
		include rt_get_elementor_option('about-four-option.php');
		include rt_get_elementor_option('about-five-option.php');
		include rt_get_elementor_option('about-six-option.php');
		include rt_get_elementor_option('about-seven-option.php');
		include rt_get_elementor_option('about-eight-option.php');
		include rt_get_elementor_option('about-nine-option.php');
		include rt_get_elementor_option('about-ten-option.php');
		include rt_get_elementor_option('about-eleven-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2, {{WRAPPER}} .sec-title', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven', 'layout_eight', 'layout_nine', 'layout_ten', 'layout_eleven']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title, {{WRAPPER}} .subtitle, {{WRAPPER}} .sub-title', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_seven', 'layout_eight', 'layout_nine', 'layout_eleven']);
		tekprof_elementor_style_options($this, 'Summary Text', '{{WRAPPER}} .summary-text,{{WRAPPER}} .about-content p,{{WRAPPER}} .team-page-left-content p', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_eight', 'layout_ten', 'layout_eleven']);

		tekprof_elementor_style_options($this, 'Content', '{{WRAPPER}} .about-page-about-left-content p', ['layout_nine']);

		tekprof_elementor_style_options($this, 'Check List', '{{WRAPPER}} .list-style-one li, {{WRAPPER}} .list-style-five li', ['layout_two', 'layout_eleven']);

		tekprof_elementor_style_options($this, 'Content Title', '{{WRAPPER}} .ai-content h3', ['layout_six']);
		tekprof_elementor_style_options($this, 'Content Sub Title', '{{WRAPPER}} .ai-content .subtitle', ['layout_six']);
		tekprof_elementor_style_options($this, 'Content Description', '{{WRAPPER}} .ai-content p', ['layout_six']);

		tekprof_elementor_style_options($this, 'Features Title', '{{WRAPPER}} .feature-item-two h5 a,{{WRAPPER}} .service-item-two h5 a, {{WRAPPER}} .about-featured-item h5 a, {{WRAPPER}} .service-item h4 a', ['layout_one', 'layout_three', 'layout_four', 'layout_seven']);
		tekprof_elementor_style_options($this, 'Features Description', '{{WRAPPER}} .feature-item-two p,{{WRAPPER}} .about-two-content p', ['layout_one', 'layout_seven']);
		tekprof_elementor_style_options($this, 'Features Icon', '{{WRAPPER}} .feature-item-two .icon i, {{WRAPPER}} .service-item-two .icon i,{{WRAPPER}} .about-featured-item .icon i, {{WRAPPER}} .service-item .icon i', ['layout_one', 'layout_three', 'layout_four', 'layout_seven']);
		tekprof_elementor_style_options($this, 'Read More', '{{WRAPPER}} .read-more', ['layout_seven']);

		tekprof_elementor_style_options($this, 'Video Title', '{{WRAPPER}} .video-wrap span', ['layout_three']);
		tekprof_elementor_style_options($this, 'Video Description', '{{WRAPPER}} .video-wrap h5', ['layout_three']);

		tekprof_elementor_style_options($this, 'Client Title', '{{WRAPPER}} .trusted-clients-wrap h6', ['layout_four']);
		tekprof_elementor_style_options($this, 'Caption Text', '{{WRAPPER}} .about-three-left-image .clients-satisfied h4, {{WRAPPER}} .years-experience h4, {{WRAPPER}} .team-member h4', ['layout_four']);

		tekprof_elementor_style_options($this, 'Progress Title', '{{WRAPPER}} .circle-progress-item h4,{{WRAPPER}} .circle-progress-item-two h4', ['layout_five', 'layout_ten']);
		tekprof_elementor_style_options($this, 'Progress Number', '{{WRAPPER}} .circle-progress .counting', ['layout_five']);

		tekprof_elementor_style_options($this, 'Proven Expertise Title', '{{WRAPPER}} .proven-area h4', ['layout_five']);
		tekprof_elementor_style_options($this, 'Proven Description', '{{WRAPPER}} .proven-area p', ['layout_five']);


		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_type' => ['layout_one', 'layout_two', 'layout_two', 'layout_six', 'layout_eight', 'layout_eleven'],
				],
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__('Text Color', 'tekprof-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label'     => esc_html__('Background Color', 'tekprof-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn, a.theme-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'     => esc_html__('Hover Color', 'tekprof-toolkit'),
				'type'      => Controls_Manager::COLOR,
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
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover, a.theme-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .theme-btn',
				'label' => esc_html__(' Typography', 'tekprof-addon'),
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include rt_get_elementor_template('about-one.php');
		include rt_get_elementor_template('about-two.php');
		include rt_get_elementor_template('about-three.php');
		include rt_get_elementor_template('about-four.php');
		include rt_get_elementor_template('about-five.php');
		include rt_get_elementor_template('about-six.php');
		include rt_get_elementor_template('about-seven.php');
		include rt_get_elementor_template('about-eight.php');
		include rt_get_elementor_template('about-nine.php');
		include rt_get_elementor_template('about-ten.php');
		include rt_get_elementor_template('about-eleven.php');
	}
}
