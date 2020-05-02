@extends('frontend.master')
@section('title', 'Chính sách')	
@section('main')
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home</a></span> <span>Policy</span></p>
                <h1 class="mb-0 bread">Chính sách cửa hàng</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
		  <h2><b><p>Quy định bảo hành & đổi hàng tại Bach's Shop</p></b></h2><br>
				<p class="text-left">Tại Bach's Shop tất cả sản phẩm đều được cam kết chính hãng, bảo hành sản phẩm bị lỗi do nhà sản xuất, không bảo hành cho các yếu tố sai phạm hay tại nạn đồ vật khi sử dụng.</p>
                <p class="text-left">• Bảo hành trong vòng 7 ngày ( kể từ khi nhận hàng )</p>
                <p class="text-left">• Bảo hành hàng còn nguyên hiện trạng như lúc bán ra.Khách hàng xin vui lòng kiểm tra kĩ sản phẩm như các lỗi dây kéo, bung keo, bung chỉ do nhà sản xuất ..v..v.. trước khi nhận hàng.</p> 
                <p class="text-left">• Sản phẩm được phép đổi trả là chưa qua sử dụng, tình trạng còn mới 100% như lúc nhận</p>
                <p class="text-left">• Hỗ trợ đổi size với tất cả sản phẩm có sẵn(*)</p>
                <p class="text-left">• Không hỗ trợ trả lại hàng với sản phẩm giảm giá trên 15%</p>
				
				<p class="text-right return"><a href="{{asset('/')}}">Quay lại trang chủ</a></p>
          </div>
        </div>   		
    	</div>
    </section>

<!-- endmain -->
@stop
					