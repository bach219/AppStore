
@extends('backend.master')	
@section('title', 'Thêm hãng')
@section('main')

<div>
    <h1 class="h3 mb-4 text-gray-800">Thêm thương hiệu</h1>

    <div class="row">

        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mẫu thương hiệu</h6>
                </div>
                <div class="card-body">
                    <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        @include('errors.note')
                        <div class="form-group">
                            <label>Tên thương hiệu:</label>
                            <input required type="text" name="name" class="form-control" placeholder="Tên thương hiệu...">
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện:</label>
                            <input required type="file" name="img">
                            <img id="avatar" class="thumbnail" width="300px">
                        </div>
                        <div class="form-group">
                            <label>Giới thiệu:</label>
                            <textarea class="ckeditor" name="content" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Thêm">
                            <a href="{{asset('admin/category')}}" class="btn btn-danger">Hủy bỏ</a>
                        </div>
                    </form>		
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>	<!--/.main-->
@stop
@push('scripts')
<script>
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