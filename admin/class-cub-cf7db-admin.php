<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.cubsys.com
 * @since      1.0.0
 *
 * @package    Cub_cf7db
 * @subpackage Cub_cf7db/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cub_cf7db
 * @subpackage Cub_cf7db/admin
 * @author     cubsys <contact@cubsys.com>
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Cub_Cf7db_Admin {

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
	 * @since 1.0.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		$screen = get_current_screen();
		if ( $screen && 'toplevel_page_cub_cf7db-page' === $screen->id ) {
			wp_enqueue_style( $this->plugin_name . '-bootstrap', CUB_CF7DB_PLUGIN_URL . '/admin/css/bootstrap.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name . '-dataTables-bootstrap4', CUB_CF7DB_PLUGIN_URL . '/admin/css/dataTables.bootstrap4.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name . '-rowReorder-bootstrap4-min', CUB_CF7DB_PLUGIN_URL . '/admin/css/rowReorder.bootstrap4.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name . '-responsive-bootstrap4-min', CUB_CF7DB_PLUGIN_URL . '/admin/css/responsive.bootstrap4.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name . '-buttons-bootstrap4-min', CUB_CF7DB_PLUGIN_URL . '/admin/css/buttons.bootstrap4.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name . '-select2', CUB_CF7DB_PLUGIN_URL . '/admin/css/select2.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name . '-admin', CUB_CF7DB_PLUGIN_URL . '/admin/css/cub_cf7db-admin.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name . '-font-awesome', CUB_CF7DB_PLUGIN_URL . '/admin/css/font-awesome.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name . '-responsive', CUB_CF7DB_PLUGIN_URL . '/admin/css/responsive.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		$screen = get_current_screen();
		if ( $screen && 'toplevel_page_cub_cf7db-page' === $screen->id ) {
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( $this->plugin_name . '-popper-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/popper.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name . '-bootstrap-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/bootstrap.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-bootstrap-bundle', CUB_CF7DB_PLUGIN_URL . '/admin/js/bootstrap.bundle.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-dataTables-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/dataTables.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-dataTables-buttons-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/dataTables.buttons.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-buttons-bootstrap4-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/buttons.bootstrap4.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-jszip-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/jszip.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-pdfmake-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/pdfmake.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-vfs_fonts', CUB_CF7DB_PLUGIN_URL . '/admin/js/vfs_fonts.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-buttons-html5-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/buttons.html5.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-buttons-print-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/buttons.print.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-dataTables-bootstrap4', CUB_CF7DB_PLUGIN_URL . '/admin/js/dataTables.bootstrap4.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-dataTables-rowReorder-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/dataTables.rowReorder.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-rowReorder-bootstrap4-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/rowReorder.bootstrap4.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-dataTables-responsive-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/dataTables.responsive.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-responsive-bootstrap4-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/responsive.bootstrap4.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-select2-min', CUB_CF7DB_PLUGIN_URL . '/admin/js/select2.min.js', array( 'jquery' ), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-admin', CUB_CF7DB_PLUGIN_URL . '/admin/js/cub_cf7db-admin.js', array( 'jquery', $this->plugin_name . '-select2-min', $this->plugin_name . '-dataTables-min' ), $this->version, true );

			// Pass nonce to JS for AJAX security verification.
			wp_localize_script(
				$this->plugin_name . '-admin',
				'ajax_object',
				array(
					'ajax_url' => admin_url( 'admin-ajax.php' ),
					'nonce'    => wp_create_nonce( 'cubcf7db_nonce' ),
				)
			);
		}
	}

	/**
	 * Handle actions before sending mail - captures and saves CF7 form submission to DB.
	 *
	 * @since 1.0.0
	 * @param object $form_tag CF7 contact form object.
	 */
	public function cubcf7db_before_send_mail( $form_tag ) {
		global $wpdb;

		$cfdb       = apply_filters( 'cub_cf7db_database', $wpdb );
		$table_name = $cfdb->prefix . 'cub_cf7db_forms';

		$submission = WPCF7_Submission::get_instance();
		if ( ! $submission ) {
			return;
		}

		$form_post_id = $form_tag->id();

		// Check if we should track this form.
		$tracked_forms = get_option( 'cubcf7db_tracked_forms', array() );
		if ( is_array( $tracked_forms ) && ! empty( $tracked_forms ) && ! in_array( (string) $form_post_id, $tracked_forms, true ) ) {
			return;
		}

		$contact_form = $submission->get_contact_form();
		$tags_names   = array();
		$strict_keys  = apply_filters( 'cub_cf7db_strict_keys', false );
		$allowed_tags = array();

		$bl = array( '\"', "\'", '/', '\\', '"', "'" );
		$wl = array( '&quot;', '&#039;', '&#047;', '&#092;', '&quot;', '&#039;' );

		if ( $strict_keys ) {
			$tags = $contact_form->scan_form_tags();
			foreach ( $tags as $tag ) {
				if ( ! empty( $tag->name ) ) {
					$tags_names[] = $tag->name;
				}
			}
			$allowed_tags = $tags_names;
		}

		$not_allowed_tags = apply_filters( 'cub_cf7db_not_allowed_tags', array( 'g-recaptcha-response' ) );
		$allowed_tags     = apply_filters( 'cub_cf7db_allowed_tags', $allowed_tags );

		$data  = $submission->get_posted_data();

		// Use CF7's own uploaded_files() API instead of raw $_FILES superglobal.
		$cf7_uploaded_files = $submission->uploaded_files();
		$uploaded_file_keys = array_keys( $cf7_uploaded_files );

		// Initialize WP_Filesystem for file operations.
		if ( ! function_exists( 'WP_Filesystem' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}
		WP_Filesystem();
		global $wp_filesystem;

		// Ensure the upload directory exists.
		$upload_dir        = wp_upload_dir();
		$cub_cf7db_dirname = $upload_dir['basedir'] . '/cub_cf7db_uploads';
		if ( ! $wp_filesystem->is_dir( $cub_cf7db_dirname ) ) {
			$wp_filesystem->mkdir( $cub_cf7db_dirname );
		}

		// Initialize uploaded files tracker.
		$uploaded_files = array();
		$time_now       = current_time( 'YmdHis' );

		// Process uploaded files using CF7's API.
		foreach ( $cf7_uploaded_files as $file_key => $file_path ) {
			if ( empty( $file_path ) ) {
				continue;
			}

			// Handle both single file (string) and multiple files (array).
			$paths = is_array( $file_path ) ? $file_path : array( $file_path );
			foreach ( $paths as $tmp_path ) {
				if ( empty( $tmp_path ) ) {
					continue;
				}
				$file_name      = wp_basename( $tmp_path );
				$safe_file_name = sanitize_file_name( $file_key . '-' . $file_name );
				$upload_path    = $cub_cf7db_dirname . '/' . $time_now . '-' . $safe_file_name;

				if ( $wp_filesystem->move( $tmp_path, $upload_path, true ) ) {
					$uploaded_files[ $file_key ] = $upload_path;
				}
			}
		}

		$form_data                    = array();
		$form_data['cub_cf7db_status'] = 'unread';

		foreach ( $data as $key => $d ) {
			// Skip if strict keys enabled and key not in allowed list.
			if ( $strict_keys && ! in_array( $key, $allowed_tags, true ) ) {
				continue;
			}

			// Skip not-allowed tags (e.g. recaptcha).
			if ( in_array( $key, $not_allowed_tags, true ) ) {
				continue;
			}

			// Store uploaded file reference.
			if ( isset( $uploaded_files[ $key ] ) ) {
				$sanitized_key                          = sanitize_text_field( $key );
				$form_data[ $sanitized_key . 'cub_cf7db_file' ] = wp_basename( $uploaded_files[ $key ] );
				continue;
			}

			// Skip raw file keys from CF7 uploaded list.
			if ( in_array( $key, $uploaded_file_keys, true ) ) {
				continue;
			}

			// Sanitize and escape the posted value.
			$tmp_d = is_array( $d )
				? array_map( function( $item ) use ( $bl, $wl ) {
					return str_replace( $bl, $wl, $item );
				}, $d )
				: str_replace( $bl, $wl, $d );

			$sanitized_key             = sanitize_text_field( $key );
			$form_data[ $sanitized_key ] = $tmp_d;
		}

		/* cub_cf7db before save data. */
		$form_data = apply_filters( 'cub_cf7db_before_save_data', $form_data );
		do_action( 'cub_cf7db_before_save', $form_data );

		$form_value   = maybe_serialize( $form_data );
		$form_date    = current_time( 'Y-m-d H:i:s' );
		$form_user_id = get_current_user_id();
		$form_status  = 'unread';

		$cfdb->insert(
			$table_name,
			array(
				'form_post_id' => $form_post_id,
				'form_value'   => $form_value,
				'form_date'    => $form_date,
				'form_user_id' => $form_user_id,
				'form_status'  => $form_status,
			),
			array( '%d', '%s', '%s', '%d', '%s' )
		);

		/* cub_cf7db after save data */
		$insert_id = $cfdb->insert_id;
		do_action( 'cub_cf7db_after_save_data', $insert_id );

		// Send Admin Notification if enabled.
		$admin_notification = get_option( 'cubcf7db_admin_notification', 'no' );
		if ( 'yes' === $admin_notification ) {
			$admin_email = get_option( 'admin_email' );
			$subject     = sprintf( __( 'New Submission: %s', 'cub-cf7db' ), get_the_title( $form_post_id ) );
			$message     = sprintf( __( 'A new submission has been saved to the database for %s.', 'cub-cf7db' ), get_the_title( $form_post_id ) ) . "\n\n";
			$message    .= admin_url( 'admin.php?page=cub_cf7db-page&action=view&formid=' . $insert_id );
			wp_mail( $admin_email, $subject, $message );
		}
	}

	/**
	 * Get total unread submissions count.
	 *
	 * @since 1.0.2
	 * @return int Total unread submissions.
	 */
	public function cubcf7db_get_unread_count() {
		global $wpdb;
		$cfdb       = apply_filters( 'cub_cf7db_database', $wpdb );
		$table_name = esc_sql( $cfdb->prefix . 'cub_cf7db_forms' );
		return (int) $cfdb->get_var( "SELECT COUNT(*) FROM {$table_name} WHERE form_status = 'unread'" );
	}

	/**
	 * Add the CF7DB menu page to the admin menu.
	 *
	 * @since 1.0.0
	 */
	public function cubcf7db_add_menu_page() {
		$unread_count = $this->cubcf7db_get_unread_count();
		$menu_title   = __( 'CF7DB', 'cub-cf7db' );
		
		if ( $unread_count > 0 ) {
			$menu_title .= sprintf( ' <span class="awaiting-mod">%d</span>', $unread_count );
		}

		add_menu_page(
			__( 'CF7DB', 'cub-cf7db' ),
			$menu_title,
			'manage_options',
			'cub_cf7db-page',
			array( $this, 'cubcf7db_menu_callback' ),
			'dashicons-feedback',
			30
		);

		add_submenu_page(
			'cub_cf7db-page',
			__( 'Settings', 'cub-cf7db' ),
			__( 'Settings', 'cub-cf7db' ),
			'manage_options',
			'cub_cf7db-settings',
			array( $this, 'cubcf7db_settings_page_callback' )
		);
	}

	/**
	 * Register plugin settings.
	 *
	 * @since 1.0.2
	 */
	public function cubcf7db_register_settings() {
		register_setting( 'cubcf7db_settings_group', 'cubcf7db_tracked_forms' );
		register_setting( 'cubcf7db_settings_group', 'cubcf7db_admin_notification' );
		register_setting( 'cubcf7db_settings_group', 'cubcf7db_data_retention' );
	}

	/**
	 * Render the Settings page.
	 *
	 * @since 1.0.2
	 */
	public function cubcf7db_settings_page_callback() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		include_once 'partials/cub-cf7db-settings-display.php';
	}

	/**
	 * Render the CF7DB menu page.
	 *
	 * @since 1.0.0
	 */
	public function cubcf7db_menu_callback() {
		if ( current_user_can( 'manage_options' ) ) {
			include_once 'partials/cub-cf7db-display.php';
		}
	}

	/**
	 * Get a list of all Contact Form 7 forms for use in a dropdown.
	 *
	 * @since 1.0.0
	 * @return array|null List of CF7 forms or null if user doesn't have permissions.
	 */
	public function cubcf7db_cf7form_list() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return null;
		}

		$args = array(
			'post_type'      => 'wpcf7_contact_form',
			'orderby'        => 'form_id',
			'post_status'    => 'publish',
			'order'          => 'ASC',
			'posts_per_page' => -1,
		);

		return get_posts( $args );
	}

	/**
	 * AJAX handler - Get form submissions list for a given CF7 form ID.
	 *
	 * @since 1.0.0
	 */
	public function cubcf7db_cf7form_single_datalist() {
		// Verify nonce before processing any data.
		check_ajax_referer( 'cubcf7db_nonce', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( 'Insufficient permissions.' );
		}

		if ( ! isset( $_POST['id'] ) ) {
			wp_send_json_error( 'ID not provided' );
		}

		global $wpdb;

		$cfdb       = apply_filters( 'cub_cf7db_database', $wpdb );
		$id         = absint( $_POST['id'] );
		$table_name = esc_sql( $cfdb->prefix . 'cub_cf7db_forms' );

		$from_date = isset( $_POST['from_date'] ) ? sanitize_text_field( wp_unslash( $_POST['from_date'] ) ) : '';
		$to_date   = isset( $_POST['to_date'] ) ? sanitize_text_field( wp_unslash( $_POST['to_date'] ) ) : '';

		$query      = "SELECT form_id, form_post_id, form_value, form_status FROM {$table_name} WHERE form_post_id = %d";
		$query_args = array( $id );

		if ( ! empty( $from_date ) && ! empty( $to_date ) ) {
			$query       .= ' AND form_date >= %s AND form_date <= %s';
			$query_args[] = $from_date . ' 00:00:00';
			$query_args[] = $to_date . ' 23:59:59';
		} elseif ( ! empty( $from_date ) ) {
			$query       .= ' AND form_date >= %s';
			$query_args[] = $from_date . ' 00:00:00';
		} elseif ( ! empty( $to_date ) ) {
			$query       .= ' AND form_date <= %s';
			$query_args[] = $to_date . ' 23:59:59';
		}

		// phpcs:ignore WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare, WordPress.DB.PreparedSQL.NotPrepared
		$prepared_query = $cfdb->prepare( $query, ...$query_args );

		$results = $cfdb->get_results( $prepared_query, ARRAY_A );

		if ( empty( $results ) ) {
			wp_send_json_error( 'No data found for the provided ID' );
		}

		$formatted_results = array();
		$columns           = array();
		$column_titles     = array();

		foreach ( $results as $result ) {
			if ( ! isset( $result['form_value'] ) ) {
				continue;
			}

			$form_values = maybe_unserialize( $result['form_value'] );
			if ( ! is_array( $form_values ) ) {
				continue;
			}

			$formatted_result = array();
			foreach ( $form_values as $key => $value ) {
				if ( 'cub_cf7db_status' === $key ) {
					continue;
				}
				$formatted_result[ $key ] = $value;
				if ( ! in_array( $key, $columns, true ) ) {
					$columns[]             = $key;
					$column_titles[ $key ] = self::cubcf7db_generate_user_friendly_column_title( $key );
				}
			}

			$formatted_result['form_id']     = $result['form_id'];
			$formatted_result['form_status'] = $result['form_status'];
			$formatted_results[]             = $formatted_result;
		}

		// Limit to the first 5 columns.
		$columns       = array_slice( $columns, 0, 5 );
		$column_titles = array_slice( $column_titles, 0, 5, true );

		// Ensure form_id and form_status are included.
		if ( ! in_array( 'form_id', $columns, true ) ) {
			$columns[]                = 'form_id';
			$column_titles['form_id'] = 'Form ID';
		}
		if ( ! in_array( 'form_status', $columns, true ) ) {
			$columns[]                    = 'form_status';
			$column_titles['form_status'] = 'Status';
		}

		// Remove extra keys from formatted results.
		$formatted_results = array_map(
			function( $row ) use ( $columns ) {
				return array_intersect_key( $row, array_flip( $columns ) );
			},
			$formatted_results
		);

		wp_send_json_success(
			array(
				'columns'       => $columns,
				'data'          => $formatted_results,
				'column_titles' => $column_titles,
			)
		);
	}

	/**
	 * Get a single Contact Form 7 form record detail.
	 *
	 * @since 1.0.0
	 * @param int $id The ID of the form record to retrieve.
	 * @return object|null The form record or null if not found or unauthorized.
	 */
	public function cubcf7db_cf7form_single_recorddetail( $id ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			return null;
		}

		global $wpdb;
		$result = null;

		if ( isset( $id ) && is_numeric( $id ) && $id > 0 ) {
			$cfdb       = apply_filters( 'cub_cf7db_database', $wpdb );
			$table_name = esc_sql( $cfdb->prefix . 'cub_cf7db_forms' );
			$query      = $cfdb->prepare( "SELECT * FROM {$table_name} WHERE form_id = %d", $id ); // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare
			$result     = $cfdb->get_row( $query );
		}

		return $result;
	}

	/**
	 * Mark a specific form record as read.
	 *
	 * @since 1.0.2
	 * @param int $id Form ID.
	 */
	public function cubcf7db_mark_as_read( $id ) {
		global $wpdb;
		$cfdb       = apply_filters( 'cub_cf7db_database', $wpdb );
		$table_name = esc_sql( $cfdb->prefix . 'cub_cf7db_forms' );
		$cfdb->update(
			$table_name,
			array( 'form_status' => 'read' ),
			array( 'form_id' => $id ),
			array( '%s' ),
			array( '%d' )
		);
	}

	/**
	 * Generate a user-friendly column title from a column key.
	 *
	 * @since 1.0.0
	 * @param string $key The original column key.
	 * @return string The user-friendly column title.
	 */
	public static function cubcf7db_generate_user_friendly_column_title( $key ) {
		$key_val = str_replace( array( 'your-', 'cfdb7_file' ), '', $key );
		$key_val = preg_replace( '/\d+$/', '', $key_val );
		$key_val = preg_replace( '/\d/', '', $key_val );
		$key_val = str_replace( array( '_', '-' ), ' ', $key_val );
		return ucwords( trim( $key_val ) );
	}

	/**
	 * AJAX handler - Delete a single CF7 form record.
	 *
	 * @since 1.0.0
	 */
	public function cubcf7db_delete_record() {
		// Verify nonce before processing any data.
		check_ajax_referer( 'cubcf7db_nonce', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( array( 'message' => 'You do not have sufficient permissions to delete this record.' ) );
		}

		$id = isset( $_POST['form_id'] ) ? absint( $_POST['form_id'] ) : 0;

		if ( ! $id ) {
			wp_send_json_error( array( 'message' => 'Invalid record ID.' ) );
		}

		global $wpdb;
		$table_name = esc_sql( $wpdb->prefix . 'cub_cf7db_forms' );

		$deleted = $wpdb->query( $wpdb->prepare( "DELETE FROM {$table_name} WHERE form_id = %d", $id ) ); // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare

		if ( false !== $deleted ) {
			wp_send_json_success( array( 'message' => 'Record deleted successfully.' ) );
		} else {
			wp_send_json_error( array( 'message' => 'Error deleting record.' ) );
		}
	}

	/**
	 * AJAX handler - Delete multiple CF7 form records in bulk.
	 *
	 * @since 1.0.2
	 */
	public function cubcf7db_bulk_delete_records() {
		// Verify nonce before processing any data.
		check_ajax_referer( 'cubcf7db_nonce', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( array( 'message' => 'You do not have sufficient permissions to delete records.' ) );
		}

		if ( ! isset( $_POST['form_ids'] ) || ! is_array( $_POST['form_ids'] ) ) {
			wp_send_json_error( array( 'message' => 'No records selected.' ) );
		}

		$ids = array_map( 'absint', $_POST['form_ids'] );
		$ids = array_filter( $ids ); // Remove zeros.

		if ( empty( $ids ) ) {
			wp_send_json_error( array( 'message' => 'Invalid record IDs.' ) );
		}

		global $wpdb;
		$table_name = esc_sql( $wpdb->prefix . 'cub_cf7db_forms' );

		$placeholders = implode( ',', array_fill( 0, count( $ids ), '%d' ) );
		$query        = "DELETE FROM {$table_name} WHERE form_id IN ($placeholders)"; // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare

		$deleted = $wpdb->query( $wpdb->prepare( $query, $ids ) ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared

		if ( false !== $deleted ) {
			wp_send_json_success( array( 'message' => sprintf( '%d records deleted successfully.', $deleted ) ) );
		} else {
			wp_send_json_error( array( 'message' => 'Error deleting records.' ) );
		}
	}

	/**
	 * Export all form data as CSV.
	 *
	 * @since 1.0.2
	 */
	public function cubcf7db_export_all() {
		if ( ! current_user_can( 'manage_options' ) || ! isset( $_POST['cubcf7db_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['cubcf7db_nonce'] ) ), 'cubcf7db_export_nonce' ) ) {
			wp_die( 'Unauthorized' );
		}

		global $wpdb;
		$cfdb       = apply_filters( 'cub_cf7db_database', $wpdb );
		$table_name = esc_sql( $cfdb->prefix . 'cub_cf7db_forms' );

		$results = $cfdb->get_results( "SELECT form_id, form_post_id, form_value, form_date FROM {$table_name} ORDER BY form_post_id, form_date DESC", ARRAY_A );

		$all_keys          = array();
		$formatted_results = array();

		foreach ( $results as $row ) {
			$form_values = maybe_unserialize( $row['form_value'] );
			if ( ! is_array( $form_values ) ) {
				continue;
			}

			$formatted_row = array(
				'Entry ID'  => $row['form_id'],
				'Form ID'   => $row['form_post_id'],
				'Form Name' => get_the_title( $row['form_post_id'] ),
				'Date'      => $row['form_date'],
			);

			foreach ( $form_values as $key => $value ) {
				if ( 'cub_cf7db_status' === $key ) {
					continue;
				}
				$friendly_key                  = self::cubcf7db_generate_user_friendly_column_title( $key );
				$all_keys[ $friendly_key ]     = $friendly_key;
				$formatted_row[ $friendly_key ] = $value;
			}
			$formatted_results[] = $formatted_row;
		}

		$headers = array( 'Entry ID', 'Form ID', 'Form Name', 'Date' );
		foreach ( $all_keys as $key ) {
			$headers[] = $key;
		}

		header( 'Content-Type: text/csv; charset=utf-8' );
		header( 'Content-Disposition: attachment; filename=all-cf7-submissions-' . gmdate( 'Y-m-d' ) . '.csv' );
		
		$output = fopen( 'php://output', 'w' );
		fputcsv( $output, $headers );

		foreach ( $formatted_results as $row ) {
			$csv_row = array();
			foreach ( $headers as $h ) {
				$csv_row[] = isset( $row[ $h ] ) ? $row[ $h ] : '';
			}
			fputcsv( $output, $csv_row );
		}
		
		fclose( $output );
		exit;
	}

	/**
	 * Daily cron action to delete old entries based on Data Retention settings.
	 *
	 * @since 1.0.2
	 */
	public function cubcf7db_daily_cleanup_action() {
		$data_retention = get_option( 'cubcf7db_data_retention', 'never' );
		if ( 'never' === $data_retention || empty( $data_retention ) ) {
			return;
		}

		$days = (int) $data_retention;
		if ( $days <= 0 ) {
			return;
		}

		global $wpdb;
		$cfdb       = apply_filters( 'cub_cf7db_database', $wpdb );
		$table_name = esc_sql( $cfdb->prefix . 'cub_cf7db_forms' );

		$query       = $cfdb->prepare( "SELECT form_id, form_value FROM {$table_name} WHERE form_date < DATE_SUB(NOW(), INTERVAL %d DAY)", $days );
		$old_records = $cfdb->get_results( $query );

		if ( ! empty( $old_records ) ) {
			if ( ! function_exists( 'WP_Filesystem' ) ) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
			}
			WP_Filesystem();
			global $wp_filesystem;
			$upload_dir = wp_upload_dir();

			$ids_to_delete = array();
			foreach ( $old_records as $record ) {
				$ids_to_delete[] = $record->form_id;

				$form_values = maybe_unserialize( $record->form_value );
				if ( is_array( $form_values ) ) {
					foreach ( $form_values as $key => $value ) {
						if ( strpos( $key, 'cub_cf7db_file' ) !== false && ! empty( $value ) ) {
							$file_path = $upload_dir['basedir'] . '/cub_cf7db_uploads/' . $value;
							if ( $wp_filesystem->exists( $file_path ) ) {
								$wp_filesystem->delete( $file_path );
							}
						}
					}
				}
			}

			$placeholders = implode( ',', array_fill( 0, count( $ids_to_delete ), '%d' ) );
			$del_query    = "DELETE FROM {$table_name} WHERE form_id IN ($placeholders)"; // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare
			$cfdb->query( $cfdb->prepare( $del_query, $ids_to_delete ) ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		}
	}

	/**
	 * Add dashboard widget for quick stats.
	 *
	 * @since 1.0.2
	 */
	public function cubcf7db_add_dashboard_widgets() {
		if ( current_user_can( 'manage_options' ) ) {
			wp_add_dashboard_widget(
				'cubcf7db_dashboard_widget',
				__( 'Contact Form 7 Database', 'cub-cf7db' ),
				array( $this, 'cubcf7db_dashboard_widget_render' )
			);
		}
	}

	/**
	 * Render dashboard widget.
	 *
	 * @since 1.0.2
	 */
	public function cubcf7db_dashboard_widget_render() {
		global $wpdb;
		$cfdb       = apply_filters( 'cub_cf7db_database', $wpdb );
		$table_name = esc_sql( $cfdb->prefix . 'cub_cf7db_forms' );

		$total_submissions = (int) $cfdb->get_var( "SELECT COUNT(*) FROM {$table_name}" );
		$unread_count      = $this->cubcf7db_get_unread_count();
		
		echo '<p>' . sprintf( __( 'Total Submissions: <strong>%d</strong>', 'cub-cf7db' ), $total_submissions ) . '</p>';
		echo '<p>' . sprintf( __( 'Unread Submissions: <strong>%d</strong>', 'cub-cf7db' ), $unread_count ) . '</p>';
		echo '<a href="' . esc_url( admin_url( 'admin.php?page=cub_cf7db-page' ) ) . '" class="button button-primary">' . __( 'View Submissions', 'cub-cf7db' ) . '</a>';
	}

	/**
	 * Register personal data eraser for GDPR compliance.
	 *
	 * @since 1.0.2
	 * @param array $erasers Registered erasers.
	 * @return array
	 */
	public function cubcf7db_register_privacy_erasers( $erasers ) {
		$erasers['cub-cf7db'] = array(
			'eraser_friendly_name' => __( 'Contact Form 7 Database', 'cub-cf7db' ),
			'callback'             => array( $this, 'cubcf7db_privacy_eraser_callback' ),
		);
		return $erasers;
	}

	/**
	 * Personal data eraser callback.
	 *
	 * @since 1.0.2
	 * @param string $email_address User email address.
	 * @param int    $page          Page number.
	 * @return array
	 */
	public function cubcf7db_privacy_eraser_callback( $email_address, $page = 1 ) {
		if ( empty( $email_address ) ) {
			return array(
				'items_removed'  => false,
				'items_retained' => false,
				'messages'       => array(),
				'done'           => true,
			);
		}

		global $wpdb;
		$cfdb       = apply_filters( 'cub_cf7db_database', $wpdb );
		$table_name = esc_sql( $cfdb->prefix . 'cub_cf7db_forms' );

		$query   = $cfdb->prepare( "SELECT form_id, form_value FROM {$table_name} WHERE form_value LIKE %s", '%' . $cfdb->esc_like( $email_address ) . '%' );
		$records = $cfdb->get_results( $query );

		$items_removed = false;

		if ( ! empty( $records ) ) {
			if ( ! function_exists( 'WP_Filesystem' ) ) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
			}
			WP_Filesystem();
			global $wp_filesystem;
			$upload_dir = wp_upload_dir();

			$ids_to_delete = array();
			foreach ( $records as $record ) {
				$ids_to_delete[] = $record->form_id;

				$form_values = maybe_unserialize( $record->form_value );
				if ( is_array( $form_values ) ) {
					foreach ( $form_values as $key => $value ) {
						if ( strpos( $key, 'cub_cf7db_file' ) !== false && ! empty( $value ) ) {
							$file_path = $upload_dir['basedir'] . '/cub_cf7db_uploads/' . $value;
							if ( $wp_filesystem->exists( $file_path ) ) {
								$wp_filesystem->delete( $file_path );
							}
						}
					}
				}
			}

			if ( ! empty( $ids_to_delete ) ) {
				$placeholders = implode( ',', array_fill( 0, count( $ids_to_delete ), '%d' ) );
				$del_query    = "DELETE FROM {$table_name} WHERE form_id IN ($placeholders)"; // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare
				$cfdb->query( $cfdb->prepare( $del_query, $ids_to_delete ) ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
				
				$items_removed = true;
			}
		}

		return array(
			'items_removed'  => $items_removed,
			'items_retained' => false,
			'messages'       => array(),
			'done'           => true,
		);
	}

	/**
	 * AJAX handler - Save admin note on a submission.
	 *
	 * @since 1.0.2
	 */
	public function cubcf7db_save_note() {
		check_ajax_referer( 'cubcf7db_nonce', 'nonce' );
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error();
		}

		$id   = isset( $_POST['form_id'] ) ? absint( $_POST['form_id'] ) : 0;
		$note = isset( $_POST['note'] ) ? sanitize_textarea_field( wp_unslash( $_POST['note'] ) ) : '';

		if ( ! $id ) {
			wp_send_json_error();
		}

		global $wpdb;
		$cfdb       = apply_filters( 'cub_cf7db_database', $wpdb );
		$table_name = esc_sql( $cfdb->prefix . 'cub_cf7db_forms' );

		$record = $cfdb->get_row( $cfdb->prepare( "SELECT form_value FROM {$table_name} WHERE form_id = %d", $id ) );
		if ( $record ) {
			$form_values = maybe_unserialize( $record->form_value );
			if ( is_array( $form_values ) ) {
				$form_values['cub_cf7db_admin_notes'] = $note;
				$cfdb->update(
					$table_name,
					array( 'form_value' => maybe_serialize( $form_values ) ),
					array( 'form_id' => $id ),
					array( '%s' ),
					array( '%d' )
				);
				wp_send_json_success();
			}
		}
		wp_send_json_error();
	}
}