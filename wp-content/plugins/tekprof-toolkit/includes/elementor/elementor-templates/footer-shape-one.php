<?php if ('layout_one' == $settings['layout_type']) : ?>
    <div class="footer-shapes">
        <?php rt_elementor_rendered_image($settings, 'layout_one_shape_one', 'shape one'); ?>
        <?php rt_elementor_rendered_image($settings, 'layout_one_shape_two', 'shape two'); ?>
        <?php rt_elementor_rendered_image($settings, 'layout_one_shape_three', 'shape three wow fadeInRight delay-0-8s'); ?>
    </div>
<?php endif; ?>