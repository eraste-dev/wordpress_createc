<?php

$this->start_controls_section(
	'layout_two_content_section',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
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
		'rows' => '2',
		'placeholder' => esc_html__('Add Title', 'tekprof-toolkit'),
		'default' => esc_html__('Objective', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_two_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => '2',
		'placeholder' => esc_html__('Add Content', 'tekprof-toolkit'),
		'default' => esc_html__('Default Content', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_two_more_content',
	[
		'label' => esc_html__('More Content', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::CODE,
		'rows' => '2',
		'placeholder' => esc_html__('Add Content', 'tekprof-toolkit'),
		'default' => esc_html__('Default Content', 'tekprof-toolkit'),
		'label_block' => true
	]
);


$this->end_controls_section();
