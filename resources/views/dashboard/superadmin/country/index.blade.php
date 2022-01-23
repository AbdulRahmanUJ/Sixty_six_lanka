@extends('layouts.superadmin.app')
@section('title', 'Country List')
@section('content')
@section('dashboard_title', 'Country List')
<section class="superadmin_list_country">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class=" float-right rounded bg-light mb-3">
                            <label for="" class="pt-3 pl-3 "><b>Add New Country</b></label>
                            <form action="/superadmin/country" method="POST" class="col-md-12 mb-5 mt-2">
                                @csrf
                                <label for="state">Country Name
                                    <input type="text" name="country_name" class="form-control" placeholder="Ex: United States" required>
                                    @if ($errors->has('country_name'))
                                        <span class="text-danger">{{ $errors->first('country_name') }}</span> <br>
                                    @endif
                                </label>
                                <label for="state">Country Sort
                                    <input type="text" name="sort" class="form-control" placeholder="Ex: US" required>
                                    @if ($errors->has('sort'))
                                        <span class="text-danger">{{ $errors->first('sort') }}</span> <br>
                                    @endif
                                </label>
                                <label for="state">Phone Code
                                    <input type="text" name="phone_code" class="form-control" placeholder="Ex: +1" required>
                                    @if ($errors->has('phone_code'))
                                        <span class="text-danger">{{ $errors->first('phone_code') }}</span> <br>
                                    @endif
                                </label>
                                <div class="col-12">
                                    <button type="reset" class="btn bg-danger text-white float-right ml-1">Cancel</button>
                                    <button type="submit" class="btn bg-success text-white float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            @if (count($country)>0)
                            <table class="table mb-0  table-hover">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Sort</th>
                                        <th scope="col">Phone Code</th>
                                        <th scope="col">status</th>
                                        <th scope="col" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($country as $countries)
                                        <tr>
                                            <td>
                                                <a href="/superadmin/country/show/{{$countries->id}}" title="View country {{$countries->country_name}}">
                                                    {{ $countries->country_name }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $countries->sort }}
                                            </td>
                                            <td>
                                                {{ $countries->phoneCode }}
                                            </td>
                                            <td>
                                                @if ($countries->is_active==1)
                                                    <label class="toggle switch">
                                                        <input data-id="{{$countries->id}}" class="country_status" type="checkbox" checked name="is_active" id="is_active">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @elseif($countries->is_active==0)
                                                    <label class="toggle switch">
                                                        <input data-id="{{$countries->id}}" class="country_status" type="checkbox" name="is_active" id="is_active">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-sm-center">
                                                <a href="/superadmin/country/edit_country/{{$countries->id}}" title="Edit country {{$countries->country_name}}"><i class="text-success" data-feather="edit"></i></a>
                                                <form action="/superadmin/country/delete/{{$countries->id}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" title="Delete country {{$countries->country_name}}" class="border-0 bg-transparent p-0" onclick="return confirm('Are you sure you want to delete country {{$countries->country_name}}');"><i class="text-danger" data-feather="trash-2"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <h3>No Countries Available</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>

    $(function() {
      $('.country_status').change(function() {
          var is_active = $(this).prop('checked') == true ? 1 : 0;
          var country_id = $(this).data('id');
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/superadmin/country/change_status',
              data: {'is_active': is_active, 'country_id': country_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>
@endsection
