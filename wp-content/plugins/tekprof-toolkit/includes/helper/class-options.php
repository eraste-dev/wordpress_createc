<?php

namespace TekprofToolkit\Helper;

use TekprofTheme\Admin\Tekprof_Admin_Panel;
use TekprofTheme\Classes\Tekprof_Helper;
use CSF;

defined('ABSPATH') || exit;

class Tekprof_Options
{

	protected static $instance = null;

	private $options_prefix = 'tekprof_options';
	private $menu_slug = 'tekprof_options';
	private $template_builder_url;

	public static function instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct()
	{
		if (! class_exists('CSF')) {
			return;
		}

		$this->template_builder_url = admin_url('edit.php?post_type=tekprof_template');

		$this->theme_options();
		$this->general_section();
		$this->header_section();
		$this->footer_section();
		$this->page_title_section();
		$this->blog_section();
		//$this->portfolio_section();
		$this->shop_section();
		$this->color_scheme_section();
		$this->typography_section();
		$this->error_section();
		$this->mailchimp_section();
		$this->maintenance_section();
		$this->custom_scrips_section();
		$this->backup_section();

		add_filter('csf_options_before', [$this, 'add_dashboard_banner']);
		add_filter('csf_color_palette', [$this, 'update_color_palette']);
		add_action('csf_tekprof_options_save_after', [$this, 'after_saved']);
	}

	public function theme_options()
	{
		CSF::createOptions($this->options_prefix, [
			'menu_title'         => esc_html__('Theme Options', 'tekprof-toolkit'),
			'menu_slug'          => $this->menu_slug,
			'framework_title'    => esc_html__('Theme Options', 'tekprof-toolkit'),
			'show_in_customizer' => true,
			'menu_type'          => 'submenu',
			'menu_parent'        => 'tekprof_dashboard',
			'show_bar_menu'      => false,
			'ajax_save'          => false,
			'footer_text'        => ''
		]);
	}

