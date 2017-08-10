
<div class="modal fade modalMolder" id="update" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">Update Company Description</div>
            <form class="form-horizontal" method="POST" action="/company/1">
                {{ method_field('PUT')  }}
                {{ csrf_field() }}
                <div class="panel-body">
                    <label>Company Name</label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control" name="name"  value = "{{$companies->name}}" required autofocus>

                        </div>
                    </div>
                    <label>Company Description</label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea rows="5" id="description" type="text" class="form-control" name="description">{{$companies->description}}</textarea>
                            
                        </div>
                    </div>
                </div> 

                                        
                <div class="panel-footer clearfix">  
                    <button type="submit" class="btn btn-primary pull-right" style="margin-right: 10px;">
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
