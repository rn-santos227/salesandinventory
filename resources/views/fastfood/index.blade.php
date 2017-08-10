@extends('admin.home')

@section('page')
<div>
	<div class="row">
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">
					Menu	
				</div>
				<div class="panel-body" style="overflow: scroll; overflow-x: hidden; height:80vh;">
					<div id="tray">	
						@include('fastfood.data');	
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row clearix">
						<form class="col-md-12">
							<p class="pull-left">Tray</p>
							<button type="button" class="btn btn-danger btn-xs pull-right clear"><i class="fa fa-eraser" aria-hidden="true"></i> Clear</button>
						</form>
					</div>
				</div>
				<div class="panel-body">
					@include('fastfood.tray')
				</div>	
				<div class="panel-footer clearfix">
					<div class="accordion">
						<div class="accordion-section">
							<a class="accordion-section-title" href="#accordion-1" id="show" data-value="{{$setting->show_receipt}}"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Receipt Information </a>
			            	<div id="accordion-1" class="accordion-section-content">
			            	@include('fastfood.receipt')
			            	</div>
		            	</div>
		            </div>	
	            	<br/>
					<label>&nbsp;&nbsp;Amount Due: </label>
					<div class="input-group input-group-lg">
						<input style="background-color:#ffffff;" type="text" class="form-control" id="receipt-amount_due" name="receipt-amount_due" value="" readonly> <span class="input-group-btn"><button class="btn btn-md btn-success" id="cashier-modal"><i class="fa fa-money" aria-hidden="true"></i> Cashier</button></span> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('fastfood.cashier')
@include('dialogs.info')
@include('dialogs.warning')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/accordion.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/cashier-modal.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/fastfood-script.js') }}" type="text/javascript"></script>
@endsection


