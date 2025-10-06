<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- CTA Area start -->
    <section class="cta-area bgc-primary text-white pt-15 d-flex text-center align-items-center justify-content-center flex-wrap">
        <?php if ($settings['layout_two_title']) : ?>
            <<?php echo esc_attr($settings['layout_two_title_tag']); ?> class="mx-3 mb-15 sec-title"><?php echo rt_kses_basic($settings['layout_two_title']); ?></<?php echo esc_attr($settings['layout_two_title_tag']); ?>>
        <?php endif; ?>
        <?php if (!empty($settings['layout_two_button_label'])) : ?>
            <a href="<?php echo esc_url($settings['layout_two_button_url']['url']); ?>" <?php if (!empty($settings['layout_two_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn btn-extra-small bgc-secondary mb-15 mx-3" data-hover="<?php echo esc_attr($settings['layout_two_button_label']); ?>">
                <span><?php echo esc_html($settings['layout_two_button_label']); ?></span>
            </a>
        <?php endif; ?>
    </section>
    <!-- CTA Area end -->
<?php endif; ?>