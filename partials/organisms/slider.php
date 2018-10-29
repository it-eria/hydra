<section class="main-slider-section" data-aos="fade-up" data-aos-delay="300">
    <?php if (have_rows('slider')): ?>
        <div class="main-slider" data-js="main-slider">
            <?php while (have_rows('slider')): the_row();
                $slide_image = get_sub_field('slide_image');
                $slide_url = get_sub_field('slide_url');
                $flavor_for_url = get_sub_field('flavor_for_url');
                if (!empty($flavor_for_url)) {
                    $flavor = '?flavor=' . $flavor_for_url->slug;
                } else {
                    $flavor = '';
                }
                ?>
                <div class="main-slider__slide">
                    <?php if ($slide_image): ?><img src="<?php echo $slide_image; ?>" alt="slide"><?php endif; ?>
                    <?php if ($slide_url): ?><a href="<?php echo $slide_url;
                    echo $flavor; ?>" class="learn-more "><?php _e('Learn More', 'custom'); ?></a><?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>