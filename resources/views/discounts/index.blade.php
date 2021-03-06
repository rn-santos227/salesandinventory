@extends('admin.home')
@section('page')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".numeric").keydown(function (e) {
	        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
	            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
	            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
	            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
	            (e.keyCode >= 35 && e.keyCode <= 39)) {
	                 return;
	        }
	        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
	            e.preventDefault();
	        }
	    });
	}); 
</script>
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h3><i class="fa fa-percent" aria-hidden="true"></i> Discounts</h3></div>
				<div class="panel-body">
					<!-- Search Panel -->
					<div class="panel search">
						<form method="GET" action="\discounts">
							<div class="panel-body">
								<div class="input-group">
									<input type="text" name="search" class="form-control" placeholder="Search for..." value="{{ old('search') }}">
				          		  	<span class="input-group-btn">
				            			<button class="btn btn-primary" type="submit">
				            				<i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
				               			</button>
				                		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
				                  			<i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"> New Discount</span>
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
		                					<option value="ref_code">Discount Code</option>
		           					  	  	<option value="name">Discount Name</option>
		           					  	  	<option value="description">Discount Description</option>
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

					<table class="table table-bordered table-responsive">
						<thread>
							<tr>
								<th class="col_hide">Reference Code</th>
								<th >Name</th>
								<th >Rate</th>
								<th class="col_hide">Status</th>
								<th class="action">Action</th>
							</tr>
						</thread>
						<tbody>
							@forelse($discounts as $discount)
							<tr>
								<td class="col_hide">{{$discount->ref_code}}</td>
								<td>{{$discount->name}}</td>
								<td>{{$discount->rate}}</td>
								<td class="col_hide">{{$discount->active}}</td>
								<td class="action">
									<button class="btn btn-primary action"  data-toggle="modal" data-target="#view{{$discount->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                                    <button class="btn btn-warning action"  data-toggle="modal" data-target="#update{{$discount->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
								</td>
							</tr>

							@empty
                              <tr><td colspan="5"><p>No discount Available</p></td></tr>

                            @endforelse
						</tbody>
					</table>
					<center>
						{{ $discounts->links() }}
					</center>
				</div>
			</div>
		</div>
	</div>
@include('discounts.create')
@include('discounts.view')
@include('discounts.update')
@endsection

