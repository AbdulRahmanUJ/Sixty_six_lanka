@extends('layouts.admin.app')
@section('title','Edit ' .$admin->name. ' Profile')
@section('content')
@section('dashboard_title', 'Edit Profile')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Edit Profile') }}</div>
            <div class="card-body">
                <form action="/admin/{{$admin->id}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('$name') ?? $admin->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class="col-form-label text-md-right">{{ __('phone') }}</label>
                            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $admin->phone }}" required autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $admin->email }}" required disabled autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button style="margin: 0px 0px 0px 10px" type="reset" class="btn btn-warning float-right">
                                {{ __('Cancel') }}
                            </button>
                            <button type="submit" class="btn btn-primary float-right">
                                {{ __('Update Profile') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="card col-12">
                <div class="card-header">
                    admin Address
                </div>
            <table class="table table-light table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Street</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Zip</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin_address as $admin_address)
                        <tr>
                            <td>{{ $admin_address->address }}</td>
                            <td>{{ $admin_address->city->name }}</td>
                            <td>{{ $admin_address->state->name }}</td>
                            <td>{{ $admin_address->country->country_name }}</td>
                            <td>{{ $admin_address->zip }}</td>
                            <td class="text-center">
                                <a href="/admin/address/edit/{{$admin_address->id}}"><i data-feather="edit" class="text-primary"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
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
