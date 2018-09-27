<?php /* Template Name: Recipes Page */ ?>
<?php get_header(); ?>
<section style="padding-top: 100px;" class="recipes" data-aos="fade-up">
    <?php
    $wpb_all_recipes = new WP_Query(array('post_type' => 'recipes', 'post_status' => 'publish', 'posts_per_page' => 3));
    if ($wpb_all_recipes->have_posts()) : ?>
        <div class="mb-4">
            <div class="section-title section-title--big" data-aos="fade-right" data-aos-delay="300">
                <h2><?php _e('Recipes', 'custom'); ?></h2>
            </div>
        </div>
        <div class="container">
            <?php while ($wpb_all_recipes->have_posts()) : $wpb_all_recipes->the_post(); ?>
                <div class="row justify-content-center recipe-teaser" data-aos="fade-up" data-aos-delay="600">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="teaser-desc">
                                <h3><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>"
                                   class="more-link"><?php _e('Read More', 'custom'); ?></a>
                            </div>
                            <div class="teaser-thumbnail" data-js="recipe-teaser-thumbnail">
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_query(); ?>
</section>
<?php get_footer(); ?>
