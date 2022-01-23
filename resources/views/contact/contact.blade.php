@extends('layouts.app')
@section('title','Contact Us')
@section('content')
  <section class="contact">
    <div class="container contact-form">
        <div class="contact-image">
        </div>
        <form action="/contact/send" method="POST">
          @csrf
            <h3>Drop Us a Message</h3>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="name">Name <span style="color: #FFFF00">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{old('name')}}" required/>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail <span style="color: #FFFF00">*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="Your Email" value="{{old('email')}}" required/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone <span style="color: #FFFF00">*</span></label>
                        <input type="text" name="phone" class="form-control" placeholder="Your Phone Number" value="{{old('phone')}}" required/>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="phone">Subject <span style="color: #FFFF00">*</span> </label>
                        <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{old('subject')}}" required/>
                    </div>
                    <div class="form-group">
                        <label for="content">Message <span style="color: #FFFF00">*</span></label>
                        <textarea name="content" class="form-control" placeholder="Your Message" value="{{old('content')}}" style="width: 100%; height: 123px" required></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="dec btn bg-success"> Send Message </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
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
