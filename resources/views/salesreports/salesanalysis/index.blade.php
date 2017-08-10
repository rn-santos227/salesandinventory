@extends('admin.home')

@section('page')
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h3><i class="fa fa-truck" aria-hidden="true"></i> Sales Reports</h3></div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
				  <li><a href="/salesreports/salesactivities">Sales Activity</a></li>
				  <li><a href="/salesreports/sellingitems">Top/Worst Selling Items</a></li>
				  <li><a href="/salesreports/grossprofits">Gross Profits</a></li>
                  <li class="active"><a href="/salesreports/salesanalysis">Sales Analysis</a></li>
				</ul>

                <br>
                <form action="/salesreports/salesanalysis/search" method="post" class="form-inline">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Date From:</label>
                        <input type="date" name="datefrom" id="datefrom" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Date To:</label>
                        <input type="date" name="dateto" id="dateto" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Period:</label>
                        <select name="period" id="period" class="form-control">
                            <option></option>
                            <option>Daily</option>
                            <option>Weekly</option>
                            <option>Monthly</option>
                            <option>Yearly</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-md" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                    </div>
                </form>
                <br>
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Ref Code</th>
                            <th>Qty.</th>
                            <th>Cost</th>
                            <th>Total Cost</th>
                            <th>Price</th>
                            <th>Gross Rev.</th>
                            <th>Profit</th>
                            <th>Gross Margin</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @forelse($salesanalysis as $item) 
                        <tr>
                            <td>{{$item->ref_code}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->cost}}</td>
                            <td>{{$item->total_cost}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->gross_rev}}</td>
                            <td>{{$item->profit}}</td>
                            <td>{{$item->percent}}</td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
                        <strong>{{number_format($total_cost,2)}}</strong>
                        <strong>{{number_format($total_gross_rev,2)}}</strong>
                        <strong>{{number_format($total_profit,2)}}</strong>
                    
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/tablesort.js') }}" type="text/javascript"></script>
@endsection
