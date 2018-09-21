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
                                <input type="text" placeholder="City/Zip Code">
                                <button type="submit">Find</button>
                            </form>
                            <div class="results">
                                <div class="results__header">
                                    <div class="row">
                                        <div class="col-4 pr-0">
                                            18 results
                                        </div>
                                        <div class="col-4 text-center">
                                            <span>1 - 5</span> <a href="#" class="next"></a>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="mail"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="results__list">
                                    <ul>
                                        <li>
                                            <div class="row align-items-center">
                                                <div class="col-9">
                                                    <h5>7-eleven</h5>
                                                    <address>
                                                        3398 N State Road
                                                        Launderdale Lakes, FL 33319
                                                    </address>
                                                    <span>1.7mi | 1 Products</span>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <a href="#" class="more"></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row align-items-center">
                                                <div class="col-9">
                                                    <h5>7-eleven</h5>
                                                    <address>
                                                        640 North State Rd 7
                                                        Plantation, FL 33317
                                                    </address>
                                                    <span>2.2mi | 1 Products</span>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <a href="#" class="more"></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row align-items-center">
                                                <div class="col-9">
                                                    <h5>7-eleven</h5>
                                                    <address>
                                                        3398 N State Road
                                                        Launderdale Lakes, FL 33319
                                                    </address>
                                                    <span>1.7mi | 1 Products</span>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <a href="#" class="more"></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inf-window" id="faq">
                        <h5>Frequently Asked Questions:</h5>
                        <div class="content">
                            <h3>Still have questions</h3>
                            <div class="panel">
                                <div class="panel__title" data-js="panel__title">
                                    Does Vita Coco need to be refrigerated? How Long does Vita Coco last?
                                </div>
                                <div class="panel__body">
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo architecto
                                        quibusdam
                                        quaerat debitis consectetur, incidunt maiores qui exercitationem, perferendis
                                        dolorem,
                                        tenetur quia dolor nam beatae dicta? Eveniet error iure dolor!
                                    </p>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel__title" data-js="panel__title">
                                    When should I drink Vita Coco?
                                </div>
                                <div class="panel__body">
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo architecto
                                        quibusdam
                                        quaerat debitis consectetur, incidunt maiores qui exercitationem, perferendis
                                        dolorem,
                                        tenetur quia dolor nam beatae dicta? Eveniet error iure dolor!
                                    </p>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel__title" data-js="panel__title">
                                    How much Vita Coco should I drink?
                                </div>
                                <div class="panel__body">
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo architecto
                                        quibusdam
                                        quaerat debitis consectetur, incidunt maiores qui exercitationem, perferendis
                                        dolorem,
                                        tenetur quia dolor nam beatae dicta? Eveniet error iure dolor!
                                    </p>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel__title" data-js="panel__title">
                                    Is it safe to drink Vita Coco while pregnant?
                                </div>
                                <div class="panel__body">
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo architecto
                                        quibusdam
                                        quaerat debitis consectetur, incidunt maiores qui exercitationem, perferendis
                                        dolorem,
                                        tenetur quia dolor nam beatae dicta? Eveniet error iure dolor!
                                    </p>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="#" class="more">show more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-page-nav" data-js="product-page-nav">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <ul>
                                    <li>
                                        <a href="#" data-target="product-details">
                                            Product Details
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-target="nutrion">
                                            Nutrition
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-target="store">
                                            Store Locator
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-target="faq">
                                            FAQ
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
