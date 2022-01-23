@extends('layouts.app')
@section('title','Packages of '.$package->receiver->name)
<style>
  table{
    font-family: 'Times New Roman', Times, serif;
    color: #000000;
    width: 100%;
  }

td,
tr {
  border: 1px solid #000000;
  padding: 3px 5px 3px 5px;
}
#content2{
  padding: 20px 0px 0px 75px;
}
</style>
@section('content')
<div class="container d-flex justify-content-center">
    <div id="content2">
      <table class="text-center align-items-center">
        <tr>
          <td colspan="2"><img src="{{ asset('image/logo.png') }}" alt="tag" width="120px" height="35px"></td>
          <td colspan="2" class="text-center">Tracking NO: <b>{{$package->track_no}}</b></td>
        </tr>
        <tr>
          <tr>
            <td>{!! DNS2D::getBarcodeHTML($package->track_no, 'QRCODE', 4, 3.5) !!}</td>
            <td colspan="3">{!! DNS1D::getBarcodeHTML($package->track_no, 'C128',2.2,50) !!}
              <span>{{$package->track_no}}</span></td>
          </tr>
          <tr>
            <td rowspan="3"><b>Package<br>Deatails</b></td>
            <td><b>Origin</b><br>
              <span>{{$package->receiver->country}}</span>
            </td>
            <td><b>Destination</b>
              <br>
              <span>{{$package->receiver->country}}</span>
            </td>
            <td><b>Medium</b><br>
              <span>{{$package->medium}}</span>                
            </td>
          </tr>
          <tr>
            <td><b>Est. Weight</b> <br>
              <span>{{$package->est_weight}} Kg</span>
            </td>
            <td><b>Quantity</b>
              <br>
              <span>{{$package->num_of_box}}</span>
            </td>
            <td><b>Date</b><br>
              <span>{{$package->created_at->format('Y-m-d')}}</span>                
            </td>
          </tr>
          <tr>
            <td colspan="3" class="text-left"><b>Content: </b>
              <span>{{$package->item_name}}</span> 
            </td>
          </tr>
          <tr>
            <td><b>From</b></td>
            <td colspan="2"><b> Sixty Six Lanka (Pvt) Ltd. </b><br>
              No: 66 Vauxhall Street <br>
              Sri Lanka</td>
            <td ><b>Conatct</b><br>
              <span>+94112333327</span>                
            </td>
          </tr>
          <tr>
            <td><b>To</b></td>
            <td colspan="2"><b>{{$package->receiver->name}}</b><br>
              {{$package->receiver->address}} <br>
              {{$package->receiver->city}} <br>
              {{$package->receiver->state}} <br>
              {{$package->receiver->country}}</td>
            <td ><b>Conatct</b><br>
              <span>{{$package->receiver->phone}}</span>                
            </td>
          </tr>
        </table>
  </div>
</div>
<div class="container d-flex justify-content-end">
  <button class="dec btn btn-info" id="downloadPDF">Download Label</button>
  {{-- <a href="/package/barcode/{{$package->id}}" class="btn button btn-success">Get PDF</a> --}}
</div>

<script>
  // download label
  $('#downloadPDF').click(function () {
    domtoimage.toPng(document.getElementById('content2'))
        .then(function (blob) {
            var pdf = new jsPDF('1', 'pt', 'a4','3','33', [$('#content2').width(), $('#content2').height()]);

            pdf.addImage(blob, 'jpeg', 0, 0, $('#content2').width(), $('#content2').height());
            pdf.save("Package Lable.pdf");

            that.options.api.optionsChanged();
        });

        window.setTimeout(function(){
        // Move to a new location
        window.location.href = "/package/ready/{{$package->id}}";
        }, 8000);
  });
</script>
@endsection 