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
		'default' => wp_kses(__('<span class="thin">What\'s Our</span> Clients Say Us', 'tekprof-toolkit'), ['span' => ['class' => []]]),
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
	'layout_seven_sub_title',
	[
		'label' => esc_html__('Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__('Add sub title', 'tekprof-toolkit'),
		'default' => esc_html__('Clients Testimonials', 'tekprof-toolkit'),
	]
);


$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'name',
	[
		'label' => esc_html__('Author Name', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__('Author name', 'tekprof-toolkit'),
		'default' => esc_html__('Robert S. Hummel', 'tekprof-toolkit'),
	]
);

$repeater->add_control(
	'designation',
	[
		'label' => esc_html__('Designation', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__('Designation', 'tekprof-toolkit'),
		'default' => esc_html__('CEO & Founder', 'tekprof-toolkit'),
	]
);

$repeater->add_control(
	'testimonial',
	[
		'label' => esc_html__('Testimonial', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'label_block' => true,
		'placeholder' => esc_html__('Testimonial content', 'tekprof-toolkit'),
		'default' => esc_html__('"Working with has completely transformed operations. Their expertise in cloud migration helped us cut down on overhead and improve system reliability!"', 'tekprof-toolkit'),
	]
);

$repeater->add_control(
	'service_title',
	[
		'label' => esc_html__('Service Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__('Service title', 'tekprof-toolkit'),
		'default' => esc_html__('Quality Services', 'tekprof-toolkit'),
	]
);

$repeater->add_control(
	'rating',
	[
		'label' => esc_html__('Rating', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'label_block' => true,
		'options' => [
			'1' => esc_html__('1', 'tekprof-toolkit'),
			'2' => esc_html__('2', 'tekprof-toolkit'),
			'3' => esc_html__('3', 'tekprof-toolkit'),
			'4' => esc_html__('4', 'tekprof-toolkit'),
			'5' => esc_html__('5', 'tekprof-toolkit'),
		],
		'default' => '5',
	]
);

$repeater->add_control(
	'image',
	[
		'label' => esc_html__('Author Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'label_block' => true,
		'default' => [],
	]
);

$this->add_control(
	'layout_seven_testimonial',
	[
		'label' => esc_html__('Testimonials', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'title_field' => '{{{ name }}}',
		'default' => [
			[
				'name' => esc_html__('Robert S. Hummel', 'tekprof-toolkit'),
				'designation' => esc_html__('CEO & Founder', 'tekprof-toolkit'),
				'service_title' => esc_html__('Quality Services', 'tekprof-toolkit'),
				'rating' => '5',
			],
			[
				'name' => esc_html__('Team David', 'tekprof-toolkit'),
				'designation' => esc_html__('Businessman', 'tekprof-toolkit'),
				'service_title' => esc_html__('Quality Services', 'tekprof-toolkit'),
				'rating' => '5',
			],
		],
	]
);

$this->add_control(
	'layout_seven_bg_image',
	[
		'label' => esc_html__('Background Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'label_block' => true,
		'default' => [],
	]
);

$this->end_controls_section();
