@extends('layouts.app')
@section('title','Packages')
@section('content')
    <div class="container">
        <a href="/package/create" class="btn btnpack float-right" role="button">New Package &nbsp; <i class="fa fa-plus-square" aria-hidden="true"></i></a><br><br>
        <div class="table">
            <table class="table">
                <tr class="text-center bg-info text-white font-weight-bold text-uppercase">
                    <td>Receiver Name</td>
                    <td>Track No</td>
                    <td>Item Name</td>
                    <td>Pkg Type</td>
                    <td>Num of Boxes</td>
                    <td>Est Weight</td>
                    <td>Medium</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
                @if (count($packages)>0)
                    @foreach ($packages as $package)
                        <tr class="text-center bg-light">
                            <td><a href="/package/show/{{$package->id}}">{{$package->receiver->name}}</a></td>
                            <td>{{$package['track_no']}}</td>
                            <td>{{$package['item_name']}}</td>
                            <td>{{$package->packagetype->name}}</td>
                            <td>{{$package['num_of_box']}}</td>
                            <td>{{$package['est_weight']}} Kg</td>
                            <td >{{$package['medium']}}</td>
                            <td>{{$package['status']}}</td>
                            <td class="float-right d-flex flex-row">
                                <a href="/package/show/{{$package->id}}"><i class="fa icon eye fa-eye" aria-hidden="true"></i></a>
                                <a href="/package/edit/{{$package->id}}"><i class="fa icon pencil fa-pencil" aria-hidden="true"></i></a>
                                <a href="/package/preview/{{$package->id}}"><i class="fa icon print fa-print" aria-hidden="true"></i></a>
                                <form action="/package/delete/{{$package->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="icon" onclick="return confirm('Are you sure you want to delete {{$package->track_no}} Package of {{$package->receiver->name}}');"> <i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <h2 style="color: gray" class="col-12 text-center">Packages Not Found</h2> 
                @endif
            </table>
        </div>
        <div class="row justify-content-center align-center">
            {{$packages->links('pagination::bootstrap-4')}} 
        </div>
    </div>
@endsection