@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Đề xuất theo mẫu')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('template.sidebar.sidebarPosition.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Danh sách cấp nhân sự</h5>
                        @include('template.components.sectionCard')
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class='row'>
                                        <div class="col-md-12">
                                            <div
                                                class="action_wrapper d-flex flex-wrap justify-content-between align-items-center mb-3">
                                                <div class="order-2 order-md-1" style="font-size: 15px;">
                                                    <b>Danh sách cấp nhân sự</b>
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
                                                        data-bs-toggle="modal" data-bs-target="#taoDeXuat">Thêm cấp nhân
                                                        sự</button>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table id="dsDaoTao"
                                                    class="table table-responsive table-hover table-bordered filter">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-nowrap text-center" style="width:2%">STT</th>
                                                            <th class="text-nowrap" style="width:10%">Mã cấp nhân sự</th>
                                                            <th class="text-nowrap" style="width:10%">Tên cấp nhân sự</th>
                                                            <th class="text-nowrap" style="width:20%">Mô tả</th>
                                                            <th class="text-nowrap" style="width:3%"><span>Thao tác</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <?php $i = 1; ?>
                                                    @foreach ($personnelLevelList as $item)
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
                                                                <td class="">
                                                                    {{ $item->description }}
                                                                </td>
                                                                <td>
                                                                    <div class="table_actions d-flex justify-content-end">

                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Sửa đề xuất">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#sua{{$item->id}}">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/edit.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Xóa đề xuất">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#xoa{{$item->id}}">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/trash.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                        {{-- Xóa đề xuất --}}
                                                        <div class="modal fade" id="xoa{{$item->id}}" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-danger"
                                                                            id="exampleModalLabel">Xóa đề xuất</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Bạn có thực sự muốn xoá đề xuất này không?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-outline-danger"
                                                                            data-bs-dismiss="modal">Hủy</button>
                                                                        <form action="{{ route('PersonnelLevelx.destroy',$item->id) }}" method="POST">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Xóa</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </table>
                                                {{ $personnelLevelList->appends([
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
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('PersonnelLevel.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input name="name" required type="text" placeholder="Nhập tên cấp nhân sự*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Nhập tên cấp nhân sự*">
                            </div>
                            <div class="col-6 mb-3">
                                <input name="code" required type="text" placeholder="Nhập mã cấp nhân sự*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Nhập mã cấp nhân sự*">
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top">
                                    <textarea name="description" type="text" placeholder="Mô tả" class="form-control " data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Mô tả" style="width: 450px;height: 80px;"></textarea>
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
