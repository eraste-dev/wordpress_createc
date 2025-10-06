<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Testimonials Area start -->
    <section class="testimonials-area rel z-1">
        <div class="container-fluid">
            <div class="testimonials-inner pt-130 rpt-100 pb-100 rpb-70 bgs-cover" style="background-image: url(<?php echo esc_url($settings['layout_one_background_image']['url']); ?>);">
                <div class="container">
                    <div class="row justify-content-between align-items-end pb-30">
                        <div class="col-xl-6 col-lg-7">
                            <div class="section-title text-white mb-25" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="50">
                                <?php if ($settings['layout_one_sub_title']) : ?>
                                    <span class="sub-title mb-10"><?php echo rt_kses_basic($settings['layout_one_sub_title']); ?></span>
                                <?php endif; ?>
                                <?php if ($settings['layout_one_title']) : ?>
                                    <<?php echo esc_attr($settings['layout_one_title_tag']); ?> class="sec-title"><?php echo rt_kses_basic($settings['layout_one_title']); ?></<?php echo esc_attr($settings['layout_one_title_tag']); ?>>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-25 text-lg-end" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="50">
                            <div class="testi-arrows mb-10">
                                <button class="testi-arrow-left"><i class="far fa-arrow-left"></i></button>
                                <button class="testi-arrow-right"><i class="far fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-active">
                        <?php
                        if (is_array($settings['layout_one_testimonial'])) :
                            foreach ($settings['layout_one_testimonial'] as $item) :
                        ?>
                                <div class="testimonial-item">
                                    <div class="ratting">
                                        <?php for ($i = 1; $i <= $item['rating']; $i++) : ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="testi-text">
                                        <?php echo rt_kses_basic($item['testimonial']); ?>
                                    </div>
                                    <div class="testi-author">
                                        <?php rt_elementor_rendered_image($item, 'image'); ?>
                                        <b><?php echo esc_html($item['name']); ?> </b> /<?php echo esc_html($item['designation']); ?>
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
    </section>
    <!-- Testimonials Area end -->
<?php endif; ?>