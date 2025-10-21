<?php

//content
$this->start_controls_section(
	'layout_two_section_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Title', 'tekprof-toolkit'),
		'default' => esc_html__('Default Title', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_two_placeholder',
	[
		'label' => esc_html__('Placeholder Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Placeholder Text', 'tekprof-toolkit'),
		'default' => esc_html__('Email Address', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_two_btn_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Button Text', 'tekprof-toolkit'),
		'default' => esc_html__('Sign Up', 'tekprof-toolkit'),
		'label_block' => true
	]
);


$this->end_controls_section();
