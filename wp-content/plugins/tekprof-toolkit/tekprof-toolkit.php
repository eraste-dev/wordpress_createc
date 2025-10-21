<?php

/**
 * Plugin Name: Tekprof Toolkit
 * Description: A Helper plugin for all Tekprof WordPress Themes
 * Plugin URI: #
 * Author: Webtend
 * Author URI: http://webtend.net/
 * Version: 1.0.2
 * Text Domain: tekprof-toolkit
 * License: GPL2 or later
 * License URI: http://www.gnu.org/licences/gpl-2.0.html
 */

/**
 * The Main Plugin Class
 */
final class Tekprof_Toolkit
{

	/**
	 * Instance of the class.
	 *
	 * @var Tekprof_Toolkit|null
	 */
	protected static $instance = null;

	/**
	 * Addon Version
	 *
	 * @since 1.0.0
	 * @var string The Plugin version.
	 */
	const version = '1.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the Plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Class Constructor
	 */
	private function __construct()
	{
		$this->define_constants();

		add_action('plugin_loaded', [$this, 'init_plugin']);
	}

	/**
	 * Initializes a singleton instance
	 *
	 * @return Tekprof_Toolkit
	 */
	public static function init()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Define the required plugin constants
	 */
	public function define_constants()
	{
		define('RT_VERSION', self::version);
		define('RT_FILE', __FILE__);
		define('RT_PATH', plugin_dir_path(RT_FILE));
		define('RT_URL', plugin_dir_url(RT_FILE));
		define('RT_ASSETS', untrailingslashit(RT_URL . 'assets'));
		define('RT_VENDOR', untrailingslashit(RT_URL . 'assets/vendor'));
		define('RT_INCLUDES', untrailingslashit(RT_PATH . 'includes'));
		define('RT_ELEMENTOR', untrailingslashit(RT_INCLUDES . '/elementor'));
		define('RT_WP_WIDGETS', untrailingslashit(RT_INCLUDES . '/wp-widgets'));
		define('RT_DEMO_PATH', untrailingslashit(RT_INCLUDES . '/demo-config'));
		define('RT_THEME_ASSETS', untrailingslashit(get_template_directory_uri()) . '/assets');
	}

	/**
	 * Load Text-domain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n()
	{
		load_plugin_textdomain('tekprof-toolkit', false, plugin_basename(dirname(__FILE__)) . '/languages');
	}

	/**
	 * Initialize the plugin
	 */
	public function init_plugin()
	{
		if ($this->is_compatible()) {
			$this->include_files();
		}
	}

	/**
	 * Get current theme slug
	 *
	 * @access public
	 * @static
	 *
	 * @return string
	 */
	public static function get_theme_slug()
	{
		return str_replace('-child', '', wp_get_theme()->get('TextDomain'));
	}

	/**
	 * Check Compatible
	 *
	 * @access public
	 * @static
	 *
	 * @return boolean
	 */
	public static function theme_is_compatible()
	{
		$plugin_name = trim(dirname(plugin_basename(__FILE__)));
		$theme_name  = self::get_theme_slug();

		return false !== stripos($plugin_name, $theme_name);
	}

	/**
	 * Check Theme Active OR Not
	 *
	 * @access public
	 * @static
	 *
	 * @return boolean
	 */
	public static function theme_is_active()
	{
		$theme_data = get_option('tekprof_theme_verify', []);
		$active     = true;

		if (is_array($theme_data) && ! empty($theme_data['token'])) {
			$active = true;
		}

		return $active;
	}

	/**
	 * Compatibility Checks
	 *
	 * Checks whether the site meets the addon requirement.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function is_compatible()
	{
		if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);

			return false;
		}

		if (! self::theme_is_compatible()) {
			add_action('admin_notices', [$this, 'admin_notice_missing_main_theme']);

			return false;
		}

		if (! self::theme_is_active()) {
			return false;
		}

		return true;
	}

	/**
	 * Include required plugin files
	 *
	 * @return void
	 */
	public function include_files()
	{
		include_once RT_INCLUDES . '/library/codestar-framework/codestar-framework.php';
		add_action('after_setup_theme', function () {
			include_once RT_INCLUDES . '/helper/class-assets.php';
			include_once RT_INCLUDES . '/helper/class-options.php';
			include_once RT_INCLUDES . '/helper/class-metaboxes.php';
			include_once RT_INCLUDES . '/helper/functions.php';
			include_once RT_INCLUDES . '/post-type/class-portfolio.php';
			include_once RT_INCLUDES . '/helper/class-maintenance.php';
			include_once RT_INCLUDES . '/helper/class-admin-menu.php';
			include_once RT_INCLUDES . '/helper/utility.php';


			if (did_action('elementor/loaded')) {
				include_once RT_ELEMENTOR . '/class-elementor-addon.php';
				include_once RT_INCLUDES . '/template-builder/class-template-builder.php';
			}

			include_once RT_WP_WIDGETS . '/class-widgets-setup.php';
		});

		include_once RT_DEMO_PATH . '/class-demo-config.php';
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version()
	{
		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'tekprof-toolkit'),
			'<strong>' . esc_html__('Tekprof Toolkit', 'tekprof-toolkit') . '</strong>',
			'<strong>' . esc_html__('PHP', 'tekprof-toolkit') . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Tekprof theme installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_theme()
	{
		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}

		$message = sprintf(
			esc_html__('"%1$s" plugin requires Tekprof theme to be installed and activated', 'tekprof-toolkit'),
			'<strong>' . esc_html__('Tekprof Toolkit', 'tekprof-toolkit') . '</strong>'
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}
}

/**
 * Initializes the main plugin
 *
 * @return Tekprof_Toolkit
 */
function tekprof_toolkit_loading()
{
	return Tekprof_Toolkit::init();
}

tekprof_toolkit_loading();
