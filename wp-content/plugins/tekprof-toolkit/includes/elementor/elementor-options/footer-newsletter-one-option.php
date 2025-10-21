<?php

//content
$this->start_controls_section(
	'layout_one_section_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Title', 'tekprof-toolkit'),
		'default' => esc_html__('Default Title', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_one_summary_text',
	[
		'label' => esc_html__('Summary Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Summary Text', 'tekprof-toolkit'),
		'default' => esc_html__('Default Title', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_one_placeholder',
	[
		'label' => esc_html__('Placeholder Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Placeholder Text', 'tekprof-toolkit'),
		'default' => esc_html__('Email here', 'tekprof-toolkit'),
		'label_block' => true
	]
);


$this->end_controls_section();
