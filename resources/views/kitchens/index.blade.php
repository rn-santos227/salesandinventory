@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-body" style="overflow: scroll; height:85vh;">
		<div class="row">
			<div id="kitchen">
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/kitchen-script.js') }}"></script>
@endsection