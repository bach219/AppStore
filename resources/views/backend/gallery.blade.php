
@extends('backend.master')	
@section('title', 'Ảnh sản phẩm')
@section('main')

<div>
    <h1 class="h3 mb-4 text-gray-800">Kho ảnh sản phẩm</h1>
    <a href="{{asset('admin/gallery/add')}}" class="btn btn-primary" data-toggle="modal" data-target="#gallery" onclick="myFunctionAdd()">Thêm ảnh</a>
    <br><br>
    <div class="row">
        <!-- Brand Buttons -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách ảnh</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display" id="category" width="100%" cellspacing="0">
                            @include('errors.note')
                            <thead>
                                <tr class="text-primary">
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Mã sản phẩm</th>
                                    <th style="width:30%">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gallery as $gal)
                                <tr>
                                    <td>{{$gal->id}}</td>
                                    <td>{{$gal->prod_name}}</td>
                                    <td><img width="200px" src="{{asset('layout/images/avatar/'.$gal->image)}}" class="thumbnail"></td>
                                    <td>{{$gal->product_id}}</td>
                                    <td>
                                        <a href="{{asset('admin/gallery/edit/'.$gal->id)}}" class="btn btn-warning" data-toggle="modal" data-target="#gallery" onclick="myFunctionEdit({{$gal->id}})"><i class="far fa-edit"></i> Sửa</a>
                                        <a href="{{asset('admin/gallery/delete/'.$gal->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash"></i> Xóa</a>
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



    <div class="modal fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ảnh mô tả</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <!-- @include('errors.note') -->
                <div class="form-group" id="ID">
					<label>ID </label>
					<input id="id" type="number" name="id" class="form-control">
				</div>
                <p id="id"></p>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
					<select required name="name" class="form-control" id="name">
						@foreach($product as $prod)
						<option value="{{$prod->prod_id}}" >{{$prod->prod_name}}</option>
						@endforeach
					</select>
                </div>
                <div class="form-group" >
					<label>Ảnh </label>
					<input id="img" type="file" name="img">
					<img id="avatar" class="thumbnail" width="300px" src="">
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
  </div>
@stop
@push('scripts')
<script>
    var table = {};
    $(document).ready(function () {
        table = $('#category').DataTable();
    });
    window.addEventListener('load', function() {
      document.querySelector('input[type="file"]').addEventListener('change', function() {
          if (this.files && this.files[0]) {
              var img = document.querySelector('#avatar');  // $('img')[0]
              img.src = URL.createObjectURL(this.files[0]); 
          }
      });
    });
 
    function myFunctionAdd(){
        $("#submit").val('Thêm');
        $("#ID").css('display','none');
        $("#avatar").attr("required", true);
        $("#avatar").attr("src","");
    };
    function myFunctionEdit(x){
        $("#id").attr("required", true);
        <?php foreach($gallery as $gal) {?>
        if(<?php echo $gal->id;?> == x) {
            $("#name").val({{$gal->product_id}});
            $("#avatar").attr("src","{{asset('layout/images/avatar/'.$gal->image)}}");
            $("#submit").val('Sửa');
            $("#id").val('{{$gal->id}}');
        }
        <?php }?>
    };

</script>
@endpush