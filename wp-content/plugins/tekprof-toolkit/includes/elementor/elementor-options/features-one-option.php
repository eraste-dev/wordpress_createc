<?php

//content
$this->start_controls_section(
	'layout_one_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);


$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'feature_icon',
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
	'feature_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Customizable Solutions', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Feature Title', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'feature_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Providing highly customizable solutions tailored to each client\'s unique needs can set you apart. Clients are looking.', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your description here', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_one_feature_items',
	[
		'label' => esc_html__('Feature Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'feature_icon' => [
					'value' => 'flaticon-idea',
					'library' => 'flaticon',
				],
				'feature_title' => esc_html__('Customizable Solutions', 'tekprof-toolkit'),
				'feature_description' => esc_html__('Providing highly customizable solutions tailored to each client\'s unique needs can set you apart. Clients are looking.', 'tekprof-toolkit'),
			],
			[
				'feature_icon' => [
					'value' => 'flaticon-grow',
					'library' => 'flaticon',
				],
				'feature_title' => esc_html__('Scalability & Flexibility', 'tekprof-toolkit'),
				'feature_description' => esc_html__('Scalable solutions allow companies to grow without needing to overhaul their software infrastructure architecture.', 'tekprof-toolkit'),
			],
			[
				'feature_icon' => [
					'value' => 'flaticon-data-protection',
					'library' => 'flaticon',
				],
				'feature_title' => esc_html__('Security & Compliance', 'tekprof-toolkit'),
				'feature_description' => esc_html__('Prioritizing security ensures protection and compliance with industry standards and regulations, safeguarding against.', 'tekprof-toolkit'),
			],
			[
				'feature_icon' => [
					'value' => 'flaticon-graphic-design',
					'library' => 'flaticon',
				],
				'feature_title' => esc_html__('User-Friendly Interface', 'tekprof-toolkit'),
				'feature_description' => esc_html__('Accessibility features, and thoughtful design help clients and their teams adapt quickly and use the solution effectively.', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ feature_title }}}',
	]
);

$this->end_controls_section();
