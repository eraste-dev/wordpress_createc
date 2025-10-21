<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Hero Section Start -->
    <section class="hero-area pt-100 rpt-70 pb-130 rpb-100 rel z-1" style="background-image: url(<?php echo esc_url($settings['layout_one_background_image']['url']); ?>);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 align-self-center">
                    <div class="hero-content rmb-55" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <?php if (!empty($settings['layout_one_sub_title'])) : ?>
                            <span class="sub-title mb-15"><?php echo esc_html($settings['layout_one_sub_title']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_title'])) : ?>
                            <<?php echo esc_attr($settings['layout_one_title_tag']); ?>><?php echo rt_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_description'])) : ?>
                            <p><?php echo esc_html($settings['layout_one_description']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['layout_one_button_label'])) : ?>
                            <a href="<?php echo esc_url($settings['layout_one_button_url']['url']); ?>" <?php if (!empty($settings['layout_one_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn mt-15"><?php echo esc_html($settings['layout_one_button_label']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image radius-animation" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <?php rt_elementor_rendered_image($settings, 'layout_one_image'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
<?php endif; ?>