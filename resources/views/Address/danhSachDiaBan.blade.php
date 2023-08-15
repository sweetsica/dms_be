@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách địa bàn')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <style>

    </style>
@endsection
@php

    // function getPaginationLink($link, $pageName)
    // {
    //     if (!isset($link->url)) {
    //         return '#';
    //     }

    //     $pageNumber = explode('?page=', $link->url)[1];

    //     $queryString = request()->query();

    //     $queryString[$pageName] = $pageNumber;
    //     return route('timekeeping.list', $queryString);
    // }

    // function isFiltering($filterNames)
    // {
    //     $filters = request()->query();
    //     foreach ($filterNames as $filterName) {
    //         if (isset($filters[$filterName]) && $filters[$filterName] != '') {
    //             return true;
    //         }
    //     }
    //     return false;
    // }

    $listData = [['id' => 1, 'code' => 'tuyen01', 'name' => 'Địa bàn 2', 'usermanager' => 'Nguyễn Văn A - TBHT00', 'email' => 'Cầu Giấy', 'nhom' => '2', 'kenh' => 'OTC'], ['id' => 2, 'code' => 'tuyen01', 'name' => 'Địa bàn 3', 'usermanager' => 'Nguyễn Văn B - MTDH01', 'email' => 'Thanh Xuân', 'nhom' => '3', 'kenh' => 'ETC']];

