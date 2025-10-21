<?php

use TekprofTheme\Classes\Tekprof_Nav_Walker;

if ('layout_one' == $settings['layout_type']) : ?>
    <!-- main header -->
    <div class="main-header">

        <div class="header-top-wrap rel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="top-left text-center text-lg-start">
                            <ul>
                                <li><?php \Elementor\Icons_Manager::render_icon($settings['call_icon'], ['aria-hidden' => 'true']); ?><?php echo esc_html($settings['call_text']); ?> <a href="<?php echo esc_url($settings['call_url']); ?>"><?php echo esc_html($settings['call_number']); ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="top-right text-center text-lg-end">
                            <ul>
                                <li><?php \Elementor\Icons_Manager::render_icon($settings['email_icon'], ['aria-hidden' => 'true']); ?><?php echo esc_html($settings['email_text']); ?> <a href="mailto:<?php echo esc_attr($settings['email_address']); ?>"><?php echo esc_html($settings['email_address']); ?></a></li>
                                <li>
                                    <div class="social-style-one">
                                        <span><?php echo esc_html($settings['social_title']); ?></span>
                                        <?php
                                        if (!empty($settings['social_icons'])) :
                                            foreach ($settings['social_icons'] as $social_icon) :
                                        ?>
                                                <a href="<?php echo esc_url($social_icon['social_url']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($social_icon['social_icon'], ['aria-hidden' => 'true'], 'i'); ?></a>
                                        <?php endforeach;
                                        endif; ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Header-Upper-->
        <div class="header-upper">
            <div class="container clearfix">

                <div class="header-inner before-after-none rel d-flex align-items-center">
                    <div class="logo-outer">
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($settings['logo']['url']); ?>" width="<?php echo esc_attr($settings['logo_size']['width']); ?>" height="<?php echo esc_attr($settings['logo_size']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </a>
                        </div>
                    </div>

                    <div class="nav-outer ms-lg-auto clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-lg">
                            <div class="navbar-header py-15">
                                <div class="mobile-logo">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <img src="<?php echo esc_url($settings['mobile_logo']['url']); ?>" width="<?php echo esc_attr($settings['mobile_logo_size']['width']); ?>" height="<?php echo esc_attr($settings['mobile_logo_size']['height']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                    </a>
                                </div>

                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <?php
                            wp_nav_menu(
                                array(
                                    'menu' => $settings['nav_menu'],
                                    'menu_class' => 'navigation clearfix',
                                    'container'       => 'div',
                                    'fallback_cb'     => false,
                                    'container_class' => 'navbar-collapse collapse clearfix',
                                    'walker'          => new Tekprof_Nav_Walker()
                                )
                            );
                            ?>
                        </nav>
                        <!-- Main Menu End-->
                    </div>

                    <!-- Menu Button -->
                    <div class="menu-btns">
                        <?php if (!empty($settings['button_label'])) : ?>
                            <a href="<?php echo esc_url($settings['button_url']['url']); ?>" <?php if (!empty($settings['button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn btn-small ms-lg-4"><?php echo esc_html($settings['button_label']); ?></a>
                        <?php endif; ?>
                        <!-- menu sidbar -->
                        <div class="menu-sidebar ms-4">
                            <button class="bg-transparent"></button>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </div>
    </div>
<?php endif; ?>