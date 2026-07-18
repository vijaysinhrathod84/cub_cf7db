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

		$form_post_id = $form_tag->id();
		$form_value   = maybe_serialize( $form_data );
		$form_date    = current_time( 'Y-m-d H:i:s' );
		$form_user_id = get_current_user_id();
		$form_status  = 'pending';

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
	}

	/**
	 * Add the CF7DB menu page to the admin menu.
	 *
	 * @since 1.0.0
	 */
	public function cubcf7db_add_menu_page() {
		add_menu_page(
			__( 'CF7DB', 'cub-cf7db' ),
			__( 'CF7DB', 'cub-cf7db' ),
			'manage_options',
			'cub_cf7db-page',
			array( $this, 'cubcf7db_menu_callback' ),
			'dashicons-feedback',
			30
		);
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

		$results = $cfdb->get_results(
			$cfdb->prepare( "SELECT form_id, form_post_id, form_value FROM {$table_name} WHERE form_post_id = %d", $id ), // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare
			ARRAY_A
		);

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

			$formatted_result['form_id'] = $result['form_id'];
			$formatted_results[]         = $formatted_result;
		}

		// Limit to the first 5 columns.
		$columns       = array_slice( $columns, 0, 5 );
		$column_titles = array_slice( $column_titles, 0, 5, true );

		// Ensure form_id is included.
		if ( ! in_array( 'form_id', $columns, true ) ) {
			$columns[]                = 'form_id';
			$column_titles['form_id'] = 'Form ID';
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
}