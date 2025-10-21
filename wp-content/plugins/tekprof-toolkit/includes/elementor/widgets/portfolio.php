<?php

namespace TekprofToolkit\ElementorAddon\Widgets;

use TekprofToolkit\ElementorAddon\Templates\Portfolio as PortfolioTemplate;
use TekprofToolkit\ElementorAddon\Traits\Carousel_Helper;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

class Portfolio extends Widget_Base
{

	use Carousel_Helper;

	public function get_name()
	{
		return 'tekprof-portfolio';
	}

	public function get_title()
	{
		return esc_html__('Portfolio', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-gallery-grid webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'portfolio', 'project'];
	}

	public function get_style_depends()
	{
		return ['slick'];
	}

	public function get_script_depends()
	{
		return ['slick'];
	}

	protected function register_controls()
	{

		$this->start_controls_section(
			'layout_section',
			[
				'label' => __('Layout', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_type',
			[
				'label' => __('Select Layout', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'default' => 'layout_one',
				'options' => [
					'layout_one' => __('Layout One', 'tekprof-toolkit'),
					'layout_two' => __('Layout Two', 'tekprof-toolkit'),
					'layout_three' => __('Layout Three', 'tekprof-toolkit'),
					'layout_four' => __('Layout Four', 'tekprof-toolkit'),
					'layout_five' => __('Layout Five', 'tekprof-toolkit'),
					'layout_six' => __('Layout Six', 'tekprof-toolkit'),
					'layout_seven' => __('Layout Seven', 'tekprof-toolkit'),
				]
			]
		);

		$this->add_control(
			'portfolio_type',
			[
				'label'       => esc_html__('Portfolio Type', 'tekprof-toolkit'),
				'type'        => Controls_Manager::SELECT,
				'label_block' => false,
				'options'     => [
					'cpt'   => esc_html__('Custom Post Type', 'tekprof-toolkit'),
					'elementor-field'   => esc_html__('With Elementor', 'tekprof-toolkit'),
				],
				'default'     => 'cpt',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'layout_header_section',
			[
				'label' => __('Header Section', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout_type' => ['layout_three', 'layout_five', 'layout_six']
				]
			]
		);

		$this->add_control(
			'layout_one_title',
			[
				'label' => esc_html__('Title', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add title', 'tekprof-toolkit'),
				'default' => esc_html__('Default Title', 'tekprof-toolkit'),
			]
		);

		$this->add_control(
			'layout_one_title_tag',
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
			'layout_one_sub_title',
			[
				'label' => esc_html__('Sub Title', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Sub title', 'tekprof-toolkit'),
				'default' => esc_html__('Default Sub Title', 'tekprof-toolkit'),
				'condition' => [
					'layout_type!' =>  'layout_six'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'widget_content',
			[
				'label' => esc_html__('General', 'tekprof-toolkit'),
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'       => esc_html__('Title Tag', 'tekprof-toolkit'),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
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
				'default'     => 'h3',
				'toggle'      => false,
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'title_word',
			[
				'label'   => esc_html__('Title Length', 'tekprof-toolkit'),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5,
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label'        => esc_html__('Show Excerpt', 'tekprof-toolkit'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Show', 'tekprof-toolkit'),
				'label_off'    => esc_html__('Hide', 'tekprof-toolkit'),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'design' => ['design-three', 'design-four']
				]
			]
		);

		$this->add_control(
			'excerpt_word',
			[
				'label'     => esc_html__('Excerpt Word', 'tekprof-toolkit'),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 0,
				'max'       => 50,
				'step'      => 1,
				'default'   => 15,
				'condition' => [
					'design'       => ['design-three', 'design-four'],
					'show_excerpt' => 'yes'
				]
			]
		);

		$this->add_control(
			'show_category',
			[
				'label'        => esc_html__('Show Category', 'tekprof-toolkit'),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on'     => esc_html__('Yes', 'tekprof-toolkit'),
				'label_off'    => esc_html__('No', 'tekprof-toolkit'),
				'return_value' => 'yes',
				'separator'    => 'before',
			]
		);

		$this->add_control(
			'read_more',
			[
				'label'        => esc_html__('Read More Button', 'tekprof-toolkit'),
				'type'         => Controls_Manager::TEXT,
				'default'      => esc_html__('Case Details', 'tekprof-toolkit'),
				'condition'    => [
					'layout_type' => ['layout_two', 'layout_three']
				]
			]
		);


		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'    => 'post_thumbnail',
				'default' => 'large',
				'condition' => [
					'portfolio_type' => 'cpt'
				],
				'exclude' => [
					'custom',
				],
			],

		);

		$this->add_control(
			'layout_five_enable_filter',
			[
				'label' => esc_html__('Enable Filter', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'tekprof-toolkit'),
				'label_off' => esc_html__('No', 'tekprof-toolkit'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'layout_five_show_all_text',
			[
				'label' => esc_html__('Show All Text', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Show All', 'tekprof-toolkit'),
				'label_block' => true,
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'query_content',
			[
				'label' => esc_html__('Query', 'tekprof-toolkit'),
				'condition' => [
					'portfolio_type' => 'cpt'
				]
			]
		);

		$this->add_control(
			'post_from',
			[
				'label'   => esc_html__('Portfolio From', 'tekprof-toolkit'),
				'type'    => Controls_Manager::SELECT,
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
				'label'       => esc_html__('Select Portfolio', 'tekprof-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => rt_select_post('tekprof_portfolio'),
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
				'type'        => Controls_Manager::SELECT2,
				'options'     => rt_select_category('tekprof_portfolio_category'),
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
				'type'    => Controls_Manager::NUMBER,
				'default' => 6,
				'min'     => 1,
			]
		);

		$this->add_control(
			'order_by',
			[
				'label'   => esc_html__('Order By', 'tekprof-toolkit'),
				'type'    => Controls_Manager::SELECT,
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
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'ASC'  => esc_html__('Ascending', 'tekprof-toolkit'),
					'DESC' => esc_html__('Descending', 'tekprof-toolkit'),
				],
				'default' => 'DESC',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'custom_elementor_portfolio_list',
			[
				'label' => esc_html__('Portfolio With Elementor ', 'tekprof-toolkit'),
				'condition' => [
					'portfolio_type' => 'elementor-field'
				]
			]
		);

		$layout_one_portfolio_list = new \Elementor\Repeater();

		$layout_one_portfolio_list->add_control(
			'select_portfolio',
			[
				'label'       => esc_html__('Select Portfolio', 'tekprof-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => rt_select_post('tekprof_portfolio'),
				'label_block' => true,
			]
		);

		$layout_one_portfolio_list->add_control(
			'title',
			[
				'label' => esc_html__('Custom Title', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => '2',
				'placeholder' => esc_html__('Add Title', 'tekprof-toolkit'),
				'default' => esc_html__('Website Development', 'tekprof-toolkit'),
				'description' => esc_html__('Keep empty to use default title', 'tekprof-toolkit'),
				'label_block' => true
			]
		);

		$layout_one_portfolio_list->add_control(
			'summary',
			[
				'label' => esc_html__('Custom Summary', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => '2',
				'placeholder' => esc_html__('Add Summary', 'tekprof-toolkit'),
				'description' => esc_html__('Keep empty to use default summary', 'tekprof-toolkit'),
				'label_block' => true
			]
		);


		$layout_one_portfolio_list->add_control(
			'image',
			[
				'label' => esc_html__('image', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'layout_one_portfolio_list',
			[
				'label' => esc_html__('Portfolio List', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_one_portfolio_list->get_controls(),
				'prevent_empty' => false,
				'condition' => [
					'layout_type' => ['layout_one', 'layout_seven']
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$layout_two_portfolio_list = new \Elementor\Repeater();

		$layout_two_portfolio_list->add_control(
			'select_portfolio',
			[
				'label'       => esc_html__('Select Portfolio', 'tekprof-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => rt_select_post('tekprof_portfolio'),
				'label_block' => true,
			]
		);

		$layout_two_portfolio_list->add_control(
			'title',
			[
				'label' => esc_html__('Custom Title', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'rows' => '2',
				'placeholder' => esc_html__('Add Title', 'tekprof-toolkit'),
				'default' => esc_html__('Website Development', 'tekprof-toolkit'),
				'description' => esc_html__('Keep empty to use default title', 'tekprof-toolkit'),
				'label_block' => true
			]
		);

		$layout_two_portfolio_list->add_control(
			'summary',
			[
				'label' => esc_html__('Custom Summary', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => '2',
				'placeholder' => esc_html__('Add Summary', 'tekprof-toolkit'),
				'description' => esc_html__('Keep empty to use default title', 'tekprof-toolkit'),
				'label_block' => true
			]
		);

		$layout_two_portfolio_list->add_control(
			'read_more',
			[
				'label' => esc_html__('Read More', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'rows' => '2',
				'placeholder' => esc_html__('Add Read More', 'tekprof-toolkit'),
				'default' => esc_html__('Case Details', 'tekprof-toolkit'),
				'label_block' => true
			]
		);


		$layout_two_portfolio_list->add_control(
			'image',
			[
				'label' => esc_html__('image', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'layout_two_portfolio_list',
			[
				'label' => esc_html__('Portfolio List', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_two_portfolio_list->get_controls(),
				'prevent_empty' => false,
				'condition' => [
					'layout_type' => ['layout_two', 'layout_three']
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$layout_three_portfolio_list = new \Elementor\Repeater();

		$layout_three_portfolio_list->add_control(
			'select_portfolio',
			[
				'label'       => esc_html__('Select Portfolio', 'tekprof-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => rt_select_post('tekprof_portfolio'),
				'label_block' => true,
			]
		);

		$layout_three_portfolio_list->add_control(
			'title',
			[
				'label' => esc_html__('Custom Title', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'rows' => '2',
				'placeholder' => esc_html__('Add Title', 'tekprof-toolkit'),
				'default' => esc_html__('Website Development', 'tekprof-toolkit'),
				'description' => esc_html__('Keep empty to use default title', 'tekprof-toolkit'),
				'label_block' => true
			]
		);


		$layout_three_portfolio_list->add_control(
			'image',
			[
				'label' => esc_html__('image', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'layout_three_portfolio_list',
			[
				'label' => esc_html__('Portfolio List', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_three_portfolio_list->get_controls(),
				'prevent_empty' => false,
				'condition' => [
					'layout_type' => 'layout_four'
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$layout_five_portfolio_list = new \Elementor\Repeater();

		$layout_five_portfolio_list->add_control(
			'select_portfolio',
			[
				'label'       => esc_html__('Select Portfolio', 'tekprof-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => rt_select_post('tekprof_portfolio'),
				'label_block' => true,
			]
		);

		$layout_five_portfolio_list->add_control(
			'title',
			[
				'label' => esc_html__('Custom Title', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'rows' => '2',
				'placeholder' => esc_html__('Add Title', 'tekprof-toolkit'),
				'default' => esc_html__('Website Development', 'tekprof-toolkit'),
				'description' => esc_html__('Keep empty to use default title', 'tekprof-toolkit'),
				'label_block' => true
			]
		);

		$layout_five_portfolio_list->add_control(
			'column_size',
			[
				'label'                => esc_html__('Set Column Base On Bootstrap', 'tekprof-toolkit'),
				'type'                 => \Elementor\Controls_Manager::SELECT,
				'options'              => [
					'2' => esc_html__('2 column', 'tekprof-toolkit'),
					'3' => esc_html__('3 column', 'tekprof-toolkit'),
					'4' => esc_html__('4 column', 'tekprof-toolkit'),
					'6' => esc_html__('6 column', 'tekprof-toolkit'),
					'8' => esc_html__('8 column', 'tekprof-toolkit'),
				],
				'default' => '4',
			]
		);


		$layout_five_portfolio_list->add_control(
			'image',
			[
				'label' => esc_html__('image', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'layout_five_portfolio_list',
			[
				'label' => esc_html__('Portfolio List', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_five_portfolio_list->get_controls(),
				'prevent_empty' => false,
				'condition' => [
					'layout_type' => 'layout_five'
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'more_portfolio_section',
			[
				'label' => esc_html__('More Portfolio Button', 'tekprof-toolkit'),
				'condition' => [
					'layout_type' => ['layout_ten']
				]
			]
		);

		$this->add_control(
			'more_portfolio_button_label',
			[
				'label' => esc_html__('Button Label', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Explore Projects', 'tekprof-toolkit'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'more_portfolio_button_url',
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

		//Content style
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Content Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2', ['layout_three', 'layout_five']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title, {{WRAPPER}} .case-top-wrap p', ['layout_three', 'layout_five']);

		tekprof_elementor_style_options($this, 'Portfolio Title', '{{WRAPPER}} .feature-item.style-two .content .title a, {{WRAPPER}} .title a,{{WRAPPER}} .project-item-two .content h4 a, {{WRAPPER}} .content a', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_seven']);
		tekprof_elementor_style_options($this, 'Portfolio Category', '{{WRAPPER}} .feature-item.style-two .content .tags a,{{WRAPPER}} .case-item .content .tag, {{WRAPPER}} .tag,{{WRAPPER}} .case-item-two span, {{WRAPPER}} .content .tags a ', ['layout_one', 'layout_two', 'layout_three', 'layout_five', 'layout_seven']);
		tekprof_elementor_style_options($this, 'Portfolio Category Bg', '{{WRAPPER}} .feature-item.style-two .content .tags a, {{WRAPPER}} .tag', ['layout_one'], 'background-color');

		tekprof_elementor_style_options($this, 'Summary Text', '{{WRAPPER}} .feature-item .content p, {{WRAPPER}} .inner-content p, {{WRAPPER}} .content p', ['layout_one', 'layout_three', 'layout_seven']);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__('Button Style', 'tekprof-toolkit'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_type' => ['layout_two', 'layout_three'],
				],
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__('Text Color', 'tekprof-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label'     => esc_html__('Background Color', 'tekprof-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn, a.theme-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label'     => esc_html__('Hover Color', 'tekprof-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover, a.theme-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'button_hover_bg',
			[
				'label'     => esc_html__('Hover Background Color', 'tekprof-toolkit'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover, a.theme-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .theme-btn',
				'label' => esc_html__(' Typography', 'tekprof-addon'),
			]
		);

		$this->end_controls_section();

		$this->register_arrows_options(['layout_condition' => true]);

		$this->register_dots_options(['layout_condition' => true]);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		include rt_get_elementor_template('portfolio-one.php');
		include rt_get_elementor_template('portfolio-two.php');
		include rt_get_elementor_template('portfolio-three.php');
		include rt_get_elementor_template('portfolio-four.php');
		include rt_get_elementor_template('portfolio-five.php');
		include rt_get_elementor_template('portfolio-six.php');
		include rt_get_elementor_template('portfolio-seven.php');

?>

<?php
	}
}
