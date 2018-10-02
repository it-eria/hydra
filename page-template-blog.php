<?php /* Template Name: Blog Page */ ?>
<?php get_header(); ?>
<section class="banner">
    <img src="<?php the_field('blog_main_bg', 'option'); ?>" alt="banner" class="img-fluid">
</section>
<section class="articles-list py-5">
    <?php
    $wpb_query_blog = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => -1)); ?>
    <?php if ($wpb_query_blog->have_posts()) : ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php while ($wpb_query_blog->have_posts()) : $wpb_query_blog->the_post(); ?>
                        <article class="article-small" data-aos="fade-up" data-aos-offset="10">
                            <div class="title text-center mb-2">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="thumbnail">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="thumbnail"
                                     class="img-fluid">
                            </a>
                            <div class="text-center mt-1">
                                <p><?php the_excerpt(); ?></p>
                            </div>
                            <div class="row mt-3 align-items-end">
                                <div class="col-7">
<!--                                    <div class="share-wrapper mt-1">-->
<!--                                        <h6>--><?php //_e('Share:', 'custom'); ?><!--</h6>-->
<!--                                        <ul class="socials-list">-->
<!--                                            <li><a href="#" class="fb"></a></li>-->
<!--                                            <li><a href="#" class="inst"></a></li>-->
<!--                                            <li><a href="#" class="pt"></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
                                </div>
                                <div class="col-5 text-right">
                                    <a href="<?php the_permalink(); ?>"
                                       class="read-more"><?php _e('read more', 'custom'); ?></a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif;
    wp_reset_query(); ?>
</section>
<?php get_footer(); ?>
