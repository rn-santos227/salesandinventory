<style type="text/css">
	table {
    		    font-family: arial, sans-serif;
    		    border-collapse: collapse;
    		    width: 100%;
    		}
    		td, th {
    		    border: 1px solid #dddddd;
    		    text-align: left;
    		    padding: 8px;
    		}
</style>
<div class="container">
	<table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Item</th>
            <th>Total Earnings</th>
            <th>Quantity Sold</th>
            <th>Date</th>
        </tr>
    <thead>
    </thead>
        <tbody>
            @forelse($items as $item) 
                <tr>
                    <td>{{$item->ref_code}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->subtotal}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('j F Y h:i A')}}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>