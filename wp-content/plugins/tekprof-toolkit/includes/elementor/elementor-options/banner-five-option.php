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


$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'slide_subtitle',
	[
		'label' => esc_html__('Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('IT Solution Comapny', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your subtitle here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'slide_tagline',
	[
		'label' => esc_html__('Tagline', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('We\'re Digital', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your tagline here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'slide_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('IT Services Agency', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'slide_button_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Let\'s Get Started', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your button text here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'slide_button_url',
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


$this->add_control(
	'banner_five_slides',
	[
		'label' => esc_html__('Slider Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'slide_subtitle' => esc_html__('IT Solution Comapny', 'tekprof-toolkit'),
				'slide_tagline' => esc_html__('We\'re Digital', 'tekprof-toolkit'),
				'slide_title' => esc_html__('IT Services Agency', 'tekprof-toolkit'),
				'slide_button_text' => esc_html__('Let\'s Get Started', 'tekprof-toolkit'),
			],
			[
				'slide_subtitle' => esc_html__('IT Solution Comapny', 'tekprof-toolkit'),
				'slide_tagline' => esc_html__('We\'re Digital', 'tekprof-toolkit'),
				'slide_title' => esc_html__('IT Services Agency', 'tekprof-toolkit'),
				'slide_button_text' => esc_html__('Let\'s Get Started', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ slide_title }}}',
	]
);

$this->add_control(
	'layout_five_background_image',
	[
		'label' => esc_html__('Background Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
