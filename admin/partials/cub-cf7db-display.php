<?php
/**
 * Provide an admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.cubsys.com
 * @since      1.0.0
 *
 * @package    Cub_cf7db
 * @subpackage Cub_cf7db/admin/partials
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
// Start output buffering to prevent headers already sent issue.
ob_start();

// Fix #17: Instantiate admin class directly — avoids re-running all plugin hooks via new Cub_Cf7db().
$cub_cf7db_admin = new Cub_Cf7db_Admin( 'cub_cf7db', CUB_CF7DB_VERSION );
$action_param    = isset( $_GET['action'] ) ? sanitize_text_field( wp_unslash( $_GET['action'] ) ) : null;
$formid          = isset( $_GET['formid'] ) ? absint( $_GET['formid'] ) : null;

if ( $action_param && 'view' === $action_param && $formid ) {
	// Get and sanitize the form id.
	$form_id = absint( $_GET['formid'] );

	// Get the single record detail.
	$singlerecord = $cub_cf7db_admin->cubcf7db_cf7form_single_recorddetail( $form_id );

	// If record exists.
	if ( $singlerecord ) {
		// Mark as read.
		if ( 'unread' === $singlerecord->form_status ) {
			$cub_cf7db_admin->cubcf7db_mark_as_read( $form_id );
		}
		$formdata = maybe_unserialize( $singlerecord->form_value ); ?>
<div class="wrapper-main">
    <div class="custome-container">
        <div class="page-title add-user">
            <h1><?php echo esc_html( get_the_title( $singlerecord->form_post_id ) ) . ' ' . esc_html__( 'Detail', 'cub-cf7db' ); ?>
            </h1>
            <ul class="breadcrumbs">
                <li><a
                        href="<?php echo esc_url( admin_url( 'admin.php?page=cub_cf7db-page' ) ); ?>"><?php esc_html_e( 'Contact Forms 7 Data', 'cub-cf7db' ); ?></a>
                </li>
                <li><?php echo esc_html( get_the_title( $singlerecord->form_post_id ) ) . ' ' . esc_html__( 'Detail', 'cub-cf7db' ); ?>
                </li>
            </ul>
        </div>

        <div class="page-inner">
            <form action="" class="view-inner">
                <div class="row">
                    <?php
						if ( isset( $formdata ) ) {
							foreach ( $formdata as $key => $data ) {
								if ( 'cub_cf7db_status' !== $key ) {
									$formtitle = $cub_cf7db_admin->cubcf7db_generate_user_friendly_column_title( $key );
									?>
                    <div class="col-sm-6 col-12">
                        <div class="form-group" style="padding-top:0;">
                            <label for="" class="view-label"><?php echo esc_html( $formtitle ); ?>:</label>
                            <?php if ( strpos( $key, 'cub_cf7db_file' ) !== false ) : ?>
                            	<?php
                            	$upload_dir = wp_upload_dir();
                            	$file_url   = $upload_dir['baseurl'] . '/cub_cf7db_uploads/' . $data;
                            	?>
                            	<h2 class="view-data"><a href="<?php echo esc_url( $file_url ); ?>" download><?php echo esc_html( $data ); ?></a></h2>
                            <?php else : ?>
                            	<h2 class="view-data"><?php echo esc_html( $data ); ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
								}
							}
						} else {
							?>
                    <div class="col-12">
                        <p><?php echo esc_html_e( 'No data available.', 'cub-cf7db' ); ?></p>
                    </div>
                    <?php
                        }
                        ?>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="cubcf7db_admin_notes" style="font-weight: 600; font-size: 18px; margin-bottom: 10px; display: block;"><?php esc_html_e( 'Admin Notes', 'cub-cf7db' ); ?></label>
                            <textarea id="cubcf7db_admin_notes" class="form-control" rows="4" style="width: 100%; border: 1px solid #ccc; padding: 10px; border-radius: 4px;"><?php echo esc_textarea( isset( $formdata['cub_cf7db_admin_notes'] ) ? $formdata['cub_cf7db_admin_notes'] : '' ); ?></textarea>
                            <button id="cubcf7db_save_note_btn" class="submit-button mt-3" data-id="<?php echo esc_attr( $form_id ); ?>" style="padding: 10px 20px;"><i class="fa-solid fa-save"></i> <?php esc_html_e( 'Save Note', 'cub-cf7db' ); ?></button>
                            <span id="cubcf7db_note_status" class="ml-2" style="display:none; color: green; font-weight: bold; margin-left: 10px;"><i class="fa fa-check"></i> <?php esc_html_e( 'Saved!', 'cub-cf7db' ); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <a href="<?php echo esc_url( admin_url( 'admin.php?page=cub_cf7db-page' ) ); ?>"
                            class="submit-button" style="background: #6c757d; border-color: #6c757d;"><i
                                class="fa-solid fa-arrow-left-long"></i> <?php esc_html_e( 'Back', 'cub-cf7db' ); ?></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
	}
} else {
	?>
<div class="wrapper-main">
    <div class="custome-container">
        <div class="page-title">
            <h1><?php esc_html_e( 'Contact Forms 7 Data', 'cub-cf7db' ); ?></h1>
        </div>

        <div class="page-inner">
            <div class="row align-items-end mb-4">
                <div class="col-sm-3 col-12">
                    <div class="form-group mb-0">
                        <label for="cf7form_list_dropdown"><?php esc_html_e( 'Select Form', 'cub-cf7db' ); ?></label>
                        <select id="cf7form_list_dropdown" class="cf7form_list_dropdown js-states form-control">
                            <?php
						$cf7_form_list = $cub_cf7db_admin->cubcf7db_cf7form_list();
						if ( $cf7_form_list ) {
							foreach ( $cf7_form_list as $form ) {
								echo '<option value="' . esc_attr( $form->ID ) . '">' . esc_html( $form->post_title ) . '</option>';
							}
						}
						?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2 col-12">
                    <div class="form-group mb-0">
                        <label for="cf7form_filter_from"><?php esc_html_e( 'From Date', 'cub-cf7db' ); ?></label>
                        <input type="date" id="cf7form_filter_from" class="form-control" placeholder="<?php esc_attr_e( 'From Date', 'cub-cf7db' ); ?>">
                    </div>
                </div>
                <div class="col-sm-2 col-12">
                    <div class="form-group mb-0">
                        <label for="cf7form_filter_to"><?php esc_html_e( 'To Date', 'cub-cf7db' ); ?></label>
                        <input type="date" id="cf7form_filter_to" class="form-control" placeholder="<?php esc_attr_e( 'To Date', 'cub-cf7db' ); ?>">
                    </div>
                </div>
                <div class="col-sm-2 col-12">
                    <div class="form-group mb-0">
                        <button id="cf7form_filter_btn" class="submit-button w-100" style="padding: 10px; margin-top: 25px;"><i class="fa-solid fa-filter"></i> <?php esc_html_e( 'Filter', 'cub-cf7db' ); ?></button>
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="w-100 m-0">
                        <input type="hidden" name="action" value="cubcf7db_export_all">
                        <?php wp_nonce_field( 'cubcf7db_export_nonce', 'cubcf7db_nonce' ); ?>
                        <button type="submit" class="submit-button w-100" style="padding: 10px; margin-top: 25px; background: #28a745; border-color: #28a745;"><i class="fa-solid fa-download"></i> <?php esc_html_e( 'Export All Data', 'cub-cf7db' ); ?></button>
                    </form>
                </div>
            </div>
            <table id="cubcf7form_listtable" class="table table-striped table-bordered display nowrap"
                style="width:100%">
                <thead>
                    <tr></tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>
<?php
}
?>
<div id="toastContainer" aria-live="polite" aria-atomic="true"
    style="position: fixed; top: 20px; right: 20px; z-index: 1000;"></div>
<div class="modal fade delete-popup" id="cub_cf7db_delete_data_popup" tabindex="-1" role="dialog"
    aria-labelledby="cub_cf7db_delete_data_popup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-times-circle" aria-hidden="true"></i>
            </button>

            <div class="modal-body">
                <div class="delete-img">
                    <i class="fa fa-trash fa-5x" aria-hidden="true"></i>
                </div>
                <h3><?php echo esc_html_e( 'Are you sure?', 'cub-cf7db' ); ?></h3>
                <div class="sort-msg">
                    <p><?php echo esc_html_e( 'Do you really want to delete these records? This process cannot be undone.', 'cub-cf7db' ); ?>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn cancel"
                    data-dismiss="modal"><?php echo esc_html_e( 'Cancel', 'cub-cf7db' ); ?></button>
                <a href="#" id="cub_cf7db_popup_delete_button" data-form-id="" type="button"
                    class="btn delete"><?php echo esc_html_e( 'Delete', 'cub-cf7db' ); ?></a>
            </div>
        </div>
    </div>
</div>
<?php ob_end_flush(); ?>