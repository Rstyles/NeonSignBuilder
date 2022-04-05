<?php
/**
 * @package NeonSignBuilder-NozakConsulting
 */

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

use Automattic\WooCommerce\Client;

$err = [];
$consumer_key = "";
$consumer_secret = "";
$store_url = get_site_url();




if ( null !== get_option( 'nz_woocommerce_consumer_key' ) ) {
    $consumer_key = get_option( 'nz_woocommerce_consumer_key' );
}

if ( null !== get_option( 'nz_woocommerce_consumer_secret' ) ) {
    $consumer_secret = get_option( 'nz_woocommerce_consumer_secret' );
}


$woocommerce = new Client(
    $store_url,
    $consumer_key,
    $consumer_secret,
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true,
        'timeout' => 0,
        'verify_ssl'=> false
    ]
);

define('UPLOAD_DIR', wp_upload_dir()['path'] . '/');
$img = $_POST['neonsignPostImg'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file_id = uniqid();
$file = UPLOAD_DIR. $file_id . '.png';
$success = file_put_contents($file, $data);
$file_url = wp_upload_dir()['url'] . '/' . $file_id . '.png';
$file_url = str_replace('http://', 'https://', $file_url);

$mime = 'image/png';

$upload_id = wp_insert_attachment( [
    'guid' => $file_url,
    'post_mime_type' => $mime,
    'post_title' => 'Custom Neon Sign - ' . $_POST['neonSignText'],
    'post_content' => '',
    'post_status' => 'inherit'
], $file);
require_once( ABSPATH . 'wp-admin/includes/image.php' );
wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $file ) );



// Send the post request
$post_data = [
    'name' => 'Custom Neon Sign - ' . $_POST['neonSignText'],
    'slug' => 'custom-neon-sign-' . $file_id,
    'type' => 'simple',
    'regular_price' => $_POST['priceField'],
    'description' => 'Color: ' . $_POST['SignColor'] .
               '</br> Font: ' . $_POST['signFont'] .
               '</br> Support: ' . $_POST['neonSignSupportType'] .
               '</br> Dimmer: ' . $_POST['neonSignDimmer'] .
               '</br> Usage: ' . $_POST['neonSignUsageType'] .
               '</br> Type of Neon: ' . $_POST['neonSignType'],
    'short_description' => 'This custom neon sign was built with the Nozak Consulting Neon Sign Builder.',
    'catalog_visibility' => 'hidden',
    'categories' => [
        [
            'id' => '57'
        ]
    ],
    'images' => [
        [
            //'src' => $file_url
        ]
    ]
];

$woocommerce->post('products', $post_data);

wp_redirect($store_url . '/product/custom-neon-sign-' . $file_id . '/');
