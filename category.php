<?php get_header(); ?>
<section class="article-single pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <article class="article">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="text-center mb-3">
                                <h2><?php the_title(); ?></h2>
                            </div>
                            <div class="article-content clearfix">
                                <?php the_content(); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </article>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
