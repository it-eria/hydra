<?php
register_nav_menus(array(
    'primary' => __('Primary Menu', 'custom')
));

function custom_widgets_init()
{
    register_sidebar(array(
        'name' => __('Widget Area', 'custom'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'custom'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'custom_widgets_init');
add_theme_support('post-thumbnails');
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'current ';
    }
    return $classes;
}

add_filter('wpcf7_autop_or_not', '__return_false');

function post_remove()
{
    remove_menu_page('edit.php');
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page();

}