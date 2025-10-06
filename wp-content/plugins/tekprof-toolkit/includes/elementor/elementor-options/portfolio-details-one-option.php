<?php

//content
$this->start_controls_section(
	'layout_one_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);


$this->add_control(
	'layout_one_custom_title',
	[
		'label' => esc_html__('Custom Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Custom title', 'tekprof-toolkit'),
		'default' => esc_html__('Inventory Tech Management with Custom Software Solution', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_title_tag',
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
	'layout_one_case_category_title',
	[
		'label' => esc_html__('Case Category Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Case Category Title', 'tekprof-toolkit'),
		'default' => esc_html__('Case Category', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_case_date_title',
	[
		'label' => esc_html__('Case Date Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Case Date Title', 'tekprof-toolkit'),
		'default' => esc_html__('Case Date:', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_case_start_date',
	[
		'label' => esc_html__('Case Start Date', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Case Start Date', 'tekprof-toolkit'),
		'default' => wp_kses(__('Start On<br> 20 Aug 2024', 'tekprof-toolkit'), array('br' => array())),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_case_end_date',
	[
		'label' => esc_html__('Case End Date', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Case End Date', 'tekprof-toolkit'),
		'default' => wp_kses(__('End On<br> 30 Sep 2024', 'tekprof-toolkit'), array('br' => array())),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_one_location_title',
	[
		'label' => esc_html__('Location Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Location Title', 'tekprof-toolkit'),
		'default' => esc_html__('Location', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_location',
	[
		'label' => esc_html__('Location', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Location', 'tekprof-toolkit'),
		'default' => esc_html__('101 Fifth Avenue, 12th Floor New York, NY 10003', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_client_title',
	[
		'label' => esc_html__('Client Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Client Title', 'tekprof-toolkit'),
		'default' => esc_html__('Clients', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_client_name',
	[
		'label' => esc_html__('Client Name', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Client Name', 'tekprof-toolkit'),
		'default' => esc_html__('ABC Retail Inc.', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_client_description',
	[
		'label' => esc_html__('Client Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Client Description', 'tekprof-toolkit'),
		'default' => esc_html__('a leading regional IT Agency.', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_image',
	[
		'label' => esc_html__('Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
