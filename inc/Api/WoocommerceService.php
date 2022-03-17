<?php
/**
 * @package NeonSignBuilder-NozakConsulting
 */

namespace Inc\Api;

use Automattic\WooCommerce\Client;
use Inc\Base\BaseController;

class WoocommerceService extends BaseController
{
    private $consumer_key;
    /**
     * Get the value of consumer_key
     */ 
    public function getConsumer_key()
    {
        return $this->consumer_key;
    }

    /**
     * Set the value of consumer_key
     *
     * @return  self
     */ 
    public function setConsumer_key($consumer_key)
    {
        $this->consumer_key = $consumer_key;

        return $this;
    }
    
    private $consumer_secret;
    /**
     * Get the value of consumer_secret
     */ 
    public function getConsumer_secret()
    {
        return $this->consumer_secret;
    }

    /**
     * Set the value of consumer_secret
     *
     * @return  self
     */ 
    public function setConsumer_secret($consumer_secret)
    {
        $this->consumer_secret = $consumer_secret;

        return $this;
    }

    public function init($woocommerce = null) {
        if ($woocommerce == null) {
            $woocommerce = new Client(
                $this->base_url, 
                $this->consumer_key, 
                $this->consumer_secret,
                [
                    'version' => 'wc/v3',
                ]
            );
        }
        return $woocommerce;
    }

    public function createProduct(
        $name,
        $type,
        $price,
        $description,
        $category,
        $image,
        $woocommerce) {
            $data = [
                'name' => $name,
                'type' => $type,
                'regular_price' => $price,
                'description' => $description,
                'short_description' => $description,
                'categories' => [
                    'id' => $category
                ],
                'images' => [
                    'scr' => $image
                ]
            ];
            $woocommerce->post('products', $data);
    }


}