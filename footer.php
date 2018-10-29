<footer class="footer">
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="footer__title-nav">
                        <h4><?php _e('Navigation', 'custom'); ?></h4>
                    </div>
                    <nav class="footer__nav">
                        <?php
                        $defaults = array('theme_location' => 'primary', 'menu' => '', 'container' => '', 'items_wrap' => '<ul>%3$s</ul>');
                        wp_nav_menu($defaults);
                        ?>
                    </nav>
                </div>
            </div>
        </div> 
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11">
                    <?php
                    $footer_logo = get_field('logos','options');
                    if($footer_logo):
                    ?>
                    <a href="<?php echo get_site_url(); ?>">
                        <img src="<?php echo $footer_logo['footer_logotype']['url']; ?>" alt="<?php echo $footer_logo['footer_logotype']['alt']; ?>" class="img-fluid" />
                    </a>
                    <?php endif; ?>
                    <div class="mt-4">
                        <span class="copyright">
                          <?php the_field('copyright', 'option'); ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-11">
                    <?php
                    $defaults = array('theme_location' => 'footer_menu', 'menu' => '', 'container' => '', 'items_wrap' => '<ul class="service-nav">%3$s</ul>');
                    wp_nav_menu($defaults);
                    ?>
                </div>
            </div>
        </div>
    </section>
</footer>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/js/script.js?ver=1.0"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/js/filter.js?ver=1.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/js/vendors/slick.min.js?ver=1.0"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/js/vendors/aos.js?ver=1.0"></script>
<script>
    (function ($) {
        $(".choose-elem a").on('click', function (e) {
            var $content = $(this);
            var $nutritionContent = $(this).find('.data-product-content-nutrition').html();
            $('#product-img').attr("src", $(this).data('product-img'));
            $('#product-url').attr("href", $(this).data('product-url'));
            $('#product-photo-nutrition').attr("src", $(this).data('product-photo-nutrition'));
            $('#product-content-nutrition').html($nutritionContent);
        });
    })(jQuery);
</script>
<?php wp_footer(); ?>
</body>
</html>