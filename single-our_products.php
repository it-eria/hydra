<?php get_header(); ?>
<section class="b-product pt-5 pb-3">
    <?php if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <div class="container">
                <?php if (have_rows('variable_product')): ?>
                    <div class="row align-items-center mt-5">

                        <div class="col-9 pr-0 position-relative z-index-200">
                            <div class="d-flex flex-row align-items-center">

                                <ul class="ml-list position-absolute">
                                    <?php while (have_rows('variable_product')): the_row();
                                        $capacity = get_sub_field('capacity');
                                        $image = get_sub_field('image');
                                        $url_for_product = get_sub_field('url_for_product'); ?>
                                        <?php if ($capacity): ?>
                                        <li class="choose-elem"
                                            data-choose-id-trigger="<?php echo get_row_index(); ?>"><a
                                                    href="#"><?php echo $capacity; ?>ML</a></li><?php endif; ?>
                                    <?php endwhile; ?>
                                </ul>

                                <?php if ($image): ?>
                                    <div class="product-thumbnail w-100 position-relative">
                                        <?php while (have_rows('variable_product')): the_row();
                                            $capacity = get_sub_field('capacity');
                                            $image = get_sub_field('image');
                                            $url_for_product = get_sub_field('url_for_product'); ?>
                                            <img class="choose-list img-fluid"
                                                 data-choose-id="<?php echo get_row_index(); ?>"
                                                 src="<?php echo $image; ?>" alt="sport">
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($url_for_product): ?>
                            <div class="col-3 px-0 position-relative z-index-100">
                                <?php while (have_rows('variable_product')): the_row();
                                    $capacity = get_sub_field('capacity');
                                    $image = get_sub_field('image');
                                    $url_for_product = get_sub_field('url_for_product'); ?>
                                    <a class="choose-list buy" data-choose-id="<?php echo get_row_index(); ?>"
                                       href="<?php echo $url_for_product; ?>">
                                  <span>
                                    buy<small>online<br>now</small>
                                  </span>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="row mt-4">
                    <div class="col-12 text-left">
                        <div class="label-for-filter">
                            <h5>Available Flavors:</h5>
                        </div>
                        <div class="filter" data-js="filter">
                            <ul>
                                <?php
                                $args = array(
                                    'post_type' => 'our_products'
                                );
                                $loop = new WP_Query($args);
                                if ($loop->have_posts()) {
                                    while ($loop->have_posts()) : $loop->the_post();
                                        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                    endwhile;
                                    wp_reset_query();
                                }
                                ?>
                            </ul>
                            <span class="current">Original</span>
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
                                echo do_shortcode($formPerso);
                                ?>
                            </div>
                        </div>
                        <!--                        <span>-->
                        <!--          <b>Ingredients:</b> CoconutWater, Less than 1% of Citric Acid, abscorbic acid (Vitamin C), Thiamin (Vitamin B1), Niacinamide (Vitamin B3 ), Pyridoxine hcl (Vitamin B6), Cyanocobalamin (Vitamin B12), Panthotenic acid (Vitamin B5)-->
                        <!--        </span>-->
                    </div>
                    <div class="inf-window" id="store">
                        <h5>Store Locator:</h5>
                        <div class="content">
                            <a href="#" class="specific-product">Select Specific Products</a>
                            <form action="#">
                                <input type="text" id="search-text" placeholder="City/Zip Code" class="search-box">
                                <!--                                <button type="submit">Find</button>-->
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
<!--                                                            <h5>7-eleven</h5>-->
                                                            <address>
                                                                <?php echo $address; ?>
                                                            </address>
                                                            <!--                                                            <span>1.7mi | 1 Products</span>-->
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
                        <?php if (have_rows('faq_for_product')): ?>
                            <h5><?php _e('Frequently Asked Questions:', 'custom'); ?></h5>
                            <div class="content">
                                <h3><?php _e('Still have questions', 'custom'); ?></h3>
                                <?php while (have_rows('faq_for_product')): the_row();
                                    $question = get_sub_field('question');
                                    $answer = get_sub_field('answer');
                                    ?>
                                    <div class="panel">
                                        <?php if ($question): ?>
                                            <div class="panel__title" data-js="panel__title">
                                                <?php echo $question; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($answer): ?>
                                            <div class="panel__body">
                                                <?php echo $answer; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                                <div class="text-center">
                                    <a href="#" class="more"><?php _e('show more', 'custom'); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>
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
