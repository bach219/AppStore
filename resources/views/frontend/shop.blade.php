@extends('frontend.master')
@section('title', 'Gian Hàng')	
@section('main')
<!-- <meta name="_token" content="{{ csrf_token() }}"> -->
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home</a></span> <span>Shop</span></p>
                <h1 class="mb-0 bread">gian hàng</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-10 order-md-last">
                <div class="row updateDiv" >
                    @if(count($Products) == 0)
                        <h1 style="font-weight: bold; color: rgb(219, 204, 143);">Không tìm thấy sản phẩm</h1>;
                    @else
                    @foreach($Products as $featured)
                    <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex" id="sp">
                        <div class="product d-flex flex-column">
                            <a href="{{asset('detail/'.$featured->prod_id.'/'.$featured->prod_slug.'.html')}}" class="img-prod"><img class="img-fluid" src="{{asset('/../storage/app/avatar/'.$featured->prod_img)}}" alt="Colorlib Template">
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
                                <h3><a href="#" id="name">{{$featured->prod_name}}</a></h3>
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
                    @endif

                </div>
                <div class="block-27">
                    <ul class="pagination justify-content-center">
                        {{$Products->links()}}
                    </ul>
                </div>
                <!--                    {{ session('output') }}-->
            </div>

            <div class="col-md-4 col-lg-2">
                <div class="sidebar">
                    <div class="sidebar-box-2">
                        <h2 class="heading">Danh mục</h2>
                        <div class="fancy-collapse-panel">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Mức giá
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <ul>
                                            <li>
                                                <input type="checkbox" class="price" name="price[]" value="1" <?php if($gia == '1') {?> checked <?php } ?>> Dưới 2 triệu
                                            </li>
                                            <li>
                                                <input type="checkbox" class="price" name="price[]" value="2" <?php if($gia == '2') {?> checked <?php } ?>> Từ 2 - 4 triệu
                                            </li>
                                            <li>
                                                <input type="checkbox" class="price" name="price[]" value="3" <?php if($gia == '3') {?> checked <?php } ?>> Từ 4 - 7 triệu
                                            </li>
                                            <li>
                                                <input type="checkbox" class="price" name="price[]" value="4" <?php if($gia == '4') {?> checked <?php } ?>> Từ 7 - 13 triệu
                                            </li>
                                            <li>
                                                <input type="checkbox" class="price" name="price[]" value="5" <?php if($gia == '5') {?> checked <?php } ?>> Trên 13 triệu
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Hãng sản xuất
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <ul>
                                            @foreach($categories as $cate)
                                            <li>
                                                <input type="checkbox" name="cate[]" value="{{$cate->cate_id}}" class="cate" <?php if(in_array($cate->cate_id,$hang)) {?> checked <?php } ?>/> {{$cate->cate_name}}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">RAM
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        <ul>
                                        @foreach($RAM as $tg)
                                            <li>
                                                <input type="checkbox" class="ram" name="ram[]" value="{{$tg->prod_ram}}" <?php if(in_array($tg->prod_ram,$ramGB)) {?> checked <?php } ?>> {{$tg->prod_ram}}GB
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Bộ nhớ trong
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body">
                                        <ul>
                                        @foreach($HARD as $tg)
                                            <li>
                                                <input type="checkbox" class="hard" name="hard[]" value="{{$tg->prod_hardDrive}}" <?php if(in_array($tg->prod_hardDrive,$hardGB)) {?> checked <?php } ?>> {{$tg->prod_hardDrive}}GB
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Sắp xếp
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <ul>
                                            <li>
                                                <input type="checkbox" class="sort" name="sort[]" value="1" <?php if($sx == '1') {?> checked <?php } ?>> <span style="font-weight: bold; color: rgb(219, 204, 143);">Hàng giảm giá</span>
                                            </li>
                                            <li>
                                                <input type="checkbox" class="sort" name="sort[]" value="2" <?php if($sx == '2') {?> checked <?php } ?>> Giá cao đến thấp
                                            </li>
                                            <li>
                                                <input type="checkbox" class="sort" name="sort[]" value="3" <?php if($sx == '3') {?> checked <?php } ?>> Giá thấp đến cao
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="sidebar-box-2">
                                <form method="post" class="colorlib-form-2">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="guests">Giá sản phẩm</label>
                                                <div class="form-field">
                                                    <i class="icon icon-arrow-down3"></i>
                                                    <select name="price" id="price" class="form-control">
                                                        <option value="1">Dưới 2 triệu</option>
                                                        <option value="2">Từ 2 - 4 triệu</option>
                                                        <option value="3">Từ 4 - 7 triệu</option>
                                                        <option value="4">Từ 7 - 13 triệu</option>
                                                        <option value="5">Trên 13 triệu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </div>
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
        <?php 
            function currentUrl($server){
                //Figure out whether we are using http or https.
                $http = 'http';
                //If HTTPS is present in our $_SERVER array, the URL should
                //start with https:// instead of http://
                if(isset($server['HTTPS'])){
                    $http = 'https';
                }
                //Get the HTTP_HOST.
                $host = $server['HTTP_HOST'];
                //Get the REQUEST_URI. i.e. The Uniform Resource Identifier.
                $requestUri = $server['REQUEST_URI'];
                //Finally, construct the full URL.
                //Use the function htmlentities to prevent XSS attacks.
                return htmlentities($host) . htmlentities($requestUri);
            }
             
            $url = currentUrl($_SERVER);
        ?>
        
        var link = '{{asset('shop')}}?';
        var x = 0;
        var categories, sort, ram, hard;
        $('.cate').click(function () {
            x ++;
            categories = [];
            $('.cate').each(function () {
                if ($(this).is(":checked")) {
                    categories.push($(this).val());
                }
            });
            Finalcategories = categories.toString();
            if(Finalcategories != []){
            link += ('category='+Finalcategories);
            window.location = link;
            }
            else window.location = '{{asset('shop')}}';
        });

        $('.ram').click(function () {
            x ++;
            ram = [];
            $('.ram').each(function () {
                if ($(this).is(":checked")) {
                    ram.push($(this).val());
                }
            });
            Finalram = ram.toString();
            if(Finalram != []){
            link += ('ram='+Finalram);
            window.location = link;
            }
            else window.location = '{{asset('shop')}}';
        });

        $('.hard').click(function () {
            x ++;
            hard = [];
            $('.hard').each(function () {
                if ($(this).is(":checked")) {
                    hard.push($(this).val());
                }
            });
            Finalhard = hard.toString();
            if(Finalhard != []){
            link += ('hard='+Finalhard);
            window.location = link;
            }
            else window.location = '{{asset('shop')}}';
        });
        

        $('.price').on('change',function () {
            x ++;
            price = '';
            $('.price').each(function () {
                if ($(this).is(":checked")) {
                    price = ''+($(this).val());
                }
            });
            // Finalprice = price.toString();
            if(price != ''){
            link += ('price='+price);
            window.location = link;
            }
            else window.location = '{{asset('shop')}}';
        });

        $('.sort').click(function () {
            x ++;
            sort = '';
            $('.sort').each(function () {
                if ($(this).is(":checked")) {
                    sort = ''+($(this).val());
                }
            });
            // Finalsort = sort.toString();
            if(sort != ''){
            link += ('sort='+sort);
            window.location = link;
            }
            else window.location = '{{asset('shop')}}';
        });
    });

</script>
@endpush