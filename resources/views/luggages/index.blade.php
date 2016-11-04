@extends('layouts.app')
@section('postJquery')
@parent
$('.edit-luggage').on('click',function(){
    var luggage = $(this).data('id');
    $("input[name=luggage_name]").val(luggage['luggage_name']);
    $("textarea[name=luggage_description]").val(luggage['luggage_description']);    
    $("input[name=id]").val(luggage['id']);
});
@endsection
@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
<div class="row">
    <h3 class="well">Your Luggages List</h3>
    <table class="table table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Luggage Number</th>
                <th>Luggage Name</th>
                <th>Luggage Description</th>               
                <th>Action</th>
                <!-- Trigger the create luggage modal with a button -->
                <th colspan="3"><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#createLuggageModal">Add Luggage</button></th>
    
            </tr>
        </thead>
        <tbody>
            <?php $num = 1; ?>
            @foreach ($luggages as $luggage)
            <tr>
                <td>{{$num}}</td>
                <td>{{$luggage->luggage_name}}</td>
                <td>{{$luggage->luggage_description}}</td>
                <td><a class="btn btn-primary" href="manageItemsToLuggage/{{$luggage->id}}">Assign Items</a>
                <td><button type="button" class="btn btn-primary edit-luggage" data-id="{{$luggage}}" data-toggle="modal" data-target="#editLuggageModal"> Edit </button></td>
                <td><a class="btn btn-danger" href="deleteLuggage/{{$luggage->id}}">Remove</a></td>
            </tr>
            <!-- Edit the current luggage modal start-->
        <div class="modal fade" id="editLuggageModal" role="dialog">
            <div class="modal-dialog">    
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title well">Edit a Luggage</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/editLuggage/{{$luggage->id}}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <input type="hidden" name="id" value="{{$luggage->id}}">
                            <div class="form-group">
                                Luggage Name:*<input name="luggage_name" class="form-control" value="{{$luggage->luggage_name}}">            
                            </div>
                            <div class="form-group">
                                Luggage Description:*<textarea name="luggage_description" class="form-control">{{$luggage->luggage_description}}</textarea>            
                            </div>           
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>            
                </div>
            </div>
        </div>
        <?php $num++; ?>
        <!-- Edit the current luggage modal end-->
        @endforeach
        </tbody>
    </table>    
</div>
<!-- Create a new luggage modal start-->
<div class="modal fade" id="createLuggageModal" role="dialog">
    <div class="modal-dialog">    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title well">New Luggage</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="/luggages/{{$user_id}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                    <div class="form-group">
                        Luggage Name:*<input name="luggage_name" class="form-control" value="{{old('luggage_name')}}">            
                    </div>
                    <div class="form-group">
                        Luggage Description:*<textarea name="luggage_description" class="form-control">{{old('luggage_description')}}</textarea>            
                    </div>                              
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add Luggage</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
<!-- Create a new luggage modal end-->
@endsection