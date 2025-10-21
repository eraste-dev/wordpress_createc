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
		'default' => esc_html__('Improve your writing with artificial intelligence Platform', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_four_number',
	[
		'label' => esc_html__('Number', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('1', 'tekprof-toolkit'),
	]
);

$repeater->add_control(
	'layout_four_item_title',
	[
		'label' => esc_html__('Item Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Sing Up Or Create your account Full Free', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_four_with_arrow',
	[
		'label' => esc_html__('Show Arrow', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Yes', 'tekprof-toolkit'),
		'label_off' => esc_html__('No', 'tekprof-toolkit'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$this->add_control(
	'layout_four_items',
	[
		'label' => esc_html__('Process Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_four_number' => '1',
				'layout_four_item_title' => esc_html__('Sing Up Or Create your account Full Free', 'tekprof-toolkit'),
				'layout_four_with_arrow' => 'no',
			],
			[
				'layout_four_number' => '2',
				'layout_four_item_title' => esc_html__('Write what your want? or write something you want', 'tekprof-toolkit'),
				'layout_four_with_arrow' => 'yes',
			],
			[
				'layout_four_number' => '3',
				'layout_four_item_title' => esc_html__('Get Output or results', 'tekprof-toolkit'),
				'layout_four_with_arrow' => 'no',
			],
		],
		'title_field' => '{{{ layout_four_item_title }}}',
	]
);

$this->add_control(
	'layout_four_show_image_area',
	[
		'label' => esc_html__('Show Image Area', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Yes', 'tekprof-toolkit'),
		'label_off' => esc_html__('No', 'tekprof-toolkit'),
		'return_value' => 'yes',
		'default' => 'yes',
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_four_image',
	[
		'label' => esc_html__('Process Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'condition' => [
			'layout_four_show_image_area' => 'yes',
		],
	]
);

$this->add_control(
	'layout_four_shape_one',
	[
		'label' => esc_html__('Shape One', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_four_shape_two',
	[
		'label' => esc_html__('Shape Two', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_four_shape_three',
	[
		'label' => esc_html__('Shape Three', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'condition' => [
			'layout_four_show_image_area' => 'yes',
		],
	]
);

$this->add_control(
	'layout_four_shape_four',
	[
		'label' => esc_html__('Shape Four', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'condition' => [
			'layout_four_show_image_area' => 'yes',
		],
	]
);


$this->end_controls_section();
