@extends('layouts.admin.app')
@section('title', 'Country List')
@section('content')
@section('dashboard_title', 'Country List')
<section class="admin_list_country">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (count($country)>0)
                            <label for="">Active Countries: {{ $active_country }}</label>
                            <table class="table mb-0  table-hover">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Sort</th>
                                        <th scope="col">Phone Code</th>
                                        <th scope="col">Is Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($country as $countries)
                                        <tr>
                                            <td>
                                                <a href="/admin/country/show/{{$countries->id}}" title="View country {{$countries->country_name}}">
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
                                                    Active
                                                @elseif($countries->is_active==0)
                                                    De Active
                                                @endif
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
              url: '/admin/country/change_status',
              data: {'is_active': is_active, 'country_id': country_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>
@endsection
