<?php /* Template Name: FAQ Page */ ?>
<?php get_header(); ?>
    <section class="banner">
        <img src="<?php the_field('faq_main_bg', 'option'); ?>" alt="banner" class="img-fluid">
    </section>
    <section class="b-faq py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="panel panel--filter mt-0 active">
                        <div class="panel__title" data-js="panel__title">
                            Still have questions
                        </div>
                        <div class="panel__body">
                            <form class="f-filter">
                                <fieldset id="catCheck">
                                    <?php
                                    $terms = get_terms('categories_faq', $args = array('hide_empty' => false));
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        echo '<legend>Categories</legend>';
                                        foreach ($terms as $term) {
                                            echo '<input data-js="checkbox-item" type="checkbox" class="category" id="' . $term->slug . '">';
                                            echo '<label for="' . $term->slug . '">' . $term->name . '</label>';
                                        }
                                    }
                                    ?>
                                </fieldset>
                                <fieldset id="prodCheck">
                                    <?php
                                    $cpt_query = new WP_Query(array(
                                        'post_type' => 'our_products',
                                        'posts_per_page' => -1
                                    ));
                                    if ($cpt_query->have_posts()) :
                                        echo '<legend>Products</legend>';
                                        while ($cpt_query->have_posts()) : $cpt_query->the_post();
                                            echo '<input data-js="checkbox-item" type="checkbox" class="product" id="' . basename(get_permalink()) . '">';
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
                        <?php
                        $terms = get_terms('categories_faq', $args = array('hide_empty' => false));
                        if (!empty($terms) && !is_wp_error($terms)) {
                            foreach ($terms as $term) { ?>
                                <div class="category-group"
                                     data-filter-target="<?php echo $term->slug; ?>">
                                    <h2><?php echo $term->name; ?></h2>
                                    <?php
                                    $faq_query = new WP_Query(array(
                                        'post_type' => 'faq_post_type',
                                        'posts_per_page' => -1,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'categories_faq',
                                                'field' => 'slug',
                                                'terms' => $term->slug
                                            )
                                        ),
                                    ));
                                    while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
                                        <?php
                                        $product_id = get_field('select_product');
                                        $product = get_post($product_id);
                                        $slug = $product->post_name;
                                        ?>
                                        <div class="panel"
                                             data-filter-target="<?php echo $slug; ?>">
                                            <div class="panel__title" data-js="panel__title">
                                                <?php the_title(); ?>
                                            </div>
                                            <div class="panel__body">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
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