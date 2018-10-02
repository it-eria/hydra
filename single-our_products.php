<?php get_header(); ?>
    <section class="b-product pt-5 pb-3">
        <?php if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <div class="container">
                    <div class="row align-items-center mt-5">
                        <div class="col-9 pr-0 position-relative z-index-200">
                            <div class="d-flex flex-row align-items-center">
                                <?php while (have_rows('product_type')): the_row(); ?>
                                    <ul data-priduct-type="type-<?php echo get_row_index(); ?>"
                                        class="ml-list position-absolute">
                                        <?php while (have_rows('variables_product')): the_row(); ?>
                                            <li class="choose-elem"><a
                                                        data-product-img="<?php the_sub_field('variable_product_image'); ?>"
                                                        data-product-url="<?php the_sub_field('variable_product_url'); ?>"
                                                        href="#"><?php the_sub_field('variable_product_capacity'); ?></a>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endwhile; ?>
                                <?php
                                $taste_filter = get_field('product_type');
                                $iha = end($taste_filter)["variables_product"];
                                $param = end($iha);
                                ?>
                                <div class="product-thumbnail w-100 position-relative">
                                    <img id="product-img" class="img-fluid"
                                         src="<?php echo $param["variable_product_image"]; ?>" alt="sport">
                                </div>
                            </div>
                        </div>
                        <div class="col-3 px-0 position-relative z-index-100">
                            <a id="product-url" class="buy" href="<?php echo $param["variable_product_url"]; ?>">
                                <span>buy<small>online<br>now</small></span>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 text-left">
                            <div class="label-for-filter">
                                <h5><?php _e('Available Flavors:', 'custom'); ?></h5>
                            </div>
                            <div class="filter" data-js="filter">
                                <ul>
                                    <?php
                                    while (have_rows('product_type')): the_row(); ?>
                                        <?php echo '<li><a class="filter-taste" data-color="' . get_sub_field("color_body") . '" data-priduct-type="type-' . get_row_index() . '" data-product-type="type-' . get_row_index() . '">' . get_sub_field("product_type_name") . '</a></li>'; ?>
                                    <?php endwhile; ?>
                                </ul>
                                <?php
                                $taste_filter = get_field('product_type');
                                $last_row = end($taste_filter);
                                ?>
                                <span class="current"><?php echo $last_row['product_type_name']; ?></span>
                                <i class="arrow"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 product-type">
                            <h3><?php the_title(); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="position-relative mt-4">
                    <div class="flyouts position-absolute">
                        <div class="inf-window" id="product-details">
                            <div class="content">
                                <div class="product-detail-title text-center">
                                    <h4><?php the_title(); ?></h4>
                                </div>
                                <div class="product-detail-text text-center mt-3 pr-2">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="inf-window text-center" id="nutrion">
                            <div class="content">
                                <div class="nutrition-table clearfix">
                                    <?php
                                    $formPerso = get_field('place_for_recipe_shortcode');
                                    echo do_shortcode($formPerso); ?>
                                    <?php if (have_rows('nutririon_recipes')):
                                        while (have_rows('nutririon_recipes')): the_row(); ?>
                                            <div class="recipes_container">
                                                <p>
                                                    <?php the_sub_field('nutrition_title'); ?>
                                                </p>
                                                <img src="<?php the_sub_field('nutrition_image'); ?>" alt="img"/>
                                            </div>
                                        <?php endwhile;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="inf-window" id="recipes">
                            <div class="content">
                                <?php
                                $wp_product_recipes = new WP_Query(array(
                                    'post_type' => 'recipes_page',
                                    'posts_per_page' => -1,
                                    'meta_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'key' => 'select_product_recipes',
                                            'value' => get_the_ID(),
                                            'compare' => '=',
                                        )
                                    )
                                )); ?>
                                <?php if ($wp_product_recipes->have_posts()) : ?>
                                    <h5><?php _e('Recipes', 'custom'); ?></h5>
                                        <?php while ($wp_product_recipes->have_posts()) : $wp_product_recipes->the_post(); ?>
                                            <div class="panel">
                                                <div class="panel__title" data-js="panel__title">
                                                    <?php the_title(); ?>
                                                </div>

                                                <div class="panel__body">
                                                    <div class="recipes-main-img">
                                                        <img src="<?php the_post_thumbnail_url('full');?>" alt="img" />
                                                    </div>
                                                    <?php the_content(); ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>

                                <?php endif;
                                wp_reset_query(); ?>
                            </div>
                        </div>
                        <div class="inf-window" id="store">
                            <h5>Store Locator:</h5>
                            <div class="content">
                                <a href="#" class="specific-product">Select Specific Products</a>
                                <form action="#">
                                    <input type="text" id="search-text" placeholder="City/Zip Code" class="search-box">
                                </form>
                                <div class="results">
                                    <div class="results__header">
                                        <div class="row">
                                            <div class="col-4 pr-0 list-count">
                                            </div>
                                            <div class="col-4 text-center">
                                            </div>
                                            <div class="col-4 text-right">
                                                <i class="mail"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (have_rows('addresses')): ?>
                                    <div class="results__list">
                                        <ul id="list">
                                            <?php while (have_rows('addresses')): the_row();
                                                $address = get_sub_field('address');
                                                $location_on_google = get_sub_field('location_on_google');
                                                ?>
                                                <li class="hiding out hidden">
                                                    <div class="row align-items-center">
                                                        <?php if ($address): ?>
                                                            <div class="col-9">
                                                                <address>
                                                                    <?php echo $address; ?>
                                                                </address>
                                                            </div>
                                                            <?php if ($location_on_google): ?>
                                                                <div class="col-3 text-right">
                                                                    <a target="_blank"
                                                                       href="<?php echo $location_on_google; ?>"
                                                                       class="more"></a>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </li>
                                            <?php endwhile; ?>
                                            <div class="empty-item show-res">
                                                <?php the_field('locator_content', 'option'); ?>

                                            </div>
                                        </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="inf-window" id="faq">
                            <?php
                            $wp_product_faq = new WP_Query(array(
                                'post_type' => 'faq_post_type',
                                'posts_per_page' => -1,
                                'meta_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'key' => 'select_product',
                                        'value' => get_the_ID(),
                                        'compare' => '=',
                                    )
                                ),
                            )); ?>
                            <?php if ($wp_product_faq->have_posts()) : ?>
                                <h5>
                                    <?php _e('Frequently Asked Questions:', 'custom'); ?></h5>
                                <div class="content">
                                    <h3>
                                        <?php _e('Still have questions', 'custom'); ?></h3>
                                    <?php while ($wp_product_faq->have_posts()) : $wp_product_faq->the_post(); ?>
                                        <div class="panel">
                                            <div class="panel__title" data-js="panel__title">
                                                <?php the_title(); ?>
                                            </div>
                                            <div class="panel__body">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif;
                            wp_reset_query(); ?>
                        </div>
                    </div>
                    <div class="product-page-nav" data-js="product-page-nav">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <ul>
                                        <li>
                                            <a href="#" data-target="product-details">
                                                <?php _e('Product Details', 'custom'); ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-target="nutrion">
                                                <?php _e('Nutrition', 'custom'); ?>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" data-target="recipes">
                                                <?php _e('Recipes', 'custom'); ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-target="store">
                                                <?php _e('Store Locator', 'custom'); ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-target="faq">
                                                <?php _e('FAQ', 'custom'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;
        endif;
        wp_reset_query(); ?>
    </section>
<?php get_footer(); ?>