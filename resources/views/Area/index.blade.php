@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('template.sidebar.sidebarArea.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Danh sách địa bàn</h5>
                        @include('template.components.sectionCard')
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class='row'>
                                        <div class="col-md-12">
                                            <div class="action_wrapper d-flex justify-content-end mb-3">
                                                <div class="order-2 order-md-1" style="font-size: 15px;">
                                                    <b>Danh sách đơn vị trực thuộc</b>
                                                </div>
                                                <div
                                                    class="order-1 order-md-2  justify-content-between align-items-center flex-grow-1 mb-2 mb-md-0">
                                                    <form method="GET" action="">
                                                        <div class="form-group has-search">
                                                            {{-- <span type="submit"
                                                                class="bi bi-search  fs-5" style="float: left;;"></span> --}}
                                                            <input type="text" style="width: 150px; float: right;"
                                                                class="form-control" value="{{ $search }}"
                                                                placeholder="Tìm kiếm" name="search">
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="action_export mx-3 order-md-3" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Lọc">
                                                    <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                        data-bs-target="#filterOptions">
                                                        <i class="bi bi-funnel"></i>
                                                    </button>
                                                </div>

                                                <div class="action_export order-md-4">
                                                    <button class="btn btn-danger d-block testCreateUser"
                                                        data-bs-toggle="modal" data-bs-target="#taoDeXuat">Thêm đơn
                                                        vị</button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="dsDaoTao"
                                                    class="table table-responsive table-hover table-bordered filter">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-nowrap text-center" style="width:2%">STT</th>
                                                            <th class="text-nowrap" style="width:10%">Mã đơn vị</th>
                                                            <th class="text-nowrap" style="width:10%">Đơn vị </th>
                                                            <th class="text-nowrap" style="width:10%">Đơn vị mẹ </th>
                                                            <th class="text-nowrap" style="width:10%">Trưởng đơn vị </th>
                                                            <th class="text-nowrap" style="width:20%">Chức năng nhiệ vụ</th>
                                                            <th class="text-nowrap" style="width:3%"><span></span></th>
                                                        </tr>
                                                    </thead>
                                                    <?php $i = 1; ?>
                                                    @foreach ($areaList as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td class=" text-center">
                                                                    {{ $i++ }}
                                                                </td>
                                                                <td class="">
                                                                    {{ $item->code }}
                                                                </td>
                                                                <td class="">
                                                                    {{ $item->name }}
                                                                </td>
                                                                <td>
                                                                    @if ($item->donvime)
                                                                        {{ $item->donvime->name }}
                                                                    @else
                                                                    @endif
                                                                </td>
                                                                <td class="">
                                                                    {{ $item->leader_name }}
                                                                </td>
                                                                <td class="">
                                                                    {{ $item->description }}
                                                                </td>
                                                                <td>
                                                                    <div class="table_actions d-flex justify-content-end">
                                                                        {{-- <div class="btn" data-bs-toggle="modal"
                                                                            data-bs-target="#qrCode">
                                                                            <i class="bi bi-share-fill"
                                                                                style="color: #787878;"></i>
                                                                        </div> --}}
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Sửa đề xuất">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#suaDeXuat">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/edit.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Xóa đề xuất">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#xoaDeXuat">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/trash.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
                                                </table>
                                                {{ $areaList->appends([
                                                        'search' => $search,
                                                    ])->links() }}
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
    {{-- @include('template.sidebar.sidebarDeXuatTheoMau.sidebarRight') --}}

    {{-- QR CODE --}}
    <div class="modal fade" id="qrCode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center w-100">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">QR CODE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="qrCode_wrapper">
                                {!! QrCode::generate('QRCODE') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sửa đề xuất --}}
    <div class="modal fade" id="suaDeXuat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Sửa đề xuất</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="#">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input data-bs-toggle="tooltip" data-bs-placement="top" title="Tiêu đề" name="title"
                                    type="text" placeholder="Tiêu đề" class="form-control" value="title">
                            </div>
                            <div class="col-6 mb-3">
                                <input data-bs-toggle="tooltip" data-bs-placement="top" title="Tóm tắt"
                                    name="description" type="text" placeholder="Tóm tắt" class="form-control"
                                    value="description">
                            </div>

                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Người phê duyệt">
                                    <select name="receiver_id" class="selectpicker" data-dropup-auto="false"
                                        title="Chọn người phê duyệt" data-size="5" data-live-search="true">
                                        <option value="1">name - code</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Người liên quan">
                                    <select name="related_people[]" class="selectpicker" data-dropup-auto="false"
                                        title="Chọn người liên quan" data-size="5" data-live-search="true" multiple
                                        data-selected-text-format="count > 1"
                                        data-count-selected-text="Có {0} người liên quan" data-actions-box="true"
                                        data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn">
                                        <option value="1">name - code</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Mẫu đề xuất">
                                    <select name="form" class="selectpicker" data-dropup-auto="false"
                                        title="Chọn mẫu đề xuất" data-size="5">
                                        <option value="1">Yêu
                                            cầu mua sắm</option>
                                        <option value="2">Đề
                                            nghị thanh toán</option>
                                        <option value="3">Đề
                                            nghị tạm ứng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card_template-title">Mã VB: ...</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Xóa đề xuất --}}
    <div class="modal fade" id="xoaDeXuat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có thực sự muốn xoá đề xuất này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                    <form action="#" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm Tao De Xuat -->
    <div class="modal fade" id="taoDeXuat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('area.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input name="name" required type="text" placeholder="Name" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Name">
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Mẫu đề xuất">
                                    <select name="ib_lead" required class="selectpicker" data-dropup-auto="false">
                                        <option value="">chọn trưởng bộ phận</option>
                                        @foreach ($UnitLeaderList as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->leader_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Mã">
                                    <input name="code" required type="text" placeholder="Mã đơn vị"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="code">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Mẫu đề xuất">
                                    <select name="parent" required class="selectpicker" data-dropup-auto="false">
                                        <option value="0">chọn đơn vị mẹ</option>
                                        @foreach ($areaLists as $item)
                                            <option value="{{ $item->id }}">
                                                @php
                                                    $str = '';
                                                    for ($i = 0; $i < $item->level; $i++) {
                                                        echo $str;
                                                        $str = '  --';
                                                    }
                                                @endphp
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Mẫu đề xuất">
                                    <input name="description" required type="text" placeholder="Chức năng nhiệm vụ"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="description" style="width: 450px;height: 80px;">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger"
                                    data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-danger">Tạo</button>
                            </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Filter --}}
    <div class="modal fade" id="filterOptions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Lọc dữ liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="#" method="GET">
                    @foreach (request()->query() as $key => $value)
                        @if (!in_array($key, ['department', 'status', 'form', 'page', 'sender_id', 'receiver_id', 'startDate']))
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo trạng thái">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo trạng thái" name='status'>
                                        <option value="">Tất cả</option>
                                        <option value="1">ok
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo phòng ban">
                                    <select class="selectpicker select_filter" data-dropup-auto="false"
                                        title="Lọc theo phòng ban" name="department" data-size="5"
                                        data-live-search="true">
                                        <option value="">Tất cả</option>
                                        <option value="1">Name
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo người phê duyệt">
                                    <select class="selectpicker select_filter" data-dropup-auto="false"
                                        title="Lọc theo người phê duyệt" name='receiver_id' data-size="5"
                                        data-live-search="true">
                                        <option value="">Tất cả</option>
                                        <option value="1">Name</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo người tạo">
                                    <select class="selectpicker select_filter" data-dropup-auto="false"
                                        title="Lọc theo người tạo" name='sender_id' data-size="5"
                                        data-live-search="true">
                                        <option value="">Tất cả</option>
                                        <option value="1">Name</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mb-3 position-relative">
                                <input type="text" name="startDate" class="form-control locDuLieuPick"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Thời gian"
                                    name="" placeholder="Chọn thời gian" value="{{ request()->startDate }}" />
                                <i class="bi bi-calendar-plus style_pickdate"></i>
                            </div>

                            <div class="col-12">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo mẫu form">
                                    <select class="selectpicker select_filter" data-dropup-auto="false"
                                        title="Lọc theo mẫu form" name='form' data-size="5">
                                        <option value="">Tất cả</option>
                                        <option value="1">ok
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger">Làm
                            mới</button>
                        <button type="submit" class="btn btn-danger">Lọc</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('footer-script')
    <!-- Plugins -->
    {{-- <script type="text/javascript" src="{{ asset('assets/plugins/jquery-repeater/repeater.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-repeater/custom-repeater.js') }}"></script> --}}
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

    <script>
        $(".locDuLieuPick").datepicker({
            format: "mm-yyyy",
            orientation: 'top',
            autoclose: true,
            switchOnClick: true,
            startView: "months",
            minViewMode: "months",
            locale: 'vi',
        });
    </script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/resetFilter.js') }}"></script>

@endsection
