@extends('backend.master')
@section('title', 'Chỉnh sửa tài khoản')	
@section('main')
<h1 class="h3 mb-4 text-gray-800">Chỉnh sửa tài khoản</h1>

          <div class="row">

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tài khoản cá nhân</h6>
                </div>
                <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    @include('errors.note')
                    <!-- <div class="form-group">
                            <label>Fullname</label>
                        <input type="text" name="full" class="form-control" placeholder="Fullname" value="{{$user->prod_name}}" required />
                    </div>
                    <div class="form-group">
                            <label>Username</label>
                        <input type="text" name="user" class="form-control" placeholder="Username" value="nguyenvana" required />
                    </div> -->
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input  id="img" type="file" name="img" >
					    <img id="avatar" class="thumbnail" width="300px" src="{{asset('layout/images/avatarAdmin/'.$user->image)}}">
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" name="name" class="form-control" placeholder="Username"  value="{{$user->name}}" required />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="mail" class="form-control" placeholder="Email"  value="{{$user->email}}" required />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label><br>
                        <label class="mr-3"><input type="radio" name="change" value="0" checked required> Giữ nguyên</label>
                        <label><input type="radio" name="change" value="1" required> Thay đổi</label>
                        <input type="text" name="pass" class="form-control" placeholder="Password"   />
                    </div> 
                    <div class="form-group">
                        <label>Chức vụ</label>
                        @if(Auth::user()->level == "Admin" && $id != 1)
                        <select name="level" class="form-control">
                            <option value="Admin" <?php if ($user->level == "Admin") { ?> selected="selected" <?php } ?>>Admin</option>
                            <option value="Mod" <?php if ($user->level == "Mod") { ?> selected="selected" <?php } ?>>Mod</option>
                            <option value="Sale" <?php if ($user->level == "User") { ?> selected="selected" <?php } ?>>Sale</option>
                        </select>
                        @else
                        : {{$user->level}}
                        @endif
                    </div>
                    <input type="submit" name="submit" value="Sửa" class="btn btn-primary" />
                    <a href="{{asset('admin/user')}}" class="btn btn-danger">Hủy bỏ</a>
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