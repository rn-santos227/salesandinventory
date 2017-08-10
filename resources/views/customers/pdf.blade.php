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
			<th>Email</th>
			<th>Contact</th>
			<th>Address</th>
		</tr>
		@foreach ($customers as $key => $customer)
		<tr>
			<!-- <td>{{ ++$key }}</td> -->
			<td>{{ $customer->id }}</td>
			<td>{{ $customer->name }}</td>
			<td>{{ $customer->email }}</td>
			<td>{{ $customer->contact }}</td>
			<td>{{ $customer->address }}</td>
		</tr>
		@endforeach
	</table>
</div>