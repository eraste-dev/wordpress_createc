<?php

//content
$this->start_controls_section(
	'layout_seven_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_seven'
		]
	]
);


$this->add_control(
	'layout_seven_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => wp_kses(__('<span class="thin">Frequently</span> Asked Questions', 'tekprof-toolkit'), ['span' => ['class' => []]]),
	]
);

$this->add_control(
	'layout_seven_title_tag',
	[
		'label' => esc_html__('Title Tag', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::CHOOSE,
		'label_block' => true,
		'options' => [
			'h1' => [
				'title' => esc_html__('H1', 'tekprof-toolkit'),
				'icon' => 'eicon-editor-h1',
			],
			'h2' => [
				'title' => esc_html__('H2', 'tekprof-toolkit'),
				'icon' => 'eicon-editor-h2',
			],
			'h3' => [
				'title' => esc_html__('H3', 'tekprof-toolkit'),
				'icon' => 'eicon-editor-h3',
			],
			'h4' => [
				'title' => esc_html__('H4', 'tekprof-toolkit'),
				'icon' => 'eicon-editor-h4',
			],
			'h5' => [
				'title' => esc_html__('H5', 'tekprof-toolkit'),
				'icon' => 'eicon-editor-h5',
			],
			'h6' => [
				'title' => esc_html__('H6', 'tekprof-toolkit'),
				'icon' => 'eicon-editor-h6',
			],
		],
		'default' => 'h2',
	]
);

$this->add_control(
	'layout_seven_subtitle',
	[
		'label' => esc_html__('Subtitle', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__('Add subtitle', 'tekprof-toolkit'),
		'default' => esc_html__('Asked Questions', 'tekprof-toolkit'),
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'faq_title',
	[
		'label' => esc_html__('FAQ Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__('Add FAQ title', 'tekprof-toolkit'),
		'default' => esc_html__('What is cybersecurity, and it important?', 'tekprof-toolkit'),
	]
);

$repeater->add_control(
	'faq_content',
	[
		'label' => esc_html__('FAQ Content', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'placeholder' => esc_html__('Add FAQ content', 'tekprof-toolkit'),
		'default' => esc_html__('Use strong, unique passwords and enable multi-factor authentication update software and systems Educate employees about cybersecurity best practices', 'tekprof-toolkit'),
	]
);

$repeater->add_control(
	'is_active',
	[
		'label' => esc_html__('Is Active?', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_block' => true,
		'label_on' => esc_html__('Yes', 'tekprof-toolkit'),
		'label_off' => esc_html__('No', 'tekprof-toolkit'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'layout_seven_faq_items',
	[
		'label' => esc_html__('FAQ Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'title_field' => '{{{ faq_title }}}',
		'default' => [
			[
				'faq_title' => esc_html__('What is cybersecurity, and it important?', 'tekprof-toolkit'),
				'faq_content' => esc_html__('Use strong, unique passwords and enable multi-factor authentication update software and systems Educate employees about cybersecurity best practices', 'tekprof-toolkit'),
				'is_active' => 'no',
			],
			[
				'faq_title' => esc_html__('How can I protect my organization?', 'tekprof-toolkit'),
				'faq_content' => esc_html__('Use strong, unique passwords and enable multi-factor authentication update software and systems Educate employees cybersecurity', 'tekprof-toolkit'),
				'is_active' => 'yes',
			],
		],
	]
);

$this->add_control(
	'layout_seven_image',
	[
		'label' => esc_html__('FAQ Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'label_block' => true,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_seven_logo',
	[
		'label' => esc_html__('Logo Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'label_block' => true,
		'default' => [],
	]
);




$this->end_controls_section();
