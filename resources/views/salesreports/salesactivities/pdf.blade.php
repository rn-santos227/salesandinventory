<style type="text/css">
    body{
        font-size: 11px;
    }
	table {
    		    font-family: arial, sans-serif;
                
    		    border-collapse: collapse;
    		    width: 100%;
    		}
    		td, th {
    		    border: 1px solid #dddddd;
    		    text-align: left;
    		}
    .box
    {
        width: 33.33%;
        float: left;
    }
</style>
    <!-- {{$company}} -->
    <div align="center">Sales Activity Report<br>{{$period}} Report<br>{{$datefrom->format('m/d/Y')}} through {{$dateto->format('m/d/Y')}}</div><br>
    <!-- {{Carbon\Carbon::now()}} -->
<div>
    <table id="myTable" class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Vatable</th>
            <th>Vat</th>
            <th>Vat Exempt</th>
            <th>Vat Zero</th>
            <th>Amount Due</th>
            <th>Cash</th>
            <th>Change Due</th>
            <th>User ID</th>
            <th>Date</th>
        </tr>
    <thead>
    </thead>
        <tbody>
            @forelse($receipts as $receipt) 
                <tr>
                    <td>{{$receipt->id}}</td>
                    <td>{{$receipt->total}}</td>
                    <td>{{$receipt->vatable}}</td>
                    <td>{{$receipt->vat}}</td>
                    <td>{{$receipt->vat_exempt}}</td>
                    <td>{{$receipt->vat_zero}}</td>
                    <td>{{$receipt->amount_due}}</td>
                    <td>{{$receipt->cash}}</td>
                    <td>{{$receipt->change_due}}</td>
                    <td>{{$receipt->user_id}}</td>
                    <td>{{\Carbon\Carbon::parse($receipt->created_at)->format('j F Y h:i A')}}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>