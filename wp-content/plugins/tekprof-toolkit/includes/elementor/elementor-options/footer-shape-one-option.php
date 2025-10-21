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
	'layout_one_shape_one',
	[
		'label' => esc_html__('Shape One', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->add_control(
	'layout_one_shape_two',
	[
		'label' => esc_html__('Shape Two', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->add_control(
	'layout_one_shape_three',
	[
		'label' => esc_html__('Shape Three', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->end_controls_section();
