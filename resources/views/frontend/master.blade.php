<!DOCTYPE html>
<html lang="en">
    <head>
        <base href={{asset('../public/layout/frontend')}}/">
        <meta charset="utf-8">
        <title>Bach's Shop - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="google-signin-scope" content="profile email">
        <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">

        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">

        <link rel="stylesheet" href="css/aos.css">

        <link rel="stylesheet" href="css/ionicons.min.css">

        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/jquery.timepicker.css">


        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/style.css">

        <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">

        <style>
           .ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
               font-size: 12px;
            }
            #more {display: none;}
       </style>
    </head>
    <body class="goto-here">
        <div class="py-1 bg-black">
            <div class="container">
                <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                    <div class="col-lg-12 d-block">
                        <div class="row d-flex">
                            <div class="col-md pr-4 d-flex topper align-items-center">
                                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                                <span class="text">+ 0333148314</span>
                            </div>
                            <div class="col-md pr-4 d-flex topper align-items-center">
                                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                                <span class="text">nguyenvanbach579@gmail.com</span>
                            </div>
                            <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                                <span class="text">Giao hàng &amp; Hoàn trả từ 3-5 ngày</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{asset('/')}}">Bach's Shop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>
                <form class="search-form" method="get"  accept-charset="utf-8" action="{{asset('search/')}}" >
                    <div class="form-group has-success has-feedback">
                        <div style="height: 20px;"></div>
                        <input type="text" class="form-control" placeholder="Tìm kiếm" name="result" id="myInput">
                        <h4><span class="icon ion-ios-search" style="height: 20px;"></span></h4>
                    </div>
                </form> 
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="{{asset('/')}}" class="nav-link">TRANG CHỦ</a></li>
                        <li class="nav-item"><a href="{{asset('shop')}}" class="nav-link">GIAN HÀNG</a></li>                          
                        <!-- <li class="nav-item"><a href="{{asset('about')}}" class="nav-link">GIỚI THIỆU</a></li> -->
                        <!-- <li class="nav-item"><a href="{{asset('blog')}}" class="nav-link">TIN TỨC</a></li> -->
                        <li class="nav-item"><a href="{{asset('contact')}}" class="nav-link">LIÊN HỆ</a></li>
                        <li class="nav-item cta cta-colored "><a href="{{asset('cart/show')}}" class="nav-link"><span class="icon-shopping_cart"></span>[{{Cart::count()}}]</a></li>
                        <!-- <li class="nav-item"><a data-toggle="modal" data-target="#exampleModalCenter" class="nav-link">Đăng nhập</a></li> -->
                        @if(Auth::guard('clients')->user())
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chào  {{Auth::guard('clients')->user()->name}}</a>
                          <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="{{ asset('account/'.Auth::guard('clients')->user()->id) }}" ><span class="icon-account"></span> Tài khoản</a>
                            <a class="dropdown-item" href="{{ URL::to('outLogin') }}" ><span class="icon-logout"></span> Đăng xuất</a>
                          </div>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Đăng nhập</a>
                          <div class="dropdown-menu" aria-labelledby="dropdown04">
                          	<a class="dropdown-item" href="{{ URL::to('clientLogin') }}">Đăng nhập</a>
                            <a class="dropdown-item" href="{{ URL::to('register') }}">Tạo tài khoản</a>
                            <!-- <a class="dropdown-item" href="{{ URL::to('auth/facebook') }}" style="color: blue;"><span class="icon-facebook"></span> Facebook</a>
                            <a class="dropdown-item" href="{{ URL::to('auth/google') }}"style="color: red;"><span class="icon-google"></span> Google</a> -->
                          </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->



        @yield('main')
        <!-- end main -->

        <footer class="ftco-footer ftco-section">
            <div class="container">
                <div class="row">
                    <div class="mouse">
                        <a href="#" class="mouse-icon">
                            <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                        </a>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Bach's Shop</h2>
                            <p>Always live in style and stay fresh.<br>Peace!</p>
                            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                                <li class="ftco-animate"><a href="#" target="_blank"><span class="icon-skype"></span></a></li>
                                <li class="ftco-animate"><a href="https://www.facebook.com/profile.php?id=100005432081114" target="_blank"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="https://www.instagram.com/iam_bach/" target="_blank"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4 ml-md-5">
                            <h2 class="ftco-heading-2">CHÍNH SÁCH</h2>
                            <ul class="list-unstyled">
                                <li><a href="{{asset('security')}}" class="py-2 d-block">Chính sách bảo mật</a></li>
                                <li><a href="{{asset('security')}}" class="py-2 d-block">Chính sách vận chuyển</a></li>
                                <li><a href="{{asset('security')}}" class="py-2 d-block">Chính sách đổi trả</a></li>
                                <li><a href="{{asset('security')}}" class="py-2 d-block">Quy định sử dụng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">HỖ TRỢ</h2>
                            <div class="d-flex">
                                <ul class="list-unstyled">
                                    <li><a class="py-2 d-block">Từ 8:00 - 17:00 tất cả các ngày trong tuần (bao gồm cả các ngày lễ, ngày Tết).</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">GIẢI ĐÁP THẮC MẮC?</h2>
                            <div class="block-23 mb-3">
                                <ul>
                                    <li><span class="icon icon-map-marker"></span><span class="text">141 đường Chiến Thắng, Tân Triều, Thanh Trì, Hà Nội</span></li>
                                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">+ 0333148314</span></a></li>
                                    <li><a><span class="icon icon-envelope"></span><span class="text">nguyenvanbach579@gmail.com</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">

                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> , Nguyễn Bachs. All rights reserved. <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://www.facebook.com/profile.php?id=100005432081114" target="_blank">Nguyễn Bachs</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </footer>



        <!-- loader -->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <!-- <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script> -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.animateNumber.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/scrollax.min.js"></script>
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&callback=initMap"></script> -->
        <!-- <script src="js/google-map.js"></script> -->
        <script src="js/main.js"></script> 
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");
        
            if (dots.style.display === "none") {
              dots.style.display = "inline";
              btnText.innerHTML = "Đọc tiếp";
              moreText.style.display = "none";
            } else {
              dots.style.display = "none";
              btnText.innerHTML = "Rút gọn";
              moreText.style.display = "inline";
            }
        }           
</script>
        @stack('scripts')  
    </body>
</html>