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
                  <li class="active"><a href="/salesreports/grossprofits">Gross Profits</a></li>
                  <li><a href="/salesreports/salesanalysis">Sales Analysis</a></li>
                </ul>
                <br>

                <form action="" method="post" class="form-inline">
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
                            <th>Sales</th>
                            <th>Cost of Goods Sold</th>
                            <th>Gross Profit</th>
                            <th>Period</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
