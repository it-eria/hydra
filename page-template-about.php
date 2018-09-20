<?php /* Template Name: About Page */ ?>
<?php get_header(); ?>
    <section class="main-slider-section" data-aos="fade-up" data-aos-delay="300">
        <?php if (have_rows('slider')): ?>
            <div class="main-slider" data-js="main-slider">
                <?php while (have_rows('slider')): the_row();
                    $slide_image = get_sub_field('slide_image');
                    $slide_url = get_sub_field('slide_url');
                    ?>
                    <div class="main-slider__slide">
                        <?php if ($slide_image): ?><img src="<?php echo $slide_image; ?>" alt="slide"><?php endif; ?>
                        <?php if ($slide_url): ?><a href="<?php echo $slide_url; ?>"
                                                    class="learn-more "><?php _e('Learn More', 'custom'); ?></a><?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>
    <section class="about-us pt-3 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 text-center">
                    <h2><?php the_field('title_for'); ?></h2>
                </div>
                <div class="col-12">
                    <?php the_field('description_for'); ?>
                </div>
            </div>

            <?php if (have_rows('contact_us_emails', 'option')): ?>
                <div class="row mt-5 justify-content-center">
                    <div class="col-12 text-center">
                        <h2><?php _e('Contact us'); ?></h2>
                    </div>
                    <div class="col-12">
                        <ul class="inf-list">
                            <?php while (have_rows('contact_us_emails', 'option')): the_row();
                                $text_before = get_sub_field('text_before', 'option');
                                $email_contact = get_sub_field('email_contact', 'option');
                                if ($email_contact): ?>
                                    <li>
                                        <?php if ($text_before): ?>
                                            <div class="footer__title">
                                                <h4><?php echo $text_before; ?></h4>
                                            </div>
                                        <?php endif; ?>
                                        <a href="mailto:<?php echo $email_contact; ?>"><?php echo $email_contact; ?></a>
                                    </li>
                                <?php endif;
                            endwhile; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row mt-5">
                <div class="col-12 mb-4 text-center">
                    <h2><?php the_field('title_why'); ?></h2>
                </div>
                <div class="col-12">
                    <?php the_field('description_why'); ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>