<?php

$this->start_controls_section(
	'logo_section',
	[
		'label' => __('Site Logo', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
	]
);

$this->add_control(
	'logo',
	[
		'label' => __('Logo', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'logo_size',
	[
		'label' => __('Logo Size', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
		'description' => __('Set Logo Size.', 'tekprof-toolkit'),
		'default' => [
			'width' => '123',
			'height' => '35',
		],
	]
);

$this->add_control(
	'mobile_logo',
	[
		'label' => __('Mobile Logo', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'mobile_logo_size',
	[
		'label' => __('Mobile Logo Size', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
		'description' => __('Set Logo Size.', 'tekprof-toolkit'),
		'default' => [
			'width' => '123',
			'height' => '35',
		],
	]
);


$this->end_controls_section();

$this->start_controls_section(
	'nav_section',
	[
		'label' => __('Navigation', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
	]
);

$this->add_control(
	'nav_menu',
	[
		'label'     => esc_html__('Select Menu', 'tekprof-toolkit'),
		'type'      => \Elementor\Controls_Manager::SELECT,
		'options'   => $this->get_menus_list(),
	]
);

$this->end_controls_section();

$this->start_controls_section(
	'top_bar_settings',
	[
		'label' => esc_html__('Top Bar Settings', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
	]
);

$this->add_control(
	'top_text',
	[
		'label' => esc_html__('Top Bar Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Default Text', 'tekprof-toolkit'),
		'label_block' => true,
		'condition' => [
			'layout_type' =>  ['layout_four', 'layout_six']
		]
	]
);

$this->add_control(
	'email_text',
	[
		'label' => esc_html__('Email Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Support :', 'tekprof-toolkit'),
		'label_block' => true,
		'condition' => [
			'layout_type' => ['layout_one', 'layout_two']
		]
	]
);

$this->add_control(
	'email_address',
	[
		'label' => esc_html__('Email Address', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('uintechinfo@gmail.com', 'tekprof-toolkit'),
		'label_block' => true,
		'condition' => [
			'layout_type' => ['layout_one', 'layout_two', 'layout_four']
		]
	]
);

$this->add_control(
	'email_icon',
	[
		'label' => __('Email Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'far fa-envelope',
			'library' => 'custom-icon',
		],
		'condition' => [
			'layout_type' => ['layout_one', 'layout_two']
		]
	]
);

$this->add_control(
	'social_title',
	[
		'label' => esc_html__('Social Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Follow Us', 'tekprof-toolkit'),
		'label_block' => true,
		'condition' => [
			'layout_type' => ['layout_one', 'layout_two', 'layout_four']
		]
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
		'condition' => [
			'layout_type' => ['layout_one', 'layout_two', 'layout_four']
		]
	]
);

$this->add_control(
	'sidebar_icon',
	[
		'label' => esc_html__('Sidebar Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [],
		'condition' => [
			'layout_type' => 'layout_four'
		]
	]
);



$this->end_controls_section();


$this->start_controls_section(
	'other_settings',
	[
		'label' => esc_html__('Other Settings', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
	]
);

$this->add_control(
	'call_text',
	[
		'label' => esc_html__('Call Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Need any help? Call :', 'tekprof-toolkit'),
		'label_block' => true,
		'condition' => [
			'layout_type' => ['layout_one', 'layout_two', 'layout_seven']
		]
	]
);

$this->add_control(
	'call_number',
	[
		'label' => esc_html__('Call Number', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('+000 (123) 45 88', 'tekprof-toolkit'),
		'label_block' => true,
		'condition' => [
			'layout_type' => ['layout_one', 'layout_two', 'layout_five', 'layout_seven']
		]
	]
);

$this->add_control(
	'call_url',
	[
		'label' => esc_html__('Call Url', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('callto:+000(123)4588', 'tekprof-toolkit'),
		'show_external' => false,
		'label_block' => true,
		'condition' => [
			'layout_type' => ['layout_one', 'layout_two', 'layout_five', 'layout_seven']
		]
	]
);

$this->add_control(
	'call_icon',
	[
		'label' => __('Call Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'far fa-phone',
			'library' => 'custom-icon',
		],
		'condition' => [
			'layout_type' => ['layout_one', 'layout_two', 'layout_five', 'layout_seven']
		]
	]
);

$this->add_control(
	'button_label',
	[
		'label' => esc_html__('Button Label', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Start Projects', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'button_url',
	[
		'label' => esc_html__('Button Url', 'tekprof-toolkit'),
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



$this->end_controls_section();

$this->start_controls_section(
	'sidebar_section',
	[
		'label' => esc_html__('Sidebar Settings', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
	]
);

$this->add_control(
	'sidebar_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Recent Post', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'post_from',
	[
		'label'   => esc_html__('Post From', 'tekprof-toolkit'),
		'type'    => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'all'           => esc_html__('All Posts', 'tekprof-toolkit'),
			'categories'    => esc_html__('Categories', 'tekprof-toolkit'),
			'specific-post' => esc_html__('Specific Posts', 'tekprof-toolkit'),
		],
		'default' => 'all',
	]
);

$this->add_control(
	'post_ids',
	[
		'label'       => esc_html__('Select Posts', 'tekprof-toolkit'),
		'type'        => \Elementor\Controls_Manager::SELECT2,
		'options'     => rt_select_post(),
		'multiple'    => true,
		'label_block' => true,
		'condition'   => [
			'post_from' => 'specific-post',
		],
	]
);

$this->add_control(
	'cat_slugs',
	[
		'label'       => esc_html__('Select Categories', 'tekprof-toolkit'),
		'type'        => \Elementor\Controls_Manager::SELECT2,
		'options'     => rt_select_category(),
		'multiple'    => true,
		'label_block' => true,
		'condition'   => [
			'post_from' => 'categories',
		],
	]
);

$this->add_control(
	'post_limit',
	[
		'label'   => esc_html__('Limit Item', 'tekprof-toolkit'),
		'type'    => \Elementor\Controls_Manager::NUMBER,
		'default' => 3,
		'min'     => 1,
	]
);

$this->add_control(
	'title_word',
	[
		'label'   => esc_html__('Title Length', 'tekprof-toolkit'),
		'type'    => \Elementor\Controls_Manager::NUMBER,
		'default' => 4,
	]
);

$this->add_control(
	'order_by',
	[
		'label'   => esc_html__('Order By', 'tekprof-toolkit'),
		'type'    => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'ID'     => esc_html__('ID', 'tekprof-toolkit'),
			'author' => esc_html__('Author', 'tekprof-toolkit'),
			'title'  => esc_html__('Title', 'tekprof-toolkit'),
			'date'   => esc_html__('Date', 'tekprof-toolkit'),
			'rand'   => esc_html__('Random', 'tekprof-toolkit'),
		],
		'default' => 'date',
	]
);

$this->add_control(
	'sort_order',
	[
		'label'   => esc_html__('Sort Order', 'tekprof-toolkit'),
		'type'    => \Elementor\Controls_Manager::SELECT,
		'options' => [
			'ASC'  => esc_html__('Ascending', 'tekprof-toolkit'),
			'DESC' => esc_html__('Descending', 'tekprof-toolkit'),
		],
		'default' => 'DESC',
	]
);

$sidebar_social_icons = new \Elementor\Repeater();

$sidebar_social_icons->add_control(
	'social_icon',
	[
		'label' => esc_html__('Select Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'fab fa-facebook-f',
			'library' => 'brand',
		],
		'label_block' => true,
	]
);

$sidebar_social_icons->add_control(
	'social_url',
	[
		'label' => esc_html__('Add Url', 'tekprof-toolkit'),
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

$this->add_control(
	'sidebar_social_icons',
	[
		'label' => esc_html__('Social Icons', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $sidebar_social_icons->get_controls(),
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
