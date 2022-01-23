@extends('layouts.superadmin.app')
@section('title', 'SuperAdmin | Receivers')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    tbody{
        font-size: 14px;
    }
</style>
@section('content')
@section('dashboard_title', 'Receivers')
<section class="superadmin_receiver">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills pull-right float-right" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab"  href="#receiver_table">Receivers List <i class="align-middle" data-feather="list"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#add_receiver"> Add Receiver <i class="align-middle" data-feather="user-plus"></i></a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="receiver_table" role="tabpanel">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table mb-0  table-hover">
                                        <thead class="bg-primary text-light">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col" class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($receivers)>0)
                                                @foreach ($receivers as $receiver)
                                                    <tr>
                                                        <td><a href="/superadmin/receiver/show/{{$receiver->id}}" title="View Receiver {{$receiver->name}}">
                                                                {{ $receiver->name }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $receiver->phone }}</td>
                                                        <td class="d-flex justify-content-sm-center">
                                                            {{-- <a href="/superadmin/package/create/{{$receiver->id}}" title="Add Package to {{$receiver->name}}"><i class="text-primary" data-feather="file-plus"></i></a> --}}
                                                            <a href="/superadmin/receiver/edit/{{$receiver->id}}" title="Edit receiver {{$receiver->name}}"><i class="text-success" data-feather="edit"></i></a>
                                                            <form action="/superadmin/receiver/delete/{{$receiver->id}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" title="Delete Receiver {{$receiver->name}}" class="border-0 bg-transparent p-0" onclick="return confirm('Are you sure you want to delete Receiver {{$receiver->name}}');"><i class="text-danger" data-feather="trash-2"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <h3>No Receivers Added</h3>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="add_receiver" role="tabpanel">
                        <form action="/superadmin/receiver" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Name" required>
                                    <span style="color:red">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" value="{{old('address')}}" class="form-control" id="inputAddress" placeholder="Address" required>
                                    <span style="color:red">{{$errors->first('address')}}</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="phone" placeholder="Phone Number" required>
                                    <span style="color:red">{{$errors->first('phone')}}</span>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="country">Country</label>
                                    <select name="country" id="country" value="{{old('country')}}" class="form-control" required>
                                        <option value="">Select Country</option>
                                        @foreach($countries as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">{{$errors->first('country')}}</span>
                                </div>
                                <div class="form-group col-md-4 state hide">
                                    <label for="state">State / Atoll</label>
                                    <select class="form-control" name="state" value="{{old('state')}}" id="state" required>
                                        <option value="" class="disabled">Select State</option>
                                        </select>
                                    <span style="color:red">{{$errors->first('state')}}</span>
                                </div>
                                <div class="form-group col-md-2 city hide">
                                    <label for="city">City</label>
                                    <select class="form-control" name="city" value="{{old('city')}}" id="city" required>
                                        <option value="">Select City</option>
                                        </select>
                                    <span style="color:red">{{$errors->first('city')}}</span>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Zip Number</label>
                                    <input type="text" name="zip" value="{{old('zip')}}" class="form-control" id="inputZip" placeholder="150600" required>
                                    <span style="color:red">{{$errors->first('zip')}}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <button type="submit" class="dec btn btn-primary btn-lg col-md-4">Submit</button>
                                <span class="px-1 py-1"></span>
                                <button type="reset" class="dec btn btn-danger btn-lg col-md-3">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
            $('select[name="country"]').on('change',function(){
                var country_id= $(this).val();
                if (country_id) {
                    $.ajax({
                        url: "{{url('getState/')}}/"+country_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data){
                        // console.log(data);
                            $('select[name="state"]').empty();
                            $.each(data,function(key,value){
                                $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                            $('select[name="city"]').empty();
                        }
                    });
                }else {
                        $('select[name="state"]').empty();
                }
            });
                $('select[name="state"]').on('change',function(){
                var state_id= $(this).val();
                if (state_id) {
                        $.ajax({
                        url: "{{url('getCity/')}}/"+state_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data){
                            // console.log(data);
                            $('select[name="city"]').empty();
                            $.each(data,function(key,value){
                                $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    });
                }else {
                        $('select[name="city"]').empty();
                }
            });
            });
    </script>
@endsection
