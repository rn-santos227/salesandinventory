@extends('admin.home')

@section('page')
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
            	<h3>Profile</h3>
            </div>
            <div class="panel-body">
            	{{Auth::user()->last_name}}, {{Auth::user()->first_name}}.
            	{{Auth::user()->username}}
            	{{Auth::user()->email}}
            </div>           
        </div>
    </div>
</div>
@endsection
