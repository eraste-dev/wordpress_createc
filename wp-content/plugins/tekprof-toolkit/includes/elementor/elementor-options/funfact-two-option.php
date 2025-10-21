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


// Counter Items Repeater
$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'number',
	[
		'label' => esc_html__('Counter Number', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => '8',
		'placeholder' => esc_html__('Enter counter number', 'tekprof-toolkit'),
		'label_block' => true,
	]
);


$repeater->add_control(
	'symbol',
	[
		'label' => esc_html__('Counter Symbol', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => 'k+',
		'placeholder' => esc_html__('Enter symbol (k+, +, etc)', 'tekprof-toolkit'),
		'label_block' => true,
	]
);


$repeater->add_control(
	'title',
	[
		'label' => esc_html__('Counter Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Project Complete', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Enter counter title', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_two_counter_list',
	[
		'label' => esc_html__('Counter Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'number' => '8',
				'symbol' => 'k+',
				'title' => esc_html__('Project Complete', 'tekprof-toolkit'),
			],
			[
				'number' => '5',
				'symbol' => 'k+',
				'title' => esc_html__('We\'ve Global Trusted Clients', 'tekprof-toolkit'),
			],
			[
				'number' => '23',
				'symbol' => '+',
				'title' => esc_html__('Awards Winning', 'tekprof-toolkit'),
			],
			[
				'number' => '20',
				'symbol' => '+',
				'title' => esc_html__('IT & Tech Services', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ title }}} - {{{ number }}}{{{ symbol }}}',
	]
);


$this->end_controls_section();
