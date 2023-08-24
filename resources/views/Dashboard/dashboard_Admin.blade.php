@extends('template.master')
@section('title', 'Bảng điều khiển Admin')
@section('content')
@section('header-style')
    <style>
        .{
            border: 1px solid blueviolet;
        }      
        .row_title
        {
            font-size: 20px;
        }
        .bg-gray
        {
            background-color: rgba(221, 221, 221, 0.3);
        }
        .bg-white
        {
            background-color: rgb(255, 255, 255);
            margin-left: 5px;
            border-bottom: 2px solid rgba(221, 221, 221, 0.3);
        }   
        .cardname 
        {
            font-size: 8px;
            color: #000

        }    
        .cardvalue
        {
            font-size: 18px;
        }
        .cardtm 
        {
            position: relative;
            top: 30%;
        }
    </style>
@endsection
    <div id="mainWrap" class="mainWrap mb-0 ms-0 me-0" style="margin-top: 59px;">
        <div class="mainSection">
            <div class="main p-0">
                <div class="card mb-3">
                    <div class="" style="margin: 2px">
                        <div class="container-fluid mainSection_heading d-flex row" style="max-height: 60px; border-bottom: 3px solid var(--primary-color);">
                            {{-- <div class="col header_logo d-flex">
                                <a href="/" class="navbar-brand d-flex align-items-center scrollto me-auto me-lg-0">
                                    <img class="header_logo" src="{{ env('LOGO_URL', '') }}" />
                                </a>
                            </div> --}}
                            <div class="col d-flex justify-content-center">
                                <a href="/" class="btn btn-outline-danger btn-lg">Trang chủ</a>
                            </div>
                            <div class="col d-flex">
                                <div class="">
                                    <img class="" style="width: 40px; height: 40px" src="{{ asset('assets/img/pt_dt.png') }}" />
                                    
                                </div>
                                <div class="iconhead">
                                    <p class="card-title mt-1 " style="text-align: left; font-size: 10px;">Doanh thu</p>
                                    <strong style="margin-bottom: 0">129.345.000 VNĐ</strong>
                                </div>
                            </div>                            
                            <div class="col d-flex" >
                                <div class="">
                                    <img class="" style="width: 40px; height: 40px" src="{{ asset('assets/img/pt_ds.png ') }}" />
                                </div>
                                <div class="iconhead">
                                    <p class="card-title mt-1 " style="text-align: left; font-size: 10px;">Doanh số</p>
                                    <strong style="margin-bottom: 0">150 sản phẩm</strong>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="mainSection_heading-title" style="color: rgb(203, 11, 11)">
                                    <i class="bi bi-heart-pulse-fill"></i>
                                    DASHBOARD ADMIN
                                </h5>
                            </div>
                            
                            <div class="col d-flex" >
                                <div class="">
                                    <img class="" style="width: 40px; height: 40px" src="{{ asset('assets/img/pt_cpnc.png ') }}" />
                                </div>
                                <div class="iconhead">
                                    <p class="card-title mt-1 " style="text-align: left; font-size: 10px;">Chi phí</p>
                                    <strong style="margin-bottom: 0">30.345.000 VNĐ</strong>
                                </div>
                            </div>
                            <div class="col d-flex" >
                                <div class="">
                                    <img class="" style="width: 40px; height: 40px" src="{{ asset('assets/img/mtt_tns.png ') }}" />
                                </div>
                                <div class="iconhead">
                                    <p class="card-title mt-1 " style="text-align: left; font-size: 10px;">Tổng nhân sự</p>
                                    <strong style="margin-bottom: 0">1.256 nhân viên</strong>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="action_export ms-3" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Lọc">
                                    <button
                                        class="btn btn-outline-danger"
                                        data-bs-toggle="modal" data-bs-target="#filterOptions">
                                        <i class="bi bi-funnel"></i>
                                    </button>
                                </div>
                                <div class="action_export mx-3" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Xuất file Excel">
                                    <a role="button" class="btn-export"
                                        id="export-foodticket-btn"><i class="bi bi-download"></i></a>
                                </div>
                            </div>
                            
                            
                            
                            
                        </div>
                            {{-- @include('template.components.sectionCard') --}}
                    </div>

                      

                    <div class="" style="border-bottom: 1px dashed #000"></div>


                    <div class="mainSection_heading row mt-3">
                        
                        <div class="  col-sm-5">     
                            <div class="row_title">
                                <strong>NHÂN SỰ</strong>
                            </div>           
                            <div class="row d-flex align-items-center">
                                <div class=" col-sm-6">
                                    <div class="row">
                                        <div class="card-body col-sm-6">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="card-title">Nhân sự tuyển mới</div>
                                            </div>                                
                                            <div class="mainSection_chart-container mt-3">
                                                <canvas id="MTT_DoanhThu_ChiPhiMarketing"></canvas>
                                                1-1
                                            </div>
                                        </div>
                                        <div class="card-body col-sm-6 bg-gray row">  
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="card-title">Nhân sự chấm công</div>
                                            </div>  
                                            <div class="col-sm-6">                                                                            
                                                <div class="mainSection_chart-container mt-3">
                                                    <div class="card text-center cardtm">
                                                        <div class="card-title cardname" data-bs-toggle="tooltip" data-bs-placement="top" 
                                                        title="Số nhân sự vi phạm chấm công" style="border-bottom: 2px solid rgb(221, 221, 221)">
                                                          NSVP
                                                        </div>
                                                        <div class="card-body cardvalue">
                                                          <strong>10</strong>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">                                                                             
                                                <div class="mainSection_chart-container mt-3">
                                                    <div class="card text-center cardtm">
                                                        <div class="card-title cardname" data-bs-toggle="tooltip" data-bs-placement="top" 
                                                        title="Số lượt vi phạm chấm công" style="border-bottom: 2px solid rgb(221, 221, 221)">
                                                          Lượt
                                                        </div>
                                                        <div class="card-body cardvalue">
                                                          <strong>50</strong>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-sm-6">
                                    <div class="row">
                                        <div class="card-body  col-sm-6"> 
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="card-title">Nhân sự offline/online</div>
                                            </div>                                
                                            <div class="mainSection_chart-container mt-3">
                                                <canvas id="MTT_DoanhThu_ChiPhiMarketing"></canvas>
                                                2-1
                                            </div>
                                        </div>
                                        <div class="card-body col-sm-6 bg-gray">  
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="card-title">Lượt công tác</div>
                                            </div>                                                                                                        
                                            <div class="mainSection_chart-container mt-3">
                                                <div class="card text-center cardtm" style="width:50%; margin-left:25%">
                                                    <div class="card-title cardname" data-bs-toggle="tooltip" data-bs-placement="top" 
                                                    title="Số lượt công tác đã thực hiện" style="border-bottom: 2px solid rgb(221, 221, 221)">
                                                        Số lượt công tác
                                                    </div>
                                                    <div class="card-body cardvalue">
                                                        <strong>20</strong>
                                                    </div>                                                    
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div class="row d-flex align-items-center">
                                <div class=" col-sm-6">
                                    <div class="card-body">  
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Số nhân sự kinh doanh theo vùng</div>
                                        </div>                               
                                        <div class="mainSection_chart-container mt-3">
                                            <canvas id="MTT_NhapXuatKho"></canvas>
                                            3
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-sm-6 ">
                                    <div class="card-body">  
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Số nhân sự kinh doanh theo địa bàn</div>
                                        </div>                              
                                        <div class="mainSection_chart-container mt-3">
                                            <canvas id="MTT_SoLuongBan"></canvas>
                                            4
                                        </div>
                                    </div>
                                </div>            
                            </div>            
                        </div>
                        <div class=" col-sm-5">
                            <div class="row_title">
                                <strong>DOANH SỐ</strong>
                            </div> 
                            <div class="row d-flex align-items-center">                                
                                <div class=" col-sm-12 ">
                                    <div class="card-body">  
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Tình hình doanh số</div>
                                        </div>                              
                                        <div class="mainSection_chart-container mt-3">
                                            <canvas id="MTT_LuongKhachHang"></canvas>
                                            5
                                        </div>
                                    </div>
                                </div>         
                            </div>
                            <div class="row d-flex align-items-center">
                                <div class=" col-sm-6">
                                    <div class="card-body"> 
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Tình hình doanh số theo kênh</div>
                                        </div>                               
                                        <div class="mainSection_chart-container mt-3">
                                            <canvas id="MTT_NhapXuatKho"></canvas>
                                            6
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-sm-6 ">
                                    <div class="card-body">  
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Doanh số luỹ kế tháng</div>
                                        </div>                             
                                        <div class="mainSection_chart-container mt-3">
                                            <canvas id="MTT_SoLuongBan"></canvas>
                                            7
                                        </div>
                                    </div>
                                </div>            
                            </div>
                        </div>
                        <div class=" col-sm-2" style="height: 500px;">
                            <div class="" style="height:33%">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="card-title">Doanh số theo kênh</div>
                                </div>
                            </div>
                            <div class="" style="height:33%">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="card-title">Doanh số theo vùng</div>
                                </div>
                            </div>
                            <div class="" style="height:33%">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="card-title">Doanh số theo địa bàn</div>
                                </div>
                            </div>
                        </div>
                    </div>                                     

                    
                    <div class="mainSection_heading row mt-3">
                        
                        <div class="  col-sm-5 ">  
                            <div class="row_title">
                                <strong>SKU</strong>
                            </div>                         
                            <div class="row d-flex align-items-center">
                                <div class=" col-sm-6">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Tỷ trọng doanh số SKU</div>
                                        </div>                                
                                        <div class="mainSection_chart-container mt-3">
                                            <canvas id="MTT_DoanhThu_ChiPhiMarketing"></canvas>
                                            9
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-sm-6 ">
                                    <div class="card-body"> 
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Tỷ trọng sản lượng</div>
                                        </div>                                
                                        <div class="mainSection_chart-container mt-3">
                                            <canvas id="MTT_LuongKhachHang"></canvas>
                                            10
                                        </div>
                                    </div>
                                </div>         
                            </div>
                            <div class="row d-flex align-items-center">
                                <div class=" col-sm-6">                                    
                                    <div class="card-body"> 
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Cảnh báo hàng hoá</div>
                                        </div>                               
                                        <div class="mainSection_chart-container mt-3">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>SKU</th>
                                                        <th>Tồn kho</th>
                                                        <th>Hàng cận date</th>
                                                        <th>Hàng hỏng</th>
                                                        <th>Hàng lỗi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>SKU1</td>
                                                        <td>50</td>
                                                        <td>5</td>
                                                        <td>0</td>
                                                        <td>100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>SKU2</td>
                                                        <td>50</td>
                                                        <td>5</td>
                                                        <td>0</td>
                                                        <td>100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>SKU3</td>
                                                        <td>50</td>
                                                        <td>5</td>
                                                        <td>0</td>
                                                        <td>100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>SKU4</td>
                                                        <td>50</td>
                                                        <td>5</td>
                                                        <td>0</td>
                                                        <td>100</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-sm-6 ">                                
                                    <div class="card-body">  
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Độ phù SKU</div>
                                        </div>                             
                                        <div class="mainSection_chart-container mt-3">
                                            <canvas id="MTT_SoLuongBan"></canvas>
                                            12
                                        </div>
                                    </div>
                                </div>            
                            </div>            
                        </div>
                        <div class=" col-sm-2" style="height: 530px">
                            <div class="row_title">
                                <strong>KHÁCH HÀNG</strong>
                            </div>
                            <div class="" style="height:40%">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="card-title">Bản đồ khách hàng</div>
                                </div>
                            </div>
                            <div class="" style="height:20%">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="card-title">Số công nợ</div>
                                </div>
                            </div>
                            <div class="" style="height:30%">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="card-title">Số khách hàng đặt hàng</div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-3" style="height: 530px">
                            <div class="row_title">
                                <strong>SỐ ĐƠN & ĐỊA BÀN</strong>
                            </div>
                            <div class="" style="height:50%">
                                <div class="row" style="height: 50%">
                                    <div class=" col">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Số đơn</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="height: 50%">
                                    <div class=" col-sm-8">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Số địa bàn</div>
                                        </div>
                                    </div>
                                    <div class=" col-sm-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Sự cố vi phạm ở địa bàn</div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="row_title">
                                <strong>HOẠT ĐỘNG MARKETING</strong>
                            </div>                          
                            <div class="" style="height:40%">
                                <div class="row" style="height: 50%">
                                    <div class=" col-sm-6">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Số ca đào tạo tháng này</div>
                                        </div>
                                    </div>
                                    <div class=" col-sm-6">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Số ca activation tháng này</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="height: 50%">
                                    <div class=" col-sm-6">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Số biến bảng tháng này</div>
                                        </div>
                                    </div>
                                    <div class=" col-sm-6">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Số khách hàng đã trưng bày</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-2">
                            <div class="row_title">
                                <strong>BẢN ĐỒ ĐỊNH VỊ</strong>
                            </div>
                            <div class="row d-flex align-items-center">                                
                                <div class=" col-sm">
                                    <div class="card-body"> 
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Bản đồ vị trí đơn hàng hôm nay</div>
                                        </div>                               
                                        <div class="mainSection_chart-container mt-3">
                                            <canvas id="MTT_LuongKhachHang"></canvas>
                                            17
                                        </div>
                                    </div>
                                </div>         
                            </div>
                            <div class="row d-flex align-items-center">                                
                                <div class=" col-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="card-title">Bản đồ vị trí nhân viên hôm nay</div>
                                        </div>                               
                                        <div class="mainSection_chart-container mt-3">
                                            <canvas id="MTT_SoLuongBan"></canvas>
                                            18
                                        </div>
                                    </div>
                                </div>            
                            </div>
                        </div>
                    </div>
                    
                                      
                    
                    
                   
                    
                    
                </div>
            </div>

        <input type="hidden" name="" value="asset('/assets/js/chart/MapChartVN/vn-all.topo.json')" id="getmapvn">           
        </div>
            @include('template.footer.footer')
        </div>
    </div>



