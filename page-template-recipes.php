<?php /* Template Name: Recipes Page */ ?>
<?php get_header(); ?>
<section class="banner pt-5">
    <img src="<?php the_field('recipes_main_bg', 'option'); ?>" alt="banner" class="img-fluid">
</section>
<section class="b-faq py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="panel panel--filter mt-0">
                    <div class="panel__title" data-js="panel__title">
                        Recipes filter
                    </div>
                    <div class="panel__body">
                        <form class="f-filter recipes-filter">
                            <fieldset>
                                <?php
                                $cpt_query = new WP_Query(array(
                                    'post_type' => 'our_products',
                                    'posts_per_page' => -1
                                ));
                                if ($cpt_query->have_posts()) :
                                    echo '<legend>Recipes</legend>';
                                    echo '<input type="checkbox" class="product" id="prod-all" data-js="check-all">';
                                    echo '<label for="prod-all">All</label>';
                                    while ($cpt_query->have_posts()) : $cpt_query->the_post();
                                        echo '<input type="checkbox" class="product" id="' . basename(get_permalink()) . '">';
                                        echo '<label for="' . basename(get_permalink()) . '">' . get_the_title() . '</label>';
                                    endwhile;
                                endif;
                                wp_reset_query();
                                ?>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="filter-results">
                    <div class="recipes p-0">
                        <div class="category-group m-0">
                            <?php
                            $cptt_query = new WP_Query(array(
                                'post_type' => 'recipes_page',
                                'posts_per_page' => -1
                            ));
                            if ($cptt_query->have_posts()) : while ($cptt_query->have_posts()) : $cptt_query->the_post(); ?>
                                <?php $element_id = get_field('select_product_recipes'); ?>
                                <div class="row mt-5 mb-5 justify-content-center recipe-teaser-single"
                                     data-aos="fade-up" data-aos-delay="600" data-showing="show-style" data-filter-recipes="<?php echo basename(get_permalink($element_id)); ?>">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="teaser-desc">
                                                <h3><?php the_title(); ?></h3>
                                                <a href="<?php the_permalink(); ?>"
                                                   class="more-link"><?php _e('Read More', 'custom'); ?></a>
                                            </div>
                                            <div class="teaser-thumbnail" data-js="recipe-teaser-thumbnail">
                                                <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                            endif; ?>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
