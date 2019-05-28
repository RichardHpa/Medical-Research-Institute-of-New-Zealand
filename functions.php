<?php

function customThemeEnqueues(){
    wp_enqueue_style('bootstrapStyle', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.3.1', 'all');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css', array(), '4.7.0', 'all' );
    wp_enqueue_style('customStyle', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.2', 'all');

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrapScript', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('customScript', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.2', true);

    if(is_front_page()){
        wp_enqueue_script('recruitmentScript', get_template_directory_uri() . '/assets/js/recruitment-scroll.js', array(), '1.2.0', true);
    }
}
add_action('wp_enqueue_scripts', 'customThemeEnqueues');

function admin_my_enqueue(){
    wp_enqueue_style('adminStyle', get_template_directory_uri() . '/assets/css/admin.min.css', array(), '1.0.2', 'all');
    wp_enqueue_style('adminJqueryUIStyle', get_template_directory_uri() . '/assets/css/jquery-ui.min.css', array(), '1.12.1', 'all');
    wp_enqueue_script('adminJqueryUIScript', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array(), '1.12.1', true);
    wp_enqueue_script('my_custom_script', get_template_directory_uri() . '/assets/js/admin.js', array(), '1.0.2', true);

    $screen = get_current_screen();
    if($screen->post_type === 'post' && ($screen->action === 'add' || $_GET['action'] === 'edit') ){
        wp_enqueue_script('change_post_formats_script', get_template_directory_uri() . '/assets/js/change_post_formats.js', array('jquery'), '1.0.2', true);
        $format = get_post_format($_GET['post']);
        wp_localize_script('change_post_formats_script', 'formatObject', array(
            'format' => $format
        ));
    }



}
add_action('admin_enqueue_scripts', 'admin_my_enqueue');


function customThemeSupport(){
    add_theme_support('menus');
    register_nav_menu('Primary', 'This is the main navigation at the top of the page');
    register_nav_menu('Secondary', 'This is the menu for the footer section of the page');

    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('image', 'video', 'audio'));

    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'flex-width'  => true,
    ));
}
add_action('init', 'customThemeSupport');

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

require_once get_template_directory() . '/inc/social-icons.php';

require_once get_template_directory() . '/inc/customizer.php';

require_once get_template_directory() . '/inc/custom_fields.php';

require_once get_template_directory() . '/inc/custom_post_types.php';

require_once get_template_directory() . '/inc/custom_taxonomies.php';

require_once get_template_directory() . '/inc/disable_gutenberg.php';

add_image_size( 'about-thumb', 400, 400, TRUE );

function wp_editor_fontsize_filter($buttons){
    array_shift($buttons);
    array_unshift($buttons, 'fontsizeselect');
    array_unshift($buttons, 'formatselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wp_editor_fontsize_filter');


function restrict_post_deletion($post_id) {
    $protectedPages = array(20, 245, 237, 355, 243, 24, 43, 4, 22, 6, 473);
    $userid = get_current_user_id();
    if( $userid !== 1 ) {
        if( in_array($post_id , $protectedPages) ) {
            exit("Sorry you can't delete this page. The page you were trying to delete is protected. Contact Super Admin for more information.");
        }
    }
}
add_action('wp_trash_post', 'restrict_post_deletion', 10, 1);
add_action('before_delete_post', 'restrict_post_deletion', 10, 1);

/* Flush your rewrite rules */
function bt_flush_rewrite_rules() {
     flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bt_flush_rewrite_rules' );

/*
	==========================================
	Pagination
	==========================================
*/
function pagination($pages = '', $range = 4){
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        echo "</div>\n";
    }
}
