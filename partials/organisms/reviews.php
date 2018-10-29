<?php if (get_field('showhide_all_block', 58) == 'show'): ?>
    <section class="reviews" data-aos="fade-up">
        <div class="text-right mb-5">
            <div class="section-title section-title--big" data-aos="fade-right" data-aos-delay="300">
                <h2><?php echo get_the_title(58); ?></h2>
            </div>
        </div>
        <div class="container">
            <?php
            $wpb_query_testimonials = new WP_Query(array('page_id' => 58, 'posts_per_page' => 2)); ?>
            <?php if ($wpb_query_testimonials->have_posts()) : ?>
                <?php while ($wpb_query_testimonials->have_posts()) : $wpb_query_testimonials->the_post(); ?>
                    <div class="row">
                        <div class="col-12 text-justify">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            <div class="row reviews-row">
                <?php if (have_rows('testimonial_item')):
                    while (have_rows('testimonial_item')): the_row();
                        $testimonial_description = get_sub_field('testimonial_description');
                        $testimonial_author = get_sub_field('testimonial_author'); ?>
                        <div class="review-teaser text-center" data-aos="fade-up">
                            <i class="quotes"></i>
                            <?php if ($testimonial_description):
                                echo $testimonial_description;
                            endif; ?>
                            <?php if ($testimonial_author): ?><h4><?php echo $testimonial_author; ?></h4><?php endif; ?>
                        </div>
                    <?php endwhile; endif;
                wp_reset_query(); ?>
            </div>
            <div class="row mt-4" data-aos="fade-right">
                <div class="col-12 text-center">
                    <a href="<?php the_field('more_testimonials_link', 58); ?>"
                       class="more-testimonials"><?php _e('More Testimonials', 'custom'); ?></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>