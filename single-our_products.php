<?php get_header(); ?>
    <section class="b-product pt-5 pb-3">
        <?php if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <div class="container">
                    <div class="row align-items-center mt-5">
                        <div class="col-9 pr-0 position-relative z-index-200">
                            <div class="d-flex flex-row align-items-center">
                                <?php
                                    while (have_rows('product_type')): the_row();
                                    $product_type_row = get_row_index();
                                    ?>
                                    <ul data-priduct-type="type-<?php echo $product_type_row; ?>" class="ml-list position-absolute">
                                        <?php
                                            while (have_rows('variables_product')): the_row();
                                            $variables_product_row = get_row_index();
                                            ?>
                                            <li class="choose-elem" id="<?php echo 'type-' . $product_type_row . '-variable-' . $variables_product_row; ?>">
                                                <a data-product-img="<?php echo get_sub_field('variable_product_image')['sizes']['large']; ?>" data-product-url="<?php echo get_sub_field('variable_product_url'); ?>">
                                                    <?php the_sub_field('variable_product_capacity'); ?>
                                                </a>
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
                                    <img id="product-img" class="img-fluid" src="<?php echo $param["variable_product_image"]['sizes']['large']; ?>" />
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
                                    while (have_rows('product_type')): the_row();
                                        $flavor = get_sub_field('flavor_name');
                                        $color = get_sub_field("color_body");
                                        $product_type = get_row_index();
                                        echo '<li id="' . $flavor->slug . '"><a class="filter-taste" data-color="' . $color . '" data-priduct-type="type-' . $product_type . '" data-product-type="type-' . $product_type . '">' . $flavor->name . '</a></li>';
                                    endwhile;
                                    ?>
                                </ul>
                                <?php
                                $taste_filter = get_field('product_type');
                                $last_row = end($taste_filter);
                                ?>
                                <span class="current"><?php echo $last_row['flavor_name']->name; ?></span>
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

                        <?php get_template_part("partials/organisms/nutrion"); ?>

                        <div class="filter-elements inf-window" id="recipes">
                            <div class="content">
                                <?php
                                $recipes_query = new WP_Query(array(
                                    'post_type' => 'recipes',
                                    'posts_per_page' => -1,
                                    'meta_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'key' => 'select_product',
                                            'value' => get_the_ID(),
                                            'compare' => 'LIKE',
                                        )
                                    )
                                ));
                                if ($recipes_query->have_posts()) : ?>
                                    <h5><?php _e('Recipes', 'custom'); ?></h5>
                                    <?php
                                        while ($recipes_query->have_posts()) : $recipes_query->the_post();
                                            if(!empty(get_field('select_flavor'))) {
                                                $flavor_array = get_field('select_flavor');
                                                $flavor_list = '';
                                                foreach ($flavor_array as $flavor) {
                                                    $flavor_list .= $flavor->name . ',';
                                                }
                                            } else {
                                                $flavor_list = 'none';
                                            }
                                    ?>
                                        <div class="row mt-1 mb-1 justify-content-center panel" data-flavor-target="<?php echo $flavor_list; ?>">
                                            <div class="col-12">
                                                <div>
                                                    <div class="teaser-desc position-absolute bg-transparent mw-100 p-4">
                                                        <h3 style="color: <?php the_field('choose_title_color'); ?>"><?php the_title(); ?></h3>
                                                    </div>
                                                    <div class="teaser-thumbnail-page mw-100" >
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="img"/>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                endif;
                                wp_reset_query(); ?>
                            </div>
                        </div>

                        <?php get_template_part("partials/organisms/store"); ?>

                        <div class="filter-elements inf-window" id="faq">
                            <?php
                            $faq_query = new WP_Query(array(
                                'post_type' => 'faqs',
                                'posts_per_page' => -1,
                                'meta_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'key' => 'select_product',
                                        'value' => get_the_ID(),
                                        'compare' => 'LIKE',
                                    )
                                ),
                            ));
                            ?>
                            <?php if ($faq_query->have_posts()) : ?>
                                <h5><?php _e('Frequently Asked Questions:', 'custom'); ?></h5>
                                <div class="content">
                                    <h3><?php _e('Still have questions', 'custom'); ?></h3>
                                    <?php
                                        while ($faq_query->have_posts()) : $faq_query->the_post();
                                        if(!empty(get_field('select_flavor'))) {
                                            $flavor_array = get_field('select_flavor');
                                            $flavor_list = '';
                                            foreach ($flavor_array as $flavor) {
                                                $flavor_list .= $flavor->name . ',';
                                            }
                                        } else {
                                            $flavor_list = 'none';
                                        }
                                        ?>
                                        <div class="panel" data-flavor-target="<?php echo $flavor_list; ?>">
                                            <div class="panel__title" data-js="panel__title">
                                                <?php the_title(); ?>
                                            </div>
                                            <div class="panel__body">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php
                            endif;
                            wp_reset_query();
                            ?>
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
        ?>
    </section>
<?php get_footer(); ?>