	public function general_section()
	{
		CSF::createSection($this->options_prefix, [
			'id'    => 'general_options',
			'title' => esc_html__('General', 'tekprof-toolkit'),
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'general_options',
			'title'  => esc_html__('Layout', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Layout', 'tekprof-toolkit'),
				],
				[
					'id'       => 'site_layout',
					'type'     => 'select',
					'title'    => esc_html__('Layout', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Set the website layout.', 'tekprof-toolkit'),
					'options'  => [
						'full-width' => esc_html__('Full Width', 'tekprof-toolkit'),
						'boxed'      => esc_html__('Boxed', 'tekprof-toolkit'),
					],
					'default'  => 'full-width',
				],
				[
					'id'         => 'boxed_width',
					'type'       => 'dimensions',
					'title'      => esc_html__('Boxed Container Width.', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('Set the boxed outer container width.', 'tekprof-toolkit'),
					'default'    => [
						'width' => '1530',
						'unit'  => 'px',
					],
					'height'     => false,
					'units'      => ['px'],
					'dependency' => ['site_layout', '==', 'boxed'],
				],
				[
					'id'         => 'boxed_container_color',
					'type'       => 'background',
					'title'      => esc_html__('Boxed Background Color', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('Set the boxed inner container background color.', 'tekprof-toolkit'),
					'output'     => '.tekprof-boxed-layout .tekprof-body-content',
					'dependency' => ['site_layout', '==', 'boxed'],
				],
				[
					'id'       => 'body_bg',
					'type'     => 'background',
					'title'    => esc_html__('Body Background', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Set the <body> background.', 'tekprof-toolkit'),
					'output'   => 'body',
				],
				[
					'id'       => 'site_border',
					'type'     => 'switcher',
					'title'    => esc_html__('Site Border', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Set a colored border around the website.', 'tekprof-toolkit'),
					'default'  => false,
				],
				[
					'id'          => 'site_border_color',
					'type'        => 'color',
					'title'       => esc_html__('Site Border Color', 'tekprof-toolkit'),
					'subtitle'    => esc_html__('Set the site border color.', 'tekprof-toolkit'),
					'output'      => '.bordered-x',
					'output_mode' => 'border-color',
					'dependency'  => ['site_border', '==', true],
				],
				[
					'id'          => 'site_border_width',
					'type'        => 'number',
					'title'       => esc_html__('Site Border Width.', 'tekprof-toolkit'),
					'subtitle'    => esc_html__('Set the site border width.', 'tekprof-toolkit'),
					'unit'        => 'px',
					'output'      => '.bordered-x',
					'output_mode' => 'border-width',
					'dependency'  => ['site_border', '==', true],
				],
			],
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'general_options',
			'title'  => esc_html__('Preloader', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Preloader', 'tekprof-toolkit'),
				],
				[
					'id'       => 'site_preloader',
					'type'     => 'button_set',
					'title'    => esc_html__('Site Preloader', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable site Preloader', 'tekprof-toolkit'),
					'options'  => [
						'enabled'  => esc_html__('Enabled', 'tekprof-toolkit'),
						'Disabled' => esc_html__('Disabled', 'tekprof-toolkit'),
					],
					'default'  => 'enabled',
				],
				[
					'type'       => 'subheading',
					'content'    => esc_html__('Preloader Styling', 'tekprof-toolkit'),
					'dependency' => ['site_preloader', '==', 'enabled'],
				],
				[
					'id'          => 'preloader_background',
					'type'        => 'color',
					'title'       => esc_html__('Background Color', 'tekprof-toolkit'),
					'subtitle'    => esc_html__('Preloader background color', 'tekprof-toolkit'),
					'output'      => '.preloader',
					'output_mode' => 'background-color',
					'dependency'  => ['site_preloader', '==', 'enabled'],
				],
				[
					'id'          => 'spinner_base_color',
					'type'        => 'color',
					'title'       => esc_html__('Spinner Base Color', 'tekprof-toolkit'),
					'subtitle'    => esc_html__('Preloader spinner base color', 'tekprof-toolkit'),
					'output'      => '.preloader .custom-loader',
					'output_mode' => 'border-color',
					'dependency'  => ['site_preloader', '==', 'enabled'],
				],
				[
					'id'          => 'spinner_line_top_color',
					'type'        => 'color',
					'title'       => esc_html__('Spinner Line Top Color', 'tekprof-toolkit'),
					'subtitle'    => esc_html__('Preloader spinner line color', 'tekprof-toolkit'),
					'output'      => '.preloader .custom-loader',
					'output_mode' => 'border-top-color',
					'dependency'  => ['site_preloader', '==', 'enabled'],
				],
				[
					'id'          => 'spinner_line_bottom_color',
					'type'        => 'color',
					'title'       => esc_html__('Spinner Line Bottom Color', 'tekprof-toolkit'),
					'subtitle'    => esc_html__('Preloader spinner line color', 'tekprof-toolkit'),
					'output'      => '.preloader .custom-loader',
					'output_mode' => 'border-bottom-color',
					'dependency'  => ['site_preloader', '==', 'enabled'],
				],
			],
		]);

		// CSF::createSection($this->options_prefix, [
		// 	'parent' => 'general_options',
		// 	'title'  => esc_html__('Back to Top', 'tekprof-toolkit'),
		// 	'fields' => [
		// 		[
		// 			'type'    => 'heading',
		// 			'content' => esc_html__('Back to Top', 'tekprof-toolkit'),
		// 		],
		// 		[
		// 			'id'       => 'back_to_top',
		// 			'type'     => 'button_set',
		// 			'title'    => esc_html__('Back to Top', 'tekprof-toolkit'),
		// 			'subtitle' => esc_html__('Add a back to top button on bottom right corner.', 'tekprof-toolkit'),
		// 			'options'  => [
		// 				'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
		// 				'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
		// 			],
		// 			'default'  => 'enabled',
		// 		],
		// 		[
		// 			'id'         => 'back_to_top_mobile',
		// 			'type'       => 'switcher',
		// 			'title'      => esc_html__('Show on Mobile', 'tekprof-toolkit'),
		// 			'subtitle'   => esc_html__('Show the back to top button on mobile devices..', 'tekprof-toolkit'),
		// 			'default'    => true,
		// 			'dependency' => ['back_to_top', '==', 'enabled'],
		// 		],
		// 		[
		// 			'id'          => 'back_to_top_color',
		// 			'type'        => 'color',
		// 			'title'       => esc_html__('Icon Color', 'tekprof-toolkit'),
		// 			'subtitle'    => esc_html__('Back to Top icon color', 'tekprof-toolkit'),
		// 			'output'      => '.back-to-top',
		// 			'output_mode' => 'color',
		// 			'dependency'  => ['back_to_top', '==', 'enabled'],
		// 		],
		// 		[
		// 			'id'          => 'back_to_top_bg',
		// 			'type'        => 'color',
		// 			'title'       => esc_html__('Background', 'tekprof-toolkit'),
		// 			'subtitle'    => esc_html__('Back to Top icon background color', 'tekprof-toolkit'),
		// 			'output'      => '.back-to-top',
		// 			'output_mode' => 'background-color',
		// 			'dependency'  => ['back_to_top', '==', 'enabled'],
		// 		],
		// 		[
		// 			'id'          => 'back_top_hover_color',
		// 			'type'        => 'color',
		// 			'title'       => esc_html__('Hover Color', 'tekprof-toolkit'),
		// 			'subtitle'    => esc_html__('Back to Top icon hover color', 'tekprof-toolkit'),
		// 			'output'      => '.back-to-top:hover',
		// 			'output_mode' => 'color',
		// 			'dependency'  => ['back_to_top', '==', 'enabled'],
		// 		],
		// 		[
		// 			'id'          => 'back_top_hover_bg',
		// 			'type'        => 'color',
		// 			'title'       => esc_html__('Hover Background', 'tekprof-toolkit'),
		// 			'subtitle'    => esc_html__('Back to Top icon hover background color', 'tekprof-toolkit'),
		// 			'output'      => '.back-to-top:hover',
		// 			'output_mode' => 'background-color',
		// 			'dependency'  => ['back_to_top', '==', 'enabled'],
		// 		],
		// 	],
		// ]);
	}

	public function header_section()
	{
		CSF::createSection($this->options_prefix, [
			'id'    => 'header_options',
			'title' => esc_html__('Header', 'tekprof-toolkit'),
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'header_options',
			'title'  => esc_html__('General', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('General', 'tekprof-toolkit'),
				],
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for site header then disable default theme header', 'tekprof-toolkit'),
				],
				[
					'id'       => 'default_header',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Header', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Theme default header', 'tekprof-toolkit'),
					'options'  => [
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'  => 'enabled',
				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default theme header. Set your site header form ', 'tekprof-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'tekprof-toolkit') . '</a>',
					'dependency' => [
						'default_header',
						'==',
						'disabled',
					],
				],
				[
					'id'         => 'header_button',
					'type'       => 'button_set',
					'title'      => esc_html__('Show Header Button', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('Show a button to header right side', 'tekprof-toolkit'),
					'options'    => [
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'    => 'enabled',
					'dependency' => [
						'default_header',
						'==',
						'enabled',
					],
				],
				[
					'id'         => 'button_text',
					'title'      => esc_html__('Button Text', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('Text for Header Button.', 'tekprof-toolkit'),
					'type'       => 'text',
					'default'    => esc_html__('Get a Quote', 'tekprof-toolkit'),
					'dependency' => [
						['default_header', '==', 'enabled'],
						['header_button', '==', 'enabled'],
					],
				],
				[
					'id'         => 'button_url',
					'title'      => esc_html__('Button URL', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('URL for Header Button.', 'tekprof-toolkit'),
					'type'       => 'text',
					'default'    => '#',
					'dependency' => [
						['default_header', '==', 'enabled'],
						['header_button', '==', 'enabled'],
					],
				],
			],
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'header_options',
			'title'  => esc_html__('Logo', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Header Logo', 'tekprof-toolkit'),
				],
				[
					'id'       => 'site_logo_type',
					'type'     => 'button_set',
					'title'    => esc_html__('Site Logo Type', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Select site logo type', 'tekprof-toolkit'),
					'options'  => [
						'text'  => esc_html__('Text', 'tekprof-toolkit'),
						'image' => esc_html__('Image', 'tekprof-toolkit'),
					],
					'default'  => 'image',
				],
				[
					'id'         => 'site_text_logo',
					'type'       => 'text',
					'title'      => esc_html__('Text logo', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('Type logo text', 'tekprof-toolkit'),
					'default'    => esc_html__('tekprof', 'tekprof-toolkit'),
					'dependency' => ['site_logo_type', '==', 'text'],
				],
				[
					'id'           => 'site_image_logo',
					'type'         => 'media',
					'title'        => esc_html__('Image logo', 'tekprof-toolkit'),
					'subtitle'     => esc_html__('Upload OR Select image for site logo', 'tekprof-toolkit'),
					'library'      => 'image',
					'url'          => false,
					'default'      => [
						'url'       => RT_THEME_ASSETS . '/img/logo.png',
						'thumbnail' => RT_THEME_ASSETS . '/img/logo.png',
					],
					'preview_size' => 'full',
					'dependency'   => ['site_logo_type', '==', 'image'],
				],
				[
					'id'         => 'logo_dimension',
					'type'       => 'dimensions',
					'title'      => esc_html__('Logo Dimensions', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('Site logo Dimensions', 'tekprof-toolkit'),
					'output'     => '.default-header .tekprof-site-logo img',
					'dependency' => ['site_logo_type', '==', 'image'],
				],
				[
					'id'          => 'logo_max_width',
					'type'        => 'number',
					'unit'        => 'px',
					'title'       => esc_html__('Max Width', 'tekprof-toolkit'),
					'subtitle'    => esc_html__('Logo wrapper max width', 'tekprof-toolkit'),
					'output'      => '.default-header .tekprof-site-logo',
					'output_mode' => 'max-width',
				],
				[
					'type'    => 'subheading',
					'content' => esc_html__('Mobile Panel Logo', 'tekprof-toolkit'),
				],
				[
					'id'       => 'panel_logo_type',
					'type'     => 'button_set',
					'title'    => esc_html__('Panel Logo Type', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Select Logo type', 'tekprof-toolkit'),
					'options'  => [
						'text'  => esc_html__('Text', 'tekprof-toolkit'),
						'image' => esc_html__('Image', 'tekprof-toolkit'),
					],
					'default'  => 'image',
				],
				[
					'id'         => 'panel_text_logo',
					'type'       => 'text',
					'title'      => esc_html__('Text logo', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('Type logo text', 'tekprof-toolkit'),
					'default'    => 'tekprof',
					'dependency' => ['panel_logo_type', '==', 'text'],
				],
				[
					'id'           => 'panel_image_logo',
					'type'         => 'media',
					'title'        => esc_html__('Image logo', 'tekprof-toolkit'),
					'subtitle'     => esc_html__('Select OR Upload image', 'tekprof-toolkit'),
					'library'      => 'image',
					'url'          => false,
					'default'      => [
						'url'       => RT_THEME_ASSETS . '/img/logo.png',
						'thumbnail' => RT_THEME_ASSETS . '/img/logo.png',
					],
					'preview_size' => 'full',
					'dependency'   => ['panel_logo_type', '==', 'image'],
				],
				[
					'id'         => 'slide_panel_dimension',
					'type'       => 'dimensions',
					'title'      => esc_html__('Logo Dimensions', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('Image logo Dimensions', 'tekprof-toolkit'),
					'output'     => '.default-header .slide-panel-logo img',
					'dependency' => ['panel_logo_type', '==', 'image'],
				],
				[
					'id'          => 'panel_logo_max_width',
					'type'        => 'number',
					'unit'        => 'px',
					'title'       => esc_html__('Max Width', 'tekprof-toolkit'),
					'subtitle'    => esc_html__('Logo wrapper max width', 'tekprof-toolkit'),
					'output'      => '.tekprof-nav-menu .slide-panel-wrapper .slide-panel-logo',
					'output_mode' => 'max-width',
				],
			],
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'header_options',
			'title'  => esc_html__('Styling', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Header Styling', 'tekprof-toolkit'),
				],
				[
					'id'               => 'header_bg',
					'type'             => 'color',
					'title'            => esc_html__('Header Background', 'tekprof-toolkit'),
					'output'           => ['.main-header.menu-absolute .header-upper'],
					'output_mode'      => 'background-color',
					'output_important' => true,
				],
				[
					'type'    => 'subheading',
					'content' => esc_html__('Menu Items', 'tekprof-toolkit'),
				],
				[
					'id'          => 'menu_item_color',
					'type'        => 'color',
					'title'       => esc_html__('Menu Item Color', 'tekprof-toolkit'),
					'desc'        => esc_html__('This is the menu item font color.', 'tekprof-toolkit'),
					'output'      => ['.main-header.white-menu .navbar-collapse > ul > li > a'],
					'output_mode' => 'color',
				],
				[
					'id'          => 'menu_item_hover_color',
					'type'        => 'color',
					'title'       => esc_html__('Active/Hover Color', 'tekprof-toolkit'),
					'desc'        => esc_html__('This is the menu item font color.', 'tekprof-toolkit'),
					'output'      => ['.main-header.white-menu .navbar-collapse > ul > li > a:hover'],
					'output_mode' => 'color',
				],
				[
					'id'     => 'menu_typography',
					'type'   => 'typography',
					'title'  => esc_html__('Menu Typography', 'tekprof-toolkit'),
					'color'  => false,
					'output' => '.default-header .nav-menu-wrapper .menu-item-link',
				],
				[
					'type'    => 'subheading',
					'content' => esc_html__('Submenu', 'tekprof-toolkit'),
				],
				[
					'id'          => 'submenu_bg',
					'type'        => 'color',
					'title'       => esc_html__('Submenu Background', 'tekprof-toolkit'),
					'output'      => '.main-menu .navbar-collapse li ul',
					'output_mode' => 'background-color',
				],
				[
					'id'          => 'submenu_item_divider',
					'type'        => 'color',
					'title'       => esc_html__('Item Divider', 'tekprof-toolkit'),
					'output'      => '.main-menu .navbar-collapse li li',
					'output_mode' => 'border-color',
				],
				[
					'id'          => 'submenu_item_color',
					'type'        => 'color',
					'title'       => esc_html__('Item Color', 'tekprof-toolkit'),
					'output'      => '.main-menu .navbar-collapse li li a',
					'output_mode' => 'color',
				],
				[
					'id'          => 'submenu_item_hover_color',
					'type'        => 'color',
					'title'       => esc_html__('Item Hover Color', 'tekprof-toolkit'),
					'output'      => '.main-menu .navbar-collapse li li a:hover',
					'output_mode' => 'color',
				],
				[
					'id'     => 'submenu_typography',
					'type'   => 'typography',
					'title'  => esc_html__('Item Typography', 'tekprof-toolkit'),
					'color'  => false,
					'output' => '.main-menu .navbar-collapse li li a',
				],
			],
		]);
	}

	public function footer_section()
	{
		CSF::createSection($this->options_prefix, [
			'id'    => 'footer_options',
			'title' => esc_html__('Footer', 'tekprof-toolkit'),
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'footer_options',
			'title'  => esc_html__('General', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('General', 'tekprof-toolkit'),
				],
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for site footer then disable default theme header', 'tekprof-toolkit'),
				],
				[
					'id'       => 'default_footer',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Footer', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Theme default footer', 'tekprof-toolkit'),
					'options'  => [
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'  => 'enabled',
				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default theme footer. Set your site footer form ', 'tekprof-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'tekprof-toolkit') . '</a>',
					'dependency' => [
						'default_footer',
						'==',
						'disabled',
					],
				],
			],
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'footer_options',
			'title'  => esc_html__('Footer Copyright', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Footer', 'tekprof-toolkit'),
				],
				[
					'id'      => 'copyright_text',
					'type'    => 'textarea',
					'title'   => esc_html__('Copyright Text', 'tekprof-toolkit'),
					'default' => esc_html__('Copyright © 2025. All rights reserved.', 'tekprof-toolkit'),
				],
				[
					'type'    => 'subheading',
					'content' => esc_html__('Style', 'tekprof-toolkit'),
				],
				[
					'id'          => 'copyright_color_bg',
					'type'        => 'color',
					'title'       => esc_html__('Copyright Background', 'tekprof-toolkit'),
					'output'      => '.tekprof-site-footer.default-footer',
					'output_mode' => 'background-color',
				],
				[
					'id'     => 'copyright_color',
					'type'   => 'color',
					'title'  => esc_html__('Copyright text color', 'tekprof-toolkit'),
					'output' => '.tekprof-site-footer .footer-copyright, .tekprof-site-footer .footer-copyright a',
				],
			],
		]);
	}

	public function page_title_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Page Title', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Page Title', 'tekprof-toolkit'),
				],
				[
					'id'      => 'site_page_title',
					'type'    => 'button_set',
					'title'   => esc_html__('Site Page Title', 'tekprof-toolkit'),
					'options' => [
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default' => 'enabled',
				],
				[
					'id'         => 'site_breadcrumb',
					'type'       => 'button_set',
					'title'      => esc_html__('Site Breadcrumb', 'tekprof-toolkit'),
					'options'    => [
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'    => 'enabled',
					'dependency' => ['site_page_title', '==', 'enabled'],
				],
				[
					'type'       => 'subheading',
					'content'    => esc_html__('Banner Content', 'tekprof-toolkit'),
					'dependency' => ['site_page_title', '==', 'enabled'],
				],
				[
					'id'         => 'breadcrumb_image',
					'type'       => 'media',
					'title'      => esc_html__('Breadcrumb Image', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('Upload Breadcrumb Image', 'tekprof-toolkit'),
					'library'    => 'image',
				],
				[
					'type'       => 'subheading',
					'content'    => esc_html__('Page Title Styling', 'tekprof-toolkit'),
					'dependency' => ['site_page_title', '==', 'enabled'],
				],
				[
					'id'         => 'page_title_bg',
					'type'       => 'background',
					'title'      => esc_html__('Background', 'tekprof-toolkit'),
					'output'     => '.page-title',
					'dependency' => ['site_page_title', '==', 'enabled'],
				],
				[
					'id'         => 'page_title_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Typography', 'tekprof-toolkit'),
					'output'     => '.page-title',
					'dependency' => ['site_page_title', '==', 'enabled'],
				],
				[
					'id'               => 'page_breadcrumb_typo',
					'type'             => 'typography',
					'line_height_unit' => 'em',
					'title'            => esc_html__('Breadcrumb Typography', 'tekprof-toolkit'),
					'output'           => '.tekprof-breadcrumb, .tekprof-breadcrumb a, .tekprof-breadcrumb span',
					'dependency'       => ['site_page_title', '==', 'enabled'],
				],
			],
		]);
	}

	public function blog_section()
	{
		CSF::createSection($this->options_prefix, [
			'id'    => 'blog_options',
			'title' => esc_html__('Blog', 'tekprof-toolkit'),
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'blog_options',
			'title'  => esc_html__('Blog Archive', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Blog Archive', 'tekprof-toolkit'),
				],
				[
					'id'          => 'blog_archive_title',
					'type'        => 'text',
					'title'       => esc_html__('Blog Archive Title', 'tekprof-toolkit'),
					'subtitle'    => esc_html__('Archive page title.', 'tekprof-toolkit'),
					'placeholder' => esc_html__('Type title', 'tekprof-toolkit'),
					'default'     => esc_html__('Latest News', 'tekprof-toolkit'),
				],
				[
					'id'       => 'blog_archive_sidebar',
					'type'     => 'select',
					'title'    => esc_html__('Sidebar', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Select Blog Archive Sidebar. Left sidebar or right sidebar or No sidebar', 'tekprof-toolkit'),
					'options'  => [
						'left-sidebar'  => esc_html__('Left Sidebar', 'tekprof-toolkit'),
						'right-sidebar' => esc_html__('Right Sidebar', 'tekprof-toolkit'),
						'no-sidebar'    => esc_html__('No Sidebar', 'tekprof-toolkit'),
					],
					'default'  => 'right-sidebar',
				],
				[
					'id'       => 'archive_post_category',
					'type'     => 'button_set',
					'title'    => esc_html__('Post Categories', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post categories on blog archive page', 'tekprof-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'tekprof-toolkit'),
						'no'  => esc_html__('No', 'tekprof-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'       => 'archive_post_meta',
					'type'     => 'button_set',
					'title'    => esc_html__('Post Meta', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post meta on blog archive page', 'tekprof-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'tekprof-toolkit'),
						'no'  => esc_html__('No', 'tekprof-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'         => 'archive_meta_items',
					'type'       => 'sorter',
					'title'      => esc_html__('Meta Items', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('Select ', 'tekprof-toolkit'),
					'default'    => [
						'enabled'  => [
							'author'   => esc_html__('Author', 'tekprof-toolkit'),
							'date'     => esc_html__('Date', 'tekprof-toolkit'),
							'comments' => esc_html__('Comments', 'tekprof-toolkit'),
						],
						'disabled' => [],
					],
					'dependency' => [
						'archive_post_meta',
						'==',
						'yes',
					],
				],
				[
					'id'       => 'archive_post_excerpt',
					'type'     => 'button_set',
					'title'    => esc_html__('Post Excerpt', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Post Excerpt on Blog Archive page', 'tekprof-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'tekprof-toolkit'),
						'no'  => esc_html__('No', 'tekprof-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'         => 'archive_excerpt_count',
					'type'       => 'number',
					'title'      => esc_html__('Excerpt Word Count', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('Set how many words you want to show in the post Excerpt', 'tekprof-toolkit'),
					'default'    => 30,
					'dependency' => [
						'archive_post_excerpt',
						'==',
						'yes',
					],
				],
				[
					'id'       => 'archive_post_button',
					'type'     => 'button_set',
					'title'    => esc_html__('Read More Button', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Post Read More Button on Blog Archive page', 'tekprof-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'tekprof-toolkit'),
						'no'  => esc_html__('No', 'tekprof-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'         => 'post_button_text',
					'type'       => 'text',
					'title'      => esc_html__('Button Text', 'tekprof-toolkit'),
					'default'    => esc_html__('Read More', 'tekprof-toolkit'),
					'dependency' => [
						'archive_post_button',
						'==',
						'yes',
					],
				],
			],
		]);

		CSF::createSection($this->options_prefix, [
			'parent' => 'blog_options',
			'title'  => esc_html__('Blog Single', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Blog single', 'tekprof-toolkit'),
				],
				[
					'id'      => 'blog_details_sidebar',
					'type'    => 'select',
					'title'   => esc_html__('Sidebar', 'tekprof-toolkit'),
					'options' => [
						'left-sidebar'  => esc_html__('Left Sidebar', 'tekprof-toolkit'),
						'right-sidebar' => esc_html__('Right Sidebar', 'tekprof-toolkit'),
						'no-sidebar'    => esc_html__('No Sidebar', 'tekprof-toolkit'),
					],
					'default' => 'right-sidebar',
					'desc'    => esc_html__('Select Blog Details Sidebar. Left sidebar or right sidebar or No sidebar', 'tekprof-toolkit'),
				],
				[
					'id'       => 'blog_details_category',
					'type'     => 'button_set',
					'title'    => esc_html__('Post Categories', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post categories on blog single page', 'tekprof-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'tekprof-toolkit'),
						'no'  => esc_html__('No', 'tekprof-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'       => 'blog_details_share',
					'type'     => 'button_set',
					'title'    => esc_html__('Show Post Share Links', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Post social share links.', 'tekprof-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'tekprof-toolkit'),
						'no'  => esc_html__('No', 'tekprof-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'         => 'social_share_item',
					'type'       => 'sorter',
					'title'      => esc_html__('Social Share Links', 'tekprof-toolkit'),
					'default'    => [
						'enabled'  => [
							'facebook'  => esc_html__('Facebook', 'tekprof-toolkit'),
							'twitter'   => esc_html__('Twitter', 'tekprof-toolkit'),
							'pinterest' => esc_html__('Pinterest', 'tekprof-toolkit'),
							'linkedin'  => esc_html__('Linkedin', 'tekprof-toolkit'),
						],
						'disabled' => [
							'reddit'   => esc_html__('Reddit', 'tekprof-toolkit'),
							'whatsapp' => esc_html__('Whatsapp', 'tekprof-toolkit'),
							'telegram' => esc_html__('Telegram', 'tekprof-toolkit'),
						],
					],
					'dependency' => [
						'blog_details_share',
						'==',
						'yes',
					],
				],
				[
					'id'       => 'blog_details_tag',
					'type'     => 'button_set',
					'title'    => esc_html__('Related Tags', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable related tag on Blog Details page', 'tekprof-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'tekprof-toolkit'),
						'no'  => esc_html__('No', 'tekprof-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'       => 'blog_details_nav',
					'type'     => 'button_set',
					'title'    => esc_html__('Post Navigation', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Post navigation on Blog Details page', 'tekprof-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'tekprof-toolkit'),
						'no'  => esc_html__('No', 'tekprof-toolkit'),
					],
					'default'  => 'yes',
				],
				[
					'id'       => 'blog_author_info',
					'type'     => 'button_set',
					'title'    => esc_html__('Post Author', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Post author information box.', 'tekprof-toolkit'),
					'options'  => [
						'yes' => esc_html__('Yes', 'tekprof-toolkit'),
						'no'  => esc_html__('No', 'tekprof-toolkit'),
					],
					'default'  => 'no',
				],
			],
		]);
	}

	public function portfolio_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Portfolio', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Portfolio', 'tekprof-toolkit'),
				],
				[
					'id'          => 'portfolio_slug',
					'type'        => 'text',
					'title'       => esc_html__('Portfolio Slug', 'tekprof-toolkit'),
					'placeholder' => esc_html__('portfolio', 'tekprof-toolkit'),
					'desc'        => esc_html__('You can customize the permalink structure (site_domain/post_type_slug/post_slug) by changing the post type slug (post_type_slug) from here. Don\'t forget to save the permalinks settings from Settings > Permalinks after changing the slug value.', 'tekprof-toolkit'),
				],
				[
					'id'       => 'portfolio_post_per_page',
					'type'     => 'number',
					'title'    => esc_html__('Post Per Page', 'tekprof-toolkit'),
					'default'  => 9,
					'subtitle' => esc_html__('Number of posts to show per page', 'tekprof-toolkit'),
				],
				[
					'type'    => 'subheading',
					'content' => esc_html__('Portfolio Archive', 'tekprof-toolkit'),
				],
				[
					'id'       => 'archive_page_title',
					'type'     => 'text',
					'title'    => esc_html__('Page Title', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Archive Page Title', 'tekprof-toolkit'),
					'default'  => esc_html__('Our Portfolio', 'tekprof-toolkit'),
				],
				[
					'id'      => 'archive_portfolio_design',
					'type'    => 'select',
					'title'   => esc_html__('Portfolio Design', 'tekprof-toolkit'),
					'options' => [
						'design-one'   => esc_html__('Design One', 'tekprof-toolkit'),
						'design-two'   => esc_html__('Design Two', 'tekprof-toolkit'),
						'design-three' => esc_html__('Design Three', 'tekprof-toolkit'),
						'design-four'  => esc_html__('Design Four', 'tekprof-toolkit'),
					],
					'default' => 'design-one'
				]
			],
		]);
	}

	public function shop_section()
	{
		CSF::createSection($this->options_prefix, [
			'id'     => 'shop_options',
			'title'  => esc_html__('Shop', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Shop', 'tekprof-toolkit'),
				],
				[
					'id'      => 'product_loop_columns',
					'type'    => 'button_set',
					'title'   => esc_html__('Columns', 'tekprof-toolkit'),
					'options' => [
						'1' => esc_html__('One', 'tekprof-toolkit'),
						'2' => esc_html__('Two', 'tekprof-toolkit'),
						'3' => esc_html__('Three', 'tekprof-toolkit'),
						'4' => esc_html__('Four', 'tekprof-toolkit'),
						'5' => esc_html__('Five', 'tekprof-toolkit'),
						'6' => esc_html__('Six', 'tekprof-toolkit'),
					],
					'default' => '4',
					'desc'    => esc_html__('How many column should be shown per row?', 'tekprof-toolkit'),
				],
				[
					'id'      => 'product_loop_per_page',
					'type'    => 'number',
					'title'   => esc_html__('Product Per page', 'tekprof-toolkit'),
					'default' => 12,
					'desc'    => esc_html__('How many products should be shown per page?', 'tekprof-toolkit'),
				],
				[
					'type'    => 'subheading',
					'content' => esc_html__('Related Product', 'tekprof-toolkit'),
				],
				[
					'id'      => 'enable_related_product',
					'type'    => 'switcher',
					'title'   => esc_html__('Related Product', 'tekprof-toolkit'),
					'default' => true,
				],

				[
					'id'      => 'related_product_columns',
					'type'    => 'button_set',
					'title'   => esc_html__('Columns', 'tekprof-toolkit'),
					'options' => [
						'1' => esc_html__('One', 'tekprof-toolkit'),
						'2' => esc_html__('Two', 'tekprof-toolkit'),
						'3' => esc_html__('Three', 'tekprof-toolkit'),
						'4' => esc_html__('Four', 'tekprof-toolkit'),
						'5' => esc_html__('Five', 'tekprof-toolkit'),
						'6' => esc_html__('Six', 'tekprof-toolkit'),
					],
					'default' => '4',
					'desc'    => esc_html__('How many column should be shown per row?', 'tekprof-toolkit'),
				],
				[
					'id'      => 'related_product_per_page',
					'type'    => 'number',
					'title'   => esc_html__('Product Per page', 'tekprof-toolkit'),
					'default' => 4,
					'desc'    => esc_html__('How many products should be shown per page?', 'tekprof-toolkit'),
				],
			],
		]);
	}

	public function color_scheme_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Color Scheme', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Color Scheme', 'tekprof-toolkit'),
				],
				[
					'id'       => 'primary_color',
					'type'     => 'color',
					'title'    => esc_html__('Primary', 'tekprof-toolkit'),
					'default'  => '#FC5546',
					'subtitle' => esc_html__('Your main brand color. Used by most elements throughout the website.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #FC5546', 'tekprof-toolkit'),
				],
				[
					'id'       => 'secondary_color',
					'type'     => 'color',
					'title'    => esc_html__('Secondary', 'tekprof-toolkit'),
					'default'  => '#021433',
					'subtitle' => esc_html__('Your secondary brand color. Used mainly as hover color or by secondary elements.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #021433', 'tekprof-toolkit'),
				],
				[
					'id'       => 'blue_color',
					'type'     => 'color',
					'title'    => esc_html__('Blue', 'tekprof-toolkit'),
					'default'  => '#021433',
					'subtitle' => esc_html__('Mostly Use in Background Color.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #021433', 'tekprof-toolkit'),
				],
				[
					'id'       => 'nav_blue_color',
					'type'     => 'color',
					'title'    => esc_html__('Nav Blue', 'tekprof-toolkit'),
					'default'  => '#151F39',
					'subtitle' => esc_html__('Mostly Use in Background Color.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #151F39', 'tekprof-toolkit'),
				],
				[
					'id'       => 'body_color',
					'type'     => 'color',
					'title'    => esc_html__('Body', 'tekprof-toolkit'),
					'default'  => '#5B5B5B',
					'subtitle' => esc_html__('A neutral grey, easy to read color, used by all text elements.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #5B5B5B', 'tekprof-toolkit'),
				],
				[
					'id'       => 'heading_color',
					'type'     => 'color',
					'title'    => esc_html__('Heading', 'tekprof-toolkit'),
					'default'  => '#0B0C0C',
					'subtitle' => esc_html__('A dark, contrasting color, used by all headlines in your website.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #0B0C0C', 'tekprof-toolkit'),
				],
				[
					'id'       => 'gray_color',
					'type'     => 'color',
					'title'    => esc_html__('Gray Color', 'tekprof-toolkit'),
					'default'  => '#F3F6F9',
					'subtitle' => esc_html__('A common light color for all Gray in your website.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #F3F6F9', 'tekprof-toolkit'),
				],
				[
					'id'       => 'light_neutral',
					'type'     => 'color',
					'title'    => esc_html__('Light Color', 'tekprof-toolkit'),
					'default'  => '#F3F6F9',
					'subtitle' => esc_html__('Generally used as background color for light, alternating sections.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #F3F6F9', 'tekprof-toolkit'),
				],
			],
		]);
	}

	public function typography_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Typography', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Typography', 'tekprof-toolkit'),
				],
				[
					'id'                 => 'primary_font',
					'type'               => 'typography',
					'title'              => esc_html__('Base Font', 'tekprof-toolkit'),
					'subtitle'           => esc_html__('The main font of your website. The most readable font, used by all text elements.', 'tekprof-toolkit'),
					'font_weight'        => true,
					'font_style'         => true,
					'extra_styles'       => true,
					'font_size'          => false,
					'line_height'        => false,
					'letter_spacing'     => false,
					'text_align'         => false,
					'text_transform'     => false,
					'color'              => false,
					'backup_font_family' => true,
					'subset'             => true,
					'preview'            => false,
				],
				[
					'id'                 => 'secondary_font',
					'type'               => 'typography',
					'title'              => esc_html__('Heading Font', 'tekprof-toolkit'),
					'subtitle'           => esc_html__('The secondary font of your website. Used by secondary headlines and smaller elements.', 'tekprof-toolkit'),
					'font_weight'        => true,
					'font_style'         => true,
					'extra_styles'       => true,
					'font_size'          => false,
					'line_height'        => false,
					'letter_spacing'     => false,
					'text_align'         => false,
					'text_transform'     => false,
					'color'              => false,
					'backup_font_family' => true,
					'subset'             => true,
					'preview'            => false,
				],
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('For better performance, it\'s recommended you limit typography to two font families.', 'tekprof-toolkit'),
				],
				[
					'id'      => 'body_typo_types',
					'type'    => 'button_set',
					'title'   => esc_html__('Body Typography', 'tekprof-toolkit'),
					'options' => [
						'default-font' => esc_html__('Default', 'tekprof-toolkit'),
						'custom-font'  => esc_html__('Custom', 'tekprof-toolkit'),
					],
					'default' => 'default-font',
				],
				[
					'id'         => 'body_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Body', 'tekprof-toolkit'),
					'output'     => 'body',
					'preview'    => false,
					'dependency' => [
						'body_typo_types',
						'==',
						'custom-font',
					],
				],
				[
					'id'      => 'heading_typo_type',
					'type'    => 'button_set',
					'title'   => esc_html__('Heading Typography', 'tekprof-toolkit'),
					'options' => [
						'default-font' => esc_html__('Default', 'tekprof-toolkit'),
						'custom-font'  => esc_html__('Custom', 'tekprof-toolkit'),
					],
					'default' => 'default-font',
				],
				[
					'id'         => 'heading1_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Heading 1', 'tekprof-toolkit'),
					'output'     => 'h1',
					'preview'    => false,
					'dependency' => [
						'heading_typo_type',
						'==',
						'custom-font',
					],
				],
				[
					'id'         => 'heading2_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Heading 2', 'tekprof-toolkit'),
					'output'     => 'h2',
					'preview'    => false,
					'dependency' => [
						'heading_typo_type',
						'==',
						'custom-font',
					],
				],
				[
					'id'         => 'heading3_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Heading 3', 'tekprof-toolkit'),
					'output'     => 'h3',
					'preview'    => false,
					'dependency' => [
						'heading_typo_type',
						'==',
						'custom-font',
					],
				],
				[
					'id'         => 'heading4_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Heading 4', 'tekprof-toolkit'),
					'output'     => 'h4',
					'preview'    => false,
					'dependency' => [
						'heading_typo_type',
						'==',
						'custom-font',
					],
				],
				[
					'id'         => 'heading5_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Heading 5', 'tekprof-toolkit'),
					'output'     => 'h5',
					'preview'    => false,
					'dependency' => [
						'heading_typo_type',
						'==',
						'custom-font',
					],
				],
				[
					'id'         => 'heading6_typo',
					'type'       => 'typography',
					'title'      => esc_html__('Heading 6', 'tekprof-toolkit'),
					'output'     => 'h6',
					'preview'    => false,
					'dependency' => [
						'heading_typo_type',
						'==',
						'custom-font',
					],
				],
			],
		]);
	}

	public function error_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('404 Page', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('404 Page', 'tekprof-toolkit'),
				],
				[
					'id'      => 'error_title',
					'type'    => 'text',
					'title'   => esc_html__('Title', 'tekprof-toolkit'),
					'default' => esc_html__('OPPS!', 'tekprof-toolkit'),
				],
				[
					'id'      => 'error_bottom_message',
					'type'    => 'textarea',
					'title'   => esc_html__('Message', 'tekprof-toolkit'),
					'default' => esc_html__('The page you are looking for does not exist or has been moved', 'tekprof-toolkit'),
				],
				[
					'id'      => 'error_button_text',
					'type'    => 'text',
					'title'   => esc_html__('Error Button Text', 'tekprof-toolkit'),
					'default' => esc_html__('Go to Home', 'tekprof-toolkit'),
				],
				[
					'id'           => 'error_page_image',
					'type'         => 'media',
					'title'        => esc_html__('Error Page Image', 'tekprof-toolkit'),
					'subtitle'     => esc_html__('Upload OR Select image for 404 page', 'tekprof-toolkit'),
					'library'      => 'image',
					'url'          => false,
					'default'      => [
						'url'       => RT_THEME_ASSETS . '/img/error-404.png',
						'thumbnail' => RT_THEME_ASSETS . '/img/error-404.png',
					],
					'preview_size' => 'full',
				],
			],
		]);
	}

	public function mailchimp_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Mailchimp  Api', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Insert Mailchimp Api', 'tekprof-toolkit'),
				],
				[
					'id'      => 'api',
					'type'    => 'text',
					'title'   => esc_html__('Api', 'tekprof-toolkit'),
				],
				[
					'id'      => 'subscribe_list_id',
					'type'    => 'text',
					'title'   => esc_html__('Subscribe List Id', 'tekprof-toolkit'),
				],
				[
					'id'      => 'success_message',
					'type'    => 'text',
					'title'   => esc_html__('Success Message', 'tekprof-toolkit'),
					'default'   => esc_html__('Your email has been subscribed successfully.', 'tekprof-toolkit'),
				],
				[
					'id'      => 'already_subscribed_message',
					'type'    => 'text',
					'title'   => esc_html__('Already Subscribed Message', 'tekprof-toolkit'),
					'default'   => esc_html__('Your email has already been subscribed.', 'tekprof-toolkit'),
				],
				[
					'id'      => 'error_message',
					'type'    => 'text',
					'title'   => esc_html__('Error Message', 'tekprof-toolkit'),
					'default'   => esc_html__('Something went wrong, please try again later.', 'tekprof-toolkit'),
				],
			],
		]);
	}

	public function maintenance_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Maintenance Mode', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Maintenance Mode', 'tekprof-toolkit'),
				],
				[
					'id'       => 'maintenance_mode',
					'type'     => 'button_set',
					'title'    => esc_html__('Maintenance Mode', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable maintenance mode top your website.', 'tekprof-toolkit'),
					'options'  => [
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'  => 'disabled',
				],
				[
					'id'          => 'maintenance_page',
					'type'        => 'select',
					'title'       => esc_html__('Maintenance Page', 'tekprof-toolkit'),
					'placeholder' => esc_html__('Default', 'tekprof-toolkit'),
					'options'     => 'pages',
					'dependency'  => ['maintenance_mode', '==', 'enabled'],
				],
				[
					'id'         => 'maintenance_title',
					'type'       => 'text',
					'title'      => esc_html__('Maintenance Title', 'tekprof-toolkit'),
					'default'    => esc_html__('The site is currently down for maintenance', 'tekprof-toolkit'),
					'dependency' => [
						['maintenance_mode', '==', 'enabled'],
						['maintenance_page', '==', ''],
					],
				],
				[
					'id'         => 'maintenance_subtitle',
					'type'       => 'textarea',
					'title'      => esc_html__('Maintenance Subtitle', 'tekprof-toolkit'),
					'default'    => esc_html__('We apologize for any inconvenience caused', 'tekprof-toolkit'),
					'dependency' => [
						['maintenance_mode', '==', 'enabled'],
						['maintenance_page', '==', ''],
					],
				],
				[
					'id'         => 'maintenance_img',
					'type'       => 'media',
					'title'      => esc_html__('Maintenance Img', 'tekprof-toolkit'),
					'subtitle'   => esc_html__('Upload OR Select a illustration for maintenance page', 'tekprof-toolkit'),
					'library'    => 'image',
					'url'        => false,
					'default'    => [
						'url'       => RT_THEME_ASSETS . '/img/maintenance.png',
						'thumbnail' => RT_THEME_ASSETS . '/img/maintenance.png',
					],
					'dependency' => [
						['maintenance_mode', '==', 'enabled'],
						['maintenance_page', '==', ''],
					],
				],
			],
		]);
	}

	public function custom_scrips_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Custom Scripts', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Custom Scripts', 'tekprof-toolkit'),
				],
				[
					'id'       => 'custom_header_scripts',
					'type'     => 'code_editor',
					'title'    => esc_html__('Js Code(Head)', 'tekprof-toolkit'),
					'settings' => [
						'theme' => 'mbo',
						'mode'  => 'javascript',
					],
					'subtitle' => esc_html__('Add your custom js code here. Must Be type without script tag and valid code, It will insert the code to wp_head hook.', 'tekprof-toolkit'),
				],
				[
					'id'       => 'custom_footer_scripts',
					'type'     => 'code_editor',
					'title'    => esc_html__('Js Code(Footer)', 'tekprof-toolkit'),
					'settings' => [
						'theme' => 'mbo',
						'mode'  => 'javascript',
					],
					'subtitle' => esc_html__('Add your custom js code here. Must Be type without script tag and valid code, It will insert the code to wp_footer hook.', 'tekprof-toolkit'),
				],
				[
					'type'    => 'submessage',
					'style'   => 'info',
					'content' => esc_html__('You Can add also custom css in Appearance>Customize>Additional CSS', 'tekprof-toolkit'),
				],
			],
		]);
	}

	public function backup_section()
	{
		CSF::createSection($this->options_prefix, [
			'title'  => esc_html__('Backup', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Backup', 'tekprof-toolkit'),
				],
				[
					'type' => 'backup',
				],
			],
		]);
	}

	public function add_dashboard_banner()
	{
		Tekprof_Admin_Panel::render_heading();
	}

	public function update_color_palette()
	{
		$colors    = Tekprof_Helper::get_global_colors();
		$new_color = [];

		foreach ($colors as $color) {
			$new_color[] = $color['value'];
		}

		return $new_color;
	}

	public function after_saved()
	{
		if (get_option('tekprof_update_elementor_kit') !== false) {
			update_option('tekprof_update_elementor_kit', 'yes');
		} else {
			add_option('tekprof_update_elementor_kit', 'yes');
		}
	}
}

Tekprof_Options::instance();
