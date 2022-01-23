@extends('layouts.app')
@section('title','Package Lists')
@section('content')
    <div class="container py-4">
        <div class="container text-center text-dark">
            <h3>Shipping Progress</h3>
        </div>
        <br>
        <div class="row col-sm-12 text-center">
            <div class="col-sm-3">
                <h4>Confirmed</h4><hr>
                @if (count( $confirmeds)>0)
                    @foreach ( $confirmeds as $confirmed )
                    <li title="{{$confirmed->created_at->format('y-m-d')}}"> {{$confirmed->track_no}}<span title="Move to Ready to Ship"><a href="/admin/package/rdy_to_ship/{{$confirmed->id}}">&nbsp; <i class="fa fa-check-circle-o" aria-hidden="true"></i></a></span></li><hr>
                    @endforeach
                @else
                    <li>No any Confirmed Package</li>
                @endif
                <br>
            </div>
            <div class="col-sm-3">
                <h4>Ready to Ship</h4><hr>
                @if (count( $ready_to_ships)>0)
                    @foreach ( $ready_to_ships as $ready_to_ship)
                        <li title="{{$ready_to_ship->updated_at->format('y-m-d')}}"> {{$ready_to_ship->track_no}} <span title="Move to Shipped"><a href="/admin/package/shipped/{{$ready_to_ship->id}}">&nbsp; <i class="fa fa-gift text-info" aria-hidden="true"></i></a></span></li><hr>
                    @endforeach
                @else 
                    <li>No any Ready to Ship Package</li>
                @endif
                <br>
            </div>
            <div class="col-sm-3">
                <h4>Shipped</h4><hr>
                @if (count( $shippeds)>0)
                    @foreach ( $shippeds as $shipped)
                        <li title="{{$shipped->updated_at->format('y-m-d')}}"> {{$shipped->track_no}} <span title="Move to Arrived"><a href="/admin/package/arrived/{{$shipped->id}}">&nbsp; <i class="fa fa-plane text-danger"></i></a></span></li><hr>
                    @endforeach
                @else
                    <li>No any Shipped Package</li>
                @endif
                <br>
            </div>
            <div class="col-sm-3">
                <h4>Arrived </h4><hr>
                @if (count( $arriveds)>0)
                    @foreach ( $arriveds as $arrived)
                        <li title="{{$arrived->updated_at->format('y-m-d')}}"> {{$arrived->track_no}} <span title="Package Arrived">&nbsp; <i class="fa fa-home text-success" aria-hidden="true"></i></span></li><hr>
                    @endforeach
                @else
                    <li>No any Arrived Package</li>
                @endif
                <br>
            </div>
        </div>
        <hr>
    </div>
@endsection 