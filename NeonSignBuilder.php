<?php
/**
 * @package NeonSignBuilder-NozakConsulting
 */
/*
Plugin Name: Neon Sign Custom Builder
Plugin URI: https://nozakconsulting.com
Description: Easily embed a Neon Sign builder into a page using a shortcode
Version: 1.3.0
Author: Ryan Styles - Nozak Consulting
Author URI: https://nozakconsulting.com
License: GPL2
Text Domain: Nozak Consulting
*/

// abort if file is not called directly
if (!defined('ABSPATH')) {
	die;
}

// require one the Composer Autoloads
if (file_exists(dirname(__FILE__). '/vendor/autoload.php')) {
	require_once dirname(__FILE__). '/vendor/autoload.php';
}

// runs during plugin activation
function activate_neon_sign_builder_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_neon_sign_builder_plugin');

// runs during plugin deactivation
function deactivate_neon_sign_builder_plugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_neon_sign_builder_plugin');

// Initialize the core classes of the plugin
if (class_exists('Inc\\Init')) {
	Inc\Init::register_services();
}


class NZ_NeonSignBuilder_Embed {

	public function __construct() {
		add_shortcode( 'neon_sign_builder', array($this, 'nsb_shortcode' ) );
	}

	/**
	 * Shortcode [neon_sign_builder]
	 */

	public function nsb_shortcode( $atts, $content ) {
		return require_once(plugin_dir_path( __FILE__) . 'templates/neon-sign-builder.php');
	}
}
new NZ_NeonSignBuilder_Embed();