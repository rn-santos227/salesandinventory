@extends('admin.home')

@section('page')
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">Categories</div>
				<div class="panel-body">
					<button class="btn btn-success pull-right" data-toggle="modal" data-target="#create">Add Category</button>
					<hr>
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
							@forelse($categories as $category)
							<tr>
								<td>{{$category->ref_code}}</td>
								<td>{{$category->name}}</td>
								<td>{{$category->active}}</td>
								<td style="width:225px;">
									<button class="btn btn-info" style="width: 100px;" data-toggle="modal" data-target="#view{{$category->id}}">View</button>
                                    <button class="btn btn-warning" style="width: 100px;" data-toggle="modal" data-target="#update{{$category->id}}">Edit</button>
								</td>
							</tr>

							@empty
                              <tr rowspan="4"><p>No category Available</p></tr>

                            @endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@include('categories.create')
@include('categories.view')
@include('categories.update')
@endsection

