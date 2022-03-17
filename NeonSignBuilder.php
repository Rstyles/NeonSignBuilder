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


		return "
		<link rel=\"stylesheet\" type=\"text/css\" href='".plugins_url( 'dist/style.css', __FILE__ )."' />
		<div class=\"canvas_wrapper\">
		<div class=\"canvas_left\">
		  <canvas id=\"neonSignCanvas\"></canvas>
		  <span class=\"neonSignHelper\"></span>
		  <img id=\"neonSignImage\" />
		</div>
		<br />
	
		<div class=\"canvas_right\">
		  <form action=\"" .plugins_url('inc/NeonSign.php', __FILE__) ."\" method=\"post\" name=\"colorPicker\" class=\"neonSignEditorForm\" onchange=\"submitNeonSign()\">
			<label for=\"neonSignText\">Text:</label>
			<textarea name=\"neonSignText\" id=\"neonSignText\" onkeyup=\"submitNeonSign()\"></textarea>
	
			<h3 class=\"neonSignHeading\">Color:</h3>
			<div class=\"colorPickerRadioGroup\">
			  <input type=\"radio\" name=\"SignColor\" id=\"ColorRed\" value=\"red\" checked=\"true\" />
			  <input type=\"radio\" name=\"SignColor\" id=\"ColorGreen\" value=\"green\" />
			  <input type=\"radio\" name=\"SignColor\" id=\"ColorBlue\" value=\"blue\" />
			  <input type=\"radio\" name=\"SignColor\" id=\"ColorOrange\" value=\"orange\" />
			  <input type=\"radio\" name=\"SignColor\" id=\"ColorPink\" value=\"pink\" />
			  <input type=\"radio\" name=\"SignColor\" id=\"ColorWhite\" value=\"#eee\" />
			  <input type=\"radio\" name=\"SignColor\" id=\"ColorYellow\" value=\"yellow\" />
			  <input type=\"radio\" name=\"SignColor\" id=\"ColorIceBlue\" value=\"#24B7DE\" />
			</div>
			<hr>
			<h3 class=\"neonSignHeading\">Font:</h3>
			<div id=\"fontPickerRadioGroup\" class=\"fontGroup\">
			  <input type=\"radio\" name=\"signFont\" id=\"fontComicSans\" value=\"Comic Sans MS, Comic Sans, cursive\"
				checked=\"true\" />
			  <label for=\"fontComicSans\" style=\"font-family: Comic Sans MS, Comic Sans, cursive\">Comic Sans</label>
	
			  <input type=\"radio\" name=\"signFont\" id=\"fontTrattatello\" value=\"Trattatello, fantasy\" />
			  <label for=\"fontTrattatello\" style=\"font-family: Trattatello, fantasy\">Trattatello</label>
	
			  <input type=\"radio\" name=\"signFont\" id=\"fontAndaleMono\" value=\"Andale Mono, monospace\" />
			  <label for=\"fontAndaleMono\" style=\"font-family: Andale Mono, monospace\">Andale Mono</label>
	
			  <input type=\"radio\" name=\"signFont\" id=\"fontHelvetica\" value=\"Helvetica, sans-serif\" />
			  <label for=\"fontHelvetica\" style=\"font-family: Helvetica, sans-serif\">Helvetica</label>
			</div>
			<hr>
	
			<h3 class=\"neonSignHeading\">Size:</h3>
			<div id=\"fontSizeSliderWrapper\" class=\"fontGroup\">
			  <input type=\"range\" name=\"fontSizeSlider\" id=\"fontSizeSlider\" class=\"fontSizeSlider\" min=\"50\" max=\"75\" onmousemove=\"submitNeonSign()\">
			</div>
			<hr>
	
			<h3 class=\"neonSignHeading\">Support:</h3>
			<div class=\"supportOptions\">
			  <input type=\"radio\" name=\"neonSignSupportType\" id=\"cutToShape\" value=\"Cut to Shape\" checked=\"true\">
			  <label for=\"cutToShape\">Cut to Shape -
				<span class=\"flavor-text\">Acrylic display that follows the shape of your sign.</span>
			  </label>
			</div>
	
			<div class=\"supportOptions\">
			  <input type=\"radio\" name=\"neonSignSupportType\" id=\"hollowOut\" value=\"Hollow Out\">
			  <label for=\"hollowOut\">Hollow Out -
				<span class=\"flavor-text\">The most descreet transparent backing.</span>
			  </label>
			</div>
	
			<div class=\"supportOptions\">
			  <input type=\"radio\" name=\"neonSignSupportType\" id=\"fullBoard\" value=\"Full Board\">
			  <label for=\"fullBoard\">Full Board -
				<span class=\"flavor-text\">Acrylic display in shape of a square around your sign.</span>
			  </label>
			</div>
	
			<div class=\"supportOptions\">
			  <input type=\"radio\" name=\"neonSignSupportType\" id=\"stand\" value=\"Stand\">
			  <label for=\"stand\">Stand -
				<span class=\"flavor-text\">Make your sign upright on the floor.</span>
			  </label>
			</div>
			<button onclick=\"submitNeonSign()\" id=\"neonSignSubmit\">Submit</button>
		  </form>
	
	
		  <div class=\"neonSignPriceWrapper\">
			<p id=\"neonSignPrice\"></p>
		  </div>
		</div>
	  </div>
	  <script type='text/javascript' src='".plugins_url('dist/NeonSignCanvas.js', __FILE__)."'></script>
	  <script type='text/javascript' src='".plugins_url('dist/calculatePrice.js', __FILE__)."'></script>
	  <script type='text/javascript' src='".plugins_url('dist/drawImage.js', __FILE__)."'></script>
	  <script type='text/javascript' src='".plugins_url('dist/dragItem.js', __FILE__)."'></script>";
	}

}

new NZ_NeonSignBuilder_Embed();