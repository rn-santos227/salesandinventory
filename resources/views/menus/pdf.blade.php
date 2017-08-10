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
			<th>DESCRIPTION</th>
			<th>PRICE</th>
			<th>STATUS</th>
		</tr>
		@foreach ($menus as $key => $menu)
		<tr>
			<!-- <td>{{ ++$key }}</td> -->
			<td>{{ $menu->id }}</td>
			<td>{{ $menu->name }}</td>
			<td>{{ $menu->ref_code }}</td>
			<td>{{ $menu->category_id }}</td>
			<td>{{ $menu->description }}</td>
			<td>{{ $menu->price }}</td>
			<td>{{ $menu->active }}</td>
		</tr>
		@endforeach
	</table>
</div>