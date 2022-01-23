@extends('layouts.superadmin.app')
@section('title', 'Super Admin | Show Sender')
@section('content')
@section('dashboard_title', 'Details of Sender '.$sender->name)
<section class="superadmin_show_sender">
        {{-- <a class="btn btn-primary float-right" href="{{ URL::previous() }}" role="button"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Go Back</a><br><br> --}}
        <div class="row flex justify-content-center">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">sender Name</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{$sender->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{$sender->phone}}
                            </div>
                        </div>
                        <hr style="border-color: red">
                        @foreach ($sender_address as $item)
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
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
                                @if (count($sender_address)>1)
                                    <form action="/superadmin/sender_address/delete/{{ $item->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button title="Delete {{ $sender->name }}s Address" type="submit" onclick="return confirm('Are you sure you want to delete this Address')" id='deleteAddress'  class='btn text-danger deleteAddress'><i data-feather="trash-2"></i></button>
                                    </form>
                                @endif
                                <a href="/superadmin/sender_address/edit/{{$item->id}}" id='editAddress' class='btn text-primary editAddress'><i data-feather="edit"></i></a>
                            </div>
                            <br>
                            <hr style="border-color: red">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row col-12 flex justify-content-center">
                <a href="/superadmin/sender_address/add/{{$sender->id}}" class="border border-info rounded bg-info text-light py-1 px-3 ">Add New Address</a>&nbsp;&nbsp;&nbsp;
                <a href="/superadmin/sender/edit/{{$sender->id}}" class="border border-secondary rounded bg-secondary text-light py-1 px-3">Edit</a>&nbsp;&nbsp;&nbsp;
                <form action="/superadmin/sender/delete/{{$sender->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="border border-danger rounded bg-danger text-light py-1 px-3" title="Delete {{$sender->name}}" onclick="return confirm('Are you sure you want to delete Sender {{$sender->name}}');">Delete</button>
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
                            <th>Esti Weight</th>
                            <th>Delivery Status</th>
                            <th>Receiver</th>
                            <th>Payment Method</th>
                            <th>Medium</th>
                            <th>Est Deli Date</th>
                            <th>Couriour fee</th>
                        </tr>
                            @foreach ($packages as $package)
                                <tbody >
                                    <tr class="text-center">
                                        <td><a href="/superadmin/package/show/{{$package->id}}">{{$package->track_no}}</a></td>
                                        <td>{{$package->total_kg_weight}}</td>
                                        <td>{{$package->deliverystatus->name}}</td>
                                        @if ($package->receiver)
                                            <td>{{$package->receiver->name}}</td>
                                        @else
                                            <td>Not Found</td>
                                        @endif
                                        <td>{{$package->paymentmethod->name}}</td>
                                        <td>{{$package->shippingmode->name}}</td>
                                        <td>{{$package->est_deli_date}}</td>
                                        <td>{{$package->courier_fee}}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                    </table>
                @else
                    <h2 style="color: gray" class="col-12 text-center">Sender Doesn't have any Packages</h2>
                @endif
            </div>
        </div>
</section>
{{-- <script type="text/javascript">
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
                url: "/superadmin/sender_address/delete/"+id, //or you can use url: "movie/"+id,
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
</script> --}}
@endsection
