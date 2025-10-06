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
	'layout_six_title',
	[
		'label' => esc_html__('Title ', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('<span class="thin">Modern Design Agency</span> Blueprint Innovation', 'tekprof-toolkit'), ['span' => ['class' => []]]),
		'placeholder' => esc_html__('Type your title here', 'tekprof-toolkit'),
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
	'layout_six_subtitle',
	[
		'label' => esc_html__('Subtitle', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Great Achievement', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your subtitle here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('We empower businesses to thrive in the digital system with best innovative IT solutions.', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your description here', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_six_button_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Get Consultation', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your button text here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_button_url',
	[
		'label' => esc_html__('Button URL', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'label_block' => true,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);


$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'counter_number',
	[
		'label' => esc_html__('Counter Number', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => '8',
		'placeholder' => esc_html__('Enter counter number', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'counter_suffix',
	[
		'label' => esc_html__('Counter Suffix', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => 'k+',
		'placeholder' => esc_html__('Enter suffix (e.g. k+, +, etc.)', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'counter_title',
	[
		'label' => esc_html__('Counter Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Project Complete', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Enter counter title', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_counter_items',
	[
		'label' => esc_html__('Counter Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'counter_number' => '8',
				'counter_suffix' => 'k+',
				'counter_title' => esc_html__('Project Complete', 'tekprof-toolkit'),
			],
			[
				'counter_number' => '5',
				'counter_suffix' => 'k+',
				'counter_title' => esc_html__('Global Clients', 'tekprof-toolkit'),
			],
			[
				'counter_number' => '23',
				'counter_suffix' => '+',
				'counter_title' => esc_html__('Awards Winning', 'tekprof-toolkit'),
			],
			[
				'counter_number' => '20',
				'counter_suffix' => '+',
				'counter_title' => esc_html__('Expert Team Member', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ counter_title }}}',
	]
);

$this->add_control(
	'layout_six_background_image',
	[
		'label' => esc_html__('Background Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
