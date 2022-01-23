@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="name" class="">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="image" class="">{{ __('Profile Image') }}</label>
                                <input type="file" style="border: none;" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" id="image">
                            </div>
                        </div>

                        <div class="form-group  row">
                            <div class="col-md-7">
                                <label for="street" class="">{{ __('street') }}</label>
                                <input id="street" type="street" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street">

                                @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="phone" class="">{{ __('phone') }}</label>
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="country" class="">{{ __('country') }}</label>
                                <select name="country" id="country" value="{{old('country')}}" class="form-control" required>
                                    <option value="">Select Country</option>
                                    @foreach($countries as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 state hide">
                                <label for="state" class="">{{ __('state') }}</label>
                                <select class="form-control" name="state" value="{{old('state')}}" id="state" required>
                                    <option value="" class="disabled">Select State</option>
                                </select>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 city hide">
                                <label for="city" class="">{{ __('city') }}</label>
                                <select class="form-control" name="city" value="{{old('city')}}" id="city" required>
                                    <option value="">Select City</option>
                                </select>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="post_code" class="">{{ __('post code') }}</label>
                                <input id="post_code" type="post_code" class="form-control @error('post_code') is-invalid @enderror" name="post_code" value="{{ old('post_code') }}" required autocomplete="post_code">

                                @error('post_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="password" class="">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <input type="checkbox" hidden onclick="myFunction()" id="show_password"> <i class="fa fa-eye" aria-hidden="true"></i> <label for="show_password">Show Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="dec btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <button type="reset" class="dec btn">
                                    {{ __('Cancel') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
    {{-- Show/ Hide Password --}}
    <script>
        function myFunction() {
          var x = document.getElementById("password");
          var y = document.getElementById("password-confirm");
          if (x.type === "password") {
            x.type = "text";
            y.type = "text";
          } else {
            x.type = "password";
            y.type = "password";
          }
        }
        </script>
@endsection
