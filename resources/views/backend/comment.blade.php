@extends('backend.master')
@section('title', 'Bình luận')	
@section('main')
<div class="panel panel-primary">
    <h1 class="h3 mb-4 text-gray-800">Danh sách bình luận</h1>
    <!-- <a href="{{asset('admin/user/add')}}" class="btn btn-primary">Thêm tài khoản</a><br><br> -->
    <div class="row">

        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bình luận</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display" id="user" width="100%" cellspacing="0">
                        @include('errors.note')
                            <thead>
                                <tr class="text-primary">
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh minh họa</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Tình trạng</th>
                                    <th width="20%">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comment as $com)
                                <tr>
                                    <td>{{$com->com_id}}</td>
                                    <td>{{$com->prod_name}}</td>
                                    <td><img width="200px" src="{{asset('layout/images/avatar/'.$com->prod_img)}}" class="thumbnail"></td>
                                    <td>{{$com->com_name}}</td>
                                    <td>{{$com->com_email}}</td>
                                    @if($com->com_check == 1)
                                    <td style="color: green;">Đã duyệt</td>
                                    @else
                                    <td style="color: blue;">Đang chờ...</td>
                                    @endif
                                    <td>
                                        <a href="{{asset('admin/comment/edit/'.$com->com_id)}}" class="btn btn-warning"><i class="far fa-edit"></i></i> Duyệt</a>
                                        <a href="{{asset('admin/comment/delete/'.$com->com_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash glyphicon glyphicon-trash" aria-hidden="true"></i> Xóa</a>
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



