@extends('layouts.app')
@section('title', ' Show Pre Order Package')
<style>
    #more{
        /* display: none; */
    }
    #more1.show{
        display: inline;
    }
    #more1.hide{
        display: none;
    }
    #more2.show{
        display: inline;
    }
    #more2.hide{
        display: none;
    }
    tbody{
        font-size: 14px;
    }
</style>
@section('content')
@section('dashboard_title', 'Show Pre Order Package')
<section class="pre_order_package_show container">
    {{-- <a class="btn btn-primary float-right" href="{{ URL::previous() }}" role="button"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Go Back</a><br><br> --}}
    <div class="row">
        <div class="col-md-3">
            @if ($pre_order_package->status != 0)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h6>Contact</h6>
                        </div>
                        <div class="col-sm-7 text-secondary">
                            <a href="/contact/admin/{{ $pre_order_package->id }}" class="bg-secondary text-white py-1 px-2 rounded">Contact Admin</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="card mb-3">
                <h3 class="text-center pt-3">Sender</h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="mb-0">Name</h6>
                        </div>
                        <div class="col-sm-7 text-secondary">
                            @if ($pre_order_package->sender)
                            {{$pre_order_package->sender->name}}
                            @else
                                <p>Sender not Found</p>
                            @endif

                        </div>
                    </div>
                    <hr>
                    <div class="hide" id="more1">
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                @if ($pre_order_package->sender)
                                {{$pre_order_package->sender->phone}}
                                @else
                                    <p>Sender not Found</p>
                                @endif
                            </div>
                        </div>
                        <hr>
                    </div>
                    <button class="float-right rounded bg-dark text-white py-1 px-3" style="border: 0px; " onclick="myFunction1()" id="myBtn1"> -- </button>
                </div>
            </div>
            <div class="card mb-3">
                <h3 class="text-center pt-3">Receiver</h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="mb-0">Name</h6>
                        </div>
                        <div class="col-sm-7 text-secondary">
                            @if ($pre_order_package->receiver)
                                <a href="/receiver/show/{{$pre_order_package->receiver->id}}">{{$pre_order_package->receiver->name}}</a>
                            @else
                                <p>Receiver not Found</p>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="hide" id="more2">
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                @if ($pre_order_package->receiver)
                                    {{$pre_order_package->receiver->phone}}
                                @else
                                    <p>Receiver not Found</p>
                                @endif
                            </div>
                        </div>
                        <hr>
                    </div>
                    <button class="float-right rounded bg-dark text-white py-1 px-3" style="border: 0px; " onclick="myFunction2()" id="myBtn2"> -- </button>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h3 class="text-center">Pre Order Package</h3>
            <div class="row">
                <div class="card col-md-6 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Track Number</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$pre_order_package->pre_order_track_no}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Est Weight</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$pre_order_package->total_kg_weight}} Kg
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Est Deli Date</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{ Carbon\Carbon::parse($pre_order_package->est_deli_date)->format('d / m / Y')}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Is Approved</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                @if ($pre_order_package->status==0)
                                    No
                                @else
                                    Yes
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Packing Type</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{ $pre_order_package->packingtype->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Medium</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$pre_order_package->shippingmode->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Delivery Status</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$pre_order_package->deliverystatus->name}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-md-6 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Pay Method</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$pre_order_package->payment_method->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Price per Kgs</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$pre_order_package->price_per_kg}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Sub Total</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{ $pre_order_package->courier_fee }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Discount</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$pre_order_package->discount}} %
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Tax Rate</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$pre_order_package->tax_rate}} %
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Courier Fee</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$pre_order_package->courier_fee}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Create Date</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$pre_order_package->created_at->format('d / m / Y')}} {{-- ->diffForHumans() //this is show create ago time --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-12">
        <h3 class="text-center">Packages/ Boxes</h3>
        <div class="card row">
            <div class="table-responsive">
                <table class="table mb-0  table-hover">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Weight</th>
                            <th scope="col">Length</th>
                            <th scope="col">Width</th>
                            <th scope="col">Height</th>
                        </tr>
                    </thead>
                    <tbody>
                            @if (count($pre_orders)>0)
                                @foreach ($pre_orders as $pre_order)
                                    <tr>
                                        <td class="text-center">{{ $pre_order->quantity }}</td>
                                        <td>{{ $pre_order->name }}</td>
                                        <td>{{ $pre_order->packagetype->name }}</td>
                                        <td>{{ $pre_order->weight }} Kg</td>
                                        <td>{{ $pre_order->length }} cm</td>
                                        <td>{{ $pre_order->width }} cm</td>
                                        <td>{{ $pre_order->height }} cm</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>No pre_orders founded</td>
                                </tr>
                            @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="container d-flex justify-content-left">
        <a href="/pre_order_package/edit/{{$pre_order_package->id}}" class="border-white bg-white rounded text-primary text-center py-1 px-2"><i data-feather="edit" aria-hidden="true"></i> Edit</a> &nbsp; &nbsp;
        <a href="/pre_order_package/preview/{{$pre_order_package->id}}" class="border-white bg-white rounded text-success text-center py-1 px-2"><i data-feather="file-text" aria-hidden="true"></i> Preview</a> &nbsp; &nbsp;
        <form action="/preOrderPackage/delete/{{$pre_order_package->id}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="border-0 rounded text-danger bg-white text-center py-1 px-2" onclick="return confirm('Are you sure you want to delete {{$pre_order_package->track_no}} pre_order_package of {{$pre_order_package->receiver->name}}');"><i data-feather="trash-2" aria-hidden="true"></i> Delete</button>
        </form>
    </div> --}}
</section>
<script>
    //Show More Start
    function myFunction1() {
        document.getElementById("more1").classList.toggle('show');
        document.getElementById("more1").classList.toggle('hide');
    }
    function myFunction2() {
        document.getElementById("more2").classList.toggle('show');
        document.getElementById("more2").classList.toggle('hide');
    }
//Show More Start
</script>
@endsection
