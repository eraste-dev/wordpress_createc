<?php

/**
 * Template Help center
 *
 * Help Center Template for admin panel
 *
 * @package Tekprof
 */

$allowed_html = [
    'a' => [
        'href'   => true,
        'target' => true,
    ],
];

?>
<div class="tekprof-dashboard-pages tekprof-helper-center-page">
    <div class="tekprof-help-boxes">
        <div class="help-box doc-box" style="background-image: url( <?php echo TEKPROF_ASSETS . '/img/doc-bg.jpg' ?> );">
            <div class="img">
                <img src="<?php echo esc_url(TEKPROF_ASSETS . '/img/doc-img.png') ?>" alt="<?php esc_attr_e('Documentation', 'tekprof') ?>">
            </div>
            <a href="<?php echo esc_url('https://webtend-support.gitbook.io/docs/') ?>" target="_blank" class="help-center-btn"><?php esc_html_e('Documentation', 'tekprof') ?></a>
        </div>
        <div class="help-box support-box" style="background-image: url( <?php echo TEKPROF_ASSETS . '/img/support-bg.jpg' ?> );">
            <div class="img">
                <img src="<?php echo esc_url(TEKPROF_ASSETS . '/img/support-img.png') ?>" alt="<?php esc_attr_e('Documentation', 'tekprof') ?>">
            </div>
            <a href="<?php echo esc_url('https://themeforest.net/user/webtend#contact') ?>" target="_blank" class="help-center-btn"><?php esc_html_e('Get Support', 'tekprof') ?></a>
        </div>
    </div>
</div>