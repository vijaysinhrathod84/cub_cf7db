=== CUB-CF7DB ===
Contributors: vijaysinhrathod84, cubsys
Donate link: https://rzp.io/l/WVmYWWWx
Tags: contact form 7, form submissions, data export, form data management, CF7 extension,
Requires at least: 5.0
Tested up to: 6.6
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

CUB - CF7DB: Save Contact Form 7 data to WordPress database. Manage, search, and export form entries easily in WP admin.

== Description ==

- **Save Form Submissions**: Automatically save Contact Form 7 submissions to your database.
- **Admin Interface**: Access and manage all form entries from a dedicated section in the WordPress admin area.
- **Search Functionality**: Easily search through form submissions to find specific entries.
- **Data Export**: Export form data to CSV for further analysis or reporting.
- **Form Analytics**: Gain insights into your form submissions with built-in analytics features.
- **Data Visualization**: Visualize your form data with intuitive charts and graphs.
- **Compatibility**: Seamlessly integrates with Contact Form 7.

== Installation ==

1. Upload the `cub-cf7db` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Configure the settings from the `CF7DB` menu in the WordPress admin area.

== Usage ==

1. After activation, navigate to the `CUB - CF7DB` section in the WordPress admin area.
2. View and manage your form submissions.
3. Use the search feature to find specific entries.
4. Export form data as needed for reporting or analysis.

== Frequently Asked Questions ==

= Does this plugin work with all versions of Contact Form 7? =

Yes, CUB - CF7DB is designed to work seamlessly with all recent versions of Contact Form 7.

= How can I export my form data? =

You can export your form data to a CSV, PDF, EXCEL, PRINT file from the plugin's admin interface.

=  Is there a limit to the number of form submissions I can store? =

There is no hard limit imposed by the plugin. However, storage limitations will depend on your hosting environment.

== Screenshots ==

1. **Select Form**  
   ![Select Form](screenshot-1.png)  
   *Select and manage form submissions from a dedicated section in the admin area.*

2. **List of Data for a Single Form**  
   ![List of Data for a Single Form](screenshot-2.png)  
   *View and easily export form data to CSV for further analysis.*

3. **View Detail of a Single Record**  
   ![View Detail of a Single Record](screenshot-3.png)  
   *Quickly find and review specific form submissions using the search feature.*

4. **Delete Specific Record**  
   ![Delete Specific Record](screenshot-4.png)  
   *Easily delete specific form submissions as needed.*


== Changelog ==

= 1.0.3 =
* Feature: Read/Unread Status badges for entries.
* Feature: Bulk Delete capabilities in the list view.
* Feature: File Download links directly in the entry detail page.
* Feature: Date Range Filtering for submissions.
* Feature: Export All Data button to download all forms at once.
* Feature: Settings page to selectively choose which forms to track.
* Feature: Admin Email Notification toggle for new database saves.
* Feature: Data Retention cleanup using WP Cron to delete old submissions.
* Feature: WordPress Dashboard Widget showing quick stats.
* Feature: GDPR Privacy Data Eraser hook for email data deletion.
* Feature: Admin Notes system for annotating individual submissions.

= 1.0.2 =
* Security: Added nonce verification to all AJAX handlers to prevent CSRF attacks.
* Security: Removed `nopriv` AJAX hooks — delete and data-fetch are admin-only operations.
* Bug fix: Fixed file upload handling to use CF7's submission API instead of raw `$_FILES`.
* Bug fix: Fixed duplicate `global $wp_filesystem` scope issue in form submission handler.
* Bug fix: Fixed `$uploaded_files` array being reset causing data loss.
* Bug fix: Fixed uninstall dropping wrong table (`cub_cf7db_entries` → `cub_cf7db_forms`).
* Bug fix: Fixed `DROP TABLE` SQL using `esc_sql()` instead of broken `prepare()` usage.
* Bug fix: Fixed text domain mismatch (`cub_cf7db` → `cub-cf7db`).
* Bug fix: Fixed upgrader hook running on every plugin/theme update instead of only this plugin.
* Bug fix: Fixed incorrect `@font-face` format declaration for Semibold font (ttf→truetype).
* Improvement: Added nonce to `wp_localize_script` and all JavaScript AJAX requests.
* Improvement: Fixed `$cfdb`/`$wpdb` inconsistency in data list AJAX handler.
* Improvement: Removed unnecessary public CSS/JS enqueue on front-end pages.
* Improvement: Removed redundant `new Cub_Cf7db()` instance inside admin display partial.
* Improvement: Removed `console.log()` debug statement from production JavaScript.
* Improvement: Fixed typo in Select2 placeholder: "Contect" → "Contact".

= 1.0.1 =
* Initial release of CUB - CF7DB.

== Upgrade Notice ==

= 1.0.0 =
* This is the initial release. Please ensure you have a recent backup of your site before installing.

== Upgrade Notice ==

If you need customization for this plugin or if you want to develop a new plugin or website, feel free to contact me. I offer professional WordPress development services tailored to your needs.

**Contact Information:**
- **Website:** [https://www.cubsys.com](https://www.cubsys.com)
- **Email:** [contact@cubsys.com](mailto:contact@cubsys.com)
