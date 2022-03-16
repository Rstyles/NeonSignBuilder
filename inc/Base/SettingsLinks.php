<?php
/**
 * @package NeonSignBuilder-NozakConsulting
 */

namespace Inc\Base;

use Inc\Base\BaseController;
 
class SettingsLinks extends BaseController
{
	public function register() {
		add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
	}

	public function settings_link($links) {
		$settingsLink = '<a href="admin.php?page=neon_sign_builder_plugin">Settings</a>';
		array_push($links, $settingsLink);
		return $links;
	}
}