<?php

$this->start_controls_section(
	'layout_two_contact_form_section',
	[
		'label' => esc_html__('Contact Form', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_ct_from_title',
	[
		'label' => esc_html__('Contact Form Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => esc_html__('Default Title', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_two_ct_from_title_tag',
	[
		'label'       => esc_html__('Contact Form  Title Tag', 'tekprof-toolkit'),
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
		'default'     => 'h3',
		'toggle'      => false,
	]
);

$this->add_control(
	'layout_two_ct_from_sub_title',
	[
		'label' => esc_html__('Contact Form  Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add Sub title', 'tekprof-toolkit'),
		'default' => esc_html__('Default Sub Title', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_two_select_cf7_form',
	[
		'label' => esc_html__('Select your contact form 7', 'tekprof-addon'),
		'label_block' => true,
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => rt_select_post('wpcf7_contact_form'),
	]
);

$this->end_controls_section();

//content
$this->start_controls_section(
	'layout_two_image_section',
	[
		'label' => esc_html__('Image', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_image',
	[
		'label' => esc_html__('Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);


$this->add_control(
	'layout_two_caption',
	[
		'label' => esc_html__('Image Caption', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => wp_kses(__('<h6 class="bgc-primary text-white">10m+ Satisfied Clients</h6>', 'tekprof-toolkit'), rt_get_allowed_html_tags()),
	]
);

$this->add_control(
	'layout_two_logo',
	[
		'label' => esc_html__('Logo', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
	]
);

$this->add_control(
	'layout_two_logo_url',
	[
		'label' => esc_html__('Logo Url', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('#', 'tekprof-toolkit'),
		'show_external' => false,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'show_label' => true,
	]
);

$this->end_controls_section();
