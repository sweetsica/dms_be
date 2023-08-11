@extends('template.master')
@section('title', 'Danh sách khách hàng')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>

@endsection
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container">
                    <div class="mainSection_heading">

                        <h5 class="mainSection_heading-title">Chi tiết tuyến</h5>
                        @include('template.components.sectionCard')
                    </div>
                    <div class="card mb-3">
                        <div class="card-body card-warpper">
                            <div>
                                <div class="container">
                                    <div class="mb-3">
                                        <h2 class="text-color_pimary mb-3">Thông tin về tuyến
                                        </h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4 layout_120">
                                                    <span class="fw-bold text-content">Tên tuyến:</span>
                                                    <input class="input-contact"
                                                        value="CÔNG TY TNHH KINH DOANH VÀ XÂY DỰNG BM" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4 layout_120">
                                                    <span class="fw-bold text-content">Nhân sự phụ trách:</span>
                                                    <input class="input-contact" value="123456789" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4 layout_120">
                                                    <span class="fw-bold text-content">Mã tuyến:</span>
                                                    <input class="input-contact" value="10101010001" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4 layout_120">
                                                    <span class="fw-bold text-content">Thời gian di tuyến:</span>
                                                    <input class="input-contact" value="congtya@gmail.com" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4 layout_120">
                                                    <span class="fw-bold text-content">Địa bàn:</span>
                                                    <input class="input-contact" value="Nguyễn Văn A" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4 layout_120">
                                                    <span class="fw-bold text-content">Ghi chú:</span>
                                                    <input class="input-contact" value="Chủ tịch" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div id="map" class="border" style="height: 300px; display: block">
                                            Map
                                        </div>
                                    </div>

                                    <div>
                                        <div class="table-responsive mt-2"style="height: auto;">
                                            <table id="dsbbdanhgia" class="table table-hover table-bordered" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-nowrap text-center" style="width:2%">STT</th>
                                                        <th class="text-nowrap text-center" style="width:20%">Tên khách
                                                            hàng
                                                        </th>
                                                        <th class="text-nowrap text-center" style="width:8%">Số điện thoại
                                                        </th>
                                                        <th class="text-nowrap text-center" style="width:12%">Email</th>
                                                        <th class="text-nowrap text-center" style="width:12%">Nhân sự phụ
                                                            trách</th>
                                                        <th class="text-nowrap text-center" style="width:8%">Nhóm</th>
                                                        <th class="text-nowrap text-center" style="width:8%">Kênh</th>
                                                        {{-- <th class="text-nowrap text-center" style="width:3%"></th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @forelse ($customers as $key => $cus)
                                                        <tr role="button">
                                                            <td class="text-nowrap text-center">
                                                                <div class="text-nowrap d-block text-truncate"
                                                                    style="">
                                                                    {{ $key + 1 }}
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="text-nowrap d-block text-truncate"
                                                                    style="max-width:350px;" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="{{ $cus->name ?? '' }}">
                                                                    {{ $cus->name ?? '' }}
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="text-nowrap  d-block text-truncate"
                                                                    style="max-width:565px;" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="{{ $cus->phone ?? '' }}">
                                                                    {{ $cus->phone ?? '' }}
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="text-nowrap  d-block text-truncate"
                                                                    style="max-width:565px;" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="{{ $cus->email ?? '' }}">
                                                                    {{ $cus->email ?? '' }}
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="text-nowrap d-block text-truncate"
                                                                    style="max-width:565px;" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="{{ $cus->person->name ?? '' }} - {{ $cus->person->code ?? '' }}">
                                                                    {{ $cus->person->name ?? '' }} -
                                                                    {{ $cus->person->code ?? '' }}
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="text-nowrap text-center d-block text-truncate"
                                                                    style="max-width:565px;" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="Nhóm {{ $cus->groupId ?? '' }}">
                                                                    Nhóm {{ $cus->groupId ?? '' }}
                                                                </div>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="text-nowrap text-center d-block text-truncate"
                                                                    style="max-width:565px;" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="{{ $cus->channel->name ?? '' }}">
                                                                    {{ $cus->channel->name ?? '' }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr role="button">
                                                            <td colspan="7" class="text-center">
                                                                Chưa có khách hàng nào thuộc tuyến này
                                                            </td>
                                                        </tr>
                                                    @endforelse --}}
                                                </tbody>
                                            </table>
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

    <style>
        .warpper-search {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .input-item {
            width: 200px !important;
        }

        .card-body {
            padding: 50px !important;
        }

        .text-color_pimary {
            color: var(--primary-color)
        }

        .text-content {
            font-size: 14px
        }

        .layout_120 {
            display: grid;
            grid-template-columns: 120px auto;
        }

        .layout_90 {
            display: grid;
            grid-template-columns: 90px auto;
        }

        .layout_45 {
            display: grid;
            grid-template-columns: 45px auto;
        }

        .layout_auto {
            display: grid;
            grid-template-columns: auto auto;
        }

        .input-contact {
            border-top: none !important;
            border-left: none !important;
            border-right: none !important;
            border-bottom: 1px solid #969393 !important;
            line-height: 15px;
            width: 100%;
            font-size: 12px;
        }

        .input-contact:focus {
            outline: none !important;
            border-top: none !important;
            border-left: none !important;
            border-right: none !important;
            border-bottom: 1px solid #969393 !important;
            box-shadow: none !important;
        }
    </style>
@section('footer-script')

    <!-- Plugins -->
    <script src="{{ asset('assets/plugins/jquery-datetimepicker/custom-datetimepicker.js') }}"></script>

    <script type="text/javascript" charset="utf-8"
        src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-repeater/repeater.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-repeater/custom-repeater.js') }}"></script>
    <!-- Chart Js -->
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-stacked100@1.0.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-datalabels@2.0.0.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangActive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangMoi.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_soDonHang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_doanhSo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_nhanSu.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>


    <script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>


    <script type="text/javascript" src="{{ asset('/assets/js/components/resetFilter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/components/dataHrefTable.js') }}"></script>


@endsection
