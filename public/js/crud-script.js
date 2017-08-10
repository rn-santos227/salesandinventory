$(document).ready(function(){
	//Auto-Launch Functions

	//Event Functions
	$(document).on('click', '.dismiss', function(e) {
		resetFields('#add-');
		resetFields('#update-');
	});

	$(document).on('click','.btn_search', function(e) {
		var search = $('#txt_search').val();
		var tags = $('#cbo_tag').val();
		console.log(tags);
		fillTable(search, tags);
	});

	$(document).on('click', '.btn_view', function(e) {
		setsCSRFToken(e);
		var id = $(this).val();
		console.log(id);
		var formData = getRecords('#view-');
		$.ajax({
			type: 'POST',
			url: method_url + '/view',
			data: {
				id: id
			},
			success: function(response) {
				view(response);
			},
			error: function() {
				console.log('error!');
			}
		})

	})

	$(document).on('click', '.btn_fetch', function(e) {
		setsCSRFToken(e);
		var id = $(this).val();
		$.ajax({
			type: 'POST',
			url: method_url + '/view',
			data: {
				id: id
			},
			success: function(response) {
				fetch(response);
			},
			error: function() {
				console.log('error!');
			}
		})
	});

	$(document).on('click','.add', function(e) {
		setsCSRFToken(e);
		var formData = getRecords('#add-');
		resetFields('#add-');
		$.ajax({
			type: 'POST',
			url: method_url,
			data: formData,
			dataType: 'json',
			processData: false,
			success: function(response) {
				add(response, formData);
			},
			error: function() {
				console.log('error!');
			}
		})
	});

	$(document).on('click','.update', function(e) {
		setsCSRFToken(e);
		var formData = getRecords('#update-');
		var data_id = $(this).val();
		formData._method = "PUT";
		resetFields('#update-');
		$.ajax({
			type: 'POST',
			url: method_url + '/' + data_id,
			data: formData,
			dataType: 'json',
			processData: false,
			success: function(response) {
				update(response, formData);
			},
			error: function() {
				console.log('error!');
			}
		})		
	});

	//Local Functions
	function setsCSRFToken(e) {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
       	})
       	e.preventDefault();
	}

	function resetFields(method) {
		for(var i in fields) {
			$(method + fields[i]).css('border-color', '#DDDDDD');
			$(method + fields[i] + '_message').text('');
		}
	}

	function setFieldsToBlank(method) {
		for(var i in fields) {
			$(method + fields[i]).val('');
		}
	}
});

//Globals
function setFieldsToBlank(method) {
	for(var i in fields) {
		$(method + fields[i]).val('');
	}
}

function fillTable(search, tags) {
	$.ajax({
		type: 'POST',
		url: method_url + '/search',
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       	},
		data: {
			search: search,
			tags: tags
		},
		success: function(response) {
			console.log('success!');
			console.log(response.items.data);
			tableBuilder(response.items.data);
		},
		error: function(response) {
			console.log('error!');				
		}
	})		
}