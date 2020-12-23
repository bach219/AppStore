@extends('backend.master')	
@section('title', 'Hồi đáp thư')
@section('main')

<h1 class="h3 mb-4 text-gray-800">Thông tin liên hệ</h1>

<div class="row">
    <div class="col-lg-6">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Trả lời Email</h6>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                        <table class="table table-bordered display" id="customer" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-primary">
                                    <th>Mã hóa đơn</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th width="20%">Ghi chú</th>
                                    <th>Thời điểm mua</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php echo $listBill; echo $id;?> -->
                                @foreach($listBill as $bill)
                                @if($bill->customer_id == $id)
                                <tr>
                                    <td>{{$bill->bill_id}}</td>
                                    @foreach($product as $pro)
                                    @if($pro->prod_id == $bill->product_id)
                                    <td>{{$pro->prod_name}}</td>
                                    <td><img width="200px" src="{{asset('layout/images/avatar/'.$pro->prod_img)}}" class="thumbnail"></td>
                                    @endif
                                    @endforeach
                                    <td>{{$bill->quantity}}</td>
                                    <td>{{$bill->note}}</td>
                                    <td>{{$bill->created_at}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>




    <div class="col-lg-6">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liên hệ khách hàng</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label>ID:</label>
                        <input type="text" name="name" class="form-control" value="{{$cus->id}}">    
                    </div>    
                    <div class="form-group">
                        <label>Họ và tên:</label>
                        <input type="text" name="name" class="form-control" value="{{$cus->name}}">    
                    </div>  
                    <div class="form-group">
                        <label>Giới tính:</label>
                        <input type="text" name="sex" class="form-control" value="{{$cus->sex}}">    
                    </div>  
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="email" class="form-control" value="{{$cus->con_email}}">    
                    </div>  
                    <div class="form-group">
                        <label>Lời nhắn:</label>
                        <textarea name="address" class="form-control"cols="30" rows="5">{{$cus->address}}</textarea>
                    </div>     
                    <div class="form-group">
                        <a href="{{asset('admin/customer')}}" class=" btn btn-danger">Trở lại</a>
                    </div>
                </form>
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