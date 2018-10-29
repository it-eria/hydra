<div class="panel panel--filter active mt-0">
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
                        echo '<input type="checkbox" class="category" id="cat_' . $term->slug . '">';
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
                            echo '<input type="checkbox" class="flavor" id="flavor_' . $flavor->slug . '" data-flavor-for-product="' .  $prod_list . '">';
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