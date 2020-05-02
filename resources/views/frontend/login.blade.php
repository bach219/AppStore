@extends('frontend.master')
@section('title', 'Đăng nhập')	
@section('main')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home</a></span> <span>Login</span></p>
                <h1 class="mb-0 bread">Đăng nhập người dùng</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 ftco-animate">
            <h3 class="mb-4 text-center">Thông tin đăng nhập</h3>
                <form method="post" class="bg-white p-5 contact-form">
                    @csrf
                    @include('errors.note')
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div>
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="VD: hihi@gmail.com" required>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div>
                                <label>Mật khẩu</label>
                                <input type="password" name="password" class="form-control" placeholder="*****" required>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div><br>
                                <input type="submit" value="Đăng nhập" class="btn btn-primary py-3 px-10 col-md-12">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div><br>
                                <p class="text-left return"><a href="{{asset('register')}}">Đăng ký tài khoản</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop