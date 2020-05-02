@extends('frontend.master')
@section('title', 'Trang Chủ')	
@section('main')

<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                    <img class="one-third order-md-last img-fluid" src="images/01_Xperia-1_Primary-product-image_Black-e776e241f1d48b55ad6e630f862253b6.png" >
                    <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">#Tin tức mới</span>
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3">Sony Xperia 8</h1>
                                <p class="mb-4">Sony tung Xperia 8 giá 500 USD, trung thành với màn hình siêu dài.</p>

                                <p><a href="https://news.zing.vn/sony-tung-xperia-8-gia-500-usd-trung-thanh-voi-man-hinh-sieu-dai-post998694.html" class="btn-custom">Khám phá ngay</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                    <img class="one-third order-md-last img-fluid" src="images/samsung-galaxy-s10-ceramic-black-side-vo3.png" alt="">
                    <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">#Tin tức mới</span>
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3">Galaxy S10</h1>
                                <p class="mb-4">Galaxy S10 5G sẽ có ‘Face ID’ khi được cập nhật Android 10.</p>

                                <p><a href="https://www.thegioididong.com/tin-tuc/galaxy-s10-5g-se-co-face-id-khi-duoc-cap-nhat-android-10-1216795" class="btn-custom">Khám phá ngay</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
    <div class="container">
        <div class="row no-gutters ftco-services">
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-5">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-bag"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Miễn phí vận chuyển</h3>
                        <p>Áp dụng với mọi đơn hàng.</p>
                    </div>
                </div>      
            </div>
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-5">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Hỗ trợ khách hàng</h3>
                        <p>Tư vấn nhiệt tình 24/7.</p>
                    </div>
                </div>    
            </div>
            <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-4 py-md-5">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-payment-security"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Thanh toán bảo mật</h3>
                        <p>Áp dụng mọi phương thức thanh toán.</p>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Sản phẩm mới nhất</h2>
                <p>Luôn cập nhật những xu hướng mới nhất</p>
            </div>
        </div>   		
    </div>
    <div class="container">
        <div class="row">
            @foreach($newList as $featured)
            <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
                <div class="product d-flex flex-column">
                    <a href="{{asset('detail/'.$featured->prod_id.'/'.$featured->prod_slug.'.html')}}" class="img-prod">
                        <img class="img-fluid" src="{{asset('/../storage/app/avatar/'.$featured->prod_img)}}" alt="Colorlib Template">
                        <div class="overlay"></div>
                        @if($featured->prod_sale > 0)
                        <span class="status">{{$featured->prod_sale}}% Off</span>
                        @endif
                    </a>
                    <div class="text py-3 pb-4 px-3">
                        <div class="d-flex">
                            <div class="cat">
                                <span>Lifestyle</span>
                            </div>
                            <div class="rating">
                                <?php
                                $x = 0;
                                if ($featured->prod_price <= 2000000)
                                    $x = 1;
                                if ($featured->prod_price > 2000000 && $featured->prod_price <= 4000000)
                                    $x = 2;
                                if ($featured->prod_price > 4000000 && $featured->prod_price <= 7000000)
                                    $x = 3;
                                if ($featured->prod_price > 7000000 && $featured->prod_price <= 13000000)
                                    $x = 4;
                                if ($featured->prod_price > 13000000)
                                    $x = 5;
                                ?>
                                <p class="text-right mb-0">
                                    @for ($i = 0; $i < $x; $i++)
                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    @endfor
                                </p>
                            </div>
                        </div>
                        <h3><a href="#">{{$featured->prod_name}}</a></h3>
                        <div class="pricing">
                            <p class="price">
                                @if($featured->prod_sale > 0)
                                <span class="mr-2 price-dc">
                                    {{number_format($featured->prod_price,0,',','.')}} đ
                                </span>
                                @endif
                                <span class="price-sale">{{number_format($featured->prod_price * (1 - $featured->prod_sale / 100),0,',','.')}} đ</span>
                            </p>
                        </div>
                        <p class="bottom-area d-flex px-3">
                            <a href="{{asset('cart/add/'.$featured->prod_id)}}" class="add-to-cart text-center py-2 mr-1"><span>Thêm vào giỏ <i class="ion-ios-add ml-1"></i></span></a>
                            <a href="{{asset('detail/'.$featured->prod_id.'/'.$featured->prod_slug.'.html')}}" class="buy-now text-center py-2">Xem chi tiết<span><i class="ion-ios-search ml-1"></i></span></a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach 	
        </div>
    </div>
</section>



<section class="ftco-section ftco-deal bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="{{asset('detail/'.$best[0]->prod_id.'/'.$best[0]->prod_slug.'.html')}}">
                    <img src="{{asset('../storage/app/avatar/'.$best[0]->prod_img)}}" class="img-fluid" alt="Siêu phẩm">
                </a>
            </div>
            <div class="col-md-6">
                <div class="heading-section heading-section-white">
                    <span class="subheading">Siêu khuyến mãi</span>
                    <h2 class="mb-3">Giá sốc cuối năm</h2>
                </div>
                <div id="timer" class="d-flex mb-4">
                    <div class="time" id="day"></div>
                    <div class="time pl-4" id="hour"></div>
                    <div class="time pl-4" id="minute"></div>
                    <div class="time pl-4" id="second"></div>
                </div>
                <div class="text-deal">
                    <h2><a href="#">{{$best[0]->prod_name}}</a></h2>
                    <p class="price">
                        <span class="mr-2 price-dc">{{number_format($best[0]->prod_price,0,',','.')}} đ</span>
                        <span class="price-sale">{{number_format($best[0]->prod_price * (1 - $best[0]->prod_sale / 100),0,',','.')}} đ</span>
                    </p>
                    <ul class="thumb-deal d-flex mt-4">
                        @foreach($sale as $sa)
                        <a href="{{asset('detail/'.$sa->prod_id.'/'.$sa->prod_slug.'.html')}}"><li class="img" style="background-image: url({{asset('../storage/app/avatar/'.$sa->prod_img)}});"></li></a>
