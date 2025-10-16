<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- Modern IT Solutions Area start -->
    <section class="modern-it-solutions-area-v2 rel z-1">
        <div class="container-fluid">
            <div class="row align-items-stretch g-4">
                <?php if (!empty($settings['layout_two_image'])) : ?>
                    <div class="col-xl-5 col-lg-12">
                        <div class="solutions-image-card" data-aos="fade-right" data-aos-duration="1000" data-aos-offset="50">
                            <div class="image-wrapper">
                                <?php echo rt_elementor_rendered_image($settings, 'layout_two_image'); ?>
                                <div class="image-overlay"></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-xl-7 col-lg-12">
                    <div class="solutions-content-card">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="content-header-section" data-aos="fade-up" data-aos-duration="800" data-aos-offset="50">
                                    <?php if (!empty($settings['layout_two_subtitle'])) : ?>
                                        <div class="subtitle-badge">
                                            <span class="badge-dot"></span>
                                            <span class="badge-text"><?php echo rt_kses_basic($settings['layout_two_subtitle']); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['layout_two_title'])) : ?>
                                        <<?php echo esc_attr($settings['layout_two_title_tag']); ?> class="content-main-title"><?php echo rt_kses_basic($settings['layout_two_title']); ?></<?php echo esc_attr($settings['layout_two_title_tag']); ?>>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['layout_two_description'])) : ?>
                                        <p class="content-description"><?php echo rt_kses_basic($settings['layout_two_description']); ?></p>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['layout_two_button_text']) && !empty($settings['layout_two_button_link']['url'])) : ?>
                                        <div class="content-action">
                                            <a href="<?php echo esc_url($settings['layout_two_button_link']['url']); ?>"
                                               <?php if (!empty($settings['layout_two_button_link']['is_external'])) : ?> target="_blank" <?php endif; ?>
                                               class="modern-action-btn">
                                                <span class="btn-text"><?php echo rt_kses_basic($settings['layout_two_button_text']); ?></span>
                                                <span class="btn-icon">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.16669 10H15.8334" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10 4.16666L15.8333 10L10 15.8333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="features-grid" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
                                    <?php if (!empty($settings['layout_two_features'])) : ?>
                                        <?php $index = 1; foreach ($settings['layout_two_features'] as $feature) : ?>
                                            <div class="feature-card-modern" data-aos="fade-left" data-aos-duration="<?php echo 600 + ($index * 100); ?>" data-aos-delay="<?php echo $index * 100; ?>">
                                                <div class="feature-number">
                                                    <span><?php echo sprintf('%02d', $index); ?></span>
                                                </div>
                                                <div class="feature-content">
                                                    <?php if (!empty($feature['feature_title'])) : ?>
                                                        <h5 class="feature-title"><?php echo rt_kses_basic($feature['feature_title']); ?></h5>
                                                    <?php endif; ?>
                                                    <?php if (!empty($feature['feature_description'])) : ?>
                                                        <p class="feature-text"><?php echo rt_kses_basic($feature['feature_description']); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="feature-accent"></div>
                                            </div>
                                        <?php $index++; endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Decorations -->
        <div class="solutions-bg-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
    </section>
    <!-- Modern IT Solutions Area end -->
<?php endif; ?>