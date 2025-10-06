<?php

//content
$this->start_controls_section(
	'layout_one_left_content',
	[
		'label' => esc_html__('Left Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);


$this->add_control(
	'layout_one_team_name',
	[
		'label' => esc_html__('Team Member Name', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Samuel D. Fletcher', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_team_designation',
	[
		'label' => esc_html__('Designation', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Business Consultant', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_contact_title',
	[
		'label' => esc_html__('Contact Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Contact Me', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_team_email_title',
	[
		'label' => esc_html__('Email Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Email Address', 'tekprof-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_one_team_email',
	[
		'label' => esc_html__('Email Address', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('supportsaylo@gmail.com', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_team_phone_title',
	[
		'label' => esc_html__('Phone Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Need a Call', 'tekprof-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_one_team_phone',
	[
		'label' => esc_html__('Phone Number', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('+000 (123) 456 888', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_team_location_title',
	[
		'label' => esc_html__('Location Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Location', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_team_location',
	[
		'label' => esc_html__('Location', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('55 Main Street, d-block, New York', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_team_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('IT consultant provides expert guidance to help organizations navigate challenges, seize opportunities, and achieve their full potential. By analyzing th company\'s current operations, identifying inefficiencies, and uncovering growth opportunities, a business consultant develops tailored strategies that drive success.', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_follow_title',
	[
		'label' => esc_html__('Follow Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Follow Us', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_social_links',
	[
		'label' => esc_html__('Social Links', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => [
			[
				'name' => 'social_icon',
				'label' => esc_html__('Icon', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brands',
				],
			],
			[
				'name' => 'social_link',
				'label' => esc_html__('Link', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
			],
		],
		'default' => [
			[
				'social_icon' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brands',
				],
			],
			[
				'social_icon' => [
					'value' => 'fab fa-twitter',
					'library' => 'fa-brands',
				],
			],
			[
				'social_icon' => [
					'value' => 'fab fa-linkedin-in',
					'library' => 'fa-brands',
				],
			],
			[
				'social_icon' => [
					'value' => 'fab fa-youtube',
					'library' => 'fa-brands',
				],
			],
		],
		'title_field' => '<i class="{{ social_icon.value }}"></i>',
	]
);


$this->add_control(
	'layout_one_team_image',
	[
		'label' => esc_html__('Team Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();


//content
$this->start_controls_section(
	'layout_one_right_content',
	[
		'label' => esc_html__('Right Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one'
		]
	]
);

$this->add_control(
	'layout_one_eight_title',
	[
		'label' => esc_html__('Right Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Hello', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_eight_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::CODE,
		'default' => esc_html__('Default Content', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$layout_one_progressbar = new \Elementor\Repeater();

$layout_one_progressbar->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add Title', 'tekprof-toolkit'),
		'default' => esc_html__('IT Consulting', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$layout_one_progressbar->add_control(
	'number',
	[
		'label' => esc_html__('Percentage', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SLIDER,
		'size_units' => ['count'],
		'range' => [
			'count' => [
				'min' => 0,
				'max' => 100,
				'step' => 1,
			],
		],
		'default' => [
			'unit' => 'count',
			'size' => 89,
		],
	]
);


$this->add_control(
	'layout_one_progressbar',
	[
		'label' => esc_html__('Progress List', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_one_progressbar->get_controls(),
		'title_field' => '{{{ title }}}',
	]
);

$this->add_control(
	'layout_one_bottom_title',
	[
		'label' => esc_html__('Bottom Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Awards Winning', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_bottom_content',
	[
		'label' => esc_html__('Bottom Content', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Default Content', 'tekprof-toolkit'),
		'label_block' => true,
	]
);


$this->end_controls_section();
