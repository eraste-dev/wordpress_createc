<?php

namespace TekprofToolkit\ElementorAddon\Widgets;

use Elementor\Widget_Base;

class Service extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-service';
	}

	public function get_title()
	{
		return esc_html__('Services', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-flow webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'section', 'Service'];
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
					'layout_twelve' => __('Layout Twelve', 'tekprof-toolkit'),
					'layout_thirteen' => __('Layout Thirteen', 'tekprof-toolkit'),
					'layout_fourteen' => __('Layout Fourteen', 'tekprof-toolkit'),
				]
			]
		);

		$this->end_controls_section();

		include rt_get_elementor_option('service-one-option.php');
		include rt_get_elementor_option('service-two-option.php');
		include rt_get_elementor_option('service-three-option.php');
		include rt_get_elementor_option('service-four-option.php');
		include rt_get_elementor_option('service-five-option.php');
		include rt_get_elementor_option('service-six-option.php');
		include rt_get_elementor_option('service-seven-option.php');
		include rt_get_elementor_option('service-eight-option.php');
		include rt_get_elementor_option('service-nine-option.php');
		include rt_get_elementor_option('service-ten-option.php');
		include rt_get_elementor_option('service-eleven-option.php');
		include rt_get_elementor_option('service-twelve-option.php');
		include rt_get_elementor_option('service-thirteen-option.php');
		include rt_get_elementor_option('service-fourteen-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2, {{WRAPPER}} .content h4 a, {{WRAPPER}} .sec-title', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_eight', 'layout_nine', 'layout_ten', 'layout_twelve', 'layout_fourteen']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title, {{WRAPPER}} .sub-title', ['layout_one', 'layout_two', 'layout_four', 'layout_eight', 'layout_nine', 'layout_ten', 'layout_twelve', 'layout_fourteen']);
		tekprof_elementor_style_options($this, 'Section Description Text', '{{WRAPPER}} .section-title p, {{WRAPPER}} .services-content-three p, {{WRAPPER}} .why-choose-left-content p', ['layout_one', 'layout_four', 'layout_five', 'layout_nine', 'layout_twelve']);

		tekprof_elementor_style_options($this, 'Service Title', '{{WRAPPER}} .title a,{{WRAPPER}} .service-item .content .title a,{{WRAPPER}} .accordion-item .title, {{WRAPPER}} .content h5 a,{{WRAPPER}} .style-three h4 a,{{WRAPPER}} .top-part h4 a, {{WRAPPER}} .service-item-five h4 a,{{WRAPPER}} .service-two-item h6 a, {{WRAPPER}} .content h4, {{WRAPPER}} .service-title', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven', 'layout_eight', 'layout_nine', 'layout_ten', 'layout_eleven', 'layout_twelve', 'layout_thirteen', 'layout_fourteen']);

		tekprof_elementor_style_options($this, 'Service Description', '{{WRAPPER}} .feature-item .content p,{{WRAPPER}} .service-item .content p, {{WRAPPER}} .content p, {{WRAPPER}} .style-three p,{{WRAPPER}} .content .bottom-part p,{{WRAPPER}} .service-item-five p,{{WRAPPER}} .service-two-item p, {{WRAPPER}} .service-summary-text', ['layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven', 'layout_eight', 'layout_nine', 'layout_eleven', 'layout_twelve', 'layout_thirteen', 'layout_fourteen']);
		tekprof_elementor_style_options($this, 'Service Read More', '{{WRAPPER}} .service-item .content .read-more, {{WRAPPER}} .read-more', ['layout_two', 'layout_four', 'layout_fourteen']);
		tekprof_elementor_style_options($this, 'Service Icon', '{{WRAPPER}} .service-item .content .title a i, {{WRAPPER}} .iconic-box .icon i,{{WRAPPER}} .top-part .icon i,{{WRAPPER}} .icon i', ['layout_two', 'layout_eight', 'layout_nine', 'layout_ten', 'layout_eleven', 'layout_twelve', 'layout_thirteen', 'layout_fourteen']);
		tekprof_elementor_style_options($this, 'Step', '{{WRAPPER}} .step', ['layout_three']);
		tekprof_elementor_style_options($this, 'Read More', '{{WRAPPER}} .read-more', ['layout_five', 'layout_eight']);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_type' => ['layout_one', 'layout_six', 'layout_nine'],
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
					'{{WRAPPER}} .theme-btn' => 'color: {{VALUE}} !important;',
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
					'{{WRAPPER}} .theme-btn, a.theme-btn' => 'background-color: {{VALUE}};',
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
		include rt_get_elementor_template('service-one.php');
		include rt_get_elementor_template('service-two.php');
		include rt_get_elementor_template('service-three.php');
		include rt_get_elementor_template('service-four.php');
		include rt_get_elementor_template('service-five.php');
		include rt_get_elementor_template('service-six.php');
		include rt_get_elementor_template('service-seven.php');
		include rt_get_elementor_template('service-eight.php');
		include rt_get_elementor_template('service-nine.php');
		include rt_get_elementor_template('service-ten.php');
		include rt_get_elementor_template('service-eleven.php');
		include rt_get_elementor_template('service-twelve.php');
		include rt_get_elementor_template('service-thirteen.php');
		include rt_get_elementor_template('service-fourteen.php');
	}
}
