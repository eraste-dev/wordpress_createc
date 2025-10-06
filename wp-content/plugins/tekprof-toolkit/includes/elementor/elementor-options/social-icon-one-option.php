<?php

//content
$this->start_controls_section(
	'layout_one_section_content',
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
		'placeholder' => esc_html__('Add Title', 'tekprof-toolkit'),
		'default' => esc_html__('Follow Us', 'tekprof-toolkit'),
		'label_block' => true
	]
);


$social_icons = new \Elementor\Repeater();

$social_icons->add_control(
	'social_icon',
	[
		'label' => __('Select Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'fab fa-facebook-f',
			'library' => 'brand',
		],
		'label_block' => true,
	]
);

$social_icons->add_control(
	'social_url',
	[
		'label' => __('Add Url', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => __('#', 'tekprof-toolkit'),
		'show_external' => false,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'show_label' => false,
	]
);

$this->add_control(
	'social_icons',
	[
		'label' => __('Social Icons', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $social_icons->get_controls(),
		'prevent_empty' => false,
		'default' => [
			[
				'social_url' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			],
		],
	]
);

$this->end_controls_section();
