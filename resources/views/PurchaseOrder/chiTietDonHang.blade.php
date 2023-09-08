@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Chi tiết đơn đặt hàng')
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

    .img-qr {
        width: 100%;
        max-height: 70px;
        object-fit: cover;
    }

    .style_select {
        border: none !important;
    }

    .style_select button.btn.dropdown-toggle.btn-light {
        background-color: transparent !important;
        border: none !important;
        box-shadow: none !important;
        outline: none !important;
    }

    .style_select .dropdown-toggle::after {
        display: none !important;
    }

    .style_select:focus {
        outline: none !important;
        border: none !important;
        box-shadow: none !important;
    }

    .layout_grid {
        display: grid;
        grid-template-columns: 150px auto;
    }

    .dropdown-menu-center {
        top: 5% !important;
        left: -82% !important;
        right: auto !important;
        width: 300px !important;
        height: auto;
    }
</style>

@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap" style="height: 150rem">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Chi tiết đơn đặt hàng</h5>
                        @include('template.components.sectionCard')
                    </div>
                    <div class="row">
                        <form action="#">
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center justify-content-between my-4 mx-3">
                                    <div>
                                        <button class="btn btn-outline-danger p-2 me-2">
                                            <i class="bi bi-x-lg"></i>
                                            Từ chối
                                        </button>
                                        <button class="btn btn-danger p-2">
                                            <i class="bi bi-check-lg"></i>
                                            Duyệt
                                        </button>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-danger me-2">Lưu</button>
                                        <button class="btn btn-danger me-2" id="editButton">
                                            <i class="bi bi-pencil "></i>
                                            Sửa
                                        </button>
                                        <button class="btn btn-danger me-2">
                                            <i class="bi bi-printer "></i>
                                            In
                                        </button>
                                        <a class="btn btn-outline-secondary" href="{{ route('PurchaseOrder.index') }}">
                                            Đóng
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card mb-3">
                                    <div class="card-body" style="padding: 50px">
                                        <div
                                            class="d-flex align-items-center justify-content-between border-bottom border-secondary border-1 pb-3">
                                            <div class="item-logo">
                                                <img class="header_logo"
                                                    src="{{ asset('assets/img/logo-thaihung-1-2.jpg') }}" alt="logo" />
                                                {{-- <img class="header_logo" src="{{ env('LOGO_URL', '') }}" alt="logo" /> --}}
                                                <p class="m-0 fs-5">Mã: {{ $order_detail->code }}</p>
                                            </div>
                                            <div class="item-title text-center">
                                                <h1 class="m-0">PHIẾU ĐẶT HÀNG</h1>
                                                <p class="m-0 fs-5">Ngày đặt: {{ date('d/m/Y', strtotime($order_detail->created_at)) }}</p>
                                            </div>
                                            <div class="d-flex" style="width:64px; height:80px;">
                                                {!! QrCode::generate(route('PurchaseOrder.show', $order_detail->id)) !!}
                                            </div>
                                            
                                        </div>

                                        <div class="mt-5 border-bottom border-1 pb-3">
                                            <div class="row g-0 mb-4">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <span class="fs-5 fw-bold" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Từ chối">Khách hàng :</span>
                                                        <span class="fs-5 ">{{ $order_detail->customer->name ?? '' }} - {{ $order_detail->customer->code ?? 'DTSD029' }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div>
                                                        <span class="fs-5 fw-bold">Số điện thoại : </span>
                                                        <span class="fs-5 ">{{ $order_detail->customer->phone ?? '' }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-0 mb-4">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <span class="fs-5 fw-bold">Địa chỉ :</span>
                                                        <span class="fs-5 ">{{ $order_detail->customer->address ?? '' }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-0 mb-4">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <span class="fs-5 fw-bold">Nhân viên đặt :</span>
                                                        <span class="fs-5 ">{{ $order_detail->orderStaff->name ?? '' }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div>
                                                        <span class="fs-5 fw-bold">Nhóm :</span>
                                                        <span class="fs-5 ">{{ $order_detail->group->name ?? '' }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div>
                                                        <span class="fs-5 fw-bold">Tuyến :</span>
                                                        <span class="fs-5 ">{{ $order_detail->routeDirection->name ?? '' }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-0 mb-4">
                                                <div class="col-lg-6">
                                                    <div
                                                        style="display: grid; grid-template-columns: 100px auto; align-items: center">
                                                        <span class="fs-5 fw-bold">Loại thanh toán :</span>
                                                        <input class="form-control style_select bg-transparent"
                                                            id="loaiThanhToan"
                                                            placeholder="Loại thanh toán"style="padding-top: 6px"
                                                            disabled />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div
                                                        style="display: grid; grid-template-columns: 130px auto; align-items: center">
                                                        <span class="fs-5 fw-bold">Hình thức thanh toán :</span>
                                                        {{-- <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Hình thức thanh toán"> --}}
                                                        <select name="" style="padding-top: 6px"
                                                            class="selectpicker style_select bg-transparent"
                                                            placeholder="Hình thức thanh toán" id="selectHinhThucThanhToan">
                                                            <option value="Tiền mặt" selected>Tiền mặt
                                                            </option>
                                                            <option value="Chuyển khoản">Chuyển khoản
                                                            </option>
                                                        </select>
                                                        {{-- </div> --}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-0 mb-4">
                                                <div class="col-lg-12">
                                                    <div
                                                        style="display: grid; grid-template-columns: 50px auto; align-items: center">
                                                        <span class="fs-5 fw-bold">Ghi chú :</span>
                                                        <input class="form-control style_select bg-transparent"
                                                            id="ghiChu" placeholder="Ghi chú"style="padding-top: 6px"
                                                            disabled value="{{ $order_detail->description ?? '' }}"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-0 mb-4">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <span class="fs-5 fw-bold">Người duyệt :</span>
                                                        <span class="fs-5 ">Nguyễn Trãi - TBHT04</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div>
                                                        <span class="fs-5 fw-bold">Ngày duyệt :</span>
                                                        <span class="fs-5 ">22/08/2023</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5 border-bottom border-1 pb-3">
                                            <div class="mt-5">
                                                <div class="d-flex align-items-center">
                                                    <span class="text_default fs-4 fw-bold me-3">1. Sản phẩm đặt
                                                        hàng</span>
                                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Chọn kho" style="width: 120px;" class="me-3">
                                                        <select name="" class="selectpicker"
                                                            placeholder="Chọn kho" id="selectKho">
                                                            <option value="1">Kho 1
                                                            </option>
                                                            <option value="2">Kho 2
                                                            </option>
                                                        </select>
                                                    </div>
                                                    @php
                                                        $arrSPKhuyenMai = [
                                                            [
                                                                'id' => 1,
                                                                'tenSp' => 'Sản phẩm 1',
                                                                'maSp' => 'SP01',
                                                                'dvt' => 'Hộp',
                                                                'Kho xuất' => 'Kho 01',
                                                                'tonKho' => '10/100',
                                                                'ghiChu' => 'Ghi chú 1',
                                                            ],
                                                            [
                                                                'id' => 2,
                                                                'tenSp' => 'Sản phẩm 2',
                                                                'maSp' => 'SP02',
                                                                'dvt' => 'Hộp',
                                                                'Kho xuất' => 'Kho 02',
                                                                'tonKho' => '20/200',
                                                                'ghiChu' => 'Ghi chú 2',
                                                            ],
                                                            [
                                                                'id' => 3,
                                                                'tenSp' => 'Sản phẩm 3',
                                                                'maSp' => 'SP03',
                                                                'dvt' => 'Hộp',
                                                                'Kho xuất' => 'Kho 03',
                                                                'tonKho' => '30/200',
                                                                'ghiChu' => 'Ghi chú 3',
                                                            ],
                                                        ];
                                                    @endphp
                                                    <div class="dropdown">
                                                        <button class="btn btn-danger" type="button"
                                                            id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="bi bi-tag"></i>
                                                            Khuyến mại
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-center"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <div class="text-center border-bottom py-2">
                                                                <span class="text_default fs-5 fw-bold ">Chọn sản
                                                                    phẩm</span>
                                                            </div>
                                                            <div class="my-2">
                                                                <label class="dropdown-item d-flex align-items-center">
                                                                    <input type="checkbox" id="selectAllCheckbox" />
                                                                    <span class="fs-4 ms-3">
                                                                        Chọn tất cả
                                                                    </span>
                                                                </label>
                                                                @foreach ($promotion as $km)
                                                                    <label class="dropdown-item d-flex align-items-center">
                                                                        <input type="checkbox" name="{{ $km->id }}" class="nestedCheckbox" />
                                                                        <span class="fs-4 ms-3">
                                                                            {{ $km->name }}
                                                                        </span>
                                                                    </label>
                                                                @endforeach
                                                                {{-- <label class="dropdown-item d-flex align-items-center">
                                                                    <input type="checkbox" class="nestedCheckbox" />
                                                                    <span class="fs-4 ms-3">
                                                                        Sản phẩm 2
                                                                    </span>
                                                                </label>
                                                                <label class="dropdown-item d-flex align-items-center">
                                                                    <input type="checkbox" class="nestedCheckbox" />
                                                                    <span class="fs-4 ms-3">
                                                                        Sản phẩm 3
                                                                    </span>
                                                                </label> --}}
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-end align-items-center border-top py-3">
                                                                <button class="btn btn-outline-danger me-3"> Hủy</button>
                                                                <button class="btn btn-danger me-3"
                                                                    id="saveKhuyenMai">Lưu</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @php
                                                    $arrProduct = [
                                                        [
                                                            'id' => 1,
                                                            'dvt' => 'Hộp',
                                                            'maSP' => 'SP01',
                                                        ],
                                                        [
                                                            'id' => 2,
                                                            'dvt' => 'Chiếc',
                                                            'maSP' => 'SP02',
                                                        ],
                                                    ];
                                                    
                                                    $arrKho = [
                                                        [
                                                            'id' => 1,
                                                            'name' => 'Kho 1',
                                                            'tonkho' => '11/100',
                                                            'donGia' => 1000000,
                                                        ],
                                                        [
                                                            'id' => 2,
                                                            'name' => 'Kho 2',
                                                            'tonkho' => '20/100',
                                                            'donGia' => 1500000,
                                                        ],
                                                    ];
                                                    $jsonProduct = json_encode($arrProduct);
                                                    $jsonKho = json_encode($arrKho);
                                                @endphp

                                                <input type="hidden" id="jsonProduct" value="{{ $jsonProduct }}">
                                                <input type="hidden" id="jsonKho" value="{{ $jsonKho }}">

                                                <div class="mt-5">
                                                    <div class="table-responsive">

                                                        <table id="dsNhaCungCap" style="width: 150%;"
                                                            class="table table-responsive table-hover table-bordered filter">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-nowrap text-center" style="width:2%">
                                                                        STT
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:8%">
                                                                        Mã SP
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:15%">
                                                                        Tên sản phẩm
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:8%">
                                                                        ĐVT
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:8%">
                                                                        Kho xuất
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:8%">
                                                                        SL/Tồn kho
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:8%">
                                                                        Đơn giá
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:8%">
                                                                        Thành tiền
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:8%">
                                                                        Chiết khấu
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:8%">
                                                                        Tỷ lệ CK(%)
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:15%">
                                                                        Ghi chú
                                                                    </th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>

                                                            <tbody id="tableBody">
                                                                <tr>
                                                                    <td class="text-center"> <i
                                                                            class="bi bi-plus-circle text_default fs-4 fw-bold "
                                                                            id="addRowButton"></i>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-5">
                                                <div class="d-flex align-items-center">
                                                    <span class="text_default fs-4 fw-bold me-3">2. Sản phẩm khuyến
                                                        mại</span>
                                                    {{-- <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Chọn kho" style="width: 120px;">
                                                        <select name="" class="selectpicker"
                                                            placeholder="Chọn kho" id="selectKho">
                                                            <option value="1">Kho 1
                                                            </option>
                                                            <option value="2">Kho 2
                                                            </option>
                                                        </select>
                                                    </div> --}}
                                                </div>

                                                <div class="mt-5">
                                                    <div class="table-responsive">

                                                        <table
                                                            class="table table-responsive table-hover table-bordered filter">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-nowrap text-center" style="width:2%">
                                                                        STT
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:8%">
                                                                        Mã SP
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:15%">
                                                                        Tên sản phẩm
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:8%">
                                                                        ĐVT
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:8%">
                                                                        Kho xuất
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:8%">
                                                                        SL/Tồn kho
                                                                    </th>
                                                                    <th class="text-nowrap text-center" style="width:15%">
                                                                        Ghi chú
                                                                    </th>
                                                                </tr>
                                                            </thead>

                                                            <tbody id="dsKhuyenMai">
                                                                {{-- <tr>
                                                                <td class="text-center"> <i
                                                                        class="bi bi-plus-circle text_default fs-4 fw-bold "
                                                                        id="addRowButton"></i>
                                                                </td>
                                                            </tr> --}}
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="col-lg-6 mb-3">
                                                <div class="layout_grid">
                                                    <span class="fs-5 fw-bold">Tổng tiền hàng :</span>
                                                    <input class="form-control style_select bg-transparent"
                                                        id="sumTongTien" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="layout_grid">
                                                    <span class="fs-5 fw-bold">Số tiền còn lại :</span>
                                                    <input class="form-control style_select bg-transparent"
                                                        id="tienConLai" disabled placeholder="Số tiền còn lại">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="layout_grid">
                                                    <span class="fs-5 fw-bold">Tổng tiền chiết khấu :</span>
                                                    <input class="form-control style_select bg-transparent" id="sumTienCk"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="layout_grid">
                                                    <span class="fs-5 fw-bold">Hạn mức công nợ :</span>
                                                    <input class="form-control style_select bg-transparent"
                                                        id="hanMucCongNo" placeholder="Hạn mức công nợ" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="layout_grid">
                                                    <span class="fs-5 fw-bold">Tổng tiền trước thuế :</span>
                                                    <input class="form-control style_select bg-transparent"
                                                        id="sumTienTruocThue" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="layout_grid">
                                                    <span class="fs-5 fw-bold">Dư nợ hiện tại :</span>
                                                    <input class="form-control style_select bg-transparent"
                                                        id="duNoHienTai" placeholder="Dư nợ hiện tại" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="layout_grid">
                                                    <span class="fs-5 fw-bold">Tổng tiền thuế (8%) :</span>
                                                    <input class="form-control style_select bg-transparent"
                                                        id="sumTienThue" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="layout_grid">
                                                    <span class="fs-5 fw-bold">Hạn thanh toán :</span>
                                                    <input type="date" class="form-control style_select bg-transparent"
                                                        id="hanThanhToan" placeholder="Hạn thanh toán" value="0">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="layout_grid">
                                                    <span class="fs-5 fw-bold text_default">Phải thanh toán :</span>
                                                    <input class="form-control style_select bg-transparent"
                                                        id="sumThanhToan" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="layout_grid">
                                                    <span class="fs-5 fw-bold text-success">Thanh toán trước :</span>
                                                    <input class="form-control style_select bg-transparent"
                                                        id="thanhToanTruoc"
                                                        placeholder="Vui lòng nhập số tiền thanh toán trước" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="layout_grid">
                                                    <span class="fs-5 fw-bold text-success">Số tiền bằng chữ :</span>
                                                    <input class="form-control style_select bg-transparent"
                                                        id="tienBangChu" placeholder="Vui lòng nhập số tiền bằng chữ" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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

    <script>
        const tableBody = document.getElementById("tableBody");
        const addRowButton = document.getElementById("addRowButton");

        var inputJsonProduct = document.getElementById('jsonProduct');
        var inputJsonKho = document.getElementById('jsonKho');
        var jsonProduct = JSON.parse(inputJsonProduct.value);
        var jsonKho = JSON.parse(inputJsonKho.value);

        let countId = 0;
        let countRow = 1;

        const rows = [];

        document.addEventListener("DOMContentLoaded", function() {
            const newRow = createRow(countId, countRow);
            tableBody.insertBefore(newRow, addRowButton.parentNode.parentNode);
            $('.selectpicker').selectpicker();
            const deleteIcons = newRow.querySelectorAll("#remove-item");
            deleteIcons.forEach(deleteIcon => {
                deleteIcon.addEventListener("click", function() {
                    newRow.remove();
                });
            });
            rows.push(newRow);
            handleNewRow(0);
            updateTotal();
            countId++;
            countRow++;
        });

        function createRow(countId, countRow) {
            const trNew = document.createElement("tr");
            trNew.innerHTML = `
            <td class="text-center text-nowrap" id="stt">
                                                                ${countRow}
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="text" disabled id="maSP_${countId}" name=""
                                                                    placeholder="Mã sản phẩm">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <select name="" class="style_select selectpicker"
                                                                    id="selectNameProduct_${countId}" placeholder="Tên sản phẩm">
                                                                    <option value="1">Sản phẩm 01
                                                                    </option>
                                                                    <option value="2">Sản phẩm 02
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="text" disabled id="DVT_${countId}" name=""
                                                                    placeholder="Đơn vị tính">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="text" disabled id="nameKho_${countId}" name=""
                                                                    placeholder="Kho xuất">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="text" disabled id="sltk_${countId}" name=""
                                                                    placeholder="Tồn kho">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="text" disabled id="donGia_${countId}" name=""
                                                                    placeholder="Đơn giá">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="number" disabled id="thanhTien_${countId}"
                                                                    name="" placeholder="Thành tiền">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="number" id="ck_${countId}" name=""
                                                                    placeholder="Chiết khấu">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="number" id="tyLeCK_${countId}" name=""
                                                                    placeholder="Tỷ lệ CK">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="text" id="ghiChu_${countId}" name=""
                                                                    placeholder="Ghi chú">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <i class="bi bi-trash fs-4 fw-bold text_default"
                                                                    id="remove-item"></i>
                                                            </td>
         `;

            return trNew;
        }

        addRowButton.addEventListener("click", function() {
            const newRow = createRow(countId, countRow);

            tableBody.insertBefore(newRow, addRowButton.parentNode.parentNode);
            $('.selectpicker').selectpicker();

            const deleteIcons = newRow.querySelectorAll("#remove-item");
            deleteIcons.forEach(deleteIcon => {
                deleteIcon.addEventListener("click", function() {
                    const rowIndex = rows.indexOf(newRow);
                    if (rowIndex !== -1) {
                        rows.splice(rowIndex, 1);
                    }
                    newRow.remove();
                    updateTotal();
                });
            });

            rows.push(newRow);
            handleNewRow(countId);
            updateTotal();
            countId++;
            countRow++;
        });

        function handleProductSelection(countId) {
            const selectNameProduct = document.getElementById(`selectNameProduct_${countId}`);
            const maSPInput = document.getElementById(`maSP_${countId}`);
            const DVTInput = document.getElementById(`DVT_${countId}`);

            selectNameProduct.addEventListener("change", function() {
                const selectedValue = selectNameProduct.value;
                const selectedItem = jsonProduct.find(item => item.id.toString() === selectedValue);

                if (selectedItem) {
                    maSPInput.value = selectedItem.maSP;
                    DVTInput.value = selectedItem.dvt;
                } else {
                    maSPInput.value = "";
                    DVTInput.value = "";
                }
            });
        }

        function handleKhoSelection(countId) {
            const selectKho = document.getElementById("selectKho");
            const nameKho = document.getElementById(`nameKho_${countId}`);
            const sltkInput = document.getElementById(`sltk_${countId}`);
            const donGiaInput = document.getElementById(`donGia_${countId}`);
            const thanhTienInput = document.getElementById(`thanhTien_${countId}`);
            const tyLeCkInput = document.getElementById(`tyLeCK_${countId}`);

            selectKho.addEventListener("change", function() {
                const selectedValue = selectKho.value;
                const selectedItem = jsonKho.find(item => item.id.toString() === selectedValue);
                if (selectedItem) {
                    nameKho.value = selectedItem.name;
                    sltkInput.value = selectedItem.tonkho;
                    donGiaInput.value = selectedItem.donGia;

                    const indexOfSlash = selectedItem.tonkho.indexOf("/");
                    const numberBeforeSlash = Number(selectedItem.tonkho.slice(0, indexOfSlash));

                    thanhTienInput.value = selectedItem.donGia * numberBeforeSlash;
                    updateTotal();
                } else {
                    nameKho.value = "";
                    sltkInput.value = "";
                    donGiaInput.value = "";
                    thanhTienInput.value = "";
                }
            });
        }

        function handleNewRow(countId) {
            handleProductSelection(countId);
            handleKhoSelection(countId);

            const thanhTienInput = document.getElementById(`thanhTien_${countId}`);
            const tyLeCkInput = document.getElementById(`tyLeCK_${countId}`);
            const ckInput = document.getElementById(`ck_${countId}`);

            thanhTienInput.addEventListener("input", function() {
                calculateDiscount(countId);
                updateTotal();
            });

            tyLeCkInput.addEventListener("input", function() {
                calculateDiscount(countId);
                updateTotal();
            });

            function calculateDiscount(countId) {
                const thanhTienValue = parseFloat(thanhTienInput.value);
                const tyLeCkValue = parseFloat(tyLeCkInput.value);

                if (!isNaN(thanhTienValue) && !isNaN(tyLeCkValue)) {
                    const discount = (thanhTienValue * tyLeCkValue) / 100;
                    ckInput.value = discount;
                }
            }


        }

        function calculateTotal() {
            let total = 0;
            let totalCk = 0;
            rows.forEach(row => {
                const thanhTienInput = row.querySelector("input[id^='thanhTien_']");
                const ckInput = row.querySelector("input[id^='ck_']");
                const thanhTienValue = parseFloat(thanhTienInput.value);
                const ckValue = parseFloat(ckInput.value);

                if (!isNaN(thanhTienValue)) {
                    total += thanhTienValue;
                }

                if (!isNaN(ckValue)) {
                    totalCk += ckValue;
                }
            });


            return total;
        }

        function calculateTotalCk() {
            let totalCk = 0;
            rows.forEach(row => {
                const ckInput = row.querySelector("input[id^='ck_']");
                const ckValue = parseFloat(ckInput.value);

                if (!isNaN(ckValue)) {
                    totalCk += ckValue;
                }
            });

            return totalCk;
        }

        function updateTotal() {
            const total = calculateTotal();
            const totalCk = calculateTotalCk();

            const totalDisplay = document.getElementById("sumTongTien");
            const totalCkDisplay = document.getElementById("sumTienCk");
            totalDisplay.value = total;
            totalCkDisplay.value = totalCk;

            const totalTienHang = parseFloat(totalDisplay.value) || 0;
            const totalCKValue = parseFloat(totalCkDisplay.value) || 0;

            const totalTruocThueInput = document.getElementById("sumTienTruocThue");
            if (!isNaN(totalTienHang) && !isNaN(totalCKValue)) {
                totalTruocThueInput.value = totalTienHang - totalCKValue;
            } else {
                totalTruocThueInput.value = "";
            }

            const totalTruocThue = parseFloat(totalTruocThueInput.value) || 0;
            const tienThueInput = document.getElementById("sumTienThue");
            tienThueInput.value = totalTruocThue * 0.08;

            const tienThue = parseFloat(tienThueInput.value) || 0;
            const totalThanhToanInput = document.getElementById("sumThanhToan");
            totalThanhToanInput.value = totalTruocThue + tienThue;

            const tienThanhToanTruocInput = document.getElementById("thanhToanTruoc");


            tienThanhToanTruocInput.addEventListener('input', function() {
                const tienConLaiInput = document.getElementById("tienConLai");
                const tienThanhToanTruoc = parseFloat(tienThanhToanTruocInput.value);
                const tienConLai = totalThanhToanInput.value - tienThanhToanTruoc;
                tienConLaiInput.value = tienConLai >= 0 ? tienConLai : tienConLaiInput.value = 0;
            })

        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectAllCheckbox = document.getElementById("selectAllCheckbox");
            const nestedCheckboxes = document.querySelectorAll(".nestedCheckbox");

            selectAllCheckbox.addEventListener("change", function() {
                const isChecked = selectAllCheckbox.checked;
                nestedCheckboxes.forEach(checkbox => {
                    checkbox.checked = isChecked;
                });
            });

            nestedCheckboxes.forEach(checkbox => {
                checkbox.addEventListener("change", function() {
                    const areAllChecked = Array.from(nestedCheckboxes).every(checkbox => checkbox
                        .checked);
                    selectAllCheckbox.checked = areAllChecked;
                });
            });
        });

        var products = @json($arrSPKhuyenMai);
        var selectedProducts = [];

        function onSaveButtonClick() {
            var selectAllCheckbox = document.getElementById('selectAllCheckbox');

            if (selectAllCheckbox.checked) {
                selectedProducts = products.slice();
            } else {
                var nestedCheckboxes = document.querySelectorAll('.nestedCheckbox');
                nestedCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        var productValue = checkbox.parentNode.textContent
                            .trim();
                        var product = products.find(function(item) {
                            return item.tenSp === productValue;
                        });

                        if (product && !selectedProducts.includes(product)) {
                            selectedProducts.push(product);
                        }
                    }
                });
            }


            var tableBody = document.getElementById('dsKhuyenMai');
            selectedProducts.forEach(function(product, index) {
                var newRow = document.createElement('tr');
                newRow.innerHTML = `
                <td class="text-center">${index + 1}</td>
                <td class="text-center">${product.maSp}</td>
                <td class="text-center">${product.tenSp}</td>
                <td class="text-center">${product.dvt}</td>
                <td class="text-center">${product['Kho xuất']}</td>
                <td class="text-center">${product.tonKho}</td>
                <td class="text-center">${product.ghiChu}</td>
            `;
                tableBody.appendChild(newRow);
            });
        }

        var saveButton = document.querySelector('#saveKhuyenMai');
        saveButton.addEventListener('click', onSaveButtonClick);
    </script>

    <script>
        const editButton = document.getElementById('editButton');

        const loaiThanhToanInput = document.getElementById('loaiThanhToan');
        const ghiChuInput = document.getElementById('ghiChu');
        const tongTienHangInput = document.getElementById('sumTongTien');
        const tongTienCKInput = document.getElementById('sumTienCk');
        const tongTienTruocThueInput = document.getElementById('sumTienTruocThue');
        const tongTienThueInput = document.getElementById('sumTienThue');
        const tongTienThanhToanInput = document.getElementById('sumThanhToan');
        const tienConLaiInput = document.getElementById('tienConLai');
        const hanMucCongNoInput = document.getElementById('hanMucCongNo');
        const duNoHienTaiInput = document.getElementById('duNoHienTai');

        editButton.addEventListener('click', function() {
            loaiThanhToanInput.disabled = false;
            ghiChuInput.disabled = false;
            tongTienHangInput.disabled = false;
            tongTienCKInput.disabled = false;
            tongTienTruocThueInput.disabled = false;
            tongTienThueInput.disabled = false;
            tongTienThanhToanInput.disabled = false;
            tienConLaiInput.disabled = false;
            hanMucCongNoInput.disabled = false;
            duNoHienTaiInput.disabled = false;
        });
    </script>
@endsection
