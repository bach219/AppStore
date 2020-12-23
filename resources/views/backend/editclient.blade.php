@extends('backend.master')	
@section('title', 'Hóa đơn thành viên')
@section('main')

<h1 class="h3 mb-4 text-gray-800">Thông tin đơn hàng</h1>
<a style="color: white; background-color: rgb(33,115,70);" onclick="tableToExcel('customer', 'W3C_Example_Table')" value="Export to Excel" class="btn btn-primary"><i class="fas fa-file-excel"></i> Xuất Excel</a>
<a href="{{asset('admin/client')}}" class="btn btn-danger">Trở về</a><br><br>
<div class="row">
    <div class="col-lg-12">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Đơn hàng đã mua</h6>
                <!-- <?php echo $listBill; ?> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered display" id="customer" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-primary">
                                <th>Mã hóa đơn</th>
                                <th>Thời gian mua</th>
                                <th>Tổng giá tiền</th>
                                <th>Thanh toán</th>
                                <th width="20%">Ghi chú</th>
                                <th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listBill as $bill)
                            @if($bill->client_id == $id && $bill->bill_check == 1)
                            <tr>
                                <td>{{$bill->id}}</td>
                                <td>{{$bill->date_order}}</td>
                                <td>{{$bill->total}}</td>
                                <td>{{$bill->method}}</td>
                                <td>{{$bill->note}}</td>
                                <td>
                                    <a href="{{asset('admin/customer/edit/'.$bill->customer_id)}}" class="btn btn-warning"><i class="far fa-edit"></i> Chi tiết</a>
                                    <a href="{{asset('admin/client/deleteBill/'.$bill->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash glyphicon glyphicon-trash" aria-hidden="true"></i> Xóa</a>
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
    var table = {};
    $(document).ready(function () {
        table = $('#customer').DataTable();
    });

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