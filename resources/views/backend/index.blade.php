
@extends('backend.master')	
@section('title', 'Trang chủ')
@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thống kê dữ liệu</h1>
        <!-- <?php echo $chart1; ?> -->
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Đặt hàng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($quantity[0]->quantity,0,',','.')}} Sản phẩm</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Doanh thu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($earning[0]->total_sales,0,',','.')}} đ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Khách hàng</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{number_format($client,0,',','.')}} Thành viên</div>
                                </div>
                                <!-- <div class="col">
                                  <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Đánh giá</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($comment,0,',','.')}} Bình luận</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ so sánh sự tiêu thụ sản phẩm các hãng</h6>
                    <!-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> -->
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ tỉ lệ đánh giá sản phẩm các hãng</h6>
                    <!-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> -->
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@stop  
@push('scripts')
<script>
    window.onload = function () {

    var chart1 = new CanvasJS.Chart("chartContainer1", {
    exportEnabled: true,
            animationEnabled: true,
            // title:{
            // 	text: "Biểu đồ so sánh sự tiêu thụ sản phẩm các hãng"
            // },
            // subtitles: [{
            // 	text: "Di chuột để thấy rõ số liệu"
            // }], 
            axisX: {
            title: "Chú thích"
            },
            axisY: {
            title: "Doanh số tiêu thụ",
                    titleFontColor: "#4F81BC",
                    lineColor: "#4F81BC",
                    labelFontColor: "#4F81BC",
                    tickColor: "#4F81BC"
            },
            axisY2: {
            title: "Doanh thu bán hàng",
                    titleFontColor: "#C0504E",
                    lineColor: "#C0504E",
                    labelFontColor: "#C0504E",
                    tickColor: "#C0504E"
            },
            toolTip: {
            shared: true
            },
            legend: {
            cursor: "pointer",
                    itemclick: toggleDataSeries
            },
            data: [{
            type: "column",
                    name: "Doanh số",
                    showInLegend: true,
                    yValueFormatString: "#,##0.# sản phẩm",
                    dataPoints: [
<?php foreach ($chart1 as $chart) { ?>
                        { label: "<?php echo $chart->cate_name; ?>", y: <?php echo $chart->quantity; ?> },
<?php } ?>
                    ]
            },
            {
            type: "column",
                    name: "Doanh thu",
                    axisYType: "secondary",
                    showInLegend: true,
                    yValueFormatString: "#,##0.# đ",
                    dataPoints: [
<?php foreach ($chart1 as $chart) { ?>
                        { label: "<?php echo $chart->cate_name; ?>", y: <?php echo $chart->earning; ?> },
<?php } ?>
                    ]
            }]
    });
    chart1.render();
    function toggleDataSeries(e) {
    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
    } else {
    e.dataSeries.visible = true;
    }
    e.chart1.render();
    }



    var chart2 = new CanvasJS.Chart("chartContainer2", {
        exportEnabled: true,
        animationEnabled: true,
        // title:{
        // text: "State Operating Funds"
        // },
        legend:{
            cursor: "pointer",
            itemclick: explodePie
        },
        data: [{
        type: "pie",
        showInLegend: true,
        toolTipContent: "{name}: <strong>{y}%</strong>",
        indexLabel: "{name} - {y}%",
        dataPoints: [
            <?php foreach ($chart2 as $chart) { ?>
                { y: <?php echo $chart->rate / $sum * 100; ?>, name: "<?php echo $chart->cate_name; ?>", exploded: true },
            <?php } ?>
        ]
        }]
    });
    chart2.render();
    }

    function explodePie (e) {
    if (typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
    e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
    } else {
    e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
    }
    e.chart2.render();
    }
</script>
@endpush

