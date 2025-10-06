<?php

namespace TekprofToolkit\ElementorAddon\Helper;

defined('ABSPATH') || exit;

class Tekprof_Icons_Manager
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
		add_filter('elementor/icons_manager/additional_tabs', [$this, 'add_icons_tab']);
	}

	public function add_icons_tab($tabs)
	{
		$icon_css = RT_VENDOR . '/flaticon/flaticon.min.css';

		$tabs['tekprof-flaticon'] = [
			'name'          => 'tekprof-flaticon',
			'label'         => esc_html__('Tekprof Icons', 'tekprof-toolkit'),
			'url'           => $icon_css,
			'prefix'        => '',
			'displayPrefix' => '',
			'labelIcon'     => 'far fa-folder-open',
			'ver'           => '1.0',
			'icons'         => $this->icon_list(),
			'native'        => true,
		];

		return $tabs;
	}

	public function icon_list()
	{
		return [
			"flaticon-nanotechnology",
			"flaticon-technology",
			"flaticon-it",
			"flaticon-network-security",
			"flaticon-cloud",
			"flaticon-data-management",
			"flaticon-idea",
			"flaticon-grow",
			"flaticon-data-protection",
			"flaticon-graphic-design",
			"flaticon-flexibility",
			"flaticon-layers",
			"flaticon-globe-grid",
			"flaticon-technical-support",
			"flaticon-big-data-analytics",
			"flaticon-integrations",
			"flaticon-nanotechnology-1",
			"flaticon-expert-team",
			"flaticon-experts",
			"flaticon-loyal-customer",
			"flaticon-human-resources",
			"flaticon-algorithm",
			"flaticon-troubleshooting",
			"flaticon-service",
			"flaticon-technical-support-1",
			"flaticon-technical-support-2",
			"flaticon-cloud-network",
			"flaticon-cyber-security",
			"flaticon-layer",
			"flaticon-cloud-1",
			"flaticon-cyber-security-1",
			"flaticon-cloud-computing",
			"flaticon-data",
			"flaticon-cyber-security-2",
			"flaticon-recovery",
			"flaticon-protection",
			"flaticon-protection-1",
			"flaticon-quality",
			"flaticon-experience",
			"flaticon-professional-success",
		];
	}
}

Tekprof_Icons_Manager::instance();
