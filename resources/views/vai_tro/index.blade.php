@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách vai trò')
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
                        <h5 class="mainSection_heading-title">Danh sách vai trò</h5>
                        @include('template.components.sectionCard')
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body position-relative">
                                    <div class='row'>
                                        <div class="col-md-12">
                                            <div
                                                class="action_wrapper d-flex flex-wrap justify-content-between align-items-center mb-3">

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

                                                {{-- <div class="action_export mx-3 order-md-3" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Lọc">
                                                    <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                        data-bs-target="#filterOptions">
                                                        <i class="bi bi-funnel"></i>
                                                    </button>
                                                </div> --}}
                                                @if (session('user')['role_id'] == '1')
                                                    <div class="action_export order-md-4" style="margin-left: 12px">
                                                        <button class="btn btn-danger d-block testCreateUser"
                                                            data-bs-toggle="modal" data-bs-target="#taoDeXuat">Thêm vai
                                                            trò</button>
                                                    </div>
                                                @endif
                                            </div>
                                            <form id="select-form" action="{{ route('Role.delete') }}" method="POST">
                                                @csrf
                                                <div class="action_export mx-3 order-md-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Xóa"
                                                    style="position: absolute; top: 10px; left: 0;">
                                                    <button class="btn btn-danger  " type="submit"
                                                        onclick="return confirm('Bạn có muốn xóa không?')"
                                                        id="delete-selected-button" style="display: none;">Xóa</button>
                                                </div><br>
                                                <div class="table-responsive">
                                                    <table id="dsDaoTao"
                                                        class="table table-responsive table-hover table-bordered filter">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-nowrap text-center" style="width:1%"><input
                                                                        type="checkbox" id="select-all"></th>
                                                                <th class="text-nowrap text-center" style="width:2%">STT
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Mã vai
                                                                    trò</th>
                                                                <th class="text-nowrap text-center" style="width:10%">Tên
                                                                    vai trò</th>
                                                                <th class="text-nowrap text-center" style="width:20%">Mô tả
                                                                </th>
                                                                @if (session('user')['role_id'] == '1')
                                                                    <th class=" text-center" style="width:1%"><span>Thao
                                                                            tác</span>
                                                                    </th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        <?php $i = 1; ?>
                                                        @foreach ($roleList as $item)
                                                            <tbody>
                                                                <tr>
                                                                    <td> <input type="checkbox" name="selected_items[]"
                                                                            value="{{ $item->id }}"></td>
                                                                    <td class="text-center">
                                                                        {{ $i++ }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="overText text-center"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="{{ $item->code }}">
                                                                            {{ $item->code }}
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="overText text-center"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="{{ $item->name }}">
                                                                            {{ $item->name }}
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->description }}">
                                                                            {{ $item->description }}
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="table_actions d-flex justify-content-center">

                                                                            <div data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Sửa ">
                                                                                <div class="btn" data-bs-toggle="modal"
                                                                                    data-bs-target="#sua{{ $item['id'] }}">
                                                                                    <img style="width:16px;height:16px"
                                                                                        src="{{ asset('assets/img/edit.svg') }}" />
                                                                                </div>
                                                                            </div>
                                                                            <div data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Xóa ">
                                                                                <div class="btn" data-bs-toggle="modal"
                                                                                    data-bs-target="#xoa{{ $item->id }}">
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
                                                    {{-- {{ $roleList->appends([
                                                        'search' => $search,
                                                    ])->links() }} --}}
                                                    <nav aria-label="Page navigation example" class="float-end mt-3"
                                                        id="target-pagination">
                                                        <ul class="pagination">
                                                            {{ $roleList->appends([
                                                                    'search' => $search,
                                                                ])->links() }}
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </form>
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
    @include('template.sidebar.sidebarPosition.sidebarRight')


    @foreach ($roleList as $item)
        {{-- Sửa đề xuất --}}
        <div class="modal fade" id="sua{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Sửa vai trò</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('Rolex.update', $item->id) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <input data-bs-toggle="tooltip" required data-bs-placement="top"
                                        title="Nhập tên vai trò*" name="name" type="text"
                                        placeholder="Nhập tên vai trò*" class="form-control"
                                        value="{{ $item->name }}">
                                </div>
                                <div class="col-6 mb-3">
                                    <input data-bs-toggle="tooltip" required data-bs-placement="top"
                                        title="Nhập mã vai trò*" name="code" type="text"
                                        placeholder="Nhập mã vai trò*" class="form-control" value="{{ $item->code }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top">
                                        <textarea name="description" type="text" placeholder="Chức năng nhiệm vụ" class="form-control "
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Mô tả" style="height: 80px;">{{ $item->description }}</textarea>
                                    </div>
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
        <div class="modal fade" id="xoa{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa vai trò</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có thực sự muốn xoá vai trò này không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                        <form action="{{ route('Role.destroy', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Modal Thêm Tao De Xuat -->
    <div class="modal fade" id="taoDeXuat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" action="{{ route('Role.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input name="name" required type="text" placeholder="Nhập tên vai trò*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Nhập tên vai trò*">
                            </div>
                            <div class="col-6 mb-3">
                                <input name="code" required type="text" placeholder="Nhập mã vai trò*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Nhập mã vai trò*">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div data-bs-toggle="tooltip" data-bs-placement="top">
                                    <textarea name="description" type="text" placeholder="Mô tả" class="form-control " data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Mô tả" style="height: 80px;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger me-3"
                                data-bs-dismiss="modal">Hủy</button>
                            <button id="loadingBtn" style="display: none;" class="btn btn-danger" type="button"
                                disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                            <button id="submitBtn" type="submit" class="btn btn-danger">Tạo</button>
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

    <script>
        // Khi ô checkbox chọn/bỏ chọn tất cả được thay đổi
        document.getElementById('select-all').addEventListener('change', function() {
            // Lấy danh sách tất cả các ô checkbox trong bảng
            const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');

            // Đặt giá trị của tất cả các ô checkbox trong bảng theo giá trị của ô chọn/bỏ chọn tất cả
            checkboxes.forEach((checkbox) => {
                checkbox.checked = this.checked;
            });
        });
    </script>

    <script>
        // $('#addForm').on('submit', function(e) {
        //     $('#addDetailProduct').modal('show');
        //     event.preventDefault();
        // });


        $(document).ready(function() {
            // Handle form submission
            $('#addForm').submit(function(event) {
                // Prevent the default form submission
                event.preventDefault();

                // Show the loading button and hide the submit button
                $('#submitBtn').hide();
                $('#loadingBtn').show();

                // Submit the form
                $(this).unbind('submit').submit();
            });
        });
    </script>

    <script>
        const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');
        const selectAllCheckbox = document.getElementById('select-all');
        const deleteButton = document.getElementById('delete-selected-button');

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', updateDeleteButton);
        });

        selectAllCheckbox.addEventListener('change', () => {
            checkboxes.forEach((checkbox) => {
                checkbox.checked = selectAllCheckbox.checked;
            });
            updateDeleteButton();
        });

        function updateDeleteButton() {
            const atLeastOneChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            deleteButton.style.display = atLeastOneChecked ? 'block' : 'none';
        }
    </script>

@endsection
