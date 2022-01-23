@extends('layouts.app')
@section('title', 'Show Receiver')
@section('content')
@section('dashboard_title', 'Details of Receiver '.$receiver->name)
<section class="container show_receiver">
        {{-- <a class="btn btn-primary float-right" href="{{ URL::previous() }}" role="button"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Go Back</a><br><br> --}}
        <div class="row flex justify-content-center">
            <div class="col-md-6">
                <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Receiver Name</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$receiver->name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{$receiver->phone}}
                        </div>
                    </div>
                    <hr style="border-color: red">
                    @foreach ($receiver_address as $item)
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{$item->address}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">City</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{$item->city->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">State</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{$item->state->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Country</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{$item->country->country_name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Zip</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{ $item->zip }}
                            </div>
                        </div>
                        <div class="row float-right">
                            @if (count($receiver_address)>1)
                            <form action="/receiver_address/delete/{{ $item->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button title="Delete {{ $receiver->name }}s Address" type="submit" onclick="return confirm('Are you sure you want to delete this Address')" id='deleteAddress'  class='btn text-danger deleteAddress'><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            @endif
                            &nbsp;
                            <a href="/receiver_address/edit/{{$item->id}}" id='editAddress' class='btn text-primary editAddress'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </div>
                        <br>
                        <hr style="border-color: red">
                    @endforeach
                </div>
                </div>
            </div>
            <div class="row col-12 flex justify-content-center">
                <a href="/receiver_address/add/{{$receiver->id}}" class="border border-info rounded bg-info text-light py-1 px-3 ">New Address</a>&nbsp;&nbsp;&nbsp;
                <a href="/receiver/edit/{{$receiver->id}}" class="border border-secondary rounded bg-secondary text-light py-1 px-3">Edit</a>&nbsp;&nbsp;&nbsp;
                <form action="/receiver/delete/{{$receiver->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="border border-danger rounded bg-danger text-light py-1 px-3" title="Delete {{$receiver->name}}" onclick="return confirm('Are you sure you want to delete Receiver {{$receiver->name}}');">Delete</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (count($packages)>0)
                Total Packages : <b>{{count($packages)}}</b>
                    <table class="table responsive">
                        <tr class="text-center">
                            <th>Track No</th>
                            <th>Sender</th>
                            <th>Est Weight</th>
                            <th>Est Deli Date</th>
                            <th>Status</th>
                            <th>Is Picked</th>
                            <th>Person Receive</th>
                        </tr>
                            @foreach ($packages as $package)
                                <tbody >
                                    <tr class="text-center">
                                        <td><a href="/admin/package/show/{{$package->id}}">{{$package->track_no}}</a></td>
                                        @if ($package->sender)
                                        <td>{{$package->sender->name}}</td>
                                        @else
                                        <td>Sender Not Found</td>
                                        @endif
                                        <td>{{$package->total_kg_weight}}</td>
                                        <td>{{$package->est_deli_date}}</td>
                                        <td style="background: {{ $package->deliverystatus->color }}">{{$package->deliverystatus->name}}</td>
                                        <td>
                                            @if ($package->is_pickup==0)
                                                No
                                            @else
                                                Yes
                                            @endif
                                        </td>
                                        <td>
                                            @if ($package->person_recieves==null)
                                                Package not Received or not updated
                                            @else
                                                {{ $package->person_recieves }}
                                            @endif
                                    </tr>
                                </tbody>
                            @endforeach
                    </table>
                @else
                    <h2 style="color: gray" class="col-12 text-center">Receiver Doesn't have any Packages</h2>
                @endif
            </div>
        </div>
</section>
<script>
    $(document).ready(function () {

        $("#deleteAddress").click(function(e){
            if(!confirm("Do you want to Delete this Address?")) {
            return false;
        }
        e.preventDefault();
        // var id = $(this).data("id");
        var id = $(this).attr('data-id');
        var token = $("meta[name='csrf-token']").attr("content");
        // var url = e.target;
            $.ajax(
                {
                url: "/admin/receiver_address/delete/"+id, //or you can use url: "movie/"+id,
                type: 'DELETE',
                data: {
                    _token: token,
                        id: id
                },
                success: function (response){

                    window.location.reload();
                }
            });
        return false;
        });
    });
</script>
@endsection
