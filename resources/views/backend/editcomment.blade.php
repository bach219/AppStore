@extends('backend.master')	
@section('title', 'Phản hồi bình luận')
@section('main')

<h1 class="h3 mb-4 text-gray-800">Thông tin khách hàng</h1>

<div class="row">
    <div class="col-lg-6">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin chi tiết</h6>
            </div>
            <div class="card-body">@include('errors.note')
                @foreach($listComment as $com)
                @if($com->com_id == $id)
                <form>
                    
                    <div class="form-group">
                        <label>ID:</label>
                        <input type="text" name="name" class="form-control" value="{{$com->com_id}}">    
                    </div>    
                    <div class="form-group">
                        <label>Họ và tên:</label>
                        <input type="text" name="name" class="form-control" value="{{$com->com_name}}">    
                    </div>    
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="email" class="form-control" value="{{$com->com_email}}">    
                    </div>  
                    <div class="form-group">
                        <label>Tên sản phẩm:</label>
                        <input type="text" name="name" class="form-control" value="{{$com->prod_name}}">    
                    </div>
                    <div class="form-group">
                        <label>Bình luận:</label>
                        <textarea name="comment" class="form-control"cols="30" rows="5">{{$com->com_content}}</textarea>
                    </div>     
                    <div class="form-group">
                        <a href="{{asset('admin/comment')}}" class=" btn btn-danger">Trở lại</a>
                    </div>
                </form>
                @endif
                @endforeach
            </div>
        </div>
    </div>




    <div class="col-lg-6">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quản lý bình luận</h6>
            </div>
            <div class="card-body">
                @foreach($listComment as $com)
                @if($com->com_id == $id)
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" >
						<label>Cho phép hiển thị</label>
                        <select required name="check" class="form-control">
							<option value="1" @if($com->com_check == 1) selected @endif>Có</option>
							<option value="0" @if($com->com_check == 0) selected @endif>Không</option>
					    </select>
					</div>
                    <div class="form-group" >
						<label>Phản hồi</label>
						<textarea class="ckeditor" required name="reply">
                            {{$com->com_reply}} 
                        </textarea>
					</div>     
                    <div class="form-group">
                        <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
                    </div>
                </form>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div><!--/.row-->
@stop
@push('scripts')
    <script>
        var table = {};
        $(document).ready(function () {
            table = $('#customer').DataTable();
        });
        
    </script>
@endpush