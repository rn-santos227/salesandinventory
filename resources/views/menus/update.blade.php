@foreach($menus as $menu)
<div class="modal fade modalMolder" id="update{{$menu->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">Edit menu</div>
            <form class="form-horizontal" method="POST" action="/menus/{{ $menu->id }}" enctype="multipart/form-data">
                {{ method_field('PUT')  }}
                {{ csrf_field() }}

                <div class="panel-body">
                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                        <div class="col-md-7">
                            <input id="update-ref_code" type="text" class="form-control" name="ref_code" value="{{$menu->ref_code}}" required autofocus>
                            <strong id="update-ref_code_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <div class="col-md-7">
                            <input id="update-name" type="text" class="form-control" name="name" value="{{$menu->name}}" required autofocus>
                            <strong id="update-name_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="image" class="col-md-4 control-label">Image</label>
                        <div class="col-md-6">
                            <input type="file" class="btn btn-primary" name="image" id="update-image" value="{{ old('image') }}" accept="image/*">
                            <strong id="update-image_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>                    

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-7">
                            <textarea rows="4" id="update-description" type="text" class="form-control" name="description" required>{{$menu->description}}
                            </textarea>
                            <strong id="update-description_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="cost" class="col-md-4 control-label">Cost</label>

                        <div class="col-md-7">
                            <input id="update-cost" type="number" class="form-control" name="cost" value="{{$menu->cost}}" required autofocus>
                            <strong id="update-cost_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price" class="col-md-4 control-label">Price</label>

                        <div class="col-md-7">
                            <input id="update-price" type="number" class="form-control" name="price" value="{{$menu->price}}" required autofocus>
                            <strong id="update-price_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label for="category_id" class="col-md-4 control-label">Category</label>
                        <div class="col-md-7">
                            <select class="form-control" id="update-category_id" name="category_id" required>
                            @forelse($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                            @empty
                                <option value="0">Default</option>
                            @endforelse
                            </select>
                            <strong id="update-category_id_message" style="color:#FF0000;"></strong>
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                        <label for="active" class="col-md-4 control-label">Status</label>

                        <div class="col-md-7">
                            <select id="update-active" type="text" class="form-control" name="active" required>
                                @if($menu->active == "Active")
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