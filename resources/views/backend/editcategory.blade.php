@extends('backend.master')	
	@section('title', 'Chỉnh sửa danh mục')
	@section('main')
		
<h1 class="h3 mb-4 text-gray-800">Chỉnh sửa danh mục</h1>

          <div class="row">

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa danh mục</h6>
                </div>
                <div class="card-body">
							<form method="post" accept-charset="utf-8" enctype="multipart/form-data">
								@csrf
							    <div class="form-group">
							    	@include('errors.note')
							    	<label>Tên danh mục:</label>
    						    	<input type="text" name="name" class="form-control" placeholder="Tên danh mục..."  required value="{{$cate->cate_name}}">    
							    </div>    
						        <div class="form-group">
                                    <label>Ảnh đại diện:</label>
                                    <input type="file" name="img">
                                    <img id="avatar" class="thumbnail" width="300px" src="{{asset('/../storage/app/avatarCategory/'.$cate->cate_image)}}">
                                </div>
                                <div class="form-group">
                                    <label>Giới thiệu:</label>
                                    <textarea class="ckeditor" name="content">{{$cate->cate_present}}</textarea>
                                </div>
							    <div class="form-group">    
    						    	<input type="submit" name="submit" class="btn btn-primary" value="Sửa">    
    						    	<a href="{{asset('admin/category')}}" class="btn btn-danger">Hủy</a>
								</div>    
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