<?php

//content
$this->start_controls_section(
	'layout_three_section_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_three'
		]
	]
);


$this->add_control(
	'layout_three_summary_text',
	[
		'label' => esc_html__('Summary Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Content', 'tekprof-toolkit'),
		'default' => esc_html__('Default Text', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_three_button_label',
	[
		'label' => esc_html__('Button Label', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Learn More Us', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your button label here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_three_button_url',
	[
		'label' => esc_html__('Button URL', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_three_logo',
	[
		'label' => __('Logo', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_three_logo_size',
	[
		'label' => __('Logo Size', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
		'description' => esc_html__('Set Logo Size.', 'tekprof-toolkit'),
		'default' => [
			'width' => '123',
			'height' => '35',
		],
	]
);

$this->end_controls_section();
