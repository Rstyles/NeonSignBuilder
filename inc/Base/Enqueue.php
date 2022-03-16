<?php
/**
 * @package NeonSignBuilder-NozakConsulting
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class Enqueue extends BaseController
{
	public function register() {
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
	}

	function enqueue() {
		// enqueue all our scripts
		wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/nozak-neon-sign-builder-admin.css', __FILE__ );
		wp_enqueue_script('myplugiscript', $this->plugin_url . 'assets/nozak-neon-sign-builder-admin.js', __FILE__ );
	}
}