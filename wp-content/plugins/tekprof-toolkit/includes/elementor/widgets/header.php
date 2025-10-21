<?php

namespace TekprofToolkit\ElementorAddon\Widgets;

use Elementor\Controls_Manager;

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;


class Header extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-header';
	}

	public function get_title()
	{
		return esc_html__('Header', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-header webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'header'];
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

		include rt_get_elementor_option('header-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Top bar Text', '{{WRAPPER}} .header-top .top-middle,{{WRAPPER}}  .header-top .top-left>ul>li a,{{WRAPPER}} .header-top .text .hello', ['layout_four', 'layout_six']);

		tekprof_elementor_style_options($this, 'Call', '{{WRAPPER}} .header-top .top-middle,{{WRAPPER}} .header-one .header-number a, header-number i', ['layout_five']);

		tekprof_elementor_style_options($this, 'Top bar Label', '{{WRAPPER}} .top-left ul li,{{WRAPPER}} .top-right ul li', ['layout_one', 'layout_two']);
		tekprof_elementor_style_options($this, 'Top bar Value', '{{WRAPPER}} .top-left ul li a,{{WRAPPER}} .top-right ul li', ['layout_one', 'layout_two']);

		tekprof_elementor_style_options($this, 'Social Title', '{{WRAPPER}} .top-right ul .social-style-one span, {{WRAPPER}} .top-right span', ['layout_one', 'layout_two', 'layout_four']);
		tekprof_elementor_style_options($this, 'Social Icon', '{{WRAPPER}} .social-style-one a i, {{WRAPPER}} .social-icons a i', ['layout_one', 'layout_two', 'layout_four']);

		tekprof_elementor_style_options($this, 'Nav', '{{WRAPPER}} .main-menu .navbar-collapse li a', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);

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
				'type'      => Controls_Manager::COLOR,
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
				'type'      => Controls_Manager::COLOR,
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
				'name'     => 'button_one_typography',
				'selector' => '{{WRAPPER}} .theme-btn',
				'label' => esc_html__(' Typography', 'tekprof-addon'),
			]
		);


		$this->end_controls_section();
	}

	protected function get_menus_list()
	{
		$nav_menus = [];
		$terms     = get_terms('nav_menu');

		foreach ($terms as $term) {
			$nav_menus[$term->name] = $term->name;
		}

		return $nav_menus;
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include rt_get_elementor_template('header-one.php');
		include rt_get_elementor_template('header-two.php');
		include rt_get_elementor_template('header-three.php');
		include rt_get_elementor_template('header-four.php');
		include rt_get_elementor_template('header-five.php');
		include rt_get_elementor_template('header-six.php');
		include rt_get_elementor_template('header-seven.php');
		include rt_get_elementor_template('header-sidebar.php');
	}
}
