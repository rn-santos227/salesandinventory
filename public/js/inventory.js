$(document).ready(function() {
	//search by ID
	$(document).on('input', '#searchStr', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var search_str = $(this).val();
        $.ajax({
            type: 'POST',
            url: '/inventory/search',
            data: {
                ref_code: search_str,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!');  
                console.log(response.items);
                $('.itemsTable tbody').html(' ');
                for (var i = response.items.length - 1; i >= 0; i--) {
                    $('.itemsTable  > tbody:last-child').append("<tr><td><a class='product_ref_code' id = '"+response.items[i].refCode+"'>"+response.items[i].refCode+"</a></td><td>"+response.items[i].itemName+"</td><td>"+response.items[i].categoryName+"</td></tr>");
                }
            },
            error: function() {
                console.log('error!');
            }
        })
    });


    $(document).on('click', '.product_ref_code', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var ref_code = $(this).attr('id');
        //alert(id);
 		$.ajax({
            type: 'POST',
            url: '/inventory/view',
            data: {
                ref_code: ref_code,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!');
                console.log(response.items);
                $("#prodRefCode").html(response.items[0].ref_code);
                $("#prodRefCodeHidden").val(response.items[0].ref_code);
                $("#prodName").html(response.items[0].name);
                $("#prodNameHidden").val(response.items[0].name);
            },
            error: function() {
                console.log('error!');
            }
        })
    });

    $(document).on('click', '#addToInventory', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var ref_code = $("#prodRefCodeHidden").val();
        var prod_name = $("#prodNameHidden").val();
        var prod_cost = $("#prodCost").val();
        var prod_price = $("#prodPrice").val();
        var prod_qty = $("#prodQty").val();
        var prod_rop = $("#prodRop").val();
        alert(prod_rop);
 		$.ajax({
            type: 'POST',
            url: '/inventory/addtoinventory',
            data: {
                ref_code: ref_code,
                name: prod_name,
                cost: prod_cost,
                price: prod_price,
                qty: prod_qty,
                reorder_point: prod_rop,
            },
            dataType: 'json',
            success: function(response) {
                console.log('success!');
            },
            error: function() {
                console.log('error!');
            }
        })
    });
});