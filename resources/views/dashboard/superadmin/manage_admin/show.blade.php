@extends('layouts.superadmin.app')
@section('title', 'Admin List')
@section('content')
<style>
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
@section('dashboard_title', 'Admin List')
<section class="superadmin_list_admin">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{--  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
