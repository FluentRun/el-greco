<?php

if( ! function_exists('cz_ar') ) {
    function cz_ar( $name, $options ) {
        return isset( $options[ $name ] ) ? $options[ $name ] : '';
    }
}

function new_load_cz_menu() {

}

if( current_user_can( 'manage_options' ) ){
    add_action( 'new_live_admin', 'new_load_cz_menu',11);
}



function live_cstm_ajax(){
    $response = live_cstm_action();
    wp_send_json( $response );
}

add_action( 'wp_ajax_live_cstm_ajax', 'live_cstm_ajax' );

function live_cstm_action() {

    if ( isset( $_POST['handler'] ) && current_user_can( 'activate_plugins' ) ) {

        $handler = 'handler_' . $_POST['handler'];

        if( function_exists($handler ) ) {
            return $handler();
        }
    }

    return [ 'error' => __( 'Undefined action', 'elgreco' ) ];
}



function handler_live_cstm_save() {
    if ( empty( $_POST['params'] ) ) {
        return [ 'error' => __( 'Nothing to save', 'elgreco' ) ];
    }

    parse_str( wp_unslash( $_POST['params'] ), $params );

    $theme        = wp_get_theme();
    $option_name  = 'cz_' . $theme->get( 'Name' );
    $defaults     = live_cstm_get_defaults();
    $current_data = get_option( $option_name, [] );

    $new_data = array_merge( $defaults, $current_data, $params );
    update_option( $option_name, $new_data );

    do_action( 'cz_change_options' );

    return [
        'message' => __( 'Settings saved', 'elgreco' ),
        'error'   => false,
        'defs'    => $new_data,
    ];
}




function live_cstm_get_defaults() {
    if ( function_exists( 'mode_get_defaults' ) ) {
        return mode_get_defaults();
    }

    $defaults = [];
    $file     = get_template_directory() . '/adstm/customization/defaults.php';

    if ( file_exists( $file ) ) {
        $defaults = include $file;
    }

    return $defaults;
}

function handler_live_cstm_default() {
    $theme       = wp_get_theme();
    $option_name = 'cz_' . $theme->get( 'Name' );
    $defaults    = live_cstm_get_defaults();

    update_option( $option_name, $defaults );

    return [
        'message' => __( 'Default settings restored', 'elgreco' ),
        'error'   => false,
        'defs'    => $defaults,
    ];
}


function handler_live_cstm_add() {
    $field    = isset( $_POST['field'] ) ? sanitize_text_field( wp_unslash( $_POST['field'] ) ) : '';
    $defaults = live_cstm_get_defaults();
    $value    = isset( $defaults[ $field ] ) ? $defaults[ $field ] : [];

    if ( is_array( $value ) && isset( $value[0] ) ) {
        $value = $value[0];
    }

    return [
        'message' => __( 'Item added', 'elgreco' ),
        'option'  => $field,
        'value'   => $value,
        'error'   => false,
    ];
}



function handler_live_cstm_save_featured() {
    if ( empty( $_POST['params'] ) ) {
        return [ 'error' => __( 'Nothing to save', 'elgreco' ) ];
    }

    parse_str( wp_unslash( $_POST['params'] ), $params );

    $theme        = wp_get_theme();
    $option_name  = 'cz_' . $theme->get( 'Name' );
    $defaults     = live_cstm_get_defaults();
    $current_data = get_option( $option_name, [] );

    $new_data = array_merge( $defaults, $current_data );
    $new_data = array_merge( $new_data, $params );

    update_option( $option_name, $new_data );

    do_action( 'cz_change_options' );

    return [
        'message' => __( 'Featured item saved', 'elgreco' ),
        'error'   => false,
        'defs'    => $new_data,
    ];
}


function handler_live_cstm_delete_featured() {
    $key         = isset( $_POST['key'] ) ? absint( $_POST['key'] ) : null;
    $theme       = wp_get_theme();
    $option_name = 'cz_' . $theme->get( 'Name' );
    $current     = get_option( $option_name, [] );

    if ( null === $key || ! isset( $current['featured'][ $key ] ) ) {
        return [ 'error' => __( 'Nothing to delete', 'elgreco' ) ];
    }

    unset( $current['featured'][ $key ] );
    $current['featured'] = array_values( $current['featured'] );

    update_option( $option_name, $current );

    return [
        'message' => __( 'Item deleted', 'elgreco' ),
        'error'   => false,
        'defs'    => $current,
    ];
}


function handler_live_cstm_lic() {
    return [
        'message' => __( 'License check skipped in this environment.', 'elgreco' ),
        'error'   => false,
    ];
}

add_action('wp_ajax_get_products_live', function () {

});


function get_product_tmpl() {

    die;
}
add_action('wp_ajax_get_product_tmpl', 'get_product_tmpl');


