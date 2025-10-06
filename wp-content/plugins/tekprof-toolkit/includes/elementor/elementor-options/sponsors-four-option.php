<?php

//content
$this->start_controls_section(
	'layout_four_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_four'
		]
	]
);


$this->add_control(
	'layout_four_title',
	[
		'label' => esc_html__('Section Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Trusted by Millions in 45+ countries.', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_four_title_tag',
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


$repeater_right = new \Elementor\Repeater();

$repeater_right->add_control(
	'country_name',
	[
		'label' => esc_html__('Country Name', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('United States', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type country name here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater_right->add_control(
	'flag_image',
	[
		'label' => esc_html__('Flag Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_four_countries_right_list',
	[
		'label' => esc_html__('Countries Right List', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater_right->get_controls(),
		'default' => [
			[
				'country_name' => esc_html__('United States', 'tekprof-toolkit'),
			],
			[
				'country_name' => esc_html__('South Africa', 'tekprof-toolkit'),
			],
			[
				'country_name' => esc_html__('Russia', 'tekprof-toolkit'),
			],
			[
				'country_name' => esc_html__('Brazil', 'tekprof-toolkit'),
			],
			[
				'country_name' => esc_html__('Australia', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ country_name }}}',
	]
);

$repeater_left = new \Elementor\Repeater();

$repeater_left->add_control(
	'country_name',
	[
		'label' => esc_html__('Country Name', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Denmark', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type country name here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater_left->add_control(
	'flag_image',
	[
		'label' => esc_html__('Flag Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_four_countries_left_list',
	[
		'label' => esc_html__('Countries Left List', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater_left->get_controls(),
		'default' => [
			[
				'country_name' => esc_html__('Denmark', 'tekprof-toolkit'),
			],
			[
				'country_name' => esc_html__('Saudi Arabia', 'tekprof-toolkit'),
			],
			[
				'country_name' => esc_html__('Mexico', 'tekprof-toolkit'),
			],
			[
				'country_name' => esc_html__('Indonesia', 'tekprof-toolkit'),
			],
			[
				'country_name' => esc_html__('Sudan', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ country_name }}}',
	]
);

$this->add_control(
	'layout_four_map_image',
	[
		'label' => esc_html__('Map Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);


$this->end_controls_section();
