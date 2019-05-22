<?php

$metaboxes = array(
    'audio_link' => array(
        'title' => __('Audio Information', 'MedicalResearchInstituteOfNewZealand'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-audio',
        'priority' => 'low',
        'fields' => array(
            'a_link' => array(
                'title' => __('Link: ', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'text',
                'description' => 'Incert the src url for the audio, will be found in the embed section',
                'size' => 100
            )
        )
    ),
    'video_link' => array(
        'title' => __('Video Information', 'MedicalResearchInstituteOfNewZealand'),
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-video',
        'priority' => 'low',
        'fields' => array(
            'a_link' => array(
                'title' => __('Embed URL Link: ', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'text',
                'description' => 'Insert the embed src url for the video, will be found in the embed section',
                'size' => 100
            )
        )
    ),
    'recruitment_title' => array(
        'title' => __('Registration Information', 'MedicalResearchInstituteOfNewZealand'),
        'applicableto' => 'recruiting',
        'location' => 'normal',
        'priority' => 'low',
        'fields' => array(
            'front-page' => array(
                'title' => __('Show on Front Page', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'checkbox',
                'values' => ['Yes'],
                'size' => 100
            ),
            'study_title' => array(
                'title' => __('Study title: ', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'text',
                'size' => 100
            ),
            'resgistration' => array(
                'title' => __('Registration: ', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'text',
                'size' => 100
            ),
            'ethics' => array(
                'title' => __('Ethics: ', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'text',
                'size' => 100
            ),
            'medsafe' => array(
                'title' => __('Medsafe: ', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'text',
                'size' => 100
            ),
            'take_part' => array(
                'title' => __('To take part in this study you must: ', 'MedicalResearchInstituteOfNewZealand'),
                'label' => __('takePart', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'list',
                'size' => 100
            ),
            'not_able' => array(
                'title' => __('You will will not be able to take part in the study if: ', 'MedicalResearchInstituteOfNewZealand'),
                'label' => __('notAble', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'list',
                'size' => 100
            )
        )
    ),
    'publications' => array(
        'title' => __('Publications Information', 'MedicalResearchInstituteOfNewZealand'),
        'applicableto' => 'publications',
        'location' => 'normal',
        'priority' => 'low',
        'fields' => array(
            'publication_link' => array(
                'title' => __('Link to Publication: ', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'text',
                'size' => 100
            ),
            'publication_authors' => array(
                'title' => __('Authors: ', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'text',
                'size' => 100
            ),
        )
    ),
    'staff' => array(
        'title' => __('Staff Information', 'MedicalResearchInstituteOfNewZealand'),
        'applicableto' => 'staff',
        'location' => 'normal',
        'priority' => 'low',
        'fields' => array(
            'firstname' => array(
                'title' => __('First Name: ', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'text',
                'size' => 100
            ),
            'lastname' => array(
                'title' => __('Last Name:: ', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'text',
                'size' => 100
            ),
            'role' => array(
                'title' => __('Role: ', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'text',
                'size' => 100
            )
        )
    ),
    'programmes' => array(
        'title' => __('Programme Information', 'MedicalResearchInstituteOfNewZealand'),
        'applicableto' => 'programmes',
        'location' => 'normal',
        'priority' => 'low',
        'fields' => array(
            'director' => array(
                'title' => __('Programme Director: ', 'MedicalResearchInstituteOfNewZealand'),
                'type' => 'select-staff',
                'size' => 100
            )
        )
    )
);

//
function add_post_format_metabox() {
    global $metaboxes;

    if ( ! empty( $metaboxes ) ) {
        foreach ( $metaboxes as $id => $metabox ) {
            add_meta_box( $id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
        }
    }
}
add_action( 'admin_init', 'add_post_format_metabox' );

function show_metaboxes( $post, $args ) {
    global $metaboxes;

    $custom = get_post_custom( $post->ID );
    $fields = $tabs = $metaboxes[$args['id']]['fields'];

    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

    if ( sizeof( $fields ) ) {
        foreach ( $fields as $id => $field ) {
            switch ( $field['type'] ) {
                default:
                case "text":
                    $output .= '<label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" />';
                    break;
                case "date":
                    $output .= '<label for="' . $id . '">' . $field['title'] . '</label><br><input class="datepick" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" /><br>';
                    break;
                case "radio":
                    $value = get_post_meta( $post->ID, 'group', true );
                    $output .= '<label for="' . $id . '">' . $field['title'] . '</label><br>';
                    foreach($field['values'] as $singleValue){
                        $output .= '<div class="radio"><label><input type="radio" id="' . $id . '" name="'.$id.'" value="'.$singleValue.'"';
                        if($value == $singleValue){
                            $output .= 'checked';
                        }
                        $output .= '> '.$singleValue.'</label></div>';
                    }
                    break;
                case 'checkbox':
                    $trimString = str_replace(" ","",$field['title']);
                    $value = get_post_meta( $post->ID, 'front-page', true );

                    if($value == 'yes'){
                        $checked = 'checked="checked"';
                    } else {
                        $checked = null;
                    }
                    $output .= '<div id="'.$id.'" class="radio"><label><input type="checkbox" '.$checked.' name="'.$id.'"value="yes"/>'.$field['title'].'</label></div>';
                    break;
                case 'select-staff':
                    $meta =  maybe_unserialize( get_post_meta( $post->ID, 'director', true ) );
                    $output .= '<label for="' . $id . '">' . $field['title'] . '</label><br>';
                    $args = wp_parse_args( $query_args, array(
                        'post_type'   => 'staff',
                        'numberposts' => -1,
                    ));
                    $posts = get_posts( $args );
                    $programmeDirectors = array();
                    foreach($posts as $post){
                        $id = $post->ID;
                        $Grouparg = array(
                            'hide_empty'    => true
                        );
                        $groups = get_terms( 'group', $Grouparg );
                        foreach($groups as $group){
                            if($group->slug == 'programme-directors'){
                                array_push($programmeDirectors, $post->post_title);
                            }
                        }
                    }
                    $output .= '<select id="' . $id . '" name="selectDirector"><option disabled selected>Select a Programme Director</option><option value="">None</option>';
                    foreach($programmeDirectors as $programmeDirector){
                        if ( $meta == $programmeDirector ) {
                            $selected = 'selected';
                        } else {
                            $selected = null;
                        }
                        $output .= '<option value="'.$programmeDirector.'" '.$selected.'>'.$programmeDirector.'</option>';
                    }
                    $output .= '</select>';
                    break;
                case 'list':
                    $meta =  get_post_meta( $post->ID, $id, true );
                    if($meta){
                        $meta = str_replace('[', '', $meta);
                        $meta = str_replace(']', '', $meta);
                        $meta = str_replace('"', '', $meta);
                        $meta = $array = explode(',', $meta);
                    }
                    $output .= '<div class="list"><label for="' . $id . '">' . $field['title'] . '</label>';
                    $output .= '<input type="text" class="customInput" id=""><ul>';
                    if($meta){
                        foreach($meta as $value){
                            $output .= '<li><span class="list-value">'.$value.'</span> - <span class="remove"><a href="#">remove</a></span></li>';
                        }
                    }
                    $output .= '</ul><button class="list-item-button">Add</button><input type="hidden" name="'.$field['label'].'" value=""></div>';
                    break;
            }
        }
    }
    echo $output;
}

function save_metaboxes( $post_id ) {
    global $metaboxes;

    if ( ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename( __FILE__ ) ) )
        return $post_id;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
    $post_type = get_post_type();

    foreach ( $metaboxes as $id => $metabox ) {
        if ( $metabox['applicableto'] == $post_type ) {
            $fields = $metaboxes[$id]['fields'];

            foreach ( $fields as $id => $field ) {
                $old = get_post_meta( $post_id, $id, true );
                $new = $_POST[$id];

                if ( $new && $new != $old ) {
                    update_post_meta( $post_id, $id, $new );
                }
                elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
                    delete_post_meta( $post_id, $id, $old );
                }
            }
        }
    }
    // If the checkbox was not empty, save it as array in post meta
    if ( ! empty( $_POST['multval'] ) ) {
        update_post_meta( $post_id, 'group', $_POST['multval'] );
    // Otherwise just delete it if its blank value.
    } else {
        delete_post_meta( $post_id, 'group' );
    }

    if(!empty($_POST['selectDirector'])){
        update_post_meta( $post_id, 'director', $_POST['selectDirector'] );
    } else {
        delete_post_meta( $post_id, 'director' );
    }

    if(!empty($_POST['takePart'])){
        update_post_meta( $post_id, 'take_part', $_POST['takePart'] );
    } else {
        delete_post_meta( $post_id, 'take_part' );
    }

    if(!empty($_POST['notAble'])){
        update_post_meta( $post_id, 'not_able', $_POST['notAble'] );
    } else {
        delete_post_meta( $post_id, 'not_able' );
    }

}
add_action( 'save_post', 'save_metaboxes' );
