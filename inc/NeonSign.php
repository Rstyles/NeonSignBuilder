<?php
/**
 * @package NeonSignBuilder-NozakConsulting
 */

require_once('.\Api\WoocommerceService.php');

use Inc\Api\WoocommerceService;

$err = [];

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

$service = new WoocommerceService();

$service->setConsumer_key(get_option('nz_woocommerce_consumer_key'));

$woocommerce = $service->init();

$sign = $service->createProduct(
    'Custom Sign',
    'Simple product',
    '$150',
    'Dimensions:  /n
        Color:'. $_POST['SignColor']. '/n',
    '1',
    '',
    $woocommerce
);

foreach($err as $error){
    echo $error . ' ';
}

echo $_POST['SignColor'];