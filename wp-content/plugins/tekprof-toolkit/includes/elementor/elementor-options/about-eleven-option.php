<?php

//content
$this->start_controls_section(
	'layout_eleven_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_eleven'
		]
	]
);


$this->add_control(
	'layout_eleven_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('<span class="thin">Protecting Businesses with</span> Cutting-Edge Cybersecurity', 'tekprof-toolkit'), array(
			'span' => array(
				'class' => array(),
			),
		)),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_eleven_title_tag',
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
	]
);

$this->add_control(
	'layout_eleven_subtitle',
	[
		'label' => esc_html__('Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Learn About Us', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_eleven_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('We are a forward-thinking technology startup agency dedicated to delivering cutting-edge digital solutions that drive business success. With expertise in AI, cloud computing software development, and cybersecurity, we help startups and enterprises', 'tekprof-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_eleven_client_percentage',
	[
		'label' => esc_html__('Client Satisfaction Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('99% Clients Satisfied', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_eleven_list_item',
	[
		'label' => esc_html__('List Item', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Advance Technology Solutions', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_eleven_list_items_left',
	[
		'label' => esc_html__('Left Column List Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_eleven_list_item' => esc_html__('Advance Technology Solutions', 'tekprof-toolkit'),
			],
			[
				'layout_eleven_list_item' => esc_html__('Advance Technology Solutions', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ layout_eleven_list_item }}}',
	]
);

$this->add_control(
	'layout_eleven_list_items_right',
	[
		'label' => esc_html__('Right Column List Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_eleven_list_item' => esc_html__('Professional Team Members', 'tekprof-toolkit'),
			],
			[
				'layout_eleven_list_item' => esc_html__('Professional Team Members', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ layout_eleven_list_item }}}',
	]
);

$this->add_control(
	'layout_eleven_button_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Explore UinTech IT Services', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_eleven_button_url',
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

$this->add_control(
	'layout_eleven_image',
	[
		'label' => esc_html__('Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_eleven_shape_image',
	[
		'label' => esc_html__('Shape Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
		],
	]
);

$this->end_controls_section();

