@extends('layouts.app')
@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
<div class="row">
    <h3 class="well">Your Shoping List</h3>
    <table class="table table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Item Number</th>
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Item Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $num = 1; ?>
            @foreach ($items as $item)
            <tr>
                <td>{{$num}}</td>
                <td>{{$item->item_name}}</td>
                <td>{{$item->item_description}}</td>
                <td>{{$item->price}}</td>
                <td><a class="btn btn-danger" href="updatePurchaseStatus/{{$item->id}}">Pachase</a></td>
            </tr>
             <?php $num++; ?>
        @endforeach
        </tbody>
    </table>    
</div>
@endsection