<?php

namespace TekprofToolkit\Helper;

use CSF;

defined('ABSPATH') || exit;

class Tekprof_Metaboxes
{

	protected static $instance = null;

	private $post_prefix = 'tekprof_post_meta';
	private $page_prefix = 'tekprof_page_meta';
	private $portfolio_prefix = 'tekprof_portfolio_meta';
	private $nav_menu_prefix = 'tekprof_nav_menu_meta';
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

		$this->page_metaboxes();
		$this->post_metaboxes();
		$this->portfolio_metaboxes();
		$this->nav_menu_metaboxes();
	}

	public function page_metaboxes()
	{
		CSF::createMetabox($this->page_prefix, [
			'title'        => esc_html__('Tekprof Page Options', 'tekprof-toolkit'),
			'post_type'    => 'page',
			'show_restore' => true,
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Layout', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Page Layout', 'tekprof-toolkit'),
				],
				[
					'id'       => 'site_layout',
					'type'     => 'select',
					'title'    => esc_html__('Layout', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Set the page layout.', 'tekprof-toolkit'),
					'options'  => [
						'default'    => esc_html__('Theme Default', 'tekprof-toolkit'),
						'full-width' => esc_html__('Full Width', 'tekprof-toolkit'),
						'boxed'      => esc_html__('Boxed', 'tekprof-toolkit'),
					],
					'default'  => 'default',
				],
				// [
				// 	'id'         => 'content_spacing',
				// 	'type'       => 'spacing',
				// 	'title'      => esc_html__('Content Spacing', 'tekprof-toolkit'),
				// 	'show_units' => false,
				// 	'left'       => false,
				// 	'right'      => false,
				// 	'desc'       => esc_html__('Default top: 125px, bottom: 125px', 'tekprof-toolkit'),
				// 	'output'     => '.container-gap',
				// ],
			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Header', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for page header then disable default header', 'tekprof-toolkit'),
				],
				[
					'id'       => 'page_default_header',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Header', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable page default header. Default comes form theme option', 'tekprof-toolkit'),
					'options'  => [
						'default'  => esc_html__('Default', 'tekprof-toolkit'),
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'  => 'default',
				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default header. Set your page header form ', 'tekprof-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'tekprof-toolkit') . '</a>',
					'dependency' => [
						'page_default_header',
						'==',
						'disabled',
					],
				],
			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Page Title', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Page Title', 'tekprof-toolkit'),
				],
				[
					'id'      => 'page_title',
					'type'    => 'button_set',
					'title'   => esc_html__('Page Title', 'tekprof-toolkit'),
					'options' => [
						'default'  => esc_html__('Default', 'tekprof-toolkit'),
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default' => 'default',
				],
				[
					'id'         => 'page_title_type',
					'type'       => 'button_set',
					'title'      => esc_html__('Page Title Type', 'tekprof-toolkit'),
					'options'    => [
						'default' => esc_html__('Default', 'tekprof-toolkit'),
						'custom'  => esc_html__('Custom', 'tekprof-toolkit'),
					],
					'default'    => 'default',
					'dependency' => ['page_title', '!=', 'disabled'],
				],
				[
					'id'         => 'page_custom_title',
					'type'       => 'text',
					'title'      => esc_html__('Custom Title', 'tekprof-toolkit'),
					'dependency' => [
						['page_title', '!=', 'disabled'],
						['page_title_type', '==', 'custom'],
					],
				],
				[
					'id'         => 'page_breadcrumb',
					'type'       => 'button_set',
					'title'      => esc_html__('Page Breadcrumb', 'tekprof-toolkit'),
					'options'    => [
						'default'  => esc_html__('Default', 'tekprof-toolkit'),
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'    => 'default',
					'dependency' => ['page_title', '!=', 'disabled'],
				],
				[
					'id'         => 'customize_page_title_style',
					'type'       => 'button_set',
					'title'      => esc_html__('Customize Style', 'tekprof-toolkit'),
					'options'    => [
						'yes' => esc_html__('Yes', 'tekprof-toolkit'),
						'no'  => esc_html__('No', 'tekprof-toolkit'),
					],
					'default'    => 'no',
					'dependency' => ['page_title', '!=', 'disabled'],
				],
				[
					'type'       => 'subheading',
					'content'    => esc_html__('Page Title Styling', 'tekprof-toolkit'),
					'dependency' => [
						['page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'         => 'page_title_bg',
					'type'       => 'background',
					'title'      => esc_html__('Background', 'tekprof-toolkit'),
					'output'     => '.page-title-wrapper',
					'dependency' => [
						['page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'          => 'page_title_overly_color',
					'type'        => 'color',
					'title'       => esc_html__('Overly Color', 'tekprof-toolkit'),
					'output'      => '.page-title-wrapper::before',
					'output_mode' => 'background-color',
					'dependency'  => [
						['page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'               => 'page_title_typo',
					'type'             => 'typography',
					'title'            => esc_html__('Typography', 'tekprof-toolkit'),
					'output'           => '.page-title-wrapper .page-title',
					'line_height_unit' => 'em',
					'dependency'       => [
						['page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'               => 'page_breadcrumb_typo',
					'type'             => 'typography',
					'title'            => esc_html__('Breadcrumb Typography', 'tekprof-toolkit'),
					'output'           => '.page-title-wrapper .breadcrumb, .page-title-wrapper .breadcrumb a',
					'line_height_unit' => 'em',
					'dependency'       => [
						['page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Footer', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for page footer then disable default footer', 'tekprof-toolkit'),
				],
				[
					'id'       => 'page_default_footer',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Footer', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable page default footer. Default comes form theme option', 'tekprof-toolkit'),
					'options'  => [
						'default'  => esc_html__('Default', 'tekprof-toolkit'),
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'  => 'default',
				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default footer. Set your page footer form ', 'tekprof-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'tekprof-toolkit') . '</a>',
					'dependency' => [
						'page_default_footer',
						'==',
						'disabled',
					],
				],
			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Back to Top', 'tekprof-toolkit'),
			'fields' => [
				[
					'id'       => 'back_to_top_page',
					'type'     => 'button_set',
					'title'    => esc_html__('Back to Top', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Add a back to top button on bottom right corner.', 'tekprof-toolkit'),
					'options'  => [
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'  => 'disabled',
				],
			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Color Scheme', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Color Scheme', 'tekprof-toolkit'),
				],
				[
					'id'       => 'page_custom_color_scheme',
					'type'     => 'button_set',
					'title'    => esc_html__('Enable Color', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable Page Color Scheme', 'tekprof-toolkit'),
					'options'  => [
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'  => 'disabled',

				],
				[
					'id'       => 'primary_color',
					'type'     => 'color',
					'title'    => esc_html__('Primary', 'tekprof-toolkit'),
					'default'  => '#FC5546',
					'subtitle' => esc_html__('Your main brand color. Used by most elements throughout the website.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #FC5546', 'tekprof-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'secondary_color',
					'type'     => 'color',
					'title'    => esc_html__('Secondary', 'tekprof-toolkit'),
					'default'  => '#021433',
					'subtitle' => esc_html__('Your secondary brand color. Used mainly as hover color or by secondary elements.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #021433', 'tekprof-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'blue_color',
					'type'     => 'color',
					'title'    => esc_html__('Blue', 'tekprof-toolkit'),
					'default'  => '#021433',
					'subtitle' => esc_html__('Mostly Use in Background Color.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #021433', 'tekprof-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'nav_blue_color',
					'type'     => 'color',
					'title'    => esc_html__('Nav Blue', 'tekprof-toolkit'),
					'default'  => '#151F39',
					'subtitle' => esc_html__('Mostly Use in Background Color.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #151F39', 'tekprof-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'body_color',
					'type'     => 'color',
					'title'    => esc_html__('Body', 'tekprof-toolkit'),
					'default'  => '#5B5B5B',
					'subtitle' => esc_html__('A neutral grey, easy to read color, used by all text elements.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #5B5B5B', 'tekprof-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'heading_color',
					'type'     => 'color',
					'title'    => esc_html__('Heading', 'tekprof-toolkit'),
					'default'  => '#0B0C0C',
					'subtitle' => esc_html__('A dark, contrasting color, used by all headlines in your website.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #0B0C0C', 'tekprof-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'gray_color',
					'type'     => 'color',
					'title'    => esc_html__('Gray Color', 'tekprof-toolkit'),
					'default'  => '#F3F6F9',
					'subtitle' => esc_html__('A common light color for all Gray in your website.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #F3F6F9', 'tekprof-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
				[
					'id'       => 'light_neutral',
					'type'     => 'color',
					'title'    => esc_html__('Light Color', 'tekprof-toolkit'),
					'default'  => '#F3F6F9',
					'subtitle' => esc_html__('Generally used as background color for light, alternating sections.', 'tekprof-toolkit'),
					'desc'     => esc_html__('Default: #F3F6F9', 'tekprof-toolkit'),
					'dependency' => [
						'page_custom_color_scheme',
						'==',
						'enabled',
					],
				],
			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Typography', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Typography', 'tekprof-toolkit'),
				],
				[
					'id'      => 'custom_typo_type',
					'type'    => 'button_set',
					'title'   => esc_html__('Custom Typography', 'tekprof-toolkit'),
					'options' => [
						'default-font' => esc_html__('Default', 'tekprof-toolkit'),
						'custom-font'  => esc_html__('Custom', 'tekprof-toolkit'),
					],
					'default' => 'default-font',
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
					'dependency' => [
						'custom_typo_type',
						'==',
						'custom-font',
					],
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
					'dependency' => [
						'custom_typo_type',
						'==',
						'custom-font',
					],
				],

			],
		]);

		CSF::createSection($this->page_prefix, [
			'title'  => esc_html__('Body Class', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Add Body Class', 'tekprof-toolkit'),
				],
				[
					'id'       => 'body_class',
					'type'     => 'text',
					'title'    => esc_html__('Body Class', 'tekprof-toolkit'),
					'default'  => '',
					'subtitle' => esc_html__('Append a class in body tag', 'tekprof-toolkit'),
				],
			],
		]);
	}

	public function post_metaboxes()
	{
		CSF::createMetabox($this->post_prefix, [
			'title'        => esc_html__('Tekprof Post Options', 'tekprof-toolkit'),
			'post_type'    => 'post',
			'show_restore' => true,
		]);

		CSF::createSection($this->post_prefix, [
			'title'  => esc_html__('Layout', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Post Layout', 'tekprof-toolkit'),
				],
				[
					'id'       => 'post_details_layout',
					'type'     => 'select',
					'title'    => esc_html__('Layout', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Set the post layout.', 'tekprof-toolkit'),
					'options'  => [
						'default'    => esc_html__('Theme Default', 'tekprof-toolkit'),
						'full-width' => esc_html__('Full Width', 'tekprof-toolkit'),
						'boxed'      => esc_html__('Boxed', 'tekprof-toolkit'),
					],
					'default'  => 'default',
				],
				[
					'id'       => 'post_details_sidebar',
					'type'     => 'select',
					'title'    => esc_html__('Sidebar', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Select Blog Archive Sidebar. Left sidebar or right sidebar or No sidebar', 'tekprof-toolkit'),
					'options'  => [
						'default'       => esc_html__('Theme Default', 'tekprof-toolkit'),
						'left-sidebar'  => esc_html__('Left Sidebar', 'tekprof-toolkit'),
						'right-sidebar' => esc_html__('Right Sidebar', 'tekprof-toolkit'),
						'no-sidebar'    => esc_html__('No Sidebar', 'tekprof-toolkit'),
					],
					'default'  => 'right-sidebar',
				],
				// [
				// 	'id'         => 'content_spacing',
				// 	'type'       => 'spacing',
				// 	'title'      => esc_html__('Content Spacing', 'tekprof-toolkit'),
				// 	'show_units' => false,
				// 	'left'       => false,
				// 	'right'      => false,
				// 	'desc'       => esc_html__('Default top: 125px, bottom: 125px', 'tekprof-toolkit'),
				// 	'output'     => '.container-gap',
				// ],
			],
		]);

		CSF::createSection($this->post_prefix, [
			'title'  => esc_html__('Header', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for post header then disable default header', 'tekprof-toolkit'),
				],
				[
					'id'       => 'post_default_header',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Header', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post default header. Default comes form theme option', 'tekprof-toolkit'),
					'options'  => [
						'default'  => esc_html__('Default', 'tekprof-toolkit'),
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'  => 'default',

				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default header. Set your post header form ', 'tekprof-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'tekprof-toolkit') . '</a>',
					'dependency' => [
						'post_default_header',
						'==',
						'disabled',
					],
				],
			],
		]);

		CSF::createSection($this->post_prefix, [
			'title'  => esc_html__('Page Title', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Page Title', 'tekprof-toolkit'),
				],
				[
					'id'      => 'post_page_title',
					'type'    => 'button_set',
					'title'   => esc_html__('Page Title', 'tekprof-toolkit'),
					'options' => [
						'default'  => esc_html__('Default', 'tekprof-toolkit'),
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default' => 'default',
				],
				[
					'id'         => 'post_title_type',
					'type'       => 'button_set',
					'title'      => esc_html__('Page Title Type', 'tekprof-toolkit'),
					'options'    => [
						'default' => esc_html__('Default', 'tekprof-toolkit'),
						'custom'  => esc_html__('Custom', 'tekprof-toolkit'),
					],
					'default'    => 'default',
					'dependency' => ['post_page_title', '!=', 'disabled'],
				],
				[
					'id'         => 'post_custom_title',
					'type'       => 'text',
					'title'      => esc_html__('Custom Title', 'tekprof-toolkit'),
					'dependency' => [
						['post_page_title', '!=', 'disabled'],
						['post_title_type', '==', 'custom'],
					],
				],
				[
					'id'         => 'customize_page_title_style',
					'type'       => 'button_set',
					'title'      => esc_html__('Customize Style', 'tekprof-toolkit'),
					'options'    => [
						'yes' => esc_html__('Yes', 'tekprof-toolkit'),
						'no'  => esc_html__('No', 'tekprof-toolkit'),
					],
					'default'    => 'no',
					'dependency' => ['post_page_title', '!=', 'disabled'],
				],
				[
					'type'       => 'subheading',
					'content'    => esc_html__('Page Title Styling', 'tekprof-toolkit'),
					'dependency' => [
						['post_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'         => 'page_title_bg',
					'type'       => 'background',
					'title'      => esc_html__('Background', 'tekprof-toolkit'),
					'output'     => '.page-title-wrapper',
					'dependency' => [
						['post_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'          => 'post_title_overly_color',
					'type'        => 'color',
					'title'       => esc_html__('Overly Color', 'tekprof-toolkit'),
					'output'      => '.page-title-wrapper::before',
					'output_mode' => 'background-color',
					'dependency'  => [
						['post_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'               => 'page_title_typo',
					'type'             => 'typography',
					'title'            => esc_html__('Typography', 'tekprof-toolkit'),
					'output'           => '.page-title-wrapper .page-title',
					'line_height_unit' => 'em',
					'dependency'       => [
						['post_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'               => 'page_breadcrumb_typo',
					'type'             => 'typography',
					'title'            => esc_html__('Breadcrumb Typography', 'tekprof-toolkit'),
					'output'           => '.page-title-wrapper .breadcrumb, .page-title-wrapper .breadcrumb a',
					'line_height_unit' => 'em',
					'dependency'       => [
						['post_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
			],
		]);



		CSF::createSection($this->post_prefix, [
			'title'  => esc_html__('Footer', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for post footer then disable default footer', 'tekprof-toolkit'),
				],
				[
					'id'       => 'post_default_footer',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Footer', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post default footer. Default comes form theme option', 'tekprof-toolkit'),
					'options'  => [
						'default'  => esc_html__('Default', 'tekprof-toolkit'),
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'  => 'default',

				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default footer. Set your post footer form ', 'tekprof-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'tekprof-toolkit') . '</a>',
					'dependency' => [
						'post_default_footer',
						'==',
						'disabled',
					],
				],
			],
		]);
	}

	public function portfolio_metaboxes()
	{
		CSF::createMetabox($this->portfolio_prefix, [
			'title'        => esc_html__('Tekprof Portfolio Options', 'tekprof-toolkit'),
			'post_type'    => 'tekprof_portfolio',
			'show_restore' => true,
		]);

		CSF::createSection($this->portfolio_prefix, [
			'title'  => esc_html__('Layout', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Post Layout', 'tekprof-toolkit'),
				],
				[
					'id'       => 'portfolio_details_layout',
					'type'     => 'select',
					'title'    => esc_html__('Layout', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Set the post layout.', 'tekprof-toolkit'),
					'options'  => [
						'default'    => esc_html__('Theme Default', 'tekprof-toolkit'),
						'full-width' => esc_html__('Full Width', 'tekprof-toolkit'),
						'boxed'      => esc_html__('Boxed', 'tekprof-toolkit'),
					],
					'default'  => 'default',
				],
				[
					'id'         => 'content_spacing',
					'type'       => 'spacing',
					'title'      => esc_html__('Content Spacing', 'tekprof-toolkit'),
					'show_units' => false,
					'left'       => false,
					'right'      => false,
					'desc'       => esc_html__('Default top: 125px, bottom: 125px', 'tekprof-toolkit'),
					'output'     => '.container-gap',
				],
			],
		]);

		CSF::createSection($this->portfolio_prefix, [
			'title'  => esc_html__('Header', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for post header then disable default header', 'tekprof-toolkit'),
				],
				[
					'id'       => 'portfolio_default_header',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Header', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post default header. Default comes form theme option', 'tekprof-toolkit'),
					'options'  => [
						'default'  => esc_html__('Default', 'tekprof-toolkit'),
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'  => 'default',

				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default header. Set your post header form ', 'tekprof-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'tekprof-toolkit') . '</a>',
					'dependency' => [
						'portfolio_default_header',
						'==',
						'disabled',
					],
				],
			],
		]);

		CSF::createSection($this->portfolio_prefix, [
			'title'  => esc_html__('Page Title', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'heading',
					'content' => esc_html__('Page Title', 'tekprof-toolkit'),
				],
				[
					'id'      => 'portfolio_page_title',
					'type'    => 'button_set',
					'title'   => esc_html__('Page Title', 'tekprof-toolkit'),
					'options' => [
						'default'  => esc_html__('Default', 'tekprof-toolkit'),
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default' => 'default',
				],
				[
					'id'         => 'portfolio_page_title_type',
					'type'       => 'button_set',
					'title'      => esc_html__('Page Title Type', 'tekprof-toolkit'),
					'options'    => [
						'default' => esc_html__('Default', 'tekprof-toolkit'),
						'custom'  => esc_html__('Custom', 'tekprof-toolkit'),
					],
					'default'    => 'default',
					'dependency' => ['portfolio_page_title', '!=', 'disabled'],
				],
				[
					'id'         => 'portfolio_custom_title',
					'type'       => 'text',
					'title'      => esc_html__('Custom Title', 'tekprof-toolkit'),
					'dependency' => [
						['portfolio_page_title', '!=', 'disabled'],
						['portfolio_page_title_type', '==', 'custom'],
					],
				],
				[
					'id'         => 'portfolio_breadcrumb',
					'type'       => 'button_set',
					'title'      => esc_html__('Page Breadcrumb', 'tekprof-toolkit'),
					'options'    => [
						'default'  => esc_html__('Default', 'tekprof-toolkit'),
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'    => 'default',
					'dependency' => ['portfolio_page_title', '!=', 'disabled'],
				],
				[
					'id'         => 'customize_page_title_style',
					'type'       => 'button_set',
					'title'      => esc_html__('Customize Style', 'tekprof-toolkit'),
					'options'    => [
						'yes' => esc_html__('Yes', 'tekprof-toolkit'),
						'no'  => esc_html__('No', 'tekprof-toolkit'),
					],
					'default'    => 'no',
					'dependency' => ['portfolio_page_title', '!=', 'disabled'],
				],
				[
					'type'       => 'subheading',
					'content'    => esc_html__('Page Title Styling', 'tekprof-toolkit'),
					'dependency' => [
						['portfolio_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'         => 'page_title_bg',
					'type'       => 'background',
					'title'      => esc_html__('Background', 'tekprof-toolkit'),
					'output'     => '.page-title-wrapper',
					'dependency' => [
						['portfolio_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'          => 'post_title_overly_color',
					'type'        => 'color',
					'title'       => esc_html__('Overly Color', 'tekprof-toolkit'),
					'output'      => '.page-title-wrapper::before',
					'output_mode' => 'background-color',
					'dependency'  => [
						['portfolio_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'               => 'page_title_typo',
					'type'             => 'typography',
					'title'            => esc_html__('Typography', 'tekprof-toolkit'),
					'output'           => '.page-title-wrapper .page-title',
					'line_height_unit' => 'em',
					'dependency'       => [
						['portfolio_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
				[
					'id'               => 'page_breadcrumb_typo',
					'type'             => 'typography',
					'title'            => esc_html__('Breadcrumb Typography', 'tekprof-toolkit'),
					'output'           => '.page-title-wrapper .breadcrumb, .page-title-wrapper .breadcrumb a',
					'line_height_unit' => 'em',
					'dependency'       => [
						['portfolio_page_title', '!=', 'disabled'],
						['customize_page_title_style', '==', 'yes'],
					],
				],
			],
		]);

		CSF::createSection($this->portfolio_prefix, [
			'title'  => esc_html__('Summary Text', 'tekprof-toolkit'),
			'fields' => [
				[
					'id'          => 'summary_text',
					'type'        => 'textarea',
					'title'       => esc_html__('Summary Text', 'tekprof-toolkit'),
					'placeholder' => esc_html__('Enter a summary text.', 'tekprof-toolkit'),
				],
			],
		]);

		CSF::createSection($this->portfolio_prefix, [
			'title'  => esc_html__('Footer', 'tekprof-toolkit'),
			'fields' => [
				[
					'type'    => 'notice',
					'style'   => 'info',
					'content' => esc_html__('If you used theme builder for post footer then disable default footer', 'tekprof-toolkit'),
				],
				[
					'id'       => 'portfolio_default_footer',
					'type'     => 'button_set',
					'title'    => esc_html__('Default Footer', 'tekprof-toolkit'),
					'subtitle' => esc_html__('Enable or Disable post default footer. Default comes form theme option', 'tekprof-toolkit'),
					'options'  => [
						'default'  => esc_html__('Default', 'tekprof-toolkit'),
						'enabled'  => esc_html__('Enable', 'tekprof-toolkit'),
						'disabled' => esc_html__('Disable', 'tekprof-toolkit'),
					],
					'default'  => 'default',

				],
				[
					'type'       => 'notice',
					'style'      => 'warning',
					'content'    => esc_html__('You disabled default footer. Set your post footer form ', 'tekprof-toolkit') . '<a href="' . esc_url($this->template_builder_url) . '">' . esc_html__('here', 'tekprof-toolkit') . '</a>',
					'dependency' => [
						'portfolio_default_footer',
						'==',
						'disabled',
					],
				],
			],
		]);
	}

	public function nav_menu_metaboxes()
	{
		CSF::createNavMenuOptions($this->nav_menu_prefix);

		CSF::createSection($this->nav_menu_prefix, [
			'title'  => esc_html__('Tekprof Options', 'tekprof-toolkit'),
			'fields' => [
				[
					'id'      => 'nav_icon_type',
					'type'    => 'button_set',
					'title'   => esc_html__('Icon Type', 'tekprof-toolkit'),
					'options' => [
						'font_icon'  => esc_html__('Font Icon', 'tekprof-toolkit'),
						'image_icon' => esc_html__('Image Icon', 'tekprof-toolkit'),
						'none'       => esc_html__('None', 'tekprof-toolkit'),
					],
					'default' => 'none'
				],
				[
					'id'         => 'nav_font_icon',
					'type'       => 'icon',
					'title'      => esc_html__('Font Icon', 'tekprof-toolkit'),
					'dependency' => [
						'nav_icon_type',
						'==',
						'font_icon',
					],
				],
				[
					'id'           => 'nav_image_icon',
					'type'         => 'media',
					'title'        => esc_html__('Image', 'tekprof-toolkit'),
					'library'      => 'image',
					'preview_size' => 'thumbnail',
					'dependency'   => [
						'nav_icon_type',
						'==',
						'image_icon',
					],
				],
				[
					'id'         => 'nav_icon_color',
					'type'       => 'color',
					'title'      => esc_html__('Icon Color', 'tekprof-toolkit'),
					'dependency' => [
						'nav_icon_type',
						'==',
						'font_icon',
					],
				],
				[
					'id'         => 'nav_icon_position',
					'type'       => 'select',
					'title'      => esc_html__('Icon Position', 'tekprof-toolkit'),
					'options'    => [
						'left'  => esc_html__('Left', 'tekprof-toolkit'),
						'right' => esc_html__('Right', 'tekprof-toolkit'),
					],
					'dependency' => [
						'nav_icon_type',
						'!=',
						'none',
					],
				],
				[
					'id'          => 'nav_menu_badge',
					'type'        => 'text',
					'title'       => esc_html__('Badge', 'tekprof-toolkit'),
					'placeholder' => esc_html__('Enter a nav menu badge. Example "New"', 'tekprof-toolkit'),
				],
				[
					'id'         => 'nav_badge_color',
					'type'       => 'color',
					'title'      => esc_html__('Badge Color', 'tekprof-toolkit'),
					'dependency' => [
						'nav_menu_badge',
						'!=',
						'',
					],
				],
				// [
				// 	'id'      => 'simple_mega_menu',
				// 	'type'    => 'switcher',
				// 	'title'   => esc_html__('Use Simple Menu', 'tekprof-toolkit'),
				// 	'default' => false,
				// 	'class'   => 'simple-mega-menu-meta'
				// ],
				// [
				// 	'id'         => 'simple_mega_menu_width',
				// 	'type'       => 'select',
				// 	'title'      => esc_html__('Mega Menu Width', 'tekprof-toolkit'),
				// 	'options'    => [
				// 		'auto'      => esc_html__('Auto', 'tekprof-toolkit'),
				// 		'menu-area' => esc_html__('Menu Area', 'tekprof-toolkit'),
				// 	],
				// 	'default'    => 'auto',
				// 	'dependency' => [
				// 		'simple_mega_menu',
				// 		'==',
				// 		'true',
				// 	],
				// 	'class'      => 'simple-mega-menu-meta'
				// ]
			],
		]);
	}
}

Tekprof_Metaboxes::instance();
