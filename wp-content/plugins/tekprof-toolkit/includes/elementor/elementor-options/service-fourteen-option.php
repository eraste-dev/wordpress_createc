<?php

//content
$this->start_controls_section(
	'layout_fourteen_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_fourteen'
		]
	]
);

$this->add_control(
	'layout_fourteen_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => wp_kses(__('<span class="thin">AI-Driven</span> Technology Services', 'tekprof-toolkit'), array(
			'span' => array(
				'class' => array(),
			),
		)),
		'placeholder' => esc_html__('Enter title', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_fourteen_title_tag',
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
	'layout_fourteen_subtitle',
	[
		'label' => esc_html__('Subtitle', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Professional IT Services', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Enter subtitle', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'service_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('AI-Powered Automation', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Enter service title', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'service_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Streamline workflows improve efficiency with intelligent automation solutions.', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Enter service description', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'service_link',
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

$repeater->add_control(
	'service_icon',
	[
		'label' => esc_html__('Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-algorithm',
			'library' => 'flaticon',
		],
		'label_block' => true,
	]
);

$repeater->add_control(
	'read_more',
	[
		'label' => esc_html__('Read More', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Read More', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Enter read more', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_fourteen_services',
	[
		'label' => esc_html__('Services', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'service_icon' => [
					'value' => 'flaticon-algorithm',
					'library' => 'flaticon',
				],
				'service_title' => esc_html__('AI-Powered Automation', 'tekprof-toolkit'),
				'service_description' => esc_html__('Streamline workflows improve efficiency with intelligent automation solutions.', 'tekprof-toolkit'),
			],
			[
				'service_icon' => [
					'value' => 'flaticon-flexibility',
					'library' => 'flaticon',
				],
				'service_title' => esc_html__('Machine Learning Solutions', 'tekprof-toolkit'),
				'service_description' => esc_html__('Unlock data-driven insights predictive analytics smarter decision-making.', 'tekprof-toolkit'),
			],
			[
				'service_icon' => [
					'value' => 'flaticon-data',
					'library' => 'flaticon',
				],
				'service_title' => esc_html__('AI-Driven Data Analytics', 'tekprof-toolkit'),
				'service_description' => esc_html__('Leverage AI for deep data analysis, and forecasting, business intelligence.', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ service_title }}}',
	]
);

$this->add_control(
	'layout_fourteen_bg_image',
	[
		'label' => esc_html__('Background Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'label_block' => true,
	]
);

$this->end_controls_section();
