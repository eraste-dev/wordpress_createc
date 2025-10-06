<?php

namespace TekprofToolkit\Helper;

defined('ABSPATH') || exit;

/**
 * Load Theme Assets
 */
class Tekprof_Assets
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
		add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
	}


	public function register_scripts()
	{
		wp_register_style('aos', RT_VENDOR . '/aos/aos.css', [], '1.1.0');
		wp_register_script('aos', RT_VENDOR . '/aos/aos.js', ['jquery'], '1.1.0', true);

		wp_register_style('nice-select', RT_VENDOR . '/nice-select/nice-select.min.css', [], '1.1.0');
		wp_register_script('nice-select', RT_VENDOR . '/nice-select/jquery.nice-select.min.js', ['jquery'], '1.1.0', true);

		wp_register_style('magnific-popup', RT_VENDOR . '/magnific-popup/style.min.css', [], '1.1.0');
		wp_register_script('magnific-popup', RT_VENDOR . '/magnific-popup/scripts.min.js', ['jquery'], '1.1.0', true);

		wp_register_style('slick', RT_VENDOR . '/slick/slick.min.css', [], '1.8.1');
		wp_register_script('slick', RT_VENDOR . '/slick/slick.min.js', ['jquery'], '1.8.1', true);

		wp_register_style('tekprof-flat-icons', RT_VENDOR . '/flaticon/flaticon.min.css', [], '1.8.1');

		wp_register_script('imagesloaded', RT_VENDOR . '/isotope/imagesloaded.pkgd.min.js', ['jquery'], '1.8.1', true);
		wp_register_script('isotope', RT_VENDOR . '/isotope/isotope.pkgd.min.js', ['jquery'], '1.8.1', true);
		wp_register_script('skill-bars', RT_VENDOR . '/jquery-skill-bars/skill.bars.jquery.min.js', ['jquery'], '1.8.1', true);

		wp_register_script('appear', RT_VENDOR . '/appear/appear.min.js', ['jquery'], '1.8.1', true);
		wp_register_script('circle-progress', RT_VENDOR . '/circle-progress/circle-progress.min.js', ['jquery'], '1.8.1', true);
	}

	public function enqueue_styles()
	{

		wp_enqueue_style('magnific-popup');
		wp_enqueue_style('aos');
		wp_enqueue_style('slick');
		wp_enqueue_style('nice-select');
		wp_enqueue_style('tekprof-flat-icons');
	}


	/**
	 * Enqueue Theme Scripts
	 *
	 * @return void
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script('magnific-popup');
		wp_enqueue_script('appear');
		wp_enqueue_script('nice-select');
		wp_enqueue_script('aos');
		wp_enqueue_script('slick');
		wp_enqueue_script('isotope');
		wp_enqueue_script('imagesloaded');
		wp_enqueue_script('skill-bars');
		wp_enqueue_script('circle-progress');
		wp_enqueue_script('tekprof-addon', RT_ASSETS . '/js/tekprof-addon.js', ['jquery'], TEKPROF_VERSION, true);

		wp_localize_script(
			'tekprof-addon',
			'TekprofObject',
			[
				'ajax_url' => admin_url('admin-ajax.php'),
				'error_text' => esc_html__('An error occurred. Please try again.', 'tekprof-toolkit'),
			]
		);
	}
}

Tekprof_Assets::instance();
