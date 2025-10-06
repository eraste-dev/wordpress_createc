<?php

/**
 * Tekprof functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tekprof
 */

/**
 * Define constant
 */
$theme   = wp_get_theme();
$name    = ! $theme->parent() ? wp_get_theme()->get('Name') : wp_get_theme()->parent()->get('Name');
$version = ! $theme->parent() ? wp_get_theme()->get('Version') : wp_get_theme()->parent()->get('Version');

define('TEKPROF_NAME', $name);
define('TEKPROF_VERSION', $version);
define('TEKPROF_PATH', untrailingslashit(get_template_directory()));
define('TEKPROF_URI', untrailingslashit(get_template_directory_uri()));
define('TEKPROF_ASSETS', untrailingslashit(get_template_directory_uri()) . '/assets');
define('TEKPROF_VENDOR', untrailingslashit(get_template_directory_uri()) . '/assets/vendor');
define('TEKPROF_INCLUDES', TEKPROF_PATH . '/includes');
define('TEKPROF_CLASSES', TEKPROF_PATH . '/includes/classes');
define('TEKPROF_ADMIN', TEKPROF_PATH . '/includes/admin');

/**
 * Load theme files
 */
require_once TEKPROF_CLASSES . '/class-setup.php';
require_once TEKPROF_CLASSES . '/class-helper.php';
require_once TEKPROF_CLASSES . '/class-assets.php';
require_once TEKPROF_CLASSES . '/class-post-helper.php';
require_once TEKPROF_CLASSES . '/class-comment-walker.php';
require_once TEKPROF_CLASSES . '/class-nav-walker.php';
require_once TEKPROF_CLASSES . '/class-breadcrumb.php';
require_once TEKPROF_CLASSES . '/class-woocommerce.php';
require_once TEKPROF_ADMIN . '/class-admin-panel.php';
require_once TEKPROF_INCLUDES . '/library/class-tgm-plugin-activation.php';
require_once TEKPROF_INCLUDES . '/library/required-plugin.php';

add_action('init', function () {
    if (function_exists('register_block_style')) {
        register_block_style(
            'core/quote',
            array(
                'name'         => 'blue-quote',
                'label'        => esc_html__('Blue Quote', 'tekprof'),
                'is_default'   => true,
                'inline_style' => '.wp-block-quote.is-style-blue-quote { color: blue; }',
            )
        );
    }

    function tekprof_register_my_patterns()
    {
        register_block_pattern(
            'tekprof/tekprof-example',
            array(
                'title'         => esc_html__('Block Pattern', 'tekprof'),
                'description'   => _x('This is my first block pattern', 'Block pattern description', 'tekprof'),
                'content'       => '<!-- wp:paragraph --><p>A single paragraph block style</p><!-- /wp:paragraph -->',
                'categories'    => array('text'),
                'keywords'      => array('cta', 'demo', 'example'),
                'viewportWidth' => 800,
            )
        );
    }

    add_action('init', 'tekprof_register_my_patterns');
});


// Remove sidebar from WooCommerce pages
function tekprof_remove_woocommerce_sidebar()
{
    if (!function_exists('is_woocommerce') || !function_exists('is_cart') || !function_exists('is_checkout')) {
        return;
    }
    if (is_woocommerce() || is_cart() || is_checkout()) {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    }
}
add_action('wp', 'tekprof_remove_woocommerce_sidebar');
