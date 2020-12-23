@extends('frontend.master')
@section('title', 'Chi tiết sản phẩm')	
@section('main')

<style>
    #more {display: none;}
    body {
        font-family: Arial;
        margin: 0;
    }

    * {
        box-sizing: border-box;
    }

    img {
        vertical-align: middle;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container {
        position: relative;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
        width: 100px;
        height: 50px;
    }

    /* Container for image text */
    .caption-container {
        text-align: center;
        background-color: #222;
        padding: 2px 16px;
        color: white;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Six columns side by side */
    .column {
        float: left;
        width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }
    .mouse {
    top: -40%;
    }
    .img-fluid {
    max-width: 103%;
    }
</style>


<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
                <h1 class="mb-0 bread">Chi tiết sản phẩm</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">

                <div class="container">
                    <?php $i = 1 ?>
                    @foreach($images as $img)
                    <div class="mySlides">
                        <div class="numbertext">{{$i}} / {{$countImg}}</div>
                        <a href="{{asset('layout/images/avatar/'.$img->image)}}" class="image-popup prod-img-bg"><img src="{{asset('layout/images/avatar/'.$img->image)}}" class="img-fluid" alt="Colorlib Template"></a>
                    </div>
                    <?php $i ++; ?>
                    @endforeach

                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                    <br>
                    <div class="row">
                        @foreach($images as $img)
                        <div class="column">
                            <a href="{{asset('layout/images/avatar/'.$img->image)}}" class="image-popup prod-img-bg"><img src="{{asset('layout/images/avatar/'.$img->image)}}" class="img-fluid" alt="Colorlib Template"></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>{{$detail->prod_name}}</h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <?php
                        $x = 0;
                        if ($detail->prod_price <= 2000000)
                            $x = 1;
                        if ($detail->prod_price > 2000000 && $detail->prod_price <= 4000000)
                            $x = 2;
                        if ($detail->prod_price > 4000000 && $detail->prod_price <= 7000000)
                            $x = 3;
                        if ($detail->prod_price > 7000000 && $detail->prod_price <= 13000000)
                            $x = 4;
                        if ($detail->prod_price > 13000000)
                            $x = 5;
                        ?>
                        <a href="#" class="mr-2">{{$x}}</a>
                        @for ($i = 0; $i < $x; $i++)
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        @endfor
                    </p>
                    <p class="text-left mr-4">
                        @if($count != 0)
                            <a href="#" class="mr-2" style="color: #000;">{{$count}} <span style="color: #bbb;">Đánh giá</span></a>
                        @endif
                    </p>
                    <p class="text-left">
                        
                            @foreach($quality as $qua)
                                @if($qua->product_id == $detail->prod_id)
                                    @if($qua->quantity != 0)
                                        <a href="#" class="mr-2" style="color: #000;">
                                            {{$qua->quantity}} <span style="color: #bbb;">Đã bán</span>
                                        </a>
                                    @endif
                                @endif
                            @endforeach
                            
                    </p>
                </div>
                @if($detail->prod_sale > 0)
                <p><h4 style="color: rgb(219,204,143);">Giảm ngay: {{$detail->prod_sale}}%</h4></p>
                <p>
                    <span style="color: red; font-size: 30px;">{{number_format($detail->prod_price * (1 - $detail->prod_sale / 100),0,',','.')}} đ</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="color: #000; text-decoration: line-through;">{{number_format($detail->prod_price,0,',','.')}} đ</span>
                    @else
                <p class="price">
                    <span>{{number_format($detail->prod_price * (1 - $detail->prod_sale / 100),0,',','.')}} đ</span>                   
                    @endif
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @isset($detail->prod_condition)
                    <span class="btn btn-primary">{{$detail->prod_condition}}</span>
                    @endisset
                </p>
                <p><h4>Bảo hành:  </h4>{{$detail->prod_warranty}}</p> 
                @isset($detail->prod_accessories)
                <p><h4>Phụ kiện:  </h4>{{$detail->prod_accessories}}</p>
                @endisset
                <!-- <p><h4>Tình trạng:</h4>{{$detail->prod_condition}}</p> -->
                @if($detail->prod_promotion != "")
                <p><h4>Khuyến mãi:</h4>{!!$detail->prod_promotion!!}</p>
                @endif
                <div class="row mt-4">
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <h4><p style="color: #000;">
                                @if($detail->prod_qty > 0) {{$detail->prod_qty}} sản phẩm có sẵn
                                @else Sản phẩm đã hết hàng @endif
                            </p></h4>
                    </div>
                </div>
                @if($detail->prod_qty != 0)
                <p>
                    <a href="{{asset('cart/add/'.$detail->prod_id)}}" class="btn btn-black py-3 px-5 mr-2">Thêm Vào Giỏ Hàng</a>
                </p>
                @endif
            </div>
        </div>




        <div class="row mt-5">
            <div class="col-md-12 nav-link-wrap">
                <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Mô tả</a>

                    <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Nhà sản xuất</a>

                    <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Đánh giá</a>

                </div>
            </div>
            <div class="col-md-12 tab-wrap">

                <div class="tab-content bg-light" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                        <div class="p-4">
                            <h3 class="mb-4">Chi tiết sản phẩm</h3>
                            <p>{!!$detail->prod_description!!}</p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                        <div class="p-4">
                            <h3 class="mb-4">Sản phẩm được sản xuất bởi {{$category[0]->cate_name}}</h3>
                            {!! $category[0]->cate_present !!}
                            <!-- <button onclick="myFunction()" id="myBtn" class="btn btn-primary">Đọc tiếp</button> -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                        <div class="row p-4">
                            <div class="col-md-7">
                                @include('errors.note')
                                @if($count == 0)
                                <h3 class="mb-4">Hiện chưa có bình luận nào</h3>
                                @else
                                <h3 class="mb-4">{{$count}} Bình luận</h3>
                                @endif
                                
                                @foreach($comments as $com)
                                @if($com->com_check == 1)
                                <div class="review">
                                    @if($com->com_image)
                                    <div><img class="user-img" id="avatar" class="thumbnail" src="{{asset('layout/images/avatarClient/'.$com->com_image)}}" ></div>
                                    @else
                                    <div class="user-img" style="background-image: url(images/noOne.png)"></div>
                                    @endif
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left">{{$com->com_name}}</span>
                                            <span class="text-right" style="cursor: pointer;"><i class="icon-reply"></i></span>
                                        </h4>
                                        <div class="meta">{{date('d/m/Y H:i', strtotime($com->updated_at))}}</div>
                                        <p>{{$com->com_content}}</p>
                                    </div>
                                    @if($com->com_reply != "")
                                    <div class="desc">
                                        @if($com->image)
                                        <div><img class="user-img" id="avatar" class="thumbnail" src="{{asset('layout/images/avatarAdmin/'.$com->image)}}" ></div>
                                        @else
                                        <div class="user-img" style="background-image: url({{asset('layout/images/avatarAdmin/admin.png')}})"></div>
                                        @endif
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">{{$com->name}} - {{$com->level}}</span>
                                                <span class="text-right">
                                                    <a href="#" class="reply"><i class="icon-reply"></i></a>
                                                </span>
                                            </h4>
                                            <span class="meta">{{date('d/m/Y H:i', strtotime($com->created_at))}}</span>
                                            <p>{!! $com->com_reply !!}</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <form method="post" class="bg-white p-5 contact-form">
                                @csrf
                                @if(!Auth::guard('clients')->user())
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email" id="email" name="email">
                                </div>
                                @endif
                                <div class="form-group">
                                    <textarea name="content" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Bình luận" class="btn btn-primary py-3 px-5">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>		

@stop

@push('scripts')
<script>
    $(document).ready(function () {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function (e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function (e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });

    });

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }

</script>
@endpush