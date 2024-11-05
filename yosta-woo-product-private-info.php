<?php
/*
Plugin Name: Yosta woo product private info
Description: Add product private info
Version: 0.1
Author: Joost Abrahams
Author URI: https://mantablog.nl
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

add_action( 'woocommerce_product_options_general_product_data', 'action_woocommerce_product_options_general_product_data', 10, 0 );
add_action( 'woocommerce_admin_process_product_object', 'action_woocommerce_admin_process_product_object', 10, 1 );
  
// Add field
function action_woocommerce_product_options_general_product_data() {
    // Textarea Field
    woocommerce_wp_textarea_input( array(
        'id'          => '_yosta_field_1',
        'label'       => __( 'Productbeschrijving prive', 'yosta-woo-product-private-info' ),
    ));
}

// Save Field
function action_woocommerce_admin_process_product_object( $product ) {
    if( isset( $_POST['_yosta_field_1'] ) ) {
        $product->update_meta_data( '_yosta_field_1', esc_html( $_POST['_yosta_field_1'] ) );
    }
}

//declare complianz with consent level API
$plugin = plugin_basename( __FILE__ );
add_filter( "wp_consent_api_registered_{$plugin}", '__return_true' );

