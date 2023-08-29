@extends('template.master')
@section('title', 'Bảng điều khiển Admin')
@section('content')
@section('header-style')
    <style>
        .testkh{
            border: 1px solid blueviolet;
        }  
        .testkh1{
            border: 1px solid red;
            padding: 1%;
        }   
        .testkh2{
            border: 1px solid black;
        }    
        .testkh3{
            border: 1px solid yellowgreen;
        } 
        .testkh4{
            border: 1px solid yellow;
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
                <div class="card mb-3 testkh" style="height: 1080px;">    
                    <div class="row testkh" style="height:50%">
                        <div class="col-sm-5 testkh1">
                            <div class="row testkh2" style="height: 15%">
                                DASHBOARD
                            </div>
                            <div class="row testkh2" style="height: 10%">
                                Nhân sự
                            </div>
                            <div class="row testkh2" style="height: 30%">
                                <div class="col-sm-3 testkh3">
                                    tuyển mới
                                </div>
                                <div class="col-sm-3 testkh3">
                                    <div class="row testkh4" style="height: 20%">
                                        chấm công
                                    </div>
                                    <div class="row testkh4" style="height: 80%">
                                        <div class="col-sm-6 testkh4">
                                            1
                                        </div>
                                        <div class="col-sm-6 testkh4">
                                            2
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 testkh3">
                                    online/offline
                                </div>
                                <div class="col-sm-3 testkh3">
                                    <div class="row testkh4" style="height: 20%">
                                        công tác
                                    </div>
                                    <div class="row testkh4" style="height: 80%">
                                        1 card
                                    </div>
                                </div>
                            </div>
                            <div class="row testkh2" style="height: 45%">
                                <div class="col-sm-6 testkh3">
                                    Theo vùng
                                </div>
                                <div class="col-sm-6 testkh3">
                                    Theo địa bàn
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 testkh1">
                            <div class="row testkh2" style="height: 10%">
                                Doanh số
                            </div>
                            <div class="row testkh2" style="height: 45%">
                                <div class="col-sm-12 testkh3">
                                    tình hình
                                </div>                                
                            </div>
                            <div class="row testkh2" style="height: 45%">
                                <div class="col-sm-6 testkh3">
                                    theo kênh
                                </div>  
                                <div class="col-sm-6 testkh3">
                                    luỹ kế tháng
                                </div>  
                            </div>
                        </div>
                        <div class="col-sm-2 testkh1">
                            <div class="row testkh2" style="height: 33%">
                                Kênh 
                            </div>
                            <div class="row testkh2" style="height: 33%">
                                Vùng 
                            </div>
                            <div class="row testkh2" style="height: 33%">
                                Địa bàn
                            </div>
                        </div>
                    </div>
                    <div class="row testkh" style="height:50%">
                        <div class="col-sm-5 testkh1">
                            <div class="row testkh2" style="height: 10%">
                                SKU
                            </div>
                            <div class="row testkh2" style="height: 45%">
                                <div class="col-sm-6 testkh3">
                                    doanh số
                                </div>  
                                <div class="col-sm-6 testkh3">
                                    sản lượng
                                </div>                                
                            </div>
                            <div class="row testkh2" style="height: 45%">
                                <div class="col-sm-5 testkh3">
                                    Hàng hoá
                                </div>  
                                <div class="col-sm-7 testkh3">
                                    phù sku
                                </div>  
                            </div>
                        </div>
                        <div class="col-sm-2 testkh1">
                            <div class="row testkh2" style="height: 10%">
                                Khách hàng
                            </div>
                            <div class="row testkh2" style="height: 40%">
                                bản đồ
                            </div>
                            <div class="row testkh2" style="height: 20%">
                                công nợ
                            </div>
                            <div class="row testkh2" style="height: 30%">
                                đặt hàng
                            </div>
                        </div>
                        <div class="col-sm-3 testkh1">
                            <div class="row testkh2" style="height: 10%">
                                Số đơn và địa bàn
                            </div>
                            <div class="row testkh2" style="height: 25%">
                                <div class="col-sm-12 testkh3" style="height: 20%">
                                    Số đơn
                                </div>
                                <div class="col-sm-3 testkh3" style="height: 80%">
                                    1
                                </div>
                                <div class="col-sm-3 testkh3" style="height: 80%">
                                    2
                                </div>
                                <div class="col-sm-3 testkh3" style="height: 80%">
                                    3
                                </div>
                                <div class="col-sm-3 testkh3" style="height: 80%">
                                    4
                                </div>
                            </div>
                            <div class="row testkh2" style="height: 25%">
                                <div class="col-sm-8 testkh3">
                                    <div class="row testkh4" style="height: 20%">
                                        số địa bàn
                                    </div>
                                    <div class="row testkh4" style="height: 80%">
                                        <div class="col-sm-4 testkh4">
                                            1
                                        </div>
                                        <div class="col-sm-4 testkh4">
                                            2
                                        </div>
                                        <div class="col-sm-4 testkh4">
                                            3
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 testkh3">
                                    <div class="row testkh4" style="height: 20%">
                                        số địa bàn
                                    </div>
                                    <div class="row testkh4" style="height: 80%">
                                        fff
                                    </div>
                                </div>
                            </div>
                            <div class="row testkh2" style="height: 10%">
                                Hoạt động marketing
                            </div>
                            <div class="row testkh2" style="height: 30%">
                                <div class="col-sm-6 testkh3">
                                    <div class="row testkh4" style="height: 50%">
                                        ca
                                    </div>
                                    <div class="row testkh4" style="height: 50%">
                                        ca
                                    </div>
                                </div>
                                <div class="col-sm-6 testkh3">
                                    <div class="row testkh4" style="height: 50%">
                                        đào
                                    </div>
                                    <div class="row testkh4" style="height: 50%">
                                        ca
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 testkh1">
                            <div class="row testkh2" style="height: 10%">
                                bản đồ
                            </div>
                            <div class="row testkh2" style="height: 45%">
                                đơn hàng hôm nay
                            </div>
                            <div class="row testkh2" style="height: 45%">
                                vị trí hôm nay
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
