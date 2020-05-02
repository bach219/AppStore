@extends('backend.master')
@section('title', 'Thành viên')	
@section('main')
<div class="panel panel-primary">
    <h1 class="h3 mb-4 text-gray-800">Khách hàng thành viên</h1>
    <a style="color: white; background-color: rgb(33,115,70);" onclick="tableToExcel('client', 'W3C_Example_Table')" value="Export to Excel" class="btn btn-primary"><i class="fas fa-file-excel"></i> Xuất Excel</a>
    <br><br>
    <div class="row">

        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách thành viên</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display" id="client" width="100%" cellspacing="0">
                        @include('errors.note')
                            <thead>
                                <tr class="text-primary">
                                    <th>ID</th>
                                    <th>Họ tên</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Email</th>
                                    <th>Điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th width="20%">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->id}}</td>
                                    <td>{{$client->name}}</td>
                                    <td>
                                        @if($client->image)
                                        <img width="200px" src="{{asset('/../storage/app/avatarClient/'.$client->image)}}" class="thumbnail">
                                        @else
                                        <img width="200px" src="{{asset('/../storage/app/avatarClient/noOne.png')}}" class="thumbnail">
                                        @endif
                                    </td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>{{$client->address}}</td>
                                    <td>
                                        <a href="{{asset('admin/client/edit/'.$client->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></i> Đơn hàng</a>
                                        <a href="{{asset('admin/client/delete/'.$client->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash glyphicon glyphicon-trash" aria-hidden="true"></i> Xóa</a>
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
            table = $('#client').DataTable();
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



