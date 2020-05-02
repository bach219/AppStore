@extends('backend.master')
@section('title', 'Nhân viên')	
@section('main')
<div class="panel panel-primary">
    <h1 class="h3 mb-4 text-gray-800">Danh sách nhân viên</h1>
    <a href="{{asset('admin/user/add')}}" class="btn btn-primary">Thêm tài khoản</a><br><br>
    <div class="row">

        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách nhân viên</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display" id="user" width="100%" cellspacing="0">
                        @include('errors.note')
                            <thead>
                                <tr class="text-primary">
                                    <th>ID</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th width="20%">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userList as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->level}}</td>
                                    <td>
                                        <a href="{{asset('admin/user/edit/'.$user->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></i> Sửa</a>
                                        <a href="{{asset('admin/user/delete/'.$user->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash glyphicon glyphicon-trash" aria-hidden="true"></i> Xóa</a>
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
            table = $('#user').DataTable();
        });

    </script>
    @endpush



