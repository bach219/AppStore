
@extends('backend.master')	
@section('title', 'Nhà sản xuất')
@section('main')

<div>
    <h1 class="h3 mb-4 text-gray-800">Danh mục thương hiệu</h1>
    <a href="{{asset('admin/category/add')}}" class="btn btn-outline-info">Thêm thương hiệu</a>
    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#addFunction">Thêm danh mục</a>


    <br><br>
    <div class="row">
        <!-- Brand Buttons -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách thương hiệu</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display" id="category" width="100%" cellspacing="0">
                        @include('errors.note')
                            <thead>
                                <tr class="text-primary">
                                    <th>Tên thương hiệu</th>
                                    <th>Ảnh đại diện</th>
                                    <th style="width:30%">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cateList as $cate)
                                <tr>
                                    <td>{{$cate->cate_name}}</td>
                                    <td><img width="200px" src="{{asset('layout/images/avatarCategory/'.$cate->cate_image)}}" class="thumbnail"></td>
                                    <td>
                                        <a href="{{asset('admin/category/edit/'.$cate->cate_id)}}" class="btn btn-warning"><i class="far fa-edit"></i> Sửa</a>
                                        <a href="{{asset('admin/category/delete/'.$cate->cate_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash"></i> Xóa</a>
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
</div>	<!--/.main-->

<div class="modal fade" id="addFunction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Danh sách danh mục</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered display" id="function" width="100%" cellspacing="0">
                @include('errors.note')
                    <thead>
                        <tr class="text-primary">
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th style="width:20%">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($function as $func)
                        <tr>
                            <td>{{$func->func_id}}</td>
                            <td>{{$func->func_name}}</td>
                            <td>
                                <a href="{{asset('admin/functionality/edit/'.$func->func_id)}}" class="btn btn-warning" onclick="edit({{$func->func_id}})" data-toggle="modal" data-target="#functionality"><i class="far fa-edit"></i> Sửa</a>
                                <a href="{{asset('admin/category/delete/functionality/'.$func->func_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
                <div class="form-group">
                    <a class="btn btn-primary" style="color: white;" onclick="add()" data-toggle="modal" data-target="#functionality">Thêm </a>
                    <a href="#" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
</div>

 <div class="modal fade" id="functionality" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Danh mục</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <!-- @include('errors.note') -->
                <div class="form-group" id="ID">
                    <label for="id">ID </label>
                    <input id="id" type="number" name="id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nameFunc">Tên danh mục: </label>
                    <input id="nameFunc" type="text" name="nameFunc" class="form-control">
                </div>
        </div>
        <div class="modal-footer">
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Thêm">
                    <a href="#" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
</div> 

@stop
@push('scripts')
<script>
    var table = {};
    $(document).ready(function () {
        table = $('#category').DataTable();
        $("footer").css('display','none');

    });
    var table1 = {};
    $(document).ready(function () {
        table1 = $('#function').DataTable();
    });
    window.addEventListener('load', function() {
      document.querySelector('input[type="file"]').addEventListener('change', function() {
          if (this.files && this.files[0]) {
              var img = document.querySelector('#avatar');  // $('img')[0]
              img.src = URL.createObjectURL(this.files[0]); 
          }
      });
    });

    
    function add(){    
        $("#ID").css('display','none');
        $("#submit").val('Thêm');
        $("#nameFunc").attr("required", true);
        $("#nameFunc").val("");
    }
    function edit(x){
        // $("#ID").css('display','none');
        $("#nameFunc").attr("required", true);
        $("#submit").val('Sửa');
        <?php foreach($function as $func) { ?>
        if(<?php echo $func->func_id; ?> == x) {
            $("#nameFunc").val('{{$func->func_name}}');
            $("#id").val('{{$func->func_id}}');
        }
        <?php } ?>
    }
</script>
@endpush