<section class="our-products">
    <?php
    $wpb_all_query = new WP_Query(array('post_type' => 'our_products', 'post_status' => 'publish', 'posts_per_page' => -1));
    if ($wpb_all_query->have_posts()) : ?>
        <div class="wrapper text-right">
            <div class="section-title">
                <h2><?php _e('Our Products', 'custom'); ?></h2>
            </div>
            <div class="our-products__slider" data-js="our-products__slider">
                <?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>
                    <div class="our-products__slider__slide">
                        <div class="product-thumbnail">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                        </div>
                        <div class="product-desc">
                            <div class="product-title">
                                <h4><?php the_title(); ?></h4>
                            </div>
                            <?php the_excerpt(); ?>
                            <div class="learn-more-row">
                                <a href="<?php the_permalink(); ?>"><?php _e('Learn more', 'custom'); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif;
    wp_reset_query(); ?>
</section>
<section class="our-products-desc">
    <span class="decorator-1"></span>
    <span class="decorator-2"></span>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="our-products__desc-inf">
                    <div>
                        <h3><?php the_field('title_under_slider'); ?></h3>
                        <?php the_field('description_under_slider'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>