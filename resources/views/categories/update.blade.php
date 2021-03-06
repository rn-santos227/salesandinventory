@foreach($categories as $category)
<div class="modal fade modalMolder" id="update{{$category->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Category</div>
            <form class="form-horizontal" method="POST" action="/categories/{{ $category->id }}">

                <!-- Setting Method type to PUT needed for the Update Function -->
                {{ method_field('PUT')  }}

                <!-- CSRF Tokens needed for Cross-Site Request Forgery(CSRF) Protection/Prevention -->
                {{ csrf_field() }}
                
                <div class="panel-body">

                    <!-- Update Field for Category Reference Code -->
                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                        <div class="col-md-6">
                            <input id="update-ref_code" type="text" class="form-control" name="ref_code" value="{{$category->ref_code}}" required autofocus>
                            <strong id="update-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <!-- Update Field for Category Name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="update-name" type="text" class="form-control" name="name" value="{{$category->name}}" required autofocus>
                            <strong id="update-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <!-- Update Field for Category Description -->
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-6">
                            <textarea rows="4" id="update-description" type="text" class="form-control" name="description" required>{{$category->description}}
                            </textarea>
                            <strong id="update-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <!-- Update Field for Category Status -->
                    <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                        <label for="active" class="col-md-4 control-label">Status</label>

                        <div class="col-md-6">
                            <select id="update-active" type="text" class="form-control" name="active" required>
                                @if($category->active == "Active")
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

                    <!-- Submit and Dismiss Buttons -->
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
@endforeach