<!--                        <li class="img" style="background-image: url(images/product-2.png);"></li>
                        <li class="img" style="background-image: url(images/product-4.png);"></li>-->
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="services-flow">
                    <div class="services-2 p-4 d-flex ftco-animate">
                        <div class="icon">
                            <span class="flaticon-bag"></span>
                        </div>
                        <div class="text">
                            <h3>Miễn phí vận chuyển</h3>
                            <p class="mb-0">Miễn phí vận chuyển, áp dụng mọi tỉnh thành trên cả nước.</p>
                        </div>
                    </div>
                    <div class="services-2 p-4 d-flex ftco-animate">
                        <div class="icon">
                            <span class="flaticon-heart-box"></span>
                        </div>
                        <div class="text">
                            <h3>Quà tặng giá trị</h3>
                            <p class="mb-0">Tặng kèm đầy đủ phụ kiện, kiểm tra hàng trước khi nhận.</p>
                        </div>
                    </div>
                    <div class="services-2 p-4 d-flex ftco-animate">
                        <div class="icon">
                            <span class="flaticon-payment-security"></span>
                        </div>
                        <div class="text">
                            <h3>Thanh toán bảo mật</h3>
                            <p class="mb-0">Áp dụng mọi phương thức thanh toán, hoàn trả.</p>
                        </div>
                    </div>
                    <div class="services-2 p-4 d-flex ftco-animate">
                        <div class="icon">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="text">
                            <h3>All Day Support</h3>
                            <p class="mb-0">Tư vấn, hỗ trợ khách hàng mọi lúc, mọi nơi.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="heading-section ftco-animate mb-5">
                    <h2 class="mb-4">Sự hài lòng của khách hàng.</h2>
                    <p>Chúng tôi luôn luôn lắng nghe, sẵn sàng chia sẻ mọi ý kiến của quý khách, người dùng.</p>
                </div>
                <div class="carousel-testimony owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap">
                            <div class="user-img mb-4" style="background-image: url(https://scontent.xx.fbcdn.net/v/t1.0-1/79841007_2524703911103511_5257736287581896704_n.jpg?_nc_cat=110&_nc_ohc=uju5jBeCB7wAQkHKRL2c7UuTf1B9ZGb6P3dpME-TTwsBB6Ry1SASLtSNA&_nc_ht=scontent.fhan3-1.fna&oh=cea89d198d67ac6e22e462fee5fe85e9&oe=5E6D3E51&_nc_fr=fhan3c01)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-4 pl-4 line">Sản phẩm tốt, giao hàng nhanh, ưng lắm.</p>
                                <p class="name">Nhat Minh</p>
                                <span class="position">UI Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap">
                            <div class="user-img mb-4" style="background-image: url(https://scontent.fhan3-2.fna.fbcdn.net/v/t1.0-1/39775374_2156293931283842_7417522985365405696_o.jpg?_nc_cat=107&_nc_ohc=HucgsOSQ6CAAQmdWmmPZWgl4wcwllqxpoF_SyKFOoLIewb2SOwlT5VNPg&_nc_ht=scontent.fhan3-2.fna&oh=9bcbaf9dac2ce98096e3699b809c630b&oe=5EADC58B)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-4 pl-4 line">Website có chất lượng tốt, mong rằng cửa hàng ngày càng phát triển thành công hơn nữa!</p>
                                <p class="name">Phan Thị Ngọc Ánh</p>
                                <span class="position">Marketing Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap">
                            <div class="user-img mb-4" style="background-image: url(https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-1/p240x240/75285808_1459267844226275_7037060218051624960_n.jpg?_nc_cat=105&_nc_ohc=sbJiOyCFKEcAQmp4-2Dh9euC3_vSK1UyAecbqqH5eAzuGHg_8sQlvqLAw&_nc_ht=scontent-sin6-1.xx&oh=2c3106a331bd3aa244676c646683999e&oe=5E691D94)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-4 pl-4 line">Đéo biét 🙂</p>
                                <p class="name">Phương Phạm</p>
                                <span class="position">Interface Designer</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="testimony-wrap">
                            <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Web Developer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap">
                            <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">System Analyst</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-gallery">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 heading-section text-center mb-4 ftco-animate">
                <h2 class="mb-4">Theo dõi chúng tôi trên Facebook</h2>
                <p>Luôn sẵn sàng tư vấn bạn.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0">
        <div class="row no-gutters">
            @foreach($categories as $cate)
            <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="{{asset('/../storage/app/avatarCategory/'.$cate->cate_image)}}" class="gallery image-popup img d-flex align-items-center" style="background-image: url({{asset('/../storage/app/avatarCategory/'.$cate->cate_image)}});">
                    <!-- <img width="100%" class="gallery image-popup img d-flex align-items-center" src="{{asset('/../storage/app/avatarCategory/'.$cate->cate_image)}}" alt="Colorlib Template"> -->
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-facebook"></span>
                    </div>
                </a>
            </div>
            @endforeach
            <!-- <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-2.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-5.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-6.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div> -->
        </div>
    </div>
</section>

@stop
@push('scripts')

<script>
    var countDownDate = new Date("Jan 1, 2020 00:00:00").getTime();

// Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        $("#day").html(days+"<span>ngày</span>");
        $("#hour").html(hours+"<span>giờ</span>");
        $("#minute").html(minutes+"<span>phút</span>");
        $("#second").html(seconds+"<span>giây</span>");
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);

</script>
@endpush