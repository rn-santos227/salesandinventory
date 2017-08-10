@foreach($discounts as $discount)
<div class="modal fade modalMolder" id="view{{$discount->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <form class="form-horizontal" method="POST" action="/discounts">
            {{ csrf_field() }}
                <div class="panel-heading">View discount</div>
                <div class="panel-body">    
                    <div class="form-group" id="ref_code">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="ref_code" type="text" class="form-control" name="ref_code" value="{{$discount->ref_code}}" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group" id="name">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="name" type="text" class="form-control" name="name" value="{{$discount->name}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="rate">
                        <label for="rate" class="col-md-4 control-label">Rate</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="rate" type="number" class="form-control" name="rate" value="{{$discount->rate}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="description">
                        <label for="description" class="col-md-4 control-label">Description</label>
                        <div class="col-md-7">
                            <textarea style="background-color:#ffffff;" rows="4" id="description" type="text" class="form-control" name="description" readonly>{{$discount->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group" id="active">
                        <label class="control-label col-sm-4">Status:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="activa" name="active" value="{{$discount->active}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="created_at">
                        <label class="control-label col-sm-4">Created At:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="created_at" name="created_at" value="{{$discount->created_at}}" readonly>
                        </div>
                    </div>
                
                    <div class="form-group" id="updated_at">
                        <label class="control-label col-sm-4">Last Updated:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="updated_at" name="updated_at" value="{{$discount->updated_at}}" readonly>
                        </div>
                    </div>
                </div>
                <div class = "panel-footer clearfix">
                    <button type="submit" data-dismiss="modal" class="btn btn-danger pull-right" style="margin-right: 10px">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>
            </form>
        </div>            
    </div>
</div>
@endforeach