<?php if ('layout_four' == $settings['layout_type']) : ?>
    <!-- Contact Form Area start -->
    <section class="contact-form-area pt-130 rpt-100 pb-120 rpb-90">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-9">
                    <div class="contact-info-part rmb-55" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                        <div class="section-title mb-40">
                            <?php if (!empty($settings['layout_four_section_subtitle'])) : ?>
                                <span class="sub-title mb-10"><?php echo esc_html($settings['layout_four_section_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_four_section_title'])) : ?>
                                <h2><?php echo esc_html($settings['layout_four_section_title']); ?></h2>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['layout_four_section_desc'])) : ?>
                            <p><?php echo wp_kses_post($settings['layout_four_section_desc']); ?></p>
                        <?php endif; ?>
                        <div class="contact-info-wrap mt-40">
                            <div class="contact-info-item">
                                <div class="icon"><?php \Elementor\Icons_Manager::render_icon($settings['layout_four_office_icon'], ['aria-hidden' => 'true']); ?></div>
                                <div class="text">
                                    <?php if (!empty($settings['layout_four_office_location_title'])) : ?>
                                        <span class="title"><?php echo esc_html($settings['layout_four_office_location_title']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['layout_four_office_location'])) : ?>
                                        <p><?php echo esc_html($settings['layout_four_office_location']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon"><?php \Elementor\Icons_Manager::render_icon($settings['layout_four_email_icon'], ['aria-hidden' => 'true']); ?></div>
                                <div class="text">
                                    <?php if (!empty($settings['layout_four_email_title'])) : ?>
                                        <span class="title"><?php echo esc_html($settings['layout_four_email_title']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['layout_four_email_address'])) : ?>
                                        <?php echo rt_kses_basic($settings['layout_four_email_address']); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon"><?php \Elementor\Icons_Manager::render_icon($settings['layout_four_phone_icon'], ['aria-hidden' => 'true']); ?></div>
                                <div class="text">
                                    <?php if (!empty($settings['layout_four_phone_title'])) : ?>
                                        <span class="title"><?php echo esc_html($settings['layout_four_phone_title']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['layout_four_phone_number'])) : ?>
                                        <?php echo rt_kses_basic($settings['layout_four_phone_number']); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-9">
                    <div class="contact-page-form z-1 rel" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                        <div id="contactForm" class="contactForm">
                            <?php if (!empty($settings['layout_four_ct_from_title'])) : ?>
                                <h4><?php echo esc_html($settings['layout_four_ct_from_title']); ?></h4>
                            <?php endif; ?>
                            <?php if (!empty($settings['layout_four_ct_from_sub_title'])) : ?>
                                <p><?php echo esc_html($settings['layout_four_ct_from_sub_title']); ?></p>
                            <?php endif; ?>
                            <?php echo do_shortcode('[contact-form-7 id="' . $settings['layout_four_select_cf7_form'] . '"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form Area end -->
<?php endif; ?>