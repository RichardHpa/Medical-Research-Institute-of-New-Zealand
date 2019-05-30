<?php
function apikey_settings_init() {
    register_setting( 'apikey', 'apikey_options' );

    add_settings_section(
        'apikey_section_developers',
        __( 'Include your API keys here.', 'apikey' ),
        'apikey_section_developers_cb',
        'apikey'
    );

    add_settings_field(
        'apikey_field_google',
        __( 'Google Maps API Key', 'apikey' ),
        'api_field_cb',
        'apikey',
        'apikey_section_developers',
        [
            'label_for' => 'apikey_field_google',
            'apikey_custom_data' => 'custom',
            'placeholder' => 'Please enter a valid Google Maps API Key',
            'type' => 'text'
        ]
    );
}
add_action( 'admin_init', 'apikey_settings_init' );
function apikey_section_developers_cb( $args ) {
 ?>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'You need to make sure you include both of these keys if you want the website to work.', 'apikey' ); ?></p>
 <?php
}
function api_field_cb($args){
    $options = get_option( 'apikey_options' );
    ?>
        <input
            id="<?php echo esc_attr( $args['label_for'] ); ?>"
            type="<?php echo esc_attr( $args['type'] ); ?>"
            name="apikey_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
            value="<?php echo $options[ $args['label_for'] ]; ?>"
            class="regular-text"
            data-custom="<?php echo esc_attr( $args['apikey_custom_data'] ); ?>"
            placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
        >
    <?php
}
function apikey_options_page() {
    // add top level menu page
    add_menu_page(
        'Your API Keys',
        'Map Settings',
        'manage_options',
        'mrinz_map_settings',
        'apikey_options_page_html',
        'dashicons-admin-site',
        80
    );
}
add_action( 'admin_menu', 'apikey_options_page' );


function apikey_options_page_html() {

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    if ( isset( $_GET['settings-updated'] ) ) {
        add_settings_error( 'apikey_messages', 'apikey_message', __( 'Settings Saved', 'apikey' ), 'updated' );
    }

    settings_errors( 'apikey_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'apikey' );

            do_settings_sections( 'apikey' );

            submit_button( 'Save Settings' );
            ?>
        </form>
    </div>

    <?php
}