@endsection
@section('footer-script')
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/custom-datatable.js') }}"></script>

    <!-- ChartJS -->
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chart.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('assets/plugins/chartjs/chartjs-plugin-stacked100@1.0.0.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('assets/plugins/chartjs/chartjs-plugin-datalabels@2.0.0.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/chart/MapChartVN/highmaps.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/MapChartVN/exporting.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/MapChartVN/accessibility.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/MapChartVN/moment.min.js') }}"></script>

    

    <!--Charts JS -->
    <script type="text/javascript" src="{{ asset('/assets/js/chart/KeyBarChart/KeyBarChart_Floating.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/KeyLineChart/KeyLineChart_InterpolationModes.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/KeyLineChart/KeyLineChart_SteppedLineCharts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/KeyBarChart/KeyBarChart_BorderRadius.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/KeyLineChart/KeyLineChart_LineChart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/KeyOtherChart/KeyOtherChart_Doughnut.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/KeyOtherChart/KeyOtherChart_Pie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/KeyOtherChart/KeyOtherChart_Scatter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/KeyOtherChart/KeyOtherChart_ScatterMultiAxis.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/KeyOtherChart/KeyOtherChart_THKD.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DoughnutChart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/PieChart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/KeyBarChart/KeyBarChart_Vertical.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_BienDongNhanSu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_ChiPhiTheoPhongBan.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_DoanhThu_ChiPhiMarketing.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_DoanhThuTheoVung.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_HieuQuaTruyenThong.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_HieuSuatKinhDoanh.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_KhachHangTheoVung.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_LuongKhachHang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_NhapXuatKho.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_NhaPhanPhoi.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_SanPhamBanChay.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_SoLuongBan.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_TimKiemKhachHang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_TyLeChuyenDoi.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdminMTT/MTT_HeThongPhanPhoi.js') }}"></script>
 
   
    {{-- <script>
            document.addEventListener('DOMContentLoaded', function () {
                const select = document.getElementById('select');
                const chartContainers = document.querySelectorAll('.chart-container');

                select.addEventListener('change', function () {
                    chartContainers.forEach(function (container) {
                        container.style.display = 'none';
                    });

                    const selectedChartContainer = document.getElementById(select.value + 'Container');
                    selectedChartContainer.style.display = 'block';
                });
            });
    </script> --}}

    {{-- <script src="{{ asset('/assets/js/chart_hopgiaoban/doughnutChiSo.js') }}"></script> --}}
    <script>
        $('#khoLuuTruBienBanHop').DataTable({
            paging: false,
            ordering: false,
            language: {
                info: 'Hiển thị _START_ đến _END_ trên _TOTAL_ biên bản họp',
                infoEmpty: 'Hiện tại chưa có biên bản họp nào',
                search: 'Tìm kiếm biên bản',
                paginate: {
                    previous: '<i class="bi bi-caret-left-fill"></i>',
                    next: '<i class="bi bi-caret-right-fill"></i>',
                },
                search: '',
                searchPlaceholder: 'Tìm kiếm biên bản họp...',
                zeroRecords: 'Không tìm thấy kết quả',
            },
            oLanguage: {
                sLengthMenu: 'Hiển thị _MENU_ biên bản họp',
            },
            dom: '<"d-flex justify-content-between align-items-center mb-3"<"card-title-wrapper-left"><"d-flex "f>>rt<"dataTables_bottom  justify-content-end"p>',
        });

        $('div.card-titles-wrapper').html(`
            <div class="card-title">Thông số</div>
        `);

    </script>

@endsection
