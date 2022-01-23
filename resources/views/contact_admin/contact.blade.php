@extends('layouts.app')
@section('title','Contact Us')
@section('content')
  <section class="contact">
    <div class="container contact-form">
        <div class="contact-image">
            <img src="{{ asset('image/logo.png') }}" alt="sixty_six_lanka_logo"/>
        </div>
        <form action="/contact/admin/send/{{ $package->id }}" method="POST">
          @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="track_no">Track No <span style="color: #FFFF00">*</span></label>
                        <input type="text" name="track_no" class="form-control" placeholder="Track No" value="{{old('name') ?? $package->track_no}}" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail <span style="color: #FFFF00">*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{old('email')}}" required/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone <span style="color: #FFFF00">*</span> </label>
                        <input type="text" name="phone" class="form-control" placeholder="phone number" value="{{old('subject')}}" required/>
                    </div>
                    <div class="form-group">
                        <label for="content">Message <span style="color: #FFFF00">*</span></label>
                        <textarea name="content" class="form-control" placeholder="Your Message" value="{{old('content')}}" style="width: 100%; height: 123px" required></textarea>
                    </div>
                </div>
                <input style="display: none" type="text" name="admin_email" value="{{ $admin_email }}">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="dec btn"> Send Message </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
      <div class="card-deck">
        <div class="card box-shadow">
          <div class="card-header text-center">
            <h4 class="font-weight-normal">HEAD OFFICE</h4>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> &nbsp; <b>Address</b><br>
                <p>No, 66 Vauxhall Street Colombo, 00200, <br> Sri Lanka</p>
              </li>
              <li class="list-group-item"><span><i class="fa fa-phone" aria-hidden="true"></i></span> &nbsp; <b>Phone</b><br>
                <p>+94-112-333327</p>
              </li>
              <li class="list-group-item"><span><i class="fa fa-envelope" aria-hidden="true"></i></span> &nbsp; <b>E-mail</b><br>
                <p>hello@sixtysix.lk</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="card box-shadow">
          <div class="card-header text-center">
            <h4 class="font-weight-normal">INDIA OFFICE</h4>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> &nbsp; <b>Address</b><br>
                <p>123,Vasantham New Town, Vedanginallur, Thiruvallur,
                  Chennai, India - 631203</p>
              </li>
              <li class="list-group-item"><span><i class="fa fa-phone" aria-hidden="true"></i></span> &nbsp; <b>Phone</b><br>
                <p>+91 74487 86632</p>
              </li>
              <li class="list-group-item"><span><i class="fa fa-envelope" aria-hidden="true"></i></span> &nbsp; <b>E-mail</b><br>
                <p>ind@sixtysix.lk</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="card box-shadow">
          <div class="card-header text-center">
            <h4 class="font-weight-normal">Head Office</h4>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> &nbsp; <b>Address</b><br>
                <p>No, 66 Vauxhall Street Colombo, 00200, Sri Lanka</p>
              </li>
              <li class="list-group-item"><span><i class="fa fa-phone" aria-hidden="true"></i></span> &nbsp; <b>Phone</b><br>
                <p>+94-112-333327</p>
              </li>
              <li class="list-group-item"><span><i class="fa fa-envelope" aria-hidden="true"></i></span> &nbsp; <b>E-mail</b><br>
                <p>hello@sixtysix.lk</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
