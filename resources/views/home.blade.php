@extends('layouts.app')

@section('content')
<style>
    .card {
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: .25rem;
        transition: all 0.3s;
    }

    .user .card:hover{
        box-shadow: 3px 3px 8px #181818;
    }
    .edit_btn a:hover{
        background: none;
        box-shadow: 1px 1px 3px #293745;
        border: solid 1px transparent;
    }
    .user_profile .profile{
        position: relative;
        width:100%;
        height:100%;
        border-radius: 50%;
        justify-content: center;
        align-items: center;
        left: 0;
        right: 0;
    }
    .user_profile .profile .profile_set{
        position: relative;
        margin: auto;
        width:200px;
        height:200px;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 2px 2px 5px #34495E;
        /* background: #34495E; */
    }
    .user_profile .profile_image{
        position: relative;
        margin: auto;
        width:100%;
        height:100%;
        border-radius: 50%;
    }
    .user_profile .profile .profile_image i{
        position: absolute;
        right: -20px;
        margin-top: 25px;
        width: 25px;
        height: 25px;
        /* padding: 3px; */
        font-size: 18px;
        line-height: 25px;
        color: #34495E;
        box-shadow: 0px 0px 5px #34495E;
        transition: all .5s;
        background: #ffffff;
        border-radius: 50%;
        cursor: pointer;
        font-weight: 500;

    }
    .user_profile .profile_image img{
        border-radius: 50%;
        width:100%;
        height:100%;
    }
    .user_profile .profile .profile_update{
        /* position: absolute; */
        width: 50%;
        left: 0;
        right: 0;
    }
    .user_profile .profile .profile_update i{
        position: absolute;
        margin: auto;
        left: 0;
        right: 0;
        height: 30%;
        bottom: -100px;
        line-height: 50px;
        font-size: 25px;
        width: 92%;
        color: #ffffff;
        background: #34495E;
        transition: all .5s;
        cursor: pointer;
    }
    .user_profile .profile .profile_set:hover .profile_update i{
        bottom: 0px;
    }
    .user_profile .profile .profile_set .profile_update i:hover{
        bottom: 0px;
        color: #34495E;
        background: #ffffffa2;
    }
    .user_profile .profile .profile_set .profile_image i:hover{
        color: #e22d2d;
        background: #ffffffa2;
    }
    .user_profile .profile .profile_set:hover .profile_image i{
        right: 28px;
    }
    @media only screen and (max-width: 995px){
        .user_profile .profile .profile_set{
        width:180px;
        height:180px;
    }
    }
    .w3-row .w3-third.w3-border-red{
        border-color: #222E3C !important;
        border-bottom: solid 2px #222E3C;
    }
    .w3-row .w3-third i{
        color: #e61235;
        font-size: 20px;
    }
    .w3-row a{
        font-size: 13px;
        font-weight: 600;
    }
