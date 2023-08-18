@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Đề xuất theo mẫu')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Danh sách đề xuất</h5>
                        @include('template.components.sectionCard')
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class='row'>
                                        <div class="col-md-12">
                                            <div class="action_wrapper d-flex justify-content-end mb-3">

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <form method="GET" action="{{ route('proposal.list') }}">
                                                        @foreach (request()->query() as $key => $value)
                                                            @if ($key != 'q' && $key != 'page')
                                                                <input type="hidden" name="{{ $key }}"
                                                                    value="{{ $value }}">
                                                            @endif
                                                        @endforeach
                                                        <div class="form-group has-search">
                                                            <span type="submit"
                                                                class="bi bi-search form-control-feedback fs-5"></span>
                                                            <input type="text" class="form-control"
                                                                placeholder="Tìm kiếm" value="{{ request()->get('q') }}"
                                                                name="q">
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="action_export mx-3" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Lọc">
                                                    <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                        data-bs-target="#filterOptions">
                                                        <i class="bi bi-funnel"></i>
                                                    </button>
                                                </div>

                                                <div class="action_export">
                                                    <button class="btn btn-danger d-block testCreateUser"
                                                        data-bs-toggle="modal" data-bs-target="#taoDeXuat">Thêm đề
                                                        xuất</button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="dsDaoTao"
                                                    class="table table-responsive table-hover table-bordered filter">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-nowrap text-center" style="width:2%">STT</th>
                                                            <th class="text-nowrap" style="width:10%">Mã văn bản</th>
                                                            <th class="text-nowrap" style="width:20%">Tiêu đề</th>
                                                            {{-- <th class="text-nowrap" style="width:20%">Tóm tắt</th> --}}
                                                            <th class="text-nowrap" style="width:15%">Phòng ban</th>
                                                            <th class="text-nowrap" style="width:15%">Người tạo</th>
                                                            <th class="text-nowrap" style="width:12%">Người phê duyệt</th>
                                                            <th class="text-nowrap" style="width:7%">Ngày gửi</th>
                                                            <th class="text-nowrap" style="width:8%">Loại mẫu</th>
                                                            <th class="text-nowrap" style="width:8%">Trạng thái</th>
                                                            <th class="text-nowrap" style="width:3%"><span></span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="table-row" data-href="/de-xuat-theo-mau/1"
                                                            role="button">
                                                            <td class=" text-center">
                                                                <div class="overText">
                                                                    1
                                                                </div>
                                                            </td>
                                                            <td class="">
                                                                <div class="overText" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Code">
                                                                    Code
                                                                </div>
                                                            </td>
                                                            <td class="">
                                                                <div class="overText" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Title">
                                                                    Title
                                                                </div>
                                                            </td>
                                                            <td class="">
                                                                <div class="overText" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="">
                                                                    Phòng ban
                                                                </div>
                                                            </td>
                                                            <td class="">
                                                                <div class="overText" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Người gửi - code">
                                                                    Người gửi - code
                                                                </div>
                                                            </td>
                                                            <td class="">
                                                                <div class="overText" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Người nhận - code">
                                                                    Người nhận - code
                                                                </div>
                                                            </td>
                                                            <td class="">
                                                                <div class="overText" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="">
                                                                    01/01/2001
                                                                </div>
                                                            </td>

                                                            <td class="">
                                                                <div class="overText" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="...">
                                                                    ...
                                                                </div>
                                                            </td>
                                                            <td class="text-center" style="padding: 0 10px">
                                                                <div class="overText" style=""
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="">
                                                                    status
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="table_actions d-flex justify-content-end">
                                                                    {{-- <div class="btn" data-bs-toggle="modal"
                                                                        data-bs-target="#qrCode">
                                                                        <i class="bi bi-share-fill"
                                                                            style="color: #787878;"></i>
                                                                    </div> --}}
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Sửa đề xuất">
                                                                        <div class="btn" data-bs-toggle="modal"
                                                                            data-bs-target="#suaDeXuat">
                                                                            <img style="width:16px;height:16px"
                                                                                src="{{ asset('assets/img/edit.svg') }}" />
                                                                        </div>
                                                                    </div>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Xóa đề xuất">
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
                                                </table>
                                            </div>
                                            {{-- <nav aria-label="Page navigation example" class="float-end mt-3"
                                                id="target-pagination">
                                                <ul class="pagination">
                                                    @foreach ($proposals->links as $link)
                                                        <li class="page-item {{ $link->active ? 'active' : '' }}">
                                                            <a class="page-link"
                                                                href="{{ getPaginationLink($link, 'page') }}"
                                                                aria-label="Previous">
                                                                <span aria-hidden="true">{!! $link->label !!}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </nav> --}}
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
    @include('template.sidebar.sidebarDeXuatTheoMau.sidebarRight')

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
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa đề xuất</h5>
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
                    <h5 class="modal-title w-100" id="exampleModalLabel">Chọn mẫu đề xuất</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="#">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input name="title" required type="text" placeholder="Tiêu đề" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Tiêu đề">
                            </div>
                            <div class="col-6 mb-3">
                                <input name="description" type="text" placeholder="Tóm tắt" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Tóm tắt">
                            </div>

                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Người phê duyệt">
                                    <select name="receiver_id" required class="selectpicker" data-dropup-auto="false"
                                        title="Chọn người phê duyệt" data-size="5" data-live-search="true">
                                        <option value="1">name - code</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Người liên quan">
                                    <select name="related_people[]" id="related_people" class="selectpicker"
                                        data-dropup-auto="false" required title="Chọn người liên quan" data-size="5"
                                        data-live-search="true" multiple data-selected-text-format="count > 1"
                                        data-count-selected-text="Có {0} người liên quan" data-actions-box="true"
                                        data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn">
                                        <option value="1">name - code</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Mẫu đề xuất">
                                    <select name="form" required class="selectpicker" data-dropup-auto="false"
                                        title="Chọn mẫu đề xuất" data-size="5">
                                        <option value="1">Yêu cầu mua sắm</option>
                                        <option value="2">Đề nghị thanh toán</option>
                                        <option value="3">Đề nghị tạm ứng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card_template-title">Mã VB: {{ time() }}</div>
                                <input type="hidden" name="code" value="{{ time() }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
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
