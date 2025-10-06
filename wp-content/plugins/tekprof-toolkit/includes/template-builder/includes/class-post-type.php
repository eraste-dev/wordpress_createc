<?php

namespace TekprofToolkit\TemplateBuilder;

defined('ABSPATH') || exit;

class Template_Post_Type
{

	protected static $instance = null;

	private $type = 'tekprof_template';
	private $slug = 'tekprof_template';
	private $name;
	private $singular_name;
	private $plural_name;

	public static function instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct()
	{
		$this->name          = __('Template Builder', 'tekprof-toolkit');
		$this->singular_name = __('Template', 'tekprof-toolkit');
		$this->plural_name   = __('Templates', 'tekprof-toolkit');

		add_action('init', [$this, 'register_post_type']);
		add_filter('single_template', [$this, 'custom_templates']);
	}

	public function register_post_type()
	{
		$labels = [
			'name'               => $this->name,
			'singular_name'      => $this->singular_name,
			'add_new'            => sprintf(esc_html__('Add New %s', 'tekprof-toolkit'), $this->singular_name),
			'add_new_item'       => sprintf(esc_html__('Add New %s', 'tekprof-toolkit'), $this->singular_name),
			'edit_item'          => sprintf(esc_html__('Edit %s', 'tekprof-toolkit'), $this->singular_name),
			'new_item'           => sprintf(esc_html__('New %s', 'tekprof-toolkit'), $this->singular_name),
			'all_items'          => sprintf(esc_html__('All %s', 'tekprof-toolkit'), $this->plural_name),
			'view_item'          => sprintf(esc_html__('View %s', 'tekprof-toolkit'), $this->name),
			'search_items'       => sprintf(esc_html__('Search %s', 'tekprof-toolkit'), $this->name),
			'not_found'          => sprintf(esc_html__('No %s found', 'tekprof-toolkit'), strtolower($this->name)),
			'not_found_in_trash' => sprintf(esc_html__('No %s found in Trash', 'tekprof-toolkit'), strtolower($this->name)),
			'parent_item_colon'  => '',
			'menu_name'          => $this->name,
		];

		$args = [
			'labels'              => $labels,
			'has_archive'         => false,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'show_in_admin_bar'   => false,
			'public'              => true,
			'show_in_nav_menu'    => true,
			'rewrite'             => ['slug' => $this->slug],
			'show_in_rest'        => false,
			'exclude_from_search' => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'menu_icon'           => 'dashicons-layout',
			'supports'            => ['title', 'author', 'elementor'],
		];

		register_post_type($this->type, $args);
	}

	public function custom_templates($single_template)
	{
		global $post;

		if ($post->post_type == $this->type) {
			$meta = get_post_meta($post->ID, 'tekprof_tb_settings', true);

			if (isset($meta['template_type'])) {
				$template_type = $meta['template_type'];
			} else {
				$template_type = '';
			}

			if ('popup' === $template_type) {
				$single_template = RT_INCLUDES . '/template-builder/templates/popup.php';
			} elseif ('offcanvas' === $template_type) {
				$single_template = RT_INCLUDES . '/template-builder/templates/offcanvas.php';
			} else {
				$single_template = RT_INCLUDES . '/template-builder/templates/canvas.php';
			}
		}

		return $single_template;
	}
}

Template_Post_Type::instance();
