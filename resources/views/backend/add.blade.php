@extends('backend.master')
@section('title', 'Thêm nhân viên')	
@section('main')
<h1 class="h3 mb-4 text-gray-800">Thêm tài khoản</h1>

          <div class="row">

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Thêm tài khoản</h6>
                </div>
                <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    @include('errors.note')
                    <!-- <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" name="full" class="form-control" placeholder="Fullname" required />
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" class="form-control" placeholder="Username" required />
                    </div> -->
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input  id="img" type="file" name="img" >
					    <img id="avatar" class="thumbnail" width="300px" >
                    </div>
                    <div class="form-group">
                        <label>Tên quản lí</label>
                        <input type="text" name="name" class="form-control" placeholder="Username" required />
                    </div>
					<div class="form-group">
                        <label>Email</label>
                        <input type="text" name="mail" class="form-control" placeholder="Email" required />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="pass" class="form-control" placeholder="Password" required />
                    </div>
                    
                    <div class="form-group">
                        <label>Chức vụ</label>
                        <select name="level" class="form-control">
                            <!-- <option value="1">Admin</option> -->
                            <option value="Mod">Mod</option>
                            <option value="User" selected="selected">User</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />
                    <a href="{{asset('admin/user')}}" class="btn btn-danger">Hủy bỏ</a>
            </div>
            </form>
            </div>
              </div>
           </div>
</div>
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