<?php /* Template Name: FAQ Page */ ?>
<?php get_header(); ?>
    <?php get_template_part("partials/organisms/banner"); ?>
    <section class="b-faq py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="panel panel--filter mt-0">
                        <div class="panel__title" data-js="panel__title">
                            Still have questions
                        </div>
                        <div class="panel__body">
                            <form class="f-filter">
                                <fieldset class="category">
                                    <?php
                                    $terms = get_terms('categories_faq', $args = array('hide_empty' => false));
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        echo '<legend>Categories</legend>';
                                        foreach ($terms as $term) {
                                            echo '<input type="radio" class="category" id="cat_' . $term->slug . '">';
                                            echo '<label for="cat_' . $term->slug . '">' . $term->name . '</label>';
                                        }
                                    }
                                    ?>
                                </fieldset>
                                <fieldset class="products">
                                    <?php
                                    $cpt_query = new WP_Query(array(
                                        'post_type' => 'our_products',
                                        'posts_per_page' => -1
                                    ));
                                    if ($cpt_query->have_posts()) :
                                        echo '<legend>Products</legend>';
                                        while ($cpt_query->have_posts()) : $cpt_query->the_post();
                                            echo '<input type="radio" class="product" id="prod_' . basename(get_permalink()) . '">';
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
                                                'post_type' => 'faqs',
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
                                            $prod_list = 'none';
                                            foreach($posts as $post) {
                                                if(!empty(get_field('select_product'))) {
                                                    $prod_array = get_field('select_product');
                                                    $prod_list = '';
                                                    foreach ($prod_array as $prod) {
                                                        $prod_list .= 'prod_' . $prod->post_name . ',';
                                                    }
                                                } else {
                                                    $prod_list = 'none';
                                                }
                                            }
                                            echo '<input type="checkbox" class="flavor" id="flavor_' . $flavor->slug . '" data-flavor-for-product="' .  $prod_list . '">';
                                            echo '<label for="flavor_' . $flavor->slug . '">' . $flavor->name . '</label>';
                                            wp_reset_query();
                                        }
                                    }
                                    ?>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="filter-results">
                        <?php
                        $terms = get_terms('categories_faq', $args = array('hide_empty' => false));
                        if (!empty($terms) && !is_wp_error($terms)) {
                            foreach ($terms as $term) { ?>
                                <div class="category-group" data-filter-target="<?php echo 'cat_' . $term->slug; ?>">
                                    <h2><?php echo $term->name; ?></h2>
                                    <?php
                                    $faq_query = new WP_Query(array(
                                        'post_type' => 'faqs',
                                        'posts_per_page' => -1,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'categories_faq',
                                                'field' => 'slug',
                                                'terms' => $term->slug
                                            )
                                        )
                                    ));
                                    while ($faq_query->have_posts()) : $faq_query->the_post();
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
                                        echo '<!-- Product: ' . $prod_list . ' -->';
                                         ?>
                                            <div class="panel" data-filter-target="<?php echo $prod_list; ?>" data-flavor-target="<?php echo $flavor_list; ?>">
                                                <div class="panel__title" data-js="panel__title"><?php the_title(); ?></div>
                                                <div class="panel__body"><?php the_content(); ?></div>
                                            </div>
                                            <?php
                                    endwhile;
                                    wp_reset_query();
                                    ?>
                                </div>
                            <?php }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>