<?php
/**
 * @package NeonSignBuilder-NozakConsulting
 */

namespace Inc\Api\CallBacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
	public function checkboxSanitize($input) {
		return (isset($input) ? true : false);
	}

	public function textareaSanitize($input) {
		return $input;
	}

	public function datalistSanitize($input) {
		return $input;
	}

	public function textboxSanatize($input) {
		return $input;
	}

	public function passwordSanatize($input) {
		$cyphering = 'AES-128-CTR';
		$encryption_key = 'nozakconsulting'; // password
		$option = 0;
		$iv = '1234567891011121';
		$encryption = openssl_encrypt($input, $cyphering, $encryption_key, $option, $iv);
		return $encryption;
	}

	public function adminSectionManager() {
		echo 'Add your WooCommerce api credentials here.';
	}

	public function checkboxField($args) {
		$name = $args['label_for'];
		$classes = $args['class'];
		$checkbox = get_option($name);
		echo '<input type="checkbox" name="' . $name . '" class="' . $classes . '" ' . ($checkbox ? 'checked' : '') . '>';
	}

	public function textareaField($args) {
		$name = $args['label_for'];
		$classes = $args['class'];
		$value = get_option($name);
		echo '<div class="' . $classes . '"><textarea rows="5" cols="30" placeholder="" name="' . $name . '" id="' . $name . '" class="">' . $value . '</textarea><label for="' . $name . '"><div></div></label></div>';
	}

	public function datalistField($args) {
		$name = $args['label_for'];
		$classes = $args['class'];
		$data = get_option($name);
	
		$values = $this->nozakUrlList;
		
		echo '<select name = "'. $name .'">';
		foreach($values as $value) {
			echo '<option value="'. get_page_link($value->ID) .'" '. (get_page_link($value->ID) == $data ? 'selected' : '') .'>'. $value->post_title .'</option>';
		}
		echo '</select>';
	}

	public function textboxField($args) {
		$name = $args['label_for'];
		$classes = $args['class'];
		$value = get_option($name);
		
		echo '<input type="text" class="'. $classes .'" name="'. $name .'" value="' . $value . '">';
	}

	public function passwordField($args) {
		$name = $args['label_for'];
		$classes = $args['class'];
		$value = $this->decryptKey(get_option($name));
		
		echo '<input type="text" class="'. $classes .'" name="'. $name .'" value="'. $value .'">';
	}
}