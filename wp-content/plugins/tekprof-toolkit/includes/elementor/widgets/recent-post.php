<?php

namespace TekprofToolkit\ElementorAddon\Widgets;

use TekprofToolkit\ElementorAddon\Templates\Posts;
use TekprofToolkit\ElementorAddon\Traits\Carousel_Helper;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;


class Recent_Post extends Widget_Base
{

	use Carousel_Helper;

	public function get_name()
	{
		return 'tekprof-recent-post';
	}

	public function get_title()
	{
		return esc_html__('Recent Post', 'tekprof-toolkit');
	}

	public function get_icon()
	{
		return 'eicon-posts-grid webtend-logo';
	}

	public function get_categories()
	{
		return ['tekprof_elements'];
	}

	public function get_keywords()
	{
		return ['tekprof', 'toolkit', 'webtend', 'recent', 'blog', 'post'];
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
				]
			]
		);

		$this->add_control(
			'post_type',
			[
				'label'       => esc_html__('Post Type', 'tekprof-toolkit'),
				'type'        => Controls_Manager::SELECT,
				'label_block' => false,
				'options'     => [
					'cpt'   => esc_html__('Blog Type', 'tekprof-toolkit'),
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
			]
		);


		$this->add_control(
			'layout_one_summary_text',
			[
				'label' => esc_html__('Summary Text', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Add Summary Text', 'tekprof-toolkit'),
				'default' => esc_html__('Default Summary Text', 'tekprof-toolkit'),
				'condition' => [
					'layout_type' => 'layout_three'
				]
			]
		);

		$this->add_control(
			'layout_one_button_label',
			[
				'label' => esc_html__('Button Label', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('View More Blog', 'tekprof-toolkit'),
				'label_block' => true,
				'condition' => [
					'layout_type' => ['layout_three', 'layout_six']
				]
			]
		);

		$this->add_control(
			'layout_one_button_url',
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
				'condition' => [
					'layout_type' => ['layout_three', 'layout_six']
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
				'default'     => 'h4',
				'toggle'      => false,
			]
		);

		$this->add_control(
			'title_word',
			[
				'label'   => esc_html__('Title Length', 'tekprof-toolkit'),
				'type'    => Controls_Manager::NUMBER,
				'default' => 8,
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label'        => esc_html__('Show Excerpt?', 'tekprof-toolkit'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'tekprof-toolkit'),
				'label_off'    => esc_html__('No', 'tekprof-toolkit'),
				'default'      => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'excerpt_count',
			[
				'label'     => esc_html__('Excerpt Word', 'tekprof-toolkit'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 12,
				'condition' => [
					'show_excerpt' => 'yes',
				],
			]
		);

		$this->add_control(
			'show_read_more',
			[
				'label'        => esc_html__('Show Read More', 'tekprof-toolkit'),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => esc_html__('Yes', 'tekprof-toolkit'),
				'label_off'    => esc_html__('No', 'tekprof-toolkit'),
				'return_value' => 'yes',
				'separator'    => 'before',
			]
		);

		$this->add_control(
			'read_more_text',
			[
				'label'     => esc_html__('Read More Text', 'tekprof-toolkit'),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__('Read More', 'tekprof-toolkit'),
				'condition' => [
					'show_read_more' => 'yes',
				],
			]
		);

		$this->add_control(
			'show_thumbnail',
			[
				'label'        => esc_html__('Show Thumbnail?', 'tekprof-toolkit'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'tekprof-toolkit'),
				'label_off'    => esc_html__('No', 'tekprof-toolkit'),
				'default'      => 'yes',
				'return_value' => 'yes',
				'separator'    => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'post_thumbnail',
				'default'   => 'large',
				'exclude'   => [
					'custom',
				],
				'condition' => [
					'show_thumbnail' => 'yes',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'left_post_content',
			[
				'label' => esc_html__('Left Post', 'tekprof-toolkit'),
				'condition' => [
					'layout_type' => 'layout_five'
				]
			]
		);

		$this->add_control(
			'select_left_post',
			[
				'label'       => esc_html__('Select Left Posts', 'tekprof-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => rt_select_post(),
				'label_block' => true,
			]
		);

		$this->add_control(
			'left_post_custom_title',
			[
				'label'   => esc_html__('Custom Title', 'tekprof-toolkit'),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Default Title', 'tekprof-toolkit'),
				'description' => esc_html__('Keep empty if you want to use default', 'tekprof-toolkit'),
			]
		);

		$this->add_control(
			'left_post_custom_summary_text',
			[
				'label'   => esc_html__('Custom Summary Text', 'tekprof-toolkit'),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Default Text', 'tekprof-toolkit'),
				'description' => esc_html__('Keep empty if you want to use default', 'tekprof-toolkit'),
			]
		);

		$this->add_control(
			'left_post_custom_image',
			[
				'label' => esc_html__('Custom Image', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'query_content',
			[
				'label' => esc_html__('Query', 'tekprof-toolkit'),
				'condition' => [
					'post_type' => 'cpt'
				]
			]
		);

		$this->add_control(
			'post_from',
			[
				'label'   => esc_html__('Post From', 'tekprof-toolkit'),
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
				'label'       => esc_html__('Select Posts', 'tekprof-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => rt_select_post(),
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
				'options'     => rt_select_category(),
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
				'default' => 3,
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

		$this->add_control(
			'show_pagination',
			[
				'label'        => esc_html__('Show Pagination', 'tekprof-toolkit'),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => esc_html__('Yes', 'tekprof-toolkit'),
				'label_off'    => esc_html__('No', 'tekprof-toolkit'),
				'return_value' => 'yes',
				'condition'    => [
					'layout_type' => ['layout_six'],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'custom_elementor_post_list',
			[
				'label' => esc_html__('Post With Elementor ', 'tekprof-toolkit'),
				'condition' => [
					'post_type' => 'elementor-field'
				]
			]
		);

		$layout_one_post_list = new \Elementor\Repeater();

		$layout_one_post_list->add_control(
			'select_post',
			[
				'label'       => esc_html__('Select Post', 'tekprof-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => rt_select_post('post'),
				'label_block' => true,
			]
		);

		$layout_one_post_list->add_control(
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

		$layout_one_post_list->add_control(
			'summary_text',
			[
				'label' => esc_html__('Summary Text', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => '2',
				'placeholder' => esc_html__('Add Summary Text', 'tekprof-toolkit'),
				'default' => esc_html__('Default Summary Text', 'tekprof-toolkit'),
				'description' => esc_html__('Keep empty to use default Summary', 'tekprof-toolkit'),
				'label_block' => true
			]
		);


		$layout_one_post_list->add_control(
			'image',
			[
				'label' => esc_html__('image', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'layout_one_post_list',
			[
				'label' => esc_html__('Post List', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_one_post_list->get_controls(),
				'prevent_empty' => false,
				'condition' => [
					'layout_type' => ['layout_one', 'layout_two', 'layout_three'],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$layout_four_post_list = new \Elementor\Repeater();

		$layout_four_post_list->add_control(
			'select_post',
			[
				'label'       => esc_html__('Select Post', 'tekprof-toolkit'),
				'type'        => Controls_Manager::SELECT2,
				'options'     => rt_select_post('post'),
				'label_block' => true,
			]
		);

		$layout_four_post_list->add_control(
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


		$layout_four_post_list->add_control(
			'image',
			[
				'label' => esc_html__('image', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [],
			]
		);

		$this->add_control(
			'layout_four_post_list',
			[
				'label' => esc_html__('Post List', 'tekprof-toolkit'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $layout_four_post_list->get_controls(),
				'prevent_empty' => false,
				'condition' => [
					'layout_type' => ['layout_four', 'layout_five', 'layout_six'],
				],
				'title_field' => '{{{ title }}}',
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

		tekprof_elementor_style_options($this, 'Section Title', '{{WRAPPER}} .section-title h2', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);
		tekprof_elementor_style_options($this, 'Section Sub Title', '{{WRAPPER}} .section-title .sub-title,{{WRAPPER}} .subtitle', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);

		tekprof_elementor_style_options($this, 'Post Title', '{{WRAPPER}} .title a,{{WRAPPER}} .blog-four-item .content h5', ['layout_one', 'layout_two', 'layout_three', 'layout_four', 'layout_five', 'layout_six']);
		tekprof_elementor_style_options($this, 'Category', '{{WRAPPER}} .blog-meta li:first-child a', ['layout_two', 'layout_three', 'layout_six']);
		tekprof_elementor_style_options($this, 'Summary Text', '{{WRAPPER}} .blog-item .content p, {{WRAPPER}} .summary-text, {{WRAPPER}} .content p', ['layout_one', 'layout_two', 'layout_three', 'layout_five']);
		tekprof_elementor_style_options($this, 'Author', '{{WRAPPER}} .blog-item-five .content .author a,{{WRAPPER}} .blog-meta li:first-child a', ['layout_four', 'layout_five', 'layout_six']);
		tekprof_elementor_style_options($this, 'Date', '{{WRAPPER}} .blog-meta li:last-child a, {{WRAPPER}} .content .blog-meta li:not(:first-child)', ['layout_one', 'layout_two', 'layout_three', 'layout_five', 'layout_six']);
		tekprof_elementor_style_options($this, 'Read More', '{{WRAPPER}} .read-more', ['layout_one', 'layout_two', 'layout_four', 'layout_five']);

		tekprof_elementor_style_options($this, 'Meta', '{{WRAPPER}} .content .blog-meta li,{{WRAPPER}} .blog-item-five .content .blog-meta li a ', ['layout_four']);

		$this->end_controls_section();


		$this->register_arrows_options(['layout_condition' => true]);

		$this->register_dots_options(['layout_condition' => true]);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		include rt_get_elementor_template('recent-post-one.php');
		include rt_get_elementor_template('recent-post-two.php');
		include rt_get_elementor_template('recent-post-three.php');
		include rt_get_elementor_template('recent-post-four.php');
		include rt_get_elementor_template('recent-post-five.php');
		include rt_get_elementor_template('recent-post-six.php');
	}
}
