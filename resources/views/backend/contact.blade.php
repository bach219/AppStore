@extends('backend.master')	
@section('title', 'Liên hệ')
@section('main')
<script>
    
    
</script>

<h1 class="h3 mb-4 text-gray-800">Thông tin liên hệ</h1>

<div class="row">
    <div class="col-lg-12">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Nội dung</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered display" id="customer" width="100%" cellspacing="0">
                        @include('errors.note')
                        <thead>
                            <tr class="text-primary">
                                <th>Tên liên hệ</th>
                                <th>Email</th>
                                <th>Giới tính</th>
                                <th width="30%">Lời nhắn</th>
                                <th>Thời gian</th>
                                <th>Trả lời</th>
                                <th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listContact as $con)
                            <tr>
                                <td id="name">{{$con->con_name}}</td>
                                <td id="email">{{$con->con_email}}</td>
                                <td>{{$con->sex}}</td>
                                <td>{{$con->con_message}}</td>
                                <td>{{$con->created_at}}</td>
                                @if($con->con_check == 1)
                                    <td id="{{$con->con_id}}">Có</td>
                                    @else
                                    <td id="{{$con->con_id}}">Chưa</td>
                                    @endif
                                <td>
<!--                                        <button class="btn btn-warning" href="#" data-toggle="modal" data-target="#reply" onclick="myFunction(<?php echo $con->con_id; ?>)">
                                      <i class="fas fa-edit"></i>
                                      Hồi đáp
                                    </button>-->
                                    <a href="mailto:{{$con->con_email}}?subject=Thư%20hồi%20đáp" class="btn btn-warning" target="_top" onclick="update('{{$con->con_id}}')">Hồi đáp</a>
                                    <a href="{{asset('admin/contact/delete/'.$con->con_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash glyphicon glyphicon-trash" aria-hidden="true"></i> Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div><!--/.row-->


<div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thư hồi đáp</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- <div class="modal-body" id="abc">Bạn muốn đăng xuất?</div> -->
            <div class="modal-footer">
                <form method="post" accept-charset="utf-8">
                    @csrf
                    <!-- @include('errors.note') -->
                    <div class="form-group">
                        <label>Tên người nhận:</label>
                        <input required type="text" name="name" id="nameReply" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input required type="text" name="email" id="emailReply" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nội dung:</label>
                        <textarea class="ckeditor" name="content" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Gửi">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</a>
                    </div>
                </form>
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

    function myFunction(x) {
<?php foreach ($listContact as $con) { ?>
            if (<?php echo $con->con_id; ?> == x) {
                $("#nameReply").val('<?php echo $con->con_name; ?>');
                $("#emailReply").val('<?php echo $con->con_email; ?>');
                console.log($("#nameReply").val());
            }
<?php } ?>
    }
    ;

    function update(id){
        $('#'+id).html('Có');
         $.get('{{asset('admin/contact/update')}}',
        {id:id,check: 1});
    }
</script>
@endpush