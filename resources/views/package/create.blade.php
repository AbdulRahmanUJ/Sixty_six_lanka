@extends('layouts.app')
@section('title','Create Package')
@section('content')
<div class="container">
    <h1>Create Order</h1>
    <form action="/package" method="POST">
      @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="track_number">Track Number</label>
            <input type="text" class="form-control" name="track_number" disabled placeholder="SS202101050001">
            <span style="color:red">{{$errors->first('track_number')}}</span>
          </div>
          <div class="form-group col-md-6">
            <label for="estimate_weight">Estimate Weight</label>
            <input type="text" class="form-control" name="estimate_weight" value="{{old('estimate_weight')}}" placeholder="2.5 kg">
            <span style="color:red">{{$errors->first('estimate_weight')}}</span>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="packagetype">Item Type</label>
            <select class="mdb-select md-form form-control" value="{{old('packagetype')}}" id="packagetype" name="packagetype">
              <option value="" disabled selected>Select Item Type</option>
              @foreach ($packagetype as $packagetype)
                <option  value="{{$packagetype->id}}">{{$packagetype->name}}</option>
              @endforeach
            </select>
            <span style="color:red">{{$errors->first('packagetype')}}</span>
          </div>
          <div class="form-group col-md-6">
            <label for="item_name">Item Name</label>
            <input type="text" class="form-control" name="item_name" value="{{old('item_name')}}" placeholder="laptop">
            <span style="color:red">{{$errors->first('item_name')}}</span>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="num_of_box">Number of Box</label>
            <input type="number" class="form-control" name="number_of_box" value="{{old('number_of_box')}}" placeholder="3">
            <span style="color:red">{{$errors->first('number_of_box')}}</span>
          </div>
          <div class="form-group border border-light col-md-6">
            <label>Medium</label><br>
            <input type="radio" id="air" value="air" name="medium">
            <label for="air">By Air</label> &nbsp;&nbsp;
            <input type="radio" id="sea" value="sea" name="medium">
            <label for="sea">By Sea</label> &nbsp;&nbsp;
            <input type="radio"  id="road" value="road" name="medium">
            <label for="road">By Road</label> &nbsp;&nbsp;
            <input type="radio" id="rail" value="rail" name="medium">
            <label for="rail">By Rail</label> 
            <div class="col-6">
              <span style="color:red">{{$errors->first('medium')}}</span>
            </div>
          </div> 
        </div>
        <hr> 
        {{-- <div class="form-row my-4"> --}}
          <label for="receiver">Receiver Name</label>
          <select class="mdb-select md-form form-control" id="receiver" name="receiver" value="{{old('receiver')}}" readonly>
              <option  value="{{$receiver->id}}">{{$receiver->name}}</option>
          </select>
          <span style="color:red">{{$errors->first('receiver')}}</span>
          <br>
          <div class="row">
              <div class="col-md-8">
                  <label for="address">Address</label>
                  <input type="text" name="address" value="{{$receiver->address}}" class="form-control" id="inputAddress" placeholder="Address" disabled>
                </div>
                <div class="col-md-4">
                  <label for="phone">Phone Number</label>
                  <input type="text" name="phone" value="{{$receiver->phone}}" class="form-control" id="phone" placeholder="Phone Number" disabled>
                </div>
          </div>
          <br>
          <div class="row">
              <div class="col-md-4">
                  <label for="country">Country</label>
                  <select id="country" name="country" class="form-control">
                  <option value="">{{$receiver->country}}</option disabled>
                  </select>
              </div>
              <div class="col-md-4">
                  <label for="state">State / Atoll</label>
                  <select id="state" name="state"  class="form-control">
                  <option value="">{{$receiver->state}}</option disabled>
                  </select>
              </div>
              <div class="col-md-2">
                  <label for="city">City</label>
                  <select id="city" name="city" class="form-control">
                  <option value="">{{$receiver->city}}</option disabled>
                  </select>
              </div>
              <div class="col-md-2">
                  <label for="inputZip">Zip Number</label>
                  <input type="text" name="zip" value="{{$receiver->zip}}" class="form-control" id="inputZip" placeholder="150600" disabled>
              </div>
          </div>
          <br>
        {{-- </div> --}}
        <div class="row">
          <button type="submit" class="dec btn btn-primary btn-lg col-md-4">Submit</button>
          <span class="px-1 py-1"></span>
          <button type="reset" class="dec btn btn-warning btn-lg col-md-3">Cancel</button>
      </div>
      </form>
</div>
@endsection