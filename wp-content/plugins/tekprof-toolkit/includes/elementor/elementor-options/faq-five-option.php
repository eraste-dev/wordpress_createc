<?php

//content
$this->start_controls_section(
	'layout_five_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_five'
		]
	]
);

$this->add_control(
	'layout_five_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => esc_html__('Delivering Visionary IT Solutions for Modern Challenges', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_five_title_tag',
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



$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'faq_title',
	[
		'label' => esc_html__('FAQ Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('FAQ Title', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'faq_content',
	[
		'label' => esc_html__('FAQ Content', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('FAQ Content goes here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'is_active',
	[
		'label' => esc_html__('Active Item', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Yes', 'tekprof-toolkit'),
		'label_off' => esc_html__('No', 'tekprof-toolkit'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'layout_five_faq_items',
	[
		'label' => esc_html__('FAQ Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'faq_title' => esc_html__('Who Can Benefit from Services?', 'tekprof-toolkit'),
				'faq_content' => esc_html__('Cybersecurity is at the core of our solutions. We layered monitoring, and threat detection to protect.', 'tekprof-toolkit'),
				'is_active' => 'no',
			],
			[
				'faq_title' => esc_html__('Approach Cybersecurity?', 'tekprof-toolkit'),
				'faq_content' => esc_html__('Cybersecurity is at the core of our solutions. We layered monitoring, and threat detection to protect.', 'tekprof-toolkit'),
				'is_active' => 'yes',
			],
			[
				'faq_title' => esc_html__('Provide Custom IT Solutions?', 'tekprof-toolkit'),
				'faq_content' => esc_html__('Cybersecurity is at the core of our solutions. We layered monitoring, and threat detection to protect.', 'tekprof-toolkit'),
				'is_active' => 'no',
			],
			[
				'faq_title' => esc_html__('Process for Working?', 'tekprof-toolkit'),
				'faq_content' => esc_html__('Cybersecurity is at the core of our solutions. We layered monitoring, and threat detection to protect.', 'tekprof-toolkit'),
				'is_active' => 'no',
			],
			[
				'faq_title' => esc_html__('Help with Cloud Solutions?', 'tekprof-toolkit'),
				'faq_content' => esc_html__('Cybersecurity is at the core of our solutions. We layered monitoring, and threat detection to protect.', 'tekprof-toolkit'),
				'is_active' => 'no',
			],
		],
		'title_field' => '{{{ faq_title }}}',
	]
);

$this->add_control(
	'layout_five_image',
	[
		'label' => esc_html__('Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
