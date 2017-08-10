@extends('admin.home')

@section('page')
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h3><i class="fa fa-truck" aria-hidden="true"></i> Suppliers</h3></div>
                <div class="panel-body">
                    <!-- Search Panel -->
                    <div class="panel search">
                        <div class="panel-body">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Search</span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                        <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"> New Supplier</span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="panel-footer" id="accordion" style="padding-left: 30px; padding-right: 30px; "> 
                            <form class="form-horizontal">
                                <div class="form-group">           
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">&nbsp;&nbsp;&nbsp;Search By</span></span>
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
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th class="col_hide">Reference Code</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($suppliers as $supplier)
                            <tr>
                                <td class="col_hide">{{$supplier->ref_code}}</td>
                                <td>{{$supplier->name}}</td>
                                <td>{{$supplier->active}}</td>
                                <td  class="action">
                                    <button class="btn btn-primary action"  data-toggle="modal" data-target="#view{{$supplier->id}}"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> View</span></button>
                                    <button class="btn btn-warning action"  data-toggle="modal" data-target="#update{{$supplier->id}}"><i class="fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Edit</span></button>
                                </td>
                            </tr>        
                            @empty
                              <tr><td colspan="4"><td><p>No supplier Available</p></td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <center>
                        {{$suppliers->links()}}
                    </center>
                </div>
            </div>
        </div>
</div>
@include('suppliers.create')
@include('suppliers.view')
@include('suppliers.update')
@endsection
