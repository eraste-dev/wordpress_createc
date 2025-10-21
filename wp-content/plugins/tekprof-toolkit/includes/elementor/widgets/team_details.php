<?php

namespace TekprofToolkit\ElementorAddon\Widgets;


use Elementor\Widget_Base;

class TeamDetails extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-team-details';
	}

	public function get_title()
	{
		return esc_html__('Team Details', 'tekprof-toolkit');
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
		return ['tekprof', 'toolkit', 'webtend', 'section', 'team', 'details'];
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
				]
			]
		);

		$this->end_controls_section();

		include rt_get_elementor_option('team-details-one-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .sec-title', ['layout_two', 'layout_three']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .subtitle', ['layout_two', 'layout_three']);

		tekprof_elementor_style_options($this, 'Name', '{{WRAPPER}} .team-item .content h5', ['layout_one', 'layout_two', 'layout_three']);
		tekprof_elementor_style_options($this, 'Designation', '{{WRAPPER}} .content span', ['layout_one', 'layout_two', 'layout_three']);
		tekprof_elementor_style_options($this, 'Social Icon', '{{WRAPPER}} .team-item.style-two .image .social-style-one a', ['layout_two', 'layout_three']);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include rt_get_elementor_template('team-details-one.php');
	}
}
