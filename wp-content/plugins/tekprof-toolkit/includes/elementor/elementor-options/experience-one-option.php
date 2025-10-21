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
	'layout_one_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => esc_html__('Experience', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$this->add_control(
	'layout_one_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => '2',
		'placeholder' => esc_html__('Add Description', 'tekprof-toolkit'),
		'default' => esc_html__('Default Description', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$layout_one_experience_list = new \Elementor\Repeater();

$layout_one_experience_list->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => esc_html__('Senior Product Designer', 'tekprof-toolkit'),
		'label_block' => true
	]
);


$layout_one_experience_list->add_control(
	'year',
	[
		'label' => esc_html__('Experience Year', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Year', 'tekprof-toolkit'),
		'default' => esc_html__('2020-Present', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$layout_one_experience_list->add_control(
	'company',
	[
		'label' => esc_html__('Company', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Company', 'tekprof-toolkit'),
		'default' => esc_html__('Google', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$layout_one_experience_list->add_control(
	'icon',
	[
		'label' => __('Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-job-search',
			'library' => 'custom-icon',
		],
	]
);


$this->add_control(
	'layout_one_experience_list',
	[
		'label' => esc_html__('Experience List', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_one_experience_list->get_controls(),
		'prevent_empty' => false,
		'title_field' => '{{{ title }}}',
	]
);

$this->end_controls_section();
