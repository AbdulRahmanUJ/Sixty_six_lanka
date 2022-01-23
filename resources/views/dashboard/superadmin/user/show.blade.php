@extends('layouts.superadmin.app')
@section('title', 'Super Admin | Show User')
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
    .user_profile .profile_image img{
        border-radius: 50%;
        width:100%;
        height:100%;
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
@section('dashboard_title', 'Profile of '.$user->name)
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3 user">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex user_profile flex-column align-items-center text-center rounded">
                            <form id="form" action="{{ url('update_profile_image/'.$user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="profile">
                                    <div class="profile_set" style="pointer-events: none">
                                        <div class="profile_image">
                                            @if (auth()->user()->image)
                                                <img src="{{ asset('users/profile/'.$user->image) }}" alt="profile Image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-3">
                                <h4>{{ $user->name }}</h4>
                                <p class="text-secondary mb-1">{{ $user->role  }}</p>
                                <p class="text-muted font-size-sm">{{ $userAddress->address }}, {{ $userAddress->city->name }} <br> {{ $userAddress->state->name }},{{ $userAddress->country->country_name }}</p>
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
                      {{ $user->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Email</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Phone</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->phone }}
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
                  @if ($user->role=='user')
                    @if ($user->id == Auth::user()->id)
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 py-2 text-right edit_btn">
                            <a href="/user/edit/{{ $user->id }}" class="btn btn-outline-primary text-dark"><b>Edit Profile</b></a>
                            </div>
                        </div>
                    @endif
                  @endif
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0  table-hover">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Zip</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userAddresses as $userAddresses)
                                    <tr>
                                        <td>{{ $userAddresses->address }}</td>
                                        <td>{{ $userAddresses->city->name }}</td>
                                        <td>{{ $userAddresses->state->name }}</td>
                                        <td>{{ $userAddresses->country->country_name }}</td>
                                        <td>{{ $userAddresses->zip }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if (count($pre_order_package)>0)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="mb-0">Pre Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0  table-hover">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th scope="col">Pre Order Track No</th>
                                        <th scope="col">Receiver Name</th>
                                        <th scope="col">Rec Country</th>
                                        <th scope="col">Is Approved</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pre_order_package as $pre_order_package)
                                        <tr>
                                            <td><a href="/superadmin/preorder/show_preorder/{{ $pre_order_package->id }}">{{ $pre_order_package->pre_order_track_no }}</a></td>
                                            <td>{{ $pre_order_package->receiver->name }}</td>
                                            <td>{{ $pre_order_package->receiver_address->country_name }}</td>
                                            <td>
                                                @if ($pre_order_package->status != 1)
                                                    No
                                                @else
                                                    Yes
                                                @endif
                                            </td>
                                            {{-- <td>{{ $pre_order_package-> }}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (count($package)>0)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="mb-0">Package</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0  table-hover">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th scope="col">Track No</th>
                                        <th scope="col">Receiver Name</th>
                                        <th scope="col">Rec Address</th>
                                        <th scope="col">Delivry Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($package as $package)
                                        <tr>
                                            <td>{{ $package->track_no }}</td>
                                            <td>{{ $package->receiver->name }}</td>
                                            <td>{{ $package->receiver_address->country->country_name }}</td>
                                            <td>{{ $package->deliverystatus->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
