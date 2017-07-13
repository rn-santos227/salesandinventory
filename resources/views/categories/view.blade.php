@foreach($categories as $category)
<div class="modal fade modalMolder" id="view{{$category->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">View Category</div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="/categories">
                    {{ csrf_field() }}
                    
                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                        <div class="col-md-6">
                            <input id="ref_code" type="text" class="form-control" name="ref_code" value="{{$category->ref_code}}" readonly autofocus>

                            @if ($errors->has('ref_code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ref_code') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{$category->name}}" readonly autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-6">
                            <textarea rows="4" id="description" type="text" class="form-control" name="description" readonly>{{$category->description}}

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                        <label for="contact" class="col-md-4 control-label">Status</label>

                        <div class="col-md-6">
                            <select id="active" type="text" class="form-control" name="active" readonly disabled>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                            @if ($errors->has('active'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('active') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" data-dismiss="modal" class="btn btn-danger">
                                Dismiss
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>            
    </div>
</div>
@endforeach