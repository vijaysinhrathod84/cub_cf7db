<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.cubsys.com
 * @since      1.0.0
 *
 * @package    Cub_cf7db
 * @subpackage Cub_cf7db/public
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * The public-facing functionality of the plugin.
 *
 * This plugin is admin-only. No public-facing assets are required.
 * The class is retained for future extensibility.
 *
 * @package    Cub_cf7db
 * @subpackage Cub_cf7db/public
 * @author     cubsys <contact@cubsys.com>
 */
class Cub_Cf7db_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * Fix #12: This plugin is admin-only — no public CSS is needed on the front-end.
	 * Removed unnecessary enqueue to avoid loading unused assets on every page.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		// No public styles required for this admin-only plugin.
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * Fix #12: This plugin is admin-only — no public JS is needed on the front-end.
	 * Removed unnecessary enqueue to avoid loading unused assets on every page.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		// No public scripts required for this admin-only plugin.
	}
}