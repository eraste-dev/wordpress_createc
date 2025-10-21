<?php

//content
$this->start_controls_section(
	'layout_three_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_three'
		]
	]
);

$this->add_control(
	'layout_three_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Building Resilience Our Cybersecurity Methodology', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_three_title_tag',
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
	'layout_three_subtitle',
	[
		'label' => esc_html__('Subtitle', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Working Process', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_three_image',
	[
		'label' => esc_html__('Process Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_three_step_number',
	[
		'label' => esc_html__('Step Number', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Step 01', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_three_step_title',
	[
		'label' => esc_html__('Step Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Risk Management Framework', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_three_step_description',
	[
		'label' => esc_html__('Step Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('RMF is a structured approach to identify, assess, and mitigate risks to information systems ensures', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_three_process_items',
	[
		'label' => esc_html__('Process Steps', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_three_step_number' => esc_html__('Step 01', 'tekprof-toolkit'),
				'layout_three_step_title' => esc_html__('Risk Management Framework', 'tekprof-toolkit'),
				'layout_three_step_description' => esc_html__('RMF is a structured approach to identify, assess, and mitigate risks to information systems ensures', 'tekprof-toolkit'),
			],
			[
				'layout_three_step_number' => esc_html__('Step 02', 'tekprof-toolkit'),
				'layout_three_step_title' => esc_html__('Defense in Depth (Layered Security)', 'tekprof-toolkit'),
				'layout_three_step_description' => esc_html__('A multi-layered approach that implements security controls at multiple levels (network, application', 'tekprof-toolkit'),
			],
			[
				'layout_three_step_number' => esc_html__('Step 03', 'tekprof-toolkit'),
				'layout_three_step_title' => esc_html__('Incident Response Process', 'tekprof-toolkit'),
				'layout_three_step_description' => esc_html__('A focused approach to detecting, responding to, and recovering from cyber incidents, minimizing impact', 'tekprof-toolkit'),
			],
			[
				'layout_three_step_number' => esc_html__('Step 04', 'tekprof-toolkit'),
				'layout_three_step_title' => esc_html__('Monitoring & Detection', 'tekprof-toolkit'),
				'layout_three_step_description' => esc_html__('24/7 Threat Monitoring: Use advanced tools like SIEM (Security Information and Event Management)', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ layout_three_step_title }}}',
	]
);


$this->end_controls_section();
