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
	'section_title',
	[
		'label' => esc_html__('Section Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Experience Technical Team', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_title_tag',
	[
		'label' => esc_html__('Title HTML Tag', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'h2',
		'options' => [
			'h1' => esc_html__('H1', 'tekprof-toolkit'),
			'h2' => esc_html__('H2', 'tekprof-toolkit'),
			'h3' => esc_html__('H3', 'tekprof-toolkit'),
			'h4' => esc_html__('H4', 'tekprof-toolkit'),
			'h5' => esc_html__('H5', 'tekprof-toolkit'),
			'h6' => esc_html__('H6', 'tekprof-toolkit'),
		],
	]
);

$this->add_control(
	'section_subtitle',
	[
		'label' => esc_html__('Section Subtitle', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Meet Our Team', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'member_image',
	[
		'label' => esc_html__('Member Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$repeater->add_control(
	'member_name',
	[
		'label' => esc_html__('Member Name', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('David R. Watkins', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
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

$repeater->add_control(
	'member_designation',
	[
		'label' => esc_html__('Designation', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('IT Consultant', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'social_items',
	[
		'label' => esc_html__('Social Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::CODE,
		'default' => wp_kses(__('<a href="#"><i class="fab fa-facebook-f"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>', 'tekprof-toolkit'), array('a' => array('href' => array(), 'target' => array(), 'rel' => array()), 'i' => array('class' => array()))),
		'label_block' => true,
	]
);


$this->add_control(
	'team_members',
	[
		'label' => esc_html__('Team Members', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'member_name' => esc_html__('David R. Watkins', 'tekprof-toolkit'),
				'member_designation' => esc_html__('IT Consultant', 'tekprof-toolkit'),
			],
			[
				'member_name' => esc_html__('James K. Andrews', 'tekprof-toolkit'),
				'member_designation' => esc_html__('UI Designer', 'tekprof-toolkit'),
			],
			[
				'member_name' => esc_html__('Kenneth B. Hebert', 'tekprof-toolkit'),
				'member_designation' => esc_html__('HR Support', 'tekprof-toolkit'),
			],
			[
				'member_name' => esc_html__('Alexander M. Burris', 'tekprof-toolkit'),
				'member_designation' => esc_html__('Product Designer', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ member_name }}}',
	]
);


$this->end_controls_section();
