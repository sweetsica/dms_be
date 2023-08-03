@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Đề xuất theo mẫu')
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
                        <h5 class="mainSection_heading-title">Danh sách tổ chức</h5>
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
                                                            <th class="text-nowrap" style="width:3%"><span>Hành động</span></th>
                                                        </tr>
                                                    </thead>
                                                    <?php $t = 1; ?>
                                                    @foreach ($departmentList as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td class=" text-center" >
                                                                    {{$t++}}
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
                                                                <td>
                                                                    @if ($item->donvime)
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->donvime->name }}">
                                                                            {{ $item->donvime->name }}
                                                                        </div>
                                                                    @else
                                                                    @endif
                                                                </td>
                                                                <td class="">
                                                                    <div class="overText" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="{{ $item->leader_name }}">
                                                                        {{ $item->leader_name }}
                                                                    </div>

                                                                </td>
                                                                <td class="">
                                                                    <div class="overText" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="{{ $item->description }}">
                                                                        {{ $item->description }}
                                                                    </div>

                                                                </td>
                                                                <td>
                                                                    <div class="table_actions d-flex justify-content-end">
                                                                        <div class="btn" data-bs-toggle="modal"
                                                                            data-bs-target="#qrCode">
                                                                            <i class="bi bi-share-fill"
                                                                                style="color: #787878;"></i>
                                                                        </div>
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Sửa ">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#suaDeXuat{{$item['id']}}">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/edit.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Xóa">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#xoaDeXuat{{ $item->id }}">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/trash.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        {{-- Sửa đề xuất --}}
                                                        <div class="modal fade" id="suaDeXuat{{$item['id']}}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header text-center">
                                                                        <h5 class="modal-title w-100"
                                                                            id="exampleModalLabel">Sửa đơn vị</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form method="POST"
                                                                    action="{{route('department.update',$item->id)}}"
                                                                    >
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-6 mb-3">
                                                                                    <input data-bs-toggle="tooltip"
                                                                                        data-bs-placement="top" title="Nhập tên đơn vị*"
                                                                                        name="name"
                                                                                        type="text"
                                                                                        placeholder="Tên đơn vị"
                                                                                        class="form-control"
                                                                                        value="{{ $item->name }}">
                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <input data-bs-toggle="tooltip"
                                                                                        data-bs-placement="top" title="Mã đơn vị"
                                                                                        name="code" type="text"
                                                                                        placeholder="Mã đơn vị"
                                                                                        class="form-control"
                                                                                        value="{{ $item->code }}">
                                                                                </div>
                                                                                <div class="col-6 mb-3">

                                                                                    <div data-bs-toggle="tooltip"
                                                                                        data-bs-placement="top"
                                                                                        title="Chọn đơn vị mẹ">
                                                                                        <select name="parent" required
                                                                                            class="selectpicker"
                                                                                            data-dropup-auto="false">
                                                                                            <option value="{{$item->parent}}"> @if ($item->donvime){{ $item->donvime->name }}  @endif</option>
                                                                                            @foreach ($departmentlists as $ac)
                                                                                                <option
                                                                                                    value="{{ $ac->id }}"
                                                                                                   >
                                                                                                    @php
                                                                                                        $str = '';
                                                                                                        for ($i = 0; $i < $ac->level; $i++) {
                                                                                                            echo $str;
                                                                                                            $str = '  --';
                                                                                                        }
                                                                                                    @endphp
                                                                                                    {{ $ac->name }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-6 mb-3">
                                                                                    <div data-bs-toggle="tooltip"
                                                                                        data-bs-placement="top"
                                                                                        title="Chọn trưởng bộ phận">
                                                                                        <select name="ib_lead"
                                                                                            class="selectpicker"
                                                                                            data-dropup-auto="false">
                                                                                            <option
                                                                                            value="{{ $item->ib_lead }}"  >
                                                                                            {{ $item->leader_name }}
                                                                                            </option>
                                                                                            @foreach ($UnitLeaderList as $av)
                                                                                                <option
                                                                                                    value="{{ $av->id }}" >
                                                                                                    {{ $av->leader_name }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 mb-3">
                                                                                <div data-bs-toggle="tooltip" data-bs-placement="top" >
                                                                                    <textarea name="description" type="text" placeholder="Chức năng nhiệm vụ"
                                                                                        class="form-control " data-bs-toggle="tooltip" data-bs-placement="top"
                                                                                        title="Mô tả" style="width: 450px;height: 80px;">{{ $item->description }}</textarea>
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
                                                        <div class="modal fade" id="xoaDeXuat{{ $item->id }}" tabindex="-1"
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
                                                                        Bạn có thực sự muốn xoá đơn vị này không?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-outline-danger"
                                                                            data-bs-dismiss="modal">Hủy</button>
                                                                        <form action="{{ route('departmentr.destroy',$item->id) }}" method="POST">
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
                                                <nav aria-label="Page navigation example" class="float-end mt-3"
                                                    id="target-pagination">
                                                    <ul class="pagination">
                                                        {{ $departmentList->appends([
                                                            'search' => $search,
                                                        ])->links() }}
                                                    </ul>
                                                </nav>
                                                {{-- <nav aria-label="Page navigation example" class="float-end mt-3"
                                                    id="target-pagination">
                                                    <ul class="pagination">
                                                        <li class="page-item">

                                                            <a class="page-link" href="" aria-label="Previous">
                                                                <span aria-hidden="true">
                                                                    << Previous</span>
                                                                        <span>1</span>
                                                                        <span aria-hidden="true">Next >></span>
                                                            </a>
                                                        </li>
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
            </div>
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarDepartment.sidebarRight')



    <!-- Modal Thêm Tao De Xuat -->
    <div class="modal fade" id="taoDeXuat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm Đơn Vị</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('department.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input name="name" required type="text" placeholder="Nhập tên đơn vị*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Nhập tên đơn vị*">
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Mã đơn vị*">
                                    <input name="code" required type="text" placeholder="Mã đơn vị*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Mã đơn vị*">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn đơn vị mẹ">
                                    <select name="parent" required class="selectpicker" data-dropup-auto="false">
                                        <option value="0">Chọn đơn vị mẹ</option>
                                        @foreach ($departmentlists as $item)
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
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn trưởng bộ phận">
                                    <select name="ib_lead" required class="selectpicker" data-dropup-auto="false">
                                        <option value="0">Chọn trưởng bộ phận</option>
                                        @foreach ($UnitLeaderList as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->leader_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" >
                                    <textarea name="description" type="text" placeholder="Chức năng nhiệm vụ"
                                        class="form-control " data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Chức năng nhiệm vụ" style="width: 450px;height: 80px;"></textarea>
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
            +
            minViewMode: "months",
            locale: 'vi',
        });
    </script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/resetFilter.js') }}"></script>

@endsection
