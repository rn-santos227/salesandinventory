@foreach($suppliers as $supplier)
<div class="modal fade modalMolder" id="update{{$supplier->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Supplier</div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="/suppliers/{{ $supplier->id }}">
                    {{ method_field('PUT')  }}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('ref_code') ? ' has-error' : '' }}">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                        <div class="col-md-6">
                            <input id="ref_code" type="text" class="form-control" name="ref_code" value="{{$supplier->ref_code}}" required autofocus>

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
                            <input id="name" type="text" class="form-control" name="name" value="{{$supplier->name}}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{$supplier->email}}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label">Address</label>

                        <div class="col-md-6">
                            <textarea rows="4" id="address" type="text" class="form-control" name="address"required>{{$supplier->address}}
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                        <label for="contact" class="col-md-4 control-label">Contact</label>

                        <div class="col-md-6">
                            <input id="contact" type="text" class="form-control" name="contact" value="{{$supplier->contact}}" required>

                            @if ($errors->has('contact'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-6">
                            <textarea rows="4" id="description" type="text" class="form-control" name="description" required>{{$supplier->description}}

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
<!--                                <input id="contact" type="text" class="form-control" name="contact" value="{{$supplier->active}}" required>-->
                            <select id="active" type="text" class="form-control" name="active" required>    
                                @if($supplier->active == "Active")
                                    <option selected>Active</option>
                                    <option>Inactive</option>
                                @else
                                    <option>Active</option>
                                    <option selected>Inactive</option>
                                @endif
                                
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
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>            
    </div>
</div>
@endforeach