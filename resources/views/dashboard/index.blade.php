@extends('admin.home')

@section('page')
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h3><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</h3></div>
				<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-heading text-center">
								<i class="fa fa-calendar" aria-hidden="true"></i> {{\Carbon\Carbon::today()->format('F j, Y')}}
							</div>
						</div>	
					</div>
				</div>	
					<div class="row text-center">

						<div class="col-md-3">
	       					<div class="panel panel-default"  style="color: #ffffff; border-color: #ffffff;">
								<div class="panel-heading" style="background-color: #ff5d6f; border-color: #ff5d6f;">
									<h3 style="color: #ffffff;">₱ {{number_format($totalsales->sales)}}</h3>
								</div>
	       						<div class="panel-footer" style="background-color: #614653;  border-color: #614653;">
	       							Total Sales
	       						</div>					
	       					</div>        				
	        			</div>

	        			<div class="col-md-3">
	       					<div class="panel panel-info"  style="color: #ffffff; border-color: #ffffff;">
	       						<div class="panel-heading" style="background-color: #bc80ef; border-color: #bc80ef;">
	       							<h3 style="color: #ffffff;">{{$transactions->trans}}</h3>
	       						</div>
	       						<div class="panel-footer" style="background-color: #534d6c; border-color: #534d6c;">
	       							Transactions
	       						</div>					
	       					</div>        				
	        			</div>	
						
						<div class="col-md-3">
	       					<div class="panel panel-warning"  style="color: #ffffff; border-color: #ffffff;">
	       						<div class="panel-heading" style="background-color: #49bbeb; border-color: #49bbeb;">
	       							<h3 style="color: #ffffff;">₱ {{$transactions->trans}}</h3>
	       						</div>
	       						<div class="panel-footer" style="background-color: #3c596c; border-color: #3c596c;">
	       							Gross Profit
	       						</div>					
	       					</div>        				
	        			</div>

	        			<div class="col-md-3">
	       					<div class="panel panel-danger"  style="color: #ffffff; border-color: #ffffff;">
	       						<div class="panel-heading" style="background-color: #73d1be; border-color: #73d1be;">
	       							<h3 style="color: #ffffff;">₱ {{$transactions->trans}}</h3>
	       						</div>
	       						<div class="panel-footer" style="background-color: #455d63; border-color: #455d63;">
	       							asdasd
	       						</div>					
	       					</div>        				
	        			</div>	
					</div>

        			<div class="row text-center">
        				<div class="col-md-6">
        					<div class="panel panel-default">
        						<div class="panel-heading"><h4>Top Items by Sales</h4></div>
								<div class="panel-body">
								<table class="table">
									<thead>
										<th class="text-center">Item</th>
										<th class="text-center">Qty</th>
										<th class="text-center">Total</th>
									</thead>
									<tbody>
									@forelse($solditems as $solditem) 
		                                <tr>
		                                	<td>{{$solditem->name}}</td>
		                                	<td>{{$solditem->qty}}</td>
		                                	<td>{{$solditem->subtotal}}</td>
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
        						<div class="panel-heading"><h4>Low Quantity Count Items</h4></div>
								<div class="panel-body">
								<table class="table">
									<thead>
										<th class="text-center">Item</th>
										<th class="text-center">Quantity</th>
									</thead>
									<tbody>
									@forelse($products as $product) 
		                                <tr>
		                                	<td>{{$product->name}}</td>
		                                	<td>{{$product->quantity}}</td>
		                                </tr>
			                        @empty
			                        @endforelse
									</tbody>
	        					</table>
	        					</div>
                            </div>
        				</div>
        			</div>

        			<div class="row">
        				<div class="col-md-12">
		                	<canvas id="myChart"></canvas>
        				</div>
        			</div>
				</div>
			</div>
		</div>
	</div>

    <script src="{{ asset('js/Chart.min.js') }}"></script>

	<script>
		let myChart = document.getElementById('myChart').getContext('2d');

		let massPopChart = new Chart(myChart, {
			responsive: true,
			type:'line',
			data:{
				labels:['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
				datasets:[{
					label:'Sales',
					data:[
						500,
						304,
						601,
						670,
						912,
						612,
						500
					],
					backgroundColor: 'rgba(129, 207, 238, 1)',
					borderWidth: 1,
					borderColor: '#000',
					hoverBorderWidth: 3,
					hoverBorderColor: '#000'
				}]
			},
			options:{
				scales: {
			        yAxes: [{
			            ticks: {
			                beginAtZero: true,
			            }
			        }]
			    },

				title:{
					display: true,
					text: 'Weekly Sales',
					fontSize: 25
				},

				legend:{
					position:'bottom',
					display:false,
				},

				layout:{
					padding: 50,
				}
			}
		});
	</script>
@endsection

