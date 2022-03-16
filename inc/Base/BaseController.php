<?php
/**
 * @package NeonSignBuilder-NozakConsulting
*/

namespace Inc\Base;

class BaseController
{
	public $plugin_path;
	public $plugin_url;
	public $plugin;
	public $base_url;

	public function __construct() {
		$this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
		$this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
		$this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/NeonSignBuilder.php';
		$this->base_url = get_site_url();
	}

	public function decryptKey($input) {
		$cyphering = 'AES-128-CTR';
		$encryption_key = 'nozakconsulting'; // password
		$option = 0;
		$iv = '1234567891011121';
		$decryption = openssl_decrypt($input, $cyphering, $encryption_key, $option, $iv);
		return $decryption;
	}
}