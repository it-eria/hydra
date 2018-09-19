<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/css/slick.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/css/aos.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/css/style.css">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<header class="header" data-js="header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-6">
                <a href="#" class="logo" data-js="logo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/img/logo-white.png" alt="logo unactive" class="logo__visible">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/html_template/build/img/logo-gradient.png" alt="logo active">
                </a>
            </div>
            <!-- Burger button -->
            <div class="col-6 text-right">
                <a href="#" class="btn btn--burger" data-js="btn--burger">
                    <span></span>
                </a>
            </div>
            <!-- Navigaton -->
            <div class="col-12">
                <nav class="main-nav" data-js="main-nav">
                    <?php
                    wp_nav_menu( array(
                        'theme_location'  => '',
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
</header>


