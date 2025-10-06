<?php

//content
$this->start_controls_section(
	'layout_nine_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_nine'
		]
	]
);

$this->add_control(
	'layout_nine_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('We Provide Best IT Services to Growth you Business', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_nine_title_tag',
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
	'layout_nine_sub_title',
	[
		'label' => esc_html__('Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Amazing Services', 'tekprof-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_nine_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium totam rem aperiame aque ipsa quae abillo inventore veritatis etuas', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

// List Items
$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'list_item',
	[
		'label' => esc_html__('List Item', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Comprehensive UI/UX Assessment', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_nine_list_items',
	[
		'label' => esc_html__('List Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'list_item' => esc_html__('Comprehensive UI/UX Assessment', 'tekprof-toolkit'),
			],
			[
				'list_item' => esc_html__('Deep Contextual Research and 360° Planning', 'tekprof-toolkit'),
			],
			[
				'list_item' => esc_html__('Wireframing & Prototyping', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ list_item }}}',
	]
);

$this->add_control(
	'layout_nine_button_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('View All Services', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_nine_button_url',
	[
		'label' => esc_html__('Button URL', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'label_block' => true,
	]
);

// Right side services
$this->add_control(
	'layout_nine_right_side_heading',
	[
		'label' => esc_html__('Right Side Services', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'service_icon',
	[
		'label' => esc_html__('Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-idea',
			'library' => 'flaticon',
		],
		'label_block' => true,
	]
);

$repeater->add_control(
	'service_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Digital Consulting', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'service_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('On the other hand denounce withteous indignations dislike beguilede demoralized', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'service_url',
	[
		'label' => esc_html__('URL', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_nine_services',
	[
		'label' => esc_html__('Services', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'service_icon' => [
					'value' => 'flaticon-idea',
					'library' => 'flaticon',
				],
				'service_title' => esc_html__('Digital Consulting', 'tekprof-toolkit'),
				'service_description' => esc_html__('On the other hand denounce withteous indignations dislike beguilede demoralized', 'tekprof-toolkit'),
			],
			[
				'service_icon' => [
					'value' => 'flaticon-grow',
					'library' => 'flaticon',
				],
				'service_title' => esc_html__('Apps Solutions', 'tekprof-toolkit'),
				'service_description' => esc_html__('On the other hand denounce withteous indignations dislike beguilede demoralized', 'tekprof-toolkit'),
			],
			[
				'service_icon' => [
					'value' => 'flaticon-data-protection',
					'library' => 'flaticon',
				],
				'service_title' => esc_html__('UX/UI Strategy', 'tekprof-toolkit'),
				'service_description' => esc_html__('On the other hand denounce withteous indignations dislike beguilede demoralized', 'tekprof-toolkit'),
			],
			[
				'service_icon' => [
					'value' => 'flaticon-graphic-design',
					'library' => 'flaticon',
				],
				'service_title' => esc_html__('Cyber Security', 'tekprof-toolkit'),
				'service_description' => esc_html__('On the other hand denounce withteous indignations dislike beguilede demoralized', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ service_title }}}',
	]
);

$this->add_control(
	'layout_nine_bg_image',
	[
		'label' => esc_html__('Background Shape', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
		'separator' => 'before',
	]
);



$this->end_controls_section();
