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
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>CODE</th>
			<th>CATEGORY</th>
			<th>SUPPLIER</th>
			<th>DESCRIPTION</th>
			<th>QUANTITY</th>
			<th>COST</th>
			<th>PRICE</th>
		</tr>
		@foreach ($items as $key => $item)
		<tr>
			<!-- <td>{{ ++$key }}</td> -->
			<td>{{ $item->id }}</td>
			<td>{{ $item->name }}</td>
			<td>{{ $item->ref_code }}</td>
			<td>{{ $item->supplier_id }}</td>
			<td>{{ $item->category_id }}</td>
			<td>{{ $item->description }}</td>
			<td>{{ $item->quantity }}</td>
			<td>{{ $item->cost}}</td>
			<td>{{ $item->price }}</td>
		</tr>
		@endforeach
	</table>
</div>