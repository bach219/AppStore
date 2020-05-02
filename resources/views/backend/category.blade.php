
@extends('backend.master')	
@section('title', 'Nhà sản xuất')
@section('main')

<div>
    <h1 class="h3 mb-4 text-gray-800">Danh mục sản phẩm</h1>
    <a href="{{asset('admin/category/add')}}" class="btn btn-primary">Thêm danh mục</a>
    <br><br>
    <div class="row">
        <!-- Brand Buttons -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display" id="category" width="100%" cellspacing="0">
                        @include('errors.note')
                            <thead>
                                <tr class="text-primary">
                                    <th>Tên danh mục</th>
                                    <th>Ảnh đại diện</th>
                                    <th style="width:30%">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cateList as $cate)
                                <tr>
                                    <td>{{$cate->cate_name}}</td>
                                    <td><img width="200px" src="{{asset('/../storage/app/avatarCategory/'.$cate->cate_image)}}" class="thumbnail"></td>
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
</script>
@endpush