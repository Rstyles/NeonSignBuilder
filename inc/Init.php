<?php

/**
 * @package NeonSignBuilder-NozakConsulting
 */

namespace Inc;

final class Init
{
	// Store all the classed inside an array
	// @return array with full list of classes
	public static function get_services()
	{
		return [
			Pages\Admin::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class,
			// Base\JumpingLink::class
		];
	}

	// Loop through the classes, initialize them, and call the register() nethod if it exists
	public static function register_services()
	{
		foreach (self::get_services() as $class) {
			$service = self::instantiate($class);
			if (method_exists($service, 'register')) {
				$service->register();
			}
		}
	}

	// Initialize the class
	// @param class $class from the services array
	// @return class instance as new instance of the class
	private static function instantiate($class)
	{
		$service = new $class();
		return $service;
	}
}
