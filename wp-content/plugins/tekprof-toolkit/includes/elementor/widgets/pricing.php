<?php

namespace TekprofToolkit\ElementorAddon\Widgets;


use Elementor\Widget_Base;

class Pricing extends Widget_Base
{
	public function get_name()
	{
		return 'tekprof-pricing';
	}

	public function get_title()
	{
		return esc_html__('Pricing', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-product-description webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'section', 'pricing'];
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

		include rt_get_elementor_option('pricing-one-option.php');
		include rt_get_elementor_option('pricing-two-option.php');
		include rt_get_elementor_option('pricing-three-option.php');
		include rt_get_elementor_option('pricing-four-option.php');
		include rt_get_elementor_option('pricing-five-option.php');
		include rt_get_elementor_option('pricing-six-option.php');

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title, {{WRAPPER}} .subtitle', ['layout_one', 'layout_two', 'layout_four', 'layout_five', 'layout_six']);

		tekprof_elementor_style_options($this, 'Pricing Title', '{{WRAPPER}} .pricing-item .title,{{WRAPPER}} .pricing-two-item .title', ['layout_one', 'layout_two', 'layout_four', 'layout_five', 'layout_six']);
		tekprof_elementor_style_options($this, 'Pricing Description', '{{WRAPPER}} .pricing-item .text,{{WRAPPER}} .pricing-two-item .text', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);
		tekprof_elementor_style_options($this, 'Price', '{{WRAPPER}} .pricing-item .price,{{WRAPPER}} .pricing-two-item .price', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);
		tekprof_elementor_style_options($this, 'Duration', '{{WRAPPER}} .pricing-item .price .after-text,{{WRAPPER}} .pricing-item.style-four .title-price .price .next,{{WRAPPER}} .pricing-two-item .price .after-text', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);

		tekprof_elementor_style_options($this, 'Badge Color', '{{WRAPPER}} .pricing-item .badge,{{WRAPPER}} .pricing-two-item .badge', ['layout_one', 'layout_four', 'layout_five']);
		tekprof_elementor_style_options($this, 'Badge Background Color', '{{WRAPPER}} .pricing-item .badge,{{WRAPPER}} .pricing-two-item .badge', ['layout_one', 'layout_four', 'layout_five'], 'background-color');

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		include rt_get_elementor_template('pricing-one.php');
		include rt_get_elementor_template('pricing-two.php');
		include rt_get_elementor_template('pricing-three.php');
		include rt_get_elementor_template('pricing-four.php');
		include rt_get_elementor_template('pricing-five.php');
		include rt_get_elementor_template('pricing-six.php');
	}
}
