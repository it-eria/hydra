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
                        <form class="f-filter">
                            <fieldset class="products">
                                <?php
                                $cpt_query = new WP_Query(array(
                                    'post_type' => 'our_products',
                                    'posts_per_page' => -1
                                ));
                                if ($cpt_query->have_posts()) :
                                    echo '<legend>Products</legend>';
                                    while ($cpt_query->have_posts()) : $cpt_query->the_post();
                                        echo '<input type="checkbox" class="product" id="prod_' . basename(get_permalink()) . '">';
                                        echo '<label for="prod_' . basename(get_permalink()) . '">' . get_the_title() . '</label>';
                                    endwhile;
                                endif;
                                wp_reset_query();
                                ?>
                            </fieldset>
                            <fieldset class="flavors">
                                <?php
                                $terms_flavors = get_terms('flavors', $args = array('hide_empty' => false));
                                if (!empty($terms_flavors) && !is_wp_error($terms_flavors)) {
                                    echo '<legend>Flavors</legend>';
                                    foreach ($terms_flavors as $flavor) {
                                        $query = new WP_Query(array(
                                            'post_type' => 'recipes',
                                            'posts_per_page' => -1,
                                            'meta_query' => array(
                                                'relation' => 'AND',
                                                array(
                                                    'key' => 'select_flavor',
                                                    'value' => $flavor->term_id,
                                                    'compare' => 'LIKE',
                                                )
                                            ),
                                        ));
                                        $posts = $query->posts;
                                        foreach($posts as $post) {
                                            $product = get_field('select_product')[0];
                                            echo '<input type="checkbox" class="flavor" id="flavor_' . $flavor->slug . '" data-flavor-for-product="prod_' .  get_post($product)->post_name . '">';
                                            echo '<label for="flavor_' . $flavor->slug . '">' . $flavor->name . '</label>';
                                        }
                                        wp_reset_query();
                                    }
                                }
                                ?>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="filter-results">
                    <div class="recipes p-0">
                            <div class="category-group m-0">
                                <?php
                                $recipes_query = new WP_Query(array(
                                    'post_type' => 'recipes',
                                    'posts_per_page' => -1
                                ));
                                while ($recipes_query->have_posts()) : $recipes_query->the_post();
                                    if(!empty(get_field('select_product'))) {
                                        $prod_array = get_field('select_product');
                                        $prod_list = '';
                                        foreach ($prod_array as $prod) {
                                            $prod_list .= 'prod_' . $prod->post_name . ',';
                                        }
                                    } else {
                                        $prod_list = 'none';
                                    }

                                    if(!empty(get_field('select_flavor'))) {
                                        $flavor_array = get_field('select_flavor');
                                        $flavor_list = '';
                                        foreach ($flavor_array as $flavor) {
                                            $flavor_list .= 'flavor_' . $flavor->slug . ',';
                                        }
                                    } else {
                                        $flavor_list = 'none';
                                    }
                                    echo '<!-- Recipe: ' . $prod_list . ' -->';
                                    ?>
                                    <div class="row mt-1 mb-1 justify-content-center panel" data-aos="fade-up" data-aos-delay="600" data-filter-target="<?php echo $prod_list; ?>" data-flavor-target="<?php echo $flavor_list; ?>">
                                        <div class="col-12">
                                            <div class="">
                                                <div class="teaser-desc position-absolute bg-transparent mw-100">
                                                    <h3 style="color: <?php the_field('choose_title_color'); ?>"><?php the_title(); ?></h3>
                                                </div>
                                                <div class="teaser-thumbnail-page mw-100" data-js="recipe-teaser-thumbnail ">
                                                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_query();
                                ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>