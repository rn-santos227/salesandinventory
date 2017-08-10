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
			<th>Username</th>
			<th>User Level</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
		</tr>
		@foreach ($accounts as $key => $account)
		<tr>
			<td>{{ $account->id }}</td>
			<td>{{ $account->username }}</td>
			<td>{{ $account->user_level }}</td>
			<td>{{ $account->first_name }}</td>
			<td>{{ $account->last_name }}</td>
			<td>{{ $account->email }}</td>
		</tr>
		@endforeach
	</table>
</div>