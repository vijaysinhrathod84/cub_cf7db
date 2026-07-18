/**
 * All of the code for your admin-facing JavaScript source
 * should reside in this file.
 *
 * Note: It has been assumed you will write jQuery code here, so the
 * $ function reference has been prepared for usage within the scope
 * of this function.
 *
 * This enables you to define handlers, for when the DOM is ready:
 *
 * $(function() {
 *
 * });
 *
 * When the window is loaded:
 *
 * $( window ).load(function() {
 *
 * });
 *
 * ...and/or other possibilities.
 *
 * Ideally, it is not considered best practise to attach more than a
 * single DOM-ready or window-load handler for a particular page.
 * Although scripts in the WordPress core, Plugins and Themes may be
 * practising this, we should strive to set a better cubcf7form_listtable in our own work.
 *
 * @package Cub_CF7DB
 */

( function ( $ ) {
	'use strict';
	jQuery( '#cf7form_list_dropdown' )
	.select2(
		{
			placeholder: 'Select Contact Form 7',
			width: "100%"
		}
	);

	var table;

	function fetchData( selectedId ) {
		var fromDate = $('#cf7form_filter_from').val();
		var toDate   = $('#cf7form_filter_to').val();

		$.ajax(
			{
				url: ajax_object.ajax_url,
				type: 'POST',
				data: {
					action: 'cubcf7db_cf7form_single_datalist',
					id: selectedId, // Pass selected ID.
					from_date: fromDate,
					to_date: toDate,
					nonce: ajax_object.nonce  // Fix #9: Send nonce for AJAX security verification.
				},
				success: function (response) {
					if ( response.success ) {
						var columns = response.data.columns.filter(
							function ( column ) {
								return column !== 'cub_cf7db_status' && column !== 'form_id' && column !== 'form_status'; // Exclude columns.
							}
						);
						var data         = response.data.data;
						var columnTitles = response.data.column_titles;

						// Prepare the column definitions for DataTable.
						var columnDefs = columns.map(
							function ( column ) {
								return {
									title: columnTitles[column] || column, // Use friendly name if exists, else use original name.
									data: column
								};
							}
						);

						// Add checkbox column at the beginning for bulk delete.
						columnDefs.unshift(
							{
								title: '<input type="checkbox" id="select-all">',
								data: null,
								defaultContent: '<input type="checkbox" class="row-checkbox">',
								orderable: false,
								searchable: false,
								className: 'select-checkbox'
							}
						);

						// Add the action column.
						columnDefs.push(
							{
								title: 'Actions',
								data: null,
								defaultContent: '<button class="view-btn btn btn-info" data-id=""><i class="fa-solid fa-eye"></i></button> <button class="delete-btn btn btn-danger" data-toggle="modal" data-target="#cub_cf7db_delete_data_popup" data-id=""><i class="fa-solid fa-trash"></i></button>'
							}
						);

						// Prepare the data for DataTable.
						var formattedData = data.map(
							function ( row ) {
								var formattedRow = {};
								columns.forEach(
									function ( column ) {
										formattedRow[column] = row[column] || ''; // Default to empty string if key is not present.
									}
								);
								formattedRow['form_id']     = row['form_id']; // Ensure form_id is included for internal use.
								formattedRow['form_status'] = row['form_status']; // Pass status for styling.
								return formattedRow;
							}
						);

						// Destroy existing DataTable if it exists.
						if ( $.fn.DataTable.isDataTable( '#cubcf7form_listtable' ) ) {
							$( '#cubcf7form_listtable' ).DataTable().clear().destroy();
						}

						// Clear the table header and body before reinitializing.
						$( '#cubcf7form_listtable thead' ).empty();
						$( '#cubcf7form_listtable tbody' ).empty();

						// Update the table headers.
						var headerHtml = '<tr>';
						headerHtml += '<th class="select-checkbox"><input type="checkbox" id="select-all"></th>';
						columns.forEach(
							function (column) {
									headerHtml += '<th>' + (columnTitles[column] || column) + '</th>';
							}
						);
						headerHtml += '<th>Actions</th>'; // Add the action column header.
						headerHtml += '</tr>';
						$( '#cubcf7form_listtable thead' ).html( headerHtml );

						// Initialize the DataTable.
						table = $( '#cubcf7form_listtable' ).DataTable(
							{
								processing: true,
								data: formattedData,
								columns: columnDefs,
								responsive: true,
								rowReorder: {
									selector: 'td:nth-child(2)'
								},
								createdRow: function (row, data, dataIndex) {
									// Ensure form_id is available in data.
									if ( data.form_id !== undefined ) {
										$( row ).find( '.view-btn' ).attr( 'data-id', data.form_id );
										$( row ).find( '.delete-btn' ).attr( 'data-id', data.form_id );
									}
									// Style unread rows.
									if ( data.form_status === 'unread' ) {
										$( row ).css( 'font-weight', 'bold' );
									}
								},
								layout: {
									topStart: {
										buttons: [
											{
												text: 'Bulk Delete',
												className: 'btn btn-danger btn-bulk-delete',
												action: function ( e, dt, node, config ) {
													var selectedIds = [];
													$('.row-checkbox:checked').each(function() {
														var rowData = table.row( $(this).closest('tr') ).data();
														if (rowData && rowData.form_id) {
															selectedIds.push(rowData.form_id);
														}
													});
													if (selectedIds.length === 0) {
														showToast('Please select at least one record to delete.', 'warning');
														return;
													}
													if (confirm('Are you sure you want to delete ' + selectedIds.length + ' records?')) {
														$.ajax({
															url: ajax_object.ajax_url,
															type: 'POST',
															data: {
																action: 'cubcf7db_bulk_delete_records',
																form_ids: selectedIds,
																nonce: ajax_object.nonce
															},
															success: function (response) {
																if (response.success) {
																	showToast(response.data.message, 'success');
																	fetchData( $('#cf7form_list_dropdown').val() );
																} else {
																	showToast(response.data.message, 'danger');
																}
															},
															error: function() {
																showToast('Error deleting records.', 'danger');
															}
														});
													}
												}
											},
											{
												extend: 'csv',
												title: 'Contact Forms 7 Data',
												exportOptions: {
													columns: ':not(:last-child)' // Exclude the last column (Actions).
												}
											},
											{
												extend: 'excel',
												title: 'Contact Forms 7 Data',
												exportOptions: {
													columns: ':not(:last-child)' // Exclude the last column (Actions).
												}
											},
											{
												extend: 'pdf',
												title: 'Contact Forms 7 Data', // Set custom title for PDF.
												exportOptions: {
													columns: ':not(:last-child)' // Exclude the last column (Actions).
												}
											},
											{
												extend: 'print',
												title: 'Contact Forms 7 Data',
												exportOptions: {
													columns: ':not(:last-child)' // Exclude the last column (Actions).
												}
											}
										]
									}
								}
							}
						);

						// Add click event handlers for the buttons.
						$( '#cubcf7form_listtable tbody' )
							.on(
								'click',
								'.view-btn',
								function () {
									var formId 			 = $( this ).data( 'id' );
									window.location.href = 'admin.php?page=cub_cf7db-page&action=view&formid=' + formId;
								}
							);

						$( '#cubcf7form_listtable tbody' )
							.on(
								'click',
								'.delete-btn',
								function () {
									var formId    = $( this ).data( 'id' );
									$('#cub_cf7db_popup_delete_button').data('form-id', formId);
									$('#cub_cf7db_popup_delete_button').data('row', $(this).closest('tr'));
								}
							);

						// Handle select all checkbox.
						$( '#cubcf7form_listtable thead' )
							.on('change', '#select-all', function() {
								$('.row-checkbox').prop('checked', this.checked);
							});
					} else {
						displayNoDataMessage();
					}
				},
				error: function (xhr, status, error) {
					displayNoDataMessage();
				}
			}
		);
	}

	$( '#cub_cf7db_popup_delete_button' ).on( 'click', function () {
		var formId = $(this).data('form-id');
		var row = $(this).data('row');

		// Send AJAX request to delete the data
		$.ajax({
			url: ajax_object.ajax_url,
			type: 'POST',
			data: {
				action: 'cubcf7db_delete_record',
				form_id: formId,
				nonce: ajax_object.nonce
			},
			success: function (response) {
				if (response.success) {
					showToast(response.data.message, 'danger');
					// Optionally, refresh data or perform other actions.
					table.row(row).remove().draw();
				} else {
					showToast(response.data.message, 'danger');
				}
			},
			error: function (xhr, status, error) {
				showToast('Error deleting record.', 'danger');
			}
		});
	
		// Hide the Bootstrap modal after deletion.
		$('#cub_cf7db_delete_data_popup').modal('hide');
	});

	// Function to display "No data found" message.
	function displayNoDataMessage() {
		if ($.fn.DataTable.isDataTable( '#cubcf7form_listtable' )) {
			$( '#cubcf7form_listtable' ).DataTable().clear().destroy();
		}

		// Clear the table header and body before reinitializing.
		$( '#cubcf7form_listtable thead' ).empty();
		$( '#cubcf7form_listtable tbody' ).empty();

		// Update the table headers with a single empty header.
		var headerHtml = '<tr><th>No data found</th></tr>';
		$( '#cubcf7form_listtable thead' ).html( headerHtml );

		// Add a row to the body indicating no data.
		var bodyHtml = '<tr><td>No data found</td></tr>';
		$( '#cubcf7form_listtable tbody' ).html( bodyHtml );
	}

	// Bind change event to the dropdown.
	$( '#cf7form_list_dropdown' ).change(
		function () {
			var selectedId = $( this ).val();
			fetchData( selectedId );
		}
	);

	// Bind click event to the filter button.
	$( '#cf7form_filter_btn' ).on( 'click', function ( e ) {
		e.preventDefault();
		var selectedId = $( '#cf7form_list_dropdown' ).val();
		fetchData( selectedId );
	});

	// Fetch data for the default dropdown value on page load.
	var defaultId = $( '#cf7form_list_dropdown' ).val();
	fetchData( defaultId );

	function showToast( message, type ) {
		type = type || 'info'; // IE-safe default parameter fallback.
		var toastElement = $('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000"></div>');
		toastElement.addClass('bg-' + type); // Bootstrap background color class.
		toastElement.text(message);
	
		$('#toastContainer').append(toastElement);
	
		// Bootstrap's toast initialization.
		var toast = new bootstrap.Toast(toastElement[0]);
		toast.show();
	}

	// Handle Save Note button click.
	$('#cubcf7db_save_note_btn').on('click', function(e) {
		e.preventDefault();
		var btn = $(this);
		var formId = btn.data('id');
		var note = $('#cubcf7db_admin_notes').val();

		$.ajax({
			url: ajax_object.ajax_url,
			type: 'POST',
			data: {
				action: 'cubcf7db_save_note',
				form_id: formId,
				note: note,
				nonce: ajax_object.nonce
			},
			success: function(response) {
				if (response.success) {
					$('#cubcf7db_note_status').fadeIn().delay(2000).fadeOut();
				} else {
					showToast('Error saving note.', 'danger');
				}
			},
			error: function() {
				showToast('Error saving note.', 'danger');
			}
		});
	});
})( jQuery );
