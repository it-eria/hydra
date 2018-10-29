<section class="about-us pt-3 pb-5">
    <div class="container">
        <?php if (have_rows('content_about_repeater')): ?>
            <?php while (have_rows('content_about_repeater')): the_row();
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $colorpicker = get_sub_field('colorpicker');
                ?>
            <div class="row mb-5 pt-4 pb-4" style="background-color: <?php echo $colorpicker; ?>">
                <?php if ($title): ?>
                    <div class="col-12 mb-4 text-center">
                        <h2><?php echo $title; ?></h2>
                    </div>
                <?php endif;
                if ($content): ?>
                    <div class="col-12">
                        <?php echo $content; ?>
                    </div>
                    </div>
                <?php endif;
            endwhile;
        endif; ?>
    </div>
</section>