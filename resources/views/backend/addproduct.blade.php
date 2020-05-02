@extends('backend.master')
@section('title', 'Thêm sản phẩm')	
@section('main')
<h1 class="h3 mb-4 text-gray-800">Chỉnh sửa tài khoản</h1>

          <div class="row">

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa tài khoản</h6>
                </div>
                <div class="card-body">
						<form method="post" enctype="multipart/form-data">
							@csrf
							@include('errors.note')
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" class="form-control">
									</div>
									<div class="form-group" >
										<label>RAM(GB)</label>
										<input required type="number" name="ram" class="form-control">
									</div>
									<div class="form-group" >
										<label>Bộ nhớ trong(GB)</label>
										<input required type="number" name="hard" class="form-control">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="number" name="price" class="form-control">
									</div>
									<div class="form-group" >
										<label>Giảm giá</label>
										<input required type="number" name="sale" class="form-control">
									</div>
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input required id="img" type="file" name="img" >
					                    <img id="avatar" class="thumbnail" width="300px" >
									</div>
									<div class="form-group" >
										<label>Phụ kiện</label>
										<input required type="text" name="accessories" class="form-control">
									</div>
									<div class="form-group" >
										<label>Bảo hành</label>
										<input required type="text" name="warranty" class="form-control">
									</div>
									<div class="form-group" >
										<label>Khuyến mãi</label>
										<textarea class="ckeditor" required name="promotion"></textarea>
									</div>
									<div class="form-group" >
										<label>Tình trạng</label>
										<input required type="text" name="condition" class="form-control">
									</div>
									<div class="form-group" >
										<label>Số lượng</label>
										<input required type="number" name="quality" class="form-control">
									</div>
									<div class="form-group" >
										<label>Miêu tả</label>
										<textarea class="ckeditor" required name="description"></textarea>
									</div>
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="cate" class="form-control">
											@foreach($cateList as $cate)
											<option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>Sản phẩm nổi bật</label><br>
										Có: <input type="radio" name="featured" value="1">
										Không: <input type="radio" checked name="featured" value="0">
									</div>
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{asset('admin/product')}}" class="btn btn-danger">Hủy bỏ</a>
						</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->
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