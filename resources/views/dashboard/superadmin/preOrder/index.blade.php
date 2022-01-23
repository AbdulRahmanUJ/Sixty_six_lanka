@extends('layouts.superadmin.app')
@section('title', 'Pre Order Package List')
@section('content')
{{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}
<style>
    ..w3-third.w3-border-red{
        border-color: #222E3C !important;
        background: #222e3c27;
    }
    .w3-row .w3-third{
        width: 20% !important;
    }
    ..w3-third i{
        color: #e61235;
        font-size: 20px;
    }
</style>
@section('dashboard_title', 'Pre Order Package')
<section class="superadmin_pre_order_package">
    <div class="w3-container card">
        <div class="col-md-12 d-flex pt-1">
            <a href="javascript:void(0)" onclick="openCity(event, 'pending');" style="margin-right: 20px">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-red"><i class="fas fa-boxes"></i> Pending Package</div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'approved');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding"><i class="fas fa-calendar-check"></i> Approved</div>
            </a>
        </div>

        <div id="pending" class="w3-container city " style="display:block">
            <div class="">
                <div class="card-body">
                    <table class="table mb-0  table-hover">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th scope="col">Pre Order Track</th>
                                <th scope="col">Sender Name</th>
                                <th scope="col">Sen Country</th>
                                <th scope="col">Sen State</th>
                                <th scope="col">Receiver Name</th>
                                <th scope="col">Rec Country</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($pre_order_pending)>0)
                                @foreach ($pre_order_pending as $pre_order_pending)
                                    <tr>
                                        <td><a href="/superadmin/preorder/show_preorder/{{$pre_order_pending->id}}" title="View pre_order_pending {{$pre_order_pending->name}}">
                                                {{ $pre_order_pending->pre_order_track_no }}
                                            </a>
                                        </td>
                                        <td><a href="/superadmin/user/show/{{ $pre_order_pending->sender->id }}">{{ $pre_order_pending->sender->name }}</a></td>
                                        <td>{{ $pre_order_pending->sender_address->country->country_name }}</td>
                                        <td>{{ $pre_order_pending->sender_address->state->name }}</td>
                                        <td><a href="/superadmin/receiver/show/{{ $pre_order_pending->receiver->id }}">{{ $pre_order_pending->receiver->name }}</a></td>
                                        <td>{{ $pre_order_pending->receiver_address->country->country_name }}</td>
                                        <td class="d-flex justify-content-sm-center">
                                            {{-- <a href="/admin/package/create/{{$pre_order_pending->id}}" title="Add Package to {{$pre_order_pending->name}}"><i class="text-primary" data-feather="file-plus"></i></a> --}}
                                            <a href="/superadmin/preorder/edit/{{$pre_order_pending->id}}" title="Edit pre_order {{$pre_order_pending->name}}"><i class="text-success" data-feather="edit"></i></a>
                                            <form action="/superadmin/preorder/delete/{{$pre_order_pending->id}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" title="Delete pre_order {{$pre_order_pending->name}}" class="border-0 bg-transparent p-0" onclick="return confirm('Are you sure you want to delete pre_order {{$pre_order_pending->name}}');"><i class="text-danger" data-feather="trash-2"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h3>No pre_orders Added</h3>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="approved" class="w3-container city" style="display:none">
            <div class="">
                <div class="card-body">
                    <table class="table mb-0  table-hover">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th scope="col">Pre Order Track</th>
                                <th scope="col">Sender Name</th>
                                <th scope="col">Sen Country</th>
                                <th scope="col">Sen State</th>
                                <th scope="col">Receiver Name</th>
                                <th scope="col">Rec Country</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($pre_order_approved)>0)
                                @foreach ($pre_order_approved as $pre_order_approved)
                                    <tr>
                                        <td><a href="/superadmin/preorder/show_preorder/{{$pre_order_approved->id}}" title="View pre_order_approved {{$pre_order_approved->name}}">
                                                {{ $pre_order_approved->pre_order_track_no }}
                                            </a>
                                        </td>
                                        <td><a href="/superadmin/user/show/{{ $pre_order_approved->sender->id }}">{{ $pre_order_approved->sender->name }}</a></td>
                                        <td>{{ $pre_order_approved->sender_address->country->country_name }}</td>
                                        <td>{{ $pre_order_approved->sender_address->state->name }}</td>
                                        <td><a href="/superadmin/receiver/show/{{ $pre_order_approved->receiver->id }}">{{ $pre_order_approved->receiver->name }}</a></td>
                                        <td>{{ $pre_order_approved->receiver_address->country->country_name }}</td>
                                        {{-- <td class="d-flex justify-content-sm-center">
                                            <a href="/admin/package/create/{{$pre_order_approved->id}}" title="Add Package to {{$pre_order_approved->name}}"><i class="text-primary" data-feather="file-plus"></i></a>
                                            <a href="/superadmin/pre_order/edit/{{$pre_order_approved->id}}" title="Edit pre_order {{$pre_order_approved->name}}"><i class="text-success" data-feather="edit"></i></a>
                                            <form action="/superadmin/pre_order/delete/{{$pre_order_approved->id}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" title="Delete pre_order {{$pre_order_approved->name}}" class="border-0 bg-transparent p-0" onclick="return confirm('Are you sure you want to delete pre_order {{$pre_order_approved->name}}');"><i class="text-danger" data-feather="trash-2"></i></button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            @else
                                <h3>No pre_orders Added</h3>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
  <script>
    function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.firstElementChild.className += " w3-border-red";
    }
</script>
@endsection
