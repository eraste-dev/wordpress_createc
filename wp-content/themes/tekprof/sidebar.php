<?php

/**
 * The sidebar containing the Primary widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tekprof
 */

use TekprofTheme\Classes\Tekprof_Helper as Helper;

if ('no-sidebar' === Helper::content_sidebar() || ! is_active_sidebar('primary_sidebar')) {
  return;
}
$tekprof_sidebar_class = 'ps-xl-5';
if (Helper::content_sidebar() == 'left-sidebar') {
  $tekprof_sidebar_class = 'pe-xl-5  order-first';
}
?>
<div class="col-lg-4 col-md-8 col-sm-10  rmt-65 <?php echo esc_attr($tekprof_sidebar_class); ?>">
  <div class="blog-sidebar">
    <div class="sidebar-area">
      <div class="primary-sidebar widget-area">
        <?php dynamic_sidebar('primary_sidebar'); ?>
      </div>
    </div>
  </div>
</div>