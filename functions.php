<?php

function customThemeEnqueues(){
    wp_enqueue_style('bootstrapStyle', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.3.1', 'all');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css', array(), '4.7.0', 'all' );
    wp_enqueue_style('customStyle', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.2', 'all');

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrapScript', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('customScript', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.2', true);
}
add_action('wp_enqueue_scripts', 'customThemeEnqueues');

function admin_my_enqueue(){
    wp_enqueue_style('adminStyle', get_template_directory_uri() . '/assets/css/admin.css', array(), '1.0.2', 'all');
    wp_enqueue_style('adminJqueryUIStyle', get_template_directory_uri() . '/assets/css/jquery-ui.min.css', array(), '1.12.1', 'all');
    wp_enqueue_script('adminJqueryUIScript', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array(), '1.12.1', true);
    wp_enqueue_script('my_custom_script', get_template_directory_uri() . '/assets/js/admin.js', array(), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'admin_my_enqueue');


add_theme_support( 'wp-block-styles' );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'flex-width'  => true,
));

function customThemeSupport(){
    add_theme_support('menus');
    register_nav_menu('Primary', 'This is the main navigation at the top of the page');
    register_nav_menu('Secondary', 'This is the menu for the footer section of the page');
}
add_action('init', 'customThemeSupport');




require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

add_image_size( 'about-thumb', 400, 400, TRUE );
