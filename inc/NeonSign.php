<?php
/**
 * @package NeonSignBuilder-NozakConsulting
 */

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

use Automattic\WooCommerce\Client;
use Inc\Api\WoocommerceService;

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
    $store_url . 'wp-json/',
    $consumer_key,
    $consumer_secret,
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'verify_ssl' => false
    ]
);

$data = [
    'name' => 'Premium Quality',
    'type' => 'simple',
    'regular_price' => '21.99',
    'description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.',
    'short_description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
    'categories' => [
        [
            'id' => 9
        ],
        [
            'id' => 14
        ]
    ],
    'images' => [
        [
            'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg'
        ],
        [
            'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_back.jpg'
        ]
    ]
];

print_r($woocommerce->post('products', $data));