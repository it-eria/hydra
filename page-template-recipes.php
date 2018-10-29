<?php /* Template Name: Recipes Page */ ?>
<?php get_header(); ?>
<?php get_template_part("partials/organisms/banner"); ?>
<section class="b-faq py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="panel panel--filter mt-0">
                    <div class="panel__title" data-js="panel__title">
                        Filter
                    </div>
                    <div class="panel__body">
                        <form class="f-filter">
                            <fieldset class="category">
                                <?php
                                $terms = get_terms('recipes_cat', $args = array('parent' => 0, 'hide_empty' => false, 'hierarchical' => false));
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    echo '<legend>Categories</legend>';
                                    foreach ($terms as $term) {
                                        echo '<input type="radio" name="cat" class="category" id="cat_' . $term->slug . '">';
                                        echo '<label for="cat_' . $term->slug . '">' . $term->name . '</label>';
                                    }
                                }
                                ?>
                            </fieldset>
                            <fieldset class="products">
                                <?php
                                $terms = get_terms('recipes_cat', $args = array('parent' => 0, 'hide_empty' => false, 'hierarchical' => false));
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    echo '<legend>Products</legend>';
                                    foreach ($terms as $term) {
                                        $term_children = get_terms('recipes_cat', $args = array('parent' => $term->term_id, 'hide_empty' => false, 'hierarchical' => 0));
                                        if (!empty($term_children) && !is_wp_error($term_children)) {
                                            foreach ($term_children as $child) {
                                                echo '<input type="radio" name="prod" class="product" id="prod_' . $child->slug . '" data-product-for-category="cat_' . $term->slug . '">';
                                                echo '<label for="prod_' . $child->slug . '">' . $child->name . '</label>';
                                            }
                                        }
                                    }
                                }
                                ?>
                            </fieldset>
                            <fieldset class="flavors">
                                <?php
                                $terms = get_terms('recipes_cat', $args = array('parent' => 0, 'hide_empty' => false, 'hierarchical' => false));
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    echo '<legend>Flavors</legend>';
                                    foreach ($terms as $term) {
                                        $term_children = get_terms('recipes_cat', $args = array('parent' => $term->term_id, 'hide_empty' => false, 'hierarchical' => 0));
                                        if (!empty($term_children) && !is_wp_error($term_children)) {
                                            foreach ($term_children as $child) {
                                                $term_sub_children = get_terms('recipes_cat', $args = array('parent' => $child->term_id, 'hide_empty' => false, 'hierarchical' => 0));
                                                if (!empty($term_sub_children) && !is_wp_error($term_sub_children)) {
                                                    foreach ($term_sub_children as $sub_child) {
                                                        echo '<input type="checkbox" class="category" id="flavor_' . $sub_child->slug . '"  data-flavor-for-product="prod_' .  $child->slug . '">';
                                                        echo '<label for="flavor_' . $sub_child->slug . '">' . $sub_child->name . '</label>';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="filter-results">
                    <?php
                    function get_tax_level($id, $tax){
                        $ancestors = get_ancestors($id, $tax);
                        return count($ancestors)+1;
                    }
                    $terms = get_terms('recipes_cat', $args = array('parent' => 0, 'hide_empty' => false));
                    if (!empty($terms) && !is_wp_error($terms)) {
                        foreach ($terms as $term) { ?>
                            <div class="category-group" data-filter-target="<?php echo 'cat_' . $term->slug; ?>">
                                <h2><?php echo $term->name; ?></h2>
                                <?php
                                $faq_query = new WP_Query(array(
                                    'post_type' => 'recipes',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'recipes_cat',
                                            'field' => 'slug',
                                            'terms' => $term->slug
                                        )
                                    )
                                ));
                                while ($faq_query->have_posts()) : $faq_query->the_post();
                                    $term_list = wp_get_post_terms($post->ID, 'recipes_cat', array("fields" => "all","orderby" => "parent", 'order' => 'ASC'));
                                    $prod_list = '';
                                    $flavor_list = '';
                                    foreach($term_list as $term_single) {
                                        $current_term_level = get_tax_level($term_single->term_id, 'recipes_cat');
                                        if ($current_term_level == 2) {
                                            $prod_list .= 'prod_' . $term_single->slug . ',';
                                        }
                                        if ($current_term_level == 3) {
                                            $flavor_list .= 'flavor_' . $term_single->slug . ',';
                                        }
                                    }
                                    ?>
                                    <div class="panel justify-content-center mt-1 mb-1" data-filter-target="<?php echo rtrim($prod_list, ','); ?>" data-flavor-target="<?php echo rtrim($flavor_list, ','); ?>">
                                        <div class="teaser-desc position-absolute bg-transparent mw-100 p-4">
                                            <h3 style="color: <?php the_field('choose_title_color'); ?>"><?php the_title(); ?></h3>
                                        </div>
                                        <div class="teaser-thumbnail-page mw-100" data-js="recipe-teaser-thumbnail ">
                                            <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?></a>
                                        </div>
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