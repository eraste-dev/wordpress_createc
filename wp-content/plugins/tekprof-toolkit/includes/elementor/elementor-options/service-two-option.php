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
	'layout_two_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Empowering Businesses With Advanced IT Solutions', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_two_title_tag',
	[
		'label' => esc_html__('Title HTML Tag', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'h2',
		'options' => [
			'h1' => esc_html__('H1', 'tekprof-toolkit'),
			'h2' => esc_html__('H2', 'tekprof-toolkit'),
			'h3' => esc_html__('H3', 'tekprof-toolkit'),
			'h4' => esc_html__('H4', 'tekprof-toolkit'),
			'h5' => esc_html__('H5', 'tekprof-toolkit'),
			'h6' => esc_html__('H6', 'tekprof-toolkit'),
		],
	]
);

$this->add_control(
	'layout_two_sub_title',
	[
		'label' => esc_html__('Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Modern IT Solutions', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your sub title here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_two_summary_text',
	[
		'label' => esc_html__('Summary Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your summary text here', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_two_background_color',
	[
		'label' => esc_html__('Background Color', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::COLOR,
		'default' => '#021433',
		'selectors' => [
			'{{WRAPPER}} .services-area.bgc-blue' => 'background-color: {{VALUE}};',
		],
	]
);

// Service Items Repeater
$service_repeater = new \Elementor\Repeater();

$service_repeater->add_control(
	'icon',
	[
		'label' => esc_html__('Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-it',
			'library' => 'flaticon',
		],
	]
);

$service_repeater->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Managed IT Services', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type service title here', 'tekprof-toolkit'),
	]
);

$service_repeater->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Comprehensive support for all aspects of your IT infrastructure, including monitoring, maintenance, and technical support.', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type service description here', 'tekprof-toolkit'),
	]
);

$service_repeater->add_control(
	'read_more_text',
	[
		'label' => esc_html__('Read More Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Read More', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type read more text here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$service_repeater->add_control(
	'url',
	[
		'label' => esc_html__('URL', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);

$service_repeater->add_control(
	'image',
	[
		'label' => esc_html__('Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$service_repeater->add_control(
	'column_size',
	[
		'label' => esc_html__('Column Size', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => '3',
		'options' => [
			'2' => esc_html__('Column 2', 'tekprof-toolkit'),
			'3' => esc_html__('Column 3', 'tekprof-toolkit'),
			'4' => esc_html__('Column 4', 'tekprof-toolkit'),
			'6' => esc_html__('Column 6', 'tekprof-toolkit'),
		],
	]
);

$this->add_control(
	'layout_two_service_list',
	[
		'label' => esc_html__('Service Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $service_repeater->get_controls(),
		'default' => [
			[
				'title' => esc_html__('Managed IT Services', 'tekprof-toolkit'),
				'description' => esc_html__('Comprehensive support for all aspects of your IT infrastructure, including monitoring, maintenance, and technical support.', 'tekprof-toolkit'),
				'icon' => [
					'value' => 'flaticon-it',
					'library' => 'flaticon',
				],
				'column_size' => '3',
			],
			[
				'title' => esc_html__('Cybersecurity Services', 'tekprof-toolkit'),
				'description' => esc_html__('Comprehensive support for all aspects of your IT infrastructure, including monitoring, maintenance, and technical support.', 'tekprof-toolkit'),
				'icon' => [
					'value' => 'flaticon-network-security',
					'library' => 'flaticon',
				],
				'column_size' => '3',
			],
			[
				'title' => esc_html__('Cloud Solutions', 'tekprof-toolkit'),
				'description' => esc_html__('Comprehensive support for all aspects of your IT infrastructure, including monitoring, maintenance, and technical support.', 'tekprof-toolkit'),
				'icon' => [
					'value' => 'flaticon-cloud',
					'library' => 'flaticon',
				],
				'column_size' => '3',
			],
			[
				'title' => esc_html__('Data Backup & Recovery', 'tekprof-toolkit'),
				'description' => esc_html__('Comprehensive support for all aspects of your IT infrastructure, including monitoring, maintenance, and technical support.', 'tekprof-toolkit'),
				'icon' => [
					'value' => 'flaticon-data-management',
					'library' => 'flaticon',
				],
				'column_size' => '3',
			],
		],
		'title_field' => '{{{ title }}}',
	]
);

$this->add_control(
	'layout_two_animation',
	[
		'label' => esc_html__('Animation', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'fade-up',
		'options' => [
			'fade-up' => esc_html__('Fade Up', 'tekprof-toolkit'),
			'fade-down' => esc_html__('Fade Down', 'tekprof-toolkit'),
			'fade-left' => esc_html__('Fade Left', 'tekprof-toolkit'),
			'fade-right' => esc_html__('Fade Right', 'tekprof-toolkit'),
			'zoom-in' => esc_html__('Zoom In', 'tekprof-toolkit'),
			'zoom-out' => esc_html__('Zoom Out', 'tekprof-toolkit'),
			'flip-up' => esc_html__('Flip Up', 'tekprof-toolkit'),
			'flip-down' => esc_html__('Flip Down', 'tekprof-toolkit'),
			'none' => esc_html__('None', 'tekprof-toolkit'),
		],
	]
);


$this->end_controls_section();
