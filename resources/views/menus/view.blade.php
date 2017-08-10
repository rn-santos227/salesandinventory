@foreach($menus as $menu)
<div class="modal fade modalMolder" id="view{{$menu->id}}" role="dialog" >
    <div class="modal-dialog">
        <div class="panel panel-default">
            <div class="panel-heading">View menu</div>
            <form class="form-horizontal" method="POST" action="/menus">
                {{ csrf_field() }}

                <div class="panel-body">
                    <div class="form-group" id="ref_code">
                        <label for="ref_code" class="col-md-4 control-label">Reference Code</label>

                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="ref_code" type="text" class="form-control" name="ref_code" value="{{$menu->ref_code}}" readonly autofocus>
                        </div>
                    </div>
                    
                    <div class="form-group" id="name">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="name" type="text" class="form-control" name="name" value="{{$menu->name}}" readonly autofocus>
                        </div>
                    </div>

                    <div class="form-group" id="description">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-7">
                            <textarea style="background-color:#ffffff;" rows="4" id="description" type="text" class="form-control" name="description" readonly>{{$menu->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group" id="cost">
                        <label class="control-label col-sm-4">Cost:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="cost" name="cost" value="{{$menu->cost}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="price">
                        <label for="price" class="col-md-4 control-label">Price</label>

                        <div class="col-md-7">
                            <input style="background-color:#ffffff;" id="price" type="text" class="form-control" name="price" value="{{$menu->price}}" readonly autofocus>
                        </div>
                    </div>

                    <div class="form-group" id="category">
                        <label class="control-label col-sm-4">Category:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="category" name="category" value="{{$menu->category->name}}" readonly>
                        </div>
                    </div>

                    <div class="form-group" id="active">
                        <label class="control-label col-sm-4">Status:</label>
                        <div class="col-sm-7">
                            <input style="background-color:#ffffff;" type="text" class="form-control" id="active" name="active" value="{{$menu->active}}" readonly>
                        </div>
                    </div>
                </div>

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