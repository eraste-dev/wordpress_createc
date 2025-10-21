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
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Find the Right Solution for Your Budget Custom Plans for Every Stage of Your Journey', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_title_tag',
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
	'layout_two_subtitle',
	[
		'label' => esc_html__('Subtitle', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Pricing Package', 'tekprof-toolkit'),
		'label_block' => true,
	]
);


$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_two_package_title',
	[
		'label' => esc_html__('Package Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Basic Package', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_two_package_description',
	[
		'label' => esc_html__('Package Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_two_price',
	[
		'label' => esc_html__('Price', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('$99', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_two_duration',
	[
		'label' => esc_html__('Duration', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('/per month', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_two_features_left',
	[
		'label' => esc_html__('Features Left Column', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => "Network assessment\nAntivirus & firewall setup\nMonthly threat reports",
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_two_features_right',
	[
		'label' => esc_html__('Features Right Column', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => "Email security (anti-phishing)\nData backups and advanced\nBasic incident response",
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_two_button_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Choose Package', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_two_button_url',
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
	'layout_two_pricing_items',
	[
		'label' => esc_html__('Pricing Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_two_package_title' => esc_html__('Basic Package', 'tekprof-toolkit'),
				'layout_two_price' => '$99',
			],
			[
				'layout_two_package_title' => esc_html__('Standard Package', 'tekprof-toolkit'),
				'layout_two_price' => '$399',
			],
			[
				'layout_two_package_title' => esc_html__('Premium Package', 'tekprof-toolkit'),
				'layout_two_price' => '$899',
			],
		],
		'title_field' => '{{{ layout_two_package_title }}}',
	]
);

$this->add_control(
	'layout_two_background_image',
	[
		'label' => esc_html__('Background Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => '',
		],
		'label_block' => true,
	]
);


$this->end_controls_section();
