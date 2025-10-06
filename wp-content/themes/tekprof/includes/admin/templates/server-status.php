<?php

/**
 * Template Requirements
 *
 * Requirements Template for admin panel
 *
 * @package Tekprof
 */

use TekprofTheme\Classes\Tekprof_Helper as Helper;

$php_requirements                = 7.0;
$memory_limit_requirements       = 134217728;
$max_upload_size                 = 134217728;
$max_execution_time_requirements = 600;
$max_input_time_requirements     = 120;
$max_input_vars_requirements     = 3000;

?>
<div class="tekprof-dashboard-pages tekprof-server-status-page">
    <div class="tekprof-server-status-boxes">
        <div class="status-box">
            <h4><?php esc_html_e('WordPress Setting', 'tekprof') ?>:</h4>
            <div class="status-lists">
                <div class="single-status">
                    <div class="title"><?php esc_html_e('Home URL', 'tekprof'); ?>:</div>
                    <div class="content"><?php echo esc_html(home_url('/')); ?></div>
                </div>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('Site Url', 'tekprof'); ?>:</div>
                    <div class="content"><?php echo esc_html(site_url('/')); ?></div>
                </div>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('Version', 'tekprof'); ?>:</div>
                    <div class="content"><?php echo esc_html(get_bloginfo('version')); ?></div>
                </div>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('Language', 'tekprof'); ?>:</div>
                    <div class="content"><?php echo get_locale(); ?></div>
                </div>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('Memory Limit', 'tekprof'); ?>:</div>
                    <div class="content">
                        <?php if ($memory_limit_requirements > $this->memory_limit()): ?>
                            <span class="message-info-error">
                                <span class="dashicons dashicons-warning"></span>
                                <?php
                                echo esc_html(size_format($this->memory_limit()));
                                esc_html_e(' - We recommend setting memory to be at least 128MB', 'tekprof');
                                ?>
                            </span>
                            <p class="note">
                                <a target="_blank" href="https://www.wpbeginner.com/wp-tutorials/fix-wordpress-memory-exhausted-error-increase-php-memory/">
                                    <?php esc_html_e('How to change memory settings.', 'tekprof'); ?>
                                </a>
                            </p>
                        <?php else:
                            echo esc_html(size_format($this->memory_limit()));
                        endif; ?>
                    </div>
                </div>
                <div class="single-status">
                    <div class="title"><?php echo esc_html('WP_DEBUG'); ?></div>
                    <div class="content">
                        <?php if (defined('WP_DEBUG') and WP_DEBUG === true): ?>
                            <?php echo esc_html__('Enabled.', 'tekprof'); ?>
                            <p class="note">
                                <a target="_blank" href="https://wordpress.org/support/article/debugging-in-wordpress/">
                                    <?php echo esc_html__(' How to disable WP_DEBUG mode.', 'tekprof'); ?>
                                </a>
                            </p>
                        <?php else: ?>
                            <?php echo esc_html__('Disabled.', 'tekprof'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <h5><?php esc_html_e('Theme Config', 'tekprof') ?>:</h5>
            <div class="status-lists">
                <div class="single-status">
                    <div class="title"><?php esc_html_e('Theme Name', 'tekprof'); ?>:</div>
                    <div class="content"><?php echo esc_html(wp_get_theme()->get('Name')); ?></div>
                </div>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('Version', 'tekprof'); ?>:</div>
                    <div class="content"><?php echo esc_html(wp_get_theme()->get('Version')); ?></div>
                </div>
                <?php if (is_child_theme()) : ?>
                    <div class="single-status">
                        <div class="title"><?php esc_html_e('Parent Theme Version', 'tekprof'); ?>:</div>
                        <div class="content"><?php echo TEKPROF_VERSION; ?></div>
                    </div>
                <?php endif; ?>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('Author', 'tekprof'); ?>:</div>
                    <div class="content">
                        <a href="<?php echo esc_url_raw(wp_get_theme()->get('AuthorURI')) ?>" target="_blank">
                            <?php echo esc_html(wp_get_theme()->get('Author')); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="status-box">
            <h4><?php esc_html_e('Server Setting', 'tekprof') ?></h4>
            <div class="status-lists">
                <div class="single-status">
                    <div class="title"><?php esc_html_e('PHP Version', 'tekprof'); ?>:</div>
                    <div class="content">
                        <?php if (version_compare(phpversion(), $php_requirements, '<')): ?>
                            <span class="message-info-error">
                                <span class="dashicons dashicons-warning"></span>
                                <?php
                                echo esc_html(phpversion());
                                esc_html_e(' - We recommend a minimum PHP version of ', 'tekprof');
                                echo esc_html($php_requirements);
                                ?>
                            </span>
                        <?php else:
                            echo esc_html(phpversion());
                        endif; ?>
                    </div>
                </div>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('Post Max Size', 'tekprof'); ?>:</div>
                    <div class="content">
                        <?php echo esc_html(size_format($this->convert_to_bytes(ini_get('post_max_size')))) ?>
                        <p class="note">
                            <?php esc_html_e('You cannot upload images, themes, and plugins that have a size bigger than this value.', 'tekprof'); ?>
                            <a target="_blank" href="http://www.wpbeginner.com/wp-tutorials/how-to-increase-the-maximum-file-upload-size-in-wordpress/">
                                <?php esc_html_e('If you want to change this setting please read this guide', 'tekprof'); ?>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('Max Execution Time', 'tekprof'); ?>:</div>
                    <div class="content">
                        <?php if ($max_execution_time_requirements > ini_get('max_execution_time')): ?>
                            <span class="message-info-error">
                                <span class="dashicons dashicons-warning"></span>
                                <?php
                                echo esc_html(ini_get('max_execution_time'));
                                esc_html_e(' - We recommend setting max execution time to at least ', 'tekprof');
                                echo esc_html($max_execution_time_requirements);
                                ?>
                            </span>
                            <p class="note">
                                <a target="_blank" href="https://code.tutsplus.com/tutorials/how-to-increase-max_execution_time-in-php--cms-37017">
                                    <?php echo esc_html__('To see how you can change this please read this guide', 'tekprof'); ?>
                                </a>
                            </p>
                        <?php else:
                            echo esc_html(ini_get('max_execution_time'));
                        endif; ?>
                    </div>
                </div>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('PHP Max Input Time', 'tekprof'); ?>:</div>
                    <div class="content">
                        <?php if ($max_input_time_requirements > ini_get('max_input_time')): ?>
                            <span class="message-info-error">
                                <span class="dashicons dashicons-warning"></span>
                                <?php
                                echo esc_html(ini_get('max_input_time'));
                                esc_html_e(' - We recommend setting max execution time to at least ', 'tekprof');
                                echo esc_html($max_input_time_requirements);
                                ?>
                            </span>
                            <p class="note">
                                <a target="_blank" href="http://www.wpbeginner.com/wp-tutorials/how-to-increase-the-maximum-file-upload-size-in-wordpress/">
                                    <?php echo esc_html__('To see how you can change this please read this guide', 'tekprof'); ?>
                                </a>
                            </p>
                        <?php else:
                            echo esc_html(ini_get('max_input_time'));
                        endif; ?>
                    </div>
                </div>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('PHP Max Input Vars', 'tekprof'); ?>:</div>
                    <div class="content">
                        <?php if ($max_input_vars_requirements > ini_get('max_input_vars')): ?>
                            <span class="message-info-error">
                                <span class="dashicons dashicons-warning"></span>
                                <?php
                                echo esc_html(ini_get('max_input_vars'));
                                esc_html_e(' - We recommend setting max execution time to at least ', 'tekprof');
                                echo esc_html($max_input_vars_requirements);
                                ?>
                            </span>
                            <p class="note">
                                <a target="_blank" href="http://www.wpbeginner.com/wp-tutorials/how-to-increase-the-maximum-file-upload-size-in-wordpress/">
                                    <?php echo esc_html__('To see how you can change this please read this guide', 'tekprof'); ?>
                                </a>
                            </p>
                        <?php else:
                            echo esc_html(ini_get('max_input_vars'));
                        endif; ?>
                    </div>
                </div>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('MySql Version', 'tekprof'); ?>:</div>
                    <div class="content"><?php echo esc_html(Helper::mysql_version()); ?></div>
                </div>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('Max upload size', 'tekprof'); ?>:</div>
                    <div class="content">
                        <?php if ($max_upload_size > wp_max_upload_size()): ?>
                            <span class="message-info-error">
                                <span class="dashicons dashicons-warning"></span>
                                <?php
                                echo esc_html(size_format(wp_max_upload_size()));
                                esc_html_e(' - We recommend minimum value: 128 MB.', 'tekprof');
                                ?>
                            </span>
                            <p class="note">
                                <a target="_blank" href="http://www.wpbeginner.com/wp-tutorials/how-to-increase-the-maximum-file-upload-size-in-wordpress/">
                                    <?php esc_html_e('To see how you can change this please read this guide', 'tekprof'); ?>
                                </a>
                            </p>
                        <?php else:
                            echo esc_html(size_format(wp_max_upload_size()));
                        endif; ?>
                    </div>
                </div>
                <div class="single-status">
                    <div class="title"><?php esc_html_e('SimpleXML', 'tekprof'); ?>:</div>
                    <div class="content">
                        <?php if (! extension_loaded('simplexml')): ?>
                            <span class="message-info-error">
                                <?php esc_html_e('To ensure successful installation of demo content The SimpleXML extension should be installed on your web server. Please contact your hosting provider to install and activate SimpleXML extension.', 'tekprof') ?>
                            </span>
                        <?php else:
                            echo esc_html__('Enabled', 'tekprof');
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>