<?php

//content
$this->start_controls_section(
	'layout_six_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_six'
		]
	]
);

$this->add_control(
	'layout_six_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Find the Right Solution for Your Budget Custom Plans', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_title_tag',
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
	'layout_six_subtitle',
	[
		'label' => esc_html__('Subtitle', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Pricing Package', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your subtitle here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);


$this->add_control(
	'layout_six_show_tabs',
	[
		'label' => esc_html__('Show Pricing Tabs', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'tekprof-toolkit'),
		'label_off' => esc_html__('Hide', 'tekprof-toolkit'),
		'return_value' => 'yes',
		'default' => 'yes',
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_monthly_tab_text',
	[
		'label' => esc_html__('Monthly Tab Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Monthly', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type monthly tab text here', 'tekprof-toolkit'),
		'condition' => [
			'layout_six_show_tabs' => 'yes',
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_yearly_tab_text',
	[
		'label' => esc_html__('Yearly Tab Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Yearly', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type yearly tab text here', 'tekprof-toolkit'),
		'condition' => [
			'layout_six_show_tabs' => 'yes',
		],
		'label_block' => true,
	]
);

// Monthly Pricing Items
$this->add_control(
	'layout_six_monthly_pricing_heading',
	[
		'label' => esc_html__('Monthly Pricing Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
	]
);

$monthly_repeater = new \Elementor\Repeater();

$monthly_repeater->add_control(
	'layout_six_monthly_package_title',
	[
		'label' => esc_html__('Package Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Basic Package', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$monthly_repeater->add_control(
	'layout_six_monthly_package_subtitle',
	[
		'label' => esc_html__('Package Subtitle', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$monthly_repeater->add_control(
	'layout_six_monthly_price',
	[
		'label' => esc_html__('Price', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('$500', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$monthly_repeater->add_control(
	'layout_six_monthly_duration',
	[
		'label' => esc_html__('Duration', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('/per month', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$monthly_repeater->add_control(
	'layout_six_monthly_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Our Basic AI Technology Service Plan is design for businesses looking to explore the power of AI with cost-effective', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$monthly_repeater->add_control(
	'layout_six_monthly_button_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Choose Package', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$monthly_repeater->add_control(
	'layout_six_monthly_button_url',
	[
		'label' => esc_html__('Button URL', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_monthly_pricing_items',
	[
		'label' => esc_html__('Monthly Pricing Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $monthly_repeater->get_controls(),
		'default' => [
			[
				'layout_six_monthly_package_title' => esc_html__('Basic Package', 'tekprof-toolkit'),
				'layout_six_monthly_package_subtitle' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
				'layout_six_monthly_price' => esc_html__('$500', 'tekprof-toolkit'),
				'layout_six_monthly_duration' => esc_html__('/per month', 'tekprof-toolkit'),
				'layout_six_monthly_button_text' => esc_html__('Choose Package', 'tekprof-toolkit'),
			],
			[
				'layout_six_monthly_package_title' => esc_html__('Standard Package', 'tekprof-toolkit'),
				'layout_six_monthly_package_subtitle' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
				'layout_six_monthly_price' => esc_html__('$850', 'tekprof-toolkit'),
				'layout_six_monthly_duration' => esc_html__('/per month', 'tekprof-toolkit'),
				'layout_six_monthly_button_text' => esc_html__('Choose Package', 'tekprof-toolkit'),
			],
			[
				'layout_six_monthly_package_title' => esc_html__('Custom Package', 'tekprof-toolkit'),
				'layout_six_monthly_package_subtitle' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
				'layout_six_monthly_price' => esc_html__('$990', 'tekprof-toolkit'),
				'layout_six_monthly_duration' => esc_html__('/per month', 'tekprof-toolkit'),
				'layout_six_monthly_button_text' => esc_html__('Choose Package', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ layout_six_monthly_package_title }}}',
	]
);

// Yearly Pricing Items
$this->add_control(
	'layout_six_yearly_pricing_heading',
	[
		'label' => esc_html__('Yearly Pricing Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
		'condition' => [
			'layout_six_show_tabs' => 'yes',
		],
	]
);

$yearly_repeater = new \Elementor\Repeater();

$yearly_repeater->add_control(
	'layout_six_yearly_package_title',
	[
		'label' => esc_html__('Package Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Basic Package', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_six_yearly_package_subtitle',
	[
		'label' => esc_html__('Package Subtitle', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_six_yearly_price',
	[
		'label' => esc_html__('Price', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('$550', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_six_yearly_duration',
	[
		'label' => esc_html__('Duration', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('/per month', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_six_yearly_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Our Basic AI Technology Service Plan is design for businesses looking to explore the power of AI with cost-effective', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_six_yearly_button_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Choose Package', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_six_yearly_button_url',
	[
		'label' => esc_html__('Button URL', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_six_yearly_pricing_items',
	[
		'label' => esc_html__('Yearly Pricing Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $yearly_repeater->get_controls(),
		'default' => [
			[
				'layout_six_yearly_package_title' => esc_html__('Basic Package', 'tekprof-toolkit'),
				'layout_six_yearly_package_subtitle' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
				'layout_six_yearly_price' => esc_html__('$550', 'tekprof-toolkit'),
				'layout_six_yearly_duration' => esc_html__('/per month', 'tekprof-toolkit'),
				'layout_six_yearly_button_text' => esc_html__('Choose Package', 'tekprof-toolkit'),
			],
			[
				'layout_six_yearly_package_title' => esc_html__('Standard Package', 'tekprof-toolkit'),
				'layout_six_yearly_package_subtitle' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
				'layout_six_yearly_price' => esc_html__('$900', 'tekprof-toolkit'),
				'layout_six_yearly_duration' => esc_html__('/per month', 'tekprof-toolkit'),
				'layout_six_yearly_button_text' => esc_html__('Choose Package', 'tekprof-toolkit'),
			],
			[
				'layout_six_yearly_package_title' => esc_html__('Custom Package', 'tekprof-toolkit'),
				'layout_six_yearly_package_subtitle' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
				'layout_six_yearly_price' => esc_html__('$999', 'tekprof-toolkit'),
				'layout_six_yearly_duration' => esc_html__('/per month', 'tekprof-toolkit'),
				'layout_six_yearly_button_text' => esc_html__('Choose Package', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ layout_six_yearly_package_title }}}',
		'condition' => [
			'layout_six_show_tabs' => 'yes',
		],
	]
);


$this->end_controls_section();
