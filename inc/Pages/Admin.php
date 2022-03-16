<?php
/**
 * @package NeonSignBuilder-NozakConsulting
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController
{
	public $settings;

	public $callbacks;
	public $callbacks_mngr;

	public $pages = array();
	public $subpages = array();

	public function register() {
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();
		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();
		$this->setSubages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
	}


	public function setPages() {
	$this->pages = [
		[
			'page_title' => 'Neon Sign Builder',
			'menu_title' => 'Neon Sign Builder',
			'capability' => 'manage_options',
			'menu_slug' => 'neon_sign_builder_plugin',
			'callback' => array($this->callbacks, 'adminDashboard'),
			'icon_url' => 'dashicons-art',
			'position' => '110'
		]
	];
	}

	public function setSubages() {
		$this->subpages = [
			// [
			// 	'parent_slug' => 'neon_sign_builder_plugin',
			// 	'page_title' => 'Custom Post Types',
			// 	'menu_title' => 'CPT',
			// 	'capability' => 'manage_options',
			// 	'menu_slug' => 'neon_sign_builder_cpt',
			// 	'callback' => array($this->callbacks, 'adminCpt')
			// ],
			// [
			// 	'parent_slug' => 'neon_sign_builder_plugin',
			// 	'page_title' => 'Custom Taxonomies',
			// 	'menu_title' => 'Taxonomies',
			// 	'capability' => 'manage_options',
			// 	'menu_slug' => 'neon_sign_builder_taxonomies',
			// 	'callback' => array($this->callbacks, 'adminTaxonomy')
			// ],
			// [
			// 	'parent_slug' => 'neon_sign_builder_plugin',
			// 	'page_title' => 'Custom Widgets',
			// 	'menu_title' => 'Widgets',
			// 	'capability' => 'manage_options',
			// 	'menu_slug' => 'neon_sign_builder_widgets',
			// 	'callback' => array($this->callbacks, 'adminWidget')
			// ]
		];
	}

	public function setSettings() {
		$args = [
			 [
				'option_group' => 'neon_sign_builder_options_group',
				'option_name' => 'nz_woocommerce_consumer_key',
				'callback' => array($this->callbacks_mngr, 'passwordSanatize')
			 ],
			 [
				'option_group' => 'neon_sign_builder_options_group',
				'option_name' => 'nz_woocommerce_consumer_secret',
				'callback' => array($this->callbacks_mngr, 'passwordSanatize')
			 ]
		];
		$this->settings->setSettings($args);
	}

	public function setSections() {
		$args = [
			[
				'id' => 'neon_sign_builder_admin_index',
				'title' => 'WooCommerce Settings',
				'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
				'page' => 'neon_sign_builder_plugin'
			]
		];
		$this->settings->setSections($args);
	}

	public function setFields() {
		$args = [
			[
				'id' => 'nz_woocommerce_consumer_key',
				'title' => 'Consumer Key',
				'callback' => array($this->callbacks_mngr, 'passwordField'),
				'page' => 'neon_sign_builder_plugin',
				'section' => 'neon_sign_builder_admin_index',
				'args' => [
					'label_for' => 'nz_woocommerce_consumer_key',
					'class' => ''
				]
			],
			[
				'id' => 'nz_woocommerce_consumer_secret',
				'title' => 'Consumer Secret',
				'callback' => array($this->callbacks_mngr, 'passwordField'),
				'page' => 'neon_sign_builder_plugin',
				'section' => 'neon_sign_builder_admin_index',
				'args' => [
					'label_for' => 'nz_woocommerce_consumer_secret',
					'class' => ''
				]
			]
		];

		$this->settings->setFields($args);
	}
}
