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
	'layout_six_section_title',
	[
		'label' => esc_html__('Section Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Power Generative AI With Your Data', 'tekprof-toolkit'),
		'label_block' => true,
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
		'default'     => 'h2',
		'toggle'      => false,
	]
);

$this->add_control(
	'layout_six_button_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Get Started Now', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_button_url',
	[
		'label' => esc_html__('Button URL', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'default' => [
			'url' => '#',
		],
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_six_service_icon',
	[
		'label' => esc_html__('Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-it',
			'library' => 'flaticon',
		],
	]
);

$repeater->add_control(
	'layout_six_service_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('AI Powered Results', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_six_service_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('AI-powered results leverage advanced artificial intelligence algorithms to provide highly accurate', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_six_service_link',
	[
		'label' => esc_html__('Link', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'default' => [
			'url' => '#',
		],
	]
);


$this->add_control(
	'layout_six_service_items',
	[
		'label' => esc_html__('Service Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_six_service_icon' => [
					'value' => 'flaticon-it',
					'library' => 'flaticon',
				],
				'layout_six_service_title' => esc_html__('AI Powered Results', 'tekprof-toolkit'),
				'layout_six_service_description' => esc_html__('AI-powered results leverage advanced artificial intelligence algorithms to provide highly accurate', 'tekprof-toolkit'),
				'layout_six_animation_delay' => 0,
			],
			[
				'layout_six_service_icon' => [
					'value' => 'flaticon-network-security',
					'library' => 'flaticon',
				],
				'layout_six_service_title' => esc_html__('Payment Gateways', 'tekprof-toolkit'),
				'layout_six_service_description' => esc_html__('Payment gateways are secure online platforms that facilitate the transfer of funds customers', 'tekprof-toolkit'),
				'layout_six_animation_delay' => 100,
			],
			[
				'layout_six_service_icon' => [
					'value' => 'flaticon-cloud',
					'library' => 'flaticon',
				],
				'layout_six_service_title' => esc_html__('Multilingual', 'tekprof-toolkit'),
				'layout_six_service_description' => esc_html__('Multilingual refers to the capability of a system, software, or individual to operate and communicate', 'tekprof-toolkit'),
				'layout_six_animation_delay' => 0,
			],
			[
				'layout_six_service_icon' => [
					'value' => 'flaticon-data-management',
					'library' => 'flaticon',
				],
				'layout_six_service_title' => esc_html__('Support Platform', 'tekprof-toolkit'),
				'layout_six_service_description' => esc_html__('A support platform is a software or service that enables organizations to manage customer inquiries', 'tekprof-toolkit'),
				'layout_six_animation_delay' => 100,
			],
		],
		'title_field' => '{{{ layout_six_service_title }}}',
	]
);


$this->end_controls_section();
