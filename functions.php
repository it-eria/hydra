<?php
register_nav_menus(array(
    'primary' => __('Primary Menu', 'custom')
));

register_nav_menus(array(
    'footer_menu' => __('Footer Menu', 'custom')
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

function excerpt( $limit ) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}
function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/[.+]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}


function filter_plugin_updates( $update ) {
    global $DISABLE_UPDATE;
    if( !is_array($DISABLE_UPDATE) || count($DISABLE_UPDATE) == 0 ){  return $update;  }
    foreach( $update->response as $name => $val ){
        foreach( $DISABLE_UPDATE as $plugin ){
            if( stripos($name,$plugin) !== false ){
                unset( $update->response[ $name ] );
            }
        }
    }
    return $update;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

add_filter( 'tiny_mce_before_init', function( $settings ){

    $settings['block_formats'] = 'Paragraph=p;Heading=h2;Subheading=h3';

    return $settings;

});