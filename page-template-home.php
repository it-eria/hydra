<?php /* Template Name: Home Page */ ?>
<?php get_header(); ?>

<section class="main-slider-section" data-aos="fade-up" data-aos-delay="300">
    <?php if (have_rows('slider')): ?>
        <div class="main-slider" data-js="main-slider">
            <?php while (have_rows('slider')): the_row();
                $slide_image = get_sub_field('slide_image');
                $slide_url = get_sub_field('slide_url');
                $flavor_for_url = get_sub_field('flavor_for_url');
                if(!empty($flavor_for_url)) { $flavor = '?flavor=' . $flavor_for_url->slug; } else { $flavor = ''; }
                ?>
                <div class="main-slider__slide">
                    <?php if ($slide_image): ?><img src="<?php echo $slide_image; ?>" alt="slide"><?php endif; ?>
                    <?php if ($slide_url): ?><a href="<?php echo $slide_url; echo $flavor; ?>" class="learn-more "><?php _e('Learn More', 'custom'); ?></a><?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>
<section class="our-products">
    <?php
    $wpb_all_query = new WP_Query(array('post_type' => 'our_products', 'post_status' => 'publish', 'posts_per_page' => -1));
    if ($wpb_all_query->have_posts()) : ?>
        <div class="wrapper text-right">
            <div class="section-title">
                <h2><?php _e('Our Products', 'custom'); ?></h2>
            </div>
            <div class="our-products__slider" data-js="our-products__slider">
                <?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>
                    <div class="our-products__slider__slide">
                        <div class="product-thumbnail">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                        </div>
                        <div class="product-desc">
                            <div class="product-title">
                                <h4><?php the_title(); ?></h4>
                            </div>
                            <?php the_excerpt(); ?>
                            <div class="learn-more-row">
                                <a href="<?php the_permalink(); ?>"><?php _e('Learn more', 'custom'); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif;
    wp_reset_query(); ?>
</section>
<section class="our-products-desc">
    <span class="decorator-1"></span>
    <span class="decorator-2"></span>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="our-products__desc-inf">
                    <div>
                        <h3><?php the_field('title_under_slider'); ?></h3>
                        <?php the_field('description_under_slider'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our-blog" data-aos="fade-up">
    <span class="decorator"></span>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-title" data-aos="fade-right" data-aos-delay="300">
                    <h2><?php _e('Our Blog', 'custom'); ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="teasers-wraper">
        <div class="container-fluid px-0">
            <?php $query = new WP_Query(array('category_name' => 'blog', 'posts_per_page' => 2));
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <div class="row position-relative teaser">
                    <div class="col-10" data-aos="fade-right" data-aos-delay="600">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'medium', array('class' => 'teaser-thumbnail')); ?>
                        <div class="teaser-desc teaser-desc--left" data-aos="fade-right" data-aos-delay="900">
                            <h3><?php the_title(); ?></h3>
                            <a href="<?php the_permalink(); ?>"
                               class="more-link"><?php _e('Read More', 'custom'); ?></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif;
            wp_reset_query(); ?>
        </div>
    </div>
    <div class="view-all-row text-right px-3 mt-5" data-aos="fade-right" data-aos-delay="300">
        <a href="<?php the_permalink(13); ?>" class="view-all"><?php _e('View All', 'custom'); ?></a>
    </div>
