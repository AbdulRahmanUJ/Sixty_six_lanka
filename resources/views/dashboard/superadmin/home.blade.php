@extends('layouts.superadmin.app')
@section('title', 'Super Admin | Home')
@section('content')
@section('dashboard_title', 'Super Admin Dashboard')
<style>
    .card{
        transition: 0.3s;
        border: solid 2px #222e3c13;
    }
    .card h1{
        text-align: center;
    }
    .card:hover{
        box-shadow: 2px 2px 8px #353e5852;
        border-top: solid 2px transparent;
        border-left: solid 2px transparent;
        border-bottom: solid 2px #222e3c8e;
        /* border-top: solid 2px #222e3c8e; */
    }
</style>
<section class="super_admin_home">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-xl-12 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Admins</h5>
                                    <h1 class="display-5">{{ $admins }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Reg Users</h5>
                                    <h1 class="display-5">{{ $users }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Senders</h5>
                                    <h1 class="display-5">{{ $senders }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Receivers</h5>
                                    <h1 class="display-5">{{ $receivers }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">All Packages</h5>
                                    <h1 class="display-5">{{ $packages }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">All Orders</h5>
                                    <h1 class="display-5">{{ $orders }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Kgs</h5>
                                    <h1 class="display-5">{{ $total_kgs }} Kgs</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Accounts Receivable</h5>
                                    <h1 class="display-5">{{ $total_fees }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pending Pre Orders</h5>
                                    <h1 class="display-5">{{ $pre_order_package }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Not Arrived yet</h5>
                                    <h1 class="display-5">{{ $not_arriveds }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Arrived/ Completed</h5>
                                    <h1 class="display-5">{{ $arriveds }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

