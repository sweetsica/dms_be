@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách cấp nhân sự')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('template.sidebar.sidebarDepartment.sidebarLeft')
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
                                                @if (session('user')['role_id'] == '1')
                                                    <div class="action_export order-md-4">
                                                        <button class="btn btn-danger d-block testCreateUser"
                                                            data-bs-toggle="modal" data-bs-target="#taoDeXuat">Thêm cấp nhân
                                                            sự</button>
                                                    </div>
                                                @endif
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
                                                            @if (session('user')['role_id'] == '1')
                                                                <th class="text-center" style="width:1%"><span>Thao
                                                                        tác</span>
                                                                </th>
                                                            @endif
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
                                                                    <div class="overText" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="{{ $item->code }}">
                                                                        {{ $item->code }}
                                                                    </div>
                                                                </td>
                                                                <td class="">
                                                                    <div class="overText" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="{{ $item->name }}">
                                                                        {{ $item->name }}
                                                                    </div>
                                                                </td>
                                                                <td class="">
                                                                    <div class="overText" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="{{ $item->description }}">
                                                                        {{ $item->description }}
                                                                    </div>
                                                                </td>
                                                                @if (session('user')['role_id'] == '1')
                                                                    <td>
                                                                        <div
                                                                            class="table_actions d-flex justify-content-end">

                                                                            <div data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Sửa">
                                                                                <div class="btn" data-bs-toggle="modal"
                                                                                    data-bs-target="#sua{{ $item->id }}">
                                                                                    <img style="width:16px;height:16px"
                                                                                        src="{{ asset('assets/img/edit.svg') }}" />
                                                                                </div>
                                                                            </div>
                                                                            <div data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Xóa">
                                                                                <div class="btn" data-bs-toggle="modal"
                                                                                    data-bs-target="#xoa{{ $item->id }}">
                                                                                    <img style="width:16px;height:16px"
                                                                                        src="{{ asset('assets/img/trash.svg') }}" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        </tbody>

                                                        {{-- Sửa đề xuất --}}
                                                        <div class="modal fade" id="sua{{ $item['id'] }}" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header text-center">
                                                                        <h5 class="modal-title w-100"
                                                                            id="exampleModalLabel">Sửa cấp nhân sự</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form method="POST"
                                                                        action="{{ route('PersonnelLevel.update', $item->id) }}">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-6 mb-3">
                                                                                    <input data-bs-toggle="tooltip"
                                                                                        data-bs-placement="top" required
                                                                                        title="Nhập tên cấp nhân sự*"
                                                                                        name="name" type="text"
                                                                                        placeholder="Nhập tên cấp nhân sự"
                                                                                        class="form-control"
                                                                                        value="{{ $item->name }}">
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <input data-bs-toggle="tooltip"
                                                                                        required data-bs-placement="top"
                                                                                        title="Nhập mã cấp nhân sự*"
                                                                                        name="code" type="text"
                                                                                        placeholder="Nhập mã cấp nhân sự"
                                                                                        class="form-control"
                                                                                        value="{{ $item->code }}">
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <div data-bs-toggle="tooltip"
                                                                                        data-bs-placement="top">
                                                                                        <textarea name="description" type="text" placeholder="Mô tả" class="form-control " data-bs-toggle="tooltip"
                                                                                            data-bs-placement="top" title="Mô tả" style="width: 450px;height: 80px;">{{ $item->description }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-outline-danger"
                                                                                data-bs-dismiss="modal">Hủy</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Lưu</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Xóa đề xuất --}}
                                                        <div class="modal fade" id="xoa{{ $item->id }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-danger"
                                                                            id="exampleModalLabel">Xóa cấp nhân sự</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Bạn có thực sự muốn xoá cấp nhân sự này không?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-outline-danger"
                                                                            data-bs-dismiss="modal">Hủy</button>
                                                                        <form
                                                                            action="{{ route('PersonnelLevelx.destroy', $item->id) }}"
                                                                            method="POST">
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
                                                {{-- {{ $personnelLevelList->appends([
                                                        'search' => $search,
                                                    ])->links() }} --}}
                                                <nav aria-label="Page navigation example" class="float-end mt-3"
                                                    id="target-pagination">
                                                    <ul class="pagination">
                                                        {{ $personnelLevelList->appends([
                                                                'search' => $search,
                                                            ])->links() }}
                                                    </ul>
                                                </nav>
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
                                <button type="submit" class="btn btn-danger" id="submitButton">Tạo</button>
                            </div>
                        </div>
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

                <form action="" method="GET">
                    {{-- @foreach (request()->query() as $key => $value)
                            @if (!in_array($key, ['don_vi_me']))
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endif
                        @endforeach --}}
                    <div class="modal-body">
                        <div class="row">
                            {{-- <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo trưởng đơn vị">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo trưởng đơn vị" name='leader_name'>
                                        @foreach ($UnitLeaderList as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            {{-- <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo đơn vị mẹ">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo đơn vị mẹ" name='don_vi_me'>
                                        @foreach ($departmentList as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="reset" class="btn btn-outline-danger">Làm
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

    {{-- <script>
     document.querySelector('#submitButton').addEventListener('click', function () {
    this.disabled = true; // Tắt nút sau khi click
});
    </script> --}}
@endsection
