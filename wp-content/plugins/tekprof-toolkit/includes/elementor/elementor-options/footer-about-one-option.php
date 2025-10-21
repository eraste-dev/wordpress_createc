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
	'layout_one_summary_text',
	[
		'label' => esc_html__('Summary Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Content', 'tekprof-toolkit'),
		'default' => esc_html__('Default Text', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_one_call_title',
	[
		'label' => esc_html__('Call Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Call Title', 'tekprof-toolkit'),
		'default' => esc_html__('Need Any Help?', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_one_call_text',
	[
		'label' => esc_html__('Call Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Call Text', 'tekprof-toolkit'),
		'default' => esc_html__(' Call :', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_one_call_number',
	[
		'label' => esc_html__('Call Number', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Call Number', 'tekprof-toolkit'),
		'default' => esc_html__('+000 (123) 45 88', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_one_call_url',
	[
		'label' => esc_html__('Call Url', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Call Url', 'tekprof-toolkit'),
		'default' => esc_html__('callto:+000(123)4588', 'tekprof-toolkit'),
		'label_block' => true
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
