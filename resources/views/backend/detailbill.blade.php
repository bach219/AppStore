@extends('backend.master')	
@section('title', 'Chi tiết hóa đơn')
@section('main')

<h1 class="h3 mb-4 text-gray-800">Chi tiết hóa đơn</h1>
<a style="color: white; background-color: rgb(33,115,70);" onclick="tableToExcel('customer', 'W3C_Example_Table')" value="Export to Excel" class="btn btn-primary"><i class="fas fa-file-excel"></i> Xuất Excel</a>
<a href="{{asset('admin/client/edit/'.$idClient)}}" class="btn btn-danger">Trở về</a><br><br>

<div class="row">
        <div class="col-lg-12">
                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Sản phẩm đã mua</h6>
                        <!-- <?php echo $listBill; ?> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="customer" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-primary">
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Số lượng mua</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($listBill as $bill)
                                    @if($bill->client_id == $idClient && $bill->id == $id)
                                    <tr>
                                        @foreach($product as $pro)
                                        @if($pro->prod_id == $bill->product_id)
                                        <td>{{$pro->prod_id}}</td>
                                        <td>{{$pro->prod_name}}</td>
                                        <td><img width="200px" src="{{asset('../storage/app/avatar/'.$pro->prod_img)}}" class="thumbnail"></td>
                                        <td>{{$pro->prod_price}}</td>
                                        @endif
                                        @endforeach
                                        <td>{{$bill->quantity}}</td>
                                        <td>
                                            <a href="{{asset('admin/client/deleteBillDetail/'.$bill->bill_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash glyphicon glyphicon-trash" aria-hidden="true"></i> Xóa</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
</div><!--/.row-->

@stop
@push('scripts')
<script>
         var tableToExcel = (function() {
                                                var uri = 'data:application/vnd.ms-excel;base64,', template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
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