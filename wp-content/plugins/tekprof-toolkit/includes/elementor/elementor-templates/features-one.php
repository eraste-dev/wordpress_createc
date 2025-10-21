<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Featuer Area start -->
    <section class="feature-area rpt-110 rpb-45 rel z-1">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <?php
                if (is_array($settings['layout_one_feature_items'])) :
                    foreach ($settings['layout_one_feature_items'] as $index => $item) :
                        $delay = ($index + 1) * 100;
                        $border_class = $index < count($settings['layout_one_feature_items']) - 1 ? 'border-right' : '';
                        $position_class = '';

                        if ($index === 1) {
                            $position_class = 'me-lg-auto ms-sm-auto';
                        } elseif ($index === 2) {
                            $position_class = 'me-auto ms-lg-auto';
                        } elseif ($index === 3) {
                            $position_class = 'ms-sm-auto';
                        }
                ?>
                        <div class="col-lg-3 col-sm-6 <?php echo esc_attr($border_class); ?>" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos-duration="1500" data-aos-offset="50">
                            <div class="feature-item-three <?php echo esc_attr($position_class); ?>">
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon($item['feature_icon'], ['aria-hidden' => 'true']); ?>
                                </div>
                                <div class="content">
                                    <h4><?php echo rt_kses_basic($item['feature_title']); ?></h4>
                                    <p><?php echo rt_kses_basic($item['feature_description']); ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
    <!-- Featuer Area end -->
<?php endif; ?>