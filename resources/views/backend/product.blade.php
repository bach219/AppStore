@extends('backend.master')
@section('title', 'Sản phẩm')	
@section('main')	
<div >
    <!-- <div class="row">
            <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm</h1>
            </div>
    </div>/.row -->

    <h1 class="h3 mb-4 text-gray-800">Danh sách sản phẩm</h1>
    <a href="{{asset('admin/product/add')}}" class="btn btn-primary">Thêm sản phẩm</a>
    <a class="btn btn-info" href="{{asset('admin/gallery')}}">
        <i style="font-size: 20px;" class="fas fa-camera-retro"></i>
        <span>Kho ảnh</span>
    </a>
    <br><br>
    <div class="row">

        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="product" class="table table-bordered display" width="100%" cellspacing="0">	
                        @include('errors.note')			
                            <thead>
                                <tr class="text-primary">
                                    <th>ID</th>
                                    <th width="20%">Tên Sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th width="20%">Ảnh sản phẩm</th>
                                    <th>Hãng</th>
                                    <th>Danh mục</th>
                                    <th>Có sẵn</th>
                                    <th>Đã bán</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prodList as $prod)														
                                <tr>
                                    <td>{{$prod->prod_id}}</td>
                                    <td>{{$prod->prod_name}}</td>
                                    <td>{{number_format($prod->prod_price,0,',','.')}} VND</td>
                                    <td>
                                        <img width="200px" src="{{asset('layout/images/avatar/'.$prod->prod_img)}}" class="thumbnail">
                                    </td>
                                    <td>{{$prod->cate_name}}</td>
                                    @foreach($function as $func)
                                    @if($func->func_id == $prod->prod_func)
                                        <td>{{$func->func_name}}</td>
                                    @endif
                                    @endforeach
                                    <td>{{$prod->prod_qty}}</td>
                                    <?php $i = 0; ?>
                                    @foreach($slg as $qua)
                                    @if($qua->product_id == $prod->prod_id)
                                        <td>{{$qua->quantity}}</td> <?php $i++; ?>
                                    @endif
                                    @endforeach
                                    @if($i == 0)
                                        <td>0</td>
                                    @endif
                                    <td>
                                        <a href="{{asset('admin/product/edit/'.$prod->prod_id)}}" class="btn btn-warning"><i class="far fa-edit"></i> Sửa</a>
                                        <a href="{{asset('admin/product/delete/'.$prod->prod_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash glyphicon glyphicon-trash" aria-hidden="true"></i> Xóa</a>
                                        {{-- <a href="{{asset('admin/gallery')}}" class="btn btn-info"><i class="fas fa-camera-retro"></i> Ảnh</a>              --}}
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