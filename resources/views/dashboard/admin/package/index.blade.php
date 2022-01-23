@extends('layouts.admin.app')
@section('title', 'Admin | Packages')
@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    .w3-row{
        margin-top: 10px;
    }
    .w3-row .w3-third.w3-border-red{
        border-color: #222E3C !important;
        background: #222e3c27;
    }
    .w3-row .w3-third{
        width: 20% !important;
    }
    .w3-row .w3-third i{
        color: #e61235;
        font-size: 20px;
    }
    .w3-row {
        font-size: 13px;
        font-weight: 600;
    }
</style>
@section('dashboard_title', 'Packages')
<section class="admin_package">
    <div class="w3-container card">
        <div class="w3-row">
            <a href="javascript:void(0)" onclick="openCity(event, 'all-package');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-red"><i class="fas fa-boxes"></i> All Packages</div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'pending-collection');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding"><i class="fas fa-box"></i> Pending Packages </div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'approved');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding"><i class="fas fa-calendar-check"></i> Approved</div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'delivered');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding"><i class="fas fa-shipping-fast"></i> Delivered</div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'canceled');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding"><i class="fas fa-times-circle"></i> Canceled</div>
            </a>
        </div>
        <div id="all-package" class="w3-container city" style="display:block">
            <div class="">
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                              @if (count($all_packages)>0)
                              <tr>
                                  <th>Package Track No</th>
                                  <th>Status</th>
                                  <th>Est Delivery Date</th>
                              </tr>
                                  <tr>
                                      @foreach ($all_packages as $all_packages)
                                          <tr>
                                              <td><a href="/admin/package/show/{{ $all_packages->id }}">{{ $all_packages->track_no }}</a></td>
                                              <td>{{ $all_packages->deliverystatus->name }}</td>
                                              <td>{{ $all_packages->est_deli_date }}</td>
                                          </tr>
                                      @endforeach
                                  </tr>
                              @else
                                  <td>No Record Found</td>
                              @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="pending-collection" class="w3-container city" style="display:none">
          <div class="">
              <div class="card-body">
                  <table class="table table-hover">
                      <tbody>
                            @if (count($pending)>0)
                            <tr>
                                <th>Package Track No</th>
                                <th>Est Delivery Date</th>
                            </tr>
                                @foreach ($pending as $pendings)
                                    <tr>
                                        <td><a href="/admin/package/show/{{ $pendings->id }}">{{ $pendings->track_no }}</a></td>
                                        <td>{{ $pendings->est_deli_date }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <td>No Record Found</td>
                            @endif
                      </tbody>
                  </table>
              </div>
          </div>
        </div>

        <div id="approved" class="w3-container city" style="display:none">
            <div class="">
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            @if (count($approved)>0)
                            <tr>
                                <th>Package Track No</th>
                                <th>Est Delivery Date</th>
                            </tr>
                            @foreach ($approved as $approves)
                                <tr>
                                    <td><a href="/admin/package/show/{{ $approves->id }}">{{ $approves->track_no }}</a></td>
                                    <td>{{ $approves->est_deli_date }}</td>
                                </tr>
                            @endforeach
                            @else
                                <td>No Record Found</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="delivered" class="w3-container city" style="display:none">
            <div class="">
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            @if (count($delivered)>0)
                            <tr>
                                <th>Package Track No</th>
                                <th>Est Delivery Date</th>
                            </tr>
                            @foreach ($delivered as $delivers)
                                <tr>
                                    <td><a href="/admin/package/show/{{ $delivers->id }}">{{ $delivers->track_no }}</a></td>
                                    <td>{{ $delivers->est_deli_date }}</td>
                                </tr>
                            @endforeach
                            @else
                                <td>No Record Found</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="canceled" class="w3-container city" style="display:none">
            <div class="">
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                              @if (count($canceled)>0)
                                <tr>
                                    <th>Package Track No</th>
                                    <th>Est Delivery Date</th>
                                </tr>
                                @foreach ($canceled as $cancels)
                                    <tr>
                                        <td><a href="/admin/package/show/{{ $cancels->id }}">{{ $cancels->track_no }}</a></td>
                                    <td>{{ $cancels->est_deli_date }}</td>
                                </tr>
                                @endforeach
                              @else
                                  <td>No Record Found</td>
                              @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.firstElementChild.className += " w3-border-red";
        }
    </script>

        {{-- <div class="card py-3">
            <div class="col-sm-12">
                <div class="">
                    @if (count( $packages)>0)
                        @foreach ( $packages as $package )
                        <li style="background: {{ $package->deliverystatus->color }}" title="{{$package->created_at->format('y-m-d')}}"><a class="text-dark" href="/admin/package/show/{{ $package->id }}">{{$package->track_no}}</a><span title="Move to Redy to Ship">&nbsp; <a href="/admin/package/rdy_to_ship/{{$package->id}}"><i data-feather="chevrons-right"></i></a></span></li><hr>
                        @endforeach
                    @else
                        <li>No Packages Added Yet</li>
                    @endif
                    <br>
                </div>
            </div>
        </div> --}}
</section>
@endsection
