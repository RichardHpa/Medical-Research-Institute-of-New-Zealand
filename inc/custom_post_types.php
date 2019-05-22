<?php

// function create_staff_tax() {
// 	register_taxonomy(
// 		'Staff-Group',
// 		array(
// 			'label' => 'Staff Group',
// 			'rewrite' => array( 'slug' => 'staff-group' ),
// 			'hierarchical' => true,
// 		)
// 	);
// }
// add_action( 'init', 'create_staff_tax' );

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
