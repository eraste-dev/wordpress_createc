<?php

namespace TekprofToolkit\ElementorAddon\Widgets;


use Elementor\Widget_Base;

class Team extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-team';
	}

	public function get_title()
	{
		return esc_html__('Team', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-person webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'section', 'team'];
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

		include rt_get_elementor_option('team-one-option.php');
		include rt_get_elementor_option('team-two-option.php');
		include rt_get_elementor_option('team-three-option.php');
		include rt_get_elementor_option('team-four-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2', ['layout_one', 'layout_two', 'layout_three', 'layout_four']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_two', 'layout_three', 'layout_four']);

		tekprof_elementor_style_options($this, 'Name', '{{WRAPPER}} .content h5 a, {{WRAPPER}} .name a', ['layout_one', 'layout_two', 'layout_three', 'layout_four']);
		tekprof_elementor_style_options($this, 'Designation', '{{WRAPPER}} .designations, {{WRAPPER}} .designation', ['layout_one', 'layout_two', 'layout_three', 'layout_four']);
		tekprof_elementor_style_options($this, 'Description', '{{WRAPPER}} .bottom-part p', ['layout_three']);
		tekprof_elementor_style_options($this, 'Social Icon', '{{WRAPPER}} .social-style-one i', ['layout_one', 'layout_four']);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_type' => 'layout_four',
				],
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
		include rt_get_elementor_template('team-one.php');
		include rt_get_elementor_template('team-two.php');
		include rt_get_elementor_template('team-three.php');
		include rt_get_elementor_template('team-four.php');
	}
}
