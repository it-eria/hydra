<?php get_header(); ?>
<?php get_template_part("partials/organisms/banner"); ?>
<section class="articles-list py-5">
    <?php if ( have_posts() ) : ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part("partials/molecules/article"); ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>