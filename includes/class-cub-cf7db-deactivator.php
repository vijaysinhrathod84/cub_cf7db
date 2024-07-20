<?php
/**
 * Fired during plugin deactivation
 *
 * @link       https://www.cubsys.com
 * @since      1.0.0
 *
 * @package    Cub_cf7db
 * @subpackage Cub_cf7db/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Cub_cf7db
 * @subpackage Cub_cf7db/includes
 * @author     cubsys <contact@cubsys.com>
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
class Cub_Cf7db_Deactivator {

	/**
	 * Method to run during plugin deactivation.
	 *
	 * Removes the custom capability 'cub_cf7db_access' from all roles.
	 *
	 * @since 1.0.0
	 */
	public static function deactivate() {
		if ( ! empty( $GLOBALS['wp_roles'] ) && is_a( $GLOBALS['wp_roles'], 'WP_Roles' ) ) {
			global $wp_roles;

			foreach ( array_keys( $wp_roles->roles ) as $role_name ) {
				$role = get_role( $role_name );
				if ( $role && $role->has_cap( 'cub_cf7db_access' ) ) {
					$role->remove_cap( 'cub_cf7db_access' );
				}
			}
		}
	}
}