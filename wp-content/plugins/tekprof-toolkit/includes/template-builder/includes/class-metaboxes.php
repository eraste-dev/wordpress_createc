<?php

namespace TekprofToolkit\TemplateBuilder;

use CSF;

defined('ABSPATH') || exit;

class Template_Metaboxes
{

	protected static $instance = null;

	private $prefix = 'tekprof_template_meta';

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

		$this->init_metaboxes();

		add_filter('wp_nav_menu_item_custom_fields', [$this, 'mega_menu_meta_fields'], 10, 2);
		add_action('wp_update_nav_menu_item', [$this, 'save_mega_menu_meta'], 10, 3);
	}

	public function init_metaboxes()
	{
		CSF::createMetabox($this->prefix, [
			'title'        => esc_html__('Template Settings', 'tekprof-toolkit'),
			'post_type'    => 'tekprof_template',
			'show_restore' => true,
			'theme'        => 'dark',
			'data_type'    => 'unserialize',
		]);

		CSF::createSection($this->prefix, [
			'fields' => [
				[
					'id'     => 'tekprof_tb_settings',
					'type'   => 'fieldset',
					'title'  => esc_html__('Common Settings', 'tekprof-toolkit'),
					'fields' => [
						[
							'id'          => 'template_type',
							'type'        => 'select',
							'title'       => esc_html__('Template Type', 'tekprof-toolkit'),
							'placeholder' => esc_html__('Select Type', 'tekprof-toolkit'),
							'options'     => [
								'header'    => esc_html__('Header', 'tekprof-toolkit'),
								'footer'    => esc_html__('Footer', 'tekprof-toolkit'),
								'mega_menu' => esc_html__('Mega Menu', 'tekprof-toolkit'),
								'block'     => esc_html__('Block', 'tekprof-toolkit'),
								'popup'     => esc_html__('Popup', 'tekprof-toolkit'),
								'offcanvas' => esc_html__('OffCanvas', 'tekprof-toolkit'),
							],
							'default'     => 'block',
						],
						[
							'id'         => 'mega_menu_width',
							'type'       => 'select',
							'title'      => esc_html__('Mega Menu Width', 'tekprof-toolkit'),
							'subtitle'   => esc_html__('Default is full width.', 'tekprof-toolkit'),
							'options'    => [
								'full'       => esc_html__('Full', 'tekprof-toolkit'),
								'container'  => esc_html__('Container', 'tekprof-toolkit'),
								'menu-area' => esc_html__('Menu Area', 'tekprof-toolkit'),
								'custom'     => esc_html__('Custom', 'tekprof-toolkit'),
							],
							'default'    => 'full',
							'dependency' => ['template_type', '==', 'mega_menu'],
						],
						[
							'id'         => 'set_mega_menu_width',
							'type'       => 'dimensions',
							'title'      => esc_html__('Menu Custom Width', 'tekprof-toolkit'),
							'default'    => [
								'width' => '1650',
							],
							'height'     => false,
							'units'      => ['px'],
							'show_units' => false,
							'dependency' => ['template_type|mega_menu_width', '==|==', 'mega_menu|custom'],
						],
						[
							'id'         => 'popup_width',
							'type'       => 'select',
							'title'      => esc_html__('Popup Width', 'tekprof-toolkit'),
							'subtitle'   => esc_html__('Select or type a value (PX)', 'tekprof-toolkit'),
							'options'    => [
								'full'   => esc_html__('Full', 'tekprof-toolkit'),
								'custom' => esc_html__('Custom', 'tekprof-toolkit'),
							],
							'default'    => 'custom',
							'dependency' => ['template_type', '==', 'popup'],
						],
						[
							'id'         => 'set_popup_width',
							'type'       => 'dimensions',
							'title'      => esc_html__('Popup Width', 'tekprof-toolkit'),
							'default'    => [
								'width' => '820',
							],
							'height'     => false,
							'units'      => ['px'],
							'show_units' => false,
							'dependency' => ['template_type|popup_width', '==|==', 'popup|custom'],
						],
						[
							'id'         => 'popup_height',
							'type'       => 'select',
							'title'      => esc_html__('Popup Height', 'tekprof-toolkit'),
							'subtitle'   => esc_html__('Set the popup max height.', 'tekprof-toolkit'),
							'options'    => [
								'fit_content' => esc_html__('Fit Content', 'tekprof-toolkit'),
								'full'        => esc_html__('Full', 'tekprof-toolkit'),
								'custom'      => esc_html__('Custom', 'tekprof-toolkit'),
							],
							'default'    => 'fit_content',
							'dependency' => ['template_type', '==', 'popup'],
						],
						[
							'id'         => 'set_popup_height',
							'type'       => 'dimensions',
							'title'      => esc_html__('Height', 'tekprof-toolkit'),
							'default'    => [
								'height' => '520',
							],
							'width'      => false,
							'units'      => ['px'],
							'show_units' => false,
							'dependency' => ['template_type|popup_height', '==|==', 'popup|custom'],
						],
						[
							'id'         => 'popup_position',
							'type'       => 'select',
							'title'      => esc_html__('Popup Position', 'tekprof-toolkit'),
							'subtitle'   => esc_html__('Choose the popup position on page.', 'tekprof-toolkit'),
							'options'    => [
								'center-center' => esc_html__('Center Center', 'tekprof-toolkit'),
								'center-left'   => esc_html__('Center Left', 'tekprof-toolkit'),
								'center-right'  => esc_html__('Center Right', 'tekprof-toolkit'),
								'bottom-center' => esc_html__('Bottom Center', 'tekprof-toolkit'),
								'top-center'    => esc_html__('Top Center', 'tekprof-toolkit'),
								'bottom-left'   => esc_html__('Bottom Left', 'tekprof-toolkit'),
								'top-left'      => esc_html__('Top Left', 'tekprof-toolkit'),
								'bottom-right'  => esc_html__('Bottom Right', 'tekprof-toolkit'),
								'top-right'     => esc_html__('Top Right', 'tekprof-toolkit'),
							],
							'default'    => 'center-center',
							'dependency' => ['template_type', '==', 'popup'],
						],
						[
							'id'         => 'popup_bg_color',
							'type'       => 'color',
							'title'      => esc_html__('Popup Background Color', 'tekprof-toolkit'),
							'dependency' => ['template_type', '==', 'popup'],
							'default'    => '',
						],
						[
							'id'         => 'popup_overly_color',
							'type'       => 'color',
							'title'      => esc_html__('Popup Overly Color', 'tekprof-toolkit'),
							'dependency' => ['template_type', '==', 'popup'],
							'default'    => '',
						],
						[
							'id'         => 'popup_close_color',
							'type'       => 'color',
							'title'      => esc_html__('Popup Close Color', 'tekprof-toolkit'),
							'dependency' => ['template_type', '==', 'popup'],
							'default'    => '',
						],
						[
							'id'         => 'popup_close_bg',
							'type'       => 'color',
							'title'      => esc_html__('Popup Close Color', 'tekprof-toolkit'),
							'dependency' => ['template_type', '==', 'popup'],
							'default'    => '',
						],
						[
							'id'         => 'popup_close_size',
							'type'       => 'dimensions',
							'title'      => esc_html__('Popup Close Size', 'tekprof-toolkit'),
							'dependency' => ['template_type', '==', 'popup'],
							'units'      => ['px'],
							'show_units' => false,
						],
						[
							'id'         => 'popup_close_radius',
							'type'       => 'number',
							'title'      => esc_html__('Popup Close Radius', 'tekprof-toolkit'),
							'default'    => 0,
							'dependency' => ['template_type', '==', 'popup'],
						],
						[
							'id'         => 'popup_delay',
							'type'       => 'number',
							'title'      => esc_html__('Popup Delay', 'tekprof-toolkit'),
							'dependency' => ['template_type', '==', 'popup'],
							'default'    => 3,
							'subtitle'   => esc_html__('Show when page is loaded (Second).', 'tekprof-toolkit'),
						],
						[
							'id'         => 'offcanvas_width',
							'type'       => 'dimensions',
							'title'      => esc_html__('Width', 'tekprof-toolkit'),
							'height'     => false,
							'units'      => ['px'],
							'default'    => [
								'width' => '420',
							],
							'show_units' => false,
							'dependency' => ['template_type', '==', 'offcanvas'],
						],
					],
				],
				[
					'id'           => 'tekprof_tb_include',
					'type'         => 'repeater',
					'title'        => esc_html__('Display On', 'tekprof-toolkit'),
					'subtitle'     => esc_html__('Select the locations where this item should be visible.', 'tekprof-toolkit'),
					'button_title' => esc_html__('Add Display Rule', 'tekprof-toolkit'),
					'dependency'   => ['template_type', 'any', 'header,footer,popup'],
					'fields'       => [
						[
							'type'    => 'subheading',
							'content' => esc_html__('Define Rule', 'tekprof-toolkit'),
						],
						[
							'id'      => 'rule',
							'type'    => 'select',
							'title'   => esc_html__('Display on', 'tekprof-toolkit'),
							'options' => [
								'entire_website'     => esc_html__('Entire Website', 'tekprof-toolkit'),
								'all_pages'          => esc_html__('All Pages', 'tekprof-toolkit'),
								'front_page'         => esc_html__('Front Page', 'tekprof-toolkit'),
								'post_page'          => esc_html__('Post Page', 'tekprof-toolkit'),
								'post_details'       => esc_html__('Post Details', 'tekprof-toolkit'),
								'all_archive'        => esc_html__('All Archive', 'tekprof-toolkit'),
								'date_archive'       => esc_html__('Date Archive', 'tekprof-toolkit'),
								'author_archive'     => esc_html__('Author Archive', 'tekprof-toolkit'),
								'search_page'        => esc_html__('Search Page', 'tekprof-toolkit'),
								'404_page'           => esc_html__('404 Page', 'tekprof-toolkit'),
								'specific_pages'     => esc_html__('Specific Pages', 'tekprof-toolkit'),
								'specific_posts'     => esc_html__('Specific Posts', 'tekprof-toolkit'),
								'shop_page'          => esc_html__('Shop Page', 'tekprof-toolkit'),
								'product_details'    => esc_html__('Product Details', 'tekprof-toolkit'),
								'specific_products'  => esc_html__('Specific Products', 'tekprof-toolkit'),
								'portfolio_details'  => esc_html__('Portfolio Details', 'tekprof-toolkit'),
								'specific_portfolio' => esc_html__('Specific Portfolio', 'tekprof-toolkit'),
							],
						],
						[
							'id'          => 'page_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Pages', 'tekprof-toolkit'),
							'placeholder' => esc_html__('Select Pages', 'tekprof-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'pages',
							'dependency'  => ['rule', '==', 'specific_pages'],
						],
						[
							'id'          => 'posts_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Posts', 'tekprof-toolkit'),
							'placeholder' => esc_html__('Select Posts', 'tekprof-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'posts',
							'dependency'  => ['rule', '==', 'specific_posts'],
						],
						[
							'id'          => 'product_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Products', 'tekprof-toolkit'),
							'placeholder' => esc_html__('Select Products', 'tekprof-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'post',
							'query_args'  => [
								'post_type' => 'product',
							],
							'dependency'  => ['rule', '==', 'specific_products'],
						],
						[
							'id'          => 'portfolio_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Portfolio', 'tekprof-toolkit'),
							'placeholder' => esc_html__('Select Portfolio', 'tekprof-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'post',
							'query_args'  => [
								'post_type' => 'tekprof_portfolio',
							],
							'dependency'  => ['rule', '==', 'specific_portfolio'],
						],
					],
				],
				[
					'id'           => 'tekprof_tb_exclude',
					'type'         => 'repeater',
					'title'        => esc_html__('Hide On', 'tekprof-toolkit'),
					'subtitle'     => esc_html__('Select the locations where this item should be visible.', 'tekprof-toolkit'),
					'button_title' => esc_html__('Add Hide Rule', 'tekprof-toolkit'),
					'dependency'   => ['template_type', 'any', 'header,footer,popup'],
					'fields'       => [
						[
							'type'    => 'subheading',
							'content' => esc_html__('Hide Rule', 'tekprof-toolkit'),
						],
						[
							'id'      => 'rule',
							'type'    => 'select',
							'title'   => esc_html__('Hide on', 'tekprof-toolkit'),
							'options' => [
								'entire_website'     => esc_html__('Entire Website', 'tekprof-toolkit'),
								'all_pages'          => esc_html__('All Pages', 'tekprof-toolkit'),
								'front_page'         => esc_html__('Front Page', 'tekprof-toolkit'),
								'post_page'          => esc_html__('Post Page', 'tekprof-toolkit'),
								'post_details'       => esc_html__('Post Details', 'tekprof-toolkit'),
								'all_archive'        => esc_html__('All Archive', 'tekprof-toolkit'),
								'date_archive'       => esc_html__('Date Archive', 'tekprof-toolkit'),
								'author_archive'     => esc_html__('Author Archive', 'tekprof-toolkit'),
								'search_page'        => esc_html__('Search Page', 'tekprof-toolkit'),
								'404_page'           => esc_html__('404 Page', 'tekprof-toolkit'),
								'specific_pages'     => esc_html__('Specific Pages', 'tekprof-toolkit'),
								'specific_posts'     => esc_html__('Specific Posts', 'tekprof-toolkit'),
								'shop_page'          => esc_html__('Shop Page', 'tekprof-toolkit'),
								'product_details'    => esc_html__('Product Details', 'tekprof-toolkit'),
								'specific_products'  => esc_html__('Specific Products', 'tekprof-toolkit'),
								'portfolio_details'  => esc_html__('Portfolio Details', 'tekprof-toolkit'),
								'specific_portfolio' => esc_html__('Specific Portfolio', 'tekprof-toolkit'),
							],
						],
						[
							'id'          => 'page_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Pages', 'tekprof-toolkit'),
							'placeholder' => esc_html__('Select Pages', 'tekprof-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'pages',
							'dependency'  => ['rule', '==', 'specific_pages'],
						],
						[
							'id'          => 'posts_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Posts', 'tekprof-toolkit'),
							'placeholder' => esc_html__('Select Posts', 'tekprof-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'posts',
							'dependency'  => ['rule', '==', 'specific_posts'],
						],
						[
							'id'          => 'product_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Products', 'tekprof-toolkit'),
							'placeholder' => esc_html__('Select Products', 'tekprof-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'post',
							'query_args'  => [
								'post_type' => 'product',
							],
							'dependency'  => ['rule', '==', 'specific_products'],
						],
						[
							'id'          => 'portfolio_ids',
							'type'        => 'select',
							'title'       => esc_html__('Select Portfolio', 'tekprof-toolkit'),
							'placeholder' => esc_html__('Select Portfolio', 'tekprof-toolkit'),
							'chosen'      => true,
							'ajax'        => true,
							'multiple'    => true,
							'sortable'    => true,
							'options'     => 'post',
							'query_args'  => [
								'post_type' => 'tekprof_portfolio',
							],
							'dependency'  => ['rule', '==', 'specific_portfolio'],
						],
					],
				],
			],
		]);
	}

	public function mega_menu_meta_fields($item_id, $item)
	{
		if ($item->object === 'tekprof_template') {
			$post_type_object = get_post_type_object('tekprof_template');
			$url              = get_post_meta($item_id, '_tekprof_mega_menu_url', true);

			if (! $post_type_object) {
				return;
			}

			if (! current_user_can('edit_post', $item->object_id)) {
				return;
			}

			if ($post_type_object->_edit_link) {
				$link = admin_url(sprintf($post_type_object->_edit_link . '&action=elementor', $item->object_id));
			} else {
				$link = '';
			}

			wp_nonce_field('tekprof_mm_meta_action', 'tekprof_mm_meta_name');

			echo '<p class="description description-wide">
				<label for="edit-menu-item-url-' . $item_id . '">
					' . __('URL', 'tekprof-toolkit') . '<br>
					<input type="text" id="edit-menu-item-url-' . $item_id . '" class="widefat code edit-menu-item-url" name="menu-item-url[' . $item_id . ']" value="' . $url . '">
				</label>
			</p>';

			echo '<a style="display: inline-block; margin: 12px 0; float: left" href="' . esc_url($link) . '">' . esc_html__('Edit with Elementor', 'webtend-toolkit') . '</a>';
		}
	}

	public function save_mega_menu_meta($menu_id, $menu_item_db_id, $menu_item_data)
	{
		if (! isset($_POST['tekprof_mm_meta_name']) || ! wp_verify_nonce($_POST['tekprof_mm_meta_name'], 'tekprof_mm_meta_action')) {
			return;
		}

		if (isset($_POST['menu-item-url'][$menu_item_db_id])) {
			$url = sanitize_text_field($_POST['menu-item-url'][$menu_item_db_id]);
			update_post_meta($menu_item_db_id, '_tekprof_mega_menu_url', $url);
		}
	}
}

Template_Metaboxes::instance();
