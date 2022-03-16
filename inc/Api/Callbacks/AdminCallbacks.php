<?php
/**
 * @package NeonSignBuilder-NozakConsulting
 */

namespace Inc\Api\CallBacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard() {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function adminCpt() {
        return require_once("$this->plugin_path/templates/cpt.php");
    }

    public function adminTaxonomy() {
        return require_once("$this->plugin_path/templates/taxonomy.php");
    }

    public function adminWidget() {
        return require_once("$this->plugin_path/templates/widget.php");
    }

    // public function jumpingLinkOptionsGroup($input) {
    // 	return $input;
    // }

    // public function jumpingLinkAdminSection() {
    // 	echo 'This is a test';
    // }

    public function neonSignBuilderTextExample() {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example value="' . $value . '" placeholder="Write something here!">';
    }
    public function neonSignBuilderFirstName() {
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" class="regular-text" name="text_example value="' . $value . '" placeholder="">';
    }
}