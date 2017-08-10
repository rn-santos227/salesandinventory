//Overriding Variables
var fields = ['name', 'ref_code', 'image', 'category_id', 'supplier_id', 'description', 'quantity', 'cost', 'price', 'active'];
var method_url = '/items';

//Overriding Functions
function getRecords(method) {
	var formData = {
		name: $(method + fields[0]).val(),
		ref_code: $(method + fields[1]).val(),
		image: $(method + fields[2])[0].files[0],
		category_id: $(method + fields[3]).val(),
		supplier_id: $(method + fields[4]).val(),
		description: $(method + fields[5]).val(),
		quantity: $(method + fields[6]).val(),
		cost: $(method + fields[7]).val(),
		price: $(method + fields[8]).val(),
		active: $(method + fields[9]).val(),	
	}
	return formData;
}

function add(response, formData) {
	if(response.success && !checkPrice(formData.cost, formData.price, '#add-')) {
		console.log('success!');
		$('#dialog-success').modal('toggle');
		$('#create').modal('toggle');
		setFieldsToBlank('#add-');
		fillTable('', '');
	}
	else {
		console.log('error validation!');
		confirmValidation(response.errors, '#add-');
		console.log(formData.image);
		if(formData.price != '' && formData.cost != '') 
			if(checkPrice(formData.cost, formData.price, '#add-')) return;			
	}
}

function update(response, formData) {
	if(response.success && !checkPrice(formData.cost, formData.price, '#update-')) {
		console.log('success!');
		$('#item_' + response.item.id).replaceWith(RowBuilder(response.item.id, formData.name, formData.ref_code, formData.quantity, formData.price, formData.active));
		$('#dialog-success').modal('toggle');
		$('#update').modal('toggle');
		setFieldsToBlank('#udpate-');
	}
	else {
		console.log('error validation!');
		confirmValidation(response.errors, '#update-');
		if(formData.price != '' && formData.cost != '') 
			if(checkPrice(formData.cost, formData.price, '#update-')) return;			
	}
}

function fetch(response) {
	$('#update-name').val(response.item.name);
	$('#update-ref_code').val(response.item.ref_code);
	$('#update-category_id').val(response.item.category_id).change();
	$('#update-supplier_id').val(response.item.supplier_id).change(); 
	$('#update-description').val(response.item.description);
	$('#update-quantity').val(response.item.quantity);
	$('#update-cost').val(Number(response.item.cost).toFixed(2));
	$('#update-price').val(Number(response.item.price).toFixed(2));
	$('#update-profit').val(Number(response.profit).toFixed(2));
	$('#update-active').val(response.item.active).change;
	$('#update-submit').val(response.item.id);
}

function view(response) {
	$('#view-name').val(response.item.name);
	$('#view-ref_code').val(response.item.ref_code);
	$('#view-category').val(response.item.category.name);
	$('#view-supplier').val(response.item.supplier.name);
	$('#view-description').val(response.item.description);
	$('#view-quantity').val(response.item.quantity);
	$('#view-cost').val(Number(response.item.cost).toFixed(2));
	$('#view-price').val(Number(response.item.price).toFixed(2));
	$('#view-profit').val(Number(response.profit).toFixed(2));
	$('#view-active').val(response.item.active);
	$('#view-created_at').val(response.item.created_at);
	$('#view-updated_at').val(response.item.updated_at);
}

//Overriding Validators
function checkPrice(cost, price, method) {
	if(cost > price) {
		$(method + '-price').css('border-color', '#FF0000');
		$(method + '-price_message').text('price is lower than cost.');
		return true;
	} else return false;
}

function confirmValidation(errors, method) {
	$.each(errors, function( key, value) {
		$(method + key).css('border-color', '#FF0000');
		$(method + key + '_message').text(value);
	});
}

//Overriding Builders
function RowBuilder(id, name, ref_code, quantity, price, active) {
	var str = '<tr id="item_' + id +'">';
	str += '<td class="col_hide">' + ref_code + '</td>';
	str += '<td>' + name + '</td>';
	str += '<td>' + quantity + '</td>';
	str += '<td>' + price + '</td>';
	str += '<td class="col_hide">' + active + '</td>';
	str += '<td class="action">'
	str += '<button class="btn btn-primary action btn_view" data-toggle="modal" data-target="#view" value="' + id + '""><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>';
	str += ' <button class="btn btn-warning action btn_fetch" data-toggle="modal" data-target="#update" value="' + id + '""><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>';
	str += '</td></tr>';
	return str;
}

function tableBuilder(items) {
	$('#data').find('tbody').empty();
	for(var i in items) {
		$('#data > tbody:last-child').append(RowBuilder(items[i].id, items[i].name, items[i].ref_code, items[i].quantity, items[i].price, items[i].active));
	}
}
