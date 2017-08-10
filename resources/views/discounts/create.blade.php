<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $("#rate").keypress(function(){
            var keycode = evt.charCode || evt.keyCode;
            if (keycode == 190) {
                return false;
            }
        });
    });
</script>
<div class="modal fade modalMolder" id="create" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <form class="form-horizontal" method="POST" action="/discounts">
                <div class="panel-heading">Add Discount</div>
                <div class="panel-body">

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="add-name" type="text" class="form-control" name="name" required autofocus>
                                <strong id="add-name_message" style="color:#FF0000;"></strong>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                            <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                            <div class="col-md-6">
                                <input id="add-ref_code" type="text" class="form-control" name="ref_code" required>
                                <strong id="add-ref_code_message" style="color:#FF0000;"></strong>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                            <label for="rate" class="col-md-4 control-label">Rate/Percentage</label>

                            <div class="col-md-6">
                                <input id="add-rate" type="number" min="1" max="100" maxlength="3" class="form-control numeric" name="rate" required>
                                <strong id="add-rate_message" style="color:#FF0000;"></strong>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea rows="4" id="add-description" type="text" class="form-control" name="description">
                                </textarea>                                
                                <strong id="add-description_message" style="color:#FF0000;"></strong>
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
