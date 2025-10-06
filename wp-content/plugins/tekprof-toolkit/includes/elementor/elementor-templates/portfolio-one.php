<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- Features Area start -->
    <section class="features-area-two pt-130 rpt-100 rel z-1">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <?php if ('cpt' == $settings['portfolio_type']) : ?>
                    <?php
                    $args = [
                        'post_type'           => 'tekprof_portfolio',
                        'post_status'         => 'publish',
                        'posts_per_page'      => $settings['post_limit'],
                        'orderby'             => $settings['order_by'],
                        'order'               => $settings['sort_order'],
                        'ignore_sticky_posts' => 1,
                    ];

                    if ('categories' == $settings['post_from'] && $settings['cat_slugs']) {
                        $args['tax_query'] = [
                            [
                                'taxonomy' => 'tekprof_portfolio_category',
                                'field'    => 'slug',
                                'terms'    => $settings['cat_slugs'],
                            ],
                        ];
                    }

                    if ('specific-post' == $settings['post_from'] && $settings['post_ids']) {
                        $args['post__in'] = $settings['post_ids'];
                    }

                    $wp_query = new WP_Query($args);

                    while ($wp_query->have_posts()): $wp_query->the_post();
                        $idd             = get_the_ID();
                        $categories_list = get_the_terms($idd, 'tekprof_portfolio_category', '', '', '');

                        $portfolio_meta = get_post_meta($idd, 'tekprof_portfolio_meta', true);
                        $portfolio_summary = $portfolio_meta['summary_text'];

                        if ($settings['title_word']) {
                            $the_title = wp_trim_words(get_the_title(), $settings['title_word'], '..');
                        } else {
                            $the_title = get_the_title();
                        }

                        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($idd), 'full');

                    ?>
                        <div class="col-xxl-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1500" data-aos-offset="50">
                            <div class="feature-item style-two hover-content">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="image">
                                        <?php echo get_the_post_thumbnail($idd, $settings['post_thumbnail_size']); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="content">
                                    <?php if ('yes' === $settings['show_category']) : ?>
                                        <div class="tags">
                                            <?php if (!empty($categories_list[0]->name)) : ?>
                                                <a href="<?php echo esc_url(get_term_link($categories_list[0]->term_id, 'tekprof_portfolio_category')); ?>"><?php echo esc_html($categories_list[0]->name); ?></a>
                                            <?php endif; ?>
                                            <?php if (!empty($categories_list[1]->name)) : ?>
                                                <a href="<?php echo esc_url(get_term_link($categories_list[1]->term_id, 'tekprof_portfolio_category')); ?>"><?php echo esc_html($categories_list[1]->name); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <<?php echo rt_escape_tags($settings['title_tag']); ?> class="title">
                                        <a href="<?php the_permalink(); ?>"><?php echo rt_kses_basic($the_title); ?></a>
                                    </<?php echo rt_escape_tags($settings['title_tag']); ?>>
                                    <div class="inner-content">
                                        <p><?php echo esc_html($portfolio_summary); ?></p>
                                        <a class="details-btn" href="<?php the_permalink(); ?>"><i class="far fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
                <?php if ('elementor-field' == $settings['portfolio_type']) : ?>
                    <?php
                    if (is_array($settings['layout_one_portfolio_list'])) :
                        foreach ($settings['layout_one_portfolio_list'] as $portfolio) :

                            $custom_portfolio_post_query_args = array(
                                'post_type' => 'tekprof_portfolio',
                                'post_status' => 'publish',
                                'posts_per_page'      => 1,
                                'post__in' => array($portfolio['select_portfolio']),
                            );
                            $custom_portfolio_post_query = new \WP_Query($custom_portfolio_post_query_args);
                    ?>
                            <?php while ($custom_portfolio_post_query->have_posts()) :
                                $custom_portfolio_post_query->the_post();
                                $idd             = get_the_ID();
                                if ($settings['title_word']) {
                                    $the_title = wp_trim_words(get_the_title(), $settings['title_word'], '..');
                                } else {
                                    $the_title = get_the_title();
                                }
                                $categories_list = get_the_terms($idd, 'tekprof_portfolio_category', '', '', '');

                                $portfolio_meta = get_post_meta($idd, 'tekprof_portfolio_meta', true);
                                $portfolio_summary = $portfolio_meta['summary_text'];

                            ?>
                                <div class="col-xxl-4 col-md-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1500" data-aos-offset="50">
                                    <div class="feature-item style-two hover-content">
                                        <div class="image">
                                            <?php rt_elementor_rendered_image($portfolio, 'image'); ?>
                                        </div>
                                        <div class="content">
                                            <?php if ('yes' === $settings['show_category']) : ?>
                                                <div class="tags">
                                                    <?php if (!empty($categories_list[0]->name)) : ?>
                                                        <a href="<?php echo esc_url(get_term_link($categories_list[0]->term_id, 'tekprof_portfolio_category')); ?>"><?php echo esc_html($categories_list[0]->name); ?></a>
                                                    <?php endif; ?>
                                                    <?php if (!empty($categories_list[1]->name)) : ?>
                                                        <a href="<?php echo esc_url(get_term_link($categories_list[1]->term_id, 'tekprof_portfolio_category')); ?>"><?php echo esc_html($categories_list[1]->name); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                            <<?php echo rt_escape_tags($settings['title_tag']); ?> class="title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if (!empty($portfolio['title'])):
                                                        echo rt_kses_basic($portfolio['title']);
                                                    else:
                                                        echo rt_kses_basic($the_title);
                                                    endif;
                                                    ?>
                                                </a>
                                            </<?php echo rt_escape_tags($settings['title_tag']); ?>>
                                            <div class="inner-content">
                                                <p>
                                                    <?php
                                                    if ($portfolio['summary']) {
                                                        echo esc_html($portfolio['summary']);
                                                    } else {
                                                        echo esc_html($portfolio_summary);
                                                    }
                                                    ?>
                                                </p>
                                                <a class="details-btn" href="<?php the_permalink(); ?>"><i class="far fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            endwhile;
                            wp_reset_postdata();
                        endforeach;
                    endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>
    <!-- Features Area end -->
<?php endif; ?>