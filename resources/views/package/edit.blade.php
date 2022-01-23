@extends('layouts.app')
@section('title','Edit ' .$package->receiver->name.' Package')
@section('content')
<div class="container">
    <a class="btn btn-primary float-right" href="{{ URL::previous() }}" role="button"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Go Back</a><br><br>
    <form action="/package/{{$package->id}}" method="POST"> 
        @method('PATCH')
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="track_number">Track Number</label>
            <input type="text" class="form-control" value="{{ old('$track_no') ?? $package->track_no }}" name="track_number" disabled placeholder="SS202101050001">
            <span style="color:red">{{$errors->first('track_no')}}</span>
          </div>
          <div class="form-group col-md-6">
            <label for="estimate_weight">Estimate Weight</label>
            <input type="text" class="form-control" value="{{ old('$est_weight') ?? $package->est_weight }}" name="estimate_weight" placeholder="2.5 kg">
            <span style="color:red">{{$errors->first('est_weight')}}</span>
          </div>
        </div>
        <div class="form-group">
          <label for="type">Item Type</label>
          <select class="mdb-select md-form form-control"  id="packagetype" name="packagetype">
            {{-- <option value="{{ old('$type') ?? $package->type }}">{{ old('$type') ?? $package->type }}</option> --}}
            @foreach ($packagetype as $packagetype)
                <option  value="{{$packagetype->id}}">{{$packagetype->name}}</option>
              @endforeach
          </select>
          <span style="color:red">{{$errors->first('type')}}</span>
        </div>
        <div class="form-group">
          <label for="item_name">Item Name</label>
          <input type="text" class="form-control" value="{{ old('$item_name') ?? $package->item_name }}" name="item_name" placeholder="laptop">
          <span style="color:red">{{$errors->first('item_name')}}</span>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="num_of_box">Number of Box</label>
            <input type="text" class="form-control" value="{{ old('$num_of_box') ?? $package->num_of_box }}" name="number_of_box" placeholder="3">
            <span style="color:red">{{$errors->first('num_of_box')}}</span>
          </div>
          <div class="form-group border border-light col-md-6">
            <label>Medium</label><br>
            <input type="radio" value="{{ old('$type') ?? $package->medium }}" checked name="medium">
            <label for="air">{{ old('$type') ?? $package->medium }}</label> &nbsp;&nbsp;<br>
            <input type="radio" id="air" value="air"name="medium">
            <label for="air">By Air</label> &nbsp;&nbsp;
            <input type="radio" id="sea" value="sea" name="medium">
            <label for="sea">By Sea</label> &nbsp;&nbsp;
            <input type="radio" id="road" value="road" name="medium">
            <label for="road">By Road</label> &nbsp;&nbsp;
            <input type="radio" id="rail" value="rail" name="medium"> {{-- {{ (old('medium', 'medium') == 'rail') ? 'checked' : ''}} --}}
            <label for="rail">By Rail</label> 
            <div class="col-6">
              <span style="color:red">{{$errors->first('medium')}}</span>
            </div>
          </div>
        </div>
        <hr>
        <div class="form-row">
          <button type="submit" class="dec btn btn-primary btn-lg col-md-4" onclick="return confirm('Are you sure you want to Update {{$package->track_no}} Package?');">Submit</button>
          <span class="px-1 py-1"></span>
          <button type="reset" class="dec btn btn-warning btn-lg col-md-3" >Cancel</button>
      </div>
      </form>
</div>
@endsection