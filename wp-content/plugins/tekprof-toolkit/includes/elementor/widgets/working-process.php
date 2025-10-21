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

class Working_Process extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-working-process';
	}

	public function get_title()
	{
		return esc_html__('Work Process', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-post-navigation webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'work process'];
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
				]
			]
		);

		$this->end_controls_section();

		include rt_get_elementor_option('work-process-one-option.php');
		include rt_get_elementor_option('work-process-two-option.php');
		include rt_get_elementor_option('work-process-three-option.php');
		include rt_get_elementor_option('work-process-four-option.php');
		include rt_get_elementor_option('work-process-five-option.php');
		include rt_get_elementor_option('work-process-six-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title', ['layout_one', 'layout_two', 'layout_three', 'layout_five', 'layout_six']);

		tekprof_elementor_style_options($this, 'Work Process Title', '{{WRAPPER}} .accordion-item .title,{{WRAPPER}} .working-process-two h5,{{WRAPPER}} .work-process-item h5,{{WRAPPER}} .working-process-three .title, {{WRAPPER}} .content h4', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);
		tekprof_elementor_style_options($this, 'Work Process Step', '{{WRAPPER}} .step,{{WRAPPER}} .work-process-item .number', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);
		tekprof_elementor_style_options($this, 'Work Process Description', '{{WRAPPER}} .content p,{{WRAPPER}} .working-process-two p,{{WRAPPER}} .working-process-three p', ['layout_one', 'layout_two', 'layout_three', 'layout_five', 'layout_six']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include rt_get_elementor_template('work-process-one.php');
		include rt_get_elementor_template('work-process-two.php');
		include rt_get_elementor_template('work-process-three.php');
		include rt_get_elementor_template('work-process-four.php');
		include rt_get_elementor_template('work-process-five.php');
		include rt_get_elementor_template('work-process-six.php');
	}
}
