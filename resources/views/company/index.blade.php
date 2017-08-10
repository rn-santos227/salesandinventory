@extends('admin.home')

@section('page')
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><center><h3><img src="http://svantecorp.com/images/svante-logo.png" style="width: 50%;"></h3></center></div>
            <div class="container-fluid">
	            <div class="panel-body text-center">
	            	<h3>{{$companies->name}}</h3>
	                <p align="justify">
                        {{$companies->description}}
					</p>
					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#update">
                        <i class="fa fa-pencil" aria-hidden="true"></i></span> <span class="hidden-xs hidden-sm"></span>
                    </button>
	            </div>
            </div>
        </div>
    </div>
</div>
@include('company.update')
@endsection
