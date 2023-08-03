@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách phiên bản')
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

    $listData = [
        ['id' => 1, 'code' => 'tuyen01', 'name' => 'Địa bàn 2', 'usermanager' => 'Nguyễn Văn A - TBHT00', "email" => 'Cầu Giấy', 'nhom' => '2', 'kenh' => 'OTC',],
        ['id' => 2, 'code' => 'tuyen01', 'name' => 'Địa bàn 3', 'usermanager' => 'Nguyễn Văn B - MTDH01', "email" => 'Thanh Xuân', 'nhom' => '3', 'kenh' => 'ETC',]
    ];
    
@endphp
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
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
                                    <div class="action_wrapper d-flex justify-content-end mb-3">

                                        <div class="action_wrapper d-flex justify-content-end mb-3">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <form method="GET" action="#">
                                                    {{-- @foreach (request()->query() as $key => $value)
                                                        @if ($key != 'q' && $key != 'page')
                                                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                                        @endif
                                                    @endforeach --}}
                                                    <div class="form-group has-search">
                                                        <span type="submit"
                                                            class="bi bi-search form-control-feedback fs-5"></span>
                                                        <input type="text" class="form-control" placeholder="Tìm kiếm"
                                                            value="{{ request()->get('q') }}" name="q">
                                                    </div>
                                                </form>
                                            </div>
    
                                            {{-- <div class="action_export ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Lọc">
                                                <button class="btn btn-outline-danger {{ isFiltering(['department', 'user', 'adminDate']) ? 'active' : '' }}" data-bs-toggle="modal" data-bs-target="#filterAdmin"><i class="bi bi-funnel"></i>
                                                </button>
                                            </div> --}}
    
                                        </div>
                                        {{-- <div class="action_export ms-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Xuất file Excel">
                                            <a role="button" target="_blank"
                                                href={{ route('print.dwtUser', ['date' => request()->userDate ?? date('m-Y')]) }}
                                                class="btn-export"><i class="bi bi-download"></i></a>
                                        </div> --}}

                                        <div class="action_export ms-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Thêm địa bàn" data-bs-original-title="Thêm địa bàn">
                                            <button class="btn btn-danger d-block testCreateUser" data-bs-toggle="modal" data-bs-target="#add">Thêm địa bàn</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="dsDaoTao" class="table table-responsive table-hover table-bordered filter" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-nowrap text-center" style="width:3%">STT</th>
                                                    <th class="text-nowrap text-center" style="width:8%">Mã địa bàn</th>
                                                    <th class="text-nowrap text-center" style="width:30%">Tên địa bàn</th>
                                                    <th class="text-nowrap text-center" style="width:30%">Khu vực</th>
                                                    <th class="text-nowrap text-center" style="width:4%">Hành động</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($listData as $item)
                                                <tr class="table-row" role="button">
                                                    
                                                    <td>
                                                        <div class="overText text-center">
                                                            {{ $item['id'] }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip" data-bs-placement="top" title="$$$">
                                                            {{ $item['code'] }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip" data-bs-placement="top" title="$$$">
                                                            {{ $item['name'] }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip" data-bs-placement="top" title="$$$">
                                                            {{ $item['email'] }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table_actions d-flex justify-content-center">
                                                            <div class="btn test_btn-edit-{{ $item['id'] }}" href="#" data-bs-toggle="modal" data-bs-target="#suaca{{ $item['id'] }}">
                                                                <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                                            </div>
                                                            <div class="btn test_btn-remove-{{ $item['id'] }}" href="#" data-bs-toggle="modal" data-bs-target="#xoaca{{ $item['id'] }}">
                                                                <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                                            </div>
                                                        </div>
                                

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <nav aria-label="Page navigation example" class="float-end mt-3" id="target-pagination">
                                            <ul class="pagination">
                                                {{-- @foreach ($documents->links as $link)
                                                    <li class="page-item {{ $link->active ? 'active' : '' }}">
                                                        <a class="page-link" href="{{ getPaginationLink($link, 'page') }}" aria-label="Previous">
                                                            <span aria-hidden="true">{!! $link->label !!}</span>
                                                        </a>
                                                    </li>
                                                @endforeach --}}
                                            </ul>
                                        </nav>
                                    </div>
                                    <nav aria-label="Page navigation example" class="float-end mt-3"
                                        id="target-pagination">
                                        <ul class="pagination">
                                            {{-- @foreach ($listUsers->links as $link)
                                                <li class="page-item {{ $link->active ? 'active' : '' }}">
                                                    <a class="page-link" href="{{ getPaginationLink($link, 'page') }}" aria-label="Previous">
                                                        <span aria-hidden="true">{!! $link->label !!}</span>
                                                    </a>
                                                </li>
                                            @endforeach --}}
                                        </ul>
                                    </nav>
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

    @foreach($listData as $item)
    {{-- delete --}}
    <div class="modal fade" id="xoaca{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">XOÁ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="fs-5">Bạn có thực sự muốn xoá không?</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                    <form action="#" method="POST">
                        @csrf
                        {{-- @method('DELETE') --}}
                        <button type="submit" class="btn btn-danger" id="deleteRowElement">Có, tôi muốn
                            xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- edit --}}
    <div class="modal fade" id="suaca{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Sửa thông tin địa bàn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formThemCapPhat" method="POST" action="#">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" value="1" name="topic" data-bs-toggle="tooltip" required data-bs-placement="top" title="Tên địa bàn" placeholder="Tên địa bàn*" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" required data-bs-placement="top" title="Mã địa bàn" placeholder="Mã địa bàn*" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Khu vực">
                                <select class="selectpicker" required data-dropup-auto="false" data-width="100%" data-live-search="true" title="Khu vực*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1" selected>1</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Ghi chú" placeholder="Ghi chú" class="form-control">
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

    @endforeach

    <!-- Modal thêm  -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm địa bàn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formThemCapPhat" method="POST" action="#">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" required data-bs-placement="top" title="Tên địa bàn" placeholder="Tên địa bàn*" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" required data-bs-placement="top" title="Mã địa bàn" placeholder="Mã địa bàn*" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Khu vực">
                                <select class="selectpicker" required data-dropup-auto="false" data-width="100%" data-live-search="true" title="Khu vực*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Ghi chú" placeholder="Ghi chú" class="form-control">
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




@endsection
@section('footer-script')

        <!-- Plugins -->
         <script src="{{ asset('assets/plugins/jquery-datetimepicker/custom-datetimepicker.js') }}"></script>

        <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
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
@endsection
