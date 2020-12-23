@extends('backend.master')	
@section('title', 'Xác nhận đơn hàng')
@section('main')

<h1 class="h3 mb-4 text-gray-800">Thông tin hóa đơn</h1>
<a style="color: white; background-color: rgb(33,115,70);" onclick="tableToExcel('testTable', 'W3C_Example_Table')" value="Export to Excel" class="btn btn-primary"><i class="fas fa-file-excel"></i> Xuất Excel</a>

@foreach($customer as $cus)
    @if($cus->bill_check == 0)
        <a style="color: white; cursor:pointer;" class="btn btn-info" href="{{asset('admin/customer/verify/'.$cus->id)}}">Xác nhận</a><br><br>
    @endif
@endforeach

<br><br>
@include('errors.note')
<br><br>
<div class="row">
    <table id="testTable" class="table table-bordered display" width="100%" cellspacing="0">
        <thead valign="top">
            <tr>

        <div class="col-lg-9">

            <!-- Circle Buttons -->
            <!-- <div class="card shadow mb-4"> -->
            <td>
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sản phẩm đã mua</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered display"  width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-primary">
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listBill as $bill)
                                <!-- <?php $bill_id = $bill->bill_id; $time = $bill->created_at; $note = $bill->note;?> -->
                                <tr>
                                    <td>{{$bill->product_id}}</td>
                                    @foreach($product as $pro)
                                    @if($pro->prod_id == $bill->product_id)
                                    <td>{{$pro->prod_name}}</td>
                                    <td><img width="200px" src="{{asset('layout/images/avatar/'.$pro->prod_img)}}" class="thumbnail"></td>
                                    @endif
                                    @endforeach
                                    <td>{{$bill->quantity}}</td>
                                    <td>{{number_format($bill->price,0,',','.')}} VND</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <!-- </div> -->
                </div>
        </td>
        </div>
        



        <div class="col-lg-3">

            <!-- Circle Buttons -->
            <!-- <div class="card shadow mb-4"> -->
            <td>
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin khách hàng</h6>
                </div>
                <div class="card-body">
                    @foreach($customer as $cus)
                    
                    <form>
                        <div class="form-group">
                            <label>Mã hóa đơn:</label>
                             <span id="id">{{$cus->id}}</span>
                        </div>
                        <div class="form-group">
                            <label>Thời gian đặt:</label>
                            {{$cus->created_at}}    
                        </div>    
                        <div class="form-group">
                            <label>Họ và tên:</label>
                            {{$cus->name}}    
                        </div>  
                        <div class="form-group">
                            <label>Giới tính:</label>
                            {{$cus->sex}}    
                        </div>  
                        <div class="form-group">
                            <label>Email:</label>
                            {{$cus->con_email}}    
                        </div>  
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            {{$cus->phone_number}}    
                        </div>  
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            {{$cus->address}}
                        </div>
                        <div class="form-group">
                            <label>Ghi chú:</label>
                            <textarea name="address" class="form-control"cols="30" rows="5">{{$cus->note}}</textarea>
                        </div>     
                    </form>
                    
                    @endforeach
                </div>
            </td>
            <!-- </div> -->
        </div>

        </tr>
        </thead>
    </table>
</div><!--/.row-->
@stop
@push('scripts')
<script>
    var table = {};
    $(document).ready(function () {     table = $('#customer').DataTable(); });
    var tableToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
                    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
                    return function(table, name) {
                            if (!table.nodeType) table = document.getElementById(table)
                            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                            window.location.href = uri + base64(format(template, ctx))
                    }
                })()

</script>
@endpush