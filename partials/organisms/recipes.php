<?php $recipes_background_color = get_field('color_settings', 'option'); ?>

<section class="recipes" data-aos="fade-up" <?php if($recipes_background_color) { echo 'style="background-color: ' . $recipes_background_color['recipes_background_color'] . '"'; } ?>>
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
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'img-fluid')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="view-all-row text-right px-3 mt-2" data-aos="fade-right" data-aos-delay="300">
            <a href="/recipes" class="view-all"><?php _e('View All', 'custom'); ?></a>
        </div>
    <?php endif;
    wp_reset_query(); ?>
    <div class="socials-wrapper mt-3 ml-auto" data-aos="fade-right">
        <?php if (have_rows('socials', 'option')): ?>
            <div class="text-center">
                <a href="#" class="follow"><?php _e('Follow Us', 'custom'); ?></a>
                <ul class="socials-list">
                    <?php while (have_rows('socials', 'option')): the_row();
                        $facebook_url = get_sub_field('facebook_url', 'option');
                        $instagram_url = get_sub_field('instagram_url', 'option');
                        $youtube_url = get_sub_field('youtube_url', 'option');
                        $pinterest_url = get_sub_field('pinterest_url', 'option');
                        ?>
                        <li><a href="<?php echo $facebook_url; ?>" class="fb"></a></li>
                        <li><a href="<?php echo $instagram_url; ?>" class="inst"></a></li>
                        <li><a href="<?php echo $youtube_url; ?>" class="yt"></a></li>
                        <li><a href="<?php echo $pinterest_url; ?>" class="pt"></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>