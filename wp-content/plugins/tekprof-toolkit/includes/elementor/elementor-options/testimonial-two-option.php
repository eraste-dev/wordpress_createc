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
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => esc_html__('Default Title', 'tekprof-toolkit'),
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
	'layout_two_sub_title',
	[
		'label' => esc_html__('Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Sub title', 'tekprof-toolkit'),
		'default' => esc_html__('Default Sub Title', 'tekprof-toolkit'),
	]
);


$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'name',
	[
		'label' => esc_html__('Name', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Robert S. Hummel', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type client name here', 'tekprof-toolkit'),
	]
);

$repeater->add_control(
	'designation',
	[
		'label' => esc_html__('Designation', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('CEO & Founder', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type client designation here', 'tekprof-toolkit'),
	]
);

$repeater->add_control(
	'testimonial',
	[
		'label' => esc_html__('Testimonial', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('"Working with has completely transformed operations. Their expertise in cloud migration helped us cut down on overhead and improve system reliability!"', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type client testimonial here', 'tekprof-toolkit'),
	]
);

$repeater->add_control(
	'image',
	[
		'label' => esc_html__('Client Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$repeater->add_control(
	'rating',
	[
		'label' => esc_html__('Rating', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => '5',
		'options' => [
			'1' => esc_html__('1 Star', 'tekprof-toolkit'),
			'2' => esc_html__('2 Stars', 'tekprof-toolkit'),
			'3' => esc_html__('3 Stars', 'tekprof-toolkit'),
			'4' => esc_html__('4 Stars', 'tekprof-toolkit'),
			'5' => esc_html__('5 Stars', 'tekprof-toolkit'),
		],
	]
);

$this->add_control(
	'layout_two_testimonial',
	[
		'label' => esc_html__('Testimonials', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'name' => esc_html__('Robert S. Hummel', 'tekprof-toolkit'),
				'designation' => esc_html__('CEO & Founder', 'tekprof-toolkit'),
				'testimonial' => esc_html__('"Working with has completely transformed operations. Their expertise in cloud migration helped us cut down on overhead and improve system reliability!"', 'tekprof-toolkit'),
				'rating' => '5',
			],
			[
				'name' => esc_html__('Leonard G. Trahan', 'tekprof-toolkit'),
				'designation' => esc_html__('Web Designer', 'tekprof-toolkit'),
				'testimonial' => esc_html__('"Working with has completely transformed operations. Their expertise in cloud migration helped us cut down on overhead and improve system reliability!"', 'tekprof-toolkit'),
				'rating' => '5',
			],
		],
		'title_field' => '{{{ name }}}',
	]
);

$this->add_control(
	'layout_two_client_title',
	[
		'label' => esc_html__('Client Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Clients Testimonials', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type client title here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_two_client_image',
	[
		'label' => esc_html__('Client Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::GALLERY,
		'default' => [],
	]
);

$this->end_controls_section();
