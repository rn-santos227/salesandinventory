@extends('admin.home')

@section('page')
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h3><i class="fa fa-clone" aria-hidden="true"></i> Menus</h3></div>
				<div class="panel-body">
                    <!-- Search Panel -->
					<div class="panel search">
                        <form method="GET" action="\menus">
                            <div class="panel-body">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for..." name="search" value="{{ old('search') }}">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
                                        </button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                            <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i> <span class="hidden-xs hidden-sm"> New Menu</span>
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
                                            <option value="name">Menu Name</option>
                                            <option value="ref_code">Menu Code</option>
                                            <option value="category">Menu Category</option>
                                            <option value="description">Menu Description</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">           
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-list" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Sort By</span></span>
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
                            </div>
                        </form>
                    </div>
                    <div id="product_container">
                       <a href="{{ route('menus/pdf',['download'=>'pdf']) }}" class="pull-left"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
                       @include('menus.data');
                   </div>
				</div>
			</div>
		</div>
	</div>

@include('menus.create')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pagination.js') }}" type="text/javascript"></script>
@endsection

