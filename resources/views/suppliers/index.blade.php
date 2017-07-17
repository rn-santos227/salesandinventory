@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Suppliers</div>
                <div class="panel-body">
                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#create">
                    <span class="hidden-xs hidden-sm">New Item</span>
                    </button><br><br>
                    <table class="table table-bordered table-responsive">
                        @forelse($suppliers as $supplier)
                        <thead>
                            <tr>
                                <th>Reference Code</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$supplier->ref_code}}</td>
                                <td>{{$supplier->name}}</td>
                                <td>{{$supplier->active}}</td>
                                <td style="width: 225px;">
                                    <button class="btn btn-primary" style="width: 100px;" data-toggle="modal" data-target="#view{{$supplier->id}}">View</button>
                                    <button class="btn btn-warning" style="width: 100px;" data-toggle="modal" data-target="#update{{$supplier->id}}">Edit</button>
<!--                                    <button class="btn btn-danger" style="width: 100px;">Remove</button>-->
                                </td>
                            </tr>        
                        @empty
                              <tr rowspan="4"><p>No supplier Available</p></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@include('suppliers.create')
@include('suppliers.view')
@include('suppliers.update')
@endsection
