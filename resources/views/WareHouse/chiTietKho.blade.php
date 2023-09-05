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

    .img-qr {
        width: 100%;
        max-height: 50px;
        object-fit: cover;
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
                                    <div class="border-bottom pb-4 position-relative">
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <div class="row g-0">
                                                    <div class="col-lg-3">
                                                        <span class="fs-5 fw-bold">Tên kho :</span>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <span class="fs-5">{{ $wareHouse->name }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="row g-0">
                                                    <div class="col-lg-3">
                                                        <span class="fs-5 fw-bold">Mô tả :</span>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <span class="fs-5">{{ $wareHouse->description }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="row g-0">
                                                    <div class="col-lg-3">
                                                        <span class="fs-5 fw-bold">Phân loại :</span>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        @switch($wareHouse->classify)
                                                            @case(0)
                                                                <span class="fs-5">Kho công ty</span>
                                                            @break

                                                            @case(1)
                                                                <span class="fs-5">Kho nhà phân phối</span>
                                                            @break

                                                            @case(2)
                                                                <span class="fs-5">Kho bán lẻ</span>
                                                            @break

                                                            @default
                                                                <span></span>
                                                            @break
                                                        @endswitch
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="row g-0">
                                                    <div class="col-lg-3">
                                                        <span class="fs-5 fw-bold">Địa chỉ :</span>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <span class="fs-5">{{ $wareHouse->address }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="row g-0">
                                                    <div class="col-lg-4">
                                                        <span class="fs-5 fw-bold">Người quản lý :</span>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <span class="fs-5">
                                                            @foreach ($listUsers as $user)
                                                                @if ($wareHouse->manage == $user->id)
                                                                    {{ $user->name ?? '' }}
                                                                @endif
                                                            @endforeach
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="row g-0">
                                                    <div class="col-lg-5">
                                                        <span class="fs-5 fw-bold">Kế toán phụ trách :</span>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <span class="fs-5">
                                                            @foreach ($listUsers as $user)
                                                                @if ($wareHouse->accountant == $user->id)
                                                                    {{ $user->name ?? '' }}
                                                                @endif
                                                            @endforeach
                                                        </span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-absolute" style="top: 0; right: 0;">
                                            <img src="{{ asset('assets/img/Qr-code.png') }}" alt="Qr-code"
                                                class="img-qr" />
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
                                            <button class="btn btn-danger btn-lg" style="padding: 7px 15px;">
                                                <i class="bi bi-printer "></i>
                                            </button>
                                        </div>

                                        <div class="action_export mx-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Xuất file Excel">
                                            <a class="btn btn-danger btn-lg btn-export" target="_blank"
                                                href="/warehouses/export/all" style="padding: 7px 15px;"
                                                id="export-warehouses-btn">
                                                <i class="bi bi-download "></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="table-responsive mt-3">
                                        <table id="dsDaoTao"
                                            class="table table-responsive table-hover table-bordered filter">
                                            <thead>
                                                <tr>
                                                    <th class="text-nowrap text-center" style="width: 3%">STT
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width: 5%">Mã
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width: 15%">Tên
                                                        sản phẩm
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width: 5%">Số lô
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width: 10%">HSD
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width: 5%">Số lượng
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width: 5%">ĐVT chẵn
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width: 5%">ĐVT lẻ
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width: 8%">Phân loại
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width: 8%">Ngày nhập kho
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width: 10%">Ghi chú
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-nowrap ">1</td>
                                                    <td class="text-nowrap ">123456</td>
                                                    <td class="text-nowrap ">Vitamin tổng hợp</td>
                                                    <td class="text-nowrap ">1</td>
                                                    <td class="text-nowrap ">28/08/2026</td>
                                                    <td class="text-nowrap ">10</td>
                                                    <td class="text-nowrap ">Hộp</td>
                                                    <td class="text-nowrap ">Hộp</td>
                                                    <td class="text-nowrap ">Sản phẩm</td>
                                                    <td class="text-nowrap ">16/07/2023</td>
                                                    <td class="text-nowrap "></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-nowrap ">2</td>
                                                    <td class="text-nowrap ">123457</td>
                                                    <td class="text-nowrap ">Bảng quảng cáo</td>
                                                    <td class="text-nowrap ">1</td>
                                                    <td class="text-nowrap ">29/08/2026</td>
                                                    <td class="text-nowrap ">11</td>
                                                    <td class="text-nowrap ">Cái</td>
                                                    <td class="text-nowrap ">Cái</td>
                                                    <td class="text-nowrap ">Vật tư MKT</td>
                                                    <td class="text-nowrap "></td>
                                                    <td class="text-nowrap "></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-nowrap ">3</td>
                                                    <td class="text-nowrap ">123458</td>
                                                    <td class="text-nowrap ">Collage</td>
                                                    <td class="text-nowrap ">1</td>
                                                    <td class="text-nowrap ">30/08/2026</td>
                                                    <td class="text-nowrap ">12</td>
                                                    <td class="text-nowrap ">Thùng</td>
                                                    <td class="text-nowrap ">Chai</td>
                                                    <td class="text-nowrap ">Sản phẩm</td>
                                                    <td class="text-nowrap "></td>
                                                    <td class="text-nowrap "></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-nowrap ">4</td>
                                                    <td class="text-nowrap ">123459</td>
                                                    <td class="text-nowrap ">Vitamin E</td>
                                                    <td class="text-nowrap ">1</td>
                                                    <td class="text-nowrap ">31/08/2026</td>
                                                    <td class="text-nowrap ">13</td>
                                                    <td class="text-nowrap ">Hộp</td>
                                                    <td class="text-nowrap ">Hộp</td>
                                                    <td class="text-nowrap ">Sản phẩm</td>
                                                    <td class="text-nowrap ">16/07/2023</td>
                                                    <td class="text-nowrap "></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {{-- <nav aria-label="Page navigation example" class="float-end mt-3"
                                            id="target-pagination">
                                            <ul class="pagination">
                                                {{ $departmentList->appends([
                                                        'search' => $search,
                                                    ])->links() }}
                                            </ul>
                                        </nav> --}}
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
