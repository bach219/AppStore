@extends('frontend.master')
@section('title', 'Đổi mật khẩu')	
@section('main')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home</a></span> <span>Change</span></p>
                <h1 class="mb-0 bread">Mật khẩu người dùng</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 ftco-animate">
            <h3 class="mb-4 text-center">Đổi mật khẩu</h3>
                <form method="post" class="bg-white p-5 contact-form" id="loginForm">
                    @csrf
                    @include('errors.note')
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div>
                                <label for="oldpass" class="col-form-label">Mật khẩu hiện tại:</label>
                                <input type="password" class="form-control" id="oldpass" name="oldpass">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div>
                                <label for="newpass" class="col-form-label">Mật khẩu mới:</label>
                                <input type="password" class="form-control" id="newpass" name="newpass">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div>
                                <label for="repass" class="col-form-label">Xác nhận mật khẩu mới:</label>
                                <input type="password" class="form-control" id="repass" name="repass">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div><br>
                                <input type="submit" name="submit" value="Thay đổi" class="btn btn-primary py-3 px-10 col-md-12">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop