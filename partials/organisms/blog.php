<?php $blog_background_color = get_field('color_settings', 'option'); ?>
<section class="our-blog" data-aos="fade-up" <?php if($blog_background_color) { echo 'style="background-color: ' . $blog_background_color['blog_background_color'] . '"'; } ?>>
    <span class="decorator"></span>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-title" data-aos="fade-right" data-aos-delay="300">
                    <h2><?php _e('Our Blog', 'custom'); ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="teasers-wraper">
        <div class="container-fluid px-0">
            <?php $query = new WP_Query(array('category_name' => 'blog', 'posts_per_page' => 2));
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <div class="row position-relative teaser">
                    <div class="col-10" data-aos="fade-right" data-aos-delay="600">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'teaser-thumbnail')); ?>
                        <div class="teaser-desc teaser-desc--left" data-aos="fade-right" data-aos-delay="900">
                            <h3><?php the_title(); ?></h3>
                            <a href="<?php the_permalink(); ?>"
                               class="more-link"><?php _e('Read More', 'custom'); ?></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif;
            wp_reset_query(); ?>
        </div>
    </div>
    <div class="view-all-row text-right px-3 mt-5" data-aos="fade-right" data-aos-delay="300">
        <a href="<?php echo esc_url( get_category_link( 1 ) ); ?>" class="view-all"><?php _e('View All', 'custom'); ?></a>
    </div>
</section>