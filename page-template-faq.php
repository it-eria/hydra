<?php /* Template Name: FAQ Page */ ?>
<?php get_header(); ?>
    <section class="banner">
        <img src="<?php the_field('faq_main_bg', 'option'); ?>" alt="banner" class="img-fluid">
    </section>
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
                                <fieldset>
                                    <?php
                                    $terms = get_terms('categories_faq', $args = array('hide_empty' => false));
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        echo '<legend>Categories</legend>';
                                        echo '<input type="checkbox" class="category" id="cat-all" data-js="check-all">';
                                        echo '<label for="cat-all">All</label>';
                                        foreach ($terms as $term) {
                                            echo '<input type="checkbox" class="category" id="' . $term->slug . '">';
                                            echo '<label for="' . $term->slug . '">' . $term->name . '</label>';
                                        }
                                    }
                                    ?>
                                </fieldset>
                                <fieldset>
                                    <?php
                                    $cpt_query = new WP_Query(array(
                                        'post_type' => 'our_products',
                                        'posts_per_page' => -1
                                    ));
                                    if ($cpt_query->have_posts()) :
                                        echo '<legend>Products</legend>';
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
                        <?php
                        $cpt_query = new WP_Query(array(
                            'post_type' => 'faq_post_type',
                            'taxonomy' => 'categories_faq',
                            'posts_per_page' => -1
                        ));
                        if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post(); ?>
                            <?php $categories_faq_term_list = wp_get_post_terms($post->ID, 'categories_faq', array("fields" => "all")); ?>
                            <div class="category-group"
                                 data-filter-target="<?php echo $categories_faq_term_list[0]->slug; ?>">
                                <h2><?php the_title(); ?></h2>
                                <?php
                                $cptt_query = new WP_Query(array(
                                    'post_type' => 'faq_post_type',
                                    'posts_per_page' => -1
                                ));
                                if ($cptt_query->have_posts()) : while ($cptt_query->have_posts()) : $cptt_query->the_post(); ?>
                                    <?php $element_id = get_field('select_product'); ?>
                                    <div class="panel"
                                         data-filter-target="<?php echo basename(get_permalink($element_id)); ?>">
                                        <div class="panel__title" data-js="panel__title">
                                            <?php the_title(); ?>
                                        </div>
                                        <div class="panel__body">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; endif;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>