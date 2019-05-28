<?php

function create_staff_tax() {
	register_taxonomy(
		'Staff-Group',
		array(
			'label' => 'Staff Group',
			'rewrite' => array( 'slug' => 'staff-group' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'create_staff_tax' );

function staff_init() {
    $labels = array(
        'name'               => _x( 'Staff', 'post type general name', 'mrinz' ),
        'singular_name'      => _x( 'Staff', 'post type singular name', 'mrinz' ),
        'menu_name'          => _x( 'Staff', 'admin menu', 'mrinz' ),
        'name_admin_bar'     => _x( 'Staff', 'add new on admin bar', 'mrinz' ),
        'add_new'            => _x( 'Add Staff Member', 'staff', 'mrinz' ),
        'add_new_item'       => __( 'Add New Staff Member', 'mrinz' ),
        'new_item'           => __( 'New Staff Member', 'mrinz' ),
        'edit_item'          => __( 'Edit Staff Member', 'mrinz' ),
        'view_item'          => __( 'View Staff Member', 'mrinz' ),
        'all_items'          => __( 'All Staff Members', 'mrinz' ),
        'search_items'       => __( 'Search Staff', 'mrinz' ),
        'parent_item_colon'  => __( 'Parent Staff:', 'mrinz' ),
        'not_found'          => __( 'No Staff Members found.', 'mrinz' ),
        'not_found_in_trash' => __( 'No Staff Members found in Trash.', 'mrinz' )
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'query_var' => true,
        'menu_icon' => 'dashicons-groups',
        'taxonomies'=> array(
            'Staff-Group'
        ),
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        )
    );
    register_post_type( 'staff', $args );
}
add_action( 'init', 'staff_init' );

function add_custom_taxonomies() {

}
add_action( 'init', 'add_custom_taxonomies', 0 );

function wpb_change_title_text( $title ){
    $screen = get_current_screen();

    if( 'staff' == $screen->post_type ) {
        $title = 'Enter the Staff Members Full Name';
    }
    return $title;
}
add_filter( 'enter_title_here', 'wpb_change_title_text' );


/*
	==========================================
	creates Alumni post type
	==========================================
*/
function alumni_init() {
    $labels = array(
        'name'               => _x( 'Alumni', 'post type general name', 'MedicalResearchInstituteOfNewZealand' ),
        'singular_name'      => _x( 'Alumni', 'post type singular name', 'MedicalResearchInstituteOfNewZealand' ),
        'menu_name'          => _x( 'Alumni', 'admin menu', 'MedicalResearchInstituteOfNewZealand' ),
        'name_admin_bar'     => _x( 'Alumni', 'add new on admin bar', 'MedicalResearchInstituteOfNewZealand' ),
        'add_new'            => _x( 'Add New Alumni', 'test', 'MedicalResearchInstituteOfNewZealand' ),
        'add_new_item'       => __( 'Add New Alumni', 'MedicalResearchInstituteOfNewZealand' ),
        'new_item'           => __( 'New Alumni', 'MedicalResearchInstituteOfNewZealand' ),
        'edit_item'          => __( 'Edit Alumni', 'MedicalResearchInstituteOfNewZealand' ),
        'view_item'          => __( 'View Alumni', 'MedicalResearchInstituteOfNewZealand' ),
        'all_items'          => __( 'All Alumni', 'MedicalResearchInstituteOfNewZealand' ),
        'search_items'       => __( 'Search Alumni', 'MedicalResearchInstituteOfNewZealand' ),
        'parent_item_colon'  => __( 'Parent Alumni:', 'MedicalResearchInstituteOfNewZealand' ),
        'not_found'          => __( 'No Alumni found.', 'MedicalResearchInstituteOfNewZealand' ),
        'not_found_in_trash' => __( 'No Alumni found in Trash.', 'MedicalResearchInstituteOfNewZealand' )
    );
    $args = array(
      'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'query_var' => true,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',),
        );
    register_post_type( 'alumni', $args );
}
add_action( 'init', 'alumni_init' );


/*
	==========================================
	creates Employment post type
	==========================================
*/
function employment_init() {
    $labels = array(
        'name'               => _x( 'Employment', 'post type general name', 'MedicalResearchInstituteOfNewZealand' ),
        'singular_name'      => _x( 'Employment', 'post type singular name', 'MedicalResearchInstituteOfNewZealand' ),
        'menu_name'          => _x( 'Employment', 'admin menu', 'MedicalResearchInstituteOfNewZealand' ),
        'name_admin_bar'     => _x( 'Employment', 'add new on admin bar', 'MedicalResearchInstituteOfNewZealand' ),
        'add_new'            => _x( 'Add New Job Vacancy', 'programme', 'MedicalResearchInstituteOfNewZealand' ),
        'add_new_item'       => __( 'Add New Job Vacancy', 'MedicalResearchInstituteOfNewZealand' ),
        'new_item'           => __( 'New Vacancy', 'MedicalResearchInstituteOfNewZealand' ),
        'edit_item'          => __( 'Edit Vacancy', 'MedicalResearchInstituteOfNewZealand' ),
        'view_item'          => __( 'View Vacancy', 'MedicalResearchInstituteOfNewZealand' ),
        'all_items'          => __( 'All Vacancy', 'MedicalResearchInstituteOfNewZealand' ),
        'search_items'       => __( 'Search Vacancies', 'MedicalResearchInstituteOfNewZealand' ),
        'parent_item_colon'  => __( 'Parent Vacancies:', 'MedicalResearchInstituteOfNewZealand' ),
        'not_found'          => __( 'No Vacancies found.', 'MedicalResearchInstituteOfNewZealand' ),
        'not_found_in_trash' => __( 'No Vacancies found in Trash.', 'MedicalResearchInstituteOfNewZealand' )
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'query_var' => true,
        'menu_icon' => 'dashicons-nametag',
        'supports' => array(
            'title',
            'editor',
            'excerpt',),
        );
    register_post_type( 'employment', $args );
}
add_action( 'init', 'employment_init' );

/*
	==========================================
	creates recruitment post type
	==========================================
*/
function recruiting_init() {
    $labels = array(
        'name'               => _x( 'Recruiting', 'post type general name', 'MedicalResearchInstituteOfNewZealand' ),
        'singular_name'      => _x( 'Recruiting', 'post type singular name', 'MedicalResearchInstituteOfNewZealand' ),
        'menu_name'          => _x( 'Recruiting', 'admin menu', 'MedicalResearchInstituteOfNewZealand' ),
        'name_admin_bar'     => _x( 'Publication', 'add new on admin bar', 'MedicalResearchInstituteOfNewZealand' ),
        'add_new'            => _x( 'Add New Test', 'test', 'MedicalResearchInstituteOfNewZealand' ),
        'add_new_item'       => __( 'Add New Test', 'MedicalResearchInstituteOfNewZealand' ),
        'new_item'           => __( 'New Test', 'MedicalResearchInstituteOfNewZealand' ),
        'edit_item'          => __( 'Edit Test', 'MedicalResearchInstituteOfNewZealand' ),
        'view_item'          => __( 'View Test', 'MedicalResearchInstituteOfNewZealand' ),
        'all_items'          => __( 'All Tests', 'MedicalResearchInstituteOfNewZealand' ),
        'search_items'       => __( 'Search Tests', 'MedicalResearchInstituteOfNewZealand' ),
        'parent_item_colon'  => __( 'Parent Test:', 'MedicalResearchInstituteOfNewZealand' ),
        'not_found'          => __( 'No Tests found.', 'MedicalResearchInstituteOfNewZealand' ),
        'not_found_in_trash' => __( 'No Tests found in Trash.', 'MedicalResearchInstituteOfNewZealand' )
    );
    $args = array(
      'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'query_var' => true,
        'menu_icon' => 'dashicons-search',
        'supports' => array(
            'title',
            'editor',
            'thumbnail'),
        );
    register_post_type( 'recruiting', $args );
}
add_action( 'init', 'recruiting_init' );

/*
	==========================================
	creates publications post type
	==========================================
*/
function publications_init() {
    $labels = array(
        'name'               => _x( 'Publications', 'post type general name', 'MedicalResearchInstituteOfNewZealand' ),
        'singular_name'      => _x( 'Publication', 'post type singular name', 'MedicalResearchInstituteOfNewZealand' ),
        'menu_name'          => _x( 'Publications', 'admin menu', 'MedicalResearchInstituteOfNewZealand' ),
        'name_admin_bar'     => _x( 'Publication', 'add new on admin bar', 'MedicalResearchInstituteOfNewZealand' ),
        'add_new'            => _x( 'Add New Publication', 'publication', 'MedicalResearchInstituteOfNewZealand' ),
        'add_new_item'       => __( 'Add New Publication', 'MedicalResearchInstituteOfNewZealand' ),
        'new_item'           => __( 'New Pubications', 'MedicalResearchInstituteOfNewZealand' ),
        'edit_item'          => __( 'Edit Publication', 'MedicalResearchInstituteOfNewZealand' ),
        'view_item'          => __( 'View Publication', 'MedicalResearchInstituteOfNewZealand' ),
        'all_items'          => __( 'All Publications', 'MedicalResearchInstituteOfNewZealand' ),
        'search_items'       => __( 'Search Publications', 'MedicalResearchInstituteOfNewZealand' ),
        'parent_item_colon'  => __( 'Parent Publications:', 'MedicalResearchInstituteOfNewZealand' ),
        'not_found'          => __( 'No Publications found.', 'MedicalResearchInstituteOfNewZealand' ),
        'not_found_in_trash' => __( 'No Publications found in Trash.', 'MedicalResearchInstituteOfNewZealand' )
    );
    $args = array(
      'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'query_var' => true,
        'menu_icon' => 'dashicons-book',
        'supports' => array(
            'title',),
        );
    register_post_type( 'publications', $args );
}
add_action( 'init', 'publications_init' );
/*
	==========================================
	creates programmes post type
	==========================================
*/
function programmes_init() {
    $labels = array(
        'name'               => _x( 'Programmes', 'post type general name', 'MedicalResearchInstituteOfNewZealand' ),
        'singular_name'      => _x( 'Programme', 'post type singular name', 'MedicalResearchInstituteOfNewZealand' ),
        'menu_name'          => _x( 'Programmes', 'admin menu', 'MedicalResearchInstituteOfNewZealand' ),
        'name_admin_bar'     => _x( 'Programme', 'add new on admin bar', 'MedicalResearchInstituteOfNewZealand' ),
        'add_new'            => _x( 'Add New Programme', 'programme', 'MedicalResearchInstituteOfNewZealand' ),
        'add_new_item'       => __( 'Add New Programme', 'MedicalResearchInstituteOfNewZealand' ),
        'new_item'           => __( 'New Programme', 'MedicalResearchInstituteOfNewZealand' ),
        'edit_item'          => __( 'Edit Programme', 'MedicalResearchInstituteOfNewZealand' ),
        'view_item'          => __( 'View Programme', 'MedicalResearchInstituteOfNewZealand' ),
        'all_items'          => __( 'All Programmes', 'MedicalResearchInstituteOfNewZealand' ),
        'search_items'       => __( 'Search Programmes', 'MedicalResearchInstituteOfNewZealand' ),
        'parent_item_colon'  => __( 'Parent Programmes:', 'MedicalResearchInstituteOfNewZealand' ),
        'not_found'          => __( 'No Programme found.', 'MedicalResearchInstituteOfNewZealand' ),
        'not_found_in_trash' => __( 'No Programme found in Trash.', 'MedicalResearchInstituteOfNewZealand' )
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'query_var' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',),
        );
    register_post_type( 'programmes', $args );
}
add_action( 'init', 'programmes_init' );





/*
	==========================================
	Deletes Comments Sections
	==========================================
*/
function removeCommentsAdmin() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'removeCommentsAdmin' );
// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if(post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
    return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url()); exit;
    }
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'df_disable_comments_admin_bar');
