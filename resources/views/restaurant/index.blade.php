@extends('admin.home')

@section('page')
<div>
<div class="row">
</div>
	<div class="panel panel-default">
		<div class="panel-heading"><h3><i class="fa fa-cutlery" aria-hidden="true"></i> Restaurant</h3></div>
		<div class="panel-body">
			<div class="accordion">
				<div class="accordion-section">
					<a class="accordion-section-title" href="#accordion-1" id="show"><h4><i class="fa fa-pencil" aria-hidden="true"></i> Add New Table</h4></a>
	            	<div id="accordion-1" class="accordion-section-content">
	            	@include('restaurant.new')
	            	</div>
            	</div>
            </div>
            @include('restaurant.data')	
		</div>
	</div>
</div>
@include('dialogs.info')
@include('dialogs.warning')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/accordion.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/restaurant-script.js') }}" type="text/javascript"></script>
@endsection