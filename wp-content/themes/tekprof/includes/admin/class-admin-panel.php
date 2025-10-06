<?php

namespace TekprofTheme\Admin;

defined('ABSPATH') || exit;

/**
 * Load Theme Admin
 */
class Tekprof_Admin_Panel
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
		add_action('admin_menu', [$this, 'theme_dashboard_menu']);
		add_action('admin_init', [$this, 'redirect_theme_dashboard']);
	}

	public function theme_dashboard_menu()
	{
		add_menu_page(
			TEKPROF_NAME,
			TEKPROF_NAME,
			'manage_options',
			'tekprof_dashboard',
			[$this, 'render_welcome_template'],
			TEKPROF_ASSETS . '/img/webtend-logo.png',
			2
		);

		$submenu = [];

		$submenu[] = [
			esc_html__('Welcome', 'tekprof'),
			esc_html__('Welcome', 'tekprof'),
			'manage_options',
			'tekprof_dashboard',
			[$this, 'render_welcome_template'],
		];

		$submenu[] = [
			esc_html__('Server Status', 'tekprof'),
			esc_html__('Server Status', 'tekprof'),
			'edit_posts',
			'tekprof_server_status',
			[$this, 'render_server_status'],
		];

		$submenu[] = [
			esc_html__('Help Center', 'tekprof'),
			esc_html__('Help Center', 'tekprof'),
			'edit_posts',
			'tekprof_help_center',
			[$this, 'render_help_center'],
		];

		$submenu = apply_filters('tekprof_dashboard_submenu', [$submenu]);

		foreach ($submenu[0] as $key => $value) {
			add_submenu_page(
				'tekprof_dashboard',
				$value[0],
				$value[1],
				$value[2],
				$value[3],
				$value[4]
			);
		}
	}

	public static function render_heading()
	{
		global $submenu;

		$menu_items = '';

		if (isset($submenu['tekprof_dashboard'])) {
			$menu_items = $submenu['tekprof_dashboard'];
		}

		if (! empty($menu_items)): ?>
			<div class="wrap tekprof-dashboard-header">
				<div class="tekprof-dashboard-banner" style="background-image: url( <?php echo TEKPROF_ASSETS . '/img/dashboard-banner.jpg' ?> );">
					<h3><?php echo esc_html__('Thanks For Purchasing', 'tekprof') . ' ' . TEKPROF_NAME ?></h3>
					<p>
						<?php echo sprintf(
							wp_kses(__('A theme is developed by <a href="%s" target="_blank">WebTend</a>', 'tekprof'), ['a' => ['href' => true, 'target' => true]]),
							esc_url('https://themeforest.net/user/webtend')
						); ?>
					</p>
				</div>
				<div class="dashboard-nav-wrapper">
					<?php foreach ($menu_items as $item):
						$class = isset($_GET['page']) && $_GET['page'] == $item[2] ? 'nav-tab-active' : ''; ?>
						<a href="<?php echo esc_url(admin_url('admin.php?page=' . $item[2] . '')); ?>" class="nav-tab <?php echo esc_attr($class); ?>">
							<?php echo esc_html($item[0]); ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
<?php endif;
	}

	public function render_welcome_template()
	{
		self::render_heading();

		require_once TEKPROF_ADMIN . '/templates/welcome.php';
	}

	public function render_theme_activation()
	{
		self::render_heading();

		require_once TEKPROF_ADMIN . '/templates/theme-activation.php';
	}

	public function render_server_status()
	{
		self::render_heading();

		require_once TEKPROF_ADMIN . '/templates/server-status.php';
	}

	public function render_help_center()
	{
		$this->render_heading();

		require_once TEKPROF_ADMIN . '/templates/help-center.php';
	}

	public function redirect_theme_dashboard()
	{
		global $pagenow;

		if (is_admin() && isset($_GET['activated']) && 'themes.php' === $pagenow) {
			wp_safe_redirect(esc_url(admin_url('admin.php?page=tekprof_dashboard')));

			exit;
		}
	}

	public function convert_to_bytes($v)
	{
		$multipliers = [
			'K' => 1024,
			'M' => 1024 * 1024,
			'G' => 1024 * 1024 * 1024,
			'T' => 1024 * 1024 * 1024 * 1024,
			'P' => 1024 * 1024 * 1024 * 1024 * 1024,
		];

		preg_match('/^(\d*\.?\d+)\s*([KMGT]?B?)$/i', $v, $matches);

		if (count($matches) === 3) {
			$value = (float) $matches[1];
			$unit  = strtoupper($matches[2]);

			if (isset($multipliers[$unit])) {
				return $value * $multipliers[$unit];
			}
		}

		return (float) $v;
	}

	public function memory_limit()
	{
		$limit = $this->convert_to_bytes(WP_MEMORY_LIMIT);
		if (function_exists('memory_get_usage')) {
			$limit = max($limit, $this->convert_to_bytes(ini_get('memory_limit')));
		}

		return $limit;
	}
}

Tekprof_Admin_Panel::instance();
