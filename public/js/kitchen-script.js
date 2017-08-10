$(document).ready(function() {
	//Variable Functions
	var getOrders = function() {
		setsCSRFToken();
		$.ajax({
			type: 'POST',
			url: '/kitchen/load',
			success: function(response) {
				console.log('success!');
				var ids = response.receipt_ids;
				var orders = response.orders;
				$('#kitchen').empty();

				for(var i in ids) {
					$('#kitchen').append(orderBuilder(ids[i], orders));
				}
				setTimeout(getOrders, 1000);
			},
			error: function(response) {
				console.log('error!');
			}
		})
	} 
	
	//Active Functions
	getOrders();

	//Event Functions
	$(document).on('click','.respond', function(e) {
		setsCSRFToken();
		e.preventDefault();

		var id = $(this).val();

		$.ajax({
			type: 'POST',
			url: '/kitchen/serve',
			data: {
				id: id
			},
			success: function(response) {
				console.log('update success!');
			},
			error: function(response) {
				console.log('update fail!');
			}
		})
	});


	$(document).on('click','.orderitemstatus', function(e) {

		var id = $(this).attr('id');
		alert(id);
		
	});


	//Local Functions
	function setsCSRFToken() {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		}
       	})
	}

	//Builders
	function orderBuilder(id, orders) {
		str = '<div class="col-md-4">';
		str += '<div class="panel panel-default">';
		str += '<div class="panel-heading text-center">' + id + '</div>';
		str += '<div class="panel-body">';
		str += '<table class="table table-bordered table-responsive">';
		str += '<thead><th>Name</th><th>Quantity</th><th>Status</th><th></th></thead>';
		str += '<tbody>';
		for(var j in orders) {
			if(orders[j]['receipt_id'] == id) str += '<tr><td>' + orders[j]['name'] + '</td><td>' + orders[j]['qty'] + "</td><td>"+orders[j]['status']+"</td><td><button  id="+orders[j]['status']+" class = 'btn btn-primary orderitemstatus'>served</button></td></tr>";
		}
		str += '</tbody></table>';
		str += '</div>';
		str += '<div class="panel-footer clearfix">';
		str += '<button type="submit" class="btn btn-success pull-right respond" style="margin-right: 10px;" value="' + id + '">';
		str += '<i class="fa fa-check-circle" aria-hidden="true"></i> Served</button>';
		str += '</div></div></div>';
		return str;
	}
});