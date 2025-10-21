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
		'default' => esc_html__('Empowering Businesses With Advanced IT Solutions', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'tekprof-toolkit'),
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
		'default' => esc_html__('Why Choose Us', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your subtitle here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_two_item_icon',
	[
		'label' => esc_html__('Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-idea',
			'library' => 'flaticon',
		],
	]
);

$repeater->add_control(
	'layout_two_item_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Customizable Solutions', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_two_item_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Providing highly customizable solutions tailored to each client\'s unique needs can set you apart. Clients are looking.', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your description here', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_two_items',
	[
		'label' => esc_html__('Feature Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_two_item_icon' => [
					'value' => 'flaticon-idea',
					'library' => 'flaticon',
				],
				'layout_two_item_title' => esc_html__('Customizable Solutions', 'tekprof-toolkit'),
				'layout_two_item_description' => esc_html__('Providing highly customizable solutions tailored to each client\'s unique needs can set you apart. Clients are looking.', 'tekprof-toolkit'),
			],
			[
				'layout_two_item_icon' => [
					'value' => 'flaticon-grow',
					'library' => 'flaticon',
				],
				'layout_two_item_title' => esc_html__('Scalability & Flexibility', 'tekprof-toolkit'),
				'layout_two_item_description' => esc_html__('Scalable solutions allow companies to grow without needing to overhaul their software infrastructure architecture.', 'tekprof-toolkit'),
			],
			[
				'layout_two_item_icon' => [
					'value' => 'flaticon-data-protection',
					'library' => 'flaticon',
				],
				'layout_two_item_title' => esc_html__('Security & Compliance', 'tekprof-toolkit'),
				'layout_two_item_description' => esc_html__('Prioritizing security ensures protection and compliance with industry standards and regulations, safeguarding against.', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ layout_two_item_title }}}',
	]
);



$this->end_controls_section();
