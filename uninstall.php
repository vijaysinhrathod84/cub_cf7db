<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://www.cubsys.com
 * @since      1.0.0
 *
 * @package    Cub_cf7db
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Delete plugin options and custom database tables on uninstall.
 *
 * @since 1.0.0
 */
function cubcf7db_delete_plugin_data() {
	global $wpdb;

	// Delete plugin options.
	delete_option( 'cub_cf7db_options' );
	delete_option( 'cub_cf7db_view_install_date' );

	// For multisite — delete options from each blog.
	if ( is_multisite() ) {
		$blog_ids = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs}" );
		foreach ( $blog_ids as $blog_id ) {
			switch_to_blog( $blog_id );
			delete_option( 'cub_cf7db_options' );
			delete_option( 'cub_cf7db_view_install_date' );

			// Fix #6: Correct table name — was 'cub_cf7db_entries', actual table is 'cub_cf7db_forms'.
			// Fix #7: Use esc_sql() + $wpdb->query() — prepare() does not work for table names in DROP TABLE.
			$table_name = esc_sql( $wpdb->prefix . 'cub_cf7db_forms' );
			$wpdb->query( "DROP TABLE IF EXISTS `{$table_name}`" ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
			restore_current_blog();
		}
	} else {
		// Fix #6 & #7: Correct table name + proper DROP TABLE query.
		$table_name = esc_sql( $wpdb->prefix . 'cub_cf7db_forms' );
		$wpdb->query( "DROP TABLE IF EXISTS `{$table_name}`" ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
	}
}

// Fix #6: Actually execute the uninstall function (was commented out before).
cubcf7db_delete_plugin_data();