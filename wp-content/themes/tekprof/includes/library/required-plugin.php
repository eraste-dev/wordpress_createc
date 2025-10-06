<?php

/**
 * Required Plugin for Tekprof theme
 *
 * @package Tekprof
 */

if (! defined('ABSPATH')) {
	exit('No direct script access allowed');
}

add_action('tgmpa_register', 'tekprof_register_required_plugins');
function tekprof_register_required_plugins()
{
	$plugins = [
		[
			'name'     => esc_html__('Elementor Website Builder', 'tekprof'),
			'slug'     => 'elementor',
			'required' => true,
			'version'  => '3.12',
		],
		[
			'name'     => esc_html__('Tekprof Toolkit', 'tekprof'),
			'slug'     => 'tekprof-toolkit',
			'source'   => 'https://wp.webtend.net/tekprof/tf-data/tekprof-toolkit.zip',
			'required' => true,
			'version'  => '1.0.0',
		],
		[
			'name'     => esc_html__('Contact Form 7', 'tekprof'),
			'slug'     => 'contact-form-7',
			'required' => false,
		],
		[
			'name'     => esc_html__('Breadcrumb NavXT', 'tekprof'),
			'slug'     => 'breadcrumb-navxt',
			'required' => false,
		],
		[
			'name'     => esc_html__('WooCommerce', 'tekprof'),
			'slug'     => 'woocommerce',
			'required' => false,
		],
		[
			'name'     => esc_html__('One Click Demo Import', 'tekprof'),
			'slug'     => 'one-click-demo-import',
			'required' => false,
		],
	];

	$config = [
		'id'           => 'tekprof_theme_plugins',
		'default_path' => '',
		'menu'         => 'tekprof_required_plugins',
		'parent_slug'  => 'tekprof_dashboard',
		'capability'   => 'manage_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
		'strings'      => [
			'menu_title' => esc_html__('Required Plugins', 'tekprof'),
			'page_title' => esc_html__('Required Plugins', 'tekprof'),
		],
	];

	tgmpa($plugins, $config);
}
