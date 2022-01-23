@extends('layouts.app')
@section('title','Users Lists')
@section('content')
    <div class="container py-4">
        <div class="container text-center text-dark">
            <h3>Users And Roles</h3>
        </div>
        <br>
        <div class="row col-sm-12 text-center">
            <div class="col-sm-6">
                <h4>Users</h4><hr>
                @if (count( $users)>0)
                    @foreach ( $users as $user )
                    <li> {{$user->name}}<span title="Move to Admin"><a href="/admin/user/make_admin/{{$user->id}}">&nbsp; <i class="fa fa-check-circle-o" aria-hidden="true"></i></a></span></li><hr>
                    @endforeach
                @else
                    <li>No any Users Found</li>
                @endif
                <br>
            </div>
            <div class="col-sm-6">
                <h4>Admins</h4><hr>
                @if (count( $admins)>0)
                    @foreach ( $admins as $admin)
                        <li> {{$admin->name}} <span title="Move to User"><a href="/admin/user/make_user/{{$admin->id}}">&nbsp; <i class="fa fa-gift text-info" aria-hidden="true"></i></a></span></li><hr>
                    @endforeach
                @else
                    <li>No any Admins Found</li>
                @endif
                <br>
            </div>
        </div>
        <hr>
    </div>
@endsection

