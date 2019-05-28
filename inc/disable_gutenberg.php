<?php
/**
 * Templates and Page IDs without editor
 *
 */
function ea_disable_editor( $id = false ) {

	$excluded_templates = array(
		'page-alumni.php',
		'page-about.php',
        'page-employment.php',
        'page-map.php',
        'page-parent.php',
        'page-publications.php',
        'page-recruiting.php',
        'page-reserach.php',
        'page-staff.php'
	);

	$excluded_ids = array(
		get_option( 'page_on_front' )
	);

	if( empty( $id ) )
		return false;

	$id = intval( $id );
	$template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

/**
 * Disable Gutenberg by template
 *
 */
function ea_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
		return $can_edit;

	if( ea_disable_editor( $_GET['post'] ) ){
        if($_GET['post'] === get_option('page_on_front')){
            add_action( 'edit_form_after_title', 'add_warning_notice_front' );
        } else {
            add_action( 'edit_form_after_title', 'add_warning_notice' );
        }


        $can_edit = false;


    }


	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );

// /**
//  * Disable Classic Editor by template
//  *
//  */
// function ea_disable_classic_editor() {
//
// 	$screen = get_current_screen();
// 	if( 'page' !== $screen->id || ! isset( $_GET['post']) )
// 		return;
//
// 	if( ea_disable_editor( $_GET['post'] ) ) {
// 		remove_post_type_support( 'page', 'editor' );
// 	}
//
// }
// add_action( 'admin_head', 'ea_disable_classic_editor' );
function add_warning_notice(){
    echo '<div class="notice notice-warning inline">
            <p>' . __( 'This page uses a custom template, which means the new Gutenberg editor has been removed and the old editor has been added back in. This is because this template utlizes a custom design or functionality like viewing custom post types (ie, staff).' ) . '</p>
            <p>' . __( 'If you would like to use Gutenberg on this page, either change the template or ask the website designer to remove this page from the excluded page list' ) . '</p>
        </div>';
}

function add_warning_notice_front(){
    echo '<div class="notice notice-warning inline">
            <p>' . __( 'You are currently editing the page that you have set as your Home Page.' ) . '</p>
            <p>' . __( 'Because the front page utlizes a custom layout, the Gutenberg editor has been removed' ) . '</p>
        </div>';
}
