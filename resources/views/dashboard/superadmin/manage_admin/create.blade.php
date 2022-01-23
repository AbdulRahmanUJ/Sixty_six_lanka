@extends('layouts.superadmin.app')
@section('title', 'Create Admin')
@section('content')
<style>
        /* Switch Start */
    /* The switch - the box around the slider */
    .toggle.switch {
        position: relative;
        display: inline-block;
        width: 53px;
        height: 27px;
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
        height: 20px;
        width: 20px;
        left: 4px;
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
@section('dashboard_title', 'Create Admin')
<section class="superadmin_create_admin">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/superadmin/admin/register">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="name" class="">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-2" align="center">
                                    <label for="is_active" class="">{{ __('status') }}</label> <br>
                                    <!-- Rounded switch -->
                                    <label class="toggle switch">
                                        <input type="checkbox" name="is_active" id="is_active">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group  row">
                                <div class="col-md-7">
                                    <label for="street" class="">{{ __('street') }}</label>
                                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street">

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
                                    <input id="password" value="Admin@123" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <br> <br>
                                    <i class="fa fa-eye"  onclick="myFunction()" aria-hidden="true"></i> <label for="show_password"  onclick="myFunction()">Show Password</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 text-right">
                                    <button type="reset" class="dec btn btn-primary">
                                        {{ __('Cancel') }}
                                    </button>
                                    <button type="submit" class="dec btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
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
                            $(".state").removeClass('hide');
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
                            $(".city").removeClass('hide');
                        }
                    });
                }else {
                        $('select[name="city"]').empty();
                }
            });
            });
    </script>
    <script>
        function myFunction() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>

@endsection
