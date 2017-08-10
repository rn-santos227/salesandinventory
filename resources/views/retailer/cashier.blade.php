<div class="modal fade modalMolder" id="cashier" role="dialog" >
	<div class="modal-dialog">
		 <div class="panel panel-default">
			 <form class="form-horizontal" enctype="multipart/form-data">
	            {{ csrf_field() }}
			 	<div class="panel-heading"><h3><i class="fa fa-money" aria-hidden="true"></i> Cashier </h3></div>
			 	<div class="panel-body">
			 	    <div class="form-group{{ $errors->has('count') ? ' has-error' : '' }}">
                        <label for="count" class="col-md-3 control-label">Item Count: </label>
                        <div class="col-md-8">
                            <input id="cashier-count" type="text" class="form-control" name="count" readonly style="background-color:#ffffff;">
                        </div>
                    </div>

                  	<div class="form-group{{ $errors->has('amount_due') ? ' has-error' : '' }}">
                        <label for="cashier-amount_due" class="col-md-3 control-label">Amount Due: </label>
                        <div class="col-md-8">
                            <input id="cashier-amount_due" type="text" class="form-control" name="amount_due" readonly style="background-color:#ffffff;">
                        </div>
                    </div>

                  	<div class="form-group{{ $errors->has('cash') ? ' has-error' : '' }}">
                        <label for="cash" class="col-md-3 control-label">Cash: </label>
                        <div class="col-md-8">
                            <input id="cashier-cash" type="number" min="1" class="form-control" name="cash" required  style="background-color:#ffffff;">
                                <span class="help-block"><strong class="error"></strong></span>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('change_due') ? ' has-error' : '' }}">
                        <label for="change_due" class="col-md-3 control-label">Change Due: </label>
                        <div class="col-md-8">
                            <input id="cashier-change_due" type="number" min="1" class="form-control" name="cashier-change_due" readonly style="background-color:#ffffff;">
                        </div>
                    </div>
                <!-- end panel body -->  
			 	</div>
              	<div class="panel-footer clearfix">  
                    <button type="submit" class="btn btn-primary pull-right" style="margin-right: 10px;" id="cashier-submit">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right" style="margin-right: 10px;">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>
			</form>
		</div>
	</div>
</div>
