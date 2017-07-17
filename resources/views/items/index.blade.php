@extends('admin.home')
@section('page')
	<div class='container-fluid'>
		<div class='row'>
			<div class="panel panel-default">
				<div class="panel-heading "><h1><i class="fa fa-cube fa-lg"></i>  Inventory</h1</div>
				<div class="panel-body">
					<div class="panel search">
						<div class="panel-body">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search for...">
				            	<span class="input-group-btn">
				            		<button class="btn btn-primary" type="button">
				            			<span class="glyphicon glyphicon-search"></span> <span class="hidden-xs hidden-sm">Search</span>
				               		</button>
				                	<button type="button" class="btn btn-primary" onclick="window.location='/inventory';">
				                  		<span class="glyphicon glyphicon-plus-sign"></span> <span class="hidden-xs hidden-sm">New Item</span>
				                	</button>
				              	</span>
			              	</div>
						</div>
						<div class="panel-footer" style="padding-left: 50px; padding-right: 50px; "> 
 							<form class="form-horizontal">
 								<div class="form-group">           
                					<div class="input-group">
	 									<span class="input-group-addon" id="sizing-addon2" >Search By</span>
	                  					<select class="form-control" aria-describedby="sizing-addon2">
	                 						<option>ID Number</option>
	               					  	  	<option>Product Name</option>
	                    					<option>Product Code</option>
	                    					<option>Product Category</option>
	                    					<option>Product Supplier</option>
	                    					<option>Product Description</option>
	                  					</select>
                  					</div>
                  				</div>
 							</form>
 							<form class="form-horizontal">
 								<div class="form-group">           
                					<div class="input-group">
	 									<span class="input-group-addon" id="sizing-addon2" Sort By</span>
	                  					<select class="form-control" aria-describedby="sizing-addon2">
											<option>ID Number</option>
											<option>Product Name</option>
											<option>Product Code</option>
											<option>Product Category</option>
											<option>Product Supplier</option>
											<option>Date Added</option>
											<option>Last Update</option>
											<option>Quantity</option>
											<option>Price</option>
											<option>User Added</option>
	                  					</select>
                  					</div>
                  				</div>
 							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection