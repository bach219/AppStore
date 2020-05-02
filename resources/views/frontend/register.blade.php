@extends('frontend.master')
@section('title', 'Đăng nhập')	
@section('main')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home</a></span> <span>Register</span></p>
                <h1 class="mb-0 bread">Đăng ký người dùng</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 ftco-animate">
            <h3 class="mb-4 text-center">Thông tin đăng ký</h3>
                <form method="post" class="bg-white p-5 contact-form">
                    @csrf
                    @include('errors.note')
                    <div class="row align-items-end">
                    <div class="col-md-12">
                            <div class="form-group">
                                <div class="radio" >
                                    <label class="mr-3"><input type="radio" name="sex" value="Nam" required> Anh </label>
                                    <label><input type="radio" name="sex" value="Nữ" required> Chị</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input type="text" name="name" class="form-control" placeholder="Your name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" id="pass" class="form-control" placeholder="*****" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input type="password" name="passwordVerify" id="passVer" class="form-control" placeholder="*****" required>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Địa chỉ nhận hàng</label>
                                <textarea name="address" class="form-control" placeholder="House number and street name" cols="30" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số điện thoại liên lạc</label>
                                <input type="number" name="phone" class="form-control" placeholder="Phone number" maxlength="10" minlength="10" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Địa chỉ Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div><br>
                                <input type="submit" id="register" value="Đăng ký" class="btn btn-primary py-3 px-10 col-md-12">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop

@push('scripts')
<script>

    $(document).ready(function () {
        var pass = $('#pass').val();
        var passVer = $('#passVer').val();
        if(pass === passver){
            
        }
        else{
           alert('Vui lòng kiểm tra lại mật khẩu');
           $("#register").prop("disabled",true);
        }
    });

</script>
@endpush