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

$this->add_control(
	'layout_one_section_title',
	[
		'label' => esc_html__('Section Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Modern Design Agency Blueprint Innovation', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_title_tag',
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
	'layout_one_section_sub_title',
	[
		'label' => esc_html__('Section Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Great Achievement', 'tekprof-toolkit'),
		'label_block' => true,
	]
);



$this->add_control(
	'layout_one_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('We empower businesses to thrive in the digital system with best innovative IT solutions.', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_button_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Get Consultation', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_button_url',
	[
		'label' => esc_html__('Button URL', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'number',
	[
		'label' => esc_html__('Counter Number', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => '8',
		'label_block' => true,
	]
);

$repeater->add_control(
	'symbol',
	[
		'label' => esc_html__('Counter Symbol', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => 'k+',
		'label_block' => true,
	]
);

$repeater->add_control(
	'title',
	[
		'label' => esc_html__('Counter Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Project Complete', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'description',
	[
		'label' => esc_html__('Counter Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => '',
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_counter_list',
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
				'title' => esc_html__('Global Clients', 'tekprof-toolkit'),
			],
			[
				'number' => '23',
				'symbol' => '+',
				'title' => esc_html__('Awards Winning', 'tekprof-toolkit'),
			],
			[
				'number' => '20',
				'symbol' => '+',
				'title' => esc_html__('Expert Team Member', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ title }}}',
	]
);


$this->end_controls_section();

$this->start_controls_section(
	'section_image_one',
	[
		'label' => esc_html__('Images', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_bg_image',
	[
		'label' => esc_html__('Background Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->end_controls_section();
