<?php

namespace TekprofToolkit\Helper;

defined('ABSPATH') || exit;

class Tekprof_Admin_Menu
{

	protected static $instance = null;

	public static function instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct()
	{
		add_action('admin_bar_menu', [$this, 'add_admin_bar_menu'], 99);
	}

	public function add_admin_bar_menu($admin_bar)
	{
		$admin_bar->add_menu([
			'id'    => 'tekprof-menu-item',
			'title' => __('Tekprof', 'tekprof-toolkit'),
			'href'  => get_site_url(null, 'wp-admin/admin.php?page=tekprof_dashboard'),
			'meta'  => [
				'title'  => __('Tekprof', 'tekprof-toolkit'),
				'target' => '_self',
			],
		]);

		$admin_bar->add_menu([
			'parent' => 'tekprof-menu-item',
			'id'     => 'tekprof-welcome',
			'title'  => __('Welcome', 'tekprof-toolkit'),
			'href'   => get_site_url(null, 'wp-admin/admin.php?page=tekprof_dashboard'),
			'meta'   => [
				'title'  => __('Welcome', 'tekprof-toolkit'),
				'target' => '_self',
			],
		]);

		$admin_bar->add_menu([
			'parent' => 'tekprof-menu-item',
			'id'     => 'tekprof-theme-option',
			'title'  => __('Theme Options', 'tekprof-toolkit'),
			'href'   => get_site_url(null, 'wp-admin/admin.php?page=tekprof_options'),
			'meta'   => [
				'title'  => __('Theme Options', 'tekprof-toolkit'),
				'target' => '_self',
			],
		]);

		$admin_bar->add_menu([
			'parent' => 'tekprof-menu-item',
			'id'     => 'tekprof-help-center',
			'title'  => __('Help Center', 'tekprof-toolkit'),
			'href'   => get_site_url(null, 'wp-admin/admin.php?page=tekprof_help_center'),
			'meta'   => [
				'title'  => __('Help Center', 'tekprof-toolkit'),
				'target' => '_self',
			],
		]);
	}
}

Tekprof_Admin_Menu::instance();
