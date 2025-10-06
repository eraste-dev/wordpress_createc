<?php

//content
$this->start_controls_section(
	'layout_one_section',
	[
		'label' => esc_html__('About One', 'tekprof-toolkit'),
		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition' => [
			'layout_type' => 'layout_one',
		]
	]
);

$this->add_control(
	'layout_one_sub_title',
	[
		'label' => esc_html__('Sub Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Why Choose Us', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your sub title here', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_one_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Solutions Beyond Technology – Success Beyond Boundaries', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'tekprof-toolkit'),
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
	'layout_one_summary_text',
	[
		'label' => esc_html__('Summary Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Trust us to be your partner in digital transformation, providing the technology and support.', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your summary text here', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_one_button_label',
	[
		'label' => esc_html__('Button Label', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Learn More About Us', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your button label here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_button_url',
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


// Feature Items Repeater
$feature_repeater = new \Elementor\Repeater();

$feature_repeater->add_control(
	'icon',
	[
		'label' => esc_html__('Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-experts',
			'library' => 'flaticon',
		],
	]
);

$feature_repeater->add_control(
	'feature_title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Dedicated Team', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type feature title here', 'tekprof-toolkit'),
		'label_block' => true
	]
);

$feature_repeater->add_control(
	'feature_url',
	[
		'label' => esc_html__('URL', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);

$feature_repeater->add_control(
	'feature_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('This allowing scale resources as needed while maintaining full control your project.', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type feature description here', 'tekprof-toolkit'),
	]
);

$this->add_control(
	'layout_one_feature_items',
	[
		'label' => esc_html__('Feature Items', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $feature_repeater->get_controls(),
		'default' => [
			[
				'icon' => [
					'value' => 'flaticon-experts',
					'library' => 'flaticon',
				],
				'feature_title' => esc_html__('Dedicated Team', 'tekprof-toolkit'),
				'feature_description' => esc_html__('This allowing scale resources as needed while maintaining full control your project.', 'tekprof-toolkit'),
			],
			[
				'icon' => [
					'value' => 'flaticon-loyal-customer',
					'library' => 'flaticon',
				],
				'feature_title' => esc_html__('Clients Satisfaction', 'tekprof-toolkit'),
				'feature_description' => esc_html__('From quality design and timely delivery post-project support focus is on building lasting', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ feature_title }}}',
	]
);



$this->add_control(
	'layout_one_image_one',
	[
		'label' => esc_html__('Image One', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_one_image_two',
	[
		'label' => esc_html__('Image Two', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_one_image_three',
	[
		'label' => esc_html__('Image Three', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'layout_one_image_four',
	[
		'label' => esc_html__('Image Four', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->end_controls_section();
