<?php

//content
$this->start_controls_section(
	'layout_two_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_two'
		]
	]
);

$this->add_control(
	'layout_two_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => esc_html__('Experience Technical Team', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_two_title_tag',
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
	'layout_two_sub_title',
	[
		'label' => esc_html__('Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add sub title', 'tekprof-toolkit'),
		'default' => esc_html__('Meet Our Team', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$layout_two_team_list = new \Elementor\Repeater();

$layout_two_team_list->add_control(
	'name',
	[
		'label' => esc_html__('Name', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add Title', 'tekprof-toolkit'),
		'default' => esc_html__('Raymond R. Jacobs', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$layout_two_team_list->add_control(
	'url',
	[
		'label' => esc_html__('Url', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('#', 'tekprof-toolkit'),
		'show_external' => false,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'show_label' => false,
	]
);

$layout_two_team_list->add_control(
	'designation',
	[
		'label' => esc_html__('Designation', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'rows' => '2',
		'placeholder' => esc_html__('Add Designation', 'tekprof-toolkit'),
		'default' => esc_html__('Ceo & Founder', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$layout_two_team_list->add_control(
	'social',
	[
		'label' => esc_html__('Social Profile', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::CODE,
		'rows' => '2',
		'placeholder' => esc_html__('Add Social Profile', 'tekprof-toolkit'),
		'default' => wp_kses(__('<a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
			<a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
			<a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
			<a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>', 'tekprof-toolkit'), rt_get_allowed_html_tags()),
		'label_block' => true
	]
);

$layout_two_team_list->add_control(
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
	'layout_two_team_list',
	[
		'label' => esc_html__('Team List', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_two_team_list->get_controls(),
		'prevent_empty' => false,
		'title_field' => '{{{ name }}}',
		'default' => [
			[
				'name' => esc_html__('David R. Watkins', 'tekprof-toolkit'),
				'designation' => esc_html__('IT Consultant', 'tekprof-toolkit'),
				'social' => wp_kses(__('<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>', 'tekprof-toolkit'), rt_get_allowed_html_tags()),
				'url' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			],
			[
				'name' => esc_html__('James K. Andrews', 'tekprof-toolkit'),
				'designation' => esc_html__('UI Designer', 'tekprof-toolkit'),
				'social' => wp_kses(__('<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>', 'tekprof-toolkit'), rt_get_allowed_html_tags()),
				'url' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			],
			[
				'name' => esc_html__('Kenneth B. Hebert', 'tekprof-toolkit'),
				'designation' => esc_html__('HR Support', 'tekprof-toolkit'),
				'social' => wp_kses(__('<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>', 'tekprof-toolkit'), rt_get_allowed_html_tags()),
				'url' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			],
			[
				'name' => esc_html__('Alexander M. Burris', 'tekprof-toolkit'),
				'designation' => esc_html__('Product Designer', 'tekprof-toolkit'),
				'social' => wp_kses(__('<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>', 'tekprof-toolkit'), rt_get_allowed_html_tags()),
				'url' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
			],
		],
	]
);


$this->end_controls_section();
