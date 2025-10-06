<?php if ('layout_six' == $settings['layout_type']) :
    $uid = $this->get_id();
?>

    <!-- FAQs Area start -->
    <section class="faqs-area pb-130 rpb-100 rel z-1">
        <div class="container-fluid">
            <div class="faqs-fluid-wrap py-130 rpy-100">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-5">
                            <div class="faqs-left-content rmb-50" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">

                                <div class="section-title mb-50">
                                    <?php if (!empty($settings['layout_six_subtitle'])) : ?>
                                        <span class="sub-title mb-10"><?php echo rt_kses_basic($settings['layout_six_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['layout_six_title'])) : ?>
                                        <<?php echo esc_attr($settings['layout_six_title_tag']); ?>><?php echo rt_kses_basic($settings['layout_six_title']); ?></<?php echo esc_attr($settings['layout_six_title_tag']); ?>>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($settings['layout_six_button_text'])) : ?>
                                    <a href="<?php echo esc_url($settings['layout_six_button_url']['url']); ?>" <?php if (!empty($settings['layout_six_button_url']['is_external'])) : ?> target="_blank" <?php endif; ?> class="theme-btn"><?php echo rt_kses_basic($settings['layout_six_button_text']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="faqs-accordion-wrap" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                                <div class="accordion-one" id="service-details-accordion-<?php echo esc_attr($uid); ?>">
                                    <?php
                                    if (!empty($settings['layout_six_faq_items'])) :
                                        $i = 0;
                                        foreach ($settings['layout_six_faq_items'] as $item) :
                                            $i++;
                                            $collapsed = ($item['is_active'] == 'yes') ? '' : 'collapsed';
                                            $show = ($item['is_active'] == 'yes') ? 'show' : '';
                                    ?>
                                            <div class="accordion-item-four style-two">
                                                <h6 class="accordion-header">
                                                    <button class="accordion-button <?php echo esc_attr($collapsed); ?>" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($i . $uid); ?>">
                                                        <span class="title"><?php echo rt_kses_basic($item['faq_title']); ?></span>
                                                        <span class="icon first"><i class="fas fa-plus"></i></span>
                                                        <span class="icon second"><i class="fas fa-minus"></i></span>
                                                    </button>
                                                </h6>
                                                <div id="collapse<?php echo esc_attr($i . $uid); ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" data-bs-parent="#service-details-accordion">
                                                    <div class="accordion-body">
                                                        <p><?php echo rt_kses_basic($item['faq_content']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQs Area end -->
<?php endif; ?>