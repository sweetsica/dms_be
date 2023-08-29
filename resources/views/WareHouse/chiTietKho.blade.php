@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Chi tiết kho')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection
<style>
    .text_default {
        color: var(--primary-color)
    }

    .btn-show_detail {
        color: black;
        text-decoration: underline;
        cursor: pointer;
    }

    .btn-show_detail:hover {
        color: var(--primary-color);
    }
</style>
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Chi tiết kho</h5>
                        @include('template.components.sectionCard')
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body px-5">
                                    <div class="border-bottom pb-4">
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <div class="row g-0">
                                                    <div class="col-lg-2">
                                                        <span class="fs-6 fw-bold">Tên kho :</span>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <span class="fs-6">Kho Hà Nội</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="row g-0">
                                                    <div class="col-lg-2">
                                                        <span class="fs-6 fw-bold">Mô tả :</span>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <span class="fs-6">Kho Hà Nội - Xuất lẻ</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="row g-0">
                                                    <div class="col-lg-2">
                                                        <span class="fs-6 fw-bold">Phân loại :</span>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <span class="fs-6">Kho sản phẩm</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="row g-0">
                                                    <div class="col-lg-2">
                                                        <span class="fs-6 fw-bold">Địa chỉ :</span>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <span class="fs-6">219 Trung Kính, Yên Hoà, Cầu Giấy, Hà
                                                            Nội</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="row g-0">
                                                    <div class="col-lg-3">
                                                        <span class="fs-6 fw-bold">Người quản lý :</span>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <span class="fs-6"> Nguyễn Văn A - TBHT00</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="row g-0">
                                                    <div class="col-lg-4">
                                                        <span class="fs-6 fw-bold">Kế toán phụ trách :</span>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <span class="fs-6">Nguyễn Văn B - TBHT00</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="action_wrapper d-flex flex-wrap justify-content-between align-items-center mt-3">
                                        <div class="justify-content-between align-items-center flex-grow-1 mb-2 mb-md-0">
                                            <form method="GET" action="">
                                                <div class="form-group has-search">
                                                    <input type="text" style="width: 150px; float: right;"
                                                        data-bs-toggle="tooltip" title="Tìm kiếm" class="form-control"
                                                        placeholder="Tìm kiếm" name="search" data-bs-placement="bottom">
                                                </div>
                                            </form>
                                        </div>

                                        <div class="ms-3">
                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Phân loại"
                                                style="width: 150px;">
                                                <select name="" class="selectpicker" placeholder="Phân loại">
                                                    <option value="1">Đang hoạt động
                                                    </option>
                                                    <option value="0">Ngưng hoạt động
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="ms-3">
                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Thời gian">
                                                <input type="date" class="form-control" style="width: 150px;"
                                                    placeholder="Thời gian" />
                                            </div>
                                        </div>

                                        <div class="ms-3">
                                            <button class="btn btn-danger btn-lg">
                                                <i class="bi bi-printer"></i>
                                            </button>
                                        </div>

                                        <div class="ms-3">
                                            <button class="btn btn-danger btn-lg">
                                                <i class="bi bi-download"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('template.footer.footer')
    </div>
    </div>
    @include('template.sidebar.sidebarMaster.sidebarRight')

@endsection
@section('footer-script')
    <!-- Plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>


    <!-- Chart Js -->
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-stacked100@1.0.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-datalabels@2.0.0.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangActive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangMoi.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_soDonHang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_doanhSo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_nhanSu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_chiPhi.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/components/dataHrefTable.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/resetFilter.js') }}"></script>

@endsection
