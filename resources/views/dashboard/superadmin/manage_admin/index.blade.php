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
                        <div class="table-responsive">
                            <table class="table mb-0  table-hover">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">email</th>
                                        <th scope="col">status</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($admins)>0)
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td><a href="/superadmin/admin/show/{{$admin->id}}" title="View admin {{$admin->name}}">
                                                        {{ $admin->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $admin->phone }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>
                                                    @if ($admin->status==1)
                                                        <label class="toggle switch">
                                                            <input data-id="{{$admin->id}}" class="admin_status" type="checkbox" checked name="is_active" id="is_active">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    @elseif($admin->status==0)
                                                        <label class="toggle switch">
                                                            <input data-id="{{$admin->id}}" class="admin_status" type="checkbox" name="is_active" id="is_active">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    @endif
                                                </td>
                                                <td class="d-flex justify-content-sm-center">
                                                    {{-- <a href="/admin/package/create/{{$admin->id}}" title="Add Package to {{$admin->name}}"><i class="text-primary" data-feather="file-plus"></i></a> --}}
                                                    <a href="/superadmin/admin/edit/{{$admin->id}}" title="Edit admin {{$admin->name}}"><i class="text-success" data-feather="edit"></i></a>
                                                    <form action="/superadmin/admin/delete/{{$admin->id}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" title="Delete admin {{$admin->name}}" class="border-0 bg-transparent p-0" onclick="return confirm('Are you sure you want to delete admin {{$admin->name}}');"><i class="text-danger" data-feather="trash-2"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <h3>No admins Added</h3>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>

    $(function() {
      $('.admin_status').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var user_id = $(this).data('id');
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/superadmin/admin/change_status',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>
@endsection
