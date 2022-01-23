@extends('layouts.admin.app')
@section('title', $package->track_no)
<style>
    body{
        padding: 20px;
    }
    table{
        font-family: 'Times New Roman', Times, serif;
        color: #000000;
        width: 70%;
    }

    td,
    tr {
        border: 1px solid #000000;
        /* padding: 3px 5px 3px 5px; */
    }
</style>
@section('content')
@section('dashboard_title', 'Package label of - '.$package->track_no)
  <div class="container d-flex justify-content-center table-responsive">
      <div id="printableArea" class="container">
        <table class="text-center align-items-center">
          <tr>
            <td colspan="1" rowspan="2"><img src="{{ asset('image/logo.png') }}" alt="tag" width="180px" height="50px"></td>
            {{-- <td class="pl-5 pt-2 pb-1" rowspan="2">{!! DNS2D::getBarcodeHTML($package->track_no, 'QRCODE', 4, 3.5) !!}</td> --}}

            <td colspan="3" class="p-2">
                <span>{!! DNS1D::getBarcodeHTML($package->track_no, 'C128',2.2,50) !!}</span>
                <b>{{$package->track_no}}</b>
            </td>
          </tr>
          <tr>
            <tr>
                <span>Track No: {{$package->track_no}}</span>
            </td>
            </tr>
            <tr>
              <td rowspan="2"><b>Package<br>Deatails</b></td>
              <td><b>Est. Weight</b> <br>
                <span>{{$package->total_kg_weight}} Kg</span><br>
              </td>
              <td><b>User</b><br>
                @if ($package->sender)
                    <span>{{$package->sender->name}}</span> <br>
                    <span>{{$package->sender->phone}}</span>
                @elseif($package->pre_order_user)
                    @foreach ($pre_order_user as $pre_order_user)
                        <span>{{$pre_order_user->name}}</span> <br>
                        <span>{{$pre_order_user->phone}}</span>
                    @endforeach
                @endif
              </td>
              <td><b>Courier Fee</b><br>
                <span>{{$package->courier_fee}}</span>
              </td>
            </tr>
            <tr>
              <td colspan="3" class="text-left"><b>Content: </b>
                <span>
                    <table class="text-center" style="width: 100%">
                        <tr>
                            <td><b>Quantity</b></td>
                            <td><b>Name</b></td>
                            <td><b>Category</b></td>
                            <td><b>Weight</b></td>
                        </tr>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->packagetype->name }}</td>
                            <td>{{ $order->weight }}</td>
                        </tr>
                        @endforeach
                    </table>
                </span>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <b>From: - </b> Sixty Six Lanka (Pvt) Ltd. <br>
                @foreach ($admin_address as $admin_address)
                    {{ $admin_address->address}},
                    {{ $admin_address->city->name}}, <br>
                    {{ $admin_address->state->name}} <br>
                    {{ $admin_address->country->country_name}} <br>
                    {{ $admin->phone}} <br>
                @endforeach
                <br>
                <br>
                <span>Sender Signature & Date</span>
              </td>
              <td colspan="2">
                @foreach ($receiver as $receiver)
                    <b>To: - </b> {{ $receiver->name }} <br>
                @endforeach
                @foreach ($receiver_address as $receiver_address)
                    {{ $receiver_address->address}},
                    {{ $receiver_address->city->name}},<br>
                    {{ $receiver_address->state->name}} <br>
                    {{ $receiver_address->country->country_name}} <br>
                    {{ $receiver->phone}}
                    @endforeach
              </td>

          </table>
    </div>
  </div>
  {{-- @if ($package->status === 'confirmed') --}}
  <br>
  <div class="container d-flex justify-content-end">
    <button class="dec btn btn-info" onclick="printDiv('printableArea')" id="downloadPDF">Print/ Save Label</button>
  </div>
  {{-- @endif --}}

  {{-- <script>
    // download label
    $('#downloadPDF').click(function () {
      domtoimage.toPng(document.getElementById('content2'))
          .then(function (blob) {
              var pdf = new jsPDF('1', 'pt', 'a4','3','33', [$('#content2').width(), $('#content2').height()]);

              pdf.addImage(blob, 'jpeg', 0, 0, $('#content2').width(), $('#content2').height());
              pdf.save("Package Lable.pdf");

              that.options.api.optionsChanged();
          });

          // window.setTimeout(function(){
          // // Move to a new location
          // // window.location.href = "/admin/package/ready/{{$package->id}}";
          // }, 8000);
    });
  </script> --}}

  <script>
    function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;
    }
  </script>
  @endsection
