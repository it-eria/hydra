<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/jpeg" href="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/img/favicon.jpg" />
    <link rel="stylesheet"
          href="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/css/slick.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/css/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/css/style.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/css/custom.css">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body style="background-color:  !important" class="<?php if(!is_front_page()) {echo 'inner-page';}?>">
<header class="header" style="background-color: <?php the_field('header_menu_color_picker'); ?> !important" data-js="header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6">
                <?php
                $logo = get_field('logos','options');
                if($logo):
                ?>
                <a href="<?php echo get_site_url(); ?>" class="logo" data-js="logo">
                    <img src="<?php echo $logo['logotype_unactive']['url']; ?>" alt="<?php echo $logo['logotype_unactive']['alt']; ?>" class="logo__visible">
                    <img src="<?php echo $logo['logotype_active']['url']; ?>" alt="<?php echo $logo['logotype_active']['alt']; ?>">
                </a>
                <?php endif; ?>
            </div>
            <div class="col-6 text-right">
                <a href="#" class="btn btn--burger" data-js="btn--burger">
                    <span></span>
                </a>
            </div>
            <div class="col-12">
                <nav class="main-nav" data-js="main-nav">
                    <?php
                    $defaults = array('theme_location' => 'primary', 'menu' => '', 'container' => '', 'items_wrap' => '<ul>%3$s</ul>');
                    wp_nav_menu($defaults);
                    ?>
                </nav>
            </div>
        </div>
    </div>
</header>