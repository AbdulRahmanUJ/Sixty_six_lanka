@extends('layouts.superadmin.app')
@section('title', 'Super Admin | Show Pre Order')
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
@section('dashboard_title', '')
<section class="pre_order_show">
    {{-- <a class="btn btn-primary float-right" href="{{ URL::previous() }}" role="button"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Go Back</a><br><br> --}}
    <div class="row">
        <div class="col-md-3">
            @if ($pre_order_package->status ==0)
                <div class="card mb-3">
                    <form action="/superadmin/preorder/add_admin/{{ $pre_order_package->id }}" name="add_admin" method="post">
                        @csrf
                        <div style="display: none">
                            <tbody class="package">
                                @foreach ($pre_orders_input as $pre_orders_input)
                                    <tr>
                                        <td style="display: none"><input type="hidden" name="id[]" id="id" value="{{old('id[]', $pre_orders_input->id)}}" class="form-control"></td>
                                        <td><input type="number" name="number_of_box[]" id="number_of_box" value="{{old('number_of_box[]', $pre_orders_input->quantity)}}" min="1" class="form-control" required>
                                            <span style="color:red">{{$errors->first('number_of_box')}}</span>
                                        </td>
                                        <td><input type="text" name="item_name[]" id="item_name" value="{{old('item_name[]', $pre_orders_input->name)}}" class="form-control" placeholder="Name" required>
                                            <span style="color:red">{{$errors->first('item_name')}}</span>
                                        </td>
                                        <td>
                                            <select class="mdb-select md-form form-control" id="packagetype" name="packagetype[]" required>
                                                <option value="{{old('packagetype[]', $pre_orders_input->packagetype->id)}}">{{ $pre_orders_input->packagetype->name }}</option>
                                            </select>
                                            <span style="color:red">{{$errors->first('packagetype')}}</span>
                                        </td>
                                        <td><input type="number" name="weight[]" id="weight" value="{{old('weight[]', $pre_orders_input->weight)}}" class="form-control" placeholder="Kg" title="Weight (Kg)" required>
                                            <span style="color:red">{{$errors->first('weight')}}</span>
                                        </td>
                                        <td><input type="number" name="length[]" id="length" value="{{old('length[]', $pre_orders_input->length)}}" class="form-control" placeholder="cm" title="length (cm)" required>
                                            <span style="color:red">{{$errors->first('length')}}</span>
                                        </td>
                                        <td><input type="number" name="width[]" id="width" value="{{old('width[]', $pre_orders_input->width)}}" class="form-control" placeholder="cm" title="width (cm)" required>
                                            <span style="color:red">{{$errors->first('width')}}</span>
                                        </td>
                                        <td><input type="number" name="height[]" id="height" value="{{old('height[]', $pre_orders_input->height)}}" class="form-control" placeholder="cm" title="height (cm)" required>
                                            <span style="color:red">{{$errors->first('height')}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </div>
                        <div class="card-body col-12 pb-0">
                            <div class="row">
                                <h6>Admin for Pre Order</h6>
                            </div>
                            <div class="row">
                                <select name="admin" id="" class="form-control" required>
                                    <option value="">Select Admin</option>
                                    @foreach ($admin as $admin)
                                        <option value="{{ $admin->id }}">{{ $admin->name }} | {{ $admin->user_address->first()->country->sort }} | {{ $admin->user_address->first()->state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($today ==1)
                            <br>
                                <div class="row">
                                    <label for="est_deli_date">Est Deli Date</label>
                                        <input type="date" class="form-control" name="est_deli_date" min="{{ now()->toDateString('Y-m-d') }}" id="est_deli_date" required>
                                </div>
                            @endif
                            <div class="row">
                                <button type="submit" class="btn bg-success btn-button text-light mt-2 ml-auto">Add Admin</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            @if ($pre_order_package->sender)
                <div class="card mb-3">
                    <h3 class="text-center pt-1 m-0">Pre Order User</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <a href="/superadmin/user/show/{{$pre_order_package->sender->id}}">{{$pre_order_package->sender->name}}</a>
                            </div>
                        </div>
                        <hr>
                        <div class="hide" id="more1">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{$pre_order_package->sender->phone}}
                                </div>
                            </div>
                        </div>
                        <button class="float-right rounded bg-dark text-white" style="border: 0px; " onclick="myFunction1()" id="myBtn1"><i data-feather="minus"></i></button>
                    </div>
                </div>
            @endif
            <div class="card mb-3">
                <h3 class="text-center pt-1 m-0">Receiver</h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Name</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            @if ($pre_order_package->receiver)
                                <a href="/superadmin/receiver/show/{{$pre_order_package->receiver->id}}">{{$pre_order_package->receiver->name}}</a>
                            @else
                                <p>Receiver not Found</p>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="hide" id="more2">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                @if ($pre_order_package->receiver)
                                    {{$pre_order_package->receiver->phone}}
                                @else
                                    <p>Receiver not Found</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="float-right rounded bg-dark text-white" style="border: 0px; " onclick="myFunction2()" id="myBtn2"><i data-feather="minus"></i></button>
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
                                <h6 class="mb-0">PO Track No</h6>
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
                                @if ($pre_order_package->status !=1)
                                    No
                                @else
                                    Yes
                                @endif
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
                                <h6 class="mb-0">Status</h6>
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
                                <h6 class="mb-0">Payment Method</h6>
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
        <h3 class="text-center">Orders</h3>
        <div class="card row">
            <div class="table-responsive">
                <table class="table mb-0  table-hover">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Weight</th>
                            <th scope="col">Length</th>
                            <th scope="col">Width</th>
                            <th scope="col">Height</th>
                        </tr>
                    </thead>
                    <tbody>
                            @if ($pre_order_count>0)
                                @foreach ($pre_orders as $pre_orders)
                                    <tr>
                                        <td>{{ $pre_orders->name }}</td>
                                        <td>{{ $pre_orders->packagetype->name }}</td>
                                        <td>{{ $pre_orders->quantity }}</td>
                                        <td>{{ $pre_orders->weight }}</td>
                                        <td>{{ $pre_orders->length }}</td>
                                        <td>{{ $pre_orders->width }}</td>
                                        <td>{{ $pre_orders->height }}</td>
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
