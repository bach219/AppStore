@extends('backend.master')
@section('title', 'Khách hàng')	
@section('main')
<div class="panel panel-primary">
    <h1 class="h3 mb-4 text-gray-800">Danh sách khách hàng</h1>
    <a style="color: white; background-color: rgb(33,115,70);" onclick="tableToExcel('customer', 'W3C_Example_Table')" value="Export to Excel" class="btn btn-primary"><i class="fas fa-file-excel"></i> Xuất Excel</a>
    <br><br>
    <div class="row">
        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách khách hàng</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display" id="customer" width="100%" cellspacing="0">
                        @include('errors.note')
                            <thead>
                                <tr class="text-primary">
                                    <th>ID</th>
                                    <th>Họ và tên</th>
                                    <th>Giới tính</th>
                                    <th>Email</th>
                                    <th>Điện thoại</th>
                                    <th>Xác nhận</th>
                                    <th width="20%">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php echo $cusList; ?> -->
                                @foreach($cusList as $cus)
                                <tr>
                                    <td>{{$cus->id}}</td>
                                    <td>{{$cus->name}}</td>
                                    <td>{{$cus->sex}}</td>
                                    <td>{{$cus->con_email}}</td>
                                    <td>{{$cus->phone_number}}</td>
                                    @if($cus->bill_check == 1)
                                    <td>Có</td>
                                    @else
                                    <td>Chưa</td>
                                    @endif
                                    <td>
                                        <a href="{{asset('admin/customer/edit/'.$cus->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></i> Chi tiết</a>
                                        <a href="{{asset('admin/customer/delete/'.$cus->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash glyphicon glyphicon-trash" aria-hidden="true"></i> Xóa</a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



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



