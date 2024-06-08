<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future versions of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://www.cubsys.com
 * @since      1.0.0
 *
 * @package    Cub_cf7db
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Delete plugin options and custom tables.
 */
function cub_cf7db_delete_plugin_data() {
	global $wpdb;

	// Delete plugin options.
	delete_option( 'cub_cf7db_options' );

	// For multisite, delete options from each blog.
	if ( is_multisite() ) {
		$blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
		foreach ( $blog_ids as $blog_id ) {
			switch_to_blog( $blog_id );
			delete_option( 'cub_cf7db_options' );
			restore_current_blog();
		}
	}

	// Drop custom tables.
	$table_name = $wpdb->prefix . 'cub_cf7db_entries';
	$escaped_table_name = esc_sql( $table_name );
	$sql = $wpdb->prepare( 'DROP TABLE IF EXISTS %s', $table_name );
}

// Execute the function to delete plugin data.
// cub_cf7db_delete_plugin_data();.
