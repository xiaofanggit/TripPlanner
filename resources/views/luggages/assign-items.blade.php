@extends('layouts.app')
@section('content')
@if(Session::has('flash_message'))
<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
<div class="row">
    <h3 class="well">Luggage: {{$luggage->luggage_name}}  {{$luggage->luggage_description}}</h3>
    <div class="main-title">Assigned items list: </div>
    <?php $num = 1; ?>
    <ul class="list-group">
        @foreach ($luggage_items as $i)
            <li class="list-group-item">{{$num}}：{{$items[$i->item_id]->item_name}}</li>            
            <?php $num++; ?>
        @endforeach
    </ul>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-condensed">
            <thead>
                <tr>
                    <th>Luggage Number</th>
                    <th>Luggage Name</th>
                    <th>Luggage Description</th>               
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="success"><td colspan="4"><center><b>Available items</b><center></td></tr>
                <?php $num = 1; ?>
                @foreach ($items as $key => $item)
                    @if (array_key_exists($key,$luggage_items))
                        @continue
                    @endif
                <tr>
                    <td>{{$num}}</td>
                    <td>{{$item->item_name}}</td>
                    <td>{{$item->item_description}}</td>
                    <td><a class="btn btn-primary" href="/assignItemToLuggage/{{$luggage->id}}/{{$key}}">Assign Item</a></td>                
                </tr>

                <?php $num++; ?>
                @endforeach
                <tr class="success"><td colspan="4"><center><b>Assigned items</b><center></td></tr>
                <?php $num = 1; //dd($luggage_items);?>                        
                @foreach ($luggage_items as $i)
                    <tr>
                        <td>{{$num}}</td></td>
                        <td>{{$items[$i->item_id]->item_name}}</td>
                        <td>{{$items[$i->item_id]->item_description}}</td>
                        <td><a class="btn btn-primary" href="/removeItemsFromLuggage/{{$luggage->id}}/{{$i->item_id}}">Remove Item</a></td>                
                    </tr>
                <?php $num++; ?>
                @endforeach
            </tbody>
        </table> 
    </div>
</div>
@endsection