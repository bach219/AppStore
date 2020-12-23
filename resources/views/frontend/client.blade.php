@extends('backend.master')
@section('title', 'Client')	
@section('main')
<div class="panel panel-primary">
    <h1 class="h3 mb-4 text-gray-800">Khách hàng thành viên</h1>
    <a href="{{asset('admin/client/add')}}" class="btn btn-primary">Thêm tài khoản</a><br><br>
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
                                    <td><img width="200px" src="{{asset('layout/images/avatarClient/'.$client->image)}}" class="thumbnail"></td>
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

    </script>
    @endpush



