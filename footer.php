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
                        wp_nav_menu( array(
                            'theme_location'  => 'primary',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => '',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul>%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => '',
                        ) );
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
                    <a href="<?php echo get_site_url(); ?>"><img src="<?php the_field('footer_logotype', 'option'); ?>"
                         alt="logo" class="img-fluid"></a>
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
                    wp_nav_menu( array(
                        'theme_location'  => 'footer_menu',
                        'menu'            => '',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => '',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul class="service-nav">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => '',
                    ) );
                    ?>
                </div>
            </div>
        </div>
    </section>
</footer>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/js/script.js?ver=1.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/js/vendors/slick.min.js?ver=1.0"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/js/vendors/aos.js?ver=1.0"></script>
<script>
    (function ($) {
        $(".choose-elem a").on('click', function (e) {
            var $img = $(this);
            var $url = $(this);
            $('#product-img').attr("src", $img.data('product-img'));
            $('#product-url').attr("href", $url.data('product-url'));
        });
    })(jQuery);
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bae0dde4086b7ab"></script>
<?php wp_footer(); ?>
</body>
</html>