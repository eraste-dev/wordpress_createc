<?php

//content
$this->start_controls_section(
	'layout_five_content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_five'
		]
	]
);

$this->add_control(
	'layout_five_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Find the Right Solution for Your Budget Custom Plans for Every Stage of Your Journey', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_five_title_tag',
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
	'layout_five_subtitle',
	[
		'label' => esc_html__('Subtitle', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Pricing Package', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your subtitle here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);



$this->add_control(
	'layout_five_show_tabs',
	[
		'label' => esc_html__('Show Monthly/Yearly Tabs', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Show', 'tekprof-toolkit'),
		'label_off' => esc_html__('Hide', 'tekprof-toolkit'),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);

$this->add_control(
	'layout_five_monthly_text',
	[
		'label' => esc_html__('Monthly Tab Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Monthly', 'tekprof-toolkit'),
		'condition' => [
			'layout_five_show_tabs' => 'yes',
		],
		'label_block' => true,
	]
);

$this->add_control(
	'layout_five_yearly_text',
	[
		'label' => esc_html__('Yearly Tab Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Yearly', 'tekprof-toolkit'),
		'condition' => [
			'layout_five_show_tabs' => 'yes',
		],
		'label_block' => true,
	]
);

// Pricing Items Repeater
$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'layout_five_is_popular',
	[
		'label' => esc_html__('Popular Package', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Yes', 'tekprof-toolkit'),
		'label_off' => esc_html__('No', 'tekprof-toolkit'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$repeater->add_control(
	'layout_five_popular_text',
	[
		'label' => esc_html__('Popular Badge Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('popular', 'tekprof-toolkit'),
		'label_block' => true,
		'condition' => [
			'layout_five_is_popular' => 'yes',
		],
	]
);

$repeater->add_control(
	'layout_five_package_title',
	[
		'label' => esc_html__('Package Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Starter Package', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_five_package_description',
	[
		'label' => esc_html__('Package Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_five_price',
	[
		'label' => esc_html__('Price', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('$5,000', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_five_duration',
	[
		'label' => esc_html__('Duration', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('/per month', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_five_included_text',
	[
		'label' => esc_html__('Included Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Included:', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$features_repeater = new \Elementor\Repeater();

$features_repeater->add_control(
	'layout_five_feature_text',
	[
		'label' => esc_html__('Feature', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Custom software development', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_five_features',
	[
		'label' => esc_html__('Features List', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $features_repeater->get_controls(),
		'default' => [
			[
				'layout_five_feature_text' => esc_html__('Custom software development', 'tekprof-toolkit'),
			],
			[
				'layout_five_feature_text' => esc_html__('Requirement analysis & planning', 'tekprof-toolkit'),
			],
			[
				'layout_five_feature_text' => esc_html__('Support and maintenance', 'tekprof-toolkit'),
			],
			[
				'layout_five_feature_text' => esc_html__('Integration third-party services', 'tekprof-toolkit'),
			],
			[
				'layout_five_feature_text' => esc_html__('Data backups and advanced', 'tekprof-toolkit'),
			],
			[
				'layout_five_feature_text' => esc_html__('Analytics and reporting features', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ layout_five_feature_text }}}',
	]
);

$repeater->add_control(
	'layout_five_button_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Choose Package', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$repeater->add_control(
	'layout_five_button_url',
	[
		'label' => esc_html__('Button URL', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'label_block' => true,
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);

$this->add_control(
	'layout_five_pricing_items',
	[
		'label' => esc_html__('Pricing Packages', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'layout_five_package_title' => esc_html__('Starter Package', 'tekprof-toolkit'),
				'layout_five_package_description' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
				'layout_five_price' => esc_html__('$5,000', 'tekprof-toolkit'),
				'layout_five_duration' => esc_html__('/per month', 'tekprof-toolkit'),
				'layout_five_is_popular' => 'no',
			],
			[
				'layout_five_package_title' => esc_html__('Enterprise Package', 'tekprof-toolkit'),
				'layout_five_package_description' => esc_html__('Large businesses and requirements', 'tekprof-toolkit'),
				'layout_five_price' => esc_html__('$30,000', 'tekprof-toolkit'),
				'layout_five_duration' => esc_html__('/per month', 'tekprof-toolkit'),
				'layout_five_is_popular' => 'yes',
			],
			[
				'layout_five_package_title' => esc_html__('Custom Package', 'tekprof-toolkit'),
				'layout_five_package_description' => esc_html__('Businesses with unique, large-scale', 'tekprof-toolkit'),
				'layout_five_price' => esc_html__('$75,000', 'tekprof-toolkit'),
				'layout_five_duration' => esc_html__('/per month', 'tekprof-toolkit'),
				'layout_five_is_popular' => 'no',
			],
		],
		'title_field' => '{{{ layout_five_package_title }}}',
	]
);

// Yearly Pricing Option

$yearly_repeater = new \Elementor\Repeater();

$yearly_repeater->add_control(
	'layout_five_yearly_is_popular',
	[
		'label' => esc_html__('Popular Package', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => esc_html__('Yes', 'tekprof-toolkit'),
		'label_off' => esc_html__('No', 'tekprof-toolkit'),
		'return_value' => 'yes',
		'default' => 'no',
	]
);

$yearly_repeater->add_control(
	'layout_five_yearly_popular_text',
	[
		'label' => esc_html__('Popular Badge Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('popular', 'tekprof-toolkit'),
		'condition' => [
			'layout_five_yearly_is_popular' => 'yes',
		],
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_five_yearly_package_title',
	[
		'label' => esc_html__('Package Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Starter Package', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_five_yearly_package_description',
	[
		'label' => esc_html__('Package Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_five_yearly_price',
	[
		'label' => esc_html__('Price', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('$50,000', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_five_yearly_duration',
	[
		'label' => esc_html__('Duration', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('/per year', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_five_yearly_included_text',
	[
		'label' => esc_html__('Included Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Included:', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_features_repeater = new \Elementor\Repeater();

$yearly_features_repeater->add_control(
	'layout_five_yearly_feature_text',
	[
		'label' => esc_html__('Feature', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Custom software development', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_five_yearly_features',
	[
		'label' => esc_html__('Features List', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $yearly_features_repeater->get_controls(),
		'default' => [
			[
				'layout_five_yearly_feature_text' => esc_html__('Custom software development', 'tekprof-toolkit'),
			],
			[
				'layout_five_yearly_feature_text' => esc_html__('Requirement analysis & planning', 'tekprof-toolkit'),
			],
			[
				'layout_five_yearly_feature_text' => esc_html__('Support and maintenance', 'tekprof-toolkit'),
			],
			[
				'layout_five_yearly_feature_text' => esc_html__('Integration third-party services', 'tekprof-toolkit'),
			],
			[
				'layout_five_yearly_feature_text' => esc_html__('Data backups and advanced', 'tekprof-toolkit'),
			],
			[
				'layout_five_yearly_feature_text' => esc_html__('Analytics and reporting features', 'tekprof-toolkit'),
			],
			[
				'layout_five_yearly_feature_text' => esc_html__('Priority support 24/7', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ layout_five_yearly_feature_text }}}',
	]
);

$yearly_repeater->add_control(
	'layout_five_yearly_button_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Choose Package', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$yearly_repeater->add_control(
	'layout_five_yearly_button_url',
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
	'layout_five_yearly_pricing_items',
	[
		'label' => esc_html__('Yearly Pricing Packages', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $yearly_repeater->get_controls(),
		'default' => [
			[
				'layout_five_yearly_package_title' => esc_html__('Starter Package', 'tekprof-toolkit'),
				'layout_five_yearly_package_description' => esc_html__('Small businesses and startups', 'tekprof-toolkit'),
				'layout_five_yearly_price' => esc_html__('$50,000', 'tekprof-toolkit'),
				'layout_five_yearly_duration' => esc_html__('/per year', 'tekprof-toolkit'),
				'layout_five_yearly_is_popular' => 'no',
			],
			[
				'layout_five_yearly_package_title' => esc_html__('Enterprise Package', 'tekprof-toolkit'),
				'layout_five_yearly_package_description' => esc_html__('Large businesses and requirements', 'tekprof-toolkit'),
				'layout_five_yearly_price' => esc_html__('$700,00', 'tekprof-toolkit'),
				'layout_five_yearly_duration' => esc_html__('/per year', 'tekprof-toolkit'),
				'layout_five_yearly_is_popular' => 'yes',
			],
			[
				'layout_five_yearly_package_title' => esc_html__('Custom Package', 'tekprof-toolkit'),
				'layout_five_yearly_package_description' => esc_html__('Businesses with unique, large-scale', 'tekprof-toolkit'),
				'layout_five_yearly_price' => esc_html__('$950,00', 'tekprof-toolkit'),
				'layout_five_yearly_duration' => esc_html__('/per year', 'tekprof-toolkit'),
				'layout_five_yearly_is_popular' => 'no',
			],
		],
		'title_field' => '{{{ layout_five_yearly_package_title }}}',
		'condition' => [
			'layout_five_show_tabs' => 'yes',
		],
	]
);


$this->end_controls_section();
