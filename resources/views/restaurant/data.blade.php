<table class="table table-bordered table-responsive" id="table_list">
    <thead>
        <tr>
            <th class="col_hide">Receipt Number</th>
            <th>Table Name</th>
            <th class="col_hide">Customer Name</th>
            <th>Orders</th>
            <th>Status</th>
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
    @forelse($o_tables as $table)
        <tr id="table_id{{$table->id}}">
            <td></td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No Occupied Tables</td>
        </tr>
    @endforelse
	</tbody>
</table>