$(document).ready(function() {

	$(document).on('click', '#cashier-modal', function(e) {
		if(Number($('#receipt-amount_due').val()) > 0) {
			$('#cashier').modal({
				backdrop: 'static',
				keyboard: false,
			});
		} else {
			$('#dialog-warning').modal('toggle');
			$('#text_warning').text('The tray is empty.');
		}
	});
});