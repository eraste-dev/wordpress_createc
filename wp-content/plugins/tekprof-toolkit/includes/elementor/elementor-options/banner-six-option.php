<?php

//content
$this->start_controls_section(
	'layout_six_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_six'
		]
	]
);


$this->add_control(
	'layout_six_title_first_part',
	[
		'label' => esc_html__('Title First Part', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => esc_html__('Default Title', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_six_title_second_part',
	[
		'label' => esc_html__('Title Second Part', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => esc_html__('Agency', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_six_title_tag',
	[
		'label'       => esc_html__('Title Tag', 'tekprof-toolkit'),
		'type'        => \Elementor\Controls_Manager::CHOOSE,
		'label_block' => false,
		'options'     => [
			'h1' => [
				'title' => esc_html__('H1', 'tekprof-toolkit'),
				'icon'  => 'eicon-editor-h1',
			],
			'h2' => [
				'title' => esc_html__('H2', 'tekprof-toolkit'),
				'icon'  => 'eicon-editor-h2',
			],
			'h3' => [
				'title' => esc_html__('H3', 'tekprof-toolkit'),
				'icon'  => 'eicon-editor-h3',
			],
			'h4' => [
				'title' => esc_html__('H4', 'tekprof-toolkit'),
				'icon'  => 'eicon-editor-h4',
			],
			'h5' => [
				'title' => esc_html__('H5', 'tekprof-toolkit'),
				'icon'  => 'eicon-editor-h5',
			],
			'h6' => [
				'title' => esc_html__('H6', 'tekprof-toolkit'),
				'icon'  => 'eicon-editor-h6',
			],
		],
		'default'     => 'h1',
		'toggle'      => false,
	]
);


$this->add_control(
	'layout_six_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Description', 'tekprof-toolkit'),
		'default' => esc_html__('Default Description', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_six_video_url',
	[
		'label' => esc_html__('Video Url', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('#', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_button_label',
	[
		'label' => esc_html__('Button Label', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Explore Our Projects', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_button_url',
	[
		'label' => esc_html__('Button Url', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('#', 'tekprof-toolkit'),
		'show_external' => false,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'show_label' => false,
	]
);


$this->end_controls_section();

$this->start_controls_section(
	'layout_six_section_image',
	[
		'label' => esc_html__('Images', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_six'
		]
	]
);

$this->add_control(
	'layout_six_image',
	[
		'label' => esc_html__('Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_six_client_text',
	[
		'label' => esc_html__('Client Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Client Text', 'tekprof-toolkit'),
		'default' => esc_html__('100k+ Trusted Clients', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_six_author_images',
	[
		'label' => esc_html__('Author Images', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::GALLERY,
		'default' => [],
	]
);

$this->add_control(
	'layout_six_client_images',
	[
		'label' => esc_html__('Client Images', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::GALLERY,
		'default' => [],
	]
);

$this->add_control(
	'layout_six_bg_image',
	[
		'label' => esc_html__('Background Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
