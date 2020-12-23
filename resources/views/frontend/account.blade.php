@extends('frontend.master')
@section('title', 'Tài khoản người dùng')	
@section('main')
<style>
    #table_length label{

    }
</style>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Account</span></p>
                <h1 class="mb-0 bread">Tài khoản khách hàng</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <!-- <div class="row"> -->
        <div class="row mt-5">
            <div class="col-md-12 nav-link-wrap">
                <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Thông tin cá nhân</a>
                    <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Hàng đã mua</a>
                    <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Thông báo</a>

                </div>
            </div>
        </div>

        <div class="col-md-12 tab-wrap">

            <div class="tab-content bg-light" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                    <div class="p-4">
                        <form method="post" enctype="multipart/form-data" class="billing-form">
                            @csrf
                            @include('errors.note')
                            <div class="row align-items-end">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <input id="img" type="file" name="img" >
                                        <img id="avatar" class="thumbnail" width="300px" src="{{asset('layout/images/avatarClient/'.Auth::guard('clients')->user()->image)}}" >
                                    </div>
                                </div>
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
                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mật khẩu</label><br>
                                        <label class="mr-3"><input type="radio" name="change" value="0" checked required> Giữ nguyên</label>
                                        <label><input type="radio" name="change" value="1" required> Thay đổi</label>
                                        <input type="text" name="password" class="form-control" placeholder="Password" >
                                    </div>
                                </div> --}}
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
                                <input type="submit" value="Cập nhật" class="btn btn-primary py-3 px-5 col-md-6">
                                {{-- <input type="button" value="Đổi mật khẩu" class="btn btn-primary py-3 px-5 " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> --}}
                                <a href="{{asset('repass')}}" class="btn btn-primary py-3 px-5 col-md-6">Mật khẩu</a> 
                            </div>
                        </form>

                        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data" class="billing-form" action="/action_page.php">
                                    <div class="form-group">
                                        <label for="oldpass" class="col-form-label">Mật khẩu cũ:</label>
                                        <input type="password" class="form-control" id="oldpass" name="oldpass">
                                    </div>
                                    <div class="form-group">
                                        <label for="newpass" class="col-form-label">Mật khẩu mới:</label>
                                        <input type="password" class="form-control" id="newpass" name="newpass">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Xác nhận mật khẩu mới:</label>
                                        <input type="password" class="form-control" id="repass" name="repass">
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Thay đổi</button>
                                </div>
                                </div>
                            </div>
                        </div> --}}


                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                    <!-- <div class="p-4"> --><br>
                    <input style="background-color: rgb(33,115,70); width: 100%" type="submit" value="Xuất Excel" class="btn btn-primary py-3 px-5 ftco-animate" onclick="tableToExcel('table', 'W3C_Example_Table')">
                    <br><br>
                    @if($listBill != [])
                    <div class="table-responsive">
                        <table class="table table-bordered display" id="table" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-primary">
                                    <th>Mã hóa đơn</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th width="20%">Ghi chú</th>
                                    <th>Thời điểm mua</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php echo $listBill; ?> -->
                                @foreach($listBill as $bill)
                                @if($bill->client_id == Auth::guard('clients')->user()->id && $bill->bill_check == 1)
                                <tr>
                                    <td>{{$bill->id}}</td>
                                    @foreach($product as $pro)
                                    @if($pro->prod_id == $bill->product_id)
                                    <td>{{$pro->prod_name}}</td>
                                    <td><img width="200px" src="{{asset('layout/images/avatar/'.$pro->prod_img)}}" class="thumbnail"></td>
                                    @endif
                                    @endforeach
                                    <td>{{$bill->quantity}}</td>
                                    <td>{{$bill->note}}</td>
                                    <td>{{$bill->created_at}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <h3 class="mb-4">Chưa có sản phẩm nào được mua</h3>
                    @endif
                    <!-- </div> -->
                </div>

                <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                    <div class="row p-4">
                        <div class="col-md-7">
                            <h3 class="mb-4">Chưa có thông báo nào</h3>
                            <!-- <p>fdgsd</p> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</section>
@stop
@push('scripts')

<script>
    var table = {};
    $(document).ready(function () {
    table = $('#table').DataTable();
    console.log('sfas');
    });
    window.addEventListener('load', function () {
    document.querySelector('input[type="file"]').addEventListener('change', function () {
    if (this.files && this.files[0]) {
    var img = document.querySelector('#avatar'); // $('img')[0]
    img.src = URL.createObjectURL(this.files[0]);
    }
    });
    });
    var tableToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;base64,', template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                , base64 = function (s) {
                    return window.btoa(unescape(encodeURIComponent(s)))
                }
        , format = function (s, c) {
            return s.replace(/{(\w+)}/g, function (m, p) {
                return c[p];
            })
        }
        return function (table, name) {
            if (!table.nodeType)
                table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
            window.location.href = uri + base64(format(template, ctx))
        }
    })()
</script>
@endpush