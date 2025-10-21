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
	'layout_three_sub_title',
	[
		'label' => esc_html__('Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Meet Our Team', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your sub title here', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_three_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Experience Technical Team', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'tekprof-toolkit'),
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

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'image',
	[
		'label' => esc_html__('Member Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$repeater->add_control(
	'name',
	[
		'label' => esc_html__('Name', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('David R. Watkins', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type member name here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'designation',
	[
		'label' => esc_html__('Designation', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('IT Consultant', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type member designation here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Current IT identify opportunities for improvement, and develop.', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type member description here', 'tekprof-toolkit'),
	]
);

$repeater->add_control(
	'url',
	[
		'label' => esc_html__('Profile URL', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => true,
			'nofollow' => true,
		],
	]
);

$repeater->add_control(
	'social',
	[
		'label' => esc_html__('Social Links', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
		<a href="#"><i class="fab fa-twitter"></i></a>
		<a href="#"><i class="fab fa-linkedin-in"></i></a>
		<a href="#"><i class="fab fa-instagram"></i></a>',
		'placeholder' => esc_html__('Add social links with HTML', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_three_team_list',
	[
		'label' => esc_html__('Team Members', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'name' => esc_html__('David R. Watkins', 'tekprof-toolkit'),
				'designation' => esc_html__('IT Consultant', 'tekprof-toolkit'),
				'description' => esc_html__('As an IT consultant, our mission is to bridge the technology.', 'tekprof-toolkit'),
				'url' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'social' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>',
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			],
			[
				'name' => esc_html__('Robert S. Hummel', 'tekprof-toolkit'),
				'designation' => esc_html__('IT Consultant', 'tekprof-toolkit'),
				'description' => esc_html__('Current IT identify opportunities for improvement, and develop.', 'tekprof-toolkit'),
				'url' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'social' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>',
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			],
			[
				'name' => esc_html__('Eugene A. Howland', 'tekprof-toolkit'),
				'designation' => esc_html__('IT Consultant', 'tekprof-toolkit'),
				'description' => esc_html__('Current IT identify opportunities for improvement, and develop.', 'tekprof-toolkit'),
				'url' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'social' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>',
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			],
			[
				'name' => esc_html__('Paul G. Hundley', 'tekprof-toolkit'),
				'designation' => esc_html__('IT Consultant', 'tekprof-toolkit'),
				'description' => esc_html__('Current IT identify opportunities for improvement, and develop.', 'tekprof-toolkit'),
				'url' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'social' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>',
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			],
			[
				'name' => esc_html__('Danny J. Harrison', 'tekprof-toolkit'),
				'designation' => esc_html__('IT Consultant', 'tekprof-toolkit'),
				'description' => esc_html__('Current IT identify opportunities for improvement, and develop.', 'tekprof-toolkit'),
				'url' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'social' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>',
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			],
			[
				'name' => esc_html__('Nathan S. Barber', 'tekprof-toolkit'),
				'designation' => esc_html__('IT Consultant', 'tekprof-toolkit'),
				'description' => esc_html__('Current IT identify opportunities for improvement, and develop.', 'tekprof-toolkit'),
				'url' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'social' => '<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-linkedin-in"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>',
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			],
		],
		'title_field' => '{{{ name }}}',
	]
);


$this->end_controls_section();
