<?php
/*
	==========================================
    Adding Custom Taxonomy to staff Page for Groups
	==========================================
*/
function add_custom_staff_taxonomy() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('group', 'staff', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Group', 'taxonomy general name' ),
      'singular_name' => _x( 'Group', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Group' ),
      'all_items' => __( 'All Groups' ),
      'parent_item' => __( 'Parent Group' ),
      'parent_item_colon' => __( 'Parent Group:' ),
      'edit_item' => __( 'Edit Group' ),
      'update_item' => __( 'Update Group' ),
      'add_new_item' => __( 'Add New Group' ),
      'new_item_name' => __( 'New Group Name' ),
      'menu_name' => __( 'Group' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'locations', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => false // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_custom_staff_taxonomy' );

function group_custom_meta_field() {
    ?>
        <div class="form-field">
            <label for="term_meta[order_term_meta]"><?php _e('Order') ?></label>
            <input name="term_meta[order_term_meta]" id="term_meta[order_term_meta]" type="number" value="" size="40" aria-required="true" />
            <p class="description"><?php _e('Determines the order in which the term is displayed. Higher the number, higher it is in the list.'); ?></p>
        </div>
    <?php
}
add_action( 'group_add_form_fields', 'group_custom_meta_field', 10, 2 );

function mj_taxonomy_edit_custom_meta_field($term) {

        $t_id = $term->term_id;
        $term_meta = get_option( "taxonomy_$t_id" );
       ?>
        <tr class="form-field">
        <th scope="row" valign="top"><label for="term_meta[order_term_meta]"><?php _e('Order') ?></label></th>
            <td>
                <input type="number" name="term_meta[order_term_meta]" id="term_meta[order_term_meta]" value="<?php echo esc_attr( $term_meta['order_term_meta'] ) ? esc_attr( $term_meta['order_term_meta'] ) : ''; ?>">
                <p class="description"><?php _e('Determines the order in which the term is displayed. Higher the number, higher it is in the list.'); ?></p>
            </td>
        </tr>
    <?php
    }

add_action( 'group_edit_form_fields','mj_taxonomy_edit_custom_meta_field', 10, 2 );

function mj_save_taxonomy_custom_meta_field( $term_id ) {
        if ( isset( $_POST['term_meta'] ) ) {

            $t_id = $term_id;
            $term_meta = get_option( "taxonomy_$t_id" );
            $cat_keys = array_keys( $_POST['term_meta'] );
            foreach ( $cat_keys as $key ) {
                if ( isset ( $_POST['term_meta'][$key] ) ) {
                    $term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            // Save the option array.
            update_option( "taxonomy_$t_id", $term_meta );
        }

    }
add_action( 'edited_group', 'mj_save_taxonomy_custom_meta_field', 10, 2 );
add_action( 'create_group', 'mj_save_taxonomy_custom_meta_field', 10, 2 );
