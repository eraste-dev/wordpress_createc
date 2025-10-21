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
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Tailored Security Services to Safeguard Your Business', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your title here', 'tekprof-toolkit'),
	]
);


$this->add_control(
	'layout_four_title_tag',
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
	'layout_four_subtitle',
	[
		'label' => esc_html__('Subtitle', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('What We Provide', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your subtitle here', 'tekprof-toolkit'),
	]
);



$this->add_control(
	'layout_four_description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Cybersecurity is the practice of protecting systems, networks, and data from malicious attacks, unauthorized access, an digital threats In today\'s interconnected world, businesses face.', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type your description here', 'tekprof-toolkit'),
	]
);

$layout_four_services = new \Elementor\Repeater();


$layout_four_services->add_control(
	'icon_class',
	[
		'label' => esc_html__('Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'flaticon-cloud-1',
			'library' => 'flaticon',
		],
	]
);

$layout_four_services->add_control(
	'icon_color',
	[
		'label' => esc_html__('Icon Color', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => 'yellow',
		'options' => [
			'yellow' => esc_html__('Yellow', 'tekprof-toolkit'),
			'skyblue' => esc_html__('Sky Blue', 'tekprof-toolkit'),
			'pink' => esc_html__('Pink', 'tekprof-toolkit'),
			'blue' => esc_html__('Blue', 'tekprof-toolkit'),
		],
	]
);

$layout_four_services->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Data Protection', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type service title here', 'tekprof-toolkit'),
	]
);

$layout_four_services->add_control(
	'description',
	[
		'label' => esc_html__('Description', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'default' => esc_html__('Data protection is the practice of safeguarding sensitive they information unauthorized', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type service description here', 'tekprof-toolkit'),
	]
);

$layout_four_services->add_control(
	'link',
	[
		'label' => esc_html__('Link', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::URL,
		'placeholder' => esc_html__('https://your-link.com', 'tekprof-toolkit'),
		'default' => [
			'url' => '#',
			'is_external' => false,
			'nofollow' => false,
		],
	]
);

$layout_four_services->add_control(
	'read_more_text',
	[
		'label' => esc_html__('Read More Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Read More', 'tekprof-toolkit'),
		'placeholder' => esc_html__('Type read more text here', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_four_services',
	[
		'label' => esc_html__('Services', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_four_services->get_controls(),
		'default' => [
			[
				'icon_class' => 'flaticon-cloud-1',
				'icon_color' => 'yellow',
				'title' => esc_html__('Data Protection', 'tekprof-toolkit'),
				'description' => esc_html__('Data protection is the practice of safeguarding sensitive they information unauthorized', 'tekprof-toolkit'),
				'read_more_text' => esc_html__('Read More', 'tekprof-toolkit'),
			],
			[
				'icon_class' => 'flaticon-cyber-security-1',
				'icon_color' => 'skyblue',
				'title' => esc_html__('Cyber Security', 'tekprof-toolkit'),
				'description' => esc_html__('Cybersecurity refers to the practice of protecting digital systems networks sensitive', 'tekprof-toolkit'),
				'read_more_text' => esc_html__('Read More', 'tekprof-toolkit'),
			],
			[
				'icon_class' => 'flaticon-cloud-computing',
				'icon_color' => 'pink',
				'title' => esc_html__('Cloud Services', 'tekprof-toolkit'),
				'description' => esc_html__('Cloud services refer delivery computing resource including storage, processing power', 'tekprof-toolkit'),
				'read_more_text' => esc_html__('Read More', 'tekprof-toolkit'),
			],
			[
				'icon_class' => 'flaticon-data',
				'icon_color' => 'blue',
				'title' => esc_html__('Data Storage', 'tekprof-toolkit'),
				'description' => esc_html__('Data Storage refers a process of saving digital information in a physical or virtual medium', 'tekprof-toolkit'),
				'read_more_text' => esc_html__('Read More', 'tekprof-toolkit'),
			],
		],
		'title_field' => '{{{ title }}}',
	]
);




$this->end_controls_section();
