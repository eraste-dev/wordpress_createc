<?php

/**
 * Template Theme Activation
 *
 * Required plugins Template for admin panel
 *
 * @package Tekprof
 */

use TekprofTheme\Classes\Tekprof_Helper;

$allowed_html = [
    'b',
    'a' => [
        'href'   => true,
        'target' => true,
    ],
];

$theme_data = Tekprof_Helper::is_theme_active();
?>
<div class="tekprof-dashboard-pages tekprof-theme-activation-page">
    <div class="tekprof-activation-wrapper">
        <div class="activation-form-wrap">
            <?php if (! $theme_data['theme_active']): ?>
                <div class="activation-form">
                    <h4><?php esc_html_e('Activate your license', 'tekprof'); ?></h4>
                    <p><?php esc_html_e('Please activate your license to get access to pre-build design', 'tekprof'); ?></p>
                    <form class="tekprof-activation" action="<?php echo esc_url(admin_url('admin.php?page=tekprof_theme_activation')); ?>" method="post">
                        <div class="from-fields">
                            <input type="text" placeholder="<?php esc_attr_e('Enter Your Purchase Code', 'tekprof'); ?>" name="purchase_code" required />
                            <input type="text" placeholder="<?php esc_attr_e('Your Envato Username', 'tekprof'); ?>" name="username" required />
                            <input type="email" placeholder="<?php esc_attr_e('Your Envato User Email', 'tekprof'); ?>" name="user_email" required />
                        </div>
                        <?php wp_nonce_field('theme-activation', 'activation_nonce'); ?>
                        <button type="submit" class="activate-license" value="submit">
                            <span class="button-text"><?php esc_html_e('Activate Theme', 'tekprof'); ?></span>
                            <span class="loading-text"><?php esc_html_e('Please wait..', 'tekprof'); ?></span>
                        </button>
                    </form>
                </div>
            <?php else: ?>
                <div class="deactivation-form">
                    <div class="activation-theme-msg">
                        <h3>
                            <span><?php esc_html_e('Thank you!', 'tekprof'); ?></span>
                            <?php esc_html_e('Your theme\'s license is activated successfully.', 'tekprof'); ?>
                        </h3>
                    </div>
                    <form class="tekprof-deactivation" action="<?php echo esc_url(admin_url('admin.php?page=tekprof_theme_activation')); ?>" method="post">
                        <input type="hidden" name="token" value="<?php echo esc_attr($theme_data['token']) ?>">
                        <?php wp_nonce_field('theme-deactivation', 'deactivation_nonce'); ?>
                        <button type="submit" class="deactivate-license" value="submit">
                            <span class="button-text"><?php esc_html_e('Deactivate Theme', 'tekprof'); ?></span>
                            <span class="loading-text"><?php esc_html_e('Please wait..', 'tekprof'); ?></span>
                        </button>
                    </form>
                </div>
            <?php endif; ?>
            <p class="license-note">
                <?php echo sprintf(
                    wp_kses(__('<b>Important Notice!</b> Only one standard license is considered valid for one website. Running more than 1 website on a single license is a gross infringement or violation of license.', 'tekprof'), $allowed_html)
                ); ?>
            </p>
        </div>
        <div class="activation-help-wrap">
            <h4><?php esc_html_e('Where Can I Find My Purchase Code?', 'tekprof') ?></h4>
            <ul>
                <li>
                    <?php echo sprintf(
                        wp_kses(__('Please go to Visit http : <a href="%s" target="_blank">https://themeforest.net/downloads</a>', 'tekprof'), $allowed_html),
                        esc_url('https://themeforest.net/downloads')
                    ); ?>
                </li>
                <li>
                    <?php echo sprintf(__('Click the Download button in "%s" row.', 'tekprof'), TEKPROF_NAME); ?>
                </li>
                <li><?php esc_html_e('Select License  Certificate & Purchase code.', 'tekprof') ?></li>
                <li><?php esc_html_e('Select & Copy item Purchase code.', 'tekprof') ?></li>
                <li>
                    <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-"
                        target="_blank">
                        <?php esc_html_e('Read How to find purchase code?', 'tekprof'); ?>
                    </a>
                </li>
                <li>
                    <a href="https://webtend-support.gitbook.io/docs/getting-started/theme-activation" target="_blank">
                        <?php esc_html_e('Read More About Theme Activation?', 'tekprof'); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>