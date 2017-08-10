@foreach($categories as $category)
<div class="modal fade modalMolder" id="view{{$category->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">View Category</div>
            <form class="form-horizontal" method="POST" action="/categories">

                <!-- CSRF Tokens needed for Cross-Site Request Forgery(CSRF) Protection/Prevention -->
                {{ csrf_field() }}

                <div class="panel-body">    

                    <!-- View Field for Category Reference Code -->
                    <div class="form-group" id="ref_code">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="ref_code" type="text" class="form-control" name="ref_code" value="{{$category->ref_code}}" readonly >
                        </div>
                    </div>
                    
                    <!-- View Field for Category Name -->
                    <div class="form-group" id="name">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="name" type="text" class="form-control" name="name" value="{{$category->name}}" readonly >
                        </div>
                    </div>

                    <!-- View Field for Category Description -->
                    <div class="form-group" id="description">
                        <label for="description" class="col-md-4 control-label">Description</label>
                        <div class="col-md-7">
                            <textarea style="background-color:#ffffff;" rows="4" id="description" type="text" class="form-control" name="description" readonly>{{$category->description}}</textarea>
                        </div>
                    </div>

                    <!-- View Field for Category Status -->
                    <div class="form-group" id="active">
                        <label class="control-label col-sm-4">Status:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="active" name="active" value="{{$category->active}}" readonly>
                        </div>
                    </div>

                    <!-- View Field for Category Created_At -->
                    <div class="form-group" id="created_at">
                        <label class="control-label col-sm-4">Created At:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="created_at" name="created_at" value="{{$category->created_at}}" readonly>
                        </div>
                    </div>
                
                    <!-- View Field for Category Updated_At -->
                    <div class="form-group" id="updated_at">
                        <label class="control-label col-sm-4">Last Updated:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="updated_at" name="updated_at" value="{{$category->updated_at}}" readonly>
                        </div>
                    </div>
                </div>

                <!-- Submit and Dismiss Buttons -->
                <div class="panel-footer clearfix">  
                    <button type="button" data-dismiss="modal" class="btn btn-danger pull-right" style="margin-right: 10px;">
                        <i class="fa fa-times-circle" aria-hidden="true"></i> Dismiss
                    </button>
                </div>

            </form>
        </div>            
    </div>
</div>
@endforeach