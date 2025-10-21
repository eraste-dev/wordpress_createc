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
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => esc_html__('Best talent, Competitive Cost, Incredible IT Service Infrastructure', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_seven_title_tag',
	[
		'label'       => esc_html__('Title Tag', 'tekprof-toolkit'),
		'type'        => \Elementor\Controls_Manager::CHOOSE,
		'label_block' => true,
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
	'layout_seven_sub_title',
	[
		'label' => esc_html__('Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add sub title', 'tekprof-toolkit'),
		'default' => esc_html__('About Company', 'tekprof-toolkit'),
		'label_block' => true,
	]
);



$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'icon',
	[
		'label' => esc_html__('Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-cloud-1',
			'library' => 'flaticon',
		],
		'label_block' => true,
	]
);

$repeater->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Awards Winning Company', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Sed ut perspiciat unde omnis este natus error sit voluptatem accusantium doloremque', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'link_text',
	[
		'label' => esc_html__('Link Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Read More', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'link',
	[
		'label' => esc_html__('Link', 'tekprof-toolkit'),
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
	'layout_seven_features',
	[
		'label' => esc_html__('Features', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'icon' => [
					'value' => 'flaticon-cloud-1',
					'library' => 'flaticon',
				],
				'title' => esc_html__('Awards Winning Company', 'tekprof-toolkit'),
				'description' => esc_html__('Sed ut perspiciat unde omnis este natus error sit voluptatem accusantium doloremque', 'tekprof-toolkit'),
				'link_text' => esc_html__('Read More', 'tekprof-toolkit'),
				'link' => [
					'url' => '#',
				],
			],
			[
				'icon' => [
					'value' => 'flaticon-cyber-security-1',
					'library' => 'flaticon',
				],
				'title' => esc_html__('Startup IT Solution & Business Dev', 'tekprof-toolkit'),
				'description' => esc_html__('Sed ut perspiciat unde omnis este natus error sit voluptatem accusantium doloremque', 'tekprof-toolkit'),
				'link_text' => esc_html__('Read More', 'tekprof-toolkit'),
				'link' => [
					'url' => '#',
				],
			],
		],
		'title_field' => '{{{ title }}}',
		'label_block' => true,
	]
);

$this->add_control(
	'layout_seven_image',
	[
		'label' => esc_html__('Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_seven_bg_image',
	[
		'label' => esc_html__('Background Shape', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
		'label_block' => true,
	]
);

$this->end_controls_section();
