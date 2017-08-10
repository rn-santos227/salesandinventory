@extends('admin.home')

@section('page')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Product List
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <input type="text" id="searchStr" placeholder="Enter Product Reference Code..." class="form-control" style="width: 100%;">
                </div>

                <table id="myTable" class="table table-hover itemsTable">
                 <thead>
                    <tr>
                        <th>Reference Code</th>
                        <th>Name</th>
                        <th>Category</th>
                    </tr>
                
                </thead>
                    <tbody>
                    @forelse($products as $product) 
                        <tr>
                            <td><a class="product_ref_code" id="{{$product->refCode}}">{{$product->refCode}}</a></td>
                            <td>{{$product->itemName}}</td>
                            <td>{{$product->categoryName}}</td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Product Information
            </div>

            <div class="panel-body">
                <div class="row">

                    <div id='productInfo'>
                        <div class='col-md-12' style='float: left;'>
                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Reference Code:</strong></div>
                                <div class='col-md-6 pull-right' id='prodRefCode'></div>
                                <input type='hidden' id='prodRefCodeHidden'>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Product Name:</strong></div>
                                <div class='col-md-6 pull-right' id='prodName'></div>
                                <input type='hidden' id='prodNameHidden'>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Cost:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodCost' type='number' min='0' value='0'  style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Price:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodPrice' type='number' min='0' value='0'  style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Quantity:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodQty' type='number' min='0' value='0'  style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='col-md-6 pull-left'><strong>Re-order Point:</strong></div>
                                <div class='col-md-6 pull-right'>
                                    <input id='prodRop' type='number' min='0' value='0' style='border: none; width: 50%; height: 50%;'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="footer" class="panel-footer clearfix">
                <button class="pull-right btn btn-success" id="addToInventory">Add to Inventory</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Inventory Management
            </div>

            <div class="panel-body">
                <table id="myTable" class="table table-hover">
                 <thead>
                    <tr>
                        <th>Reference Code</th>
                        <th>Name</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Re-order Point</th>
                        <th></th>
                    </tr>
                
                </thead>
                    <tbody>
                    @forelse($inventories as $inventory) 
                        <tr>
                            <td>{{$inventory->ref_code}}</td>
                            <td>{{$inventory->name}}</td>
                            <td><input id='inventoryCost' type='number' min='0' value='{{$inventory->cost}}'  style='border: none;'></td>
                            <td><input id='inventoryCost' type='number' min='0' value='{{$inventory->price}}'  style='border: none;'></td>
                            <td><input id='inventoryCost' type='number' min='0' value='{{$inventory->quantity}}'  style='border: none;'></td>
                            <td><input id='inventoryCost' type='number' min='0' value='{{$inventory->reorder_point}}'  style='border: none;'></td>
                            <td><button class='btn btn-warning btn-xs' type='button' id='{{$inventory->id}}'>Save</button></td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/inventory.js') }}"></script>
<!-- <script src="{{ asset('js/tablesort.js') }}"></script> -->
@endsection