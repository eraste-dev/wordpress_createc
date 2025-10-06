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
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => esc_html__('What Our Clients Say About Solutions', 'tekprof-toolkit'),
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
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add subtitle', 'tekprof-toolkit'),
		'default' => esc_html__('Our Testimonials', 'tekprof-toolkit'),
		'label_block' => true,
	]
);



$this->add_control(
	'layout_four_image',
	[
		'label' => esc_html__('Testimonial Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => \Elementor\Utils::get_placeholder_image_src(),
		],
		'description' => esc_html__('Upload testimonial section image', 'tekprof-toolkit'),
	]
);

$layout_four_testimonial = new \Elementor\Repeater();

$layout_four_testimonial->add_control(
	'title',
	[
		'label' => esc_html__('Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
		'default' => esc_html__('Excellent Works', 'tekprof-toolkit'),
	]
);

$layout_four_testimonial->add_control(
	'rating',
	[
		'label' => esc_html__('Rating', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::SELECT,
		'default' => '4.5',
		'options' => [
			'5' => esc_html__('5 Stars', 'tekprof-toolkit'),
			'4.5' => esc_html__('4.5 Stars', 'tekprof-toolkit'),
			'4' => esc_html__('4 Stars', 'tekprof-toolkit'),
			'3.5' => esc_html__('3.5 Stars', 'tekprof-toolkit'),
			'3' => esc_html__('3 Stars', 'tekprof-toolkit'),
			'2.5' => esc_html__('2.5 Stars', 'tekprof-toolkit'),
			'2' => esc_html__('2 Stars', 'tekprof-toolkit'),
			'1.5' => esc_html__('1.5 Stars', 'tekprof-toolkit'),
			'1' => esc_html__('1 Star', 'tekprof-toolkit'),
		],
	]
);

$layout_four_testimonial->add_control(
	'content',
	[
		'label' => esc_html__('Content', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXTAREA,
		'rows' => '3',
		'placeholder' => esc_html__('Add testimonial content', 'tekprof-toolkit'),
		'default' => esc_html__('Sed ut perspiciatis unde omnis iste natus voluptatem accus antiume dolorem queauy antium totam aperiam eaque quaey veritatis vitaec', 'tekprof-toolkit'),
	]
);

$layout_four_testimonial->add_control(
	'name',
	[
		'label' => esc_html__('Name', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add name', 'tekprof-toolkit'),
		'default' => esc_html__('Andrew D. Bricker', 'tekprof-toolkit'),
	]
);

$layout_four_testimonial->add_control(
	'designation',
	[
		'label' => esc_html__('Designation', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'placeholder' => esc_html__('Add designation', 'tekprof-toolkit'),
		'default' => esc_html__('CEO & Founder', 'tekprof-toolkit'),
	]
);

$layout_four_testimonial->add_control(
	'icon',
	[
		'label' => esc_html__('Quote Icon', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::ICONS,
		'default' => [
			'value' => 'fal fa-quote-right',
			'library' => 'font-awesome',
		],
	]
);

$this->add_control(
	'layout_four_testimonials',
	[
		'label' => esc_html__('Testimonials', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $layout_four_testimonial->get_controls(),
		'default' => [
			[
				'title' => esc_html__('Excellent Works', 'tekprof-toolkit'),
				'content' => esc_html__('Sed ut perspiciatis unde omnis iste natus voluptatem accus antiume dolorem queauy antium totam aperiam eaque quaey veritatis vitaec', 'tekprof-toolkit'),
				'name' => esc_html__('Andrew D. Bricker', 'tekprof-toolkit'),
				'designation' => esc_html__('CEO & Founder', 'tekprof-toolkit'),
				'rating' => '4.5',
			],
			[
				'title' => esc_html__('Excellent Works', 'tekprof-toolkit'),
				'content' => esc_html__('On the other hand denounce righteous indignations and dislike men who beguiled and demoralized by the charms of pleasure moment blinded foresee', 'tekprof-toolkit'),
				'name' => esc_html__('Jose T. McMichael', 'tekprof-toolkit'),
				'designation' => esc_html__('Senior Manager', 'tekprof-toolkit'),
				'rating' => '4.5',
			],
		],
		'title_field' => '{{{ name }}}',
	]
);


$this->end_controls_section();
