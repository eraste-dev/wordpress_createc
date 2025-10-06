<?php

namespace TekprofToolkit\ElementorAddon\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

class Faq extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-faq';
	}

	public function get_title()
	{
		return esc_html__('Faq', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-flip-box webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'faq'];
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

		include rt_get_elementor_option('faq-one-option.php');
		include rt_get_elementor_option('faq-two-option.php');
		include rt_get_elementor_option('faq-three-option.php');
		include rt_get_elementor_option('faq-four-option.php');
		include rt_get_elementor_option('faq-five-option.php');
		include rt_get_elementor_option('faq-six-option.php');
		include rt_get_elementor_option('faq-seven-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2', ['layout_one', 'layout_two', 'layout_four', 'layout_five', 'layout_six', 'layout_seven']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_two', 'layout_four', 'layout_six', 'layout_seven']);

		tekprof_elementor_style_options($this, 'Faq Title', '{{WRAPPER}} .accordion-header .title', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven']);
		tekprof_elementor_style_options($this, 'Faq Description', '{{WRAPPER}} .accordion-body p', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six', 'layout_seven']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include rt_get_elementor_template('faq-one.php');
		include rt_get_elementor_template('faq-two.php');
		include rt_get_elementor_template('faq-three.php');
		include rt_get_elementor_template('faq-four.php');
		include rt_get_elementor_template('faq-five.php');
		include rt_get_elementor_template('faq-six.php');
		include rt_get_elementor_template('faq-seven.php');
	}
}
