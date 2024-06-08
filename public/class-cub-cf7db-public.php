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

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Cub_cf7db
 * @subpackage Cub_cf7db/public
 * @author     cubsys <contact.cubsys@gmail.com>
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
     * @since    1.0.0
     */
    public function enqueue_styles() {
        wp_enqueue_style( $this->plugin_name, CUB_CF7DB_PLUGIN_URL . 'public/css/cub_cf7db-public.css', array(), $this->version, 'all' );
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {
        wp_enqueue_script( $this->plugin_name, CUB_CF7DB_PLUGIN_URL . 'public/js/cub_cf7db-public.js', array( 'jquery' ), $this->version, true );
    }
}
