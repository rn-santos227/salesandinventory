@extends('admin.home')

@section('page')
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h3><i class="fa fa-tags" aria-hidden="true"></i> Categories</h3></div>
				<div class="panel-body">
					<!-- Search Panel -->
					<div class="panel search">
						<form method="GET" action="\categories">
							<div class="panel-body">
								<div class="input-group">
									<input type="text" name="search" class="form-control" placeholder="Search for..." value="{{ old('search') }}">
				          		  	<span class="input-group-btn">
				            			<button class="btn btn-primary" type="submit">
				            				<i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
				               			</button>
				                		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
				                  			<i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"> New Category</span>
				                		</button>
				              		</span>
			              		</div>
							</div>
							<div class="panel-footer" id="accordion" style="padding-left: 30px; padding-right: 30px; ">  							
								<div class="form-group">           
		        					<div class="input-group">
											<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
		              					<select class="form-control" aria-describedby="sizing-addon2" name="tag">
		             						<option value="id">ID Number</option>
		                					<option value="ref_code">Category Code</option>
		           					  	  	<option value="name">Category Name</option>
		           					  	  	<option value="description">Category Description</option>
		              					</select>
		          					</div>
		          				</div>		
								
								<div class="form-group">           
		        					<div class="input-group">
											<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
		              					<select class="form-control" aria-describedby="sizing-addon2">
											<option>ID</option>
		                					<option>Reference Code</option>
		           					  	  	<option>Name</option>
		           					  	  	<option>Status</option>
		              					</select>
		          					</div>
		          				</div>
 							</div>
 						</form>
					</div>
					<!-- Category Table -->
					<table class="table table-bordered table-responsive">
						<thread>
							<tr>
								<th class="col_hide">Reference Code</th>
								<th>Name</th>
								<th>Status</th>
								<th class="action">Action</th>
							</tr>
						</thread>
						<tbody>
							@forelse($categories as $category)
							<tr>
								<td class="col_hide">{{$category->ref_code}}</td>
								<td>{{$category->name}}</td>
								<td>{{$category->active}}</td>
								<td class="action">
									<button class="btn btn-primary action"  data-toggle="modal" data-target="#view{{$category->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                                    <button class="btn btn-warning action"  data-toggle="modal" data-target="#update{{$category->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
								</td>
							</tr>

							@empty
                              <tr><td colspan="4"><p>No category Available</p></td></tr>

                            @endforelse
						</tbody>
					</table>
					<center>
						{{ $categories->links() }}
					</center>
				</div>
			</div>
		</div>
	</div>

<!-- Attachment of the Modals. -->
@include('categories.create')
@include('categories.view')
@include('categories.update')

@endsection

