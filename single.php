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
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="main image"
                                         class="img-fluid">
                                </div>
                                <div class="article-content clearfix">
                                    <?php the_content(); ?>
                                </div>

                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/social-likes/dist/social-likes_flat.css">
                                <script src="https://cdn.jsdelivr.net/npm/social-likes/dist/social-likes.min.js"></script>
                                <div class="social-box">
                                    <div class="social-likes social-likes_single" data-single-title="Share">
                                        <div class="facebook" title="Share link on Facebook">Facebook</div>
                                        <div class="twitter" title="Share link on Twitter">Twitter</div>
                                        <div class="plusone" title="Share link on Google+">Google+</div>
                                    </div>
                                </div>
<!--                                <div class="share-wrapper mt-5">-->
<!--                                    <h6>Share this article:</h6>-->
<!--                                    <ul class="socials-list">-->
<!--                                        <li><a href="#" class="fb"></a></li>-->
<!--                                        <li><a href="#" class="inst"></a></li>-->
<!--                                        <li><a href="#" class="pt"></a></li>-->
<!--                                    </ul>-->
<!--                                    <div class="addthis_inline_share_toolbox_r93x"></div>-->
<!--                                </div>-->
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>