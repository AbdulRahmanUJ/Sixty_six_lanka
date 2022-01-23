@extends('layouts.admin.app')
@section('title', 'Admin | Home')
@section('content')
@section('dashboard_title', 'Admin Dashboard')
<section class="admin_home">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-xl-12 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Receivers</h5>
                                    <h1 class="display-5 mt-1 mb-3">{{ $receivers }}</h1>
                                    {{-- <div class="mb-1">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">All Packages</h5>
                                    <h1 class="display-5 mt-1 mb-3">{{ $packages }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Senders</h5>
                                    <h1 class="display-5 mt-1 mb-3">{{ $senders }}</h1>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">All Orders</h5>
                                    <h1 class="display-5 mt-1 mb-3">{{ $orders }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Total Kgs</h5>
                                    <h1 class="display-5 mt-1 mb-3">{{ $total_kgs }} Kgs</h1>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Not Arrived yet</h5>
                                    <h1 class="display-5 mt-1 mb-3">{{ $not_arriveds }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Total Accounts Receivable</h5>
                                    <h1 class="display-5 mt-1 mb-3">{{ $total_fees }}</h1>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Arrived/ Completed</h5>
                                    <h1 class="display-5 mt-1 mb-3">{{ $arriveds }}</h1>
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