</section>
<?php if (get_field('showhide_all_block', 58) == 'show'): ?>
    <section class="reviews" data-aos="fade-up">
        <div class="text-right mb-5">
            <div class="section-title section-title--big" data-aos="fade-right" data-aos-delay="300">
                <h2><?php echo get_the_title(58); ?></h2>
            </div>
        </div>
        <div class="container">
            <?php
            $wpb_query_testimonials = new WP_Query(array('page_id' => 58, 'posts_per_page' => 2)); ?>
            <?php if ($wpb_query_testimonials->have_posts()) : ?>
                <?php while ($wpb_query_testimonials->have_posts()) : $wpb_query_testimonials->the_post(); ?>
                    <div class="row">
                        <div class="col-12 text-justify">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            <div class="row reviews-row">
                <?php if (have_rows('testimonial_item')):
                    while (have_rows('testimonial_item')): the_row();
                        $testimonial_description = get_sub_field('testimonial_description');
                        $testimonial_author = get_sub_field('testimonial_author'); ?>
                        <div class="review-teaser text-center" data-aos="fade-up">
                            <i class="quotes"></i>
                            <?php if ($testimonial_description):
                                echo $testimonial_description;
                            endif; ?>
                            <?php if ($testimonial_author): ?><h4><?php echo $testimonial_author; ?></h4><?php endif; ?>
                        </div>
                    <?php endwhile; endif;
                wp_reset_query(); ?>
            </div>
            <div class="row mt-4" data-aos="fade-right">
                <div class="col-12 text-center">
                    <a href="<?php the_field('more_testimonials_link', 58); ?>"
                       class="more-testimonials"><?php _e('More Testimonials', 'custom'); ?></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<section class="recipes" data-aos="fade-up">
    <?php
    $wpb_all_recipes = new WP_Query(array('post_type' => 'recipes', 'post_status' => 'publish', 'posts_per_page' => 3));
    if ($wpb_all_recipes->have_posts()) : ?>
        <div class="mb-4">
            <div class="section-title section-title--big" data-aos="fade-right" data-aos-delay="300">
                <h2><?php _e('Recipes', 'custom'); ?></h2>
            </div>
        </div>
        <div class="container">
            <?php while ($wpb_all_recipes->have_posts()) : $wpb_all_recipes->the_post(); ?>
                <div class="row justify-content-center recipe-teaser" data-aos="fade-up" data-aos-delay="600">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="teaser-desc">
                                <h3><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>"
                                   class="more-link"><?php _e('Read More', 'custom'); ?></a>
                            </div>
                            <div class="teaser-thumbnail" data-js="recipe-teaser-thumbnail">
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="view-all-row text-right px-3 mt-2" data-aos="fade-right" data-aos-delay="300">
            <a href="/recipes" class="view-all"><?php _e('View All', 'custom'); ?></a>
        </div>
        <?php endif;
        wp_reset_query(); ?>
        <div class="socials-wrapper mt-3 ml-auto" data-aos="fade-right">
            <?php if (have_rows('socials', 'option')): ?>
                <div class="text-center">
                    <a href="#" class="follow"><?php _e('Follow Us', 'custom'); ?></a>
                    <ul class="socials-list">
                        <?php while (have_rows('socials', 'option')): the_row();
                            $facebook_url = get_sub_field('facebook_url', 'option');
                            $instagram_url = get_sub_field('instagram_url', 'option');
                            $youtube_url = get_sub_field('youtube_url', 'option');
                            $pinterest_url = get_sub_field('pinterest_url', 'option');
                            ?>
                            <li><a href="<?php echo $facebook_url; ?>" class="fb"></a></li>
                            <li><a href="<?php echo $instagram_url; ?>" class="inst"></a></li>
                            <li><a href="<?php echo $youtube_url; ?>" class="yt"></a></li>
                            <li><a href="<?php echo $pinterest_url; ?>" class="pt"></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
</section>
<section class="stay-connected">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">
                <h3>Stay Connected</h3>
                <p>
                    Subscribe to our newsletter to keep up to date on the latest new from hydra coco
                </p>
                <form class="es_shortcode_form" data-es_form_id="es_shortcode_form">
                    <div class="es_lablebox">
                        <label class="es_shortcode_form_email">Email *</label>
                    </div>
                    <div class="es_textbox d-inline-block" style="width: calc(100% - 51px);">
                        <input type="email" id="es_txt_email" class="es_textbox_class" name="es_txt_email" value=""
                               maxlength="60" placeholder="Your Email:" required="">
                    </div>
                    <div class="es_button d-inline-block">
                        <input type="submit" id="es_txt_button" class="es_textbox_button es_submit_button"
                               name="es_txt_button" value="">
                    </div>
                    <div class="es_msg" id="es_shortcode_msg">
                        <span id="es_msg"></span>
                    </div>
                    <input type="hidden" id="es_txt_group" name="es_txt_group" value="">
                    <input type="hidden" name="es-subscribe" id="es-subscribe" value="f7c794c76f">
                </form>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>  