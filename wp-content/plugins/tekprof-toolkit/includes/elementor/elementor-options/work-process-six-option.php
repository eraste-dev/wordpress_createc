<?php

//content
$this->start_controls_section(
	'layout_six_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_six'
		]
	]
);


$this->add_control(
	'layout_six_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => wp_kses(__('<span class="thin">Guiding You Through Every Step</span> of the IT Journey', 'tekprof-toolkit'), [
			'span' => [
				'class' => [],
			],
		]),
		'label_block' => true
	]
);

$this->add_control(
	'layout_six_title_tag',
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
	]
);

$this->add_control(
	'layout_six_sub_title',
	[
		'label' => esc_html__('Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add sub title', 'tekprof-toolkit'),
		'default' => esc_html__('Working Process', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$repeater = new \Elementor\Repeater();


$repeater->add_control(
	'step_number',
	[
		'label' => esc_html__('Step Number', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('1', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Discovery & Strategy Planning', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Understand client needs, business challenges, and goals. Conduct market research and data analysis', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'image',
	[
		'label' => esc_html__('Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_six_working_process_list',
	[
		'label' => esc_html__('Work Process Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'step_number' => '1',
				'title' => esc_html__('Discovery & Strategy Planning', 'tekprof-toolkit'),
				'description' => esc_html__('Understand client needs, business challenges, and goals. Conduct market research and data analysis', 'tekprof-toolkit'),
			],
			[
				'step_number' => '2',
				'title' => esc_html__('AI Development & Implementation', 'tekprof-toolkit'),
				'description' => esc_html__('Design, develop, and train AI models tailored the client\'s needs. Integrate AI solutions into existing systems', 'tekprof-toolkit'),
			],
			[
				'step_number' => '3',
				'title' => esc_html__('Deployment, Monitoring & Improvement', 'tekprof-toolkit'),
				'description' => esc_html__('Understand client needs, business challenges, and goals. Conduct market research and data analysis', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ title }}}',
	]
);



$this->end_controls_section();
