@extends('layouts.superadmin.app')
@section('title', 'Super Admin | Show Package')
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
        /* Switch Start */
    /* The switch - the box around the slider */
    .toggle.switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 20px;
      }

      /* Hide default HTML checkbox */
      .toggle.switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }

      /* The slider */
      .toggle.switch .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgb(216, 34, 34);
        -webkit-transition: .4s;
        transition: .4s;
      }

      .toggle.switch .slider:before {
        position: absolute;
        content: "";
        height: 13px;
        width: 13px;
        left: 6px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }

      .toggle.switch input:checked + .slider {
        background-color: #11c964;
      }

      .toggle.switch input:focus + .slider {
        box-shadow: 0 0 1px #11c964;
      }

      .toggle.switch input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      /* Rounded sliders */
      .toggle.switch .slider.round {
        border-radius: 34px;
      }

      .toggle.switch .slider.round:before {
        border-radius: 50%;
      }
/* Switch End */
</style>
@section('content')
@section('dashboard_title', 'Show Package')
<section class="package_show">
    {{-- <a class="btn btn-primary float-right" href="{{ URL::previous() }}" role="button"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Go Back</a><br><br> --}}
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="">Delivery Status</h6>
                        </div>
                        <form action="/superadmin/package/change_status/{{ $package->id }}" id="form" method="post">
                            @method("patch")
                            @csrf
                            <div class="col-sm-12 text-secondary">
                                <select name="deliverystatus" id="deliverystatus" class="form-control">
                                    <option value="{{ $package->deliverystatus->id}}">{{ $package->deliverystatus->name}}</option>
                                    @foreach ($deliverystatus as $deliverystatus)
                                        <option value="{{ $deliverystatus->id }}">{{ $deliverystatus->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if ($package->pre_order_user)
                <div class="card mb-3">
                    <h3 class="text-center p-0 m-0 pt-3">Pre Order User</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                @foreach ($pre_order_user as $pre_order_user)
                                    <a href="/superadmin/user/show/{{$pre_order_user->id}}">{{$pre_order_user->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div class="hide" id="more1">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{$pre_order_user->phone}}
                                </div>
                            </div>
                            <hr>
                        </div>
                        <button class="float-right rounded bg-dark text-white" style="border: 0px; " onclick="myFunction1()" id="myBtn1"><i data-feather="minus"></i></button>
                    </div>
                </div>
            @endif
            @if ($package->sender)
                <div class="card mb-3">
                    <h3 class="text-center p-0 m-0 pt-3">Sender</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                @if ($package->sender)
                                <a href="/superadmin/sender/show/{{ $package->sender->id }}">{{$package->sender->name}}</a>
                                @else
                                    <p>Sender not Found</p>
                                @endif

                            </div>
                        </div>
                        <hr>
                        <div class="hide" id="more1">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    @if ($package->sender)
                                    {{$package->sender->phone}}
                                    @else
                                        <p>Sender not Found</p>
                                    @endif
                                </div>
                            </div>
                            <hr>
                        </div>
                        <button class="float-right rounded bg-dark text-white" style="border: 0px; " onclick="myFunction1()" id="myBtn1"><i data-feather="minus"></i></button>
                    </div>
                </div>
            @endif
            <div class="card mb-3">
                <h3 class="text-center p-0 m-0 pt-3">Receiver</h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Name</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            @if ($package->receiver)
                                <a href="/superadmin/receiver/show/{{$package->receiver->id}}">{{$package->receiver->name}}</a>
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
                                @if ($package->receiver)
                                    {{$package->receiver->phone}}
                                @else
                                    <p>Receiver not Found</p>
                                @endif
                            </div>
                        </div>
                        <hr>
                    </div>
                    <button class="float-right rounded bg-dark text-white" style="border: 0px; " onclick="myFunction2()" id="myBtn2"><i data-feather="minus"></i></button>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0"><b>Admin</b></h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            @foreach ($admin as $admin)
                            <a href="/superadmin/admin/show/{{$admin->id}}">{{$admin->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            {{-- <h3 class="text-center">Package</h3> --}}
            <div class="row">
                <div class="card col-md-6 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Track Number</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$package->track_no}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Est Weight</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$package->total_kg_weight}} Kg
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Est Deli Date</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{ Carbon\Carbon::parse($package->est_deli_date)->format('d / m / Y')}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Is Picked Up</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                @if ($package->is_pickup==0)
                                    No
                                @else
                                    Yes
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Person Receives</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                @if ($package->person_receives)
                                    {{ $package->person_receives }}
                                @else
                                    Package Not received or not Updated Yet
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Medium</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$package->shippingmode->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Status</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$package->deliverystatus->name}}
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
                                {{$package->paymentmethod->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Price per Kgs</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$package->price_per_kg}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Sub Total</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{ $package->sub_total }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Discount</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$package->discount}} %
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Tax Rate</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$package->tax_rate}} %
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Courier Fee</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$package->courier_fee}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <h6 class="mb-0">Create Date</h6>
                            </div>
                            <div class="col-sm-7 text-secondary">
                                {{$package->created_at->format('d / m / Y')}} {{-- ->diffForHumans() //this is show create ago time --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($package->is_pickup != 1)
                    <div class="card col-12">
                        <form action="/superadmin/package/pickup/{{ $package->id }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <label for=""><b>Is Picked Up</b></label>
                            <div class="row justify-content-lg-around">
                                <label class="toggle switch">
                                    <input data-id="{{$package->id}}" value="{{old('is_active')}}" class="is_active" type="checkbox" name="is_active" id="is_active">
                                    <span class="slider round"></span>
                                </label>
                                <input type="text" class="form-control col-4" id="show_input" value="{{old('name')}}" name="name" placeholder="Picked Person Name" required style="display: none">
                                <input type="file" class="form-control col-4" name="image" value="{{old('show_file')}}" id="show_file" required style="display: none">
                                <button type="submit" class="btn button bg-primary text-white" id="show_btn" style="display: none">Submit</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="card col-12 p-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h6 class="mb-0">Received Person: @if ($package->person_receives)
                                        <b>{{ $package->person_receives }}</b>
                                    @else
                                        Not Saved
                                    @endif
                                </h6>
                                </div>
                                @if ($package->image)
                                    <div class="col-sm-4 text-secondary">
                                        <button class="float-right rounded bg-dark text-white" style="border: 0px; " id="btn_img"
                                        onclick="$('.proof_image').slideToggle(function(){$('#btn_img').html($('.proof_image').is(':visible')?'Click here to Hide':'Click here to View');});"
                                        >Click here to View</button>
                                    </div>
                                @else
                                    Image Not Saved
                                @endif
                            </div>
                            @if ($package->image)
                                <div class="row proof_image pt-1" style="display:none">
                                    <div>
                                        <img src="/package/pickup/proof/{{ $package->image }}" class="col-12" alt="">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                @if ($package->is_cancel != 1)
                    <div class="card col-12">
                        <form action="/superadmin/package/cancel/{{ $package->id }}" method="post">
                            @method('patch')
                            @csrf
                            <label for=""><b>Cancel Package</b></label>
                            <div class="row justify-content-lg-around">
                                <label class="toggle switch">
                                    <input data-id="{{$package->id}}" value="{{old('package_cancel')}}" class="package_cancel" type="checkbox" name="package_cancel" id="package_cancel">
                                    <span class="slider round"></span>
                                </label>
                                <textarea type="text" class="form-control col-8" id="cancel" value="{{old('cancel')}}" name="cancel" placeholder="Reason for Canceled" required style="display: none"></textarea>
                                <button type="submit" class="btn button bg-primary text-white" id="show_btn_cancel" style="display: none">Submit</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="card col-12 p-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h6 class="mb-0">Reason for Canceled:
                                        @if ($package->reason_cancel)
                                            <b>{{ $package->reason_cancel }}</b>
                                        @endif
                                    </h6>
                                </div>
                                <form action="/superadmin/package/remove_cancel/{{ $package->id }}" id="cancel_remove_form" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <label class="toggle switch">
                                        <input data-id="{{$package->id}}" value="" class="remove_cancel" checked type="checkbox" name="remove_cancel" id="remove_cancel">
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
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
                            @if (count($order)>0)
                                @foreach ($order as $order)
                                    <tr>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->packagetype->name }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->weight }}</td>
                                        <td>{{ $order->length }}</td>
                                        <td>{{ $order->width }}</td>
                                        <td>{{ $order->height }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>No Orders founded</td>
                                </tr>
                            @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-left">
        <a href="/superadmin/package/edit/{{$package->id}}" class="border-white bg-white rounded text-primary text-center py-1 px-2"><i data-feather="edit" aria-hidden="true"></i> Edit</a> &nbsp; &nbsp;
        <a href="/superadmin/package/preview/{{$package->id}}" class="border-white bg-white rounded text-success text-center py-1 px-2"><i data-feather="file-text" aria-hidden="true"></i> Preview</a> &nbsp; &nbsp;
        <form action="/superadmin/package/delete/{{$package->id}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="border-0 rounded text-danger bg-white text-center py-1 px-2" onclick="return confirm('Are you sure you want to delete {{$package->track_no}} Package of {{$package->receiver->name}}');"><i data-feather="trash-2" aria-hidden="true"></i> Delete</button>
        </form>
    </div>
</section>
{{-- change delivery Status --}}
<script>
    $('#form').on('change', function(){
    $(this).closest('#form').submit();
});
</script>

<script>
    $('#cancel_remove_form').on('change', function(){
    $(this).closest('#cancel_remove_form').submit();
});
</script>

{{-- package receive proof form --}}
<script>
    $(function () {
        $("#is_active").click(function () {
            if ($(this).is(":checked")) {
                $("#show_input").show();
                $("#show_file").show();
                $("#show_btn").show();
            } else {
                $("#show_input").hide();
                $("#show_file").hide();
                $("#show_btn").hide();
            }
        });
    });
</script>

{{-- reason for cancel toggle --}}
<script>
    $(function () {
        $("#package_cancel").click(function () {
            if ($(this).is(":checked")) {
                $("#cancel").show();
                $("#show_btn_cancel").show();
            } else {
                $("#cancel").hide();
                $("#show_btn_cancel").hide();
            }
        });
    });
</script>

{{-- hide sho details --}}
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
