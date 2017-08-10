<div class="modal fade modalMolder" id="create" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">Add Menu</div>
            <form class="form-horizontal" method="POST" action="/menus" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="panel-body">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-7">
                            <input id="add-name" type="text" class="form-control" name="name" required autofocus>
                            <strong id="add-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                        <div class="col-md-7">
                            <input id="add-ref_code" type="text" class="form-control" name="ref_code" required>
                            <strong id="add-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="image" class="col-md-4 control-label"> Image</label>
                        <div class="col-md-6">
                            <input type="file" class="btn btn-primary" name="image" id="add-image" value="{{ old('image') }}">
                            <strong id="add-image_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label for="category_id" class="col-md-4 control-label">Category</label>
                        <div class="col-md-7">
                            <select class="form-control" id="add-category_id" name="category_id" required>
                            @forelse($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                            @empty
                                <option value="0">Default</option>
                            @endforelse
                            </select>
                            <strong id="add-category_id_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-7">
                            <textarea rows="4" id="add-description" type="text" class="form-control" name="description">
                            </textarea>
                            <strong id="add-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                        <label for="cost" class="col-md-4 control-label">Cost</label>

                        <div class="col-md-7">
                            <input id="add-cost" type="number" min="1" max="999999" class="form-control" name="cost" required>
                            <strong id="add-cost_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price" class="col-md-4 control-label">Price</label>

                        <div class="col-md-7">
                            <input id="add-price" type="number" min="1" max="999999" class="form-control" name="price" required>
                            <strong id="add-price_message" style="color:#FF0000;"></strong>
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
