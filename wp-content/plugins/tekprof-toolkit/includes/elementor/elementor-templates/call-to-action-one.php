<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- CTA Area start -->
    <section class="cta-area-two rel z-1">
        <div class="container px-sm-0 bordered-x py-130 rpy-100" style="background-image: url(<?php echo esc_url($settings['layout_one_shape']['url']); ?>);">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 col-md-11 text-center" data-aos="zoom-in" data-aos-duration="1500" data-aos-offset="50">
                    <div class="section-title mx-xl-3 mb-30">
                        <?php if ($settings['layout_one_title']) : ?>
                            <<?php echo esc_attr($settings['layout_one_title_tag']); ?> class="sec-title"><?php echo rt_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                        <?php endif; ?>
                        <?php if ($settings['layout_one_sub_title']) : ?>
                            <p><?php echo rt_kses_basic($settings['layout_one_sub_title']); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($settings['layout_one_button_label'])) : ?>
                        <a href="<?php echo esc_url($settings['layout_one_button_url']['url']); ?>" <?php if (!empty($settings['layout_one_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn hover-primary" data-hover="<?php echo esc_attr($settings['layout_one_button_label']); ?>">
                            <span><?php echo esc_html($settings['layout_one_button_label']); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Area end -->
<?php endif; ?>