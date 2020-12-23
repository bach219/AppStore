<div class="modal fade" id="ahihi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Danh sách danh mục</h5>
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
					{{-- <select required name="name" class="form-control" id="name">
						@foreach($product as $prod)
						<option value="{{$prod->prod_id}}" >{{$prod->prod_name}}</option>
						@endforeach
					</select> --}}
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