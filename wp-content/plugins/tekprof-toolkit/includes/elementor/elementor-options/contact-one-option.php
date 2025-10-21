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
	'layout_one_select_cf7_form',
	[
		'label' => esc_html__('Select your contact form 7', 'tekprof-addon'),
		'label_block' => true,
		'type' => \Elementor\Controls_Manager::SELECT,
		'options' => rt_select_post('wpcf7_contact_form'),
	]
);

// Form Section
$this->add_control(
	'layout_one_form_title',
	[
		'label' => esc_html__('Form Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Get In Touch With Us', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

// Info Section
$this->add_control(
	'layout_one_info_subtitle',
	[
		'label' => esc_html__('Info Subtitle', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Need Consultations ?', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_info_title',
	[
		'label' => esc_html__('Info Title', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Have A Project? We Would Love To Hear From You.', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

// Contact Info Items
$this->add_control(
	'layout_one_contact_info_heading',
	[
		'label' => esc_html__('Contact Information', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
	]
);

// Location
$this->add_control(
	'layout_one_location_label',
	[
		'label' => esc_html__('Location Label', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Location', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_location_text',
	[
		'label' => esc_html__('Location Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('55 Main Street, New York', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

// Email
$this->add_control(
	'layout_one_email_label',
	[
		'label' => esc_html__('Email Label', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Email Us', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_email_text',
	[
		'label' => esc_html__('Email Address', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('support@gmail.com', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

// Phone
$this->add_control(
	'layout_one_phone_label',
	[
		'label' => esc_html__('Phone Label', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('Hotline', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

$this->add_control(
	'layout_one_phone_text',
	[
		'label' => esc_html__('Phone Number', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('+000 (123) 456 88', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

// Form Settings
$this->add_control(
	'layout_one_form_settings',
	[
		'label' => esc_html__('Form Settings', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_one_button_text',
	[
		'label' => esc_html__('Button Text', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::TEXT,
		'default' => esc_html__('send message', 'tekprof-toolkit'),
		'label_block' => true,
	]
);

// Background Settings
$this->add_control(
	'layout_one_background_settings',
	[
		'label' => esc_html__('Background Settings', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::HEADING,
		'separator' => 'before',
	]
);

$this->add_control(
	'layout_one_background_image',
	[
		'label' => esc_html__('Background Image', 'tekprof-toolkit'),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'default' => [
			'url' => '',
		],
	]
);



$this->end_controls_section();
