<?php

namespace TekprofToolkit\ElementorAddon\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

class Banner extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-banner';
	}

	public function get_title()
	{
		return esc_html__('Banner', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-banner webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'section', 'banner'];
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

		include rt_get_elementor_option('banner-one-option.php');
		include rt_get_elementor_option('banner-two-option.php');
		include rt_get_elementor_option('banner-three-option.php');
		include rt_get_elementor_option('banner-four-option.php');
		include rt_get_elementor_option('banner-five-option.php');
		include rt_get_elementor_option('banner-six-option.php');
		include rt_get_elementor_option('banner-seven-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Title', '{{WRAPPER}} .hero-content h1,{{WRAPPER}} .slide-content h1,{{WRAPPER}} .hero-content-five h1,{{WRAPPER}} .hero-content-five .h1,{{WRAPPER}} .hero-content h1', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven']);
		tekprof_elementor_style_options($this, 'Sub Title', '{{WRAPPER}} .hero-content .sub-title,{{WRAPPER}} .subtitle-one, {{WRAPPER}} .sub-title ', ['layout_one', 'layout_three', 'layout_four', 'layout_five']);
		tekprof_elementor_style_options($this, 'Tagline', '{{WRAPPER}} .slide-content .h2', ['layout_five']);
		tekprof_elementor_style_options($this, 'Description Text', '{{WRAPPER}} .hero-content > p, {{WRAPPER}} .hero-content p, {{WRAPPER}} .content p, {{WRAPPER}} .hero-content p', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_six', 'layout_seven']);

		tekprof_elementor_style_options($this, 'Client Text', '{{WRAPPER}} .hero-five-clients h5', ['layout_six']);

		tekprof_elementor_style_options($this, 'List Item', '{{WRAPPER}} .hero-area-seven .hero-content .hero-list li', ['layout_seven', 'layout_eleven']);

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

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		include rt_get_elementor_template('banner-one.php');
		include rt_get_elementor_template('banner-two.php');
		include rt_get_elementor_template('banner-three.php');
		include rt_get_elementor_template('banner-four.php');
		include rt_get_elementor_template('banner-five.php');
		include rt_get_elementor_template('banner-six.php');
		include rt_get_elementor_template('banner-seven.php');
	}
}
