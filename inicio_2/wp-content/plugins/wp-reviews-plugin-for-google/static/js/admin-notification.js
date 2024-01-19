jQuery(document).ready(function() {
	jQuery(document).on('click', '.ti-download-notification .ti-remind-later', function(event) {
		event.preventDefault();

		let container = jQuery(this).closest('.ti-download-notification');

		container.data('close-url', jQuery(this).attr('href')).find('.notice-dismiss').trigger('click');

		return false;
	});

	jQuery(document).on('click', '.ti-download-notification .notice-dismiss', function(event) {
		event.preventDefault();

		jQuery.post(jQuery(this).closest('.ti-download-notification').data('close-url'), {});
	});
});