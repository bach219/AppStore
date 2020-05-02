@extends('frontend.master')
@section('title', 'Liên Hệ')	
@section('main')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&callback=initMap"></script>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home</a></span> <span>Contact</span></p>
            <h1 class="mb-0 bread">liên hệ với chúng tôi</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-4 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Address:</span><br> 141 đường Chiến Thắng, Tân Triều, Thanh Trì, Hà Nội</p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone:</span><br> <a href="tel://1234567920">+ 0333148314</a></p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:</span> <a href="mailto:info@yoursite.com">bach.nguyen@savvycomsoftware.com</a></p>
	          </div>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex"> 
            <form method="post" class="bg-white p-5 contact-form" accept-charset="utf-8">
                @csrf
                @include('errors.note')
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Tên liên hệ" @if(Auth::guard('clients')->user()) value="{{Auth::guard('clients')->user()->name}}" @endif required>
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Địa chỉ Email" @if(Auth::guard('clients')->user()) value="{{Auth::guard('clients')->user()->email}}" @endif required>
              </div>
              <div class="form-group">Giới tính:
                <input type="radio" name="sex" value="Nam" @if(Auth::guard('clients')->user()) @if(Auth::guard('clients')->user()->sex == 'Nam') checked @endif @endif required>Nam
                <input type="radio" name="sex" value="Nữ" @if(Auth::guard('clients')->user()) @if(Auth::guard('clients')->user()->sex == 'Nữ') checked @endif @endif required>Nữ
              </div>
              <div class="form-group">
                <textarea name="mess" cols="30" rows="7" class="form-control" placeholder="Lời nhắn" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Liên hệ" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.311833964825!2d105.79362951475456!3d20.980133586024753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc508f938fd%3A0x883e474806a2d1f2!2sAcademy%20of%20Cryptography%20Techniques!5e0!3m2!1sen!2s!4v1574076830650!5m2!1sen!2s" width="540" height="650" frameborder="0" style="border:0;" allowfullscreen="" class="container"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section> 
    
@stop