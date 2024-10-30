<?php
/**
 * @link              https://intellasoftplugins.com/
 * @package           ISSC
 *
 * @wordpress-plugin
 * Plugin Name:       IntellaSoft Coupon Creator
 * Plugin URI:        https://intellasoftplugins.com/
 * Description:       The official IntellaSoft Coupons plugin.
 * Version:           1.5.0
 * Update URI: https://api.freemius.com
 * Author:            IntellaSoft Solutions
 * Author URI:        https://intellasoftplugins.com/
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl.html
 * Text Domain:       issc
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . 'freemius.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/notices.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/register-coupon-post-type.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/register-cmb2-meta-boxes.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/register-shortcode.php';
