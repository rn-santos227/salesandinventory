@extends ('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Menus</div>
				<div class="panel-body">
					<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#create">
                    <span class="hidden-xs hidden-sm">Add Menu</span>
                    </button><br><br>
					<table class="table table-bordered table-responsive">
						<thread>
							<tr>
								<th>Reference Code</th>
								<th>Name</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thread>
						<tbody>
							@forelse($menus as $menu)
							<tr>
								<td>{{$menu->ref_code}}</td>
								<td>{{$menu->name}}</td>
								<td>{{$menu->active}}</td>
								<td style="width:225px;">
									<button class="btn btn-primary" style="width: 100px;" data-toggle="modal" data-target="#view{{$menu->id}}">View</button>
                                    <button class="btn btn-warning" style="width: 100px;" data-toggle="modal" data-target="#update{{$menu->id}}">Edit</button>
								</td>
							</tr>

							@empty
                              <tr rowspan="4"><p>No menu Available</p></tr>

                            @endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@include('menus.create')
@include('menus.view')
@include('menus.update')
@endsection

