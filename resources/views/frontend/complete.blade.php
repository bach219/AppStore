@extends('frontend.master')
@section('title', 'Cảm ơn')	
@section('main')
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home</a></span> <span>Thanks</span></p>
                <h1 class="mb-0 bread">Cảm ơn quý khách</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
		  <p>Quý khách đã đặt hàng thành công!</p><br>
				<p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
				<p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 3 đến 5 ngày, tính từ thời điểm này.</p>
				<p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
				<p>• Trụ sở chính: 141 đường Chiến Thắng, Tân Triều, Thanh Trì, Hà Nội</p>
				<p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p><br>
				<p class="text-right return"><a href="{{asset('/')}}">Quay lại trang chủ</a></p>
          </div>
        </div>   		
    	</div>
    </section>

<!-- endmain -->
@stop
					