</style>

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3 user">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex user_profile flex-column align-items-center text-center rounded">
                            <form id="form" action="{{ url('update_profile_image/'.Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="profile">
                                    <div class="profile_set">
                                        <div class="profile_image">
                                            @if (auth()->user()->image)
                                                <img src="{{ asset('users/profile/'.Auth::user()->image) }}" alt="profile Image">
                                            @endif
                                            @if (Auth::user()->image !== 'user.png')
                                                <a href="{{ url('delete_profile_image/'.Auth::user()->id) }}">
                                                    <i class="fa fa-trash-o" aria-hidden="true" title="Delete Profile Image"></i>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="profile_update">
                                            <i class="fa fa-cloud-upload" aria-hidden="true"  onclick="document.getElementById('getFile').click()" title="Upload New Profile Image"></i>
                                            <input type="file" name="image" id="getFile" style="display:none">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-3">
                                <h4>{{ Auth::user()->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 user">
              <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title mb-4">Personal Information</h4>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Name</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ Auth::user()->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Email</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ Auth::user()->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Phone</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ Auth::user()->phone }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Address</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $userAddress->address }}, {{ $userAddress->city->name }}. {{ $userAddress->state->name }}. {{ $userAddress->country->country_name }}.
                    </div>
                  </div>
                  @if (Auth::user()->role=='user')
                  <hr>
                    <div class="row">
                        <div class="col-sm-12 py-2 text-right edit_btn">
                        <a href="/user/edit/{{ Auth::user()->id }}" class="btn btn-outline-primary text-dark"><b>Edit Profile</b></a>
                        </div>
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              @if (Auth::user()->role=='super_admin')
              <div class="row gutters-sm">
                <div class="col-sm-12 mb-3">
                  <div class="card h-100 bg-danger">
                    <div class="card-body">

                    </div>
                  </div>
                </div>
              </div>
              @elseif (Auth::user()->role=='admin')
              <div class="row gutters-sm">
                <div class="col-sm-12 mb-3">
                  <div class="card h-100 bg-info">
                    <div class="card-body">

                    </div>
                  </div>
                </div>
              </div>
              @elseif (Auth::user()->role=='user')
                @if (count($pre_order_package)>0)
                    <div class="row gutters-sm">
                        <div class="col-sm-12 mb-3 card">
                            <div class="card-body">
                                    <div class="w3-row d-flex flex-row justify-content-around">
                                        <a href="javascript:void(0)" onclick="openCity(event, 'pending-collection');">
                                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-red">Pending Package</div>
                                        </a>
                                        <a href="javascript:void(0)" onclick="openCity(event, 'approved');">
                                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Approved</div>
                                        </a>
                                    </div>

                                <div id="pending-collection" class="w3-container city" style="display:block ">
                                    <div class="">
                                        <div class="card-body">
                                            @if (count($pending_package)>0)
                                            <table class="table table-light table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Track No</th>
                                                        <th>Status</th>
                                                        <th>Total Weight</th>
                                                        <th>Courier Fee</th>
                                                        <th>Payment Method</th>
                                                        <th>Receiver</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($pending_package as $pending_packages)
                                                    <tr>
                                                        <td><a href="/preOrder/show/{{ $pending_packages->id }}">{{ $pending_packages->pre_order_track_no }}</a></td>
                                                        @if ($pending_packages->deliverystatus)
                                                            <td>
                                                                {{ $pending_packages->deliverystatus->name }}
                                                            </td>
                                                        @else
                                                            <td>Not Approved</td>
                                                        @endif
                                                        <td>{{ $pending_packages->total_kg_weight }} Kg</td>
                                                        <td>{{ $pending_packages->courier_fee }}</td>
                                                        <td>{{ $pending_packages->payment_method->name }}</td>
                                                        @if ($pending_packages->receiver)
                                                            <td><a href="/receiver/show/{{ $pending_packages->receiver->id }}">{{ $pending_packages->receiver->name }}</a></td>
                                                        @else
                                                            <td>No Receiver Available</td>
                                                        @endif
                                                        <td class="d-flex justify-content-around">
                                                            <a href="/preOrder/edit/{{$pending_packages->id}}"><i class="fa icon pencil fa-pencil" aria-hidden="true"></i></a>
                                                            <form action="/preOrderPackage/delete/{{$pending_packages->id}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="icon" onclick="return confirm('Are you sure you want to delete {{$pending_packages->track_no}} pending packages of {{$pending_packages->receiver->name}}');"> <i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <td>No Record Found</td>
                                            @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div id="approved" class="w3-container city" style="display:none">
                                    <div class="">
                                        <div class="card-body">
                                            @if (count($approved_package)>0)
                                            <table class="table table-light table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Track No</th>
                                                        <th>Status</th>
                                                        <th>Total Weight</th>
                                                        <th>Courier Fee</th>
                                                        <th>Payment Method</th>
                                                        <th>Receiver</th>
                                                        {{-- <th class="text-center">Actions</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($approved_package as $approved_packages)
                                                    <tr>
                                                        <td><a href="/preOrder/show/{{ $approved_packages->id }}">{{ $approved_packages->pre_order_track_no }}</a></td>
                                                        @if ($approved_packages->deliverystatus)
                                                            <td>
                                                                {{ $approved_packages->deliverystatus->name }}
                                                            </td>
                                                        @else
                                                            <td>Not Approved</td>
                                                        @endif
                                                        <td>{{ $approved_packages->total_kg_weight }} Kg</td>
                                                        <td>{{ $approved_packages->courier_fee }}</td>
                                                        <td>{{ $approved_packages->payment_method->name }}</td>
                                                        @if ($approved_packages->receiver)
                                                            <td><a href="/receiver/show/{{ $approved_packages->receiver->id }}">{{ $approved_packages->receiver->name }}</a></td>
                                                        @else
                                                            <td>No Receiver Available</td>
                                                        @endif
                                                        {{-- <td class="d-flex justify-content-around">
                                                            <a href="/preOrder/edit/{{$approved_packages->id}}"><i class="fa icon pencil fa-pencil" aria-hidden="true"></i></a>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            @else
                                                <td>No Record Found</td>
                                            @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
              @endif
            </div>
        </div>
    </div>
</div>
{{-- change profile image --}}
<script>
    $('#form').on('change', function(){
    $(this).closest('#form').submit();
});
</script>

{{-- tab --}}
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

{{-- <script>
    $('tbody.package').on('click', '#deleteRow', function(){
        $(this).closest('tr').remove();
    });
</script> --}}
@endsection
