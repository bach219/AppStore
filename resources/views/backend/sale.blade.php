@extends('backend.master')
@section('title', 'Sản phẩm bán được')	
@section('main')	
<div >
    <!-- <div class="row">
            <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm</h1>
            </div>
    </div>/.row -->

    <h1 class="h3 mb-4 text-gray-800">Thành tích bán hàng</h1>
    <!--<a href="{{asset('admin/product/add')}}" class="btn btn-primary">Thêm sản phẩm</a>-->
    <br><br>
    <div class="row">

        <div class="col-lg-12">
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Đã bán</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($quantity[0]->quantity,0,',','.')}} Sản phẩm</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Doanh số</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($earning[0]->total_sales,0,',','.')}} đ</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Trả lời</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($comment,0,',','.')}} Bình luận</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Phản hổi</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{number_format($contact,0,',','.')}} Liên hệ</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sản phẩm bán được</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="product" class="table table-bordered display" width="100%" cellspacing="0">	
                            @include('errors.note')			
                            <thead>
                                <tr class="text-primary">
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày mua</th>
                                    <th width="40%">Sản phẩm</th>
                                    <th>Tổng tiền</th>
                                    <th>Phương thức mua</th>
                                    <th>Hóa đơn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($billList as $bill)														
                                <tr>
                                    <td>{{$bill->id}}</td>
                                    <td>{{$bill->updated_at}}</td>
                                    <td>
                                        @foreach($billDetailList as $detail)
                                        @if($bill->id == $detail->bill_id)
                                        {{$detail->prod_name}}
                                        @break
                                        @endif
                                        @endforeach

                                        @foreach($countDetailBill as $count)
                                        @if($bill->id == $count->bill_id)
                                        @if($count->product_count > 1)
                                        ... và {{$count->product_count - 1}} sản phẩm khác
                                        @endif
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{number_format($bill->total,0,',','.')}} Đ</td>
                                    <td>{{$bill->method}}</td>
                                    <td>
                                        <a href="{{asset('admin/customer/edit/'.$bill->customer_id)}}" class="btn btn-warning"><i class="far fa-edit"></i> Chi tiết</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>							
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

@stop
@push('scripts')
<script>
    var table = {};
    $(document).ready(function () {
        table = $('#product').DataTable();
    });

</script>
@endpush