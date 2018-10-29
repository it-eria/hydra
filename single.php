<?php get_header(); ?>
    <section class="article-single pb-5">
        <?php if (have_posts()) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php while (have_posts()) : the_post(); ?>
                            <article class="article">
                                <div class="text-center mb-3">
                                    <h2><?php the_title(); ?></h2>
                                </div>
                                <div class="article-main-image mb-3">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>" alt="main image"
                                         class="img-fluid">
                                </div>
                                <div class="article-content clearfix">
                                    <?php the_content(); ?>
                                </div>
                                <?php get_template_part("partials/molecules/share"); ?>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>