@endphp
@section('content')
@include('template.sidebar.sidebarArea.sidebarLeft')

    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Danh sách địa bàn</h5>
                        @include('template.components.sectionCard')
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class='row'>
                                <div class="col-md-12">
                                    <div class="action_wrapper d-flex flex-wrap justify-content-between align-items-center mb-3">
                                            <div class="order-1 order-md-2  justify-content-between align-items-center flex-grow-1 mb-2 mb-md-0">
                                                <form method="GET" action="#">
                                                    <div class="form-group has-search">
                                                        {{-- <span type="submit"
                                                            class="bi bi-search form-control-feedback fs-5"></span> --}}
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
                                        @if ((session('user')['role_id'] == '1') || (session('user')['role_id'] == '2') )
                                        <div  class="action_export order-md-4" data-bs-toggle="tooltip" data-bs-placement="top"
                                            aria-label="Thêm địa bàn" data-bs-original-title="Thêm địa bàn">
                                            <button class="btn btn-danger d-block testCreateUser" data-bs-toggle="modal"
                                                data-bs-target="#add">Thêm địa bàn</button>
                                        </div>
                                        @endif

                                    </div>
                                    <form id="select-form" action="{{ route('locality.delete') }}"
                                    method="POST">
                                    @csrf
                                    <div class="action_export mx-3 order-md-3" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Xóa" >
                                        <button class="btn btn-danger  " type="submit"
                                            onclick="return confirm('Bạn có muốn xóa không?')" id="delete-selected-button"
                                            style="display: none;"
                                            >Xóa</button>
                                    </div><br>
                                    <div class="table-responsive">
                                        <table id="dsDaoTao"
                                            class="table table-responsive table-hover table-bordered filter"
                                            style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-nowrap text-center" style="width:1%"><input
                                                        type="checkbox" id="select-all"></th>
                                                    <th class="text-nowrap text-center" style="width:3%">STT</th>
                                                    <th class="text-nowrap text-center" style="width:8%">Mã địa bàn</th>
                                                    <th class="text-nowrap text-center" style="width:30%">Tên địa bàn</th>
                                                    <th class="text-nowrap text-center" style="width:30%">Khu vực</th>
                                                    <th class="text-nowrap text-center" style="width:30%">Mô tả</th>
                                                    @if ((session('user')['role_id'] == '1') || (session('user')['role_id'] == '2') )
                                                    <th class="text-nowrap text-center" style="width:4%">Hành động</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <?php $a = 1; ?>
                                            <tbody>
                                                @foreach ($localityList as $item)
                                                    <tr class="table-row" role="button">
                                                        <td class="text-center"> <input type="checkbox" name="selected_items[]"
                                                            value="{{ $item->id }}"></td>
                                                        <td>
                                                            <div class="overText text-center">
                                                                {{ $a++ }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ $item->code }}">
                                                                {{ $item->code }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title=" {{ $item->name }}">
                                                                {{ $item->name }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ $item->area_name }}">
                                                                {{ $item->area_name }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ $item->description }}">
                                                                {{ $item->description }}
                                                            </div>
                                                        </td>
                                                         @if ((session('user')['role_id'] == '1') || (session('user')['role_id'] == '2') )
                                                        <td>
                                                            <div class="table_actions d-flex justify-content-center">
                                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Sửa">
                                                                    <div class="btn test_btn-edit-{{ $item['id'] }}"
                                                                        href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#suaca{{ $item['id'] }}">
                                                                        <img style="width:16px;height:16px"
                                                                            src="{{ asset('assets/img/edit.svg') }}" />
                                                                    </div>
                                                                </div>
                                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Xóa">
                                                                    <div class="btn test_btn-remove-{{ $item['id'] }}"
                                                                        href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#xoaca{{ $item['id'] }}">
                                                                        <img style="width:16px;height:16px"
                                                                            src="{{ asset('assets/img/trash.svg') }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <nav aria-label="Page navigation example" class="float-end mt-3"
                                            id="target-pagination">
                                            <ul class="pagination">
                                                {{ $localityList->appends([
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
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarMaster.sidebarRight')

    @foreach ($localityList as $item)
        {{-- delete --}}
        <div class="modal fade" id="xoaca{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">XOÁ ĐỊA BÀN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fs-5">Bạn có thực sự muốn xoá địa bàn không?</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                        <form action="{{ route('locality.destroy', $item->id) }}" method="POST">
                            @csrf
                            {{-- @method('DELETE') --}}
                            <button type="submit" class="btn btn-danger" id="deleteRowElement">
                                xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- edit --}}
        <div class="modal fade" id="suaca{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Sửa thông tin địa bàn</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formThemCapPhat" method="POST" action="{{ route('locality.update', $item->id) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" value="{{ $item->name }}" name="name"
                                        data-bs-toggle="tooltip" required data-bs-placement="top" title="Tên địa bàn*"
                                        placeholder="Tên địa bàn*" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" value="{{ $item->code }}" name="code"
                                        data-bs-toggle="tooltip" required data-bs-placement="top" title="Mã địa bàn*"
                                        placeholder="Mã địa bàn*" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Khu vực*">
                                    {{-- <select class="selectpicker" required data-dropup-auto="false" data-width="100%" data-live-search="true" title="Khu vực*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1" selected>1</option>
                                </select> --}}
                                    <select name="area_id" required class="selectpicker" data-dropup-auto="false">
                                        <option value="{{ $item->area_id }}">{{ $item->area_name }}</option>
                                        @foreach ($area as $ar)
                                            <option value="{{ $ar->id }}">
                                                {{ $ar->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" value="{{ $item->description }}" name="description"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Ghi chú"
                                        placeholder="Ghi chú" class="form-control">
                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger me-3"
                                data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-danger">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal thêm  -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm địa bàn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formThemCapPhat" method="POST" action="{{ route('locality.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="name" data-bs-toggle="tooltip" required
                                    data-bs-placement="top" title="Tên địa bàn*" placeholder="Tên địa bàn*"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="code" data-bs-toggle="tooltip" required
                                    data-bs-placement="top" title="Mã địa bàn*" placeholder="Mã địa bàn*"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Khu vực*">
                                {{-- <select class="selectpicker" required data-dropup-auto="false" data-width="100%" data-live-search="true" title="Khu vực*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1">1</option>
                                </select> --}}
                                <select name="area_id" required class="selectpicker" data-dropup-auto="false">
                                    <option value="">Chọn khu vực*</option>
                                    @foreach ($area as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="description" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Ghi chú" placeholder="Ghi chú" class="form-control">
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger me-3" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Lưu</button>
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
                            @if (!in_array($key, [ 'don_vi_me']))
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endif
                        @endforeach --}}
                        <div class="modal-body">
                            <div class="row">
                               <div class="col-12 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Lọc theo khu vực">
                                        <select id="select-status" class="selectpicker select_filter"
                                            data-dropup-auto="false" title="Lọc theo khu vực" name='khu_vuc'>
                                          @foreach ($area as $item )
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>

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

    <script>
        updateList = function(e) {
            const input = e.target;
            const outPut = input.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector(
                '.modal_upload-list');
            const notSupport = outPut.parentNode.parentNode.querySelector('.alertNotSupport');

            let children = '';
            console.log(children);
            // const allowedTypes = ['application/pdf'];
            // const allowedExtensions = ['.pdf'];
            const maxFileSize = 10485760; //10MB in bytes

            for (let i = 0; i < input.files.length; ++i) {
                const file = input.files.item(i);
                // if (file.size <= maxFileSize && allowedTypes.includes(file.type) && allowedExtensions.includes(
                //         getFileExtension(file.name))) {
                if (file.size <= maxFileSize) {
                    children += `<li>
            <span class="fs-5">
                <i class="bi bi-link-45deg"></i> ${file.name}
            </span>
            <span class="modal_upload-remote" onclick="removeFileFromFileList(event, ${i})">
                <img style="width:18px;height:18px" src="{{ asset('assets/img/trash.svg') }}" />
            </span>
        </li>`;
                } else {

                    notSupport.style.display = 'block';
                    //remove all files from input
                    input.value = '';

                    setTimeout(() => {
                        notSupport.style.display = 'none';
                    }, 5000);
                }
            }
            outPut.innerHTML = children;
        }

        //delete file from input
        function removeFileFromFileList(event, index) {
            const deleteButton = event.target;
            //get tag name
            const tagName = deleteButton.tagName.toLowerCase();
            let liEl;
            if (tagName == "img") {
                liEl = deleteButton.parentNode.parentNode;
            }
            if (tagName == "span") {
                liEl = deleteButton.parentNode;
            }

            const inputEl = liEl.parentNode.parentNode.parentNode.querySelector('.modal_upload-input');
            const dt = new DataTransfer()

            const {
                files
            } = inputEl

            for (let i = 0; i < files.length; i++) {
                const file = files[i]
                if (index !== i)
                    dt.items.add(file) // here you exclude the file. thus removing it.
            }

            inputEl.files = dt.files // Assign the updates list
            liEl.remove();
        }

        function removeUploaded(event) {
            const deleteButton = event.target;
            //get tag name
            const tagName = deleteButton.tagName.toLowerCase();
            let liEl;
            if (tagName == "img") {
                liEl = deleteButton.parentNode.parentNode;
            }
            if (tagName == "span") {
                liEl = deleteButton.parentNode;
            }
            liEl.remove();
        }

        function getFileExtension(filename) {
            return '.' + filename.split('.').pop();
        }
    </script>

    <script>
        $(document).ready(function() {

            $('.datePicker').daterangepicker({
                singleDatePicker: false,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY '
                }
            });

            $(".locDuLieuPick").datepicker({
                format: "mm-yyyy",
                orientation: 'top',
                autoclose: true,
                startView: "months",
                minViewMode: "months",
                locale: 'vi',
            });

            $('.timepicker').daterangepicker({
                timePicker: true,
                singleDatePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 1,
                timePickerSeconds: false,
                locale: {
                    format: 'HH:mm'
                },
                timePickerminTime: '08:00',
                timePickermaxTime: '17:00'
            }).on('show.daterangepicker', function(ev, picker) {
                picker.container.find(".calendar-table").hide();
            });

        });
    </script>

    <script>
        function reloadWithoutParams() {
            const currentUrl = window.location.pathname;
            window.location.href = currentUrl;
        }
    </script>



    <script>
        function resetTaskFilters(queryNames) {
            console.log("reset filters", queryNames);
            const urlParams = new URLSearchParams(window.location.search);
            queryNames.forEach(queryName => {

                urlParams.delete(queryName);


            })
            window.location.search = urlParams;
        }
    </script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>


    <script type="text/javascript" src="{{ asset('/assets/js/components/resetFilter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/components/dataHrefTable.js') }}"></script>

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
