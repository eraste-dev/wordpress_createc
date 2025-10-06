<?php

//content
$this->start_controls_section(
	'layout_two_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);


$this->add_control(
	'layout_two_summary_text',
	[
		'label' => esc_html__('Summary Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Summary Text', 'tekprof-toolkit'),
		'default' => esc_html__('Default Text', 'tekprof-toolkit'),
	]
);


$this->add_control(
	'layout_two_input_placeholder',
	[
		'label' => esc_html__('Placeholder', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Email Address', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_btn_label',
	[
		'label' => esc_html__('Button Label', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Subscribe', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'logo',
	[
		'label' => __('Logo', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'logo_size',
	[
		'label' => __('Logo Size', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
		'description' => __('Set Logo Size.', 'tekprof-toolkit'),
		'default' => [
			'width' => '123',
			'height' => '35',
		],
	]
);

$this->end_controls_section();
