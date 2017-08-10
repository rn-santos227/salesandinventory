@extends('admin.home')

@section('page')
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h3><i class="fa fa-truck" aria-hidden="true"></i> System Settings</h3></div>
            <div class="panel-body">
                <form method="POST" action="systemsettings/{{$systemsetting->id}}" class="form-horizontal" onsubmit="return confirm('Are you sure want to update system settings?');">
                    <!-- Setting Method type to PUT needed for the Update Function -->
                    {{ method_field('PUT') }}

                    <!-- CSRF Tokens needed for Cross-Site Request Forgery(CSRF) Protection/Prevention -->
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tax_rate">System Name:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="system_name" id="system_name" value="{{$systemsetting->system_name}}">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('system_mode') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="system_mode">Mode:</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="system_mode" name="system_mode" required>
                                <option value="{{$systemsetting->system_mode}}">{{$systemsetting->system_mode}}</option>

                                @if ($systemsetting->system_mode == 'Restaurant')
                                <option value='FastFood'>FastFood</option>
                                <option value='Retailer'>Retailer</option>

                                @elseif ($systemsetting->system_mode == 'Retailer')
                                <option value='FastFood'>FastFood</option>
                                <option value='Restaurant'>Restaurant</option>

                                @else
                                <option value='Retailer'>Retailer</option>
                                <option value='Restaurant'>Restaurant</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="id" value="1">
                        <label class="control-label col-sm-2" for="tax_rate">Tax Rate:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="tax_rate" id="tax_rate" value="{{$systemsetting->tax_rate}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="non_vat">Non-vat:</label>
                        <div class="checkbox col-sm-2">
                            <input type="checkbox" name="non_vat" id="non_vat" {{ $systemsetting->non_vat == 1 ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-default pull-right">Save changes</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
