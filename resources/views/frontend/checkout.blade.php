@extends('frontend.master')
@section('title', 'Thanh Toán')	
@section('main')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                <h1 class="mb-0 bread">Thanh toán</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="mb-4 billing-heading"><p>Thông tin khách hàng</p></h2>
            <div class="col-xl-10 ftco-animate">
                <form method="post" class="billing-form">
                    @csrf
                    @include('errors.note')
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="radio" >
                                    <label class="mr-3"><input type="radio" name="sex" value="Nam" @if(Auth::guard('clients')->user()) @if(Auth::guard('clients')->user()->sex == 'Nam') checked @endif @endif required> Anh </label>
                                    <label><input type="radio" name="sex" value="Nữ" @if(Auth::guard('clients')->user()) @if(Auth::guard('clients')->user()->sex == 'Nữ') checked @endif @endif required> Chị</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Họ và Tên</label>
                                <input type="text" name="name" class="form-control" placeholder="Your name" @if(Auth::guard('clients')->user()) value="{{Auth::guard('clients')->user()->name}}" @endif required>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Địa chỉ nhận hàng</label>
                                <textarea name="address" class="form-control" placeholder="House number and street name" cols="30" rows="5" @if(Auth::guard('clients')->user()) @endif required>@if(Auth::guard('clients')->user()) {{Auth::guard('clients')->user()->address}} @endif</textarea>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số điện thoại liên lạc</label>
                                <input type="number" name="phone" class="form-control" placeholder="Phone number" maxlength="10" minlength="10" @if(Auth::guard('clients')->user()) value="{{Auth::guard('clients')->user()->phone}}" @endif required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Địa chỉ Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" @if(Auth::guard('clients')->user()) value="{{Auth::guard('clients')->user()->email}}" @endif required>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label >Ghi chú giao hàng</label>
                                <textarea name="note" class="form-control" placeholder="Note" cols="30" rows="5" require></textarea>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="streetaddress">Phương thức giao dịch:</label>
                                <div class="radio" >
                                    <label class="mr-3"><input type="radio" name="method" value="Tiền mặt" required> Thanh toán khi nhận hàng </label>
                                    <label><input type="radio" name="method" value="Chuyển khoản" required> Chuyển khoản truóc</label>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Đặt hàng" class="btn btn-primary py-3 px-5 col-md-6">
                        <a href="{{asset('shop')}}" class="btn btn-primary py-3 px-5 col-md-6">Mua tiếp</a>
                    </div>
                </form><!-- END -->



                <div class="row mt-5 pt-3 d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="cart-detail cart-total bg-light p-3 p-md-4">
                            <h3>Hóa đơn</h3>
                            <p class="d-flex">
                                <span>Đơn hàng</span>
                                <span>{{Cart::subtotal()}} đ</span>
                            </p>
                            <p class="d-flex">
                                <span>Thuế</span>
                                <span>{{Cart::tax()}} đ</span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Tổng hóa đơn</span>
                                <span>{{$total}} đ</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-detail bg-light p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Danh sách đơn mua</h3>
                            <table>
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th></th>
                                        <th>Ảnh</th>
                                        <th>Sản Phẩm</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $prod)
                                <tr class="text-center">
                                    <td width="5%">{{$prod->qty}}</td>
                                    <td width="10%"><img src="{{asset('/../storage/app/avatar/'.$prod->options->img)}}" width="100%" alt="Colorlib Template"></td>
                                    <td ><h5>{{$prod->name}}</h5></td>
                                    <td>{{number_format($prod->price,0,',','.')}} đ</td>
                                </tr><!-- END TR-->
                                @endforeach
                                    </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div> <!-- .col-md-8 -->
        </div>
    </div>
</section> <!-- .section -->

@stop