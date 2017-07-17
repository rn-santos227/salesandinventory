@extends('layouts.app')
@section('content')
<div class="row">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Customers</div>
            <div class="panel-body">
                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#create">
                <span class="hidden-xs hidden-sm">New Item</span>
                </button><br><br>
                <table class="table table-bordered table-responsive">
                    @forelse($customers as $customer)
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->contact}}</td>
                            <td>{{$customer->active}}</td>
                            <td style="width: 225px;">
                                <button class="btn btn-info" style="width: 100px;" data-toggle="modal" data-target="#view{{$customer->id}}">View</button>
                                <button class="btn btn-warning" style="width: 100px;" data-toggle="modal" data-target="#update{{$customer->id}}">Edit</button>
<!--                                    <button class="btn btn-danger" style="width: 100px;">Remove</button>-->
                            </td>
                        </tr>        
                    @empty
                          <tr rowspan="4"><p>No customer Available</p></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('customers.create')
@include('customers.view')
@include('customers.update')
@endsection
