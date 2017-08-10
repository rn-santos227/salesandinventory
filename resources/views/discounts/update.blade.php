@foreach($discounts as $discount)
<div class="modal fade modalMolder" id="update{{$discount->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
        <form class="form-horizontal" method="POST" action="/discounts/{{ $discount->id }}">
            <div class="panel-heading">Edit discount</div>
            <div class="panel-body">
                    {{ method_field('PUT')  }}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                        <div class="col-md-6">
                            <input id="update-ref_code" type="text" class="form-control" name="ref_code" value="{{$discount->ref_code}}" required>
                            <strong id="update-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="update-name" type="text" class="form-control" name="name" value="{{$discount->name}}" required>
                            <strong id="update-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                        <label for="rate" class="col-md-4 control-label">Rate</label>

                        <div class="col-md-6">
                            <input id="update-rate" type="text" class="form-control numeric" name="rate" value="{{$discount->rate}}" required>
                            <strong id="update-rate_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-6">
                            <textarea rows="4" id="update-description" type="text" class="form-control" name="description" required>{{$discount->description}}
                            <strong id="update-description_message" style="color:#FF0000;"></strong>
                            </textarea>
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                        <label for="active" class="col-md-4 control-label">Status</label>

                        <div class="col-md-6">
                            <select id="update-active" type="text" class="form-control" name="active" required>
                                @if($discount->active == "Active")
                                    <option selected>Active</option>
                                    <option>Inactive</option>
                                @else
                                    <option>Active</option>
                                    <option selected>Inactive</option>
                                @endif
                            </select>
                            <strong id="update-active_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
            </div>
            <div class="panel-footer clearfix">
                <button type="submit" class="btn btn-primary pull-right" style="margin-right: 10px">
                    <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                </button>

                <button type="submit" data-dismiss="modal" class="btn btn-danger pull-right" style="margin-right: 10px">
                    <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                </button>
            </div>
        </form>
        </div>            
    </div>
</div>
@endforeach