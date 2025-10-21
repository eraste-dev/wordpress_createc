<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Hero Section Start -->
    <section class="hero-area-two pt-40 rpt-60 pb-70 rel z-1">
        <div class="container container-1520">
            <div class="row align-items-center">
                <div class="col-lg-6 align-self-center">
                    <div class="hero-content style-two rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <<?php echo esc_attr($settings['layout_two_title_tag']); ?>><?php echo wp_kses_post($settings['layout_two_title']); ?></<?php echo esc_attr($settings['layout_two_title_tag']); ?>>
                        <p><?php echo wp_kses_post($settings['banner_two_description']); ?></p>
                        <a href="<?php echo esc_url($settings['banner_two_button_url']['url']); ?>" class="theme-btn mt-15" <?php echo ($settings['banner_two_button_url']['is_external']) ? 'target="_blank"' : ''; ?> <?php echo ($settings['banner_two_button_url']['nofollow']) ? 'rel="nofollow"' : ''; ?>><?php echo esc_html($settings['banner_two_button_text']); ?></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-two" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <?php rt_elementor_rendered_image($settings, 'banner_two_image'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-two-shape">
            <div class="shape shape-one">
                <?php rt_elementor_rendered_image($settings, 'banner_two_shape_one'); ?>
            </div>
            <div class="shape shape-two">
                <?php rt_elementor_rendered_image($settings, 'banner_two_shape_two'); ?>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <?php if (!empty($settings['banner_two_bottom_image']['url'])): ?>
        <!-- Hero Bottom Image Start -->
        <div class="hero-bottom-image-area rel z-1">
            <div class="container-fluid">
                <?php rt_elementor_rendered_image($settings, 'banner_two_bottom_image'); ?>
            </div>
        </div>
        <!-- Hero Bottom Image End -->
    <?php endif; ?>
<?php endif; ?>