@extends('layouts.app')
@section('postJquery')
    @parent
    $('.edit-item').on('click',function(){
     var item = $(this).data('id');
     $("input[name=item_name]").val(item['item_name']);
     $("textarea[name=item_description]").val(item['item_description']);
     $("input[name=price]").val(item['price']);
     if (item['need_purchased'] == 1){
        $("input[name=need_purchased]").attr('checked', true);
     }
     $("input[name=id]").val(item['id']);
    });
@endsection
@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
<div class="row">
    <!--<div class="col-xs-6 col-xs-offset-3">-->
    <h3 class="well">Your trip items</h3>
    <!-- Trigger the create item modal with a button -->
    
    <table class="table table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>{{trans('items.item_number')}}</th>
                <th>{{trans('items.item_name')}}</th>
                <th>{{trans('items.item_description')}}</th>
                <th>{{trans('items.need_purchase')}}</th>
                <th>{{trans('items.price')}}</th>
                <th>{{trans('items.action')}}</th>
                <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createItemModal">Create Items</button></th>
            </tr>
        </thead>
        <tbody>
            <?php $num = 1; $totalAmount = 0;?>
            @foreach ($items as $item)
            <tr>
                <td>{{$num}}</td>
                <td>{{$item->item_name}}</td>                
                <td>{{$item->item_description}}</td>
                <td>{{$item->need_purchased}}</td>
                <td>{{$item->price}}</td>
                <td><button type="button" class="btn btn-primary pull-right edit-item" data-id="{{$item}}" data-toggle="modal" data-target="#editItemModal"> Edit </button></td>
                <td><a class="btn btn-danger" href="deleteItem/{{$item->id}}">Remove</a></td>
            </tr>
            <!-- Edit the current item modal start-->
        <div class="modal fade" id="editItemModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title well">Edit Item</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/editItem">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <div class="form-group">
                                Item Name:<span class="warning">*</span><input name="item_name" class="form-control" value="{{$item->item_name}}" required>            
                            </div>
                            <div class="form-group">
                                Item Description:*<textarea name="item_description" class="form-control">{{$item->item_description}}</textarea>            
                            </div>
                            <div class="form-group">
                                Need Purchased: <input type="checkbox" name="need_purchased" value="{{$item->need_purchased}}" />            
                            </div>
                            <div class="form-group">
                                Price: <input type="number" name="price" value="{{$item->price}}" min="0" max="99999"/>            
                            </div>                    
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>            
                </div>
            </div>
        </div>
        <?php $num++;
        if ($item->need_purchased ==1):
            $totalAmount += $item->price;
        endif
        ?>
        <!-- Edit the current item modal end-->
        @endforeach
        </tbody>
    </table>
    <h3>Total need purchase item price is: {{$totalAmount}}</h3>
    <!--</div>-->
</div>
<!-- Create a new item modal start-->
<div class="modal fade" id="createItemModal" role="dialog">
    <div class="modal-dialog">    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title well">New Items</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="/items/{{$user_id}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                    <div class="form-group">
                        Item Name:<span class="warning">*</span><input name="item_name" class="form-control" value="{{old('item_name')}}" required>            
                    </div>
                    <div class="form-group">
                        Item Description:<textarea name="item_description" class="form-control">{{old('item_description')}}</textarea>            
                    </div>
                    <div class="form-group">
                        Need Purchased: <input type="checkbox" name="need_purchased" value="1" />            
                    </div>
                    <div class="form-group">
                        Price: <input type="number" name="price" value="{{0|old('price')}}" min="0" max="99999"/>            
                    </div>                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
<!-- Create a new item modal end-->
@endsection