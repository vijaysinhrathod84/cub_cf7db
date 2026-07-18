<?php
/**
 * Provide an admin area view for the plugin settings
 *
 * @link       https://www.cubsys.com
 * @since      1.0.2
 *
 * @package    Cub_cf7db
 * @subpackage Cub_cf7db/admin/partials
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$cub_cf7db_admin = new Cub_Cf7db_Admin( 'cub_cf7db', CUB_CF7DB_VERSION );
$cf7_form_list   = $cub_cf7db_admin->cubcf7db_cf7form_list();
$tracked_forms   = get_option( 'cubcf7db_tracked_forms', array() );
if ( ! is_array( $tracked_forms ) ) {
	$tracked_forms = array();
}

$admin_notification = get_option( 'cubcf7db_admin_notification', 'no' );
$data_retention     = get_option( 'cubcf7db_data_retention', 'never' );
?>

<div class="wrapper-main">
    <div class="custome-container">
        <div class="page-title">
            <h1><?php esc_html_e( 'CF7DB Settings', 'cub-cf7db' ); ?></h1>
        </div>

        <div class="page-inner">
            <form method="post" action="options.php">
                <?php settings_fields( 'cubcf7db_settings_group' ); ?>
                <?php do_settings_sections( 'cubcf7db_settings_group' ); ?>
                
                <table class="form-table">
                    <!-- Track Specific Forms -->
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e( 'Tracked Forms', 'cub-cf7db' ); ?></th>
                        <td>
                            <p class="description mb-2"><?php esc_html_e( 'Select the forms you want to save to the database. If none are selected, all forms will be tracked by default.', 'cub-cf7db' ); ?></p>
                            <?php if ( $cf7_form_list ) : ?>
                                <div style="max-height: 200px; overflow-y: auto; border: 1px solid #ddd; padding: 10px; border-radius: 4px; background: #fff;">
                                <?php foreach ( $cf7_form_list as $form ) : ?>
                                    <label style="display: block; margin-bottom: 8px;">
                                        <input type="checkbox" name="cubcf7db_tracked_forms[]" value="<?php echo esc_attr( $form->ID ); ?>" <?php checked( in_array( (string) $form->ID, $tracked_forms, true ) ); ?> />
                                        <?php echo esc_html( $form->post_title ); ?>
                                    </label>
                                <?php endforeach; ?>
                                </div>
                            <?php else : ?>
                                <p><?php esc_html_e( 'No Contact Form 7 forms found.', 'cub-cf7db' ); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>

                    <!-- Admin Notification -->
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e( 'Admin Notification', 'cub-cf7db' ); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="cubcf7db_admin_notification" value="yes" <?php checked( $admin_notification, 'yes' ); ?> />
                                <?php esc_html_e( 'Send an email to the site admin when a new entry is saved to the database.', 'cub-cf7db' ); ?>
                            </label>
                        </td>
                    </tr>

                    <!-- Data Retention -->
                    <tr valign="top">
                        <th scope="row"><?php esc_html_e( 'Data Retention', 'cub-cf7db' ); ?></th>
                        <td>
                            <select name="cubcf7db_data_retention" id="cubcf7db_data_retention">
                                <option value="never" <?php selected( $data_retention, 'never' ); ?>><?php esc_html_e( 'Never delete', 'cub-cf7db' ); ?></option>
                                <option value="30" <?php selected( $data_retention, '30' ); ?>><?php esc_html_e( 'Older than 30 days', 'cub-cf7db' ); ?></option>
                                <option value="60" <?php selected( $data_retention, '60' ); ?>><?php esc_html_e( 'Older than 60 days', 'cub-cf7db' ); ?></option>
                                <option value="90" <?php selected( $data_retention, '90' ); ?>><?php esc_html_e( 'Older than 90 days', 'cub-cf7db' ); ?></option>
                                <option value="365" <?php selected( $data_retention, '365' ); ?>><?php esc_html_e( 'Older than 1 year', 'cub-cf7db' ); ?></option>
                            </select>
                            <p class="description mt-2"><?php esc_html_e( 'Automatically delete submissions (and their files) older than the selected time period to save database space. Runs daily via WP Cron.', 'cub-cf7db' ); ?></p>
                        </td>
                    </tr>
                </table>
                
                <?php submit_button(); ?>
            </form>
        </div>
    </div>
</div>
